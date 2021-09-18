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
                            <h3 class="mb-0">Edit Post</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route("update-post" , $post->id) }}" enctype="multipart/form-data" autocomplete="off" _lpchecked="1">
                            @method('POST')
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="form-control-label" for="input-title">Title</label>
                                    <input type="text" class="form-control" value="{{ old('title', $post->title) }}" id="title" name="title">
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
                                        @foreach($categories as $category)

                                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }} >{{ $category->name }}</option>

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
                                        <option value="1" {{ $post->status ==1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $post->status ==0 ? 'selected' : '' }}>Inactive</option>
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

                                            @if(selectedTags($post->id, $tag->id)))
                                                <option  value="{{ $tag->name }}" selected>{{ $tag->name }}</option>
                                            @else
                                                <option  value="{{ $tag->name }}">{{ $tag->name }}</option>
                                            @endif

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

                                    <div class="card" style="width: 50%;">
                                        <img class="card-img-top" src="{{ asset('storage/uploads/'.$post->image) }}" alt="Card image cap">
                                      </div>

                                  </div>
                                </div>
                            </div>

                            @if ($errors->has('post'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('post') }}</strong>
                            </span>
                          @endif
                            <textarea class="form-control" id="post" name="post">{{ old('post', $post->post) }}</textarea>

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
