<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(10);

        return view('back.user.index', compact('users'));
    }

    public function show(string $id){
        $user = User::find($id);

        return view('back.user.profile', compact('user'));
    }

    public function destroy(string $id){
        $user = User::find($id)->delete();

        return redirect('users')->with('message', 'User deleted successfully.');
    }
}
