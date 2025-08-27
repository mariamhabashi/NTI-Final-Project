@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Contact Us</h2>

    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif

    <div class="row">
        {{-- Contact Form --}}
        <div class="col-md-6 mb-4">
            <form action="{{route('contact.send')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                  @csrf
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    @error('message')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </form>
        </div>
    </div>

        <!-- Contact Info -->
        <div class="col-md-6">
            <h5>Our Contact Info</h5>
            <p><strong>Email:</strong> support@youstique.com</p>
            <p><strong>Phone:</strong> +20 123 456 7890</p>
            <p><strong>Address:</strong> Cairo, Egypt</p>
            <p><strong>Working Hours:</strong> Mon – Fri, 9:00 AM – 6:00 PM</p>
        </div>
    </div>
</div>
@endsection
