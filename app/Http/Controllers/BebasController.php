<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BebasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = \App\User::join('role_user', 'role_user.user_id', '=', 'users.id')->where('role_id', '=', 2)->get();
      return view('admin.users.index')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $nama   = $request->nama;
      $email  = $request->email;
      $password = bcrypt($request->password);

      $user   = new \App\User;
      $user->name   = $nama;
      $user->email  = $email;
      $user->password = $password;
      $user->save();
      $role        =  \DB::table('role_user')->insert(
        ['role_id' => 2,
        'user_id' => $user->id,
        'user_type' =>"App\User"]
      );
      return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = \App\User::find($id);
       return view('admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = \App\User::find($id);
      $user->delete();
    }

    public function logout(){
      Auth::logout();
      return redirect('/');
    }
}
