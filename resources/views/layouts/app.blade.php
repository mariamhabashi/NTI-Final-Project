<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('title', 'Vezeeta')</title>
    <link rel="icon" href="{{ asset('storage/img/vezeeta_logo.jpg') }}" type="image/jpeg">

    <!-- Bootstrap & Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;600&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }
        body {
            background-color: #fbf7f3; /* soft cream */
            color: #222;
            font-family: 'Cabin', sans-serif;
                overflow-x: hidden;
        }

        /* NAVBAR */
        #mainNavigation {
            background-color: #0070cd;
        }
        #mainNavigation .navbar-brand img {
            height: 44px;
        }
        #mainNavigation .nav-link {
            color: #fff;
            font-size: 15px;
            padding: 10px 14px;
            font-weight: 500;
        }
        #mainNavigation .nav-link:hover,
        #mainNavigation .nav-link.active {
            color: #c7bfd9;
        }

        /* SPECIFIC CARD FOR REGISTER (don't override all .card) */
        .register-card {
            max-width: 880px;      /* control width */
            margin: 36px auto;     /* center */
            border-radius: 12px;
            overflow: hidden;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .card img {
            border-radius: 12px 12px 0 0;
            width: 25%;
            height: 25%;
            padding: 30px ;
        }
        .card-body {
            margin: 20px;
            padding: 20px;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .card-text {
            color: #666;
            margin-bottom: 15px;
        }


        footer {
            background-color: #bbc9bb;
        }
        .filter-sidebar {
            background: #fff;
        }

        /* form visuals */
        .register-card h3 {
            font-weight: 600;
            margin-bottom: 18px;
            color: #222;
        }
        .btn-facebook {
            background-color: #3b5998;
            border: none;
            font-weight: 600;
            border-radius: 8px;
            padding: 10px 14px;
        }
        .btn-facebook:hover { background-color: #324b81; }

        .or-divider {
            display: flex;
            align-items: center;
            gap: .75rem;
            margin: 22px 0;
            color: #6b6b6b;
        }
        .or-divider::before,
        .or-divider::after {
            content: "";
            height: 1px;
            background: #e6e6e6;
            flex: 1;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px 12px;
            box-shadow: none;
        }

        .btn-primary, .btn-danger {
            border-radius: 8px;
        }

        /* fix for smaller screens */
        @media (max-width: 576px) {
            .register-card { margin: 18px 12px; padding: 18px; }
            #mainNavigation .nav-link { font-size: 14px; padding: 8px 10px; }
        }
    </style>
</head>
<body>

@include('parts.navbar')

<main>
    @yield('content')
</main>

@include('parts.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
