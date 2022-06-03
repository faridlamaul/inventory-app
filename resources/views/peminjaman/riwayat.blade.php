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

                    <li data-color="barang">
                        <a href="#modal-full" uk-toggle>
                            <div>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-media-top">
                                        <img src="https://images.unsplash.com/photo-1572981779307-38b8cabb2407?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1632&q=80"
                                            width="1800" height="1200" alt="">
                                    </div>
                                    <div class="uk-card-body">
                                        <h3 class="uk-card-title">Barang #1</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt.</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>

                <div id="modal-full" class="uk-modal-full" uk-modal>
                    <div class="uk-modal-dialog">
                        <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                        <div class="uk-grid-collapse uk-child-width-1-2@s
uk-flex-middle" uk-grid>
                            <div class="uk-background-cover"
                                style="background-image: url('https://images.unsplash.com/photo-1572981779307-38b8cabb2407?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1632&q=80');"
                                uk-height-viewport></div>

                            <div class="uk-padding-large">
                                <h1>Bor Mesin</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                    sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                                    est laborum.</p>
                                {{-- <div>
                                {!! QrCode::size(300)->generate('borrrrrrrrrrrrrrr') !!}
                            </div> --}}
                                <div class="uk-margin-medium-top">
                                    <p>Waktu peminjaman :<span> Timestamp</span></p>
                                </div>
                                {{-- <form action="">
                                <div class="uk-margin-small-top">
                                    <div class="uk-form-controls">
                                        <input class="uk-input" type="text" placeholder="Masukkan hasil scan disini">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <button class="uk-button uk-button-primary" type="submit">Submit</button>
                                </div>
                            </form> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
