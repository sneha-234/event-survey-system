@extends('layouts.app')

@section('content')

<h3 class="mb-4">Create New Event</h3>

<form method="POST" action="{{ route('events.store') }}" class="card p-4 shadow-sm">
    @csrf

    <div class="mb-3">
        <label class="form-label">Event Name</label>
        <input class="form-control" name="name" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Event Date</label>
        <input type="date" class="form-control" name="event_date" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Mode</label>
        <select class="form-control" name="mode" required>
            <option value="">Select</option>
            <option value="Online">Online</option>
            <option value="Offline">Offline</option>
        </select>
    </div>

    <button class="btn btn-success">Create Event</button>
</form>

@endsection
