<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title', 'Vezeeta')</title>
    <link rel="icon" href="{{ asset('storage/img/vezeeta_logo.jpg') }}" type="image/jpeg">

    <!-- Bootstrap & Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;600&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #fbf7f3;
            /* soft cream */
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
            max-width: 880px;
            /* control width */
            margin: 36px auto;
            /* center */
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
            padding: 30px;
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

        .btn-facebook:hover {
            background-color: #324b81;
        }

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

        .btn-primary,
        .btn-danger {
            border-radius: 8px;
        }

        /* fix for smaller screens */
        @media (max-width: 576px) {
            .register-card {
                margin: 18px 12px;
                padding: 18px;
            }

            #mainNavigation .nav-link {
                font-size: 14px;
                padding: 8px 10px;
            }
        }


        /*booking form*/

        .booking-form.card-header {
            background-color: #0070CC;
        }

        .booking-form h5 {
            font-size: 15px;
        }

        .booking-form .card-body {
            margin: 5px 20px;
            padding: 5px 20px;
        }

        .booking-form .card-body h6 {
            font-size: 14px;
        }

        .booking-form .card-body h6 p {
            margin-bottom: 10px;
        }

        .booking-form .fees,
        .booking-form .waiting-time,
        .booking-form .points {
            font-size: 14px;
            color: #808184;
        }

        .horizontal-scroll-container::-webkit-scrollbar {
            display: none;
            /* Hide scrollbar for WebKit browsers */
        }

        .horizontal-scroll-container {
            -ms-overflow-style: none;
            /* Hide scrollbar for IE/Edge */
            scrollbar-width: none;
            /* Hide scrollbar for Firefox */
        }

        .booking-form .clinics-bar button {
            background-color: white;
            color: #ABCAEC;
            border-color: white;
        }

        .booking-form .clinics-bar .clinic-name {
            border: none;
            box-shadow: none;
            text-align: center;
            color: #0070CC;
            justify-content: space-around;
        }

        .booking-form .clinics-bar {
            align-items: center;
        }

        .booking-form .clinic-info {
            color: #74746F;
            font-size: 14px;
        }

        .booking-form .clinic-info .clinic-location {
            font-weight: lighter;
        }

        .booking-form .clinic-info .book-now {
            color: #74746F;
            font-weight: bolder;
        }




        .appointment-container {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            max-width: 100%;
        }

        .appointment-container p {
            font-size: 18px;
            font-weight: 600;
            line-height: 50px;
        }



        .days {
            display: flex;
            justify-content: center;
            align-items: center;

            /* margin-top: 0px; */
            padding: 25px 48px;
            background-color: #F5F5F5;
        }


        .appointment-container .days {
            max-width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px 48px;
            background-color: #F5F5F5;
            gap: 20px;



        }

        .appointment-container .days .scroll-button {
            /*height: 40px;*/
            height: fit-content;
            vertical-align: center;
            width: 40px;
            border-radius: 5px;
            background-color: white;
            color: #0070CC;
            /*vertical-align: middle;*/
            border: lightgray solid 1px;


        }

        .day-card {
            /*width: 150px;*/
            flex: 1 1 200px;
            min-height: 350px;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-width: 100px;
            background-color: white;
        }

        .day-header {
            background-color: #0066cc;
            color: white;
            padding: 5px;
            font-weight: bold;
            font-size: 14px;
        }

        .times {
            padding: 10px;
            color: #0066cc;
        }

        .time-slot {
            cursor: pointer;
            padding: 3px;
            transition: background 0.2s;
            display: flex;
            justify-self: center;
        }

        .time-slot:hover {
            background: #0070CC;
            color: white;
            border-radius: 5px;
        }

        .more-link {
            display: block;
            margin-top: 5px;
            font-size: 0.9rem;
            text-decoration: underline;
            cursor: pointer;
        }

        .book-btn {
            background-color: #EE0E0F;
            color: white;
            border: none;
            width: 100%;
            padding: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .booked-slot {
            color: #888;
            pointer-events: none;
            /* disables click */
            cursor: default;
            /* no pointer hand */
            text-decoration: line-through;
        }

        .available-slot {
            text-decoration: none;
        }

        .show-more {
            color: #0070CC;

        }

        .show-more:hover {
            background: #0070CC !important;
            color: white !important;
        }

        .selected-clinic {
            border-bottom: solid #0065CC;

            text-decoration: underline #0065CC;
            font-weight: bolder;
            text-underline-offset: 4px;
            padding-bottom: 2px;
        }





        .time-slot-input {
            display: none;
        }

        .time-slot-label {
            display: inline-block;
            padding: 10px 16px;
            margin: 5px;
            background: white;
            border: 2px solid #0070CC;
            border-radius: 8px;
            color: #0070CC;
            font-weight: 500;
            cursor: pointer;
            transition: 0.2s;
        }

        /* Selected slot style */
        .time-slot-input:checked+.time-slot-label {
            background: #0070CC;
            color: white;
        }

        /*!* Hover effect *!*/
        .time-slot-label:hover {
            background: #e6f0fa;
        }

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
            box-shadow: 0 2px 16px 0 rgba(0, 0, 0, 0.07);
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

            .filters-col,
            .cards-col {
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
            height: 180px;
            /* Adjust as needed for your design */
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

</head>

<body>

    @include('parts.navbar')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <main>
        @yield('content')
    </main>

    @include('parts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
