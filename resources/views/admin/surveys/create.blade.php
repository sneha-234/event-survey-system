@extends('layouts.app')

@section('content')

<div class="container" style="max-width:600px;">
    <h3>Create New Survey</h3>

    <form method="POST" action="{{ route('surveys.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Survey Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <button class="btn btn-primary">Create Survey</button>
    </form>
</div>

@endsection
