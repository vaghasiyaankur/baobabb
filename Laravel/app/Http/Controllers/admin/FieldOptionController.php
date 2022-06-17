<?php

namespace App\Http\Controllers\admin;

use App\Models\FieldOption;
use App\Models\Field;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFieldOptionRequest;
use App\Http\Requests\UpdateFieldOptionRequest;
use Illuminate\Http\Request;
use DataTables;

class FieldOptionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:field-option-list|field-option-create|field-option-update|field-option-delete', ['only' => ['index','show']]);
        $this->middleware('permission:field-option-create', ['only' => ['create','store']]);
        $this->middleware('permission:field-option-update', ['only' => ['edit','update']]);
        $this->middleware('permission:field-option-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($field_id, Request $request)
    {
        $field = Field::findOrfail($field_id);
        // dd($field);
        if ($request->ajax()) {
            $data = FieldOption::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<div class="d-flex">';
                        $btn .= '<a href="option/'.$row->id.'/edit" class="edit btn btn-light btn-sm m-1">Edit</a>';
                        $btn .= '<form method="POST" action="option/'.$row->id.'"><input type="hidden" name="_token" value="'.csrf_token().'"><input type="hidden" name="_method" value="DELETE"><button type="submit"class="edit btn btn-light btn-sm m-1">Delete</button></form>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.field.option.index',compact('field'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($field_id)
    {
        $field = Field::findOrFail($field_id);
        return view("admin.field.option.create",compact('field'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFieldOptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$field_id)
    {
        // $field = Field
        $option = new FieldOption;
        $option->field_id = $field_id;
        $option->value = $request->value;
        $option->save();
        return redirect()->route('admin.custom.field.option.index',$field_id);
        // dd($field_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FieldOption  $fieldOption
     * @return \Illuminate\Http\Response
     */
    public function show(FieldOption $fieldOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FieldOption  $fieldOption
     * @return \Illuminate\Http\Response
     */
    public function edit($field_id,$option_id)
    {
        $field = Field::findOrFail($field_id);
        $option = FieldOption::findOrFail($option_id);
        return view('admin.field.option.create',compact('field','option'));
        // return $option_id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFieldOptionRequest  $request
     * @param  \App\Models\FieldOption  $fieldOption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $field_id, $option_id)
    {
        $option = FieldOption::findOrFail($option_id);
        $option->value = $request->value;
        $option->field_id = $field_id;
        $option->save();
        return redirect()->route('admin.custom.field.option.index',$field_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FieldOption  $fieldOption
     * @return \Illuminate\Http\Response
     */
    public function destroy($field_id, $option_id)
    {
        FieldOption::findOrFail($option_id)->delete();
        return redirect()->back();
        // dd($id);
    }
}
