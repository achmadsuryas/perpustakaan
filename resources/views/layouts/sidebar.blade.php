<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.1-web/css/all.min.css') }}">
</head>

<body>

    @php
        $user = null;
        if (Auth::guard('user')->user()) {
            $user = Auth::guard('user')->user();
        } elseif (Auth::guard('admin')->user()) {
            $user = Auth::guard('admin')->user();
        }
    @endphp

    <nav class="fixed top-0 z-50 w-full bg-red-600 border-b border-red-600">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="{{ route('dashboard') }}" class="flex ms-2 md:me-24">
                        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-white">ADMIN
                            PAGE</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                @if (Auth::guard('admin')->user()->f_level == 'Admin')
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-2 text-red-700 rounded-lg hover:bg-gray-100 font-bold">
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user') }}"
                        class="flex items-center p-2 text-red-700 rounded-lg hover:bg-gray-100 font-bold">
                        <span class="ms-3">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin-pustakawan') }}"
                        class="flex items-center p-2 text-red-700 rounded-lg hover:bg-gray-100 font-bold">
                        <span class="ms-3">Admin / Pustakawans</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories') }}"
                        class="flex items-center p-2 text-red-700 rounded-lg hover:bg-gray-100 font-bold">
                        <span class="ms-3">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('book') }}"
                        class="flex items-center p-2 text-red-700 rounded-lg hover:bg-gray-100 font-bold">
                        <span class="ms-3">Books</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('rent') }}"
                        class="flex items-center p-2 text-red-700 rounded-lg hover:bg-gray-100 font-bold">
                        <span class="ms-3">Rent</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('return') }}"
                        class="flex items-center p-2 text-red-700 rounded-lg hover:bg-gray-100 font-bold">
                        <span class="ms-3">Return</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('report') }}"
                        class="flex items-center p-2 text-red-700 rounded-lg hover:bg-gray-100 font-bold">
                        <span class="ms-3">Reports</span>
                    </a>
                </li>
                <hr>
                <li>
                   <a href=" {{ route('home') }}" ><button class="w-full block py-2 border border-red-700 text-red-700">View Page</button></a>
                </li>
                <li>
                    <form action="{{ route('logoutAction') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full block py-2 bg-red-700 text-white">Logout</button>
                    </form>
                </li>
                @else
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-2 text-red-700 rounded-lg hover:bg-gray-100 font-bold">
                        <i class="fa-solid fa-gauge-high fa-fw text-xl"></i>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('rent') }}"
                        class="flex items-center p-2 text-red-700 rounded-lg hover:bg-gray-100 font-bold">
                        <i class="fa-solid fa-display fa-fw text-xl"></i>
                        <span class="ms-3">Rents</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('return') }}"
                        class="flex items-center p-2 text-red-700 rounded-lg hover:bg-gray-100 font-bold">
                        <i class="fa-solid fa-rotate-left fa-fw text-xl"></i>
                        <span class="ms-3">Return</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('report') }}"
                        class="flex items-center p-2 text-red-700 rounded-lg hover:bg-gray-100 font-bold">
                        <i class="fa-solid fa-file-pdf fa-fw text-xl"></i>
                        <span class="ms-3">Reports</span>
                    </a>
                </li>
                <hr>
                <li>
                    <a href=" {{ route('home') }}" ><button class="w-full block py-2 border border-red-700 text-red-700">View Page</button></a>
                 </li>
                <li>
                    <form action="{{ route('logoutAction') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full block py-2 bg-red-700 text-white">Logout</button>
                    </form>
                </li>
                @endif
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            @yield('container')
        </div>
    </div>

</body>

</html>
