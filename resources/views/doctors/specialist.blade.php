@extends('layouts.app')
@section('content')
   <!-- Your page content here -->

<section class="all-specilaisties">
       <div class="row" style="height: calc(100vh - 120px); overflow: hidden;">
    {{-- left side(Fliters) --}}
    <div class="col-md-3 mb-4">
        <div class="position-sticky" style="top: 90px; z-index: 2;">
        <form action="{{route('doctors.search')}}" method="GET" class="filter-sidebar">
            <div class="filter-header">
                Filters
            </div>
            <div class="accordion" id="filtersAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingName">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseName" aria-expanded="true" aria-controls="collapseName">
                            Doctor Name
                        </button>
                    </h2>
                    <div id="collapseName" class="accordion-collapse collapse show" aria-labelledby="headingName" data-bs-parent="#filtersAccordion">
                        <div class="accordion-body">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Doctor Name">
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSpeciality">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSpeciality" aria-expanded="false" aria-controls="collapseSpeciality">
                            Speciality
                        </button>
                    </h2>
                    <div id="collapseSpeciality" class="accordion-collapse collapse" aria-labelledby="headingSpeciality" data-bs-parent="#filtersAccordion">
                        <div class="accordion-body">
                            <select name="speciality" id="speciality" class="form-select">
                                <option value="">Select Speciality</option>
                                <option value="1">Cardiology</option>
                                <option value="2">Dermatology</option>
                                <option value="3">Neurology</option>
                                <option value="4">Pediatrics</option>
                                <option value="5">Orthopedics</option>
                                <option value="6">Gynecology</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingCity">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCity" aria-expanded="false" aria-controls="collapseCity">
                            City
                        </button>
                    </h2>
                    <div id="collapseCity" class="accordion-collapse collapse" aria-labelledby="headingCity" data-bs-parent="#filtersAccordion">
                        <div class="accordion-body">
                            <select name="city" class="form-select">
                                <option value="">-- Select --</option>
                                <option value="Cairo">Cairo</option>
                                <option value="Alexandria">Alexandria</option>
                                <option value="Giza">Giza</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-search w-100">Search</button>
            </div>
        </form>
    </div>
    </div>

    {{-- Right side (Featured Doctors) --}}
    <div class="col-md-9" style="height: 100%; overflow-y: auto;">
         <div class="row">     
           <h4 class="mb-4" >All Specialties</h4>
             @foreach($Doctors as $doctor) 
            {{-- <a href="{{ route('doctors.show', $doctor->id) }}"> --}}
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body d-flex align-items-center">
                    <img src="{{ $doctor->profile_pic ? asset('storage/img/'.$doctor->profile_pic) : asset('storage/img/clinic-medhat--higazi--dentistry_20250612192726555.jpg') }}"
                         alt="Doctor Image" class="rounded-circle me-3" width="80" height="80">
                {{-- Info --}}
                   <div>
                    <h6 style="display: inline">Doctor </h6>
                        <h5 class="card-title ;">{{ $doctor->first_name }} {{ $doctor->last_name }}</h5>
                        <p class="card-text mb-1"><strong>Specialty:</strong> {{ $doctor->speciality }}</p>
                        <p class="card-text mb-1"><strong>City:</strong> {{ $doctor->city }}</p>
                        <p class="card-text mb-1"><strong>Fee:</strong> {{ $doctor->fee }} EGP</p>
                        <p class="card-text"><strong>Experience:</strong> {{ $doctor->experience_years }}</p>
                        {{-- <p class="card-text"><strong>Rating:</strong> {{ $doctor->rating }} / 5</p> --}}
                        <p class="card-text"><strong>Phone:</strong> {{ $doctor->phone }}</p>
                        <p class="card-text"><strong>Address:</strong> {{ $doctor->address }}</p>
                        <p class="card-text"><strong>Bio:</strong> {{ $doctor->bio }}</p>
                   </div>
                    </div>
                </div>
            </div>
        @endforeach
        </a>
    </div>
    </div>
    </div>
</section>

@endsection
