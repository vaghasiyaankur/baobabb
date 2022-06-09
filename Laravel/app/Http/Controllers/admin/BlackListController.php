<?php

namespace App\Http\Controllers\admin;

use App\Models\BlackList;
use App\Http\Requests\StoreBlackListRequest;
use App\Http\Requests\UpdateBlackListRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

class BlackListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = BlackList::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        if($row->name != 'super-admin'){
                            $btn = '<div class="d-flex">';
                            $btn .= '<a href="/admin/blacklist/'.$row->id.'/edit" class="edit btn btn-primary btn-sm m-1">Edit</a>';
                            $btn .= '<form method="POST" action="/admin/blacklist/'.$row->id.'"><input type="hidden" name="_token" value="'.csrf_token().'"><input type="hidden" name="_method" value="DELETE"><button type="submit"class="edit btn btn-primary btn-sm m-1">Delete</button></form>';
                            $btn .= '</div>';
                            return $btn;
                        }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.blacklist.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blacklist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlackListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blacklist = new BlackList;
        $blacklist->type = $request->type;
        $blacklist->entry = $request->entry;
        $blacklist->save();
        return redirect()->route('admin.blacklist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlackList  $blackList
     * @return \Illuminate\Http\Response
     */
    public function show(BlackList $blackList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlackList  $blackList
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blacklist = Blacklist::findOrFail($id);
        return view('admin.blacklist.create',compact('blacklist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlackListRequest  $request
     * @param  \App\Models\BlackList  $blackList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blacklist = BlackList::findOrFail($id);
        $blacklist->type = $request->type;
        $blacklist->entry = $request->entry;
        $blacklist->save();
        return redirect()->route('admin.blacklist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlackList  $blackList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blacklist::findOrFail($id)->delete();
        return redirect()->back();
    }
}
