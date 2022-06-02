@extends('layout')

@section('content')
<div class="container">
    <div class="mt-5">
        <h2>Edit <span>(Nama Item)</span></h2>
    </div>
    <div class="mb-5">
        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
            <img src="https://images.unsplash.com/photo-1572981779307-38b8cabb2407?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1632&q=80" alt="" style="width: 30%">
            <form action="" class="mt-5">
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Ganti Gambar Item</label>
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
