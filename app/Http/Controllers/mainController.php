<?php

namespace App\Http\Controllers;
use App\Models\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class mainController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function check(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required|min:5|max:8'  
        ]);

        $userInfo = admin::where('username', '=', $request->username)->first();

        if(!$userInfo){
            return back()->with('fail','username tidak dikenal');
        }else{
            if($request->password==$userInfo->password){
                $request->session()->put('LoggedUser',$userInfo->id);
                if ($userInfo->hakAkses == "Operator") {
                    // dd("operator");
                    return redirect('dashboard');
                } elseif ($userInfo->hakAkses == "Admin") {
                    // dd("admin");
                    return redirect('/Admin/dashboard');
                } elseif ($userInfo->hakAkses == "Manager") {
                    // dd("manager");
                    return redirect('/Manager/managerDashboard');
                } else {

                }
                
            }else{
                return back()->with('fail', 'Password tidak sesuai dengan user');
            }
        }
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }

    function dashboard(){
        $data = ['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];

        return view('dashboard', $data);
    }
}
