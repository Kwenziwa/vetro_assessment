@extends('layouts.app')

@section('content')
    @include('layouts.headers.stripe')



    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0">
                <h3 class="mb-0">Posts List</h3>

                <div class="text-right">
                    <a href="{{ route('create-posts') }}" class="btn btn-lg btn-neutral">ADD NEW POST</a>
                  </div>
              </div>
              <!-- Light table -->
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">ID</th>
                      <th scope="col" class="sort" data-sort="budget">Title</th>
                      <th scope="col" class="sort" data-sort="status">Status</th>
                      <th scope="col">Image</th>
                      <th scope="col" class="sort" data-sort="completion">Category</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    @foreach ($posts as $post)
                    <tr>
                       <td class="budget">
                          {{ $post->id }}
                        </td>
                      <th scope="row">
                        <div class="media align-items-center">

                          <div class="media-body">
                            <span class="name mb-0 text-sm">{{ $post->title }}</span>
                          </div>
                        </div>
                      </th>

                      <td>
                        <span class="badge badge-dot mr-4">
                          <span class="badge {{ $post->status ==1 ? 'badge-success' : 'badge-danger' }}">
                            {{ $post->status ==1 ? 'Active' : 'Inactive' }}
                         </span>

                        </span>
                      </td>
                      <td>
                        <div class="avatar-group">
                          <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                            <img alt="Image placeholder" src="{{ asset('storage/uploads/'.$post->image) }}">
                          </a>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <span class="completion mr-2">{{ $post->category->name }}</span>

                        </div>
                      </td>
                      <td class="">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="{{ route('show-post',$post->id ) }}">View</a>
                            <a class="dropdown-item" href="{{ route('edit-post',$post->id ) }}">Edit</a>
                            <form action="{{ route('delete-post', $post->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                              <input type="hidden" name="_method" value="DELETE">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="submit" class=" btn-sm dropdown-item" value="Delete">
                          </form>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>





              </div>
              <!-- Card footer -->
              <hr>
              <div class="row">
                <div class="col-12 d-flex justify-content-center text-center">
                    {{$posts->links("pagination::bootstrap-4")}}

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
