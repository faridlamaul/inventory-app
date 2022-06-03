<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <h1 class="mb-0 fw-bold" style="font-size: 50px">
                    Inventory-App
                </h1>
            </a>
            <h3 class="text-center" style="font-size: 25px">Register</h3>
        </x-slot>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="flex flex-row justify-between" style="place-content: center">
                <div class="mx-2">
                    <!-- Nama -->
                    <div>
                        <x-label for="nama" :value="__('Nama')" />

                        <x-input id="nama" class="block mt-1 w-full" type="text" name="name" :value="old('nama')" required
                            autofocus />
                    </div>

                    <!-- nik -->
                    <div class="mt-4">
                        <x-label for="nik" :value="__('Nik')" />

                        <x-input id="nik" class="block mt-1 w-full" type="text" name="nik" :value="old('nik')" required
                            autofocus />
                    </div>

                    <!-- alamat -->
                    <div class="mt-4">
                        <x-label for="alamat" :value="__('Alamat')" />

                        <x-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')"
                            required autofocus />
                    </div>

                    <!-- telepon -->
                    <div class="mt-4">
                        <x-label for="telepon" :value="__('Telepon')" />

                        <x-input id="telepon" class="block mt-1 w-full" type="text" name="telepon" :value="old('telepon')"
                            required autofocus />
                    </div>
                </div>
                <div class="mx-2">
                    <!-- Kompartemen -->
                    <div class="">
                        <x-label for="Kompartemen" :value="__('Kompartemen')" class="mb-1" />
                        <select id="kompartemen" name="kompartemen"
                            class="form-select rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            aria-label="Default select example">
                            <option selected>Select one option</option>
                            <option>Kompartemen A</option>
                            <option>Kompartemen B</option>
                            <option>Kompartemen C</option>
                        </select>
                    </div>

                    <!-- Departemen -->
                    <div class="mt-4">
                        <x-label for="Departemen" :value="__('Departemen')" class="mb-1" />
                        <select id="departemen" name="departemen"
                            class="form-select rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            aria-label="Default select example">
                            <option selected>Select one option</option>
                            <option>Departemen A</option>
                            <option>Departemen B</option>
                            <option>Departemen C</option>
                        </select>
                    </div>

                    <!-- Unit Kerja -->
                    <div class="mt-4">
                        <x-label for="UnitKerja" :value="__('Unit Kerja')" class="mb-1" />
                        <select id="unit_kerja" name="unit_kerja"
                            class="form-select rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            aria-label="Default select example">
                            <option selected>Select one option</option>
                            <option>Unit Kerja A</option>
                            <option>Unit Kerja B</option>
                            <option>Unit Kerja C</option>
                        </select>
                    </div>

                    {{-- Tipe Akun --}}
                    <div class="mt-4">
                        <x-label for="TipeAkun" :value="__('Tipe User')" class="mb-1" />
                        <select id="unit_kerja" name="type"
                            class="form-select rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            aria-label="Default select example">
                            <option selected>Select one option</option>
                            <option>Organik</option>
                            <option>Non-Organik</option>
                        </select>
                    </div>

                </div>
                <div class="mx-2">
                    <!-- Email Address -->
                    <div class="">
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                            required />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required />
                    </div>
                </div>
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
