<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        return view('front.home');
    }
    public function employ(){
        return view('front.employ');
    }
    public function project(){
        return view('front.project');
    }
    public function notice(){
        return view('front.notice');
    }
}
