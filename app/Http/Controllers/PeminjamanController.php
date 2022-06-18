<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Transaksi;
use App\Models\User;
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

    public function edit_profil()
    {
        $user = auth()->user();
        return view('edit_profil', compact('user'));
    }

    public function pinjam(Request $request)
    {
        $item = Item::find($request->id);
        $qrcode = $item->qrcode;
        if ($qrcode == $request->qrcode) {
            $status = "Peminjaman";
            Transaksi::create([
                'user_id' => auth()->user()->id,
                'item_id' => $item->id,
                'start_date' => Carbon::now(),
                'end_date' => null,
                'type' => $status,
            ]);
            $encrypt = Crypt::encryptString($item->id . '-' . $item->type . '-' . Carbon::now()->toDateTimeString());
            $encrypt = substr($encrypt, 8, 8);

            $item->update([
                'quantity' => $item->quantity - 1,
                'qrcode' => $encrypt,
            ]);
            return redirect('/riwayat')->with('success', 'Item berhasil dipinjam');
        } else {
            return redirect('/barang')->with('error', 'QR Code is not valid');
        }
    }

    public function sewa(Request $request)
    {
        $item = Item::find($request->id);
        $qrcode = $item->qrcode;
        if ($qrcode == $request->qrcode) {
            $status = "Penyewaan";
            Transaksi::create([
                'user_id' => auth()->user()->id,
                'item_id' => $item->id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'type' => $status,
                'kesan' => $request->kesan,
            ]);
            $encrypt = Crypt::encryptString($item->id . '-' . $item->type . '-' . Carbon::now()->toDateTimeString());
            $encrypt = substr($encrypt, 8, 8);

            $item->update([
                'qrcode' => $encrypt,
            ]);

            // dd(Carbon::parse($request->start_date)->diffInDays(Carbon::parse($request->end_date)));

            if (Carbon::parse($request->start_date)->greaterThanOrEqualTo(Carbon::now()->format('Y-m-d'))) {
                $item->update([
                    'quantity' => $item->quantity - 1,
                ]);
            }
            return redirect('/riwayat')->with('success', 'Penyewaan ruangan berhasil');
        } else {
            return redirect('/barang')->with('error', 'QR Code is not valid');
        }
    }

    public function kembalikan(Request $request)
    {
        $transaksi = Transaksi::find($request->id);
        $item = Item::find($transaksi->item_id);
        $transaksi->update([
            'end_date' => Carbon::now(),
            'kesan' => $request->kesan,
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

        $items = Item::join('transaksis', 'items.id', '=', 'transaksis.item_id')
            ->where('transaksis.user_id', auth()->user()->id)
            ->select('items.*', 'transaksis.start_date', 'transaksis.end_date')
            ->get();

        foreach ($items as $item) {
            if (Carbon::parse(now())->diffInDays(Carbon::parse($item->end_date)) == -1) {
                $item->update([
                    'quantity' => $item->quantity + 1,
                ]);
            }
        }

        return view('peminjaman.riwayat', compact('transaksis'));
    }

    public function editProfile(Request $request)
    {
        $user = User::find($request->id);
        $user->update([
            'name' => $request->name,
            'nik' => $request->nik,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'kompartemen' => $request->kompartemen,
            'departemen' => $request->departemen,
            'unit_kerja' => $request->unit_kerja,
        ]);
        return redirect('/barang')->with('success', 'Profil berhasil diubah');
    }
}