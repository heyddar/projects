<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoleRequest;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index()
    {
        if(auth()->user()->hasRole('admin')){
            $roles = Role::OrderBy('created_at','desc')->paginate(5);
            return view('admin.roles.index',compact('roles'));
        }   // false


    }


    public function create()
    {
        $permissions=Permission::all();
        return view('admin.roles.create',compact('permissions'));

    }


    public function store(RoleRequest $request)
    {

        $role = new Role();
        $role->name = $request->name;

        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
        $role->attachPermission($request['permission']);

        Session::put('msg', 'نقش جدید با موفقیت ثبت شد.');
        return redirect()->back();
    }


    public function show($id)
    {
        $role =Role::findorfail($id);
        return view('admin.roles.show',compact('role'));
    }


    public function edit($id)
    {
        $permissions=Permission::all();

        $role = Role::
        where('id',$id)
            ->get()->first();
        return view('admin.roles.edit', compact('role','permissions'));
    }


    public function update(RoleRequest $request, $id)
    {
        $role= Role::findorfail($id);
        $role->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description,


        ]);


        $role->savePermissions($request['permissions']);

        Session::put('msg', ' نقش مورد نظر با موفقیت ویرایش شد.');
        return redirect(route('admin.role.index'));
    }


    public function delete($id)
    {
        Role::where('id',$id)
            ->delete();
        Session::put('msg', ' نقش مورد نظر با موفقیت حذف شد.');

        return redirect()->back();    }
}
