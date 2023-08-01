@extends('admin.master')


@section('title')
    show user page

@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12  ">
                    <div class="row">
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                            {{-- <a href="{{ route('admin.home.promotion') }}" class="btn btn-outline-primary shadow">Promotion*</a> --}}

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Promotion
                              </button>
                              <form action="{{ route('admin.home.promotion',['id'=>$user->id]) }}" method="post">
                                @csrf
                              <!-- Modal -->
                              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Employee Promotion</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4 class="text-success text-center">{{ Session::get('message') }}</h4>

                                        <div class="row mb-3">
                                            <label class="col-md-3">Designation</label>
                                            <div class="col-md-9">
                                                <select class="form-select col-md-12 form-control" aria-label="Default select example" id="designation" name="designation">
                                                    @foreach ($designations as $designation)
                                                        <option value="{{ $designation->id }}"{{ $designation->id == $user->designation ? 'selected' : '' }}>
                                                            {{ $designation->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Promote</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4 card shadow ">
                        <img src="{{ asset('/') }}{{ $user->image }}" height="300" width="270" alt="">
                    </div>
                    <div class="col-md-8">
                        <h4>Name : {{ $user['name'] }}</h4>
                        <h4>Email : {{ $user['email'] }}</h4>
                        <h4>Mobile : {{ $user['mobile'] }}</h4>
                        <h4>Designation : {{ $user['designation_name'] }}</h4>
                        <h4>Joined Date : {{ $user['joined_date'] }}</h4>
                        <h4>Description : {{ $user['description'] }}</h4>
                    </div>
                </div>
                </div>
            </div>
        </div>

    </section>

@endsection
