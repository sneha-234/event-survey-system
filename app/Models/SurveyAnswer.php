<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    protected $fillable = [
        'survey_response_id',
        'survey_question_id',
        'answer'
    ];

    public function surveyQuestion()
{
    return $this->belongsTo(SurveyQuestion::class);
}

public function surveyResponse()
{
    return $this->belongsTo(SurveyResponse::class);
}

}
