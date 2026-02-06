<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use App\Models\SurveyAnswer;

class ReportController extends Controller
{
    // 1️⃣ Event Summary Report
    public function eventReport()
    {
        $events = Event::withCount([
            'registrations',
            'registrations as survey_submitted' => function ($q) {
                $q->where('survey_completed', 1);
            }
        ])->get();

        return view('reports.events', compact('events'));
    }

    // 2️⃣ Event Registrations
    public function eventRegistrations(Event $event)
    {
        $registrations = Registration::where('event_id', $event->id)->get();

        return view('reports.registrations', compact('event', 'registrations'));
    }

    // 3️⃣ Survey Answers Report
    public function surveyReport(Event $event)
    {
        $answers = SurveyAnswer::whereHas('surveyResponse.registration', function ($q) use ($event) {
            $q->where('event_id', $event->id);
        })
        ->with([
            'surveyQuestion',
            'surveyResponse.registration'
        ])
        ->get();

        return view('reports.survey', compact('event', 'answers'));
    }
}
