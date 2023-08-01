<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectAssigned;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {

        $projects = Project::join('users', 'users.id', '=', 'projects.manager')
            ->select('projects.id', 'projects.name AS project_name', 'users.name AS manager_name')
            ->get();
            foreach($projects as $project){
                $project->employee = ProjectAssigned::join('users', 'users.id', '=', 'project_assigneds.user_id')
                ->where('project_assigneds.project_id', '=', $project->id)
                ->pluck('users.name')
                ->implode(', ');
            }

        return view('admin.Project.manage_project',compact('projects'));
    }

    public function fetchData(Request $request){
        $projectId = $request->input('projectId');

        // $project = Project::find($projectId);
        $project = Project::join('users', 'users.id', '=', 'projects.manager')
            ->select('projects.id', 'projects.name AS project_name', 'users.name AS manager_name')
            ->get()->find($projectId);
        $manager = $project->manager_name;

        $employees = ProjectAssigned::where('project_id', $project->id)
            ->join('users', 'users.id', '=', 'project_assigneds.user_id')
            ->pluck('users.name')
            ->toArray();
            // ->select('users.name')
            // ->get();

        return response()->json([
            'manager' => $manager,
            'employees' => $employees
        ]);

    //     $employeeData = [];

    // foreach ($employees as $employee) {
    //     $employeeData[] = $employee->name;
    // }

    // return response()->json([
    //     'manager' => $manager,
    //     'employees' => $employeeData
    // ]);

        // html type

        // $html = "<p>Manager: " . $manager . "</p>";
        // $html .= "<ul>";
        // foreach ($employees as $employee) {
        //     $html .= "<li>" . $employee->name . "</li>";
        // }
        // $html .= "</ul>";

        // return $html;


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $assignedUserIds = ProjectAssigned::pluck('user_id')->toArray();

        $users = User::whereNotIn('id', $assignedUserIds)
                     ->whereNotExists(function ($query) {
                         $query->select('id')
                               ->from('projects')
                               ->whereColumn('users.id', 'projects.manager');
                     })->get();
        return view('admin.Project.create_project',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'manager' => 'required|exists:users,id',
        ]);
        $projects = new Project();
        $projects->name = $request->name;
        $projects->manager = $request->manager;
        $projects->save();

        $employeeIds = $request->input('employee');
        foreach ($employeeIds as $employeeId) {
                $assigned = new ProjectAssigned();
                $assigned->project_id = $projects->id;
                $assigned->user_id = $employeeId;
                $assigned->save();
        }
        return redirect('/project_create')->with('message12','project created successfully');




    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $projects = Project::join('users', 'users.id', '=', 'projects.manager')
            ->select('projects.id', 'projects.name AS project_name', 'users.name AS manager_name')
            ->get();
        return view('admin.Project.view_project',compact('projects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::find($id);
        $managers = User::all();
        $assignedEmployees = ProjectAssigned::join('users', 'users.id', '=', 'project_assigneds.user_id')
            ->where('project_assigneds.project_id', $id)
            ->pluck('users.name', 'users.id')
            ->all();

        return view('admin.project.edit_project', compact('project', 'managers', 'assignedEmployees'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $project = Project::find($id);
        $project->name = $request->input('name');
        $project->manager = $request->input('manager');
        $project->save();

        ProjectAssigned::where('project_id', $project->id)->delete();
        $employeeIds = $request->input('employee');
        foreach ($employeeIds as $employeeId) {
                $assigned = new ProjectAssigned();
                $assigned->project_id = $project->id;
                $assigned->user_id = $employeeId;
                $assigned->save();
        }


        return redirect('/project_manage')->with('message1', 'Project info updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Project::destroy($id);
        ProjectAssigned::where('project_id',$id)->delete();

        return redirect ('/project_manage')->with('message','project Deleted Successfully');
    }


}
