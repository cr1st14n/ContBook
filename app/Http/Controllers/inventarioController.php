<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inventarioController extends Controller
{
    public function index()
    {
        return view('inventario.inv_home');
    }
}
