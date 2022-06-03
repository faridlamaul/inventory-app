@extends('layout')

@section('content')
    <div class="container">
        <div class="mt-5">
            <h2>Edit <span>{{ $item->name }}</span></h2>
        </div>
        <div class="mb-5">
            <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                <img src="{{ asset('ItemsImage/' . $item->image) }}" alt="{{ $item->name }}" alt="" style="width: 30%">
                <form action="{{ url('/admin/item/edit/' . $item->id) }}" class="mt-5" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Ganti Gambar Item</label>
                        <div>
                            <div uk-form-custom="target: true">
                                <input type="file" name="image" value="{{ asset('ItemsImage/' . $item->image) }}">
                                <input class="uk-input uk-form-width-medium" type="text" placeholder="{{ $item->image }}"
                                    disabled>
                            </div>
                            {{-- <button class="uk-button uk-button-default">Submit</button> --}}
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Nama Item</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="form-stacked-text" name="name" type="text"
                                value="{{ $item->name }}">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Deskripsi Item</label>
                        <div class="uk-form-controls">
                            <textarea class="uk-textarea" name="description" rows="5">{{ $item->description }}</textarea>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Tipe Item</label>
                        <div class="uk-form-controls">
                            <select class="uk-select" name="type" id="form-stacked-select">
                                <option @if ($item->type == 'Barang') selected @endif> Barang</option>
                                <option @if ($item->type == 'Ruangan') selected @endif> Ruangan</option>
                            </select>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Jumlah Item</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" name="quantity" id="form-stacked-text" type="number"
                                value="{{ $item->quantity }}">
                        </div>
                    </div>
                    <div>
                        <button class="uk-button uk-button-secondary" style="width: 100%">Submit</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection
