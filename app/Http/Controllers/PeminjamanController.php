<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        return view('peminjaman.barang');
    }

    public function riwayat()
    {
        return view('peminjaman.riwayat');
    }
}
