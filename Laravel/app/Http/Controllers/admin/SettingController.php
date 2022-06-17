<?php

namespace App\Http\Controllers\admin;

use App\Models\Setting;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

class SettingController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:setting-list|setting-create|setting-update|setting-delete', ['only' => ['index','show']]);
        $this->middleware('permission:setting-create', ['only' => ['create','store']]);
        $this->middleware('permission:setting-update', ['only' => ['edit','update']]);
        $this->middleware('permission:setting-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Setting::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<div class="d-flex">';
                        $btn .= '<a href="/admin/setting/'.$row->id.'/edit" class="edit btn btn-light btn-sm m-1">Edit</a>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.setting.index');
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
     * @param  \App\Http\Requests\StoreSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('admin.setting.create',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSettingRequest  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $setting = Setting::find($id);
        if($setting->name == 'RTL')
        {
            if($request->value == 'yes')
            {
                $setting->value = 'yes';
            }
            else 
            {
                $setting->value = 'no';
            }
        }
        else 
        {
            $setting->value = $request->value;
        }
        $setting->save();
        return redirect()->route('admin.setting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
