<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();

        return view('admin.user', compact('users'));
    }

    public function deleteUser(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();

        return redirect('admin/user')->with('success', 'User deleted successfully');
    }

    public function item()
    {
        return view('admin.item');
    }

    public function addItem(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
            'description' => 'required',
            'type' => 'required',
            'quantity' => 'required',
        ]);

        $inputItem = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'ItemsImage/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $inputItem['image'] = "$profileImage";
        }

        Item::create($inputItem);

        return redirect('admin/item')->with('success', 'Item added successfully');
    }

    public function updateItem(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
            'description' => 'required',
            'type' => 'required',
            'quantity' => 'required',
        ]);

        $inputItem = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'ItemsImage/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $inputItem['image'] = "$profileImage";
        } else {
            unset($inputItem['image']);
        }

        Item::where('id', $request->id)->update($inputItem);

        return redirect('admin/item')->with('success', 'Item updated successfully');
    }

    public function deleteItem(Request $request)
    {
        $user = Item::find($request->id);
        $user->delete();

        return redirect('admin/item')->with('success', 'Item deleted successfully');
    }
}