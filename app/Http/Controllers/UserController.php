<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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

        return view('back.user.edit', compact('user'));
    }

    public function update(Request $request, $id){
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required',
            'phone' => 'required',
            'avatar' => ['image'],
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
