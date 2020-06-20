<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PermissionRequest;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index()
    {
        $permissions = Permission::OrderBy('created_at','desc')->paginate(5);
        return view('admin.permissions.index',compact('permissions'));
    }


    public function create()
    {
        return view('admin.permissions.create');

    }


    public function store(PermissionRequest $request)
    {
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();
        Session::put('msg', 'دسترسی جدید با موفقیت ثبت شد.');
        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $permission = Permission::
        where('id',$id)
            ->get()->first();
        return view('admin.permissions.edit', compact('permission'));
    }


    public function update(PermissionRequest $request, $id)
    {
        $permission= Permission::findorfail($id);
        $permission->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description,


        ]);
        \Session::put('msg', ' دسترسی مورد نظر با موفقیت ویرایش شد.');
        return redirect(route('admin.permission.index'));
    }

    public function delete($id)
    {
        Permission::where('id',$id)
            ->delete();
        Session::put('msg', ' دسترسی مورد نظر با موفقیت حذف شد.');

        return redirect()->back();    }
}
