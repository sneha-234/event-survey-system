<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use App\Models\SurveyQuestion;


class SurveyQuestionController extends Controller
{
    
public function store(Request $request, Survey $survey)
{
    $request->validate([
        'question' => 'required',
        'type' => 'required|in:text,mcq',
        'options' => 'nullable'
    ]);

   SurveyQuestion::create([
    'survey_id' => $survey->id,
    'question'  => $request->question,
    'type'      => $request->type,
    'options' => $request->type === 'mcq'
    ? array_map('trim', explode(',', $request->options))
    : null,
    ]);


    return back()->with('success', 'Question added');
}

}
