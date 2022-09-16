<?php

namespace App\Http\Controllers;

use App\Models\provedor;
use App\Http\Requests\StoreprovedorRequest;
use App\Http\Requests\UpdateprovedorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProvedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventario.provedor');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function query_list()
    {
        return provedor::orderBy('created_at', 'desc')->get();
    }

    public function query_store(Request $request)
    {
        $new = new provedor();
        $new->prov_nombre = $request->input('prov_nombre');
        $new->prov_nit = $request->input('prov_nit');
        $new->prov_telf = $request->input('prov_telf');
        $new->prov_mail = $request->input('prov_mail');
        $new->prov_contacto = $request->input('prov_contacto');
        $new->prov_telfContacto = $request->input('prov_telfContacto');

        $new->ca_usu_cod = Auth::user()->id;
        $new->ca_tipo = 'create';
        $new->ca_estado = 1;
        return $r = $new->save();
    }

    public function query_upd_estado(Request $request)
    {
        $upd = provedor::find($request->input('id'));
        $es = ($upd->ca_estado == '0') ? "1" : "0";

        $upd->ca_estado = $es;
        return $h = $upd->save();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\provedor  $provedor
     * @return \Illuminate\Http\Response
     */
    public function show(provedor $provedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\provedor  $provedor
     * @return \Illuminate\Http\Response
     */
    public function edit(provedor $provedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprovedorRequest  $request
     * @param  \App\Models\provedor  $provedor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateprovedorRequest $request, provedor $provedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\provedor  $provedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(provedor $provedor)
    {
        //
    }
}
