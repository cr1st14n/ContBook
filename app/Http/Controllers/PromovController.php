<?php

namespace App\Http\Controllers;

use App\Models\promov;
use App\Http\Requests\StorepromovRequest;
use App\Http\Requests\UpdatepromovRequest;
use illuminate\http\Request;

class PromovController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('producto.inv_kardex');
    }
    public function mov_1($tipo, Request $request)
    {
        if ($tipo == 'E') {
            return 'entrada';
        }
        if ($tipo == 'S') {
            return 'salida';
        }
    }
}
