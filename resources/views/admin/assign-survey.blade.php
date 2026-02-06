@extends('layouts.app')

@section('content')

<div class="container" style="max-width: 600px; margin-top:40px;">

    <h3 class="mb-4">Assign Survey to {{ $event->name }}</h3>

    <form method="POST"
          action="{{ route('events.assignSurvey.save', $event->id) }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Select Survey</label>
            <select name="survey_id" class="form-control" required>
                <option value="">Select Survey</option>

                @foreach($surveys as $survey)
                    <option value="{{ $survey->id }}"
                        {{ $event->survey_id == $survey->id ? 'selected' : '' }}>
                        {{ $survey->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">
            Save
        </button>

        <a href="{{ route('admin.events.dashboard') }}"
           class="btn btn-secondary ms-2">
            Back
        </a>
    </form>

</div>

@endsection
