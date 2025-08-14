@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">My Appointments</h3>

    @if($appointments->isEmpty())
        <div class="alert alert-info">You don't have any appointments yet, <span style="color: red" ><a href="{{ route('doctors.index') }}">Book</a></span></div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Doctor</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Specialty</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}</td>
                        <td>{{ $appointment->appointment_time }}</td>
                        <td>{{ $appointment->doctor->specialty }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
