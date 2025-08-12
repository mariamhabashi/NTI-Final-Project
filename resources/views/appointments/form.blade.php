@extends('layouts.app')

@section('content')
    <div class="container my-5">

{{-- This will pass the actual $doctor object, not just ID --}}
@include('appointments.book', [
    'doctor' => $doctor,
    'dates' => $dates,
    'slots' => $slots,
    'clinicId' => $clinicId
])

{{-- This will filter the slots for the selected clinic --}}
@include('appointments.reserve', [
    'clinic' => $clinicId,
    'slots' => $slots->where('clinic_id', $clinicId)
])
@endsection
