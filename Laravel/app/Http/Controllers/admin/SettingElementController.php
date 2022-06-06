<?php

namespace App\Http\Controllers\admin;

use App\Models\Setting;
use App\Http\Requests\StoreSettingElementRequest;
use App\Http\Requests\UpdateSettingElemetRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use DataTables;

class SettingElementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $element = $request->element;
        $data = Setting::where('name', $request->element)->first();
        $elementdata  = json_decode(@$data->value);
        return view('admin.settingelement.index', compact('element','elementdata','data'));
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
     * @param  \App\Http\Requests\StoreSettingElementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettingElementRequest $request)
    {
        $data = $request->all();
        // dd($data);
        $files = $request->file();
        foreach($files as $key=>$file){
            $img = new ImageController;
            $avatar = $img->move($file);
            unset($data[$key]);
            $data[$key] = $avatar;
        }

        $value = json_encode($data);

        $setting = new Setting();
        $setting->name = $request->name;
        $setting->value = $value;
        $setting->save();

        return redirect()->route('admin.setting.element.index', ['element' => $request->name]);

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
     * @param  \App\Http\Requests\UpdateSettingElemetRequest  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        dd($request);
        $setting = Setting::where('name', $request->name)->first();
        $elementdata  = json_decode($setting->value);
        $data = $request->all();
        $files = $request->file();
        foreach($files as $key=>$file){
            $img = new ImageController;
            $avatar = $img->move($file);
            unset($data[$key]);
            File::delete($elementdata->$key);
            $data[$key] = $avatar;
        }

        $value = json_encode($data);

        $setting->name = $request->name;
        $setting->value = $value;
        $setting->save();

        return redirect()->route('admin.setting.element.index', ['element' => $request->name]);
    }

    public function updateelement(Request $request)
    {
        $setting = Setting::where('name', $request->name)->first();
        $elementdata  = json_decode($setting->value);
        $data = $request->all();
        // dd($data);
        $files = $request->file();
        foreach($files as $key=>$file){
            $img = new ImageController;
            $avatar = $img->move($file);
            unset($data[$key]);
            if(@$elementdata->$key){

                File::delete($elementdata->$key);
            }
            $data[$key] = $avatar;
        }

        $value = json_encode($data);

        $setting->name = $request->name;
        $setting->value = $value;
        $setting->save();

        return redirect()->route('admin.setting.element.index', ['element' => $request->name]);
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
