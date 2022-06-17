<?php

namespace App\Http\Controllers\admin;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use DB;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-update|role-delete', ['only' => ['index','show']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-update', ['only' => ['edit','update']]);   
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Role::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        if($row->name != 'super-admin'){
                            $btn = '<div class="d-flex">';
                            $btn .= '<a href="/admin/role/'.$row->id.'/edit" class="edit btn btn-light btn-sm m-1">Edit</a>';
                            $btn .= '<form method="POST" action="/admin/role/'.$row->id.'"><input type="hidden" name="_token" value="'.csrf_token().'"><input type="hidden" name="_method" value="DELETE"><button type="submit"class="edit btn btn-light btn-sm m-1">Delete</button></form>';
                            $btn .= '</div>';
                            return $btn;
                        }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('admin.role.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('admin.role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        if($role->name == 'super-admin')
        {
            return abort(404);
        }
        else
        {
            $permissions = Permission::get();
            $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
            return view('admin.role.create',compact('permissions','role','rolePermissions'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRoleRequest  $request
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        $role = Role::find($id);
        if($role->name == 'super-admin')
        {
            return abort(404);
        }
        else
        {
            $role->name = $request->input('name');
            $role->save();
            
            $role->syncPermissions($request->input('permission'));
            return redirect()->route('admin.role.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        if($role == 'super-admin')
        {
            return abort(404);
        }
        else 
        {
            $role->delete();
            return redirect()->back();
        }
    }
}
