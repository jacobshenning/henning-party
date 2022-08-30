@extends('layout')

@section('main')

    {{--  Show game  --}}


        <div class="flex flex-col items-center py-12">
            <h1 class="text-4xl font-bold text-gray-900">{{ $game['name'] }}</h1>
            <p class="max-w-xl mt-5 text-center text-gray-600">
                Select a game to play. Already know what you want? You can use the search as well.
            </p>
        </div>

@endsection
