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

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $categories = Category::all();
        $products = Product::where('category_id',$category->id)->with('category')->paginate(10);
        return view('category',compact('products','categories','category'));
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
    
}
