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
                            <h3 class="mb-0">Create Post</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route("store-post") }}" enctype="multipart/form-data" autocomplete="off" _lpchecked="1">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                  </div>

                                  @if ($errors->has('title'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                  @endif
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-category">Category</label>
                                    <select name="category" id="category" class="form-control form-control-alternative">
                                        <option value="">{{ __('Select Category') }}</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                         @endforeach
                                    <select>
                                  </div>
                                  @if ($errors->has('category'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                  @endif
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-image">Image</label>
                                    <input type="file" name="image" id="input-image" class="form-control form-control-alternative" placeholder="Image">
                                  </div>

                                  @if ($errors->has('image'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                  @endif
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-file">Status</label>

                                    <select name="status" id="status" class="form-control form-control-alternative">
                                        <option value="">{{ __('Select Status') }}</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                     <select>
                                  </div>
                                  @if ($errors->has('status'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                  @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-tags">Tags</label>
                                    <select id="tags" class="form-control form-control-alternative js-example-basic-multiple" name="tags[]" multiple="multiple">
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                                         @endforeach
                                      </select>
                                  </div>
                                  @if ($errors->has('tags'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('tags') }}</strong>
                                    </span>
                                  @endif
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">

                                  </div>
                                </div>
                            </div>


                            <textarea class="form-control" id="post" name="post"></textarea>
                            @if ($errors->has('post'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('post') }}</strong>
                                </span>
                                
                             @endif

                            <div class="pl-lg-4">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Save</button>
                                </div>
                            </div>
                        </form>
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
