@extends('layouts.main')

@section('container')
    <div class="flex flex-col items-center justify-center  h-screen bg-red-700 text-gray-700">
        <!-- Component Start -->
        <h1 class="font-bold text-2xl text-white">Login Anggota</h1>
        @if (session()->has('errorLogin'))
            <div id="alert-2"
                class="mt-5 flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    <p>{{ session('errorLogin') }}</p>
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        <form class="flex flex-col bg-white rounded shadow-lg p-12 mt-5" action="{{ route('loginActionUser') }}"
            method="POST">
            @csrf
            <label class="font-semibold">Username</label>
            <input name="f_username" class="flex items-center h-12 px-4 w-64 mt-2" type="text">

            <label class="font-semibold mt-3">Password</label>
            <input name="f_password" class="flex items-center h-12 px-4 w-64 mt-2" type="password">

            <button type="submit"
                class="flex items-center justify-center h-12 px-6 w-64 bg-red-700 mt-8 font-semibold text-white">Login</button>

            <div class="flex mt-6 justify-center">
                <a class="text-red-600" href="{{ route('login-admin-pustakawan') }}">Login Admin/Pustakawan</a>
            </div>
        </form>
        <!-- Component End  -->
    </div>
@endsection
