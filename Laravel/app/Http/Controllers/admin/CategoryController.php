<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Models\Field;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use DataTables;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-update|category-delete', ['only' => ['index','show']]);
        $this->middleware('permission:category-create', ['only' => ['create','store']]);
        $this->middleware('permission:category-update', ['only' => ['edit','update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::where('parent_id', null);
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<div class="d-flex">';
                        $btn .= '<a href="/admin/category/'.$row->id.'/edit" class="edit btn btn-light btn-sm m-1">Edit</a>';
                        $btn .= '<form method="POST" action="/admin/category/'.$row->id.'"><input type="hidden" name="_token" value="'.csrf_token().'"><input type="hidden" name="_method" value="DELETE"><button type="submit"class="edit btn btn-light btn-sm m-1">Delete</button></form>';
                        // $btn .= '<a href="/admin/category/'.$row->id.'/edit" class="edit btn btn-danger btn-sm m-1">Custom Fields</a>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->addColumn('subCateories', function($row){
                        $count = Category::where('parent_id',$row->id)->count();
                        $btn = '<div class="d-flex">';
                        $btn .= '<a href="/admin/category/'.$row->id.'/subcategory" class="edit border btn-light btn-sm m-1">'.$count.' Subcategories</a>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->addColumn('customField', function($row){
                        $count = Field::where('category_id',$row->id)->count();
                        $btn = '<div class="d-flex">';
                        $btn .= '<a href="/admin/category/'.$row->id.'/custom_field" class="edit border btn-light btn-sm m-1">'.$count.' Custom Field</a>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action','subCateories','customField'])
                    ->make(true);
        }
        // dd(User::all());
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', null)->get();
        return view('admin.category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        // dd($request);   

        $img = new ImageController;
        $image = $img->move($request->image);
        $icon = $img->move($request->icon);

        $category = new Category;
        $category->parent_id = $request->parent_id;
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->icon = $icon;
        $category->image = $image;
        // dd($category);  
        $category->save();
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where('parent_id', null)->get();
        $cat = Category::find($id);
        return view('admin.category.create',compact('cat','categories'));
        // return 123;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
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
        $category->parent_id = $request->parent_id;
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back();
    }

}
