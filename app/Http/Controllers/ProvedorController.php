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

    public function query_edit_prov(Request $request)
    {
        return provedor::where('id',$request->input('id'))->first();
    }

    public function query_update_prov($id,Request $request)
    {
        $up=provedor::find($id);

        $up->prov_nombre =$request->input('prov_nombre_edit');
        $up->prov_nit =$request->input('prov_nit_edit');
        $up->prov_telf =$request->input('prov_telf_edit');
        $up->prov_mail =$request->input('prov_mail_edit');
        $up->prov_contacto =$request->input('prov_contacto_edit');
        $up->prov_telfContacto =$request->input('prov_telfContacto_edit');
        $res=$up->save();
       return $retVal = (!$res) ? 0 : $up ;

    }

    public function query_prov_search(Request $request)
    {
        return  provedor::select("*")
                        ->where('prov_nombre', 'iLIKE', '%'.$request->input('data').'%')
                        ->orWhere('prov_nit', 'iLIKE', '%'.$request->input('data').'%')
                        ->orWhere('prov_telf', 'iLIKE', '%'.$request->input('data').'%')
                        ->orWhere('prov_contacto', 'iLIKE', '%'.$request->input('data').'%')
                        ->orWhere('prov_telfContacto', 'iLIKE', '%'.$request->input('data').'%')
                        ->orWhere('prov_mail', 'iLIKE', '%'.$request->input('data').'%')
                        ->orderBy('created_at', 'desc')->get();
    }

}
