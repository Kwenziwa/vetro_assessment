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

    <!--post-default-->
    <section class="section pt-55 ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mb-20">
                    <!--Post-single-->

                    <div class="post-single">
                        @if(!empty($post))

                        <div class="post-single-image">
                            <img src="{{ asset('storage/uploads/'.$post->image) }}" alt="">
                        </div>
                        <div class="post-single-content">
                            <a href="#" class="categorie">{{ $post->category->name }}</a>
                            <h4>{{  $post->title  }} </h4>
                            <div class="post-single-info">
                                <ul class="list-inline">
                                    <li><a href="#">{{ $post->user->name }}</a> </li>
                                    <li class="dot"></li>
                                    <li>{{ $post->created_at->diffForHumans() }}</li>
                                    <li class="dot"></li>
                                    <li>
                                        @for ($i = 0; $i < 5; $i++)

                                        @if ($i < round($post->averageRating ))

                                        <span class="fa fa-star checked"></span>
                                        @else
                                        <span class="fa fa-star"></span>
                                        @endif

                                    @endfor
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="post-single-body">

                            {!! $post->post !!}

                        </div>

                        <form action="{{ route('rating-post')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="card">
                            <div class="container-fliud">
                                <div class="wrapper row">
                                    <div class="details col-md-6">
                                        <div class="rating">
                                            <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $post->userAverageRating }}" data-size="xs">
                                            <input type="hidden" name="id" required="" value="{{ $post->id }}">

                                            <button class="btn btn-success">Submit Review</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                        @endif



                        <div class="post-single-footer">
                            <div class="tags">
                                <ul class="list-inline">
                                    @if(!empty($post))
                                    @foreach ($post->tags as $tag)
                                    <li>
                                        <a href="#">#{{ $tag->name }}</a>
                                    </li>
                                    @endforeach
                                    @endif


                                </ul>
                            </div>
                            <div class="social-media">
                                <ul class="list-inline">
                                    <li>
                                        <a href="#" class="color-facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="color-instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="color-twitter">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="color-youtube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="color-pinterest">
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> <!--/-->

                    <!--next & previous-posts-->
                    @if (!empty($post))

                    <div class="row">

                        @if (previousPost($post->id))
                        <div class="col-md-6">
                            <div class="widget">
                                <div class="widget-next-post">
                                    <div class="small-post">
                                        <div class="image">
                                            <a href="{{  route('post-details',previousPost($post->id)->id )  }}">
                                            <img src="{{ asset('storage/uploads/'.previousPost($post->id)->image) }}" alt="...">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <div>
                                                <a class="link" href="{{  route('post-details',previousPost($post->id)->id )  }}"><i class="arrow_left"></i>Preview post</a>
                                            </div>
                                            <a href="{{  route('post-details',previousPost($post->id)->id )  }}">{{ previousPost($post->id)->title }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if (nextPost($post->id))
                        <div class="col-md-6">
                            <div class="widget">
                                <div class="widget-previous-post">
                                    <div class="small-post">
                                        <div class="image">
                                            <a href="{{ route('post-details',nextPost($post->id)->id ) }}">
                                                <img src="{{ asset('storage/uploads/'.nextPost($post->id)->image) }}" alt="...">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <div>
                                                <a class="link" href="{{ route('post-details',nextPost($post->id)->id ) }}">
                                                    <span> Next post</span>
                                                    <span class="arrow_right"></span>
                                                </a>
                                            </div>
                                            <a href="{{ route('post-details',nextPost($post->id)->id ) }}">{{ nextPost($post->id)->title }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endif

                    </div>


                   <!--/-->

                    <!--widget-comments-->

                </div>
                <div class="col-lg-4 max-width">
                    <!--widget-author-->
                    <div class="widget">
                        <div class="widget-author">
                            <a href="#" class="image">
                                <img src="{{ asset('storage/uploads/'.$post->image) }}" alt="">
                            </a>
                            <h6>
                                <span>Author: {{ $post->user->name }}</span>
                            </h6>
                            <p>


                        </p>
                        </div>
                    </div>
                    <!--/-->
                    @endif
                    <!--widget-latest-posts-->
                    <div class="widget ">
                        <div class="section-title">
                            <h5>Latest Posts</h5>
                        </div>
                        <ul class="widget-latest-posts">

                            @foreach ($latest_posts as $latest_post)

                            <li class="last-post">
                                <div class="image">
                                    <a href="p{{ route('post-details',$latest_post->id ) }}">
                                        <img src="{{ asset('storage/uploads/'.$latest_post->image) }}" alt="...">
                                    </a>
                                </div>
                                <div class="nb">{{ $loop->index + 1 }}</div>
                                <div class="content">
                                    <p><a href="{{ route('post-details',$latest_post->id ) }}">{{ $latest_post->title }}</a></p>
                                    <small><span class="icon_clock_alt"></span> {{ $latest_post->created_at->diffForHumans() }}</small>
                                </div>
                            </li>

                            @endforeach


                        </ul>
                    </div>
                    <!--/-->

                    <!--widget-categories-->
                    <div class="widget">
                        <div class="section-title">
                            <h5>Categories</h5>
                        </div>
                        <ul class="widget-categories">

                            @foreach ($categories as $category)
                            <li>
                                <a href="#" class="categorie">{{ $category->name }}</a>
                                <span class="ml-auto">{{ $category->posts_count }}</span>
                            </li>
                            @endforeach


                        </ul>
                    </div><!--/-->


                    <!--widget-tags-->
                    <div class="widget">
                        <div class="section-title">
                            <h5>Tags</h5>
                        </div>
                        <div class="widget-tags">
                            <ul class="list-inline">

                                @foreach ($tags as  $tag)

                                <li>
                                    <a href="#">{{ $tag->name }}</a>
                                </li>

                                @endforeach


                            </ul>
                        </div>
                    </div>
                    <!--/-->
                </div>
            </div>
        </div>
    </section>
    <!--/-->

    <!--/-->



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



