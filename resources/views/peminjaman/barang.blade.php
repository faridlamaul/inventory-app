@extends('layout')

@section('content')
    <div class="bg-secondary" style="height: 200vh">
        <div class="container-fluid pt-4 px-4">
            <div class="mb-5 bg-dark px-4 py-3 rounded">
                <h2 class="fw-bold text-white">Ajukan Peminjaman</h2>
                <p class="text-white">Selamat datang di page peminjaman barang</p>
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
                    @foreach ($items as $item)
                        @if ($item->type == 'Barang')
                            <li data-color="{{ $item->type }}">
                                <a href="#modal-full-{{ $item->id }}-{{ $item->type }}" uk-toggle>
                                    <div>
                                        <div class="uk-card uk-card-default">
                                            <div class="uk-card-media-top thumbnail">
                                                <img src="{{ asset('ItemsImage/' . $item->image) }}"
                                                    class="imgClass">
                                            </div>
                                            <div class="uk-card-body">
                                                <h3 class="uk-card-title">{{ $item->name }}</h3>
                                                <p>{{ $item->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @elseif ($item->type == 'Ruangan')
                            <li data-color="{{ $item->type }}">
                                <a href="#modal-full-{{ $item->id }}-{{ $item->type }}" uk-toggle>
                                    <div>
                                        <div class="uk-card uk-card-default">
                                            <div class="uk-card-media-top thumbnail">
                                                <img src="{{ asset('ItemsImage/' . $item->image) }}" alt=""
                                                    class="imgClass">
                                            </div>
                                            <div class="uk-card-body">
                                                <h3 class="uk-card-title">{{ $item->name }}</h3>
                                                <p>{{ $item->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
                @foreach ($items as $item)
                    @if ($item->type == 'Barang')
                        <div id="modal-full-{{ $item->id }}-{{ $item->type }}" class="uk-modal-full" uk-modal>
                            <div class="uk-modal-dialog">
                                <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                                <div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
                                    <div class="uk-background-cover"
                                        style="background-image: url('/ItemsImage/{{ $item->image }}');"
                                        uk-height-viewport>
                                    </div>
                                    <div class="uk-padding-large">
                                        <h1>{{ $item->name }}</h1>
                                        <p>{{ $item->description }}</p>
                                        <div>
                                            {!! QrCode::size(300)->generate($item->qrcode) !!}
                                        </div>
                                        <form action="">
                                            <div class="uk-margin-small-top">
                                                {{-- <label for="" class="uk-form-label">Masukkan hasil scan disini</label> --}}
                                                <div class="uk-form-controls">
                                                    <label class="uk-form-label" for="">Hasil scan</label>
                                                    <input class="uk-input" type="text"
                                                        placeholder="Masukkan hasil scan disini">
                                                </div>
                                            </div>
                                            <div class="uk-margin">
                                                <button class="uk-button uk-button-primary" type="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif ($item->type == 'Ruangan')
                        <div id="modal-full-{{ $item->id }}-{{ $item->type }}" class="uk-modal-full" uk-modal>
                            <div class="uk-modal-dialog">
                                <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                                <div class="uk-grid-collapse uk-child-width-1-2@suk-flex-middle" uk-grid>
                                    <div class="uk-background-cover"
                                        style="background-image: url('/ItemsImage/{{ $item->image }}');"
                                        uk-height-viewport></div>
                                    <div class="uk-padding-large">
                                        <h1>{{ $item->name }}</h1>
                                        <p>{{ $item->description }}</p>
                                        <div>
                                            {!! QrCode::size(300)->generate($item->qrcode) !!}
                                        </div>
                                        <form action="">
                                            <div class="uk-margin-small-top">
                                                {{-- <label for="" class="uk-form-label">Masukkan hasil scan disini</label> --}}
                                                <div class="uk-form-controls">
                                                    <label class="uk-form-label" for="">Hasil scan</label>
                                                    <input class="uk-input" type="text"
                                                        placeholder="Masukkan hasil scan disini">
                                                </div>
                                            </div>
                                            <div class="uk-margin-small">
                                                <div class="uk-form-controls">
                                                    <label class="uk-form-label" for="">Tanggal peminjaman</label>
                                                    <input class="uk-input" type="date"
                                                        placeholder="Masukkan tanggal peminjaman">
                                                </div>
                                            </div>
                                            <div class="uk-margin-small">
                                                <div class="uk-form-controls">
                                                    <label class="uk-form-label" for="">Tanggal Pengembalian</label>
                                                    <input class="uk-input" type="date"
                                                        placeholder="Masukkan tanggal peminjaman">
                                                </div>
                                            </div>
                                            <div class="uk-margin">
                                                <button class="uk-button uk-button-primary" type="submit">Submit</button>
                                            </div>
                                        </form>
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
