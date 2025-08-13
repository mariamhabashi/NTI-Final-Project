{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="container my-5">--}}

{{-- This will pass the actual $doctor object, not just ID --}}
{{--@include('appointments.book', [--}}
{{--    'doctor' => $doctor,--}}
{{--    'dates' => $dates,--}}
{{--    'slots' => $slots,--}}
{{--    'clinicId' => $clinicId--}}
{{--])--}}

{{-- This will filter the slots for the selected clinic --}}
{{--@include('appointments.reserve', [--}}
{{--    'clinic' => $clinicId,--}}
{{--    'slots' => $slots->where('clinic_id', $clinicId)--}}
{{--])--}}
{{--@endsection--}}


@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="card shadow booking-form">
            <div class="card-header bg-primary text-white" >
                <h5 class="mb-0 text-center" >Booking Information</h5>
            </div>
            <div class="card-body">

                <h6 class="text-center mb-8">
                    <p style="color: #74746F">Book</p>
                    <p style="color: #0070CC">Examination</p>
                </h6>

                <hr class="my-2">


                <div class="d-flex justify-content-around text-center py-2">

                    {{-- Fees --}}
                    <div class="fees">
                        <img src="/public/images/icons/fees_icon.png" alt="Fees" style="height:40px;">
                        <div style="height:3px; background-color:red; width:20px; margin:4px auto;"></div>
                        <div class="mt-auto" style="color: #808184">
                            <span>Fees <strong style="color: #808184">{{$doctor->fee}}</strong></span>
                        </div>
                    </div>

                    {{-- Points --}}
                    <div class="points">
                        <img src="/public/images/icons/points_icon.png" alt="Points" style="height:40px;">
                        <div style="height:3px; background-color:orange; width:20px; margin:4px auto;"></div>
                        <div class="mt-auto">
                            <span>You’ll earn <strong style="color: #30A635">100 points</strong></span>
                        </div>
                    </div>

                    {{-- Waiting Time --}}
                    <div class="waiting-time">
                        <img src="/public/images/icons/waiting_time_icon.png" alt="Waiting Time" style="height:40px;">
                        <div style="height:3px; background-color:green; width:20px; margin:4px auto;"></div>
                        <div class="mt-1" style="color: #6ACF7F">
                            <span>Waiting Time : {{$doctor->waiting_time}}</span>
                        </div>
                    </div>

                </div>

                <hr class="my-2">


                {{-- Discount Banner --}}
                <div class="d-flex align-items-center justify-content-between text-white px-3 py-2 my-3"
                     style="background: linear-gradient(to right, #2196f3, #0069d9); border-radius: 10px;height: 32px">

                    {{-- Left side: icon + text --}}
                    <div class="d-flex align-items-center">
                        <img src="/public/images/icons/shamel-logo.jpeg" alt="S icon" style="width:10px;" class="me-1">
                        <span style="font-size: 12px">60 EGP with shamel</span>
                    </div>

                    {{-- Right side: arrow --}}
                    <div>
                        <i class="bi bi-chevron-right">&rsaquo;</i> {{-- Bootstrap Icons --}}
                    </div>

                </div>
                <hr class="my-2">
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const container = document.querySelector('.horizontal-scroll-container');
                        const scrollLeftBtn = document.getElementById('scrollLeftBtn');
                        const scrollRightBtn = document.getElementById('scrollRightBtn');
                        const itemWidth = container.querySelector('.card').offsetWidth + 16;

                        scrollLeftBtn.addEventListener('click', () => {
                            container.scrollBy({ left: -itemWidth , behavior: 'smooth' });
                        });

                        scrollRightBtn.addEventListener('click', () => {
                            container.scrollBy({ left: itemWidth , behavior: 'smooth' });
                        });

                        // Clinic selection logic
                        const clinicCards = document.querySelectorAll('.clinic-name');
                        const selectedClinic = document.getElementById('selectedClinic');
                        const clinicLocation = document.getElementById('clinicLocation');


                        clinicCards.forEach(card => {
                            card.addEventListener('click', function () {
                                const name = this.getAttribute('data-name');
                                const city = this.getAttribute('data-city');
                                const address = this.getAttribute('data-address');
                                const clinicId = this.getAttribute('data-clinic-id');

                                // Update only the location text
                                clinicLocation.textContent = `${city} : ${address}`;

                                // Update time slots

                                // Highlight selected card
                                clinicCards.forEach(c => c.classList.remove('selected-clinic'));
                                this.classList.add('selected-clinic');
                            });
                        });
                    });
                </script>
                @if($doctor->clinics->count() > 1)
                    <!-- Choose a clinic -->
                    <div class="flex items-center justify-between border-b pb-2 mb-2">
                        <div class="flex items-center space-x-2">
                            <div class="p-3 d-flex align-items-start" style="vertical-align: middle">
                                <!-- Location icon -->
                                <div class="me-2">
                                    <svg style="color: #0070CC" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                    </svg>
                                    <div style="height:3px; background-color:red; width:10px; margin:4px auto;"></div>
                                </div>

                                <!-- Text content -->
                                <div style="color: #74746F; font-size: 14px; vertical-align: middle;">
                                    Choose a clinic
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center clinics-bar choose-clinic-section">
                            <button class="btn btn-primary me-2" id="scrollLeftBtn">&lt;</button>
                            <div class="horizontal-scroll-container flex-grow-1 overflow-auto d-flex flex-nowrap">
                                @foreach($doctor->clinics as $index => $clinic)
                                    <div class="card flex-shrink-0 me-3 clinic-name"
                                         data-name="{{ $clinic->clinic_name }}"
                                         data-city="{{ $clinic->clinic_city }}"
                                         data-address="{{ $clinic->clinic_address }}"
                                         data-clinicId="{{$clinic->clinic_id}}"
                                         style="width: 50%;">
                                        <span>{{$clinic->clinic_name}}</span>
                                    </div>
                                @endforeach

                            </div>

                            <button class="btn btn-primary ms-2" id="scrollRightBtn">&gt;</button>
                        </div>
                        <hr class="my-2">
                        <div id="selectedClinic" class="mt-2" style="font-size: 14px; font-weight: bold; color: #333;">
                            <div class="p-3 d-flex align-items-start">
                                <!-- Location icon -->
                                <div class="me-2">
                                    <svg style="color: #0070CC" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                    </svg>
                                    <div style="height:3px; background-color:red; width:10px; margin:4px auto;"></div>
                                </div>

                                <!-- Text content -->
                                <div class="clinic-info">
                                    <div class="clinic-location" id="clinicLocation">
                                        {{$clinic->clinic_city}} : {{$clinic->clinic_address}}
                                    </div>
                                    <div class="book-now">
                                        Book now to receive the clinic’s address details and phone number
                                    </div>
                                </div>
                            </div>
                        </div>

                        @elseif($doctor->clinics->count() == 1)
                            <div id="selectedClinic" class="mt-2" style="font-size: 14px; font-weight: bold; color: #333;">
                                <div class="p-1 d-flex align-items-start">
                                    <!-- Location icon -->
                                    <div class="me-2">
                                        <svg style="color: #0070CC" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                        </svg>
                                        <div style="height:3px; background-color:red; width:10px; margin:4px auto;"></div>
                                    </div>

                                    <!-- Text content -->
                                    <div class="clinic-info">
                                        <div class="clinic-location" id="clinicLocation">
                                            {{$doctor->clinics->first()->clinic_city}} : {{$doctor->clinics->first()->clinic_address}}
                                        </div>
                                        <div class="book-now">
                                            Book now to receive the clinic’s address details and phone number
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif




                    </div>

                    <div class="appointment-container p-1">
                        <p>Choose your appointment</p>
                        <div class="days">
                            <button class="btn btn-primary me-2 scroll-button" id="scrollLeftBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                                </svg>
                            </button>

                            @foreach($dates as $date)
                                <div class="day-card" id="selectedClinic">
                                    <div class="day-header">
                                        {{ \Carbon\Carbon::parse($date)->isToday() ? 'Today' : \Carbon\Carbon::parse($date)->format('l, F j') }}
                                    </div>

                                    @php

                                        $slotsForThisDate = $slots->filter(function ($slot) use ($date, $clinicId) {
                                            return \Carbon\Carbon::parse($slot->appointment_date)->isSameDay($date)
                                                && $slot->clinic_id == $clinicId;
                                        });
                                    @endphp
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            document.querySelectorAll(".times").forEach(function(container) {
                                                const moreBtn = container.querySelector(".show-more");
                                                const extraSlots = container.querySelector(".extra-slots");

                                                if (moreBtn && extraSlots) {
                                                    moreBtn.addEventListener("click", function() {
                                                        extraSlots.style.display = "inline";
                                                        moreBtn.style.display = "none";
                                                    });
                                                }
                                            });
                                        });
                                    </script>


                                    <div class="times">
                                        @php
                                            $visibleSlots = $slotsForThisDate->take(6);
                                            $hiddenSlots = $slotsForThisDate->slice(6);
                                        @endphp

                                        {{--             First 6 slots --}}
                                        @foreach($visibleSlots as $slot)
                                            @if($slot->is_booked)
                                                <span class="time-slot booked-slot">
                                                    <del>{{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }}</del>
                                                </span>
                                            @else
                                                <a href="{{ route('appointments.confirm', ['slot' => $slot->id]) }}"
                                                   class="time-slot available-slot">
                                                    {{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }}
                                                </a>
                                            @endif
                                        @endforeach

                                        {{--             Hidden slots --}}
                                        <span class="extra-slots" style="display: none;">
                                        @foreach($hiddenSlots as $slot)
                                                @if($slot->is_booked)
                                                    <span class="time-slot booked-slot">
                                                        <del>{{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }}</del>
                                                    </span>
                                                @else
                                                    <a href="{{ route('appointments.confirm', ['slot' => $slot->id]) }}"
                                                       class="time-slot available-slot">
                                                        {{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }}
                                                    </a>
                                                @endif
                                            @endforeach
                                        </span>

                                        {{--             More button--}}
                                        @if($slotsForThisDate->count() > 6)
                                            <button class="show-more time-slot available-slot" style="border: none; background-color: white">More</button>
                                        @endif
                                    </div>
                                    <form action="{{ route('appointments.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                                        <input type="hidden" name="date" value="{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}">
                                        <div class="book-btn">BOOK</div>
                                    </form>
                                </div>
                            @endforeach

                            <button class="btn btn-primary ms-2 scroll-button" id="scrollRightBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16" >
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                                </svg>
                            </button>

                        </div>
                        <div style="width: 100%">
                        <hr class="my-2" >
                        <div style="font-size: 14px; color: #ABABA9; display: block; width: 100%; padding: 10px">Appointment reservation</div>
                        <hr class="my-2">
                        </div>

                        <div class="d-flex align-items-center p-3" style="background: white; border-radius: 8px;">
                            <!-- Calendar Icon -->
                            <div class="me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#66bb6a" class="bi bi-calendar-check" viewBox="0 0 16 16">
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h.5A1.5 1.5 0 0 1 15 2.5V4H1V2.5A1.5 1.5 0 0 1 2.5 1H3v-.5a.5.5 0 0 1 .5-.5"/>
                                    <path d="M1 14V5h14v9a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2m11.354-6.354a.5.5 0 0 0-.708 0L7.5 11.793 5.854 10.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l4-4a.5.5 0 0 0 0-.708"/>
                                </svg>
                            </div>

                            <!-- Text -->
                            <div style="font-size: 14px; justify-content: flex-start">
                                <div class="fw-bold" style="color: #666666;">Book online, Pay at the clinic!</div>
                                <div style="color: #666666;">Doctor requires reservation!</div>
                            </div>
                        </div>


                    </div>

            </div>
    </div>
@endsection
