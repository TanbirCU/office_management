
@extends('admin.master')
@section('title')
    Add userType

@endsection

@section('body')
    <section class="py-5">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card shadow">
                        <div class="card-header "><h4>Add User-Type</h4></div>
                        <div class="card-body">
                            <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                            <form action="{{ route('admin.userType.add-userType') }}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-md-3">User Type Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control"  name="name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit"  class="btn btn-outline-success"  value="Create new User Type">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>


    </section>

@endsection
