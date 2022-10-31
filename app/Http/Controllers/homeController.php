<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Index()
    {
        return view('home');
    }
    public function index_APP()
    {
        return view('homeApp');
    }
    public function test1()
    {
        return 'hola mundo';
    }
}
