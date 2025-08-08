@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Add New Doctor</h3>
    <form method="POST" action="{{ route('admin.doctors.store') }}">
        @csrf
        <div class="mb-3">
            <label>First Name</label>
            <input name="first_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>last Name</label>
            <input name="last_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Specialty</label>
            <input name="specialty" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>City</label>
            <input name="city" class="form-control" required>
        </div>

        <button class="btn btn-primary">Add Doctor</button>
    </form>
</div>
@endsection
