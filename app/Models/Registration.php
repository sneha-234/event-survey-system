<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Registration extends Model
{
    protected $fillable = [
        'event_id',
        'name',
        'email',
        'phone',
        'survey_completed'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function surveyResponse()
   {
    return $this->hasOne(SurveyResponse::class);
   }
}
