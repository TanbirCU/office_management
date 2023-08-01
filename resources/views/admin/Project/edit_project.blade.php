
@extends('admin.master')
@section('title')
    Edit Project

@endsection

@section('body')

    <section class="py-5">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card shadow">
                        <div class="card-header "><h4>Update Project</h4></div>
                        <div class="card-body">
                            <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                          @endif
                            <form action="{{ route('admin.project.update_project',$project->id) }}" method="post">
                                @csrf

                                <div class="row mb-3">
                                    <label class="col-md-3">Project Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="{{ $project->name }}" name="name">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3">Project Manager</label>
                                    <div class="col-md-9">
                                        <select class="form-select col-md-12 form-control" aria-label="Default select example" id="manager" name="manager">
                                            <option selected>---- select menu ----</option>
                                            @foreach ($managers as $manager)
                                                <option value="{{ $manager->id }}"{{ $manager->id == $project->manager ? 'selected' : '' }}>
                                                    {{ $manager->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3">Employee</label>
                                    <div class="col-md-9">
                                        <select class="employee col-md-12 form-control" name="employee[]" multiple="multiple">
                                            @foreach ($managers as $manager)
                                                @if (isset($assignedEmployees[$manager->id]))
                                                    <option value="{{ $manager->id }}" selected>{{ $manager->name }}</option>
                                                @else
                                                    <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-outline-success" value="Update Project">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>



    </section>

<script>
    $(document).ready(function() {
    $('.employee').select2();
});
</script>

@endsection

