<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ClienteController extends Controller
{
    public function home()
    {
        return view('cliente.clie_home');
    }
    public function list_1()
    {
        return Cliente::where('ca_estado','1')->get();
    }
    public function store(Request $request)
    {
        if ($request->input('clie_ci') == Cliente::where('cli_ci', $request->input('clie_ci'))->value('cli_ci')) {
            return 'error_1';
        }
        if ($request->input('cli_razonSocialNit') == Cliente::where('cli_razonSocialNit', $request->input('cli_razonSocialNit'))->value('cli_razonSocialNit')) {
            return 'error_2';
        }
        if ($request->input('cli_razonSocial') == Cliente::where('cli_razonSocial', $request->input('cli_razonSocial'))->value('cli_razonSocial')) {
            return 'error_3';
        }
        if ($request->input('cli_mail') != '') {
            if ($request->input('cli_mail') == Cliente::where('cli_mail', $request->input('cli_mail'))->value('cli_mail')) {
                return 'error_4';
            }
        }

        $clie=new Cliente();
        $clie->cli_ci = $request->input('clie_ci');
        $clie->cli_nombre = $request->input('clie_nombre');
        $clie->cli_razonSocialNit = $request->input('cli_razonSocialNit');
        $clie->cli_razonSocial  = ($request->input('cli_razonSocial')!= null) ? $request->input('cli_razonSocial') : '-' ; 
        $clie->cli_mail  = ($request->input('cli_mail')!= null) ? $request->input('cli_mail') : '-' ; 
        $clie->cli_telf  = ($request->input('cli_telf')!= null) ? $request->input('cli_telf') : '-' ; 
        $clie->cli_direccion  = ($request->input('cli_direccion')!= null) ? $request->input('cli_direccion') : '-' ; 

        $clie->ca_usu_cod = Auth::user()->id;
        $clie->ca_tipo = 'create';
        $clie->ca_estado = 1;
        return $res=$clie->save();
    }
}
