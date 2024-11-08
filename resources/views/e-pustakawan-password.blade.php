@extends('layouts.sidebar')

@section('container')
    <form class="max-w-screen-sm mx-auto flex flex-col justify-center" action="{{ route('up-pustakawan', [$petugas->f_id]) }}"
        method="POST">
        @csrf
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900">Password</label>
            <input type="text" name="f_password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required />
        </div>
        <button type="submit"
            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
@endsection