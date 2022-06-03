@extends('layout')

@section('content')

    <div class="bg-secondary" style="height: 200vh">
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

                <ul class="js-filter uk-child-width-1-1 uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s uk-text-center"
                    uk-grid>
                    @foreach ($transaksis as $transaksi)
                        @if ($transaksi->type == 'Barang')
                            <li data-color="{{ $transaksi->type }}">
                                <a href="#modal-full-{{ $transaksi->id }}-{{ $transaksi->type }}" uk-toggle>
                                    <div>
                                        <div class="uk-card uk-card-default">
                                            <div class="uk-card-media-top thumbnail">
                                                <img src="{{ asset('ItemsImage/' . $transaksi->image) }}" alt=""
                                                    class="imgClass">
                                            </div>
                                            <div class="uk-card-body">
                                                <h3 class="uk-card-title">{{ $transaksi->name }}</h3>
                                                <p class="cut-text">{{ $transaksi->description }}</p>
                                                <h5>Status barang :
                                                    @if ($transaksi->end_date == null)
                                                        <span class="uk-text-danger">Belum dikembalikan</span>
                                                    @else
                                                        <span class="uk-text-primary">Sudah dikembalikan</span>
                                                    @endif
                                                </h5>
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
                                                <img src="{{ asset('ItemsImage/' . $transaksi->image) }}" alt=""
                                                    class="imgClass">
                                            </div>
                                            <div class="uk-card-body">
                                                <h3 class="uk-card-title">{{ $transaksi->name }}</h3>
                                                <p class="cut-text">{{ $transaksi->description }}</p>
                                                <h5>Status barang :
                                                    @if ($transaksi->end_date >= \Carbon::now() && $transaksi->start_date <= \Carbon::now())
                                                        <span class="uk-text-primary">Dapat digunakan</span>
                                                    @else
                                                        <span class="uk-text-danger">Tidak dapat digunakan</span>
                                                    @endif

                                                </h5>
                                            </div>
                                        </div>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
                @foreach ($transaksis as $transaksi)
                    @if ($transaksi->type == 'Barang')
                        <div id="modal-full-{{ $transaksi->id }}-{{ $transaksi->type }}" class="uk-modal-full"
                            uk-modal>
                            <div class="uk-modal-dialog">
                                <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                                <div class="uk-grid-collapse uk-child-width-1-2@s
uk-flex-middle" uk-grid>
                                    <div class="uk-background-cover"
                                        style="background-image: url('/ItemsImage/{{ $transaksi->image }}');"
                                        uk-height-viewport></div>

                                    <div class="uk-padding-large">
                                        <h1>{{ $transaksi->name }}</h1>
                                        <p>{{ $transaksi->description }}</p>
                                        <div class="uk-margin-medium-top">
                                            <p>Waktu peminjaman :<span class="uk-text-primary">
                                                    {{ $transaksi->start_date }}</span></p>
                                            <p>Waktu pengembalian :<span class="uk-text-danger">
                                                    @if ($transaksi->end_date == null)
                                                        Belum dikembalikan
                                                    @else
                                                        {{ $transaksi->end_date }}
                                                    @endif
                                                </span></p>
                                        </div>
                                        <form action="" method="POST">
                                            @csrf
                                            <div class="uk-margin">
                                                <button class="uk-button uk-button-primary" type="button"
                                                    uk-toggle="target: #modal-example">Ajukan
                                                    Pengembalian</button>
                                                <!-- This is the modal -->
                                                <div id="modal-example" uk-modal>
                                                    <div class="uk-modal-dialog uk-modal-body">
                                                        <h2 class="uk-modal-title">Apakah Anda yakin?</h2>
                                                        <div class="thumbnail">
                                                            <img src="https://images.unsplash.com/photo-1572981779307-38b8cabb2407?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1632&q=80"
                                                                alt="" class="imgClass">
                                                        </div>
                                                        <p>Pastikan Anda benar-benar sudah mengembalikan barang ini ke
                                                            tempat
                                                            semula
                                                        </p>
                                                        <p class="uk-text-right">
                                                            <button class="uk-button uk-button-default uk-modal-close"
                                                                type="button">Tidak</button>
                                                            <button class="uk-button uk-button-primary" type="submit">Ya,
                                                                saya
                                                                yakin</button>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div id="modal-full-{{ $transaksi->id }}-{{ $transaksi->type }}" class="uk-modal-full"
                            uk-modal>
                            <div class="uk-modal-dialog">
                                <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                                <div class="uk-grid-collapse uk-child-width-1-2@s
uk-flex-middle"
                                    uk-grid>
                                    <div class="uk-background-cover"
                                        style="background-image: url('/ItemsImage/{{ $transaksi->image }}');"
                                        uk-height-viewport></div>
                                    <div class="uk-padding-large">
                                        <h1>{{ $transaksi->name }}</h1>
                                        <p>{{ $transaksi->description }}</p>
                                        <div class="uk-margin-medium-top">
                                            <p>Waktu peminjaman :<span class="uk-text-primary">
                                                    {{ $transaksi->start_date }}</span></p>
                                            <p>Waktu pengembalian :<span class="uk-text-primary">
                                                    {{ $transaksi->end_date }}</span></p>
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
