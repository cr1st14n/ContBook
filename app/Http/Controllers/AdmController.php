<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmController extends Controller
{
    public function index()
    {
        return view('Adm.adm_home');
    }
}
