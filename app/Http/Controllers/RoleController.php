<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;

class RoleController extends Controller
{
    public function index(){

        $roles = Role::all();
        return view('back.role.index', compact('roles'));
    }
}
