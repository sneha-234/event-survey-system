@extends('layouts.app')

@section('content')
<div style="max-width:400px;margin:80px auto;">
    <h3>Login</h3>

    <form method="POST" action="/login">
        @csrf

        <input type="email" name="email"
               placeholder="Email"
               class="form-control mb-2" required>

        <input type="password" name="password"
               placeholder="Password"
               class="form-control mb-3" required>

        <button class="btn btn-primary w-100">
            Login
        </button>
    </form>

    @if($errors->any())
        <p style="color:red;margin-top:10px;">
            {{ $errors->first() }}
        </p>
    @endif
</div>
@endsection
