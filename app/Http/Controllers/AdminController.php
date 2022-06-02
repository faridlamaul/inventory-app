<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // get all data with role 'user'
        $users = User::with('roles')->whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();

        return view('admin.user', compact('users'));
    }

    public function item()
    {
        return view('admin.item');
    }

    public function item_edit()
    {
        return view('admin.edit-item');
    }

    public function item_add()
    {
        return view('admin.add-item');
    }

    public function deleteUser(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();

        return redirect()->back();
    }
}
