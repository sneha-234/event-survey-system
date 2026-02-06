@extends('layouts.app')

@section('content')

<div class="container" style="max-width: 800px;">

    {{-- SURVEY TITLE + STATUS --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">{{ $survey->title }}</h3>

        <span class="badge {{ $survey->status === 'published' ? 'bg-success' : 'bg-secondary' }}">
            {{ ucfirst($survey->status) }}
        </span>
    </div>

    {{-- ADD QUESTION FORM --}}
    <form method="POST"
          action="{{ route('survey.questions.store', $survey->id) }}"
          class="card card-body mb-4">
        @csrf

        <div class="mb-2">
            <input name="question"
                   class="form-control"
                   placeholder="Enter question"
                   required>
        </div>

        <div class="mb-2">
            <select name="type" class="form-control" required>
                <option value="text">Text</option>
                <option value="mcq">Multiple Choice</option>
            </select>
        </div>

        <div class="mb-3">
            <input name="options"
                   class="form-control"
                   placeholder="Options (comma separated)">
        </div>

        <button class="btn btn-primary">
            ➕ Add Question
        </button>
    </form>

    {{-- QUESTIONS LIST --}}
    <div class="card card-body mb-4">
        <h5 class="mb-3">Questions</h5>

        @forelse($survey->questions as $q)
            <div class="border-bottom py-2">
                <strong>{{ $q->question }}</strong>
                <div class="text-muted small">
                    Type: {{ strtoupper($q->type) }}
                </div>
            </div>
        @empty
            <p class="text-muted">No questions added yet.</p>
        @endforelse
    </div>

    {{-- 🔥 SAVE & PUBLISH BUTTON --}}
    <form method="POST"
          action="{{ route('surveys.publish', $survey->id) }}"
          onsubmit="return confirm('Once published, this survey will be available for events. Continue?')">
        @csrf

        <button class="btn btn-success">
            💾 Save & Publish Survey
        </button>

        <a href="{{ route('admin.events.dashboard') }}"
           class="btn btn-outline-secondary ms-2">
            Cancel
        </a>
    </form>

</div>

@endsection
