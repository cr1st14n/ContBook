<?php

namespace App\Http\Controllers;

use App\Models\pedido;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Psy\CodeCleaner\ReturnTypePass;
use App\Http\Requests\StorepedidoRequest;
use App\Http\Requests\UpdatepedidoRequest;
use App\Models\User;
use Symfony\Component\Console\Input\Input;

use function PHPUnit\Framework\returnSelf;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {   $clientes=Cliente::where('ca_estado',1)->get();
        $usurios = User::where('ca_estado', 1)->get();
        return view('pedido.pdd_home')->with('usuarios', $usurios)->with('clientes',$clientes);
    }
    public function list_1(Request $request)
    {
        // return $request;
        switch ($request->input('data')) {
            case 'tipo_1':
                $data = pedido::where('pedidos.ca_estado', '1')
                    ->join('users', 'users.id', 'pedidos.ca_usu_cod')
                    ->join('clientes as c', 'c.id', 'pedidos.id_cliente')
                    ->select('pedidos.*', 'users.usu_nombre', 'c.cli_nombre', 'c.cli_ci', 'c.cli_razonSocial', 'c.cli_razonSocialNit')
                    ->get();
                break;
            case 'tipo_2':
                $data = pedido::where('pedidos.ca_estado', '1')
                    ->where('pedidos.id_cliente', $request->input('id'))
                    ->join('users', 'users.id', 'pedidos.ca_usu_cod')
                    ->join('clientes as c', 'c.id', 'pedidos.id_cliente')
                    ->select('pedidos.*', 'users.usu_nombre', 'c.cli_nombre', 'c.cli_ci', 'c.cli_razonSocial', 'c.cli_razonSocialNit')
                    ->get();
                break;
            case 'tipo_3':
                $data = pedido::where('pedidos.ca_estado', '1')
                ->where('pedidos.ca_usu_cod', $request->input('id'))
                ->join('users', 'users.id', 'pedidos.ca_usu_cod')
                ->join('clientes as c', 'c.id', 'pedidos.id_cliente')
                ->select('pedidos.*', 'users.usu_nombre', 'c.cli_nombre', 'c.cli_ci', 'c.cli_razonSocial', 'c.cli_razonSocialNit')
                ->get();
                break;
            case 'tipo_4':
                # code...
                break;

            default:
                # code...
                break;
        }

        foreach ($data as $key => $value) {
            $data[$key]->pdd_productos = unserialize($data[$key]->pdd_productos);
            $data[$key]->ca_ubi = unserialize($data[$key]->ca_ubi);
        }
        return $data;
    }
    public function create_1()
    {
        $cliente = Cliente::where('ca_estado', '1')->get();
        return view('pedido.pdd_pedidoNew')->with('cliente', $cliente);
    }
}
