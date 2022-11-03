<?php

namespace App\Http\Controllers;

use App\Models\pedido;
use App\Models\User;
use Illuminate\Http\Request;

class hubicacionController extends Controller
{
    public function home()
    {
        $usuarios=User::get();
        return view('hubicacion.hubi_home')->with('usuarios',$usuarios);
    }
    public function list_1(Request $request)
    {
        $data = pedido::join('clientes as c', 'c.id', 'pedidos.id_cliente')
        ->whereDate('pedidos.created_at',$request->input('fecha'))
        ->where('pedidos.ca_usu_cod',$request->input('usu'))
        ->where('pedidos.ca_estado',1)
            ->select(
                'c.cli_nombre',
                'c.cli_ci',
                'c.cli_razonSocial',
                'c.cli_razonSocialNit',
                'c.cli_direccion',
                'pedidos.created_at',
                'pedidos.id',
                'pedidos.ca_ubi',
            )
            ->get();
                foreach ($data as $key => $value) {
                    $data[$key]['ca_ubi']=unserialize($value->ca_ubi);
                }

        return json_encode($data);
    }
}
