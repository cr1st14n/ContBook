<?php

namespace App\Http\Controllers;

use App\Models\kardex;
use App\Http\Requests\StorekardexRequest;
use App\Http\Requests\UpdatekardexRequest;
use App\Models\caducidad;
use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\homeController;
use App\Models\provedor;
use App\Models\User;
use Carbon\Carbon;
use PhpParser\Node\Stmt\Foreach_;

class KardexController extends Controller
{
    public function index()
    {
        $producto = producto::where('ca_estado', '1')->select('id', 'pdo_nomGen', 'pdo_nomComer', 'ca_estado',)->orderBy('created_at', 'desc')->get();
        return view('inventario.inv_kardex')->with('productos', $producto);
    }
    public function query_list_1()
    {
        $pro= kardex::join('productos', 'kardexes.id_pro', '=', 'productos.id')
            ->join('provedors', 'provedors.id', 'productos.pdo_id_provedor')
            ->orderBy('kardexes.id', 'asc')
            ->select('kardexes.*')
            ->addSelect('productos.pdo_cod', 'productos.pdo_nomGen', 'productos.pdo_nomComer', 'provedors.prov_sigla')
            ->get();
        foreach ($pro as $i => $data) {
            $pro[$i]['detUsu'] = User::where('id', $data->ca_usu_cod)->select('usu_cod', 'usu_nombre')->first();
            $pro[$i]['created_at2'] = Carbon::parse($data->created_at)->format('d-m-Y');
        }
        return json_encode($pro);
    }
    public function query_list_2(Request $request)
    {
        return kardex::join('productos', 'kardexes.id_pro', '=', 'productos.id')
            ->where('kardexes.id_pro', $request->input('id'))
            ->join('provedors', 'provedors.id', 'productos.pdo_id_provedor')
            ->orderBy('kardexes.id', 'asc')
            ->select('kardexes.*')
            ->addSelect('productos.pdo_cod', 'productos.pdo_nomGen', 'productos.pdo_nomComer', 'provedors.prov_sigla')
            ->get();
    }
    public function query_list_3(Request $request)
    {
        $lab = provedor::where('prov_sigla', 'iLike', $request->input('prov'))->value('id');
        $producto = producto::where('pdo_id_provedor', $lab)->where('pdo_cod', $request->input('id'))->value('id');
        if ($lab != null) {
            $pro = kardex::join('productos', 'kardexes.id_pro', '=', 'productos.id')
                ->where('kardexes.id_pro', $producto)
                ->join('provedors', 'provedors.id', 'productos.pdo_id_provedor')
                ->orderBy('kardexes.id', 'asc')
                ->select('kardexes.*')
                ->addSelect('productos.pdo_cod', 'productos.pdo_nomGen', 'productos.pdo_nomComer', 'provedors.prov_sigla')
                ->get();

            foreach ($pro as $i => $data) {
                $pro[$i]['detUsu'] = User::where('id', $data->ca_usu_cod)->select('usu_cod', 'usu_nombre')->first();
                $pro[$i]['created_at2'] = Carbon::parse($data->created_at)->format('d-m-Y');
            }

            return json_encode($pro);
        } else {
            return false;
        }
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
                return 'Error_iniciarStock';
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
        $n->id_provedor = $request->input('ent_provedor');
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

        $cad = new caducidad();
        $cad->id_pro = $request->input('ent_pro');
        $cad->id_provedor = $request->input('ent_provedor');
        $cad->cad_lote = $request->input('cad_lote');
        $cad->cad_cantidad = $fis_entrado;
        $cad->cad_fecha = $request->input('cad_fecha');
        $cad->ca_usu_cod = Auth::user()->id;
        $cad->ca_tipo = 'create';
        $cad->ca_estado = 1;
        $cad->save();

        $p = producto::find($request->input('ent_pro'));
        $data = unserialize($p->pdo_data);
        $data['cantidad'] = $n->kd_sdo_fis;
        $data['fechVenc'] = $cad->cad_fecha;
        $data['lote'] = $cad->cad_lote;
        $p->pdo_data =  serialize($data);
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
        $n->kd_costo = round($costo, 2);
        $n->kd_deb = '-';
        $n->kd_hab = round($va_haber, 2);
        $n->kd_sdo_val = round($va_saldo, 2);

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
