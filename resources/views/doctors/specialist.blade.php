@extends('layouts.app')

@section('content')
<style>
    body {
        background: #f6f7fb;
    }
    .main-content-center {
        min-height: calc(100vh - 120px);
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }
    .filters-col {
        min-width: 320px;
        max-width: 350px;
        flex: 0 0 350px;
    }
    .cards-col {
        flex: 1 1 0;
        min-width: 0;
        max-width: 900px;
    }
    .doctor-card-vezeeta {
        display: flex;
        flex-direction: row;
        align-items: stretch;
        background: #fff;
        border: 1px solid #e3e3e3;
        border-radius: 18px;
        box-shadow: 0 2px 16px 0 rgba(0,0,0,0.07);
        margin-bottom: 32px;
        min-height: 220px;
        padding: 0;
        overflow: hidden;
    }
    .doctor-card-vezeeta .doctor-img-section {
        background: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 180px;
        max-width: 220px;
        padding: 32px 24px;
    }
    .doctor-card-vezeeta .doctor-img-section img {
        width: 140px;
        height: 140px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #e3e3e3;
        background: #fff;
    }
    .doctor-card-vezeeta .doctor-info-section {
        flex: 1 1 0;
        padding: 32px 24px 32px 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .doctor-card-vezeeta .doctor-appointments-section {
        min-width: 260px;
        max-width: 300px;
        background: #f8f9fa;
        border-left: 1px solid #e3e3e3;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: stretch;
        padding: 24px 16px;
        gap: 12px;
    }
    .doctor-card-vezeeta .doctor-appointments-section table {
        width: 100%;
        font-size: 0.95rem;
        margin-bottom: 0;
        background: transparent;
    }
    .doctor-card-vezeeta .doctor-appointments-section th {
        font-weight: 600;
        color: #0070cd;
        background: none;
        border: none;
        padding-bottom: 4px;
    }
    .doctor-card-vezeeta .doctor-appointments-section td {
        padding: 4px 0;
        border: none;
    }
    .doctor-card-vezeeta .doctor-appointments-section .not-free {
        color: #aaa;
        background: #e9ecef;
        border-radius: 6px;
    }
    @media (max-width: 991px) {
        .main-content-center {
            flex-direction: column;
            align-items: stretch;
        }
        .filters-col, .cards-col {
            max-width: 100%;
            min-width: 0;
        }
        .doctor-card-vezeeta {
            flex-direction: column;
        }
        .doctor-card-vezeeta .doctor-img-section,
        .doctor-card-vezeeta .doctor-info-section,
        .doctor-card-vezeeta .doctor-appointments-section {
            max-width: 100%;
            min-width: 0;
            padding: 24px 16px;
        }
        .doctor-card-vezeeta .doctor-appointments-section {
            border-left: none;
            border-top: 1px solid #e3e3e3;
        }
    }
    .appointment-slot-link {
        color: #0070cd;
        background: #eaf4ff;
        border-radius: 6px;
        transition: background 0.2s, color 0.2s;
        text-decoration: none;
        padding: 4px 0;
    }
    .appointment-slot-link:hover {
        background: #0070cd;
        color: #fff;
        text-decoration: none;
   }
    .not-free {
        color: #aaa;
        background: #e9ecef;
        border-radius: 6px;
        padding: 4px 0;
        cursor: not-allowed;
    }
    .appointments-scroll {
        scrollbar-width: none;
    }
    .appointments-scroll::-webkit-scrollbar {
        display: none; 
    }
    .btn-circle {
    border-radius: 50% !important;
    padding: 0 !important;
    }
    /* Make the appointment table a flex column */
.appointment-table {
    display: flex;
    flex-direction: column;
    height: 180px; /* Adjust as needed for your design */
    min-height: 150px;
    width: 100%;
}

/* Make tbody fill the available space and arrange rows vertically */
.appointment-table tbody {
    display: flex;
    flex-direction: column;
    flex: 1 1 auto;
    height: 100%;
}

/* All rows except the book button row take natural height */
.appointment-table tr {
    flex: 0 0 auto;
}

/* The book button row is pushed to the bottom */
.appointment-table .book-btn-row {
    margin-top: auto;
}
    
</style>

<section class="all-specialities">
    <div class="main-content-center">
        {{-- Left side (Filters) --}}
        <div class="filters-col">
            <div class="position-sticky" style="top: 90px; z-index: 2; margin: 20px;">
                <form action="{{ route('doctors.search') }}" method="GET" class="filter-sidebar border rounded bg-white ">
                    <h5 class="mb-3 fw-bold">Filters</h5>
                    <div class="accordion" id="filtersAccordion">
                        {{-- Doctor Name --}}
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingName">
                                <button class="accordion-button px-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseName">
                                    Doctor Name
                                </button>
                            </h2>
                            <div id="collapseName" class="accordion-collapse collapse show">
                                <div class="accordion-body px-0">
                                    <input type="text" name="name" class="form-control" placeholder="Enter Doctor Name">
                                </div>
                            </div>
                        </div>
                        {{-- Speciality --}}
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingSpeciality">
                                <button class="accordion-button collapsed px-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSpeciality">
                                    Speciality
                                </button>
                            </h2>
                            <div id="collapseSpeciality" class="accordion-collapse collapse">
                                <div class="accordion-body px-0">
                                    <select name="speciality" class="form-select">
                                        <option value="">Select Speciality</option>
                                        <option>Cardiology</option>
                                        <option>Dermatology</option>
                                        <option>Neurology</option>
                                        <option>Pediatrics</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- City --}}
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingCity">
                                <button class="accordion-button collapsed px-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCity">
                                    City
                                </button>
                            </h2>
                            <div id="collapseCity" class="accordion-collapse collapse">
                                <div class="accordion-body px-0">
                                    <select name="city" class="form-select">
                                        <option value="">-- Select --</option>
                                        <option value="Cairo">Cairo</option>
                                        <option value="Alexandria">Alexandria</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3">Search</button>
                </form>
            </div>
        </div>

        {{-- Right side (Doctor List) --}}
        <div class="cards-col">
            <h4 class="mb-4 fw-bold">All Specialties</h4>
            <div style="max-height: calc(100vh - 180px); overflow-y: auto; padding-right: 8px;">
                @foreach($Doctors as $doctor)
                    <div class="doctor-card-vezeeta">
                        {{-- 1. Doctor Image --}}
                        <div class="doctor-img-section">
                            <img src="{{ $doctor->profile_pic ? asset('storage/img/'.$doctor->profile_pic) : asset('storage/img/clinic-medhat--higazi--dentistry_20250612192726555.jpg') }}"
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
                            {{-- <div class="mt-3">
                                <a href="#" class="btn btn-outline-primary btn-sm">Book Now</a>
                            </div> --}}
                        </div>
                        {{-- 3. Appointments --}}
                        <div class="doctor-appointments-section position-relative">
                       <button type="button"
                            class="btn btn-light btn-circle btn-sm position-absolute start-0 top-50 translate-middle-y shadow-sm scroll-left"
                            style="z-index:2; left:-18px; border: 1px solid #ddd; width:36px; height:36px; display:flex; align-items:center; justify-content:center; font-size:1.5rem;">
                            <span style="color:#0070cd;">&#8592;</span>
                        </button>
                            <div class="appointments-scroll d-flex flex-row overflow-auto" style="gap:12px; scroll-behavior:smooth; margin:0 24px;">
                                {{-- Example: Replace with your @foreach($doctor->appointments as $day => $slots) --}}
                                @php
                                    $appointments = [
                                        ['day' => 'Yesterday', 
                                            'slots' => [
                                                ['label' => '9:00 AM', 'free' => true, 'url' => route('appointments.register', ['doctor' => $doctor->id, 'time' => '09:00'])],
                                                ['label' => '10:00 AM', 'free' => false, 'url' => '#'],
                                                ['label' => '11:00 AM', 'free' => true, 'url' => route('appointments.register', ['doctor' => $doctor->id, 'time' => '11:00'])],
                                            ]
                                        ],
                                        ['day' => 'Today',
                                            'slots' => [
                                                ['label' => '3:00 PM', 'free' => true, 'url' => route('appointments.register', ['doctor' => $doctor->id, 'time' => '15:00'])],
                                                ['label' => '4:00 PM', 'free' => false, 'url' => '#'],
                                                ['label' => '5:00 PM', 'free' => true, 'url' => route('appointments.register', ['doctor' => $doctor->id, 'time' => '17:00'])],
                                            ]
                                        ],
                                        ['day' => 'Tomorrow',
                                            'slots' => [
                                                ['label' => '2:00 PM', 'free' => true, 'url' => route('appointments.register', ['doctor' => $doctor->id, 'time' => '14:00'])],
                                                ['label' => '3:00 PM', 'free' => false, 'url' => '#'],
                                            ]
                                        ],                                    
                                        ['day' => 'After Tomorrow', 
                                         'slots' => [
                                                ['label' => '3:00 PM', 'free' => true, 'url' => route('appointments.register', ['doctor' => $doctor->id, 'time' => '15:00'])],
                                                ['label' => '4:00 PM', 'free' => false, 'url' => '#'],
                                                ['label' => '5:00 PM', 'free' => true, 'url' => route('appointments.register', ['doctor' => $doctor->id, 'time' => '17:00'])],
                                            ]
                                        ],
                                        ['day' => 'Next Day', 
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
                                                <a href="{{ $firstFree['url'] }}"
                                                class="book-btn-table d-block fw-bold"
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
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection



<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.doctor-appointments-section').forEach(function(section) {
        const scrollDiv = section.querySelector('.appointments-scroll');
        const btnLeft = section.querySelector('.scroll-left');
        const btnRight = section.querySelector('.scroll-right');
        if (!scrollDiv || !btnLeft || !btnRight) return;

        btnLeft.addEventListener('click', function() {
            scrollDiv.scrollBy({ left: -130, behavior: 'smooth' });
        });
        btnRight.addEventListener('click', function() {
            scrollDiv.scrollBy({ left: 130, behavior: 'smooth' });
        });
    });
});
</script>


