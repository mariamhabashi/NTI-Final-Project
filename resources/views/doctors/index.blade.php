{{-- resources/views/doctors/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <!-- Filter Sidebar -->
        <div class="col-md-3">
            <form action="{{ route('doctors.search') }}" method="GET" class="filter-sidebar border rounded bg-white p-4">
                <h5>Filter by:</h5>
                {{-- Doctor Name --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Doctor Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter name">
                </div>
                {{-- Specialty --}}
                <div class="mb-3">
                    <label for="specialty" class="form-label">Speciality</label>
                    <select name="specialty" id="specialty" class="form-select">
                        <option value="">All Specialties</option>
                       @php
                        $specialties = ['Cardiology', 'Dermatology', 'Neurology', 'Pediatrics', 'Psychiatry', 'Radiology', 'General Surgery', 'Orthopedics', 'Ophthalmology', 'ENT', 'Gynecology', 'Urology', 'Gastroenterology', 'Endocrinology', 'Rheumatology', 'Oncology', 'Nephrology', 'Hematology', 'Infectious Disease', 'Pulmonology'];
                       @endphp
                       @foreach($specialties as $spec)
                    <option value="{{ $spec }}" {{ request('specialty') == $spec ? 'selected' : '' }}>
                        {{ $spec }}
                    </option>
                       @endforeach
                    </select>
                </div>

                {{-- City --}}
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <select name="city" id="city" class="form-select">
                        <option value="">All Cities</option>
                            @php
                                $cities = ['Cairo','Alexandria'];
                            @endphp
                            @foreach($cities as $city)
                                <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>
                                    {{ $city }}
                                </option>
                            @endforeach

                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Search</button>
            </form>
        </div>

        <!-- Doctors List -->
        <div class="col-md-9">
            <div class="cards-col d-flex flex-column gap-4">
                @foreach($doctors as $doctor)
                    <div class="doctor-card-vezeeta border rounded p-4 shadow-sm">
                        <div class="row align-items-center">
                            <!-- Doctor Image -->
                            <div class="col-auto">
                                <img src="{{ $doctor->profile_pic ? asset('storage/' . $doctor->profile_pic) : asset('storage/img/clinic-medhat--higazi--dentistry_20250612192726555.jpg') }}"
                                     alt="{{ $doctor->first_name }} {{ $doctor->last_name }}"
                                     class="rounded-circle" width="80" height="80">
                            </div>

                            <!-- Doctor Info -->
                            <div class="col">
                                <h5 class="mb-1">{{ $doctor->first_name }} {{ $doctor->last_name }}</h5>
                                <p class="text-muted mb-1">
                                    <strong>Speciality:</strong> {{ $doctor->speciality }} |
                                    <strong>City:</strong> {{ $doctor->city }}
                                </p>
                                <p class="text-muted mb-2">Experience: {{ $doctor->experience_years ?? 'N/A' }} years</p>

                                <!-- Dynamic Appointment Slots (Preserves Old Style) -->
                                <div class="mt-3">
                                    @if(isset($availableSlots[$doctor->id]) && $availableSlots[$doctor->id]->isNotEmpty())
                                        <p class="text-sm text-gray-500 mb-1">Available Slots:</p>
                                        <div class="d-flex flex-wrap gap-2">
                                            @php $count = 0; @endphp
                                            @foreach($availableSlots[$doctor->id] as $date => $dateSlots)
                                                @foreach($dateSlots as $slot)
                                                    @if($count < 3) <!-- Show max 3 slots, like original -->
                                                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded">
                                                            {{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }}
                                                        </span>
                                                        @php $count++; @endphp
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="text-xs text-red-500 italic">No available slots</p>
                                    @endif
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="col-auto d-flex gap-2">
                                <a href="{{ route('doctors.show', ['doctor' => $doctor->id]) }}" class="btn btn-outline-primary btn-sm">Info</a>
                                @if($doctor->clinics->isNotEmpty())
                                    <a href="{{ route('booking.show', ['id' => $doctor->id, 'clinic_id' => $doctor->clinics->first()->id ,'offset'=>0 ]) }}"
                                       class="btn btn-primary btn-sm">
                                        Book Now
                                    </a>
                                @else
                                    <button class="btn btn-secondary btn-sm" disabled>No Clinic</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection