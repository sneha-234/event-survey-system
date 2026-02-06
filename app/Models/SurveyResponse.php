<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    protected $fillable = [
       'registration_id',
    ];

    public function answers()
{
    return $this->hasMany(SurveyAnswer::class);
}

public function registration()
{
    return $this->belongsTo(Registration::class);
}

}
