@extends('layouts.app')

@section('content')
    <div class="container my-5">

        {{-- Booking Information Header --}}
        <div class="card shadow booking-form">
            <div class="card-header bg-primary text-white" >
                <h5 class="mb-0 text-center" >Booking Information</h5>
            </div>
            <div class="card-body">

                <h6 class="text-center mb-8">
                    <p style="color: #74746F">Book</p>
                    <p style="color: #0070CC">Examination</p>
                </h6>

                <hr class="my-2"> <!-- adds vertical spacing -->


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

                <hr class="my-2"> <!-- adds vertical spacing -->


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



{{--                <div class="max-w-3xl mx-auto">--}}
{{--                    <!-- Choose a clinic -->--}}
{{--                    <div class="flex items-center justify-between border-b pb-2 mb-4">--}}
{{--                        <div class="flex items-center space-x-2">--}}
{{--                            <i class="fas fa-map-marker-alt text-blue-500"></i>--}}
{{--                            <span style="font-size: 12px; font-weight: bold; color: #74746F ">Choose a clinic</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- Location Tabs -->--}}
{{--                    <div class="flex items-center justify-between border-b pb-2 mb-4">--}}
{{--                        <button class="text-gray-400">--}}
{{--                            <i class="fas fa-chevron-left"></i>--}}
{{--                        </button>--}}
{{--                        <span class="font-semibold text-blue-600 border-b-2 border-blue-600 pb-1">Heliopolis</span>--}}
{{--                        <button class="text-gray-400">--}}
{{--                            <i class="fas fa-chevron-right"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}

{{--                    <!-- Clinic Info -->--}}
{{--                    <div class="flex items-start space-x-2 mb-6">--}}
{{--                        <i class="fas fa-map-marker-alt text-blue-500"></i>--}}
{{--                        <div>--}}
{{--                            <p class="text-gray-700">Heliopolis : botros ghali street</p>--}}
{{--                            <p class="text-sm text-gray-500 font-semibold">--}}
{{--                                Book now to receive the clinic’s address details and phone number--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                @if($doctor->clinics->count() > 0)--}}
{{--                    <div class="border-b mb-3">--}}
{{--                        <!-- Title -->--}}
{{--                        <div class="flex items-center text-gray-600 mb-2">--}}
{{--                            <i class="fas fa-map-marker-alt text-blue-500 mr-2"></i>--}}
{{--                            <span class="font-medium" style="font-size: 12px; font-weight: bold; color: #74746F ">Choose a clinic</span>--}}
{{--                        </div>--}}

{{--                        <!-- Clinic Tabs Navigation -->--}}
{{--                        <div class="flex items-center justify-between">--}}
{{--                            <!-- Left Arrow -->--}}
{{--                            <button type="button" class="text-gray-400 px-2" id="clinic-prev">--}}
{{--                                <i class="fas fa-chevron-left"></i>--}}
{{--                            </button>--}}

{{--                            <!-- Tabs -->--}}
{{--                            <div class="flex space-x-6 overflow-x-auto scrollbar-hide" id="clinic-tabs">--}}
{{--                                @foreach($doctor->clinics as $index => $clinic)--}}
{{--                                    <button--}}
{{--                                        class="pb-1 text-base font-semibold whitespace-nowrap--}}
{{--                               {{ $index === 0 ? 'text-blue-600 border-b-2 border-blue-600' : 'text-blue-400' }}"--}}
{{--                                        onclick="selectClinic({{ $clinic->id }})"--}}
{{--                                        data-clinic-id="{{ $clinic->id }}"--}}
{{--                                    >--}}
{{--                                        {{ $clinic->clinic_name }}--}}
{{--                                    </button>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}

{{--                            <!-- Right Arrow -->--}}
{{--                            <button type="button" class="text-gray-400 px-2" id="clinic-next">--}}
{{--                                <i class="fas fa-chevron-right"></i>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- Selected Clinic Info -->--}}
{{--                    <div class="flex items-start space-x-2 mb-6" id="clinic-info">--}}
{{--                        <i class="fas fa-map-marker-alt text-blue-500"></i>--}}
{{--                        <div>--}}
{{--                            <p class="text-gray-700">--}}
{{--                                {{ $doctor->clinics[0]->clinic_city }} : {{ $doctor->clinics[0]->clinic_address }}--}}
{{--                            </p>--}}
{{--                            <p class="text-sm text-gray-500 font-semibold">--}}
{{--                                Book now to receive the clinic’s address details and phone number--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <input type="hidden" name="clinic_id" id="selected-clinic" value="{{ $doctor->clinics[0]->id }}">--}}
{{--                @else--}}
{{--                    <p class="text-danger">This doctor has no clinics available.</p>--}}
{{--                @endif--}}


{{--                --}}{{-- Appointment Slots --}}
{{--                <h5 class="text-center my-4">Choose your appointment</h5>--}}
{{--                <div class="d-flex justify-content-center gap-3 flex-wrap">--}}

{{--                    --}}{{-- Day Card --}}
{{--                    @php--}}
{{--                        $days = [--}}
{{--                            'Today' => ['3:00 PM','3:30 PM','4:00 PM','4:30 PM','5:00 PM','5:30 PM'],--}}
{{--                            'Tomorrow' => ['4:00 PM','4:30 PM','5:00 PM','5:30 PM','6:00 PM','6:30 PM'],--}}
{{--                            'Wed 08/13' => ['4:00 PM','4:30 PM','5:00 PM','5:30 PM','6:00 PM','6:30 PM']--}}
{{--                        ];--}}
{{--                    @endphp--}}

{{--                    @foreach ($days as $day => $times)--}}
{{--                        <div class="border rounded p-3 text-center" style="min-width:150px;">--}}
{{--                            <div class="bg-primary text-white rounded-top p-2">{{ $day }}</div>--}}
{{--                            <div class="py-2">--}}
{{--                                @foreach ($times as $time)--}}
{{--                                    <div class="mb-1">{{ $time }}</div>--}}
{{--                                @endforeach--}}
{{--                                <a href="#" class="btn btn-danger w-100 mt-2">BOOK</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}

{{--                </div>--}}

{{--            </div>--}}
        </div>
    </div>
@endsection
