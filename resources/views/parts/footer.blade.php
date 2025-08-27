<footer class="bg-dark text-white pt-5 pb-3 mt-5">
    <div class="container">
        <div class="row">

            {{-- About --}}
            <div class="col-md-3 mb-3">
                <h5 class="mb-3">About Vezeeta</h5>
                <p>Your trusted platform to find and book appointments with top doctors easily.</p>
            </div>

            {{-- Quick links --}}
            <div class="col-md-3 mb-3">
                <h5 class="mb-3">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a></li>
                    <li><a href="{{ route('doctors.index') }}" class="text-white text-decoration-none">Doctors</a></li>
                    {{-- <li><a href="{{ route('my-profile', auth()->user()) }}" class="text-white text-decoration-none">My Profile</a></li> --}}
                    <li><a href="{{ route('doctors.search') }}" class="text-white text-decoration-none">Search</a></li>
                </ul>
            </div>

            {{-- Contact Info --}}
            <div class="col-md-3 mb-3">
                <h5 class="mb-3">Contact</h5>
                <p>Email: support@veezeta.com</p>
                <p>Phone: +20 123 456 7890</p>
                <p>Address: Cairo, Egypt</p>
            </div>

            {{-- Social media --}}
            <div class="col-md-3 mb-3">
                <h5 class="mb-3">Follow Us</h5>
                <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
                <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-white"><i class="bi bi-linkedin"></i></a>
            </div>

        </div>
        <hr class="bg-white">
        <div class="text-center">
            &copy; {{ date('Y') }} Vezeeta. All rights reserved.
        </div>
    </div>

</footer>


    
</body>
</html> 