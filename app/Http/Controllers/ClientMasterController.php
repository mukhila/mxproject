<?php

namespace App\Http\Controllers;

use App\Models\ClientMaster;
use App\Http\Requests\StoreClientMasterRequest;
use App\Http\Requests\UpdateClientMasterRequest;

class ClientMasterController extends Controller
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
     * @param  \App\Http\Requests\StoreClientMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientMasterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClientMaster  $clientMaster
     * @return \Illuminate\Http\Response
     */
    public function show(ClientMaster $clientMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientMaster  $clientMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientMaster $clientMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientMasterRequest  $request
     * @param  \App\Models\ClientMaster  $clientMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientMasterRequest $request, ClientMaster $clientMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientMaster  $clientMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientMaster $clientMaster)
    {
        //
    }
}
