@extends('layouts.app') @section('content')
<div class="flex justify-center">
    <div class="w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3 p-6 rounded-lg mb-3">
        @if ($message = Session::get('info'))
            <div class="bg-green-500 p-4 rounded-lg mb-4 text-white text-center">
                Możesz się teraz zalogować
            </div>
        @endif
        @if ($message = Session::get('danger'))
            <div class="bg-red-500 p-4 rounded-lg mb-4 text-white text-center">
                Niepoprawne dane
            </div>
        @endif
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="email" class="sr-only">Adres email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Adres email"
                    value="{{ old('email') }}"
                    class="bg-gray-100 border-2 w-full p-2 rounded-lg @error('email') border-red-500 rounded @enderror"
                />
                @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="sr-only">Hasło</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Hasło"
                    class="bg-gray-100 border-2 w-full p-2 rounded-lg @error('password') border-red-500 rounded @enderror"
                />
            </div>
            @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
            @enderror
            <div class="mb-4">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember">Pamiętaj</label>
                </div>
            </div>
            <div>
                <button
                    class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full"
                    type="submit"
                >
                    Zaloguj się
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
