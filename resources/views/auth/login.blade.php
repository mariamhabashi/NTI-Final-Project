@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 500px; margin-top: 50px;">
    <h2 class="text-center mb-4">Login</h2>
    <form method="POST" action="{{ url('/login') }}">
        @csrf

        <div class="form-group mb-3">
            <label>Email Address</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="remember" class="form-check-input" id="remember">
            <label for="remember" class="form-check-label">Remember Me</label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</div>
@endsection
