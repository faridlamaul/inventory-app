@extends('layout')

@section('content')
    <div class="bg-secondary pb-5" style="min-height: 100vh">
        <div class="container-fluid pt-4 px-4">
            {{-- <div class="mb-5 bg-dark px-4 py-3 rounded">
            <h2 class="fw-bold text-white">Riwayat Peminjaman Item</h2>
            <p class="text-white">Selamat datang di page riwayat peminjaman item</p>
        </div> --}}
            <div class="bg-light px-4 py-3 rounded">
                <h3>Edit Profil</h3>
                <hr>
                <form action="{{ url('edit-profil/' . Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" name="name" id="">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">NIK</label>
                        <input type="text" class="form-control" value="{{ $user->nik }}" name="nik"
                            id="">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control" value="{{ $user->email }}" name="email"
                            id="">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">No. HP</label>
                        <input type="text" class="form-control" value="{{ $user->telepon }}" name="telepon"
                            id="">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control" value="{{ $user->alamat }}" name="alamat"
                            id="">
                    </div>
                    <div class="form-group mb-3">
                        <x-label for="Kompartemen" :value="__('Kompartemen')" class="mb-1" />
                        <select id="kompartemen" name="kompartemen"
                            class="form-select rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            aria-label="Default select example">
                            <option>Select one option</option>
                            <option @if ($user->kompartemen == 'Kompartemen A') selected @endif>Kompartemen A</option>
                            <option @if ($user->kompartemen == 'Kompartemen B') selected @endif>Kompartemen B</option>
                            <option @if ($user->kompartemen == 'Kompartemen C') selected @endif>Kompartemen C</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <x-label for="Departemen" :value="__('Departemen')" class="mb-1" />
                        <select id="Departemen" name="departemen"
                            class="form-select rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            aria-label="Default select example">
                            <option>Select one option</option>
                            <option @if ($user->departemen == 'Departemen A') selected @endif>Departemen A</option>
                            <option @if ($user->departemen == 'Departemen B') selected @endif>Departemen B</option>
                            <option @if ($user->departemen == 'Departemen C') selected @endif>Departemen C</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <x-label for="unit_kerja" :value="__('unit_kerja')" class="mb-1" />
                        <select id="unit_kerja" name="unit_kerja"
                            class="form-select rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            aria-label="Default select example">
                            <option>Select one option</option>
                            <option @if ($user->unit_kerja == 'Unit Kerja A') selected @endif>Unit Kerja A</option>
                            <option @if ($user->unit_kerja == 'Unit Kerja B') selected @endif>Unit Kerja B</option>
                            <option @if ($user->unit_kerja == 'Unit Kerja C') selected @endif>Unit Kerja C</option>
                        </select>
                    </div>
                    <button class="uk-button uk-button-primary" style="width: 100%">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
