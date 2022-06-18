@extends('layout')

@section('content')
<div class="bg-secondary pb-5" style="min-height: 100vh">
    <div class="container-fluid pt-4 px-4">
        <div class="mb-5 bg-dark px-4 py-3 rounded">
            <h2 class="fw-bold text-white">Riwayat Peminjaman Item</h2>
            <p class="text-white">Selamat datang di page riwayat peminjaman item</p>
        </div>
        <div class="bg-light px-4 py-3 rounded">
            <h3>Daftar Riwayat</h3>
            <hr>
            <table class="uk-table uk-table-striped">
                <thead>
                    <tr>
                        <th class="uk-width-small">Item dipinjam/disewa</th>
                        <th class="uk-width-small">Nama Peminjam</th>
                        <th class="uk-width-small">No. HP Peminjam</th>
                        <th class="uk-width-small">Waktu peminjaman/penyewaan</th>
                        <th class="uk-width-small">Waktu pengembalian</th>
                        <th class="uk-width-small">Kesa / Pesan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $item)
                    <tr>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->user_name }}</td>
                        <td>{{ $item->user_phone }}</td>
                        <td>{{ $item->start_date }}</td>
                        <td>
                            @if ($item->end_date == null)
                            <p class="text-danger">Belum dikembalikan</p>
                            @else
                            {{ $item->end_date }}
                            @endif
                        </td>
                        <td>
                            @if ($item->end_date == null)
                            <p class="text-danger">Belum dikembalikan</p>
                            @else
                            <button class="uk-button uk-button-primary" uk-toggle="target: #modal-{{ $item->id }}">Lihat Kesan/Pesan</button>
                            <!-- This is the modal -->
                            <div id="modal-{{ $item->id }}" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body">
                                    <h2 class="uk-modal-title">Kesan / Pesan Peminjam</h2>
                                    <p>
                                        Pastikan Anda benar-benar sudah mengembalikan
                                    </p>
                                </div>
                            </div>

                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
