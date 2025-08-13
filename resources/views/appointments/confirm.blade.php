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

                <hr class="my-2">

                <h6 class="text-center mb-8">
                    <p style="color: #74746F; font-size: 16px; font-weight: bolder">Enter Your Info;</p>
                    <p class="text-center text-gray-600" style="font-size: 14px; color: #74746F;">
                        {{ \Carbon\Carbon::parse($slot->appointment_date)->format('l F j') }}
                        - {{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }}
                    </p>
                </h6>
                <div class="border-t my-4"></div>

                {{-- Name --}}
                <div class="flex items-center border-b py-2 mb-2 px-2" style="font-size: 14px; color: #848481">
                <span class="me-3 text-gray-500">
                    <svg style="color: grey;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg>
                </span>
                    <span>{{ optional(auth()->user())->name ?? 'Your Name' }}</span>
                    <hr class="my-2">
                </div>

                {{-- Phone & Email --}}
                <div class="flex items-center border-b py-2 mb-2 px-2"  style="justify-content: space-around; font-size: 14px; color: #848481">
                    <div style="display: inline; margin-right: 25px; ">
                        <span class="me-3 text-gray-500" style="display: inline-block">
                    <svg style="color: grey;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                    </svg>
                    </span>
                        <span>{{ optional(auth()->user())->phone ?? '+20 --- --- ----' }}</span>
                    </div>

                    <div style="display: inline">
                         <span class="ms-auto me-3 text-gray-500" style="display: inline-block">
                    <svg style="color: grey" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                    </svg>
                    </span>
                        <span>{{ optional(auth()->user())->email ?? 'you@example.com' }}</span>
                    </div>
                    <hr class="my-2">

                </div>

                {{-- Booking on behalf --}}
                <div class="flex items-center mb-4" style="font-size: 12px; color: #848481">
                    <input type="checkbox" id="behalf" class="me-1">
                    <label for="behalf" class="text-gray-700 text-sm">
                        I am booking on behalf of another patient
                    </label>
                </div>

