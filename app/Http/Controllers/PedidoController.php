<?php

namespace App\Http\Controllers;

use App\Models\pedido;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Psy\CodeCleaner\ReturnTypePass;
use App\Http\Requests\StorepedidoRequest;
use App\Http\Requests\UpdatepedidoRequest;
use App\Models\kardex;
use App\Models\producto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        $clientes = Cliente::where('ca_estado', 1)->get();
        $usurios = User::where('ca_estado', 1)->get();
        return view('pedido.pdd_home')->with('usuarios', $usurios)->with('clientes', $clientes);
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
                    ->orderBy('pedidos.created_at', 'desc')
                    ->get();
                break;
            case 'tipo_2':
                $data = pedido::where('pedidos.ca_estado', '1')
                    ->where('pedidos.id_cliente', $request->input('id'))
                    ->join('users', 'users.id', 'pedidos.ca_usu_cod')
                    ->join('clientes as c', 'c.id', 'pedidos.id_cliente')
                    ->select('pedidos.*', 'users.usu_nombre', 'c.cli_nombre', 'c.cli_ci', 'c.cli_razonSocial', 'c.cli_razonSocialNit')
                    ->orderBy('pedidos.created_at', 'desc')
                    ->get();
                break;
            case 'tipo_3':
                $data = pedido::where('pedidos.ca_estado', '1')
                    ->where('pedidos.ca_usu_cod', $request->input('id'))
                    ->join('users', 'users.id', 'pedidos.ca_usu_cod')
                    ->join('clientes as c', 'c.id', 'pedidos.id_cliente')
                    ->select('pedidos.*', 'users.usu_nombre', 'c.cli_nombre', 'c.cli_ci', 'c.cli_razonSocial', 'c.cli_razonSocialNit')
                    ->orderBy('pedidos.created_at', 'desc')
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

    public function store_pedVenta(Request $request)
    {
        foreach ($request->input('data') as $key => $value) {
            $cont = producto::where('id', $value['pro']['id'])->value('pdo_data');
            $cont = (unserialize($cont))['cantidad'];
            if ($value['cant'] > $cont || $value['cant']==0) {
                return 'error_stock';
            }
        }
        foreach ($request->input('data') as $key => $value) {
            # code...
            $regKrd = kardex::latest('id')->where('id_pro', $value['pro']['id'])->first();

            $cont = producto::where('id', $value['pro']['id'])->value('pdo_data');
            $cont = (unserialize($cont))['cantidad'];

            $fis_salida = $value['cant'];
            $fis_saldo = $cont - $value['cant'];
            $costo = $regKrd->kd_sdo_val / $regKrd->kd_sdo_fis;
            $va_debe = '-';
            $va_haber = $costo * $fis_salida;
            $va_saldo =  $regKrd->kd_sdo_val - $va_haber;



            $n = new kardex();
            $n->id_pro = $value['pro']['id'];
            $n->kd_detalle = 'venta';
            $n->kd_respaldo = '-'; //! relacionar con la table ventas

            $n->kd_ent = '-';
            $n->kd_sal = $fis_salida;
            $n->kd_sdo_fis = $fis_saldo;
            $n->kd_costo = round($costo, 2);
            $n->kd_deb = '-';
            $n->kd_hab = round($va_haber, 2);
            $n->kd_sdo_val = round($va_saldo, 2);

            $n->ca_usu_cod = Auth::user()->id;
            $n->ca_tipo = 'create';
            $n->ca_estado = 1;
            // return $n;
            $res1 = $n->save();

            $p = producto::find($value['pro']['id']);
                $data = unserialize($p->pdo_data);
                $data['cantidad'] = $n->kd_sdo_fis;
            $p->pdo_data =  serialize($data);
            $res2 = $p->save();


        }
        $up_p=pedido::find($request->input('id'));
        $up_p->ca_estado=3;
        $up_p->save();
        return ($res1 == 1 && $res2 == 1) ? 'success' : 'error fatal';
    }
}


