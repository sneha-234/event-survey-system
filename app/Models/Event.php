<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Survey;

class Event extends Model
{
    protected $fillable = [
        'name',
        'event_date',
        'mode',
        'survey_id'
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id');
    }

    public function registrations()
   {
      return $this->hasMany(Registration::class);
   }

}
