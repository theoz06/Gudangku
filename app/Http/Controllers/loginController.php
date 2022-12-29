<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/Login/login');
    }

    public function login(Request $request)
    {
      $request->validate([
        'username'=>'required',
        'password'=>'required'
      ],[
        'username.required'=>'Username Wajib diisi!',
        'password.required'=>'Password Wajib diisi!',
      ]);

      $infologin = [
        'username'=> $request->email,
        'password'=> $request->password
      ];

      if(Auth::attempt($infologin)){
        return ("berhasil");
      }else{
        return redirect('/Login/login')->withErrors('Username dan Password tidak sesuai!');
      }
    }

    function logout(){
        Auth::logout();
        return redirect('login')->with('Berhasil Log Out!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
