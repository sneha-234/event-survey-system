<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SurveyQuestion;

class Survey extends Model
{
    protected $fillable = ['title' ,'status'] ;

    public function questions()
    {
        return $this->hasMany(SurveyQuestion::class, 'survey_id');
    }
}
