@extends('layout')

@section('content')

<div id="wrapper" class="bg-secondary" style="height: 200vh" onload="addClass();">
    <div class="container-fluid pt-4 px-4">
        <div class="mb-5 bg-dark px-4 py-3 rounded d-flex flex-row">
            <div class="">
                <h2 class="fw-bold text-white">Manage Item</h2>
                <p class="text-white">Selamat datang di page Manajemen Item</p>
            </div>
            <a href="{{ url('/admin/item/add') }}" class=" ms-auto my-4">
                <button class="uk-button uk-button-primary">+ Tambah Item</button>
            </a>
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
                @foreach ($items as $item)
                <li data-color="{{ $item->type }}">
                    <a href="#{{ $item->type }}-{{ $item->id }}" uk-toggle>
                        <div>
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-media-top thumbnail">
                                    <img src="{{ asset('ItemsImage/' . $item->image) }}" alt="" class="imgClass">
                                </div>
                                <div class="uk-card-body">
                                    <h3 class="uk-card-title">{{ $item->name }}</h3>
                                    <p>{{ $item->description }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
            @foreach ($items as $item)
            <div id="{{ $item->type }}-{{ $item->id }}" class="uk-modal-full" uk-modal>
                <div class="uk-modal-dialog">
                    <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                    <div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
                        <div class="uk-background-cover" style="background-image: url('/ItemsImage/{{ $item->image }}');" uk-height-viewport>
                        </div>
                        <div class="uk-padding-large">
                            <h1>{{ $item->name }}</h1>
                            <p>{{ $item->description }}</p>
                            <h3 class="uk-margin">Jumlah : <span>{{ $item->quantity }}</span></h3>
                            <div class="uk-margin">
                                <a href="{{ url('/admin/item/edit/' . $item->id) }}">
                                    <button class="uk-button uk-button-primary">Edit Item</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

@endsection
