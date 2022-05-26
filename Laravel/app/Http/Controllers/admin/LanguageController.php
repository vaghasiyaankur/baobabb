<?php

namespace App\Http\Controllers\admin;

use App\Models\Language;
use App\Models\Country;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
// use JetBrains\PhpStorm\Language;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Language::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<div class="d-flex">';
                        $btn .= '<a href="/admin/currency/'.$row->id.'/edit" class="edit btn btn-primary btn-sm m-1">Edit</a>';
                        $btn .= '<form method="POST" action="/admin/currency/'.$row->id.'"><input type="hidden" name="_token" value="'.csrf_token().'"><input type="hidden" name="_method" value="DELETE"><button type="submit"class="edit btn btn-primary btn-sm m-1">Delete</button></form>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.language.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.language.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCurrencyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCurrencyRequest $request)
    {
        // dd($request->all());
        $currency = new Language();
        $currency->name = $request->name;
        $currency->symbol = $request->symbol;
        $currency->code = $request->code;
        $currency->entities = $request->entities;
        $currency->symbol_left = $request->symbol_left;
        $currency->decimal_place = $request->decimal_place;
        $currency->decimal_seprator = $request->decimal_seprator;
        $currency->thousand_operator = $request->thousand_operator;
        $currency->save();
        return redirect()->route('admin.currency.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currency = Currency::findOrFail($id);
        $countries = Country::all();
        return view('admin.currency.create',compact('currency','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCurrencyRequest  $request
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCurrencyRequest $request, $id)
    {
        $currency = Currency::findOrFail($id);
        $currency->name = $request->name;
        $currency->symbol = $request->symbol;
        $currency->code = $request->code;
        $currency->entities = $request->entities;
        $currency->symbol_left = $request->symbol_left;
        $currency->decimal_place = $request->decimal_place;
        $currency->decimal_seprator = $request->decimal_seprator;
        $currency->thousand_operator = $request->thousand_operator;
        $currency->save();
        return redirect()->route('admin.currency.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Currency::findOrFail($id)->delete();
        return redirect()->back();
    }
}