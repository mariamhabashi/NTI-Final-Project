@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Edit Doctor</h3>
    <form method="POST" action="{{ route('admin.doctors.update', $doctor->id) }}">
        @csrf
        <div class="mb-3">
            <label>First Name</label>
            <input name="first_name" class="form-control" value="{{ $doctor->first_name }}" required>
        </div>
        <div class="mb-3">
            <label>last Name</label>
            <input name="last_name" class="form-control" value="{{ $doctor->last_name }}" required>
        </div>
        <div class="mb-3">
            <label>Specialty</label>
            <input name="specialty" class="form-control" value="{{ $doctor->specialty }}" required>
        </div>
        <div class="mb-3">
            <label>City</label>
            <input name="city" class="form-control" value="{{ $doctor->city }}" required>
        </div>
        <button class="btn btn-success">Update Doctor</button>
    </form>
</div>
@endsection
