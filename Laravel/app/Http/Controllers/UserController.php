<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Country;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Rating;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $id = Auth::user()->id;
        // dd($id); 
        $products = Product::where('seller_id',auth()->user()->id)->whereDate('expire','>=', Carbon::today())->count();
        $wishlist = Wishlist::where('user_id',auth()->user()->id)->count();
        $rating = round(Rating::where('user_to',auth()->user()->id)->where('parent_id',null)->avg('rate'),2);
        return view('user.dashboard',compact('products','wishlist','rating'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function profile()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        $countries = Country::all();
        return view('user.profile',compact('user','countries'));
    }

    public function profile_update(Request $request)
    {
        // dd($request);
        $user = User::find(auth()->user()->id);
        // store avatar image
        if($request->avatar)
        {
            $img = new ImageController;
            $user->avatar = $img->move($request->avatar);
        }
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->facebook = $request->facebook;
        $user->twitter = $request->twitter;
        $user->youtube = $request->youtube;
        $user->linkedin = $request->linkedin;
        $user->instagram = $request->instagram;
        $user->website = $request->website;
        $user->description = $request->description;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->city;
        // $user->location = $request->location;
        $user->street = $request->street;
        $user->status = '1';
        $user->save();
        // dd($user);
        return redirect()->back();
    }
}
