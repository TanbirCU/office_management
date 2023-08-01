<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use App\Models\Designation;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support;
use App\Models\UserType;
use Illuminate\Http\Request;
use App\Mail\PromotionEmail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
// Use Mail;

class UserController extends Controller

{

    public $userDetails;
    public $user;

    private static $imageName;
    private static $directory;
    private static $imageUrl;

    public static function getImageUrl($image){

        self::$imageName=$image->getClientOriginalName();
        self::$directory='user-image/';
        $image->move(self::$directory,self::$imageName);
        self::$imageUrl=self::$directory.self::$imageName;
        return self::$imageUrl;

    }

    //promotion action & mail
    public function action(Request $request, string $id){
        $user = User::find($id);
        $userDetails = UserDetails::where('user_id', $id)->first();
        $userDetails->designation = $request->input('designation');
        $userDetails->save();

        $promotionMail = [
            'title' => 'Promotion',
            'body' => 'Congratulations,you are promoted'
        ];
        Mail::to($user->email)->send(new PromotionEmail( $promotionMail , $user));


        return redirect('/manage-user')->with('message','Promoted');
    }

    //attendances
    public function attendance(string $id){
        //  $attend = attendance::all();
        $attendances = User::join('attendances','attendances.user_id','=','users.id')
        ->where('users.id',$id)
        ->select('users.name','attendances.*')
        ->get();

        return view('admin.home.user_attendance',compact('attendances'));
    }

    public function storeRemark(Request $request,$id){

        $attendance = attendance::findOrFail($id);
        $attendance->remark = $request->input('remark');
        $attendance->save();

        return redirect()->back()->with('message','remarked added successfully');

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userTypes = UserType::all();

        $userDetails = User::join('user_details','user_details.user_id','=','users.id')
            ->join('designations','designations.id','=','user_details.designation')
            ->select('users.*','users.user_type','user_details.mobile','user_details.designation','user_details.joined_date','user_details.description','user_details.image','designations.name as designation_name')
            ->get();
            $designations = Designation::all();


        return view('admin.home.manage',compact('userDetails','designations','userTypes'));
    }

    public function create()
    {
        $user = User::join('user_types','user_types.id','=','users.user_type')
            ->select('users.*','user_types.name AS role')
            ->where('users.id', Auth::user()->id)
            ->first();
        $userTypes = UserType::all();
        $designations = Designation::all();
        return view('admin.home.createUser',compact('user','userTypes','designations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'email' => 'required|email|unique:users,email',
        // ], [
        //     'email.unique' => 'The email address is already taken.',
        // ]);

        $user = new User();
        $user->name      = $request->name;
        $user->email     = $request->email;
        // $user->password    = $request->password;
        $user->password  = Hash::make($request->password);
        $user->user_type = $request->user_type;
        $user->save();

        $userDetails = new UserDetails();
        $userDetails->user_id      = $user->id ;
        $userDetails->mobile       = $request->mobile;
        $userDetails->designation  = $request->designation;
        $userDetails->joined_date  = $request->joined;
        $userDetails->description  = $request->description;
        $userDetails->image        = self::getImageUrl($request->file('image'));
        $userDetails->save();

        session()->flash('success', 'User Created Successfully');
        return back();

        // return redirect('/add-user')->with('message','user added successfullly');

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::join('user_details','user_details.user_id','=','users.id')
            ->join('designations','designations.id','=','user_details.designation')
            ->select('users.*','user_details.mobile','designations.name as designation_name','user_details.designation','user_details.joined_date','user_details.description','user_details.image')
            ->get()->find($id);
            $designations = Designation::all();

         return view('admin.home.show',compact('user','designations'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $userTypes = UserType::all();
        $designations = Designation::all();
        $user = User::join('user_details','user_details.user_id','=','users.id')
            ->select('users.*','users.user_type','user_details.mobile','user_details.designation','user_details.joined_date','user_details.description','user_details.image')
            ->get()->find($id);
        return view('admin.home.edit',compact('user','designations','userTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $validated  = $request->validate([
            'email' => 'required|email',

        ]);
            $user=User::find($id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->user_type = $request->input('user_Type');
            $user->save();

            $userDetails = UserDetails::where('user_id', $id)->first();
            if($request->file('image')){
                if(file_exists($userDetails->image)){
                    unlink($userDetails->image);
                }
                self::$imageUrl  = self::getImageUrl($request->file('image'));
            }else{
                self::$imageUrl  = $userDetails->image;
            }

            $userDetails->mobile      = $request->mobile;
            $userDetails->designation = $request->input('designation');
            $userDetails->joined_date = $request->joined;
            $userDetails->description = $request->description;
            $userDetails->image       = self::$imageUrl;
            $userDetails->save();

            return redirect('/manage-user')->with('message','User Data updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    $user = User::find($id);

    if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
    }

    // Delete the user
    User::destroy($id);

    // Delete the user's details
    UserDetails::where('user_id', $id)->delete();

    // Set a success message in the session
    Session::flash('success', 'User and details deleted successfully');

    // Return a JSON response indicating successful deletion
    return response()->json(['message' => 'User and details deleted successfully']);

    }

    // modal edit
    // public function modal($id){
    //     $userTypes = UserType::all();
    //     $designations = Designation::all();
    //     $user = User::join('user_details','user_details.user_id','=','users.id')
    //         ->select('users.*','users.user_type','user_details.mobile','user_details.designation','user_details.joined_date','user_details.description','user_details.image')
    //         ->get()->find($id);
    //     return view('admin.home.edit_modal',compact('user','designations','userTypes'));

    // }

}
