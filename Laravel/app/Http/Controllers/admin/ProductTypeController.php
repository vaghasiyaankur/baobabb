<?php

namespace App\Http\Controllers\admin;

use App\Models\ProductType;
use App\Http\Requests\StoreproductTypeRequest;
use App\Http\Requests\UpdateproductTypeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

class ProductTypeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:product-type-list|product-type-create|product-type-update|product-type-delete', ['only' => ['index','show']]);
        $this->middleware('permission:product-type-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-type-update', ['only' => ['edit','update']]);
        $this->middleware('permission:product-type-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ProductType::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<div class="d-flex">';
                        $btn .= '<a href="/admin/product/type/'.$row->id.'/edit" class="edit btn btn-primary btn-sm m-1">Edit</a>';
                        // $btn .= '<form method="POST" action="/admin/product/type/'.$row->id.'"><input type="hidden" name="_token" value="'.csrf_token().'"><input type="hidden" name="_method" value="DELETE"><button type="submit"class="edit btn btn-primary btn-sm m-1">Delete</button></form>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.product.type.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.type.create');
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
    public function edit($id)
    {
        $type = ProductType::find($id);
        return view('admin.product.type.create',compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductTypeRequest  $request
     * @param  \App\Models\productType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $type = ProductType::find($id);
        $type->name = $request->name;
        $type->save();
        return redirect()->route('admin.product.type.index');
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
