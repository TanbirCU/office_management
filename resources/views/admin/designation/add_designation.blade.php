
@extends('admin.master')
@section('title')
    Add Designation

@endsection

@section('body')
    <section class="py-5">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card shadow">
                        <div class="card-header "><h4>Add User-Type</h4></div>
                        <div class="card-body">
                            <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                            <form action="{{ route('admin.designation.create_designation') }}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-md-3">Desination Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control"  name="name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Salary</label>
                                    <div class="col-md-9">
                                        <input type="number"  class="form-control"  name="salary"  min="0" value="0" step="any">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit"  class="btn btn-outline-success"  value="Add new Designation">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>


    </section>

@endsection
