<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function _construct()
    {
        $this->middleware('Auth');
    }
    public function Index()
    {
        return view('welcome');
    }
}
