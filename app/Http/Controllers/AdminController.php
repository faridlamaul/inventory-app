<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();

        return view('admin.user', compact('users'));
    }

    public function item()
    {
        $items = Item::all();
        return view('admin.item', compact('items'));
    }

    public function item_edit($id)
    {
        $item = Item::find($id);
        return view('admin.edit-item', compact('item'));
    }

    public function item_add()
    {
        return view('admin.add-item');
    }

    public function deleteUser(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();

        return redirect('admin/user')->with('success', 'User deleted successfully');
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

        $item = Item::create($inputItem);

        $encrypt = Crypt::encryptString($item->id . '-' . $item->type . '-' . Carbon::now()->toDateTimeString());
        $encrypt = substr($encrypt, 8, 8);
        $item->qrcode = $encrypt;
        $item->save();

        return redirect('admin/item')->with('success', 'Item added successfully');
    }

    public function updateItem(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => ['image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
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

        $item = Item::find($request->id);

        $item->update($inputItem);

        $encrypt = Crypt::encryptString($item->id . '-' . $item->type . '-' . Carbon::now()->toDateTimeString());
        $encrypt = substr($encrypt, 8, 8);
        $item->qrcode = $encrypt;
        $item->save();

        return redirect('admin/item')->with('success', 'Item updated successfully');
    }

    public function deleteItem(Request $request)
    {
        $user = Item::find($request->id);
        $user->delete();

        return redirect('admin/item')->with('success', 'Item deleted successfully');
    }

    public function riwayat()
    {
        $transaksis = DB::table('transaksis')
            ->join('items', 'transaksis.item_id', '=', 'items.id')
            ->join('users', 'transaksis.user_id', '=', 'users.id')
            ->select('transaksis.*', 'items.name as item_name', 'users.name as user_name', 'users.telepon as user_phone')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.riwayat', compact('transaksis'));
    }
}
