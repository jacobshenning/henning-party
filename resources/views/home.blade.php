@extends('layout')

@section('main')

    <div x-data="{ sortBy: 'null', categories: [], players: [] }">

        <div class="flex flex-col items-center py-12">
            <h1 class="text-4xl font-bold text-gray-900">Party Time</h1>
            <p class="max-w-xl mt-5 text-center text-gray-600">
                Select a game to play. Already know what you want? You can use the search as well.
            </p>
        </div>


        <div  class="border-t border-gray-300 py-3 flex items-center">

            <div x-data="{ sortBySelect: false }" @click.away="sortBySelect = false" class="relative whitespace-nowrap mr-5">
                <a href="#toggle" @click.prevent="sortBySelect = !sortBySelect">Sort By:</a>

                <div x-show="sortBySelect" class="origin-top-left absolute left-0 z-10 mt-2 w-40 rounded-md shadow-2xl bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="mobile-menu-button" tabindex="-1">
                    <div class="py-1" role="none">
                        <a href="#" @click.prevent="sortBy = 'players'; sortBySelect = false;" class="block px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50" role="menuitem" tabindex="-1" id="mobile-menu-item-0">Players</a>
                        <a href="#" @click.prevent="sortBy = 'category'; sortBySelect = false;" class="block px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50" role="menuitem" tabindex="-1" id="mobile-menu-item-1">Category</a>
                    </div>
                </div>
            </div>

            <div class="mx-auto"></div>

            <div x-data="{ categoryCheckboxes: false }" @click.away="categoryCheckboxes = false" class="relative whitespace-nowrap mr-5">
                <a href="#toggle" @click.prevent="categoryCheckboxes = !categoryCheckboxes">Categories:</a>

                <div class="absolute right-0 bg-white pl-4 pr-5 py-3 space-y-3 rounded shadow"  x-show="categoryCheckboxes">
                    <div class="flex items-center">
                        <input x-model="categories" value="paint" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                        <label for="filter-mobile-color-0" class="ml-3 text-sm text-gray-500">Paint</label>
                    </div>

                    <div class="flex items-center">
                        <input x-model="categories" value="rp" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                        <label for="filter-mobile-color-1" class="ml-3 text-sm text-gray-500">Role-Playing</label>
                    </div>

                    <div class="flex items-center">
                        <input x-model="categories" value="presentation" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                        <label for="filter-mobile-color-2" class="ml-3 text-sm text-gray-500">Presentation</label>
                    </div>
                </div>
            </div>

            <div x-data="{ playerCheckboxes: false }" @click.away="playerCheckboxes = false" class="relative whitespace-nowrap">
                <a href="#toggle" @click.prevent="playerCheckboxes = !playerCheckboxes">Players:</a>

                <div class="absolute right-0 bg-white pl-4 pr-5 py-3 space-y-3 rounded shadow"  x-show="playerCheckboxes">
                    <div class="flex items-center">
                        <input x-model="players" value="2-4" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                        <label for="filter-mobile-color-0" class="ml-3 text-sm text-gray-500"> 2 - 4</label>
                    </div>

                    <div class="flex items-center">
                        <input x-model="players" value="4-6" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                        <label for="filter-mobile-color-1" class="ml-3 text-sm text-gray-500"> 4 - 6 </label>
                    </div>

                    <div class="flex items-center">
                        <input x-model="players" value="6-8" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                        <label for="filter-mobile-color-2" class="ml-3 text-sm text-gray-500"> 6 - 8 </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap justify-between -mx-10">
            <article class="md:w-1/4 bg-white px-5 pt-7 pb-3 shadow mx-10 mb-12 rounded">
                <span class="text-green-800 bg-green-100 rounded-full text-xs -mx-1 px-3 py-1">Category</span>
                <h3 class="font-bold mb-3 mt-2 text-gray-900 text-xl">Game Option 1</h3>
                <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut iaculis consequat sapien, bibendum consectetur sapien facilisis vitae. Quisque feugiat quam id molestie molestie. Phasellus tempor eu massa vel ultricies. Donec eleifend, dui.</p>
                <a href="#" class="block font-bold text-indigo-600 border-t mt-5 pt-3 items-center flex">
                    <div class="mx-auto"></div>
                    <span class="pr-1 text-lg">Play Game</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </article>

            <article class="md:w-1/4 bg-white px-5 pt-7 pb-3 shadow mx-10 mb-12 rounded">
                <span class="text-red-800 bg-red-100 rounded-full text-xs -mx-1 px-3 py-1">Category</span>
                <h3 class="font-bold mb-3 mt-2 text-gray-900 text-xl">Game Option 2</h3>
                <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut iaculis consequat sapien, bibendum consectetur sapien facilisis vitae. Quisque feugiat quam id molestie molestie. Phasellus tempor eu massa vel ultricies. Donec eleifend, dui.</p>
                <a href="#" class="block font-bold text-indigo-600 border-t mt-5 pt-3 items-center flex">
                    <div class="mx-auto"></div>
                    <span class="pr-1 text-lg">Play Game</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </article>

            <article class="md:w-1/4 bg-white px-5 pt-7 pb-3 shadow mx-10 mb-12 rounded">
                <span class="text-blue-800 bg-blue-100 rounded-full text-xs -mx-1 px-3 py-1">Category</span>
                <h3 class="font-bold mb-3 mt-2 text-gray-900 text-xl">Game Option 3</h3>
                <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut iaculis consequat sapien, bibendum consectetur sapien facilisis vitae. Quisque feugiat quam id molestie molestie. Phasellus tempor eu massa vel ultricies. Donec eleifend, dui.</p>
                <a href="#" class="block font-bold text-indigo-600 border-t mt-5 pt-3 items-center flex">
                    <div class="mx-auto"></div>
                    <span class="pr-1 text-lg">Play Game</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </article>

            <article class="md:w-1/4 bg-white px-5 pt-7 pb-3 shadow mx-10 mb-12 rounded">
                <span class="text-teal-800 bg-teal-100 rounded-full text-xs -mx-1 px-3 py-1">Category</span>
                <h3 class="font-bold mb-3 mt-2 text-gray-900 text-xl">Game Option 4</h3>
                <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut iaculis consequat sapien, bibendum consectetur sapien facilisis vitae. Quisque feugiat quam id molestie molestie. Phasellus tempor eu massa vel ultricies. Donec eleifend, dui.</p>
                <a href="#" class="block font-bold text-indigo-600 border-t mt-5 pt-3 items-center flex">
                    <div class="mx-auto"></div>
                    <span class="pr-1 text-lg">Play Game</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </article>
        </div>

    </div>

@endsection

