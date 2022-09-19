<?php

namespace App\Http\Controllers;

use App\Models\kardex;
use App\Http\Requests\StorekardexRequest;
use App\Http\Requests\UpdatekardexRequest;
use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KardexController extends Controller
{
    public function index()
    {
        return view('inventario.inv_kardex');
    }
    public function query_list_1()
    {
        return kardex::orderBy('id', 'desc')->get();
    }
    public function mov_E(Request $request)
    {
        $pro = kardex::where('id_pro', $request->input('ent_pro'))->first();
        if ($request->input('ent_motivo') == 'invInicial') {
            if ($pro != null) {
                return 'erro_noInicial';
            }
            $fis_entrado = $request->input('ent_cant');
            $fis_salida = '-';
            $fis_saldo = $request->input('ent_cant');
            $costo = ($request->input('ent_cost') * 87) / 100;
            $va_debe = $request->input('ent_cant') * (($request->input('ent_cost') * 87) / 100);
            $va_haber = '-';
            $va_saldo = $request->input('ent_cant') * (($request->input('ent_cost') * 87) / 100);
        } else {
            if ($pro == null) {
                return 'sin previo registro';
            }
            $regKrd = kardex::latest('id')->where('id_pro', $request->input('ent_pro'))->first();
            $fis_entrado = $request->input('ent_cant');
            $fis_salida = '-';
            $fis_saldo = $request->input('ent_cant') + $regKrd->kd_sdo_fis;
            $costo = ($request->input('ent_cost') * 87) / 100;
            $va_debe = $request->input('ent_cant') * (($request->input('ent_cost') * 87) / 100);
            $va_haber = '-';
            $va_saldo = ($request->input('ent_cant') * (($request->input('ent_cost') * 87) / 100)) + $regKrd->kd_sdo_val;
        }

        $n = new kardex();
        $n->id_pro = $request->input('ent_pro');
        $n->kd_detalle = $request->input('ent_motivo');
        $n->kd_respaldo = $request->input('ent_respaldo');

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

        $p = producto::find($request->input('ent_pro'));
        $p->pdo_cant = $n->kd_sdo_fis;
        $res2 = $p->save();
        return ($res1 == 1 && $res2 == 1) ? 'success' : 'error fatal';

        // return 'con datos';
    }
    public function mov_S(Request $request)
    {
        $cont = producto::where('id', $request->input('sal_pro'))->value('pdo_cant');
        if ($cont < 1 || $request->input('sal_cant') > $cont) {
            return 'error_sin_Stock';
        }
        $regKrd = kardex::latest('id')->where('id_pro', $request->input('sal_pro'))->first();

        $fis_salida = $request->input('sal_cant');
        $fis_saldo = $cont - $request->input('sal_cant');
        $costo = $regKrd->kd_sdo_val / $regKrd->kd_sdo_fis;
        $va_debe = '-';
        $va_haber = $costo * $fis_salida;
        $va_saldo =  $regKrd->kd_sdo_val - $va_haber;


        $n = new kardex();
        $n->id_pro = $request->input('sal_pro');
        $n->kd_detalle = $request->input('sal_motivo');
        $n->kd_respaldo = $request->input('sal_respaldo');

        $n->kd_ent = '-';
        $n->kd_sal = $fis_salida;
        $n->kd_sdo_fis = $fis_saldo;
        $n->kd_costo =round( $costo,2);
        $n->kd_deb = '-';
        $n->kd_hab = round($va_haber,2) ;
        $n->kd_sdo_val =round( $va_saldo,2);

        $n->ca_usu_cod = Auth::user()->id;
        $n->ca_tipo = 'create';
        $n->ca_estado = 1;
        // return $n;
        $res1 = $n->save();

        $p = producto::find($request->input('sal_pro'));
        $p->pdo_cant = $n->kd_sdo_fis;
        $res2 = $p->save();
        return ($res1 == 1 && $res2 == 1) ? 'success' : 'error fatal';
    }
}
