<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\pedido;
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
       $producto=producto::get();
    //    return $producto[2191]; 
        return view('AppMod.pedido_index')->with('producto',$producto);
    }
    public function busCliente(Request $request)
    {
        // return $request;
        return Cliente::select('*')
            ->where('ca_estado', '1')
            ->where(function ($query) use ($request) {
                $query->where('cli_nombre', 'iLIKE',          '%' . $request->input('data') . '%')
                    ->orWhere('cli_ci', 'iLIKE',               $request->input('data') . '%')
                    ->orWhere('cli_razonSocial', 'iLIKE',     '%' . $request->input('data') . '%')
                    ->orWhere('cli_razonSocialNit', 'iLIKE',   $request->input('data') . '%');
            })
            ->limit('20')->get();
    }
    public function listProducto(Request $request)
    {
        return producto::select('id', 'pdo_nomGen', 'pdo_nomComer', 'pdo_cant')
            ->join('provedors as pro','pro.id','productos.pdo_id_provedor')
            ->where('productos.ca_estado', '1')
            ->select('productos.id','pdo_cod','pdo_cant','pdo_nomGen','pdo_nomComer','prov_sigla','prov_nombre','pdo_id_provedor','pdo_preUniVenta1','pdo_preUniVenta2','pdo_preUniVenta3')
            ->get();
    }
    public function busProducto(Request $request)
    {
        return producto::select('id', 'pdo_nomGen', 'pdo_nomComer', 'pdo_cant')
            ->join('provedors as pro','pro.id','productos.pdo_id_provedor')
            ->where('productos.ca_estado', '1')
            ->where(function ($query) use ($request) {
                $query->where('pdo_nomGen', 'iLIKE',          '%' . $request->input('data') . '%')
                    ->orWhere('pdo_nomComer', 'iLIKE',        '%' .       $request->input('data') . '%');
            })
            ->select('productos.id','pdo_cod','pdo_cant','pdo_nomGen','pdo_nomComer','prov_sigla','prov_nombre','pdo_id_provedor','pdo_preUniVenta1','pdo_preUniVenta2','pdo_preUniVenta3')
            ->limit('50')->get();
    }
    public function storePedido(Request $request)
    {
        $pro = $request->input('P');
        foreach ($pro as $key => $value) {
            $new = new pedido();
            $new->id_cliente = $request->input('');
        }
        return $request;
    }

    public function homeCatalogo(Request $request)
    {
        if ($request->input('tipo')=='1') {
            return view('AppMod.catalogo');
        }
    }
}
