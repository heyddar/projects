<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:grouping']);
    }
    public function index()
    {
        $groups = Group::OrderBy('created_at','desc')->paginate(5);
        return view('admin.groups.index',compact('groups'));
    }

    public function create()
    {
        return view('admin.groups.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, $this->validator());
        $group = new Group();
        $group->title = $request->title;
        $group->save();
        Session::put('msg', 'دسته بندی جدید با موفقیت ثبت شد.');
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $group = Group::
        where('id',$id)
            ->get()->first();
        return view('admin.groups.edit', compact('group'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:200',
        ]);
        if ($request->title) {
            $data ['title']= $request->title;
        }



        Group::where('id',$id)
            ->update($data);
        Session::put('msg', ' دسته بندی مورد نظر با موفقیت ویرایش شد.');
        return redirect(route('admin.group.index'));
    }
    public function delete(Request $request,$id)
    {

        Group::where('id',$id)
            ->delete();
        Session::put('msg', ' دسته بندی مورد نظر با موفقیت حذف شد.');

        return redirect()->back();
    }
    private function validator(): array
    {
        $rules = [
            'title' => 'required|string|max:255|unique:categories,title',


        ];



        return $rules;
    }
}
