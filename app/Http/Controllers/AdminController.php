<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        return view('admin.login');
    }

    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }
}
