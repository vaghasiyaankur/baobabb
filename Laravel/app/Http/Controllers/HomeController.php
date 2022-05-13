<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
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
        $this->countryName = $_COOKIE["country"];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Product::where('country', $this->countryName)->get();
        // dd($products);
        return view('welcome',compact('categories','products'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $categories = Category::all();
        $products = Product::where('category_id',$category->id)->paginate(10);
        return view('category',compact('products','categories','category'));
    }

    public function allCategory()
    {
        $categories = Category::all();
        return view('categories',compact('categories'));
    }

    public function product($slug)
    {
        $product = Product::where('slug',$slug)->first();
        $gallery = json_decode($product->gallery);
        // dd($gallery);
        $seller = User::where('id',$product->seller_id)->first();
        $user_products = Product::where('seller_id', $product->seller_id)->get();
        $s_products = Product::where('category_id', $product->category_id)->get();
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
        $products = Product::where('name', 'LIKE', '%'.$request->name.'%')->where('category_id',$request->category_id)->get();
        dd($products);
        // return 123;
    }
    
}
