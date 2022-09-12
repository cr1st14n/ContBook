<?php

namespace App\Http\Controllers;

use App\Models\producto;
use App\Http\Requests\StoreproductoRequest;
use App\Http\Requests\UpdateproductoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('producto.producto_home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_1(Request $request)
    {
        if ($request->input('lista')=='t') {
            return producto::orderBy('created_at','desc')->get();
        }
        if ($request->input('lista')=='a') {
            $listAct='1';
        }
        if ($request->input('lista')=='i') {
            $listAct='0';
        }
        return producto::where('ca_estado',$listAct)->orderBy('created_at','desc')->get();
    }


    public function store_1(Request $request)
    {
        if ($request->input('pdo_cod') == producto::where('pdo_cod', $request->input('pdo_cod'))->value('pdo_cod')) {
            return 'err_cod1';
        }
        if ($request->input('pdo_cod2') != '') {
            if ($request->input('pdo_cod2') == producto::where('pdo_cod2', $request->input('pdo_cod2'))->value('pdo_cod2')) {
                return 'err_cod2';
            }
        }
        $p = new producto();
        $p->pdo_cod = $request->input('pdo_cod');
        $p->pdo_cod2 = $request->input('pdo_cod2');
        $p->pdo_nomGen = $request->input('pdo_nomGen');
        $p->pdo_concentracion = $request->input('pdo_concentracion');
        $p->pdo_uMedica = $request->input('pdo_uMedica');
        $p->pdo_formFarm = $request->input('pdo_formFarm');
        $p->pdo_cant = '0';

        $p->ca_usu_cod = Auth::user()->id;
        $p->ca_tipo = 'create';
        $p->ca_estado = 1;

        return $res = $p->save();
    }
    public function change_est(Request $request)
    {
        $up=producto::find($request->input('id'));
        $retVal = ($up->ca_estado=='0') ? "1" : "0" ;
        $up->ca_estado = $retVal;
        return $r=$up->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductoRequest  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproductoRequest $request, producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(producto $producto)
    {
        //
    }
}
