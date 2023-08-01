<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;
// Use Toastr;

class DesignationController extends Controller
{
    // public $designation;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $designations=Designation::all();
        return view('admin.designation.manage_designation',['designations'=>$designations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.designation.add_designation');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $designation        =  new Designation();
        $designation->name   = $request->name;
        $designation->salary = $request->salary;
        $designation->save();

        return redirect('/add_designation')->with('message','Designation added successfullly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $designation=Designation::find($id);
        return view('admin.designation.edit_designation',compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $designation=Designation::find($id);
        $designation->name   = $request->name;
        $designation->salary = $request->salary;
        $designation->save();
        return redirect('/designation_manage')->with('message','Designation Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Designation::destroy($id);
        // Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);

        return redirect ('/designation_manage')->with('message1','User Info Deleted Successfully');

    }
}
