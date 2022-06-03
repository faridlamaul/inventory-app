<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
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
                'end_date' => null,
                'type' => $status,
            ]);
            $encrypt = Crypt::encryptString($item->id . '-' . $item->type . '-' . Carbon::now()->toDateTimeString());
            $encrypt = substr($encrypt, 8, 8);
            // $item->qrcode = $encrypt;

            $item->update([
                'quantity' => $item->quantity - 1,
                'qrcode' => $encrypt,
            ]);
            return redirect('/riwayat')->with('success', 'Item berhasil dipinjam');
        } else {
            return redirect('/barang')->with('error', 'QR Code is not valid');
        }
    }

    public function kembalikan(Request $request)
    {
        $transaksi = Transaksi::find($request->id);
        // dd($request->id);
        $item = Item::find($transaksi->item_id);
        $transaksi->update([
            'end_date' => Carbon::now(),
        ]);
        $item->update([
            'quantity' => $item->quantity + 1,
        ]);

        return redirect('/riwayat')->with('success', 'Item berhasil dikembalikan');
    }

    public function riwayat()
    {
        $transaksis = Transaksi::join('items', 'transaksis.item_id', '=', 'items.id')
            ->where('transaksis.user_id', auth()->user()->id)
            ->select('transaksis.*', 'items.name', 'items.image', 'items.description', 'items.type')
            ->orderBy('transaksis.created_at', 'desc')
            ->get();

        return view('peminjaman.riwayat', compact('transaksis'));
    }
}
