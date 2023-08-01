

@extends('admin.master')

@section('title')
    Add user page

@endsection
@section('body')
    <section>
        @if(session('success'))
            <script>
                toastr.success('{{ session('success') }}');
            </script>
         @endif
        <div class="row">
            <div class="col-md-12  mx-auto">
                <div class="card shadow">
                    <div class="card-header text-center"><h4>Add User</h4></div>
                    <div class="card-body">
                        <h4 class="text-success text-center">{{ Session::get('message') }}</h4>
                        <form action="{{ route('admin.home.create') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- <input type="hidden" name="users_id" value="{{Auth::id() }}"> --}}
                            <div class="row mb-3">
                                <label class="col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control"  name="name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Email</label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Mobile</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="mobile">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Password</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">User Type</label>
                                <div class="col-md-9">
                                    <select class="form-select col-md-12 form-control" aria-label="Default select example" id="user_type" name="user_type">
                                        <option selected >---- select menu ----</option>
                                        @foreach ($userTypes as $userType)
                                            <option value="{{ $userType->id }}">{{ $userType->name }}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Designation</label>
                                <div class="col-md-9">
                                    <select class="form-select col-md-12 form-control" aria-label="Default select example" id="designation" name="designation">
                                        <option selected >---- select menu ----</option>
                                        @foreach ($designations as $designation)
                                            <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Joining Date</label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="joined">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-3">Description</label>
                                <div class="col-md-9">
                                    <textarea name="description" id="" cols="115" rows="5"></textarea>
                                    {{-- <input type="number" class="form-control" name="mobile"> --}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Image</label>
                                <div class="col-md-9">
                                    <input type="file"  name="image">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-md-3"></label>
                                <div class="col-md-9">
                                    <input type="submit" class="btn btn-outline-success"  value="Create new User">
                                </div>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
        
    </section>


@endsection
