<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        // dd($products);
        return view('welcome',compact('categories','products'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $products = Product::where('category_id',$category->id)->get();
        return view('category',compact('products'));
    }

    public function allCategory()
    {
        $categories = Category::all();
        return view('categories',compact('categories'));
    }

    public function product($slug)
    {
        return view('product');
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
    
}
