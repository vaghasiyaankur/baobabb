<?php

namespace App\Http\Controllers\admin;

use App\Models\Language;
use App\Models\Country;
use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
// use JetBrains\PhpStorm\Language;

class LanguageController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:language-list|language-create|language-update|language-delete', ['only' => ['index','show']]);
        $this->middleware('permission:language-create', ['only' => ['create','store']]);
        $this->middleware('permission:language-update', ['only' => ['edit','update']]);
        $this->middleware('permission:language-delete', ['only' => ['destroy']]);
    }
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
                        $btn .= '<a href="/admin/language/'.$row->id.'/edit" class="edit btn btn-light btn-sm m-1">Edit</a>';
                        $btn .= '<form method="POST" action="/admin/language/'.$row->id.'"><input type="hidden" name="_token" value="'.csrf_token().'"><input type="hidden" name="_method" value="DELETE"><button type="submit"class="edit btn btn-light btn-sm m-1">Delete</button></form>';
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
     * @param  \App\Http\Requests\StoreLanguageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLanguageRequest $request)
    {
        // dd($request->all());
        $alllanguage = config('languages');
        $name = $alllanguage[$request->abbr];
        // dd(strtolower($name));
        $language = new Language();
        $language->abbr = $request->abbr;
        $language->locale = $request->locale;
        $language->name = $name;
        $language->native = $request->native;
        $language->flag = $request->flag;
        $language->app_name = strtolower($name);
        $language->russian_pluralization = $request->russian_pluralization;
        $language->direction = $request->direction;
        $language->date_format = $request->date_format;
        $language->datetime_format = $request->datetime_format;
        $language->save();
        return redirect()->route('admin.language.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $languagedata = Language::findOrFail($id);
        $countries = Country::all();
        return view('admin.language.create',compact('languagedata','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLanguageRequest  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLanguageRequest $request, $id)
    {
        // dd($request->all());
        $alllanguage = config('languages');
        $name = $alllanguage[$request->abbr];
        
        $language = Language::findOrFail($id);
        $language->abbr = $request->abbr;
        $language->locale = $request->locale;
        $language->name = $name;
        $language->native = $request->native;
        $language->flag = $request->flag;
        $language->app_name = strtolower($name);
        $language->russian_pluralization = $request->russian_pluralization;
        $language->direction = $request->direction;
        $language->date_format = $request->date_format;
        $language->datetime_format = $request->datetime_format;
        $language->save();
        return redirect()->route('admin.language.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Language::findOrFail($id)->delete();
        return redirect()->back();
    }
}
