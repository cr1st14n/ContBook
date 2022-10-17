<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\pedido;
use App\Models\producto;
use App\Models\provedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $provs = provedor::get();
        //    return $producto[2191];
        return view('AppMod.pedido_index')->with('provs', $provs);
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
            ->limit('100')
            ->get();
    }
    public function listProducto(Request $request)
    {
        return producto::select('id', 'pdo_nomGen', 'pdo_nomComer', 'pdo_cant')
            ->join('provedors as pro', 'pro.id', 'productos.pdo_id_provedor')
            ->where('productos.ca_estado', '1')
            ->select('productos.id', 'pdo_cod', 'pdo_cant', 'pdo_nomGen', 'pdo_nomComer', 'prov_sigla', 'prov_nombre', 'pdo_id_provedor', 'pdo_preUniVenta1', 'pdo_preUniVenta2', 'pdo_preUniVenta3')
            ->get();
    }
    public function busProducto(Request $request)
    {
        // return $request;
        if ($request->input('lab') == 'all') {
            $pro = producto::select('id', 'pdo_nomGen', 'pdo_nomComer', 'pdo_cant')
                ->join('provedors as pro', 'pro.id', 'productos.pdo_id_provedor')
                ->where('productos.ca_estado', '1')
                ->where(function ($query) use ($request) {
                    $query->where('pdo_nomGen', 'iLIKE',          '%' . $request->input('data') . '%')
                        ->orWhere('pdo_nomComer', 'iLIKE',        '%' .       $request->input('data') . '%');
                })
                ->select('productos.id', 'pdo_cod', 'pdo_data', 'pdo_nomGen', 'pdo_nomComer', 'prov_sigla', 'prov_nombre', 'pdo_id_provedor', 'pdo_preUniVenta1', 'pdo_preUniVenta2', 'pdo_preUniVenta3')
                ->limit('200')->get();
        } else {
            # code...
            $pro = producto::select('id', 'pdo_nomGen', 'pdo_nomComer', 'pdo_cant')
                ->join('provedors as pro', 'pro.id', 'productos.pdo_id_provedor')
                ->where('productos.ca_estado', '1')
                ->where('productos.pdo_id_provedor', $request->input('lab'))
                ->where(function ($query) use ($request) {
                    $query->where('pdo_nomGen', 'iLIKE',          '%' . $request->input('data') . '%')
                        ->orWhere('pdo_nomComer', 'iLIKE',        '%' .       $request->input('data') . '%');
                })
                ->select('productos.id', 'pdo_cod', 'pdo_data', 'pdo_nomGen', 'pdo_nomComer', 'prov_sigla', 'prov_nombre', 'pdo_id_provedor', 'pdo_preUniVenta1', 'pdo_preUniVenta2', 'pdo_preUniVenta3')
                ->limit('200')->get();
        }

        foreach ($pro as $key => $value) {
            $pro[$key]['pdo_data'] = unserialize($value['pdo_data']);
        }
        return $pro;
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
        if ($request->input('tipo') == '1') {
            return view('AppMod.catalogo');
        }
    }

    public function list1(Request $request)
    {
        $data = producto::select()
            ->where('productos.ca_estado', '1')
            ->join('provedors as pro', 'pro.id', 'productos.pdo_id_provedor')
            ->select(
                'productos.id',
                'pdo_cod',
                'pdo_data',
                'pdo_nomGen',
                'pdo_nomComer',
                'prov_sigla',
                'prov_nombre',
                'pdo_id_provedor',
                'pdo_preUniVenta1',
                'pdo_preUniVenta2',
                'pdo_preUniVenta3'
            )
            ->get();
        foreach ($data as $key => $value) {
            $data[$key]['pdo_data'] = unserialize($value['pdo_data']);
        }
        return $data;
    }
    public function storeCliente(Request $request)
    {
        $newclie = new Cliente();
        $newclie->cli_nombre = $request->input('cli_nombre');
        $newclie->cli_ci = $request->input('cli_ci');
        $newclie->cli_razonSocial = $request->input('cli_razonSocial');
        $newclie->cli_razonSocialNit = $request->input('cli_razonSocialNit');
        $newclie->cli_telf = $request->input('cli_telf');
        $newclie->cli_mail = $request->input('cli_mail');
        $newclie->cli_direccion = $request->input('cli_direccion');
        $newclie->ca_usu_cod = Auth::user()->id;
        $newclie->ca_tipo = 'create';
        $newclie->ca_estado = '1';
        $newclie->ca_ubi = serialize(['lat' => $request->input('lat'), 'lon' => $request->input('lon'), 'link' => $request->input('enlace')]);
        return $res = $newclie->save();
    }

    public function busProducto_2(Request $request)
    {
        // return serialize(['cantidad' => 0, 'fechVenc' => '']);

        $pro = producto::select('id', 'pdo_nomGen', 'pdo_nomComer', 'pdo_cant')
            ->join('provedors as pro', 'pro.id', 'productos.pdo_id_provedor')
            ->where('productos.ca_estado', '1')
            ->where('productos.pdo_id_provedor', $request->input('lab'))
            // ->where(function ($query) use ($request) {
            //     $query->where('pdo_nomGen', 'iLIKE',          '%' . $request->input('data') . '%')
            //         ->orWhere('pdo_nomComer', 'iLIKE',        '%' .       $request->input('data') . '%');
            // })
            ->select('productos.id', 'pdo_cod', 'pdo_data', 'pdo_nomGen', 'pdo_nomComer', 'prov_sigla', 'prov_nombre', 'pdo_id_provedor', 'pdo_preUniVenta1', 'pdo_preUniVenta2', 'pdo_preUniVenta3')
            ->get();

        foreach ($pro as $key => $value) {
            $pro[$key]['pdo_data'] = unserialize($value['pdo_data']);
        }
        return $pro;
    }
}
