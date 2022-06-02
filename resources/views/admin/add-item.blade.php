@extends('layout')

@section('content')
<div class="container" style="min-height: 90vh">
    <div class="mt-5">
        <h2>Tambah Item</h2>
    </div>
    <div class="mb-5">
        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
            <form action="">
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Gambar Item</label>
                    <div>
                        <div uk-form-custom="target: true">
                            <input type="file">
                            <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled>
                        </div>
                        <button class="uk-button uk-button-default">Submit</button>
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Nama Item</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="form-stacked-text" type="text" placeholder="Some text...">
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Deskripsi Item</label>
                    <div class="uk-form-controls">
                        <textarea class="uk-textarea" rows="5" placeholder="Textarea"></textarea>
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Tipe Item</label>
                    <div class="uk-form-controls">
                        <select class="uk-select" id="form-stacked-select">
                            <option>Barang</option>
                            <option>Ruangan</option>
                        </select>
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Jumlah Item</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="form-stacked-text" type="number" placeholder="Some text...">
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
