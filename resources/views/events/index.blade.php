@extends('layouts.app')

@section('content')

<style>
    .card:hover {
        transform: translateY(-3px);
        transition: 0.3s;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #6c757d;
    }

    .empty-state img {
        max-width: 280px;
        margin-bottom: 20px;
    }
</style>

<h2 class="text-center mb-4">Available Events</h2>

{{-- TOP ACTION BUTTONS --}}
<div class="d-flex justify-content-between mb-4">
    <a href="{{ route('events.create') }}" class="btn btn-success">
        + Add Event
    </a>

    <a href="{{ route('reports.events') }}" class="btn btn-outline-dark">
        📊 Events Report
    </a>
</div>

<div class="row">

@forelse($events as $event)

    <div class="col-md-6">
        <div class="card mb-4 shadow-sm position-relative">

            {{-- DELETE EVENT --}}
            <form method="POST"
                  action="{{ route('events.destroy', $event->id) }}"
                  class="position-absolute top-0 end-0 m-2"
                  onsubmit="return confirm('Are you sure you want to delete this event?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">🗑</button>
            </form>

            <div class="card-body">

                <h5 class="card-title">{{ $event->name }}</h5>

                <p class="card-text mb-2">
                    <strong>Date:</strong> {{ $event->event_date }} <br>
                    <strong>Mode:</strong> {{ $event->mode }} <br>
                    <strong>Survey:</strong>
                    @if($event->survey)
                        <span class="text-success">{{ $event->survey->title }}</span>
                    @else
                        <span class="text-danger">Not Assigned</span>
                    @endif
                </p>

                {{-- REGISTRATION FORM --}}
                <form method="POST" action="/register">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $event->id }}">

                    <div class="mb-2">
                        <input class="form-control" name="name"
                               placeholder="Your Name" required>
                    </div>

                    <div class="mb-2">
                        <input type="email" class="form-control" name="email"
                               placeholder="Email Address" required>
                    </div>

                    <div class="mb-3">
                        <input class="form-control" name="phone"
                               placeholder="Phone Number"
                               maxlength="10"
                               minlength="10"
                               pattern="[0-9]{10}"
                               title="Phone number must be exactly 10 digits"
                               required>
                    </div>

                    <button class="btn btn-primary w-100 mb-3">
                        Register Now
                    </button>
                </form>

                {{-- 🔥 SURVEY MANAGEMENT BUTTONS --}}
                <div class="d-flex gap-2 mb-2">
                    <a href="{{ route('events.assignSurvey', $event->id) }}"
                       class="btn btn-outline-primary w-50">
                        📌 Assign Existing Survey
                    </a>

                    <a href="{{ route('surveys.create') }}"
                       class="btn btn-outline-success w-50">
                        ➕ Create New Survey
                    </a>
                </div>

                {{-- 🔥 REPORT BUTTONS --}}
                <div class="d-flex gap-2">
                    <a href="{{ route('reports.event.registrations', $event->id) }}"
                       class="btn btn-outline-secondary w-50">
                        👥 Registered Users
                    </a>

                    <a href="{{ route('reports.survey', $event->id) }}"
                       class="btn btn-outline-dark w-50">
                        📝 Survey Data
                    </a>
                </div>

            </div>
        </div>
    </div>

@empty

    {{-- EMPTY STATE --}}
    <div class="col-12">
        <div class="empty-state">
            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076503.png">
            <h4>No Events Available</h4>
            <p>Please create a new event.</p>

            <a href="{{ route('events.create') }}"
               class="btn btn-outline-success mt-3">
                + Create First Event
            </a>
        </div>
    </div>

@endforelse

</div>

{{-- ✅ SUCCESS TOAST --}}
@if(session('success'))
<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index:1100;">
    <div id="successToast"
         class="toast text-bg-success border-0"
         role="alert">
        <div class="d-flex">
            <div class="toast-body">
                ✅ {{ session('success') }}
            </div>
            <button type="button"
                    class="btn-close btn-close-white me-2 m-auto"
                    data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toastEl = document.getElementById('successToast');
        if (toastEl) {
            new bootstrap.Toast(toastEl, { delay: 3000 }).show();
        }
    });
</script>
@endif

{{-- ❌ ERROR TOAST --}}
@if ($errors->any())
<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index:1100;">
    <div id="errorToast"
         class="toast text-bg-danger border-0"
         role="alert">
        <div class="d-flex">
            <div class="toast-body">
                ❌ {{ $errors->first() }}
            </div>
            <button type="button"
                    class="btn-close btn-close-white me-2 m-auto"
                    data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toastEl = document.getElementById('errorToast');
        if (toastEl) {
            new bootstrap.Toast(toastEl, { delay: 4000 }).show();
        }
    });
</script>
@endif

@endsection
