<?php

namespace App\Http\Controllers;

use App\Models\promov;
use App\Http\Requests\StorepromovRequest;
use App\Http\Requests\UpdatepromovRequest;

class PromovController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorepromovRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepromovRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\promov  $promov
     * @return \Illuminate\Http\Response
     */
    public function show(promov $promov)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\promov  $promov
     * @return \Illuminate\Http\Response
     */
    public function edit(promov $promov)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepromovRequest  $request
     * @param  \App\Models\promov  $promov
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepromovRequest $request, promov $promov)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\promov  $promov
     * @return \Illuminate\Http\Response
     */
    public function destroy(promov $promov)
    {
        //
    }
}
