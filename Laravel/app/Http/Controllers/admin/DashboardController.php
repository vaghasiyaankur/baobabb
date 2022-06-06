<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\User;
use App\Models\Product;

class DashboardController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:dashboard-list', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('is_admin','!=','1')->orderBy('created_at','DESC')->with('countries')->take(10)->get();
        // dd($users);
        $products = Product::orderBy('created_at','DESC')->take(10)->get();
        return view ('admin.dashboard',compact('users','products'));
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
        $user = auth()->user();
        $countries = Country::all();
        return view('admin.profile',compact('user','countries'));
    }

    public function profile_update(Request $request)
    {
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
