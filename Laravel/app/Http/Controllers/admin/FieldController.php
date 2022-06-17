<?php

namespace App\Http\Controllers\admin;

use App\Models\Field;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorefieldRequest;
use App\Http\Requests\UpdatefieldRequest;
use Illuminate\Http\Request;
use DataTables;

class FieldController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:field-list|field-create|field-update|field-delete', ['only' => ['index','show']]);
        $this->middleware('permission:field-create', ['only' => ['create','store']]);
        $this->middleware('permission:field-update', ['only' => ['edit','update']]);
        $this->middleware('permission:field-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Field::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<div class="d-flex">';
                        $btn .= '<a href="/admin/custom/field/'.$row->id.'/edit" class="edit btn btn-light btn-sm m-1">Edit</a>';
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
        return view('admin.field.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id',null)->get();
        return view('admin.field.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorefieldRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $field = new Field;
        $field->name = $request->name;
        $field->type = $request->type;
        $field->fieldlength = $request->fieldlength;
        $field->default = $request->default;
        $field->help = $request->help;
        $field->category_id = $request->category_id;
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
        return redirect()->route('admin.custom.field.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(field $field)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where('parent_id',null)->get();
        $field = Field::find($id);
        return view('admin.field.create',compact('field','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatefieldRequest  $request
     * @param  \App\Models\field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $field = Field::find($id);
        $field->name = $request->name;
        $field->type = $request->type;
        $field->fieldlength = $request->fieldlength;
        $field->default = $request->default;
        $field->help = $request->help;
        $field->category_id = $request->category_id;
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
        return redirect()->route('admin.custom.field.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Field::findOrFail($id)->delete();
        return redirect()->back();
    }
}
