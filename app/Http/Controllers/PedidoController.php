<?php

namespace App\Http\Controllers;

use App\Models\pedido;
use App\Http\Requests\StorepedidoRequest;
use App\Http\Requests\UpdatepedidoRequest;
use App\Models\Cliente;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('pedido.pdd_home');
    }
    public function list_1()
    {

    }
    public function create_1()
    {
        $cliente=Cliente::where('ca_estado','1')->get();
        return view('pedido.pdd_pedidoNew')->with('cliente',$cliente);
    }

}
