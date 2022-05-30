@extends('layout')

@section('content')

<div class="bg-secondary" style="height: 200vh">
    <div class="container-fluid pt-4 px-4">
        <div class="mb-5 bg-dark px-4 py-3 rounded">
            <h2 class="fw-bold text-white">Manage User</h2>
            <p class="text-white">Selamat datang di page Manajemen User</p>
        </div>
        <div class="bg-light px-4 py-3 rounded">
            <h3>Daftar User</h3>
            <hr>
            <table class="uk-table uk-table-striped">
                <thead>
                    <tr>
                        <th class="uk-width-small">Nama</th>
                        <th class="uk-width-small">Nik</th>
                        <th class="uk-width-small">Kompartemen</th>
                        <th class="uk-width-small">Departemen</th>
                        <th class="uk-width-small">Unit Kerja</th>
                        <th class="uk-width-small">Alamat</th>
                        <th class="uk-width-small">Email</th>
                        <th class="uk-width-small">Telepon</th>
                        <th class="uk-width-small">Hapus Karyawan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nama Karyawan</td>
                        <td>812873162704912</td>
                        <td>Kompartemen 1</td>
                        <td>Departemen 1</td>
                        <td>Unit Kerja 1</td>
                        <td>Alamat karyawan</td>
                        <td>Email karyawan</td>
                        <td>0816152371263</td>
                        <td><button class="uk-button uk-button-danger">Hapus</button></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
