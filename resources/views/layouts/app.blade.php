<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vezeeta</title>
    <link rel="icon" href="{{ asset('storage/img/vezeeta_logo.jpg') }}" type="image/jpeg">


    <!-- Bootstrap & Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;600&display=swap" rel="stylesheet">
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
        body {
            background-color: #fdfaf6;
            color: #000000;
            font-family: 'Cabin', sans-serif;
                overflow-x: hidden;
        }

        #mainNavigation {
            background-color:rgb(0, 112, 205);
            padding: 15px 10px;
        }

        .navbar-brand span {
            color: #fff;
            font-size: 20px;
        }

        .nav-item a {   
            font-size: 20px;
            padding: 100px
            color: #fff;
            font-weight: 500;
            justify-content: space-between;
        }

        .nav-item a:hover,
        .nav-item .active {
            color: #c7bfd9 !important;
        }

        .dropdown-menu {
            background-color: #b8c9b8;
        }

        .dropdown-item:hover {
            background-color: #c7bfd9;
            color: #fff !important;
        }
        /* .product-image {
            height: 300px;            
            object-fit: cover;        
            width: 100%;              
            border-radius: 8px;      
        }
        .brand-slider {
        overflow: hidden;
        white-space: nowrap;
        /* background-color: #b8c9b8; light pink for Youstique */
        /* padding: 20px 0; */
        /* } */ 

        /* .logo-group {
        display: inline-block;
        animation: slide 20s linear infinite;
        }

        .logo-group i {
        font-size: 2.5rem;
        margin: 0 40px;
        color: #000000; /* Youstique main color */
        /* transition: transform 0.3s ease;
        } */

        /* .logo-group i:hover { 
        transform: scale(1.2);
        color: #a61e62;
        } */
/* 
        form {
            margin: 25px ;
            background-color: #fff;
            border-radius: 10px;
            width: 100%;
        } */
        form h5{
            margin-bottom: 20px;
            background-color: rgb(0, 112, 205);
            color: #fff;
            padding: 10px;
            border-radius: 5px;
        }
        .all-specialties {
            padding: 20px;
            background-color: #f8f9fa;
        }
        .all-specialties h4 {
            margin-bottom: 20px;
            color: #333;
        }
        .card {
            margin: 20px;
            width: 1000px;
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
            border-radius: 12px;
            box-shadow: 0 2px 16px 0 rgba(0,0,0,0.07);
            border: 1px solid #e3e3e3;
            padding: 0;
            margin: 0;
        }
        .filter-header {
            background: #0070cd;
            color: #fff;
            font-weight: 600;
            font-size: 1.2rem;
            padding: 18px 24px;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            margin-bottom: 0;
        }
        #filtersAccordion {
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
            padding: 0 16px 16px 16px;
        }
        .accordion-item {
            border: none;
            border-bottom: 1px solid #e3e3e3;
        }
        .accordion-item:last-child {
            border-bottom: none;
        }
        .accordion-button {
            background: none;
            font-weight: 500;
            color: #0070cd;
            padding-left: 0;
        }
        .accordion-button:not(.collapsed) {
            color: #0070cd;
            background: none;
            box-shadow: none;
        }
        .accordion-body {
            padding-left: 0;
            padding-right: 0;
        }
        .btn-search {
            background: #0070cd;
            color: #fff;
            font-weight: 600;
            border-radius: 8px;
            margin-top: 12px;
        }
        .btn-search:hover {
            background: #005fa3;
            color: #fff;
        }
        
    </style>
</head>
<body>
    
@include('parts.navbar')

@yield('content')

@include('parts.footer')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

