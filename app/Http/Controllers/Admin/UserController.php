<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index()
    {
        $users = User::OrderBy('is_admin','desc')->paginate(10);
       return view('admin.users.index',compact('users'));
    }


    public function create()
    {
        $roles=Role::all();
        return view('admin.users.create',compact('roles'));

    }


    public function store(Request $request)
    {
        $this->validate($request, $this->validator());
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = $request->is_admin;
        $user->save();
        $user->attachRole($request['role']);

        Session::put('msg', 'کاربر جدید با موفقیت ثبت شد.');
        return redirect()->back();

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $roles = Role::all();
        $user = User::
            where('id',$id)
            ->get()->first();
        return view('admin.users.edit', compact('user','roles'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findorfail($id);
        $request->validate([
            'name' => 'required|string|min:3|max:200',
            'display_name' => 'nullable|string|min:3|max:200',
            'biography' => 'nullable|string|min:3|max:2000',
            'email' => 'required|string|email|unique:users,email,'.$user->id,
            'new_password' => 'nullable|string|min:8|max:40',
            'avatar'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->file('avatar')) {
            $image = $request->file('avatar');
            if ($image) {
                $image_name = date('mdYHis');
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name . "." . $ext;
                $upload_url = 'images/users/';
                $image_url = $upload_url . $image_full_name;
                $isUploaded = $image->move($upload_url, $image_full_name);
                $data['avatar'] = $image_url;

            }
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'display_name' => $request->display_name,
                'biography' => $request->biography,
                'avatar' => $data['avatar'],
            ]);
            if ($request->password) {
                $user->update([
                    'password' => bcrypt($request->password),
                ]);
            }
        }else{
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'display_name' => $request->display_name,
                'biography' => $request->biography,
            ]);
            if ($request->password) {
                $user->update([
                    'password' => bcrypt($request->password),
                ]);
            }
        }
        $user->deferAndAttachNewRole($request['role']);

        Session::put('msg', 'کاربر  با موفقیت ویرایش شد.');
        return redirect(route('admin.user.index'));
    }


    public function delete(Request $request,$id)
    {

        User::where('id',$id)
            ->delete();
        Session::put('msg', 'کاربر مورد نظر با موفقیت حذف شد.');

        return redirect()->back();
    }
    private function validator(): array
    {
        $rules = [
            'name' => 'required|string|max:100',
            'email' => 'required|email|string|unique:users,email',
            'password' => 'required|min:6',
            'is_admin' => 'nullable',

        ];




        return $rules;
    }
}
