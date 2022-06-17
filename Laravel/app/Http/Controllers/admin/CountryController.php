<?php

namespace App\Http\Controllers\admin;

use App\Models\Country;
use App\Models\Continent;
use App\Models\Currency;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\File;


use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class CountryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:country-list|country-create|country-update|country-delete', ['only' => ['index','show']]);
        $this->middleware('permission:country-create', ['only' => ['create','store']]);
        $this->middleware('permission:country-update', ['only' => ['edit','update']]);
        $this->middleware('permission:country-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Country::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<div class="d-flex">';
                        $btn .= '<a href="/admin/country/'.$row->id.'/edit" class="edit btn btn-light btn-sm m-1">Edit</a>';
                        $btn .= '<form method="POST" action="/admin/country/'.$row->id.'"><input type="hidden" name="_token" value="'.csrf_token().'"><input type="hidden" name="_method" value="DELETE"><button type="submit"class="edit btn btn-light btn-sm m-1">Delete</button></form>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        // dd(User::all());
        return view('admin.country.index');
    }

    /**
     * Show the form for creating a new resource.
     *e
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $continents = Continent::all();
        $currencies = Currency::all();
        return view('admin.country.create',compact('continents','currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCountryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCountryRequest $request)
    {
        $avatar = '';
        // store avatar
        if($request->hasFile('image')){
        $img = new ImageController;
        $avatar = $img->move($request->image);
        }

        $country = new Country;
        $country->name = $request->name;
        $country->code = $request->code;
        $country->capital = $request->capital;
        $country->continent = $request->continent;
        $country->tld = $request->tld;
        $country->calling_code = $request->calling_code;
        $country->currency_code = $request->currency_code;
        $country->image = $avatar;
        $country->language = $request->language;
        $country->preferred_time = $request->preferred_time;
        $country->date_format = $request->date_format;
        $country->time_format = $request->time_format;
        $country->admin_type = $request->admin_type;
        $country->admin_field_active = $request->admin_field_active;
        $country->save();

        return redirect()->route('admin.country.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::find($id);
        $continents = Continent::all();
        $currencies = Currency::all();
        return view('admin.country.create',compact('country','continents','currencies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCountryRequest  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountryRequest $request, $id)
    {
        $country = Country::find($id);

        $avatar = $country->image;
        // store avatar
        if($request->hasFile('image')){
            $img = new ImageController;
            $avatar = $img->move($request->image);
            File::delete($country->image);
        }


        $country->name = $request->name;
        $country->code = $request->code;
        $country->capital = $request->capital;
        $country->continent = $request->continent;
        $country->tld = $request->tld;
        $country->calling_code = $request->calling_code;
        $country->currency_code = $request->currency_code;
        $country->image = $avatar;
        $country->language = $request->language;
        $country->preferred_time = $request->preferred_time;
        $country->date_format = $request->date_format;
        $country->time_format = $request->time_format;
        $country->admin_type = $request->admin_type;
        $country->admin_field_active = $request->admin_field_active;
        $country->save();
        return redirect()->route('admin.country.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Country::findOrFail($id)->delete();
        return redirect()->back();
    }
}
