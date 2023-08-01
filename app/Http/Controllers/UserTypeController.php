<?php

namespace App\Http\Controllers;

use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserTypeController extends Controller
{
    public $userType;
    public $types;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userTypes=UserType::all();
        return view('admin.userType.manage_user_type',compact('userTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.UserType.create-userType');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $userType       =  new UserType();
      $userType->name = $request->name;
      $userType->save();

      return redirect('/add-userType')->with('message','user Type added successfullly');

    }

    /**
     * Display the specified resource.
     */
    public function show(UserType $userType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $types=UserType::find($id);
        return view('admin.UserType.edit_user_type',['types'=>$types]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $userType       = UserType::find($id);
        $userType->name = $request->name;
        $userType->save();
        return redirect('/manage_user_type')->with('message','User type name Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        UserType::destroy($id);
        return redirect ('/manage_user_type')->with('message1','User Info Deleted Successfully');


    }
}
