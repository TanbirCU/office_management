
@extends('admin.master')

@section('title')
    Edit designation

@endsection

@section('body')
<section class="py-5">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card shadow">
                <div class="card-header "><h4>Edit Designation</h4></div>
                <div class="card-body">
                    <form action="{{ route('admin.designation.update_designation',['id'=>$designation->id]) }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-md-3">Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ $designation->name }}"  name="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Salary</label>
                            <div class="col-md-9">
                            <input type="number"  class="form-control"  name="salary"  min="0" value="{{ $designation->salary }}" step="any">
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
