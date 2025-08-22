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

{{--     <pre>{{ dd($slots) }}</pre>--}}


{{--      This will filter the slots for the selected clinic --}}
         @include('appointments.reserve', [
          'clinic' => $clinic,
          'slots' => $slots->where('clinic_id', $clinic->id)
     //      'slots' => $slots
         ])

{{--         <div class="appointment-container p-1">--}}
{{--             <p>Choose your appointment</p>--}}
{{--             <div class="days">--}}
{{--                 <button class="btn btn-primary me-2 scroll-button" id="scrollLeftBtn">--}}
{{--                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">--}}
{{--                         <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>--}}
{{--                     </svg>--}}
{{--                 </button>--}}
{{--             </div>--}}
{{--         </div>--}}

     </div>
    @endsection

