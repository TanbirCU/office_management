@extends('admin.master')

@section('title')
    Manage Designation
@endsection
@section('body')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header"><h4>Manage All User Designation</h4></div>
                    <div class="card-body">
                        <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                        <h4 class="text-center text-success">{{ Session::get('message1') }}</h4>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>salary</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($designations as $designation)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $designation->name }}</td>
                                    <td>{{ $designation->salary }}</td>
                                    <td>
                                        {{-- {{ route('admin.home.edit',['id'=>$user['id']]) }} --}}
                                        <a href="{{ route('admin.designation.edit_designation',['id'=>$designation['id']]) }}" class="btn btn-success ">Edit</a>
                                       <a href="{{ route('admin.designation.delete_designation',['id'=>$designation['id']]) }}" class="btn btn-danger">Delete</a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
