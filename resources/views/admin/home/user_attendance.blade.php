@extends('admin.master')

@section('title')
    show attendance
@endsection
@section('body')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-header"><h4>Show user attendance</h4></div>
                    <div class="card-body">
                        <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                        <h4 class="text-center text-success">{{ Session::get('message1') }}</h4>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>In_time</th>
                                    <th>Out_time</th>
                                    <th>ip_address</th>
                                    <th>mac_address</th>
                                    <th>remark</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendances as $attendance)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $attendance->name }}</td>
                                    <td>{{ $attendance->attendance_date }}</td>
                                    <td>{{ $attendance->in_time }}</td>
                                    <td>{{ $attendance->out_time }}</td>
                                    <td>{{ $attendance->ip_address }}</td>
                                    <td>{{ $attendance->mac_address }}</td>
                                    <td>{{ $attendance->remark }}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{ $attendance->id }}">
                                            Add Mark
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter{{ $attendance->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Add text to Remark</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.home.remark_add',['id'=>$attendance->id]) }}" method="post">
                                                        @csrf
                                                        <div class="row">
                                                            <label class="col-md-2">Add Text</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" name="remark">
                                                            </div>
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                            </div>
                                            </div>
                                        </div>
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

