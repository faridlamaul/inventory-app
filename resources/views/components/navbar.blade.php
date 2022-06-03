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

                {{-- Auth with role user --}}
                @auth
                @if (Auth::user()->hasRole('user'))
                <li class="ms-3">
                    <a href="{{ url('/barang') }}">
                        Ajukan Peminjaman
                    </a>
                </li>
                <li>
                    <a href="{{ url('riwayat') }}">
                        Riwayat peminjaman
                    </a>
                </li>
                @else
                <li class="ms-3">
                    <a href="{{ url('/admin/user') }}">
                        Manage User
                    </a>
                </li>
                <li class="ms-3">
                    <a href="{{ url('/admin/item') }}">
                        Manage Item
                    </a>
                </li>
                @endif
                @endauth
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
                <li style="align-self: center" class="me-3">
                    <p class="text-white m-0">Halo, <span>Name</span></p>
                </li>
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
