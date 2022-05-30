<?php

namespace App\Http\Controllers\admin;

use App\Models\Page;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use DataTables;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Page::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<div class="d-flex">';
                        $btn .= '<a href="/admin/pages/'.$row->id.'/edit" class="edit btn btn-primary btn-sm m-1">Edit</a>';
                        $btn .= '<form method="POST" action="/admin/pages/'.$row->id.'"><input type="hidden" name="_token" value="'.csrf_token().'"><input type="hidden" name="_method" value="DELETE"><button type="submit"class="edit btn btn-primary btn-sm m-1">Delete</button></form>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        $avatar = '';
        // store avatar
        if($request->hasFile('picture')){
        $img = new ImageController;
        $avatar = $img->move($request->picture);
        }

        $page = new Page();
        $page->type = $request->type;
        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->title = $request->title;
        $page->picture = $avatar;
        $page->content = $request->content;
        $page->external_link = $request->external_link;
        // $page->name_color = $request->name_color;
        // $page->title_color = $request->title_color;
        $page->target_blank = $request->target_blank;
        $page->seo_title = $request->seo_title;
        $page->seo_description = $request->seo_description;
        $page->seo_keywords = $request->seo_keywords;
        $page->excluded_from_footer = $request->excluded_from_footer;
        $page->active = $request->active;
        $page->save();
        return redirect()->route('admin.pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pagedata = Page::findOrFail($id);
        return view('admin.pages.create',compact('pagedata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePageRequest  $request
     * @param  \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, $id)
    {
        $page = Page::findOrFail($id);
        $avatar = $page->picture;
        // store avatar
        if($request->hasFile('picture')){
        $img = new ImageController;
        $avatar = $img->move($request->picture);
        }
        
        $page->type = $request->type;
        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->title = $request->title;
        $page->picture = $avatar;
        $page->content = $request->content;
        $page->external_link = $request->external_link;
        // $page->name_color = $request->name_color;
        // $page->title_color = $request->title_color;
        $page->target_blank = $request->target_blank;
        $page->seo_title = $request->seo_title;
        $page->seo_description = $request->seo_description;
        $page->seo_keywords = $request->seo_keywords;
        $page->excluded_from_footer = $request->excluded_from_footer;
        $page->active = $request->active;
        $page->save();
        return redirect()->route('admin.pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::findOrFail($id)->delete();
        return redirect()->back();
    }
}
