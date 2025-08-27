@extends('layouts.app')

@section('content')

<!-- ===== Hero / Search Section ===== -->
<section class="hero bg-light text-center py-5">
    <div class="container">
        <h1 class="mb-4">Find the Best Doctors Near You</h1>
        <form action="{{ route('doctors.search') }}" method="GET" class="row g-2 justify-content-center">
            <div class="col-md-5">
                <input type="text" name="name" class="form-control" placeholder="Doctor's name" value="{{ request('name') }}">
            </div>
            <div class="col-md-3">
                <input type="text" name="specialty" class="form-control" placeholder="Specialty" value="{{ request('specialty') }}">
            </div>
            <div class="col-md-3">
                <input type="text" name="city" class="form-control" placeholder="City" value="{{ request('city') }}">
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary w-100">Search</button>
            </div>
        </form>
    </div>
</section>

<!-- ===== Featured Doctors ===== -->
<section class="featured-doctors container my-5">
    <h2 class="mb-4 text-center">Featured Doctors</h2>
    <div class="row">
        @forelse($doctors as $doctor)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm text-center p-3">
                    <div class="doctor-img-wrapper mx-auto mb-3">
                        <img src="{{ $doctor->profile_pic 
                                    ? asset('storage/' . $doctor->profile_pic) 
                                    : asset('storage/img/clinic-medhat--higazi--dentistry_20250612192726555.jpg') }}"
                             alt="{{ $doctor->first_name }} {{ $doctor->last_name }}"
                             class="rounded-circle doctor-img"
                             style="width: 120px; height: 120px; object-fit: cover;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $doctor->first_name }} {{ $doctor->last_name }}</h5>
                        <p class="card-text">{{ $doctor->specialty }}</p>
                        <p class="card-text">{{ $doctor->city }}</p>
                        <a href="{{ route('doctors.show', $doctor->id) }}" class="btn btn-success">Book Now</a>
                    </div>
                
                </div>
            </div>
        @empty
            <p class="text-center">No doctors found. Try searching above.</p>
        @endforelse
    </div>
</section>

<!-- ===== Popular Specialties ===== -->
<section class="popular-specialties bg-light py-5">
    <div class="container text-center">
        <h2 class="mb-4">Popular Specialties</h2>
        <div class="row justify-content-center">
            @foreach($specialties as $spec)
                <div class="col-md-2 mb-3">
                    <a href="{{ route('doctors.search', ['specialty' => $spec]) }}" class="btn btn-outline-primary w-100">{{ $spec }}</a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ===== How it Works ===== -->
<section class="how-it-works container my-5 text-center">
    <h2 class="mb-4">How It Works</h2>
    <div class="row">
        <div class="col-md-4 mb-3">
            <i class="bi bi-search display-4 mb-2"></i>
            <h5>Search Doctors</h5>
            <p>Find the best doctors by specialty, name, or city.</p>
        </div>
        <div class="col-md-4 mb-3">
            <i class="bi bi-calendar-check display-4 mb-2"></i>
            <h5>Book Appointment</h5>
            <p>Choose a time that suits you and book instantly.</p>
        </div>
        <div class="col-md-4 mb-3">
            <i class="bi bi-heart-pulse display-4 mb-2"></i>
            <h5>Get Treated</h5>
            <p>Visit your doctor and receive top-quality care.</p>
        </div>
    </div>
</section>

@endsection

   