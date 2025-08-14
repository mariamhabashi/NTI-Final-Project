@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>All Doctors</h3>
        <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary">+ Add Doctor</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead class="table-light">
            <tr>
                <th>Name</th>
                <th>Specialty</th>
                <th>City</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doctor)
            <tr>
                <td>{{ $doctor->first_name }} {{ $doctor->last_name }}</td>
                <td>{{ $doctor->specialty }}</td>
                <td>{{ $doctor->city }}</td>
                <td>
                    <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.doctors.delete', $doctor->id) }}" method="POST"  style="display: inline-block">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
