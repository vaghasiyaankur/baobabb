<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use DataTables;

class SubCategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:sub-category-list|sub-category-create|sub-category-update|sub-category-delete', ['only' => ['index','show']]);
        $this->middleware('permission:sub-category-create', ['only' => ['create','store']]);
        $this->middleware('permission:sub-category-update', ['only' => ['edit','update']]);
        $this->middleware('permission:sub-category-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $category_id)
    {
        $category = Category::find($category_id);
        if ($request->ajax()) {
            $data = Category::where('parent_id', $category->id);
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<div class="d-flex">';
                        $btn .= '<a href="subcategory/'.$row->id.'/edit" class="edit btn btn-primary btn-sm m-1">Edit</a>';
                        $btn .= '<form method="POST" action="subcategory/'.$row->id.'"><input type="hidden" name="_token" value="'.csrf_token().'"><input type="hidden" name="_method" value="DELETE"><button type="submit"class="edit btn btn-primary btn-sm m-1">Delete</button></form>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        // dd(User::all());
        return view('admin.category.sub.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category_id)
    {
        $category = Category::find($category_id);
        $categories = Category::where('parent_id', null)->get();
        return view('admin.category.sub.create',compact('categories','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request, $category_id)
    {
        // dd($request);   

        $img = new ImageController;
        $image = $img->move($request->image);
        $icon = $img->move($request->icon);

        $category = new Category;
        $category->parent_id = $category_id;
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->icon = $icon;
        $category->image = $image;
        // dd($category);  
        $category->save();
        return redirect()->route('admin.subcategory.index',$category_id);
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
    public function edit($category_id,$id)
    {
        $category = Category::find($category_id);
        $categories = Category::where('parent_id', null)->get();
        $cat = Category::find($id);
        return view('admin.category.sub.create',compact('cat','categories','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id,$id)
    {
        $category = Category::find($id);
        $img = new ImageController;
        // dd($category);
        if($request->image)
        {
            $category->image = $img->move($request->image);
        }
        if($request->icon)
        {
            $category->icon = $img->move($request->icon);
        }
        $category->parent_id = $category_id;
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();
        return redirect()->route('admin.subcategory.index',$category_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id,$id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back();
    }
}
