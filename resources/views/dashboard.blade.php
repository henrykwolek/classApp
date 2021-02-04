@extends('layouts.app') @section('content')

<!-- component -->
<div class="container my-12 mx-auto px-4 md:px-12">
    <div class="flex justify-between items-baseline">
        <span class="text-3xl mb-4 px-4 py-4">Zadania domowe</span>
        <span class="px-4">
            <button class="bg-blue-500 hover:bg-blue-700 py-2 text-white font-bold px-4 rounded">
                <a href="{{ route('zadanieAdd') }}">
                    Dodaj nowe zadanie
                </a>
            </button>
        </span>
    </div>
    <div class="flex justify-between items-baseline">
        @if ($message = Session::get('success'))
            <div class="bg-green-500 w-full p-4 rounded-lg mb-4 text-white text-center">
                {{ $message }}
            </div>
        @endif
    </div>

    <div
        class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8"
    >
        <div
            class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-lg"
        >
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-left text-md leading-4 text-blue-500 tracking-wider"
                        >
                            Przedmiot
                        </th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-left text-md leading-4 text-blue-500 tracking-wider"
                        >
                            Zadanie do zrobienia
                        </th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-left text-md leading-4 text-blue-500 tracking-wider"
                        >
                            Dodane przez
                        </th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-left text-md leading-4 text-blue-500 tracking-wider"
                        >
                            Status
                        </th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 text-left text-md leading-4 text-blue-500 tracking-wider"
                        >
                            Dodano
                        </th>
                        <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($homeworks as $homework)
                        <tr>
                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-500"
                            >
                                <div class="text-md leading-5 text-blue-900">
                                    {{ $homework->przedmiot }}
                                </div>
                            </td>
                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-md leading-5"
                            >
                                {{ $homework->tytul }}
                            </td>
                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-md leading-5"
                            >
                                {{ $homework->user->name }}
                            </td>
                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-md leading-5"
                            >
                                @if ((strtotime($homework->termin) - time()) / (60 * 60 * 24) > 7)
                                    <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-sm font-bold leading-none text-white bg-green-500 rounded-full">Więcej niż 7 dni</span>
                                @elseif ((strtotime($homework->termin) - time()) / (60 * 60 * 24) <= 7 && (strtotime($homework->termin) - time()) / (60 * 60 * 24) > 2)
                                    <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-sm font-bold leading-none text-white bg-blue-500 rounded-full">Następne 7 dni</span>
                                @elseif ((strtotime($homework->termin) - time()) / (60 * 60 * 24) <= 2 && (strtotime($homework->termin) - time()) / (60 * 60 * 24) > 1)
                                    <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-sm font-bold leading-none text-white bg-yellow-500 rounded-full">Pojutrze</span>
                                @elseif ((strtotime($homework->termin) - time()) / (60 * 60 * 24) < 1 && (strtotime($homework->termin) - time()) / (60 * 60 * 24) > 0)
                                    <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-sm font-bold leading-none text-white bg-red-500 rounded-full">Jutro</span>
                                @else
                                    <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-sm font-bold leading-none text-white bg-gray-500 rounded-full">Po terminie</span>
                                @endif
                            </td>
                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-900 text-md leading-5"
                            >
                                {{ $homework->created_at->diffForHumans() }}
                            </td>
                            <td
                                class="px-2 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-md leading-5"
                            >
                                <button
                                    class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none"
                                >
                                    Więcej informacji
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div
                class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 pb-2 work-sans"
            >
                <div class="px-8">
                    {{ $homeworks->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="flex flex-wrap -mx-1 lg:-mx-4">
    {{--
    <!-- Column -->
    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
        <!-- Article -->
        <article class="overflow-hidden rounded-lg shadow-lg">
            <a href="#">
                <img
                    alt="Placeholder"
                    class="block h-auto w-full"
                    src="https://picsum.photos/600/400/?random"
                />
            </a>

            <header
                class="flex items-center justify-between leading-tight p-2 md:p-4"
            >
                <h1 class="text-lg">
                    <a class="no-underline hover:underline text-black" href="#">
                        Article Title
                    </a>
                </h1>
                <p class="text-grey-darker text-md">14/4/19</p>
            </header>

            <footer
                class="flex items-center justify-between leading-none p-2 md:p-4"
            >
                <a
                    class="flex items-center no-underline hover:underline text-black"
                    href="#"
                >
                    <img
                        alt="Placeholder"
                        class="block rounded-full"
                        src="https://picsum.photos/32/32/?random"
                    />
                    <p class="ml-2 text-md">Author Name</p>
                </a>
                <a
                    class="no-underline text-grey-darker hover:text-red-dark"
                    href="#"
                >
                    <span class="hidden">Like</span>
                    <i class="fa fa-heart"></i>
                </a>
            </footer>
        </article>
        <!-- END Article -->
    </div>
    <!-- END Column -->

    <!-- Column -->
    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
        <!-- Article -->
        <article class="overflow-hidden rounded-lg shadow-lg">
            <a href="#">
                <img
                    alt="Placeholder"
                    class="block h-auto w-full"
                    src="https://picsum.photos/600/400/?random"
                />
            </a>

            <header
                class="flex items-center justify-between leading-tight p-2 md:p-4"
            >
                <h1 class="text-lg">
                    <a class="no-underline hover:underline text-black" href="#">
                        Article Title
                    </a>
                </h1>
                <p class="text-grey-darker text-md">14/4/19</p>
            </header>

            <footer
                class="flex items-center justify-between leading-none p-2 md:p-4"
            >
                <a
                    class="flex items-center no-underline hover:underline text-black"
                    href="#"
                >
                    <img
                        alt="Placeholder"
                        class="block rounded-full"
                        src="https://picsum.photos/32/32/?random"
                    />
                    <p class="ml-2 text-md">Author Name</p>
                </a>
                <a
                    class="no-underline text-grey-darker hover:text-red-dark"
                    href="#"
                >
                    <span class="hidden">Like</span>
                    <i class="fa fa-heart"></i>
                </a>
            </footer>
        </article>
        <!-- END Article -->
    </div>
    <!-- END Column -->

    <!-- Column -->
    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
        <!-- Article -->
        <article class="overflow-hidden rounded-lg shadow-lg">
            <a href="#">
                <img
                    alt="Placeholder"
                    class="block h-auto w-full"
                    src="https://picsum.photos/600/400/?random"
                />
            </a>

            <header
                class="flex items-center justify-between leading-tight p-2 md:p-4"
            >
                <h1 class="text-lg">
                    <a class="no-underline hover:underline text-black" href="#">
                        Article Title
                    </a>
                </h1>
                <p class="text-grey-darker text-md">14/4/19</p>
            </header>

            <footer
                class="flex items-center justify-between leading-none p-2 md:p-4"
            >
                <a
                    class="flex items-center no-underline hover:underline text-black"
                    href="#"
                >
                    <img
                        alt="Placeholder"
                        class="block rounded-full"
                        src="https://picsum.photos/32/32/?random"
                    />
                    <p class="ml-2 text-md">Author Name</p>
                </a>
                <a
                    class="no-underline text-grey-darker hover:text-red-dark"
                    href="#"
                >
                    <span class="hidden">Like</span>
                    <i class="fa fa-heart"></i>
                </a>
            </footer>
        </article>
        <!-- END Article -->
    </div>
    <!-- END Column -->

    <!-- Column -->
    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
        <!-- Article -->
        <article class="overflow-hidden rounded-lg shadow-lg">
            <a href="#">
                <img
                    alt="Placeholder"
                    class="block h-auto w-full"
                    src="https://picsum.photos/600/400/?random"
                />
            </a>

            <header
                class="flex items-center justify-between leading-tight p-2 md:p-4"
            >
                <h1 class="text-lg">
                    <a class="no-underline hover:underline text-black" href="#">
                        Article Title
                    </a>
                </h1>
                <p class="text-grey-darker text-md">14/4/19</p>
            </header>

            <footer
                class="flex items-center justify-between leading-none p-2 md:p-4"
            >
                <a
                    class="flex items-center no-underline hover:underline text-black"
                    href="#"
                >
                    <img
                        alt="Placeholder"
                        class="block rounded-full"
                        src="https://picsum.photos/32/32/?random"
                    />
                    <p class="ml-2 text-md">Author Name</p>
                </a>
                <a
                    class="no-underline text-grey-darker hover:text-red-dark"
                    href="#"
                >
                    <span class="hidden">Like</span>
                    <i class="fa fa-heart"></i>
                </a>
            </footer>
        </article>
        <!-- END Article -->
    </div>
    <!-- END Column -->

    <!-- Column -->
    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
        <!-- Article -->
        <article class="overflow-hidden rounded-lg shadow-lg">
            <a href="#">
                <img
                    alt="Placeholder"
                    class="block h-auto w-full"
                    src="https://picsum.photos/600/400/?random"
                />
            </a>

            <header
                class="flex items-center justify-between leading-tight p-2 md:p-4"
            >
                <h1 class="text-lg">
                    <a class="no-underline hover:underline text-black" href="#">
                        Article Title
                    </a>
                </h1>
                <p class="text-grey-darker text-md">14/4/19</p>
            </header>

            <footer
                class="flex items-center justify-between leading-none p-2 md:p-4"
            >
                <a
                    class="flex items-center no-underline hover:underline text-black"
                    href="#"
                >
                    <img
                        alt="Placeholder"
                        class="block rounded-full"
                        src="https://picsum.photos/32/32/?random"
                    />
                    <p class="ml-2 text-md">Author Name</p>
                </a>
                <a
                    class="no-underline text-grey-darker hover:text-red-dark"
                    href="#"
                >
                    <span class="hidden">Like</span>
                    <i class="fa fa-heart"></i>
                </a>
            </footer>
        </article>
        <!-- END Article -->
    </div>
    <!-- END Column -->

    <!-- Column -->
    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
        <!-- Article -->
        <article class="overflow-hidden rounded-lg shadow-lg">
            <a href="#">
                <img
                    alt="Placeholder"
                    class="block h-auto w-full"
                    src="https://picsum.photos/600/400/?random"
                />
            </a>

            <header
                class="flex items-center justify-between leading-tight p-2 md:p-4"
            >
                <h1 class="text-lg">
                    <a class="no-underline hover:underline text-black" href="#">
                        Article Title
                    </a>
                </h1>
                <p class="text-grey-darker text-md">14/4/19</p>
            </header>

            <footer
                class="flex items-center justify-between leading-none p-2 md:p-4"
            >
                <a
                    class="flex items-center no-underline hover:underline text-black"
                    href="#"
                >
                    <img
                        alt="Placeholder"
                        class="block rounded-full"
                        src="https://picsum.photos/32/32/?random"
                    />
                    <p class="ml-2 text-md">Author Name</p>
                </a>
                <a
                    class="no-underline text-grey-darker hover:text-red-dark"
                    href="#"
                >
                    <span class="hidden">Like</span>
                    <i class="fa fa-heart"></i>
                </a>
            </footer>
        </article>
        <!-- END Article -->
    </div>
    <!-- END Column -->
    --}}

    <!-- component -->
</div>
@endsection
