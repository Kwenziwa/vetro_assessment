<!doctype html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- favicon -->
    <link rel="icon" sizes="16x16" href="assets/img/favicon.png">

    <!-- Title -->
    <title> {{ config('app.name', 'Argon Dashboard') }} </title>

    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="{{ asset('/assets/css/all.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/css/elegant-font-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/css/owl.carousel.css')}}">

    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/css/custom.css')}}">
</head>

<body>


    @yield('content')

     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="{{ asset('/assets/js/jquery-3.5.0.min.js')}}"></script>
     <script src="{{ asset('/assets/js/popper.min.js')}}"></script>
     <script src="{{ asset('/assets/js/bootstrap.min.js')}}"></script>

     <!-- JS Plugins  -->
     <script src="{{ asset('/assets/js/ajax-contact.js')}}"></script>
     <script src="{{ asset('/assets/js/owl.carousel.min.js')}}"></script>
     <script src="{{ asset('/assets/js/switch.js')}}"></script>

     <!-- JS main  -->
     <script src="{{ asset('/assets/js/main.js')}}"></script>


 </body>
 </html>