{{--                --}}{{-- Insurance --}}
{{--                <div class="flex items-center mb-2" style="font-size: 14px; color: #787874">--}}
{{--                    <svg style="color: #0070CC" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-umbrella" viewBox="0 0 16 16">--}}
{{--                        <path d="M8 0a.5.5 0 0 1 .5.5v.514C12.625 1.238 16 4.22 16 8c0 0 0 .5-.5.5-.149 0-.352-.145-.352-.145l-.004-.004-.025-.023a3.5 3.5 0 0 0-.555-.394A3.17 3.17 0 0 0 13 7.5c-.638 0-1.178.213-1.564.434a3.5 3.5 0 0 0-.555.394l-.025.023-.003.003s-.204.146-.353.146-.352-.145-.352-.145l-.004-.004-.025-.023a3.5 3.5 0 0 0-.555-.394 3.3 3.3 0 0 0-1.064-.39V13.5H8h.5v.039l-.005.083a3 3 0 0 1-.298 1.102 2.26 2.26 0 0 1-.763.88C7.06 15.851 6.587 16 6 16s-1.061-.148-1.434-.396a2.26 2.26 0 0 1-.763-.88 3 3 0 0 1-.302-1.185v-.025l-.001-.009v-.003s0-.002.5-.002h-.5V13a.5.5 0 0 1 1 0v.506l.003.044a2 2 0 0 0 .195.726c.095.191.23.367.423.495.19.127.466.229.879.229s.689-.102.879-.229c.193-.128.328-.304.424-.495a2 2 0 0 0 .197-.77V7.544a3.3 3.3 0 0 0-1.064.39 3.5 3.5 0 0 0-.58.417l-.004.004S5.65 8.5 5.5 8.5s-.352-.145-.352-.145l-.004-.004a3.5 3.5 0 0 0-.58-.417A3.17 3.17 0 0 0 3 7.5c-.638 0-1.177.213-1.564.434a3.5 3.5 0 0 0-.58.417l-.004.004S.65 8.5.5 8.5C0 8.5 0 8 0 8c0-3.78 3.375-6.762 7.5-6.986V.5A.5.5 0 0 1 8 0M6.577 2.123c-2.833.5-4.99 2.458-5.474 4.854A4.1 4.1 0 0 1 3 6.5c.806 0 1.48.25 1.962.511a9.7 9.7 0 0 1 .344-2.358c.242-.868.64-1.765 1.271-2.53m-.615 4.93A4.16 4.16 0 0 1 8 6.5a4.16 4.16 0 0 1 2.038.553 8.7 8.7 0 0 0-.307-2.13C9.434 3.858 8.898 2.83 8 2.117c-.898.712-1.434 1.74-1.731 2.804a8.7 8.7 0 0 0-.307 2.131zm3.46-4.93c.631.765 1.03 1.662 1.272 2.53.233.833.328 1.66.344 2.358A4.14 4.14 0 0 1 13 6.5c.77 0 1.42.23 1.897.477-.484-2.396-2.641-4.355-5.474-4.854z"/>--}}
{{--                    </svg>--}}
{{--                    <strong>Insurance</strong>--}}
{{--                </div>--}}

{{--                <div class="text-gray-500 text-sm border-b pb-2 mb-3" style="font-size: 14px; color: #848481; padding-left: 20px">--}}
{{--                    <svg style="color: #0070CC" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-umbrella" viewBox="0 0 16 16">--}}
{{--                        <path d="M8 0a.5.5 0 0 1 .5.5v.514C12.625 1.238 16 4.22 16 8c0 0 0 .5-.5.5-.149 0-.352-.145-.352-.145l-.004-.004-.025-.023a3.5 3.5 0 0 0-.555-.394A3.17 3.17 0 0 0 13 7.5c-.638 0-1.178.213-1.564.434a3.5 3.5 0 0 0-.555.394l-.025.023-.003.003s-.204.146-.353.146-.352-.145-.352-.145l-.004-.004-.025-.023a3.5 3.5 0 0 0-.555-.394 3.3 3.3 0 0 0-1.064-.39V13.5H8h.5v.039l-.005.083a3 3 0 0 1-.298 1.102 2.26 2.26 0 0 1-.763.88C7.06 15.851 6.587 16 6 16s-1.061-.148-1.434-.396a2.26 2.26 0 0 1-.763-.88 3 3 0 0 1-.302-1.185v-.025l-.001-.009v-.003s0-.002.5-.002h-.5V13a.5.5 0 0 1 1 0v.506l.003.044a2 2 0 0 0 .195.726c.095.191.23.367.423.495.19.127.466.229.879.229s.689-.102.879-.229c.193-.128.328-.304.424-.495a2 2 0 0 0 .197-.77V7.544a3.3 3.3 0 0 0-1.064.39 3.5 3.5 0 0 0-.58.417l-.004.004S5.65 8.5 5.5 8.5s-.352-.145-.352-.145l-.004-.004a3.5 3.5 0 0 0-.58-.417A3.17 3.17 0 0 0 3 7.5c-.638 0-1.177.213-1.564.434a3.5 3.5 0 0 0-.58.417l-.004.004S.65 8.5.5 8.5C0 8.5 0 8 0 8c0-3.78 3.375-6.762 7.5-6.986V.5A.5.5 0 0 1 8 0M6.577 2.123c-2.833.5-4.99 2.458-5.474 4.854A4.1 4.1 0 0 1 3 6.5c.806 0 1.48.25 1.962.511a9.7 9.7 0 0 1 .344-2.358c.242-.868.64-1.765 1.271-2.53m-.615 4.93A4.16 4.16 0 0 1 8 6.5a4.16 4.16 0 0 1 2.038.553 8.7 8.7 0 0 0-.307-2.13C9.434 3.858 8.898 2.83 8 2.117c-.898.712-1.434 1.74-1.731 2.804a8.7 8.7 0 0 0-.307 2.131zm3.46-4.93c.631.765 1.03 1.662 1.272 2.53.233.833.328 1.66.344 2.358A4.14 4.14 0 0 1 13 6.5c.77 0 1.42.23 1.897.477-.484-2.396-2.641-4.355-5.474-4.854z"/>--}}
{{--                    </svg>--}}
{{--                    <select name="insurance" class="w-full rounded px-3 py-2 text-gray-700" style="border: none; text-decoration: none; width: 80%">--}}
{{--                        <option value="">I don’t have insurance with this doctor</option>--}}
{{--                        <option value="axa">AXA</option>--}}
{{--                        <option value="metlife">MetLife</option>--}}
{{--                        <option value="bupa">Bupa</option>--}}
{{--                        <option value="other">Other</option>--}}
{{--                    </select>--}}

{{--                </div>--}}

                {{-- Submit Buttons --}}
                <div style="margin-top: 20px">
                    <form action="{{ route('appointments.store') }}" method="POST" style="display: inline">
                        @csrf
                        <input type="hidden" name="slot_id" value="{{ $slot->id }}">
                        <button style="width: 50%; height: 40px; color: white; background-color: #EE0E0F; cursor: pointer; border: none; border-radius: 5px; margin-right: 10%">
                            Book Now
                        </button>
                    </form>


                    <button style="width: 30%; height: 40px; background-color: white; color: grey; cursor: pointer;  border: grey solid; border-radius: 5px">
                        <a href="{{ url()->previous() }}"
                           style="display: inline-block;border-radius: 5px; color: grey; text-decoration: none;">
                            Cancel
                        </a>
                    </button>
                </div>



            </div>

@endsection
