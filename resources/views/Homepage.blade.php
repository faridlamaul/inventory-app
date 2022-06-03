@extends('layout')

@section('content')
    <div class="bg-secondary">
        <div class="uk-height-large uk-background-cover uk-light uk-flex" uk-parallax="bgy: -200"
            style="height: 90vh; background-image: url('https://images.unsplash.com/photo-1553770710-7aa9a1e4f9dd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');">

            <div class="uk-width-1-2@m uk-text-center uk-margin-auto uk-margin-auto-vertical">

                <h1 class="mb-0">
                    Selamat datang di <span class="fw-bold bg-white text-dark px-1">Inventory-App</span>
                </h1>
                <h3 class="m-3">Web-based tempat peminjaman barang dan penyewaan ruangan</h3>

                <div class="mt-5 pt-5">
                    <a href="#tatacara">
                        <button class="uk-button uk-button-secondary">Tata cara penggunaan</button>
                    </a>
                </div>
            </div>

        </div>

        <div id="tatacara" class="container-xxl pt-5 pb-5">
            <div class="mt-5">
                <h3 class="fw-bold">Tata cara penggunaan web</h3>
                <div class="bg-dark p-5">
                    <dl class="uk-description-list uk-description-list-divider">
                        <dt class="text-white">Description term</dt>
                        <dd class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</dd>
                        <dt class="text-white">Description term</dt>
                        <dd class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</dd>
                        <dt class="text-white">Description term</dt>
                        <dd class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</dd>
                    </dl>

                </div>
            </div>
        </div>
    </div>
@endsection
