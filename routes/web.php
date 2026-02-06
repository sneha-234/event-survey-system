<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\SurveyQuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/events');
});
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::post('/register', [RegistrationController::class, 'store']);
Route::get('/survey/{registration}', [SurveyController::class, 'show'])->name('survey.show');
Route::post('/survey-submit', [SurveyController::class, 'submit']);
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
Route::get('/reports/events', [ReportController::class, 'eventReport'])->name('reports.events');
Route::get('/reports/events/{event}', [ReportController::class, 'eventRegistrations']) ->name('reports.event.registrations');
Route::get('/reports/survey/{event}', [ReportController::class, 'surveyReport'])->name('reports.survey');
Route::get('/admin/events-dashboard', [EventController::class, 'dashboard'])->name('admin.events.dashboard');
Route::get('/events/{event}/assign-survey',[EventController::class, 'assignSurvey'])->name('events.assignSurvey');
Route::post('/events/{event}/assign-survey',[EventController::class, 'saveSurvey'])->name('events.assignSurvey.save');
Route::get('/admin/surveys/create', [SurveyController::class, 'create'])->name('surveys.create');
Route::post('/admin/surveys', [SurveyController::class, 'store'])->name('surveys.store');
Route::get('/admin/surveys/{survey}/edit', [SurveyController::class, 'edit'])->name('surveys.edit');
Route::post('/admin/surveys/{survey}/questions', [SurveyQuestionController::class, 'store'])->name('survey.questions.store');
Route::post('/admin/surveys/{survey}/publish',[SurveyController::class, 'publish'])->name('surveys.publish');

