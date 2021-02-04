@extends('layouts.app') @section('content')
<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="sr-only">Imię i nazwisko</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    placeholder="Imie i nazwisko"
                    value="{{ old('name') }}"
                    class="bg-gray-100 border-2 w-full p-2 rounded-lg @error('name') border-red-500 rounded @enderror"
                />
                @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="username" class="sr-only">Nazwa użytkownika</label>
                <input
                    type="text"
                    name="username"
                    id="username"
                    placeholder="Nazwa użytkownika"
                    value="{{ old('username') }}"
                    class="bg-gray-100 border-2 w-full p-2 rounded-lg @error('username') border-red-500 rounded @enderror"
                />
                @error('username')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
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
                <label for="password" class="sr-only">Powtórz hasło</label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    placeholder="Powtórz hasło"
                    class="bg-gray-100 border-2 w-full p-2 rounded-lg @error('password_confirmation') border-red-500 rounded @enderror"
                />
            </div>
            <div>
                <button
                    class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full"
                    type="submit"
                >
                    Załóż konto
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
