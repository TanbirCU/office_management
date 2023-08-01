@extends('admin.master')

@section('title')
    show attendance
@endsection
@section('body')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header"><h4>Show All Present</h4></div>
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
