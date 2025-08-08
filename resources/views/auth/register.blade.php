@extends('layouts.app')

@section('title', 'Create New Account')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="register-card">
                <div class="text-center">
                    <h3>Join Now</h3>
                    <a href="#" class="btn btn-facebook w-100">
                        Activate your account with Facebook
                    </a>
                </div>

                <div class="or-divider text-muted">OR</div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Mobile Number</label>
                        <input id="phone" type="tel" class="form-control" name="phone" value="{{ old('phone') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Gender</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="birth_date" class="form-label">Birth Date (Optional)</label>
                        <input id="birth_date" type="date" class="form-control" name="birth_date" value="{{ old('birth_date') }}">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-danger btn-lg">Join Now</button>
                    </div>

                    <div class="text-center">
                        <small>By signing up you agree to our <a href="#">Terms Of Use</a></small>
                    </div>
                </form>

                <hr>

                <div class="text-center">
                    <p class="mb-0">Already registered on Vezeeta? <a href="#">Login</a></p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
