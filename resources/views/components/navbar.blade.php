<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
    <nav class="uk-navbar-container-fluid px-5 bg-dark" uk-navbar style="position: relative; z-index: 980;">
        <div class="uk-navbar-left">

            <ul class="uk-navbar-nav">
                <li class="uk-active">
                    <a href="{{ url('/') }}">
                        <h3 class="mb-0 fw-bold text-white">
                            Inventory-App
                        </h3>
                    </a>
                </li>
                {{-- Auth user --}}
                <li class="ms-3">
                    <a href="{{ url('/barang') }}">
                        Ajukan Peminjaman
                    </a>
                    {{-- <div class="uk-navbar-dropdown bg-dark">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                            <li><a href="{{ url('/barang') }}" class="fw-regular">Barang</a></li>
                <li><a href="#" class="fw-regular">Ruangan</a></li>
            </ul>
        </div> --}}
                </li>
                <li>
                    <a href="{{ url('riwayat') }}">
                        Riwayat peminjaman
                    </a>
                </li>

            </ul>

        </div>
        <div class="uk-navbar-right">
            {{-- guest user --}}
            @guest
                <ul class="uk-navbar-nav">
                    <li class="mx-2" style="align-self: center">
                        <a href="{{ url('login') }}">
                            <button class="uk-button uk-button-secondary bg-white text-dark">Login</button>
                        </a>
                    </li>
                    <li class="ms-2" style="align-self: center">
                        <a href="{{ url('register') }}">
                            <button class="uk-button uk-button-default text-white">Register</button>
                        </a>
                    </li>
                </ul>
            @endguest

            {{-- auth user --}}
            @auth
                <ul class="uk-navbar-nav">
                    <li class="ms-2" style="align-self: center">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button class="uk-button uk-button-default text-white">Logout</button>
                        </form>
                    </li>
                </ul>
            @endauth
        </div>
    </nav>
</div>
