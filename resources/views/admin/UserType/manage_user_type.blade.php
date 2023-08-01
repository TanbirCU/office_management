@extends('admin.master')

@section('title')
    Manage user Type
@endsection
@section('body')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header"><h4>Manage All User Type</h4></div>
                    <div class="card-body">
                        <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                        <h4 class="text-center text-success">{{ Session::get('message1') }}</h4>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userTypes as $type)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $type->name }}</td>
                                    <td>
                                        {{-- {{ route('admin.home.edit',['id'=>$user['id']]) }} --}}
                                        <a href="{{ route('admin.userType.edit_user_type',['id'=>$type['id']]) }}" class="btn btn-success ">Edit</a>
                                       <a href="{{ route('admin.userType.delete_user_type',['id'=>$type['id']]) }}" class="btn btn-danger">Delete</a>

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
