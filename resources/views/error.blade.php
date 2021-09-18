@extends('layouts.front')

@section('content')


    <!--loading -->
    <div class="loading">
        <div class="circle"></div>
    </div>
    <!--/-->

    <!-- Navigation-->
    @include('layouts.navbars.front')
    <!--/-->

    <!--Page404-->
    <section class="section pt-55 mb-50">
        <div class="container-fluid">
            <div class="page404  widget">
                <div class="image">
                    <img src="assets/img/404.html" alt="">
                </div>
                <div class="content">
                    <h1>404</h1>
                    <h3>Page Not Found.</h3>
                    <p>It looks like nothing was found at this location. </p>
                    <a href="{{ route('welcome') }}" class="btn-custom">Go back to Home</a>
                </div>
            </div>
        </div>
    </section>


    <!--footer-->
    @include('layouts.footers.front')
     <!--/-->

    <!--Search-form-->
    <div class="search">
        <div class="container-fluid">
            <div class="search-width  text-center">
                <button type="button" class="close">
                    <i class="icon_close"></i>
                </button>
                <form class="search-form" action="#">
                    <input type="search" value="" placeholder="What are you looking for?">
                    <button type="submit" class="search-btn">search</button>
                </form>
            </div>
        </div>
    </div>
    <!--/-->
    @endsection
