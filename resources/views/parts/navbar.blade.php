<nav id="mainNavigation" class="navbar navbar-expand-lg navbar-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ isset(auth()->user()->is_admin) && auth()->user()->is_admin ? route('admin.doctors.index') : url('/') }}">
            <img src="{{ asset('storage/img/vezeeta_logo.jpg') }}" alt="Logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                 @auth
                 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if(auth()->user()->is_admin)
                                <li><a class="dropdown-item" href="{{ route('admin.doctors.index') }}">Admin Dashboard</a></li>
                            @else
                            <li><a class="dropdown-item" href="{{ route('my-profile', auth()->user()) }}">My Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('appointments.index') }}">My Appointments</a></li>
                            <li><a class="dropdown-item" href="#">My Insurance</a></li>
                            @endif
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">Logout</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Sign Up</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                @endguest
                <li class="nav-item"><a class="nav-link active" href="#">Vezeeta For Doctors</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact Us</a></li>
                @auth
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
