<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PeminjamanController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return view('peminjaman.barang', compact('items'));
    }

    public function riwayat()
    {
        return view('peminjaman.riwayat');
    }
}