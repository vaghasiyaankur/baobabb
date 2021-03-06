<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Picture;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use DataTables;

class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-update|product-delete', ['only' => ['index','show']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-update', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<div class="d-flex">';
                        $btn .= '<a href="/admin/product/'.$row->id.'/edit" class="edit btn btn-light btn-sm m-1">Edit</a>';
                        $btn .= '<form method="POST" action="/admin/product/'.$row->id.'"><input type="hidden" name="_token" value="'.csrf_token().'"><input type="hidden" name="_method" value="DELETE"><button type="submit"class="edit btn btn-light btn-sm m-1">Delete</button></form>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreproductRequest $request)
    {
        
        $product = new Product;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        // $product->image = $image;
        // $product->gallery = json_encode($gallery);
        $product->seller_id = auth()->user()->id;
        $product->slug = $request->slug;
        $product->type_of = $request->type_of;
        $product->condition = $request->condition;
        $product->cash = $request->cash;
        $product->lat = $request->latitude;
        $product->long = $request->longitude;
        $product->description = $request->description;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->description = $request->description;
        $product->country = $request->country;
        $product->state = $request->state;
        $product->city = $request->city;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->video = $request->video;  
        $product->save();

        $position = 0;
        $imgmove = new ImageController;
        // $image = $img->move($request->image);
        foreach($request->gallery as $i)
        {
            $img = new Picture;
            $img->filename = $imgmove->move($i);
            $img->post_id = $product->id;
            $img->position = $position;
            $img->save();
            $position++;
        }

        return redirect()->route('admin.product.index');
        // dd(json_encode($gallery));

        // dd($request->gallery);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product.create', compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductRequest  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->description = $request->description;
        $product->country = $request->country;
        $product->state = $request->state;
        $product->city = $request->city;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->impression = $request->impression;
        $product->click = $request->click;
        $product->video = $request->video;  
        $product->save();

        // $img = new ImageController;
        // if($request->gallery)
        // {
        //     foreach($request->gallery as $i)
        //     {
        //         $img = new Picture;
        //         $img->filename = $img->move($i);
        //         $img->post_id = $product->id;
        //         $img->position = $position;
        //         $img->save();
        //         $position++;
        //     }
        // }
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->back();
    }
}
