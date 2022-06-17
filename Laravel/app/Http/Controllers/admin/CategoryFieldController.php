<?php

namespace App\Http\Controllers\admin;

use App\Models\Field;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorefieldRequest;
use App\Http\Requests\UpdatefieldRequest;
use Illuminate\Http\Request;
use DataTables;

class CategoryFieldController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:category-field-list|category-field-create|category-field-update|category-field-delete', ['only' => ['index','show']]);
        $this->middleware('permission:category-field-create', ['only' => ['create','store']]);
        $this->middleware('permission:category-field-update', ['only' => ['edit','update']]);
        $this->middleware('permission:category-field-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $category = Category::find($id);
        // dd($category);
        if ($request->ajax()) {
            $data = Field::where('category_id',$category->id);
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<div class="d-flex">';
                        $btn .= '<a href="custom_field/'.$row->id.'/edit" class="edit btn btn-light btn-sm m-1">Edit</a>';
                        $btn .= '<form method="POST" action="/admin/custom/field/'.$row->id.'"><input type="hidden" name="_token" value="'.csrf_token().'"><input type="hidden" name="_method" value="DELETE"><button type="submit"class="edit btn btn-light btn-sm m-1">Delete</button></form>';
                        if($row->type == 'checkbox' || $row->type == 'checkbox(multiple)' || $row->type == 'selectbox' || $row->type == 'radio')
                        {
                            $btn .= '<a href="/admin/custom/field/'.$row->id.'/option" class="edit btn btn-danger btn-sm m-1">Option</a>';
                        }
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.category.field.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $category = Category::find($id);
        return view('admin.category.field.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$category_id)
    {
        $category = Category::find($category_id);
        $field = new Field;
        $field->name = $request->name;
        $field->type = $request->type;
        $field->fieldlength = $request->fieldlength;
        $field->default = $request->default;
        $field->help = $request->help;
        $field->category_id = $category->id;
        if($request->required == 1)
        {
            $field->required = 1;
        }
        else{
            $field->required = 0;
        }
        if($request->filter == 1)
        {
            $field->filter = 1;
        }
        else{
            $field->filter = 0;
        }
        if($request->active == 1)
        {
            $field->active = 1;
        }
        else{
            $field->active = 0;
        }
        if($request->disabled_in_subcategories == 1)
        {
            $field->disabled_in_subcategories = 1;
        }
        else{
            $field->disabled_in_subcategories = 0;
        }
        $field->save();
        return redirect()->route('admin.category.custom_field.index',$category->id);
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
    public function edit($category_id, $id)
    {
        $category = Category::find($category_id);
        $field = Field::find($id);
        return view('admin.category.field.create',compact('field','category'));
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
        $category = Category::find($category_id);
        $field = Field::findOrFail($id);
        $field->name = $request->name;
        $field->type = $request->type;
        $field->fieldlength = $request->fieldlength;
        $field->default = $request->default;
        $field->help = $request->help;
        $field->category_id = $category->id;
        if($request->required == 1)
        {
            $field->required = 1;
        }
        else{
            $field->required = 0;
        }
        if($request->filter == 1)
        {
            $field->filter = 1;
        }
        else{
            $field->filter = 0;
        }
        if($request->active == 1)
        {
            $field->active = 1;
        }
        else{
            $field->active = 0;
        }
        if($request->disabled_in_subcategories == 1)
        {
            $field->disabled_in_subcategories = 1;
        }
        else{
            $field->disabled_in_subcategories = 0;
        }
        $field->save();
        return redirect()->route('admin.category.custom_field.index',$category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
