<?php

namespace App\Http\Controllers;

use App\Models\provedor;
use App\Http\Requests\StoreprovedorRequest;
use App\Http\Requests\UpdateprovedorRequest;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreprovedorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreprovedorRequest $request)
    {
        //
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
