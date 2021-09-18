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

    <!--masonry-layout-->
    <section class="section masonry-layout pt-45">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-columns">
                        @foreach ($posts as $post)
                        <!--Post-1-->
                        <div class="card">
                            <div class="post-card">
                                <div class="post-card-image">
                                    <a href="{{ route('post-details',$post->id ) }}">
                                        <img src="{{ asset('storage/uploads/'.$post->image) }}" alt="{{ $post->title }}">
                                    </a>

                                </div>
                                <div class="post-card-content">
                                    <a href="{{ route('post-details',$post->id ) }}" class="categorie"> {{ $post->category->name }} </a>
                                    <h5>
                                        <a href="{{ route('post-details',$post->id ) }}">{{ $post->title }}   {{ $post->averageRating }}</a>
                                    </h5>


                                    @for ($i = 0; $i < 5; $i++)

                                        @if ($i < round($post->averageRating ))

                                        <span class="fa fa-star checked"></span>
                                        @else
                                        <span class="fa fa-star"></span>
                                        @endif

                                    @endfor




                                    <p class="doted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit quam atque ipsa laborum sunt distinctio...
                                    </p>

                                    <div class="post-card-info">
                                        <ul class="list-inline">
                                            <li>
                                                {{ $post->user->name }}
                                            </li>
                                            <li class="dot"></li>
                                            <li>
                                                <a href="#">Rating: </a>
                                            </li>
                                            <li class="dot"></li>
                                            <li>{{ $post->created_at->diffForHumans() }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/-->
                        @endforeach


                    </div>
                    <!--pagination-->
                    <div class="pagination mt-30">
                        {{ $posts->links('layouts.pagination') }}

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/-->

    <!--newslettre-->
    <section class="newslettre">
        <div class="container-fluid">
            <div class="newslettre-width text-center">

                <div class="social-icones">
                    <ul class="list-inline">
                        <li>
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>Facebook</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-twitter"></i>Twitter </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-instagram"></i>Instagram </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-youtube"></i>Youtube</a>
                        </li>
                    </ul>
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
