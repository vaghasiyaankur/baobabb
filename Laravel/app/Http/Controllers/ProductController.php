<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DataTables;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Currency;
use App\Models\Country;
use App\Models\Setting;
use App\Models\Picture;
use App\Http\Controllers\ImageController;
use Carbon\Carbon;

class ProductController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $user_id;
    public function __construct()
    {
    //    $this->user_id = Auth::user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = auth()->user()->id;
        // $data = Product::where('seller_id',$id)->get();
        // dd($data);
        if ($request->ajax()) {
            $data = Product::where('seller_id',$id);
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<div class="d-flex">';
                        $btn .= '<a href="/user/product/'.$row->id.'/edit" class="edit btn border btn-sm m-1">Edit</a>';
                        $btn .= '<form method="POST" action="/user/product/'.$row->id.'"><input type="hidden" name="_token" value="'.csrf_token().'"><input type="hidden" name="_method" value="DELETE"><button type="submit"class="edit border btn btn-sm m-1">Delete</button></form>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('user.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(auth()->user()->id);
        if($user->status == 1)
        {
            $categories = Category::where('parent_id',null)->get();
            $country = Country::find($user->country);
            $currencies = Currency::where('code',$country->currency_code)->get();
            return view('user.product.create', compact('categories','currencies'));
        }
        else
        {
            return redirect()->route('user.profile');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country = Country::find(auth()->user()->country);
        $days = Setting::where('name','ad_expire_length')->pluck('value')->first();
        $expireDate=Date('Y-m-d H:i:s', strtotime('+'.$days.' days'));
        // dd($request);
        $string = str_replace(' ', '-', $request->name);
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '-', $string);
        // dd($request);
        $product = new Product;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        // $product->image = $image;
        // $product->gallery = json_encode($gallery);
        $product->seller_id = auth()->user()->id;
        $product->slug = $slug . random_int(100000, 999999);
        $product->type_of = $request->type_of;
        $product->condition = $request->condition;
        $product->cash = $request->currency;
        $product->lat = $request->latitude;
        $product->long = $request->longitude;
        $product->description = $request->description;
        $product->country = $country->name;
        $product->state = $request->state;
        $product->city = $request->city;
        // $product->street = $request->street;
        $product->location = $request->autocomplete;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->video = $request->video; 
        $product->tags = $request->tags;  
        $product->expire = $expireDate;
        if($request->negotiable == '1'){
            $product->negotiable = '1';
        }
        else{
            $product->negotiable == '0';
        }
        $product->save();

        $position = 0;
        $imgmove = new ImageController;
        // $image = $img->move($request->image);
        foreach($request->image as $i)
        {
            $img = new Picture;
            $img->filename = $imgmove->move($i);
            $img->post_id = $product->id;
            $img->position = $position;
            $img->save();
            $position++;
        }

        return redirect()->route('user.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('seller_id',auth()->user()->id)->where('id',$id)->first();
        if($product)
        {
            $categories = Category::where('parent_id',null)->get();
            $country = Country::find(auth()->user()->country);
            $currencies = Currency::where('code',$country->currency_code)->get();
            return view('user.product.create', compact('categories','product','currencies'));
        }
        else{
            return view('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $country = Country::find(auth()->user()->country);
        // dd($request);
        $product = Product::find($id);
        $gallery = array();
        $position = 0;
        $imgmove = new ImageController;
        // $image = $img->move($request->image);
        
        if($request->file())
        {
            if($request->image)
            {
                Picture::where('post_id',$product->id)->delete();
            }
            foreach($request->image as $i)
            {
                $img = new Picture;
                $img->filename = $imgmove->move($i);
                $img->post_id = $product->id;
                $img->position = $position;
                $img->save();
                $position++;
            }
        }
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->description = $request->description;
        $product->country = $country->name;
        $product->state = $request->state;
        $product->city = $request->city;
        $product->condition = $request->condition;
        $product->cash = $request->currency;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->location = $request->autocomplete;
        $product->video = $request->video;  
        $product->tags = $request->tags; 
        if($request->negotiable == '1'){
            $product->negotiable = '1';
        }
        else{
            $product->negotiable == '0';
        } 
        $product->save();
        return redirect()->route('user.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->back();
    }
}
