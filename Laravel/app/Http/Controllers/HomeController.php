<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Cookie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $countryName;
    public function __construct()
    {
        if($position = Location::get('2405:201:200c:b83f:1495:de75:fa9b:6b92')) {
            // setcookie('country', $position->countryName, time() + (10 * 365 * 24 * 60 * 60));
            $this->countryName = $position->countryName;
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // $products = Product::where('expire','0')->get();
        // // dd($products);
        // $date_now = date("Y-m-d",strtotime('-30 days'));
        // // dd($date_now);
        //     foreach($products as $product)
        //     {
        //         $created_at = explode(' ',$product->created_at);
        //         $created_at = $created_at[0];
        //         if($date_now > $created_at)
        //         {
        //             $product->expire = '1';
        //             $product->save();
        //         }
        //     }

        $categories = Category::all();
        $products = Product::where('country', $this->countryName)->with('category')->get();
        // dd($products);
        return view('welcome',compact('categories','products'));
    }

    public function category($slug,Request $request)
    {
        // dd($request);
        $max = Product::min('price');
        
        $type = '';
        $condition = '';
        $categories = Category::all();
        $category = Category::where('slug', $slug)->first();
        $products = Product::where('category_id',$category->id)->with('category')->get();
        $priceMin =  $products->min('price');
        $priceMax =  $products->max('price');
        $min_price = $priceMin;
        $max_price = $priceMax;
        // dd($min_price);
        if($request->has('price'))
        {
            $price = explode(',',$request->price);
            $min_price = $price[0];
            $max_price = $price[1];
            $products = $products->where('price','>=',$min_price)->where('price','<=',$max_price);
            // dd($products);
        }
        if($request->has('type'));
        {   
            $type = $request->type;
            $products = $products->where('type_of',$type);
            // dd($products);
        }
        if($request->has('condition'))
        {
            $condition = $request->condition;
            $products = $products->where('conditon',$condition);
        }
        // if($request->ajax()){
        //     // return $slug;
        //     $data .= '<div id="product-data">';
        //     foreach ($products as $product)
        //     {
        //         $data .='<div class="col-md-6 col-lg-6 col-xl-4 col-xxl-3 ">';
        //         $data .='<div class="card-box ">';
        //         $data .='<img src="'. asset($product->image).'" class="img-fluid w-100" alt="card-img">';
        //         $data .='<div class="card-inner bg-white">';
        //         $data .='<a href="'.route('product', $product->slug).'>';
        //         $data .='<div class="d-flex justify-content-between pt-3 pb-2">';
        //         $data .='<span><i class="fa-solid fa-bullseye pe-2"></i>Appareils elec..</span>';
        //         $data .='<span><i class="fa-solid fa-location-dot pe-2"></i>'.$product->city.'</span>';
        //         $data .='</div>';
        //         $data .='<p class="m-0 fw-bold pb-2">'.$product->name.'</p>';
        //         $data .='<div class="d-flex flex-wrap justify-content-between pb-2">';
        //                             $match = [];
        //                             $text = $product->cash;
        //                             preg_match('#\((.*?)\)#', $text, $match);
        //         $data .='<p class="m-0 text-danger fw-bold">'. $match[1].' '.$product->price.'</p>';
        //         $data .='<div class="icon">';
        //         $data .='<a class="wishlist-btn" href="javascript:;" data-id="'.$product->id.'"><i class="fa-regular fa-heart"></i></a>';
        //         $data .='</div></div></a></div></div></div>';
        //     }
        //     $data .='</div>';
        //     return $data;
        // }
        $products = $this->paginate($products);
        // $products->paginate(10);
        return view('category',compact('products','categories','category','type','condition','min_price','max_price','priceMin','priceMax'));
    }

    public function allCategory()
    {
        $categories = Category::all();
        return view('categories',compact('categories'));
    }

    public function product($slug)
    {
        $gallery = [];
        $product = Product::where('slug',$slug)->with('category')->first();
        if($product->gallery)
        {
            $gallery = json_decode($product->gallery);
        }
        // dd($gallery);
        $seller = User::where('id',$product->seller_id)->first();
        $user_products = Product::where('seller_id', $product->seller_id)->with('category')->get();
        $s_products = Product::where('category_id', $product->category_id)->with('category')->get();
        // dd($product);
        return view('product',compact('product','seller','user_products','s_products','gallery'));
    }

    public function seller()
    {
        $sellers = User::all();
        return view('seller',compact('sellers'));
    }

    public function singleSeller($name)
    {
        $seller = User::where('name',$name)->first();
        return view('single_seller',compact('seller'));
    }

    public function searchProduct(Request $request)
    {
        // dd($request);
        $products = Product::where('name', 'LIKE', '%'.$request->name.'%')->where('category_id',$request->category_id)->where('lat',$request->latitude)->where('long',$request->longitude)->with('category')->paginate(20);
        $category = Category::where('id', $request->category_id)->first();
        $categories = Category::all();
        return view('category',compact('products','category','categories'));
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function changeCategory($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $products = Product::where('category_id',$category->id)->get();
        $data = '';
        $data .= '<div class="row" id="category-product">';
        foreach ($products as $product)
        {
            $data .='<div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">';
            $data .='<div class="card-box text-center">';
            $data .='<img src="'. asset($product->image).'" class="img-fluid" alt="card-img">';
            $data .='<div class="card-inner">';
            $data .='<a href="product/'.$product->slug.'">';
            $data .='<div class="d-flex justify-content-between pt-1 pb-2">';
            $data .='<span><i class="fa-solid fa-bullseye pe-2"></i>Appareils elec..</span>';
            $data .='<span><i class="fa-solid fa-location-dot pe-2"></i>'.$product->city.'</span>';
            $data .='</div>';
            $data .='<p class="m-0 fw-bold pb-2">'.$product->name.'</p>';
            $data .='<div class="d-flex flex-wrap justify-content-between">';
                                $match = [];
                                $text = $product->cash;
                                preg_match('#\((.*?)\)#', $text, $match);
            $data .='<p class="m-0 text-danger">'. $match[1].' '.$product->price.'</p>';
            $data .='<div class="icon">';
            $data .='<a class="wishlist-btn" href="javascript:;" data-id="'.$product->id.'"><i class="fa-regular fa-heart"></i></a>';
            $data .='</div></div></a></div></div></div>';
        }
        $data .='</div>';

        return $data;
    }
    
}
