<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\SurveyAnswer;
use App\Models\SurveyResponse;
use App\Mail\CertificateMail;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SurveyController extends Controller
{
    public function create()
{
    return view('admin.surveys.create');
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255'
    ]);

    $survey = Survey::create([
        'title' => $request->title
    ]);

    return redirect()
        ->route('surveys.edit', $survey->id)
        ->with('success', 'Survey created. Add questions now.');
}

public function edit(Survey $survey)
{
    $survey->load('questions');
    return view('admin.surveys.edit', compact('survey'));
}

public function publish(Survey $survey)
{
    if ($survey->questions()->count() === 0) {
        return back()->withErrors('Please add at least one question before publishing.');
    }

    $survey->status = 'published';
    $survey->save();

    return redirect()
        ->route('admin.events.dashboard')
        ->with('success', 'Survey saved and published successfully.');
}
    public function show(Registration $registration)
    {
        // ✅ Force eager loading (prevents null issues)
        $registration->load([
            'event',
            'event.survey',
            'event.survey.questions'
        ]);

        return view('survey.form', compact('registration'));
    }

    /**
     * Submit survey + send certificate
     */
    public function submit(Request $request)
    {
        // ✅ Validation (VERY IMPORTANT)
        $request->validate([
            'registration_id' => 'required|exists:registrations,id',
            'answers' => 'required|array'
        ]);

        // 1️⃣ Save survey response
        $response = SurveyResponse::create([
            'registration_id' => $request->registration_id
        ]);

        // 2️⃣ Save survey answers
        foreach ($request->answers as $questionId => $answer) {
            SurveyAnswer::create([
                'survey_response_id' => $response->id,
                'survey_question_id' => $questionId,
                'answer' => $answer
            ]);
        }

        // 3️⃣ Mark survey completed
        $registration = Registration::findOrFail($request->registration_id);
        $registration->survey_completed = 1;

        // 4️⃣ Send certificate mail 🔥
        Mail::to($registration->email)
            ->send(new CertificateMail($registration));

        // 5️⃣ Update certificate status
        $registration->certificate_sent = 1;
        $registration->save();

        // 6️⃣ Thank you page
        return view('survey.thankyou');
    }
}
