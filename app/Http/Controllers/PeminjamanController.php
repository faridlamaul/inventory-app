<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use PhpParser\Node\Expr\FuncCall;

class PeminjamanController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return view('peminjaman.barang', compact('items'));
    }

    public function qrCheck(Request $request)
    {
        $item = Item::find($request->id);
        $qrcode = $item->qrcode;
        if ($qrcode == $request->qrcode) {
            if ($item->type == 'Barang') {
                $status = "Peminjaman";
            } else {
                $status = "Penyewaan";
            }
            Transaksi::create([
                'user_id' => auth()->user()->id,
                'item_id' => $item->id,
                'start_date' => Carbon::now(),
                'tanggal_kembali' => null,
                'type' => $status,
            ]);
            $item->update([
                'quantity' => $item->quantity - 1,
            ]);
            return redirect('/riwayat')->with('success', 'Item berhasil dipinjam');
        } else {
            return redirect('/barang')->with('error', 'QR Code is not valid');
        }
    }

    public function riwayat()
    {
        $transaksis = Transaksi::where('user_id', auth()->user()->id)
            ->join('items', 'transaksis.item_id', '=', 'items.id')
            ->get();
        return view('peminjaman.riwayat', compact('transaksis'));
    }
}