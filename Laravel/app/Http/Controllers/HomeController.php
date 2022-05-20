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
use Auth;
use App\Models\Country;

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
        $this->middleware(function ($request, $next) {      
            if(auth()->user()){
                $country = Country::find(auth()->user()->country);
                if($country)
                {
                    $this->countryName = $country->name;
                }
                else
                {
                    $this->countryName = $_COOKIE['country'];
                }
            }
            else
            {
                $this->countryName = $_COOKIE['country'];
            }
            return $next($request);
        });
        // if($position = Location::get('2405:201:200c:b83f:1495:de75:fa9b:6b92')) {
        //     // setcookie('country', $position->countryName, time() + (10 * 365 * 24 * 60 * 60));
        //     $this->countryName = $position->countryName;
        // }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Product::where('country', $this->countryName)->with('category')->with('currency')->get();
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
        $products = Product::where('category_id',$category->id)->where('country',$this->countryName)->with('category')->get();
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
        if($request->has('type'))
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
        $products = $this->paginate($products);
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
        $product = Product::where('slug',$slug)->with('category')->with('currency')->first();
        if($product->gallery)
        {
            $gallery = json_decode($product->gallery);
        }
        // dd($gallery);
        $seller = User::where('id',$product->seller_id)->first();
        $user_products = Product::where('seller_id', $product->seller_id)->with('category')->with('currency')->get();
        $s_products = Product::where('category_id', $product->category_id)->with('category')->with('currency')->get();
        // dd($product);
        return view('product',compact('product','seller','user_products','s_products','gallery'));
    }

    public function seller()
    {
        $sellers = User::where('status','1')->get();
        return view('seller',compact('sellers'));
    }

    public function singleSeller($id)
    {
        $seller = User::where('id',$id)->with('countries')->first();
        if($seller)
        {
            $products = Product::where('seller_id',$seller->id)->with('category')->with('currency')->get();
            return view('single_seller',compact('seller','products'));
        }
        else
        {
            
        }
    }

    public function searchProduct(Request $request)
    {
        // dd($request);
        $products = Product::where('name', 'LIKE', '%'.$request->name.'%')->where('category_id',$request->category_id)->where('lat',$request->latitude)->where('long',$request->longitude)->with('category')->with('currency')->paginate(20);
        $category = Category::where('id', $request->category_id)->first();


        $categories = Category::all();
        return view('category',compact('products','category','categories'));
    }

    // paginate
    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function changeCategory($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $products = Product::where('category_id',$category->id)->with('currency')->get();
        $data = '';
        $data .= '<div class="row" id="category-product">';
        foreach ($products as $product)
        {
            $data .='<div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">';
            $data .='<div class="card-box">';
            $data .='<img src="'. asset($product->image).'" class="img-fluid" alt="card-img">';
            $data .='<div class="card-inner">';
            $data .='<a href="product/'.$product->slug.'">';
            $data .='<div class="d-flex justify-content-between pt-1 pb-2">';
            $data .='<span><i class="fa-solid fa-bullseye pe-2"></i>'.$category->name.'</span>';
            $data .='<span><i class="fa-solid fa-location-dot pe-2"></i>'.$product->city.'</span>';
            $data .='</div>';
            $data .='<p class="m-0 fw-bold pb-2">'.$product->name.'</p>';
            $data .='<div class="d-flex flex-wrap justify-content-between">';
            $data .='<p class="m-0 text-danger">'. $product->currency->name.' '.$product->price.'</p>';
            $data .='<div class="icon">';
            $data .='<a class="wishlist-btn" href="javascript:;" data-id="'.$product->id.'"><i class="fa-regular fa-heart"></i></a>';
            $data .='</div></div></a></div></div></div>';
        }
        $data .='</div>';

        return $data;
    }
    
}
