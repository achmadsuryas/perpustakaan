@extends('layouts.sidebar')

@section('container')
    <h1 class="flex justify-center text-3xl font-semibold text-red-700">HALLO {{ Auth::guard('admin')->user()->f_nama }} 👋
    </h1>
    <div class="grid grid-cols-1 md:grid-cols-4 mx-auto justify-center gap-5 my-5">
        @if (Auth::guard('admin')->user()->f_level == 'Admin')
        <div class="bg-red-600 rounded-2xl text-white">
            <h1 class="p-5 text-2xl">Dashboard</h1>
            <a href="{{ route('dashboard') }}">
                <p class="p-5 underline">View Page</p>
            </a>
        </div>
        <div class="bg-red-600 rounded-2xl text-white">
            <h1 class="p-5 text-2xl">Users</h1>
            <a href="{{ route('user') }}">
                <p class="p-5 underline">View Page</p>
            </a>
        </div>
        <div class="bg-red-600 rounded-2xl text-white">
            <h1 class="p-5 text-2xl">Pustakawans</h1>
            <a href="{{ route('admin-pustakawan') }}">
                <p class="p-5 underline">View Page</p>
            </a>
        </div>
        <div class="bg-red-600 rounded-2xl text-white">
            <h1 class="p-5 text-2xl">Categories</h1>
            <a href="{{ route('categories') }}">
                <p class="p-5 underline">View Page</p>
            </a>
        </div>
        <div class="bg-red-600 rounded-2xl text-white">
            <h1 class="p-5 text-2xl">Books</h1>
            <a href="{{ route('book') }}">
                <p class="p-5 underline">View Page</p>
            </a>
        </div>
        <div class="bg-red-600 rounded-2xl text-white">
            <h1 class="p-5 text-2xl">Rent</h1>
            <a href="{{ route('rent') }}">
                <p class="p-5 underline">View Page</p>
            </a>
        </div>
        <div class="bg-red-600 rounded-2xl text-white">
            <h1 class="p-5 text-2xl">Return</h1>
            <a href="{{ route('return') }}">
                <p class="p-5 underline">View Page</p>
            </a>
        </div>
        <div class="bg-red-600 rounded-2xl text-white">
            <h1 class="p-5 text-2xl">Reports</h1>
            <a href="{{ route('report') }}">
                <p class="p-5 underline">View Page</p>
            </a>
        </div>
        @else
        <div class="bg-red-600 rounded-2xl text-white">
            <h1 class="p-5 text-2xl">Rent</h1>
            <a href="{{ route('rent') }}">
                <p class="p-5 underline">View Page</p>
            </a>
        </div>
        <div class="bg-red-600 rounded-2xl text-white">
            <h1 class="p-5 text-2xl">Return</h1>
            <a href="{{ route('return') }}">
                <p class="p-5 underline">View Page</p>
            </a>
        </div>
        <div class="bg-red-600 rounded-2xl text-white">
            <h1 class="p-5 text-2xl">resr</h1>
            <a href="{{ route('report') }}">
                <p class="p-5 underline">View Page</p>
            </a>
        </div>
      
    
        @endif
    </div>
@endsection
