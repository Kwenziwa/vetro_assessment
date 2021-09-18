@extends('layouts.app')

@section('content')
    @include('layouts.headers.stripe')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">View Post</h3>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="row pl-4">
                              <div class="col-md-6">
                                <div class="form-group">
                                    <h1>{{ $post->title }}</h1>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary">
                                        <span>{{ $post->category->name }}</span>
                                      </button>
                                </div>
                              </div>
                            </div>

                            <div class="row p-5">
                                <img class="card-img-top"  src="{{ asset('storage/uploads/'.$post->image) }}" alt="">

                            </div>

                            <div class="row p-5">

                               {!! $post->post !!}



                            </div>

                            <div class="row pl-5">
                                @foreach ($post->tags as $tag)
                               <a href="#" class="btn btn-secondary btn-sm">#{{ $tag->name }}</a>
                               @endforeach
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
