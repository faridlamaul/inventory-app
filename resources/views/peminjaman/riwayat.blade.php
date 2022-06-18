@extends('layout')

@section('content')

<div class="bg-secondary pb-5" style="min-height: 100vh">
    <div class="container-fluid pt-4 px-4">
        <div class="mb-5 bg-dark px-4 py-3 rounded">
            <h2 class="fw-bold text-white">Riwayat Peminjaman</h2>
            <p class="text-white">Selamat datang di page riwayat peminjaman barang</p>
        </div>
        <div uk-filter="target: .js-filter">

            <ul class="uk-subnav uk-subnav-pill">
                <li class="uk-active" uk-filter-control="[data-color='Barang']">
                    <a href="#">Barang</a>
                </li>
                <li uk-filter-control="[data-color='Ruangan']">
                    <a href="#">Ruangan</a>
                </li>
            </ul>

            <ul class="js-filter uk-child-width-1-1 uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s uk-text-center" uk-grid>
                @foreach ($transaksis as $transaksi)
                @if ($transaksi->type == 'Barang')
                <li data-color="{{ $transaksi->type }}">
                    <a href="#modal-full-{{ $transaksi->id }}-{{ $transaksi->type }}" uk-toggle>
                        <div>
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-media-top thumbnail">
                                    <img src="{{ asset('ItemsImage/' . $transaksi->image) }}" alt="" class="imgClass">
                                </div>
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title">{{ $transaksi->name }}</h3>
                                    <p class="cut-text">{{ $transaksi->description }}</p>
                                    <h5 class="mb-0">Status :
                                        @if ($transaksi->end_date == null)
                                        <span class="uk-text-danger">Belum dikembalikan</span>
                                        @else
                                        <span class="uk-text-success">Sudah dikembalikan</span>
                                        @endif
                                    </h5>
                                    {{-- <p class="m-0">Waktu peminjaman :
                                                    <span>{{ $transaksi->start_date }}</span>
                                    </p> --}}
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                @else
                <li data-color="{{ $transaksi->type }}">
                    <a href="#modal-full-{{ $transaksi->id }}-{{ $transaksi->type }}" uk-toggle>
                        <div>
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-media-top thumbnail">
                                    <img src="{{ asset('ItemsImage/' . $transaksi->image) }}" alt="" class="imgClass">
                                </div>
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title">{{ $transaksi->name }}</h3>
                                    <p class="cut-text">{{ $transaksi->description }}</p>
                                    <h5>Status :
                                        @if ($transaksi->end_date >= \Carbon\Carbon::now() && $transaksi->start_date <= \Carbon\Carbon::now()) <span class="uk-text-success">Active</span>
                                            @elseif ($transaksi->end_date >= \Carbon\Carbon::now() && $transaksi->start_date >= \Carbon\Carbon::now())
                                            <span class="uk-text-primary">Booking</span>
                                            @else
                                            <span class="uk-text-danger">Non active</span>
                                            @endif
                                    </h5>
                                    <h6>
                                        @if ($transaksi->end_date >= \Carbon\Carbon::now() && $transaksi->start_date <= \Carbon\Carbon::now()) <span class="uk-text-muted">Masih dalam masa penyewaan</span>
                                            @elseif ($transaksi->end_date >= \Carbon\Carbon::now() && $transaksi->start_date >= \Carbon\Carbon::now())
                                            <span class="uk-text-muted">Belum dalam masa penyewaan</span>
                                            @else
                                            <span class="uk-text-muted">Masa penyewaan telah habis</span>
                                            @endif
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                @endif
                @endforeach
            </ul>
            @foreach ($transaksis as $transaksi)
            @if ($transaksi->type == 'Barang')
            <div id="modal-full-{{ $transaksi->id }}-{{ $transaksi->type }}" class="uk-modal-full" uk-modal>
                <div class="uk-modal-dialog">
                    <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                    <div class="uk-grid-collapse uk-child-width-1-2@s
uk-flex-middle" uk-grid>
                        <div class="uk-background-cover" style="background-image: url('/ItemsImage/{{ $transaksi->image }}');" uk-height-viewport></div>

                        <div class="uk-padding-large">
                            <h1>{{ $transaksi->name }}</h1>
                            <p>{{ $transaksi->description }}</p>
                            <div class="uk-margin-medium-top">
                                <p>Waktu peminjaman :<span class="uk-text-primary">
                                        {{ $transaksi->start_date }}</span></p>
                                <p>Waktu pengembalian :
                                    @if ($transaksi->end_date == null)
                                    <span class="uk-text-danger">Belum dikembalikan</span>
                                    @else
                                    <span class="uk-text-primary">{{ $transaksi->end_date }}</span>
                                    @endif
                                </p>
                            </div>

                            <div class="uk-margin">
                                @if ($transaksi->end_date == null)
                                <button class="uk-button uk-button-primary" type="button" uk-toggle="target: #modal-{{ $transaksi->id }}">Ajukan
                                    Pengembalian</button>
                                @endif
                                <!-- This is the modal -->
                                <div id="modal-{{ $transaksi->id }}" uk-modal>
                                    <div class="uk-modal-dialog uk-modal-body">
                                        <h2 class="uk-modal-title">Apakah Anda yakin?</h2>
                                        <div class="thumbnail">
                                            <img src="{{ asset('ItemsImage/' . $transaksi->image) }}" alt="" class="imgClass">
                                        </div>
                                        <p>
                                            Pastikan Anda benar-benar sudah mengembalikan
                                            <span>{{ $transaksi->name }}</span> ke tempat semula
                                        </p>
                                        <form action="{{ url('/riwayat/kembalikan/' . $transaksi->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Kesan/Pesan</label>
                                                <textarea class="form-control" name="alasan" id="" cols="30" rows="5"></textarea>
                                            </div>
                                            <p class="uk-text-right">
                                                <button class="uk-button uk-button-default uk-modal-close" type="button">Tidak</button>
                                                <button class="uk-button uk-button-primary" type="submit">Ajukan Pengembalian</button>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div id="modal-full-{{ $transaksi->id }}-{{ $transaksi->type }}" class="uk-modal-full" uk-modal>
                <div class="uk-modal-dialog">
                    <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                    <div class="uk-grid-collapse uk-child-width-1-2@s
uk-flex-middle" uk-grid>
                        <div class="uk-background-cover" style="background-image: url('/ItemsImage/{{ $transaksi->image }}');" uk-height-viewport></div>
                        <div class="uk-padding-large">
                            <h1>{{ $transaksi->name }}</h1>
                            <p>{{ $transaksi->description }}</p>
                            <div class="uk-margin-medium-top">
                                <p>Waktu awal penyewaan :<span class="uk-text-primary">
                                        {{ \Carbon\Carbon::parse($transaksi->start_date)->format('Y-m-d') }}</span>
                                </p>
                                <p>Waktu akhir penyewaan :<span class="uk-text-primary">
                                        {{ \Carbon\Carbon::parse($transaksi->end_date)->format('Y-m-d') }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

        </div>

    </div>
</div>
@endsection
