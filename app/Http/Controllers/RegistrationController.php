<?php

namespace App\Http\Controllers;
use App\Jobs\SendemailJob;

use App\Mail\SurveyLinkMail;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
public function store(Request $request)
{
$registration = Registration::create($request->all());


        SendemailJob::dispatch($registration);



return back()->with('success', 'Registered successfully');
}
}
