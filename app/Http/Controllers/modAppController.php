<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class modAppController extends Controller
{
    public function home()
    {
        return view('AppMod.home');
    }
    public function homeCliente()
    {
        return view('AppMod.cliente_index');
    }
}
