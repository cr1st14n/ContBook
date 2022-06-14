<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;

class loginController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        // return 'hola mudno';
        // return User::where('usu_ci','1001')->first();
        // return $request;
        // $credenciales=$this->validate(request(),[
        //     'usu_ci' => 'required|string',
        //     'password' => 'required|string'
        // ]);
        $credenciales=request()->only('usu_ci','password');

        // return $credenciales;
        // return Auth::attempt($credenciales);  

        if (Auth::attempt($credenciales)) {
            return 'success';
        }
        return 'fail';
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
