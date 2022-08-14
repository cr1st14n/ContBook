<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Crypt;

class loginController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $credenciales = request()->only('usu_cod', 'password');
        $u = User::where('usu_cod', $request->input('usu_cod'))->first();
        if ($u == null) {
            return '0';
        } else if (Auth::attempt($credenciales)) {
            return 'success';
        } else {
            return '1';
        }
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
