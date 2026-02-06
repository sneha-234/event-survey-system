<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    protected $fillable = [
        'survey_id',
        'question',
        'type',
        'options'
    ];

    protected $casts = [
        'options' => 'array',
    ];
}
