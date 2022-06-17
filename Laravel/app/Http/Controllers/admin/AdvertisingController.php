<?php
namespace App\Http\Controllers\admin;

use App\Models\Advertising;
use App\Http\Requests\StoreAdvertisingRequest;
use App\Http\Requests\UpdateAdvertisingRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Advertising::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        if($row->name != 'super-admin'){
                            $btn = '<div class="d-flex">';
                            $btn .= '<a href="/admin/advertising/'.$row->id.'/edit" class="edit btn btn-light btn-sm m-1">Edit</a>';
                            $btn .= '</div>';
                            return $btn;
                        }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.advertising.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advertising.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdvertisingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdvertisingRequest $request)
    {
        $string = str_replace(' ', '-', $request->provider_name);
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '-', $string);
        $ad = new Advertising;
        $ad->slug = $slug;
        $ad->provider_name = $request->provider_name;
        $ad->tracking_code_large = $request->tracking_code_large;
        $ad->tracking_code_medium = $request->tracking_code_medium;
        $ad->tracking_code_small = $request->tracking_code_small;
        $ad->is_responsive = $request->is_responsive;
        $ad->active = $request->status;
        $ad->save();
        return redirect()->route('admin.advertising.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function show(Advertising $advertising)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advertising = Advertising::findOrFail($id);
        return view('admin.advertising.create',compact('advertising'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdvertisingRequest  $request
     * @param  \App\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdvertisingRequest $request, $id)
    {
        $ad = Advertising::findOrFail($id);
        $ad->provider_name = $request->provider_name;
        $ad->tracking_code_large = $request->tracking_code_large;
        $ad->tracking_code_medium = $request->tracking_code_medium;
        $ad->tracking_code_small = $request->tracking_code_small;
        $ad->is_responsive = $request->is_responsive;
        $ad->active = $request->status;
        $ad->save();
        return redirect()->route('admin.advertising.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertising $advertising)
    {
        //
    }
}
