

@extends('admin.master')
@section('title')
    User manage page
@endsection

@section('body')
{{-- @if(Session::has('success'))
    <script>
        Swal.fire('Success', '{{ Session::get('success') }}', 'success');
    </script>
@endif --}}
@if(Session::has('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire('Success', '{{ Session::get('success') }}', 'success');
        });
    </script>
@endif
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-header text-center"><h5>Manage All Users</h5></div>
                    <div class="card-body">
                        <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                        <table class="table table-bordered table-hover" id="mytable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>designation</th>
                                    <th>Joined Date</th>
                                    <th>image</th>
                                    {{-- <th>Description</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userDetails as $user)


                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->mobile }}</td>
                                    <td>{{ $user->designation_name }}</td>
                                    {{-- <td>{{ $user->user_type }}</td> --}}
                                    <td>{{ $user->joined_date }}</td>
                                    <td>
                                        <img src="{{ asset($user->image) }}" alt="" height="60" width="70">
                                    </td>


                                        {{-- {{ $user->description }} --}}
                                        {{-- <p class="card-text">{{ substr($user->description, 0,  80) }}</p> --}}


                                    <td>
                                        <a href="{{ route('admin.home.show',['id'=>$user['id']]) }}" class="btn btn-success btn-sm" >View</a>
                                        <a href="{{ route('admin.home.edit',['id'=>$user['id']]) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('admin.home.userAttendance',['id'=>$user['id']]) }}" class="btn btn-sm btn-dark">Attendance</a>
                                        <a href="#" onclick="confirmDelete({{ $user->id }})" class="btn btn-danger btn-sm">Delete</a>
                                        {{-- <a href="{{ route('admin.home.edit_modal',['id'=>$user['id']]) }}" > --}}
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalLong{{ $user->id }}">
                                                Modal_edit
                                              </button>
                                              <!-- Modal -->
                                              <form action="{{ route('admin.home.update',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                              <div class="modal fade" id="exampleModalLong{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLongTitle">Modal edit user</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">

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
                                                                <textarea name="description"  id="" cols="115" rows="5" style="width: 343px">{{ $user->description }}</textarea>
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

                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </form>

                                        {{-- </a> --}}
                                        {{-- onclick="confirmDelete({{ $user->id }})" --}}
                                        {{-- {{ route('admin.home.delete',['id'=>$user['id']]) }} --}}

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this user and their details!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteItem(id);
                }
            });
        }

        function deleteItem(id) {
            $.ajax({
                url: "{{ url('destory-user') }}/" + id,
                type: 'get',
                success: function (response) {
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'User and details deleted successfully',
                        icon: 'success',
                        timer: 90000, // Set the duration to 3 seconds
                        showConfirmButton: false
                    }).then(() => {
                        // Optional: Redirect to a specific page after deletion
                        window.location.href = '{{ url('manage-user') }}';
                    });
                },
                error: function (xhr) {
                    Swal.fire('Error!', 'An error occurred while deleting the user and their details.', 'error');
                }
            });
        }
    </script>

    {{-- <button onclick="confirmDelete({{ $user->id }})">Delete</button> --}}


</section>





@endsection


