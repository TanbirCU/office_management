
@extends('admin.master')

@section('title')
    Edit User Type

@endsection

@section('body')
<section class="py-5">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card shadow">
                <div class="card-header "><h4>Edit User-Type</h4></div>
                <div class="card-body">
                    <form action="{{ route('admin.userType.update_user_type',['id'=>$types->id]) }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-md-3">User Type Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $types->name }}"  name="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit"  class="btn btn-outline-success"  value="Update User Type">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
