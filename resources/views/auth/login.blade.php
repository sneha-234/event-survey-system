@extends('layouts.app')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #eef2ff, #f8fafc);
    }

    .login-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .login-card {
        width: 100%;
        max-width: 420px;
        background: #ffffff;
        padding: 35px 30px;
        border-radius: 12px;
        box-shadow: 0 25px 50px rgba(0,0,0,0.08);
        border: 1px solid #e5e7eb;
    }

    .login-header {
        text-align: center;
        margin-bottom: 25px;
    }

    .login-header .icon {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .login-header h3 {
        font-size: 1.4rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 4px;
    }

    .login-header p {
        font-size: 0.85rem;
        color: #6b7280;
        margin: 0;
    }

    .form-control {
        height: 46px;
        border-radius: 8px;
        font-size: 0.95rem;
    }

    .form-control:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.15);
    }

    .login-btn {
        height: 46px;
        font-weight: 600;
        border-radius: 8px;
        background: #6366f1;
        border: none;
    }

    .login-btn:hover {
        background: #4f46e5;
    }

    .login-error {
        background: #fef2f2;
        color: #b91c1c;
        padding: 12px;
        border-radius: 8px;
        font-size: 0.85rem;
        margin-bottom: 15px;
        text-align: center;
        border: 1px solid #fecaca;
    }
</style>

<div class="login-wrapper">

    <div class="login-card">

        <div class="login-header">
            <div class="icon">🔐</div>
            <h3>Welcome Back</h3>
            <p>Login to manage events and surveys</p>
        </div>

        {{-- ERROR MESSAGE --}}
        @if($errors->any())
            <div class="login-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <input type="email"
                       name="email"
                       class="form-control"
                       placeholder="Email address"
                       required>
            </div>

            <div class="mb-4">
                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Password"
                       required>
            </div>

            <button type="submit" class="btn btn-primary w-100 login-btn">
                Login
            </button>
        </form>

    </div>

</div>

@endsection
