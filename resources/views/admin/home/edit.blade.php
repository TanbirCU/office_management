@extends('admin.master')

@section('title')
    user edit page

@endsection

@section('body')
<section>
    <div class="row">
        <div class="col-md-12  mx-auto">
            <div class="card shadow">
                <div class="card-header text-center"><h4>Edit User Details</h4></div>
                <div class="card-body">
                    <h4 class="text-success text-center">{{ Session::get('message') }}</h4>
                    <form action="{{ route('admin.home.update',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-md-3">Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $user->name }}"  name="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Email</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" value="{{ $user->email }}" name="email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Mobile</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" value="{{ $user->mobile }}" name="mobile">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" value="{{ $user->password }}" name="password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">User Type</label>
                            <div class="col-md-9">
                                <select class="form-select col-md-12 form-control" aria-label="Default select example" id="user_Type" name="user_Type">
                                    <option selected>---- select menu ----</option>
                                    @foreach ($userTypes as $userType)
                                        <option value="{{ $userType->id }}"{{ $userType->id == $user->user_type ? 'selected' : '' }}>
                                            {{ $userType->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3">Designation</label>
                            <div class="col-md-9">
                                <select class="form-select col-md-12 form-control" aria-label="Default select example" id="designation" name="designation">
                                    <option selected>---- select menu ----</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->id }}"{{ $designation->id == $user->designation ? 'selected' : '' }}>
                                            {{ $designation->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3">Joining Date</label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" value="{{ $user->joined_date }}" name="joined">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3">Description</label>
                            <div class="col-md-9">
                                <textarea name="description"  id="" cols="115" rows="5">{{ $user->description }}</textarea>
                                {{-- <input type="number" class="form-control" name="mobile"> --}}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Image</label>
                            <div class="col-md-9">
                                <input type="file"   name="image">
                                <img src="{{asset($user->image) }}" alt="" height="100" width="130">
                            </div>

                        </div>


                        <div class="row mb-3">
                            <label class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-outline-success"  value="Update User Data">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
