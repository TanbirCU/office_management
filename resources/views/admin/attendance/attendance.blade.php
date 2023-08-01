
@extends('admin.master')
@section('title')
    Attendance

@endsection
@section('body')
<section class="py-5 bg-light shadow-lg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4 class="text-success text-center">{{ Session::get('friday') }}</h4>
                <h4 class="text-success text-center">{{ Session::get('message1') }}</h4>
                <h4 class="text-success text-center">{{ Session::get('message2') }}</h4>
                <h4 class="text-success text-center">{{ Session::get('error') }}</h4>
                <h2>Mark Attendance - In/Out</h2>
                <h3>Date: {{ $today }}</h3>

            <form action="{{ route('admin.attendance.attendance_add') }}" method="POST">
                @csrf
                @if (!$attendanceIn && !$attendanceOut)
                    <button type="submit" name="action" value="in" class="btn btn-outline-primary mr-3">Mark In</button>
                    <button type="submit" name="action" value="out" class="btn btn-outline-primary mr-3" disabled>Mark Out</button>
                @elseif ($attendanceIn && !$attendanceOut)
                    <button type="submit" name="action" value="in" class="btn btn-outline-primary mr-3" disabled>Mark In</button>
                    <button type="submit" name="action" value="out" class="btn btn-outline-primary mr-3">Mark Out</button>
                @endif
            </form>
            </div>
        </div>
    </div>

</section>

@endsection
