<?php

namespace App\Http\Controllers;

use App\Models\caducidad;
use App\Http\Requests\StorecaducidadRequest;
use App\Http\Requests\UpdatecaducidadRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;


class CaducidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function query_list1()
    {
        return caducidad::
        where('caducidads.ca_estado','1')
        ->get();
        $data = caducidad::join('productos', 'productos.id', 'caducidads.id_pro')
            ->join('provedors', 'provedors.id', 'caducidads.id_provedor')
            ->select('caducidads.*')
            ->addSelect('productos.pdo_nomGen', 'productos.pdo_uMedida', 'provedors.prov_contacto', 'provedors.prov_nombre')
            ->where('caducidads.ca_estado','1')
            ->get();

        $lista = [];
        foreach ($data as $d => $value) {
            $fecha1 = Carbon::now();
            $fecha2 = date_create($value->cad_fecha);
            // $fecha2 = date_create($this->canceled_at);
            $dias = date_diff($fecha1, $fecha2)->format('%R%a');
            array_push($lista, [
                'dias' => $dias,
                'nombre' => $value->pdo_nomGen,
                'cantidad' => $value->cad_cantidad,
                'id' => $value->id,
                'lote' => $value->cad_lote,
                'prov' => $value->prov_nombre
            ]);
        }
        return $lista;
    }
    public function check_est_cad(Request $request)
    {
        $n = caducidad::find($request->input('id'));
        $n->ca_estado = '0';
        return $s = $n->save();
    }
}
