<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.user');
    }
    public function item()
    {
        return view('admin.item');
    }
}
