<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassManagerController extends Controller
{
    public function index(){
        return view('back.dashboard-two');
    }
}
