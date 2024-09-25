<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


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

    public function edit(string $id){
        $user = User::find($id);
        $roles = Role::all();

        return view('back.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id){

        print_r($request->role);
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required',
            'phone' => 'required',
            'avatar' => ['image'],
            'role' => 'required'
        ]);

        if(request()->hasfile('avatar')){
            $avatarOriginalName = request()->avatar->getClientOriginalName();
            $avatarName = str_replace(" ", "-", $avatarOriginalName);

            request()->avatar->move(public_path('avatars'), $avatarName);
        }

        $user = User::find($id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->avatar = $avatarName ?? $user->avatar;
        $user->roles()->sync($request->role);

        $user->save();

        return redirect('admin/users/'.$id)->with('message', 'Profile Updated Successfully.');
    }

    public function destroy(string $id){
        $user = User::find($id)->delete();

        return redirect('admin/users')->with('message', 'User deleted successfully.');
    }

    public function deleteOldImage(){
        Storage::delete('/public/avatars/'.auth()->user()->avatar);
    }

}
