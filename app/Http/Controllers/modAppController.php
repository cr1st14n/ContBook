<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\producto;
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
    public function homePedido()
    {
        return view('AppMod.pedido_index');
    }
    public function busCliente(Request $request)
    {
        // return $request;
        return Cliente::select('*')
            ->where('ca_estado', '1')
            ->where(function ($query) use ($request) {
                $query->where('cli_nombre', 'LIKE',          '%' . $request->input('data') . '%')
                    ->orWhere('cli_ci', 'LIKE',               $request->input('data') . '%')
                    ->orWhere('cli_razonSocial', 'LIKE',     '%' . $request->input('data') . '%')
                    ->orWhere('cli_razonSocialNit', 'LIKE',   $request->input('data') . '%');
            })
            ->limit('20')->get();
    }
    public function busProducto(Request $request)
    {
        return producto::select('id','pdo_nomGen','pdo_nomComer','pdo_cant')
            ->where('ca_estado', '1')
            ->where(function ($query) use ($request) {
                $query->where('pdo_nomGen', 'LIKE',          '%' . $request->input('data') . '%')
                    ->orWhere('pdo_nomComer', 'LIKE',        '%' .       $request->input('data') . '%');
            })
            ->limit('10')->get();
    }
    public function storePedido(Request $request)
    {
        return $request;
    }
}
