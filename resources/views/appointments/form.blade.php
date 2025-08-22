@extends('layouts.app')

@section('content')
 <div class="container my-5">
     <div class="card shadow booking-form">

    @include('appointments.book', [
     'doctor' => $doctor,
     'dates' => $dates,
     'slots' => $slots,
     'clinic' => $clinic
    ])

     @include('appointments.reserve', [
      'clinic' => $clinic,
      'slots' => $slots->where('clinic_id', $clinic->id)
     ])

     </div>
 </div>
    @endsection

