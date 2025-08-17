@extends('layouts.app')
@section('content')

    <style>
        .form-control {
            border-radius: 0px;
            margin-bottom: 10px;
            width: 75%;
        }

        .form-label {
            margin-bottom: 10px;
            width: 25%;
        }
    </style>
    {{-- this is the user dashboard --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="register-card" style="">
                    <div class="text-center">
                        <h3>Manage Profile</h3>
                    </div>

                    <form method="POST" action="{{ route('my-profile.update')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{ auth()->user()->id }}">

                        <div class="input-group ">
                            <label for="name" class="form-label">Full Name</label>
                            <input id="name" type="text" class="form-control" name="name"
                                value="{{ old('name', auth()->user()->name) }}" required>
                        </div>

                        <div class="input-group ">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email" class="form-control" name="email"
                                value="{{ old('email', auth()->user()->email) }}" required>
                        </div>

                        <div class="input-group ">
                            <label for="phone" class="form-label">Mobile Number</label>
                            <input id="phone" type="tel" class="form-control" name="phone"
                                value="{{ old('phone', auth()->user()->phone) }}" required>
                        </div>


                        <div class="input-group ">
                            <label for="birth_date" class="form-label">Birth Date</label>
                            <input id="birth_date" type="date" class="form-control" name="birth_date"
                                value="{{ old('birth_date', auth()->user()->birth_date) }}">
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('doctors.index') }}" class="btn btn-negative">Cancel</a>
                        </div>
                    </form>

                    <hr>

                    {{-- <div class="text-center">
                        <a href="{{ route('doctors.index') }}" class="btn btn-negative">Cancel</a>
                    </div> --}}
                </div>

            </div>
        </div>
    </div>
@endsection