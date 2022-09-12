<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('usuarios.view1');
    }
    public function store(Request $request)
    {
        if ($request->input('u_cod') == User::where('usu_cod', $request->input('u_cod'))->value('usu_cod')) {
            return 'Er_cod';
        }
        if ($request->input('u_mail') != '') {
            if ($request->input('u_mail') == User::where('email', $request->input('u_mail'))->value('email')) {
                return 'Er_mail';
            }
        }
        $new = new User();
        $new->email = $request->input('u_mail');
        $new->usu_cod = $request->input('u_cod');
        $new->usu_ci = $request->input('u_ci');
        $new->usu_nombre = $request->input('u_nombre');
        $new->usu_fechnac = Carbon::parse($request->input('u_fn'))->format('Y-m-d');
        $new->usu_telf = $request->input('u_telf');
        $new->usu_domicilio = $request->input('u_dom');
        $new->usu_grupoPermiso = $request->input('u_grupo');
        $new->usu_estado = $request->input('u_est');

        $new->password = bcrypt('password');
        $new->ca_usu_cod = Auth::user()->id;
        $new->ca_tipo = 'create';
        $new->ca_estado = 1;
        $res = $new->save();
        return $res;
    }
    public function list_1()
    {
        return User::select('id', 'email', 'usu_cod', 'usu_ci', 'usu_nombre', 'usu_fechnac', 'usu_telf', 'usu_domicilio', 'usu_grupoPermiso', 'usu_estado', 'created_at')->orderBy('created_at','desc')->get();
    }
    public function edit_1(Request $request)
    {
        return User::where('id', $request->input('id'))->select('id', 'email', 'usu_cod', 'usu_ci', 'usu_nombre', 'usu_fechnac', 'usu_telf', 'usu_domicilio', 'usu_grupoPermiso', 'usu_estado',)->first();
    }
    public function update_1($id, Request $request)
    {
        $new = User::find($id);

        if ($request->input('u_cod_edit') != $new->usu_cod) {
            if ($request->input('u_cod_edit') == User::where('usu_cod', $request->input('u_cod_edit'))->value('usu_cod')) {
                return 'Er_cod';
            }
        }
        if ($request->input('u_mail_edit') != $new->email) {
            if ($request->input('u_mail_edit') == User::where('email', $request->input('u_mail_edit'))->value('email')) {
                return 'Er_mail';
            }
        }

        $new->email = $request->input('u_mail_edit');
        $new->usu_cod = $request->input('u_cod_edit');
        $new->usu_ci = $request->input('u_ci_edit');
        $new->usu_nombre = $request->input('u_nombre_edit');
        $new->usu_fechnac = Carbon::parse($request->input('u_fn_edit'))->format('Y-m-d');
        $new->usu_telf = $request->input('u_telf_edit');
        $new->usu_domicilio = $request->input('u_dom_edit');
        $new->usu_grupoPermiso = $request->input('u_grupo_edit');
        $new->usu_estado = $request->input('u_est_edit');

        $new->ca_usu_cod = Auth::user()->id;
        $new->ca_tipo = 'update';
        $res = $new->save();
        return $res;
    }
    public function update_estado(Request $request)
    {
        $up=User::find($request->input('id'));
        $retVal = ($up->usu_estado=='0') ? "1" : "0" ;
        $up->usu_estado = $retVal;
        return $r=$up->save();
    }
}
