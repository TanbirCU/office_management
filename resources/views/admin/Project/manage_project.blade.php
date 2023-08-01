@extends('admin.master')

@section('title')
    Manage Project
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
                                    <th>Project Name</th>
                                    <th>Project manager</th>
                                    <th>Project Employee</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $project->project_name }}</td>
                                    <td>{{ $project->manager_name }}</td>
                                    <td>{{ $project->employee }}</td>
                                    <td>
                                        {{-- {{ route('admin.home.edit',['id'=>$user['id']]) }} --}}
                                        <a href="{{ route('admin.project.edit_project',['id'=>$project['id']]) }}" class="btn btn-success ">Edit</a>
                                         <a href="{{ route('admin.project.delete',['id'=>$project['id']]) }}" class="btn btn-danger">Delete</a>

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


    {{-- ajax --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#managerEmployeeModal').on('show.bs.modal', function(event) {
            var projectId = $('#projectSelect').val('id');
            showManagersAndEmployees(projectId);
        });
    });

    function showManagersAndEmployees(projectId) {
        $.ajax({
            url: '/projects/' + projectId + '/managers-employees',
            type: 'GET',
            success: function(response) {
                var modalBody = $('#managerEmployeeModal .modal-body');
                modalBody.empty();

                // Display the managers
                modalBody.append('<h4>Managers:</h4>');
                modalBody.append('<p>' + response.manager + '</p>');

                // Display the employees
                modalBody.append('<h4>Employees:</h4>');
                response.employees.forEach(function(employee) {
                    modalBody.append('<p>' + employee + '</p>');
                });

                // Show the modal
                $('#managerEmployeeModal').modal('show');
            }
        });
    }
</script>

</section>

@endsection
