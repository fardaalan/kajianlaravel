<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
    public function index(){
      // $user= \App\User::get();
      $user = \App\User::join('role_user', 'role_user.user_id', '=', 'users.id')->where('role_id', '=', 2)->get();
      return view('admin.users.index')->with('user',$user);
    }

    public function create(){
      return view('admin.users.create');
    }

    public function store(Request $request){
      $nama   = $request->nama;
      $email  = $request->email;
      $password = bcrypt($request->password);

      $user   = new \App\User;
      $user->name   = $nama;
      $user->email  = $email;
      $user->password = $password;
      $kondisi = $user->save();

      return redirect('/admin/users');
    }

    public function edit($id){
      $user = \App\User::find($id);
       return view('admin.users.edit')->with('user', $user);
    }

    public function update(Request $request, $id){
      $nama   = $request->name;
      $email  = $request->email;
      $password = bcrypt($request->password);

      $user = \App\User::find($id);

      $user->name   = $nama;
      $user->email  = $email;
      $user->password = $password;
      $user->save();

      return redirect('/admin/users');
    }

    public function destroy($id){
      $user = \App\User::find($id);
      $user->delete();

      return redirect('/admin/users');
    }
    public function logout(){
      Auth::logout();
      return redirect('/');
    }
}
