<?php

namespace App\Http\Controllers;

use App\Models\field;
use App\Http\Requests\StorefieldRequest;
use App\Http\Requests\UpdatefieldRequest;

class FieldController extends Controller
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
     * @param  \App\Http\Requests\StorefieldRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorefieldRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(field $field)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit(field $field)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatefieldRequest  $request
     * @param  \App\Models\field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatefieldRequest $request, field $field)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy(field $field)
    {
        //
    }
}
