{{-- @extends('layouts.app')

@section('content')
    <div class="doctor-card-vezeeta">
        1. Doctor Image
        <div class="doctor-img-section">
            <img src="{{ $doctor->profile_pic ? asset('storage/img/' . $doctor->profile_pic) : asset('storage/img/clinic-medhat--higazi--dentistry_20250612192726555.jpg') }}"
                alt="{{ $doctor->first_name }}">
        </div>
        2. Doctor Info
        <div class="doctor-info-section">
            <div class="d-flex align-items-center mb-2">
                <h6 class="mb-0 me-2 text-primary">Doctor</h6>
                <h4 class="mb-0">{{ $doctor->first_name }} {{ $doctor->last_name }}</h4>
            </div>
            <div class="mb-2 text-muted">
                <i class="bi bi-briefcase"></i> {{ $doctor->speciality }}
                &nbsp; | &nbsp;
                <i class="bi bi-geo-alt"></i> {{ $doctor->city }}
            </div>
            <div class="mb-2">
                <span class="me-3"><strong>Fee:</strong> {{ $doctor->fee }} EGP</span>
                <span class="me-3"><strong>Experience:</strong> {{ $doctor->experience_years }} years</span>
            </div>
            <div class="mb-2">
                <span class="me-3"><strong>Phone:</strong> {{ $doctor->phone }}</span>
                <span class="me-3"><strong>Address:</strong> {{ $doctor->address }}</span>
            </div>
            <div>
                <strong>Bio:</strong> {{ $doctor->bio }}
            </div>
            <div class="mt-3">
                <a href="#" class="btn btn-outline-primary btn-sm">Book Now</a>
            </div>
        </div>
        3. Appointments
        <div class="doctor-appointments-section position-relative">
            <button type="button"
                class="btn btn-light btn-circle btn-sm position-absolute start-0 top-50 translate-middle-y shadow-sm scroll-left"
                style="z-index:2; left:-18px; border: 1px solid #ddd; width:36px; height:36px; display:flex; align-items:center; justify-content:center; font-size:1.5rem;">
                <span style="color:#0070cd;">&#8592;</span>
            </button>
            <div class="appointments-scroll d-flex flex-row overflow-auto"
                style="gap:12px; scroll-behavior:smooth; margin:0 24px;">
                Example: Replace with your @foreach($doctor->appointments as $day => $slots)
                @php
                    $appointments = [
                        [
                            'day' => 'Yesterday',
                            'slots' => [
                                ['label' => '9:00 AM', 'free' => true, 'url' => route('appointments.register', ['doctor' => $doctor->id, 'time' => '09:00'])],
                                ['label' => '10:00 AM', 'free' => false, 'url' => '#'],
                                ['label' => '11:00 AM', 'free' => true, 'url' => route('appointments.register', ['doctor' => $doctor->id, 'time' => '11:00'])],
                            ]
                        ],
                        [
                            'day' => 'Today',
                            'slots' => [
                                ['label' => '3:00 PM', 'free' => true, 'url' => route('appointments.register', ['doctor' => $doctor->id, 'time' => '15:00'])],
                                ['label' => '4:00 PM', 'free' => false, 'url' => '#'],
                                ['label' => '5:00 PM', 'free' => true, 'url' => route('appointments.register', ['doctor' => $doctor->id, 'time' => '17:00'])],
                            ]
                        ],
                        [
                            'day' => 'Tomorrow',
                            'slots' => [
                                ['label' => '2:00 PM', 'free' => true, 'url' => route('appointments.register', ['doctor' => $doctor->id, 'time' => '14:00'])],
                                ['label' => '3:00 PM', 'free' => false, 'url' => '#'],
                            ]
                        ],
                        [
                            'day' => 'After Tomorrow',
                            'slots' => [
                                ['label' => '3:00 PM', 'free' => true, 'url' => route('appointments.register', ['doctor' => $doctor->id, 'time' => '15:00'])],
                                ['label' => '4:00 PM', 'free' => false, 'url' => '#'],
                                ['label' => '5:00 PM', 'free' => true, 'url' => route('appointments.register', ['doctor' => $doctor->id, 'time' => '17:00'])],
                            ]
                        ],
                        [
                            'day' => 'Next Day',
                            'slots' => [
                                ['label' => '9:00 AM', 'free' => true, 'url' => route('appointments.register', ['doctor' => $doctor->id, 'time' => '09:00'])],
                                ['label' => '10:00 AM', 'free' => false, 'url' => '#'],
                                ['label' => '11:00 AM', 'free' => true, 'url' => route('appointments.register', ['doctor' => $doctor->id, 'time' => '11:00'])],
                            ]
                        ],
                    ];
                @endphp
                @foreach($appointments as $app)
                    <table class="bg-white border rounded" style="min-width:110px; max-width:120px;">
                        <thead>
                            <tr>
                                <th class="text-center" style="color:#0070cd;">{{ $app['day'] }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($app['slots'] as $slot)
                                <tr>
                                    <td class="text-center p-1">
                                        @if($slot['free'])
                                            <a href="{{ $slot['url'] }}" class="appointment-slot-link d-block">{{ $slot['label'] }}</a>
                                        @else
                                            <span class="not-free d-block">{{ $slot['label'] }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            @php
                                $firstFree = collect($app['slots'])->firstWhere('free', true);
                            @endphp
                            @if($firstFree)
                                <tr class="book-btn-row">
                                    <td class="text-center p-0" colspan="100">
                                        <a href="{{ $firstFree['url'] }}" class="book-btn-table d-block fw-bold"
                                            style="background:#dc3545; color:#fff; border-radius:0 0 6px 6px; padding:10px 0; text-decoration:none;">
                                            Book Now
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                @endforeach
            </div>
            <button type="button"
                class="btn btn-light btn-circle btn-sm position-absolute end-0 top-50 translate-middle-y shadow-sm scroll-right"
                style="z-index:2; right:-18px; border: 1px solid #ddd; width:36px; height:36px; display:flex; align-items:center; justify-content:center; font-size:1.5rem;">
                <span style="color:#0070cd;"> &#8594;</span>
            </button>
        </div>
    </div>
@endsection --}}



@extends('layouts.app')

@section('content')
    <div class="doctor-card-vezeeta">
        {{-- 1. Doctor Image --}}
        <div class="doctor-img-section">
            <img src="{{ $doctor->profile_pic ? asset('storage/img/' . $doctor->profile_pic) : asset('storage/img/clinic-medhat--higazi--dentistry_20250612192726555.jpg') }}"
                alt="{{ $doctor->first_name }}">
        </div>

        {{-- 2. Doctor Info --}}
        <div class="doctor-info-section">
            <div class="d-flex align-items-center mb-2">
                <h6 class="mb-0 me-2 text-primary">Doctor</h6>
                <h4 class="mb-0">{{ $doctor->first_name }} {{ $doctor->last_name }}</h4>
            </div>
            <div class="mb-2 text-muted">
                <i class="bi bi-briefcase"></i> {{ $doctor->speciality }}
                &nbsp; | &nbsp;
                <i class="bi bi-geo-alt"></i> {{ $doctor->city }}
            </div>
            <div class="mb-2">
                <span class="me-3"><strong>Fee:</strong> {{ $doctor->fee }} EGP</span>
                <span class="me-3"><strong>Experience:</strong> {{ $doctor->experience_years }} years</span>
            </div>
            <div class="mb-2">
                <span class="me-3"><strong>Phone:</strong> {{ $doctor->phone }}</span>
                <span class="me-3"><strong>Address:</strong> {{ $doctor->address }}</span>
            </div>
            <div>
                <strong>Bio:</strong> {{ $doctor->bio }}
            </div>
        </div>

        {{-- 3. Appointments --}}
        <div class="doctor-appointments-section position-relative">
            <button type="button"
                class="btn btn-light btn-circle btn-sm position-absolute start-0 top-50 translate-middle-y shadow-sm scroll-left"
                style="z-index:2; left:-18px; border: 1px solid #ddd; width:36px; height:36px; display:flex; align-items:center; justify-content:center; font-size:1.5rem;">
                <span style="color:#0070cd;">&#8592;</span>
            </button>

            <div class="appointments-scroll d-flex flex-row overflow-auto"
                style="gap:12px; scroll-behavior:smooth; margin:0 24px;">

                @php
                    // Group available slots by date for the next 5 days
                    $futureDates = \Carbon\Carbon::today()->addDays(4)->toDateString(); // 5 days including today

                    $slots = $doctor->appointmentSlots()
                        ->where('is_booked', false)
                        ->where('appointment_date', '>=', \Carbon\Carbon::today()->toDateString())
                        ->where('appointment_date', '<=', $futureDates)
                        ->orderBy('appointment_date')
                        ->orderBy('start_time')
                        ->get();

                    $groupedSlots = $slots->groupBy(function ($slot) {
                        return \Carbon\Carbon::parse($slot->appointment_date)->diffInDays(\Carbon\Carbon::today());
                    });

                    // Map Carbon diff days to labels
                    $dayLabels = [
                        0 => 'Today',
                        1 => 'Tomorrow',
                        2 => 'After Tomorrow',
                        3 => 'Next Day',
                        4 => 'Day After',
                    ];

                    // Prepare the dynamic $appointments array
                    $appointments = [];
                    foreach ($groupedSlots as $daysFromToday => $dateSlots) {
                        $dayLabel = $dayLabels[$daysFromToday] ?? \Carbon\Carbon::parse($dateSlots->first()->appointment_date)->format('l, M j');
                        $slotList = [];

                        foreach ($dateSlots as $slot) {
                            $timeLabel = \Carbon\Carbon::parse($slot->start_time)->format('g:i A');
                            $slotList[] = [
                                'label' => $timeLabel,
                                'free' => true,
                                'url' => route('booking.show', ['id' => $doctor->id, 'clinic_id' => $slot->clinic_id, 'offset' => 0])
                            ];
                        }

                        $appointments[] = [
                            'day' => $dayLabel,
                            'slots' => $slotList
                        ];
                    }

                    // If no slots, show a "No slots available" message
                    if (empty($appointments)) {
                        $appointments[] = [
                            'day' => 'Availability',
                            'slots' => []
                        ];
                    }
                @endphp

                @foreach($appointments as $app)
                    <table class="bg-white border rounded" style="min-width:110px; max-width:120px;">
                        <thead>
                            <tr>
                                <th class="text-center" style="color:#0070cd;">{{ $app['day'] }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($app['slots']) > 0)
                                @foreach($app['slots'] as $slot)
                                    <tr>
                                        <td class="text-center p-1">
                                            <a href="{{ $slot['url'] }}" class="appointment-slot-link d-block">{{ $slot['label'] }}</a>
                                        </tr>
                                    </tr>
                                @endforeach
                                <tr class="book-btn-row">
                                    <td class="text-center p-0" colspan="100">
                                        <a href="{{ $app['slots'][0]['url'] }}" class="book-btn-table d-block fw-bold"
                                            style="background:#dc3545; color:#fff; border-radius:0 0 6px 6px; padding:10px 0; text-decoration:none;">
                                            Book Now
                                        </a>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td class="text-center p-2" style="font-size: 0.8rem; color: #666;">
                                        No slots available
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                @endforeach
            </div>

            <button type="button"
                class="btn btn-light btn-circle btn-sm position-absolute end-0 top-50 translate-middle-y shadow-sm scroll-right"
                style="z-index:2; right:-18px; border: 1px solid #ddd; width:36px; height:36px; display:flex; align-items:center; justify-content:center; font-size:1.5rem;">
                <span style="color:#0070cd;">&#8594;</span>
            </button>
        </div>
    </div>

    <!-- JavaScript for Scroll Buttons -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const scrollContainer = document.querySelector('.appointments-scroll');
            const scrollLeftBtn = document.querySelector('.scroll-left');
            const scrollRightBtn = document.querySelector('.scroll-right');

            scrollLeftBtn.addEventListener('click', () => {
                scrollContainer.scrollBy({ left: -200, behavior: 'smooth' });
            });

            scrollRightBtn.addEventListener('click', () => {
                scrollContainer.scrollBy({ left: 200, behavior: 'smooth' });
            });
        });
    </script>
@endsection