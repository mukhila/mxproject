<?php

namespace App\Http\Controllers;

use App\Models\DenominationMaster;
use App\Http\Requests\StoreDenominationMasterRequest;
use App\Http\Requests\UpdateDenominationMasterRequest;

class DenominationMasterController extends Controller
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
     * @param  \App\Http\Requests\StoreDenominationMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDenominationMasterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DenominationMaster  $denominationMaster
     * @return \Illuminate\Http\Response
     */
    public function show(DenominationMaster $denominationMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DenominationMaster  $denominationMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(DenominationMaster $denominationMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDenominationMasterRequest  $request
     * @param  \App\Models\DenominationMaster  $denominationMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDenominationMasterRequest $request, DenominationMaster $denominationMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DenominationMaster  $denominationMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(DenominationMaster $denominationMaster)
    {
        //
    }
}
