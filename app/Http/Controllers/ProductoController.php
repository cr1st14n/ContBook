<?php

namespace App\Http\Controllers;

use App\Models\producto;
use App\Http\Requests\StoreproductoRequest;
use App\Http\Requests\UpdateproductoRequest;
use App\Models\provedor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Foreach_;

// use GuzzleHttp\Psr7\Request;

class ProductoController extends Controller
{
    protected $method;
    public function __construct($method = '')
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $probs = provedor::where('ca_estado', '1')->get();
        return view('producto.producto_home')->with('probs', $probs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_1(Request $request)
    {
        if ($request->input('lista') == 't') {
            $data = producto::join('provedors', 'provedors.id', 'productos.pdo_id_provedor')
                ->select('productos.*', 'provedors.prov_sigla')
                ->orderBy('pdo_id_provedor', 'asc')
                ->orderBy('pdo_cod', 'desc')
                ->get();
            foreach ($data as $key => $value) {
                $data[$key]['pdo_data'] = unserialize($value->pdo_data);
            }
            return $data;
        }
        if ($request->input('lista') == 'a') {
            $listAct = '1';
        }
        if ($request->input('lista') == 'i') {
            $listAct = '0';
        }

        $data = producto::where('productos.ca_estado', $listAct)
            ->join('provedors', 'provedors.id', 'productos.pdo_id_provedor')
            ->select('productos.*', 'provedors.prov_sigla')
            ->orderBy('pdo_id_provedor', 'asc')
            ->orderBy('pdo_cod', 'desc')
            ->get();
        foreach ($data as $key => $value) {
            $data[$key]['pdo_data'] = unserialize($value->pdo_data);
        }
        return $data;
    }

    public function list_proActivo()
    {
        // $provedor=provedor::where('ca_estado','1')->get();

        $producto = producto::where('productos.ca_estado', '1')
            ->join('provedors', 'provedors.id', 'productos.pdo_id_provedor')
            ->select(
                'productos.id',
                'productos.pdo_nomComer',
                'productos.pdo_nomGen',
                'productos.ca_estado',
                'productos.pdo_cod',
                'provedors.prov_sigla'
            )
            ->orderBy('productos.created_at', 'desc')
            ->get();
        return ['producto' => $producto];
    }


    public function store_1(Request $request)
    {
        // if ($request->input('pdo_cod') == producto::where('pdo_cod', $request->input('pdo_cod'))->value('pdo_cod')) {
        //     return 'err_cod1';
        // }
        if ($request->input('pdo_cod2') != '') {
            if ($request->input('pdo_cod2') == producto::where('pdo_cod2', $request->input('pdo_cod2'))->value('pdo_cod2')) {
                return 'err_cod2';
            }
        }
        $p = new producto();
        $p->pdo_cod = producto::where('pdo_id_provedor', $request->input('pdo_id_provedor'))->max('pdo_cod') + 1;
        $p->pdo_id_provedor = $request->input('pdo_id_provedor');
        $p->pdo_cod2 = $request->input('pdo_cod2');
        $p->pdo_nomComer = $request->input('pdo_nomComer');
        $p->pdo_nomGen = $request->input('pdo_nomGen');
        $p->pdo_concentracion = $request->input('pdo_concentracion');
        $p->pdo_uMedida = $request->input('pdo_uMedida');
        $p->pdo_formFarm = $request->input('pdo_formFarm');
        $p->pdo_data = serialize(['cantidad' => '', 'fechVenc' => '', 'lote' => '']);

        $p->pdo_preUniVenta1 = $request->input('pdo_preUniVenta1');
        $p->pdo_preUniVenta2 = $request->input('pdo_preUniVenta2');
        $p->pdo_preUniVenta3 = $request->input('pdo_preUniVenta3');

        $p->ca_usu_cod = Auth::user()->id;
        $p->ca_tipo = 'create';
        $p->ca_estado = 1;

        return $res = $p->save();
    }
    public function change_est(Request $request)
    {
        $up = producto::find($request->input('id'));
        $retVal = ($up->ca_estado == '0') ? "1" : "0";
        $up->ca_estado = $retVal;
        return $r = $up->save();
    }

    public function query_buscarPro(Request $request)
    {
        return producto::Where('pdo_cod', 'LIKE', '%' . $request->input('data') . '%')
            ->orWhere('pdo_desc', 'LIKE', '%' . $request->input('data') . '%')
            ->orWhere('pdo_nomGen', 'LIKE', '%' . $request->input('data') . '%')
            ->get();
    }

    public function query_buscarListPro(Request $request)
    {
        $pro = producto::where('productos.ca_estado', 1)->Where('pdo_id_provedor', $request->input('data'))
            ->join('provedors as p', 'p.id', 'productos.pdo_id_provedor')
            ->select('productos.*', 'p.prov_sigla')
            ->get();
        foreach ($pro as $key => $value) {
            if ($value['pdo_nomComer'] == null) {
                $pro[$key]['pdo_nomComer'] = '';
            };
            if ($value['pdo_nomGen'] == null) {
                $pro[$key]['pdo_nomGen'] = '';
            };
        }
        return json_encode($pro);
    }
    public function query_buscarListPro_22(Request $request)
    {
        $lab = provedor::where('prov_sigla', 'iLike', $request->input('prov'))->value('id');
        $pro = producto::where('productos.ca_estado', 1)->Where('pdo_id_provedor', $lab)->where('pdo_cod', $request->input('id'))
            ->join('provedors as p', 'p.id', 'productos.pdo_id_provedor')
            ->select('productos.*', 'p.prov_sigla')
            ->get();
        foreach ($pro as $key => $value) {
            if ($value['pdo_nomComer'] == null) {
                $pro[$key]['pdo_nomComer'] = '';
            };
            if ($value['pdo_nomGen'] == null) {
                $pro[$key]['pdo_nomGen'] = '';
            };
        }
        return json_encode($pro);
    }

    public function query_verf_cant_1(Request $request)
    {
        $data = $request->input('data');
        foreach ($data as $key => $value) {
            $datos = unserialize(producto::where('id', $value['pro']['id'])->value('pdo_data'));
            array_push($data[$key], ['enStock' => $datos['cantidad']]);
        }
        return $data;
    }

    public function update_1(Request $request)
    {
        $up = producto::find($request->input('id'));
        $up->pdo_cod2 = $request->input('pdo_cod2_edit');
        $up->pdo_nomComer = $request->input('pdo_nomComer_edit');
        $up->pdo_nomGen = $request->input('pdo_nomGen_edit');
        $up->pdo_concentracion = $request->input('pdo_concentracion_edit');
        $up->pdo_uMedida = $request->input('pdo_uMedida_edit');
        $up->pdo_formFarm = $request->input('pdo_formFarm_edit');
        $up->pdo_preUniVenta1 = $request->input('pdo_preUniVenta1_edit');
        $up->pdo_preUniVenta2 = $request->input('pdo_preUniVenta2_edit');
        $up->pdo_preUniVenta3 = $request->input('pdo_preUniVenta3_edit');
        $up->ca_usu_cod = Auth::user()->id;
        $up->ca_tipo = 'update';
        $res = $up->save();
        if (!$res) {
            return $res;
        }
        $up->pdo_data = unserialize($up->pdo_data);
        $up->labSigla = provedor::where('id', $up->pdo_id_provedor)->value('prov_sigla');
        return $up;
    }
    public function query_buscarListPro_2(Request $request)
    {
        $lab = provedor::where('prov_sigla', 'iLike', $request->input('prov'))->value('id');
        if ($lab != null) {
            $pro = producto::where('productos.ca_estado', 1)
                ->Where('pdo_id_provedor', $lab)
                ->Where('pdo_cod', $request->input('id'))
                ->join('provedors as p', 'p.id', 'productos.pdo_id_provedor')
                ->select('productos.*', 'p.prov_sigla')
                ->get();
            foreach ($pro as $key => $value) {
                if ($value['pdo_nomComer'] == null) {
                    $pro[$key]['pdo_nomComer'] = '';
                };
                if ($value['pdo_nomGen'] == null) {
                    $pro[$key]['pdo_nomGen'] = '';
                };
                $pro[$key]['pdo_data'] = unserialize($value['pdo_data']);
            }
            return json_encode($pro);
        } else {
            return false;
        }
    }
    public function query_buscarListPro_3(Request $request)
    {
        $pro = producto::where('productos.ca_estado', 1)
            ->Where('pdo_nomGen', 'iLIKE', '%' . $request->input('val') . '%')
            ->Where('pdo_nomComer', 'iLIKE', '%' . $request->input('val') . '%')
            ->join('provedors as p', 'p.id', 'productos.pdo_id_provedor')
            ->select('productos.*', 'p.prov_sigla')
            ->limit('50')
            ->get();
        foreach ($pro as $key => $value) {
            if ($value['pdo_nomComer'] == null) {
                $pro[$key]['pdo_nomComer'] = '';
            };
            if ($value['pdo_nomGen'] == null) {
                $pro[$key]['pdo_nomGen'] = '';
            };
            $pro[$key]['pdo_data'] = unserialize($value['pdo_data']);
        }
        return json_encode($pro);
    }
}
