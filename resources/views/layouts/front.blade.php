<!doctype html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />

    <!-- favicon -->
    <link rel="icon" sizes="16x16" href="assets/img/favicon.png">

    <!-- Title -->
    <title> {{ config('app.name', 'Vetro Dashboard') }} </title>

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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
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
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



 </body>
 </html>

