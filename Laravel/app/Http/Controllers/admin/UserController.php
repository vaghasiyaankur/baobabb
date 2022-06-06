<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Country;
use App\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DataTables;
use DateTimeZone;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-update|user-delete', ['only' => ['index','show']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-update', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<div class="d-flex">';
                        $btn .= '<a href="/admin/user/'.$row->id.'/edit" class="edit btn btn-primary btn-sm m-1">Edit</a>';
                        $btn .= '<form method="POST" action="/admin/user/'.$row->id.'"><input type="hidden" name="_token" value="'.csrf_token().'"><input type="hidden" name="_method" value="DELETE"><button type="submit"class="edit btn btn-primary btn-sm m-1">Delete</button></form>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        // dd(User::all());
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $timezones = DateTimeZone::listIdentifiers();
        $countries = Country::all();
        return view('admin.user.create',compact('countries','timezones','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        // store avatar
        $img = new ImageController;
        $avatar = $img->move($request->avatar);

        $user = new User;
        if($request->role_id)
        {
            $user->assignRole([$request->role_id]);
            $user->is_admin = '1';
        }
        else
        {
            $user->is_admin = 0;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->avatar = $avatar;
        $user->facebook = $request->facebook;
        $user->twitter = $request->twitter;
        $user->youtube = $request->youtube;
        $user->linkedin = $request->linkedin;
        $user->instagram = $request->instagram;
        $user->website = $request->website;
        $user->description = $request->description;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->lat = $request->latitude;
        $user->long = $request->longitude;
        $user->street = $request->street;
        $user->timezone = $request->timezone;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $u = User::find($id);
        $roles = Role::all();
        $timezones = DateTimeZone::listIdentifiers();
        $countries = Country::all();
        return view('admin.user.create',compact('u','countries','timezones','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        
        // store avatar image
        if($request->avatar)
        {
            $img = new ImageController;
            $user->avatar = $img->move($request->avatar);
        }
        
        if($request->role_id)
        {
            $user->assignRole([$request->role_id]);
            $user->is_admin = '1';
        }
        else
        {
            $user->is_admin = 0;
        }
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->facebook = $request->facebook;
        $user->twitter = $request->twitter;
        $user->youtube = $request->youtube;
        $user->linkedin = $request->linkedin;
        $user->instagram = $request->instagram;
        $user->website = $request->website;
        $user->description = $request->description;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->timezone = $request->timezone;
        $user->lat = $request->latitude;
        $user->long = $request->longitude;
        $user->street = $request->street;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete($id);
        return redirect()->back();
    }
}
