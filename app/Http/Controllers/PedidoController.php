<?php

namespace App\Http\Controllers;

use App\Models\pedido;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Psy\CodeCleaner\ReturnTypePass;
use App\Http\Requests\StorepedidoRequest;
use App\Http\Requests\UpdatepedidoRequest;
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
    {
        return view('pedido.pdd_home');
    }
    public function list_1(Request $request)
    {
        // return $request;
        switch ($request->input('data')) {
            case 'tipo_1':
                $data = pedido::where('ca_estado', '1')->get();
                break;
            case 'tipo_2':
                # code...
                break;
            case 'tipo_3':
                # code...
                break;
            case 'tipo_4':
                # code...
                break;

            default:
                # code...
                break;
        }

        foreach ($data as $key => $value) {
             $data[$key]->pdd_productos=unserialize($data[$key]->pdd_productos);
             $data[$key]->ca_ubi=unserialize($data[$key]->ca_ubi);
        }
        return $data;
    }
    public function create_1()
    {
        $cliente = Cliente::where('ca_estado', '1')->get();
        return view('pedido.pdd_pedidoNew')->with('cliente', $cliente);
    }
}
