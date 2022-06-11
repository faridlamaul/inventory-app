@extends('layout')

@section('content')
    <div class="bg-secondary pb-5" style="min-height: 100vh">
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
                            <th class="uk-width-small">Waktu peminjaman</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->nik }}</td>
                                <td>{{ $user->kompartemen }}</td>
                                <td>{{ $user->departemen }}</td>
                                <td>{{ $user->unit_kerja }}</td>
                                <td>{{ $user->alamat }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->telepon }}</td>
                                <td>
                                    <button type="button" class="uk-button uk-button-danger"
                                        uk-toggle="target: #modal-{{ $user->id }}">Hapus</button>
                                    <!-- This is the modal -->
                                    <div id="modal-{{ $user->id }}" uk-modal>
                                        <div class="uk-modal-dialog uk-modal-body">
                                            <h2 class="uk-modal-title">Hapus User</h2>
                                            <p>Apakah Anda yakin ingin menghapus user <span>{{ $user->name }} ?</span>
                                            </p>
                                            <form action="{{ url('/admin/user/deleteUser', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <p class="uk-text-right">
                                                    <button class="uk-button uk-button-default uk-modal-close"
                                                        type="button">Tidak</button>
                                                    <button class="uk-button uk-button-danger" type="submit">Ya, saya
                                                        yakin</button>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
