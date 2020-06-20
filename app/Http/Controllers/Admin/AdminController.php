<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Role;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:panel']);
    }
    public function index()
    {
//            Auth::user()->hasRole();
            return view('admin.home');


    }
}
