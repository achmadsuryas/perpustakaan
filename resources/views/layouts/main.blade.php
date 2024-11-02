<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.1-web/css/all.min.css') }}"> --}}
</head>

<body class="max-w-screen-lg mx-auto">

    @php
        $user = null;
        if (Auth::guard('user')->user()) {
            $user = Auth::guard('user')->user();
        } elseif (Auth::guard('admin')->user()) {
            $user = Auth::guard('admin')->user();
        }
    @endphp

    <nav class="bg-white border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-red-700">PERPUSTAKAAN</span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                @if ($user)
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="bg-red-700 text-white font-medium text-sm px-5 py-2.5 text-center inline-flex items-center"
                        type="button">
                        {{ $user->f_nama }}
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButton">
                            <li class="hover:bg-red-700 hover:text-white">
                                <form action="{{ route('logoutAction') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full block px-4 py-2">Keluar</button>
                                </form>
                            </li>
                            <li class="hover:bg-red-700 hover:text-white">
                                <a href="{{ route('riwayat', ['id' => $user->f_id]) }}">
                                    <button type="submit" class="w-full block px-4 py-2">Riwayat Peminjaman</button>
                                </a>
                            </li>
                            @if (Auth::guard('admin')->user())
                                <li class="hover:bg-red-700 hover:text-white">
                                    <a href="{{ route('dashboard') }}">
                                        <button type="submit" class="w-full block px-4 py-2">Dashboard</button>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                @else
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="bg-red-700 text-white font-medium text-sm px-5 py-2.5 text-center inline-flex items-center"
                        type="button">Masuk<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButton">
                            <li class="hover:bg-red-700 hover:text-white">
                                <a href="{{ route('login-user') }}"><button class="w-full block px-4 py-2">Masuk
                                        User</button></a>
                            </li>
                            <li class="hover:bg-red-700 hover:text-white">
                                <a href="{{ route('login-admin-pustakawan') }}"><button
                                        class="w-full block px-4 py-2">Masuk Admin/Pustakawan</button></a>
                            </li>
                        </ul>
                    </div>
                @endif
                <button data-collapse-toggle="navbar-cta" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-red-600 rounded-lg md:hidden"
                    aria-controls="navbar-cta" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                    <li>
                        <a href="/" class="block py-2 px-3 md:p-0 text-black hover:text-red-700">Beranda</a>
                    </li>
                    <li>
                        <a href="{{ route('listbook') }}"
                            class="block py-2 px-3 md:p-0 text-black hover:text-red-700">Buku</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('container')

</body>

</html>
