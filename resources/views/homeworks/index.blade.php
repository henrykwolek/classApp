@extends('layouts.app') @section('content')
<div class="flex justify-center">
    <div class="w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3 p-6 rounded-lg mb-3">
        <span class="text-3xl mb-4 px-4 py-4">Dodaj zadanie</span>
        <div class="bg-blue-100 mt-3 border-t-4 border-indigo-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
              <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
              <div>
                <p class="font-bold">Na co zwracać uwagę</p>
                <p class="text-sm">Pamiętaj, aby w treści zadania była zawarta każda potrzebna informacja. Możesz dodawać swoje uwagi, ale pamiętaj, aby nie było ich zbyt dużo. Twoje ID : {{ Auth()->user()->id }}</p>
              </div>
            </div>
        </div>
        @if ($message = Session::get('danger'))
            <div class="bg-red-500 p-4 rounded-lg mb-4 mt-4 text-white text-center">
                {{ $message }}
            </div>
        @endif
        <form class="mt-4" action="{{ route('zadanieAdd') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="sr-only">Przedmiot</label>
                <input
                    type="text"
                    name="przedmiot"
                    id="przedmiot"
                    placeholder="Przedmiot"
                    value="{{ old('name') }}"
                    class="bg-gray-100 border-2 w-full p-2 rounded-lg @error('przedmiot') border-red-500 rounded @enderror"
                />
                @error('przedmiot')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="username" class="sr-only">Termin wykonania</label>
                <input
                    type="date"
                    name="termin"
                    id="termin"
                    placeholder="Termin"
                    value="{{ old('termin') }}"
                    class="bg-gray-100 border-2 w-full p-2 rounded-lg @error('termin') border-red-500 rounded @enderror"
                />
                @error('termin')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="sr-only">Zadanie</label>
                <input
                    type="text"
                    name="tytul"
                    id="tytul"
                    placeholder="Zadanie (strona/zadanie)"
                    value="{{ old('tytul') }}"
                    class="bg-gray-100 border-2 w-full p-2 rounded-lg @error('tytul') border-red-500 rounded @enderror"
                />
                @error('tytul')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="sr-only">Dokładna treść</label>
                <textarea
                    rows="5"
                    type="text"
                    name="tresc"
                    id="tresc"
                    placeholder="Dokładna treść"
                    value="{{ old('tytul') }}"
                    class="bg-gray-100 border-2 w-full p-2 rounded-lg @error('tresc') border-red-500 rounded @enderror"
                ></textarea>
                @error('tresc')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <button
                    class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full"
                    type="submit"
                >
                    Dodaj zadanie
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
