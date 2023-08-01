
@extends('admin.master')
@section('title')
    Add Project

@endsection

@section('body')

    <section class="py-5">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card shadow">
                        <div class="card-header "><h4>Add Project</h4></div>
                        <div class="card-body">
                            <h4 class="text-center text-success">{{ Session::get('message12') }}</h4>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                          @endif
                            <form action="{{ route('admin.project.add_project') }}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-md-3">Project Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control"  name="name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Project Manager</label>
                                    <div class="col-md-9">
                                        <select class="form-select col-md-12 form-control" aria-label="Default select example" id="manager" name="manager">
                                            <option selected >---- select menu ----</option>
                                            @foreach ($users as $user)
                                            {{-- @if ($user->id !== $project->manager) --}}
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            {{-- @endif --}}
                                            @endforeach
                                          </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Employee</label>
                                    <div class="col-md-9">
                                        <select class="employee col-md-12 form-control" name="employee[]" multiple="multiple">
                                            @foreach ($users as $user)

                                            <option value="{{ $user->id }}">{{ $user->name }}</option>

                                            @endforeach
                                          </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit"  class="btn btn-outline-success"  value="Add Project">
                                    </div>
                                </div>
                            </form>
                            {{-- @if(Session::has('message12'))
                                <script>
                                    toaster.success("{{ Session::get('message12') }}")
                                </script>


                            @endif --}}
                            <script>
                                $(document).ready(function() {
                                $('.employee').select2({
                                    placeholder:'select',
                                    allowClear:true,
                                    tags: true,
                                    

                                });
                            });
                            </script>
                        </div>
                    </div>

                </div>
            </div>



    </section>



@endsection

