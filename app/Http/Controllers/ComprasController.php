<?php

namespace App\Http\Controllers;

use App\Models\compras;
use App\Http\Requests\StorecomprasRequest;
use App\Http\Requests\UpdatecomprasRequest;
use App\Models\caducidad;
use App\Models\kardex;
use App\Models\producto;
use App\Models\promov;
use App\Models\provedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pros = provedor::where('ca_estado', 1)->get();
        return view('inventario.compras')->with('pros', $pros);
    }
    public function store_1(Request $request)
    {
        $docRespaldo = $request->input('docr');
        $d = 0;
        $d2 = 0;
        $data_error = array();
        foreach ($request->input('data') as $key => $value) {
            $tipo = $pro = kardex::where('id_pro', $value['id'])->first();
            if ($tipo == null) {
                $fis_entrado = $value['cant'];
                $fis_salida = '-';
                $fis_saldo = $value['cant'];
                $costo = ($value['cost'] * 87) / 100;
                $va_debe = round(($fis_entrado * $costo), 2);
                $va_haber = '-';
                $va_saldo = round(($fis_entrado * $costo), 2);
                $d += 1;
            } else {
                $d2 += 1;
                $regKrd = kardex::latest('id')->where('id_pro', $value['id'])->first();
                $fis_entrado = $value['cant'];
                $fis_salida = '-';
                $fis_saldo = $value['cant'] + $regKrd->kd_sdo_fis;
                $costo = ($value['cost'] * 87) / 100;
                $va_debe = round(($value['cant'] * $costo), 2);
                $va_haber = '-';
                $va_saldo = $va_debe + $regKrd->kd_sdo_val;
            }
            $n = new kardex();
            $n->id_pro = $value['id'];
            $n->id_provedor = null;
            $n->kd_detalle = 'compra';
            $n->kd_respaldo = $docRespaldo;

            $n->kd_ent = $fis_entrado;
            $n->kd_sal = '-';
            $n->kd_sdo_fis = $fis_saldo;
            $n->kd_costo = $costo;
            $n->kd_deb =  $va_debe;
            $n->kd_hab = '-';
            $n->kd_sdo_val = $va_saldo;

            $n->ca_usu_cod = Auth::user()->id;
            $n->ca_tipo = 'create';
            $n->ca_estado = 1;
            // return $n;
            $res1 = $n->save();

            $cad = new caducidad();
            $cad->id_pro = $n->id_pro;
            $cad->id_provedor = null;
            $cad->cad_lote = $value['lote'];
            $cad->cad_cantidad = $value['cant'];
            $cad->cad_fecha = $value['feve'];
            $cad->ca_usu_cod = Auth::user()->id;
            $cad->ca_tipo = 'create';
            $cad->ca_estado = 1;
            $cad->save();

            $p = producto::find($n->id_pro);
            $data = unserialize($p->pdo_data);
            $data['cantidad'] = $value['cant'];
            $data['fechVenc'] = $value['feve'];
            $data['lote'] = $value['lote'];
            $p->pdo_data =  serialize($data);
            $res2 = $p->save();

            $compra = new compras();
            $compra->compra_data = serialize($request->input('data'));
            $compra->ca_usu_cod = Auth::user()->id;
            $compra->ca_tipo = 'create';
            $compra->ca_estado = 1;
            $res3 = $compra->save();
        }
        return ($res1 == 1 && $res2 == 1 && $res3 == 1) ? 'success' : 'error fatal';
    }

    public function home_listCompras()
    {
        return view('inventario.inv_home_regisCompras');
    }
}
