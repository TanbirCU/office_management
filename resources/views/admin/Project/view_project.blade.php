@extends('admin.master')
@section('title')
    view Project

@endsection
 {{-- <button type="button" class="btn btn-primary mt-1" onclick="showManagerAndEmployee()">Show Manager and Employee</button> --}}


@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <label class="col-md-6">
                    <select class="form-select col-md-12 form-control" aria-label="Default select example" id="projectSelect" name="projectSelect">
                        <option selected>---- select project ----</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}"> {{ $project->project_name }}</option>
                        @endforeach
                    </select>

                </label>
                <div class="col-md-6">
                    <div id="managerAndEmployeeInfo"></div>
                </div>
            </div>
        </div>
        <script>
                $(document).ready(function() {
                $('#projectSelect').on('change', function() {
                    var projectId = $(this).val();

                    if (projectId) {
                        $.ajax({
                            url: "{{ url('fetch-data') }}",
                            // url: "{{ route('fetch.data') }}",
                            type: 'GET',
                            data: { projectId: projectId },
                            success: function(response) {
                                var manager = response.manager;
                                var employees = response.employees;
                                console.log(manager);

                                // Update the HTML to display the manager and employees
                                var html = '<p>Manager: ' + manager + '</p>';
                                html += '<p>Employees: ' + employees.join(', ') + '</p>';
                                $('#managerAndEmployeeInfo').html(html);

                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                            }
                        });
                    } else {
                        $('#managerAndEmployeeInfo').html('');
                    }

                    // row wise emloyee

            //         var html = '<p>Manager: ' + manager + '</p>';
            //     html += '<ul>';
            //     for (var i = 0; i < employees.length; i++) {
            //         html += '<li>' + employees[i] + '</li>';
            //     }
            //     html += '</ul>';

            //     $('#managerAndEmployeeInfo').html(html);
            // },
            // error: function(xhr) {
            //     // Handle any errors
            // }

                // html type
                
                //     success: function(response) {
                //     // Update the HTML with the received data
                //     $('#managerAndEmployeeInfo').html(response);
                // },
                // error: function(xhr) {
                //     // Handle any errors
                // }
                });
            });

        </script>
    </section>

@endsection
