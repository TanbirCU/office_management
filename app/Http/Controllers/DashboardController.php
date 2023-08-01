<?php

namespace App\Http\Controllers;

use App\Models\newUser;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){
        // dd(Auth::user());
        // $user = User::join('user_types','user_types.id','=','users.user_type')
        //     ->select('users.*','user_types.name AS role')
        //     ->where('users.id', Auth::user()->id)
        //     ->first();
        // ,compact('user')
        return view('admin.home.home');
    }


}
