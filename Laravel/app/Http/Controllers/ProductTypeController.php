<?php

namespace App\Http\Controllers;

use App\Models\productType;
use App\Http\Requests\StoreproductTypeRequest;
use App\Http\Requests\UpdateproductTypeRequest;

class ProductTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreproductTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreproductTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(productType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit(productType $productType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductTypeRequest  $request
     * @param  \App\Models\productType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproductTypeRequest $request, productType $productType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy(productType $productType)
    {
        //
    }
}
