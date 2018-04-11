<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Illuminate\Http\Request;

class UserIndexController extends Controller
{
    public function index(){
      $event = \App\Event::get();
      return view('welcome')->with('event', $event);
    }
    public function event(){
      $event = \App\Event::get();
      return view('event')->with('event', $event);
    }
    public function myevent(){
      $peserta = DB::table('pesertas')
      ->join('events', 'pesertas.event_id', '=', 'events.id')
      ->join('users', 'pesertas.user_id', '=','users.id')
      ->where('user_id','=',Auth::user()->id)
      ->select('events.*', 'pesertas.id as idpesertas')
      ->get();

      return view('myevent')->with('event', $peserta);
    }
    public function detailevent($id){
      $data['user'] = Auth::user();
      $data['detail'] = \App\Event::find($id);
      $data['peserta'] = \App\Peserta::where('event_id', $id)->get();
      $data['ket'] = \App\Peserta::where('user_id', $data['user']->id)->get();
      return view('detailevent')->with($data);
    }

    public function daftar($id){
      $peserta = new \App\Peserta;
      $peserta->user_id = Auth::user()->id;
      $peserta->event_id = $id;
      $peserta->save();
      return redirect()->back();
    }
    public function destroy($id){
      $pesertas =  \App\Peserta::find($id);
      $pesertas->delete();
      return redirect()->back();
    }
}
