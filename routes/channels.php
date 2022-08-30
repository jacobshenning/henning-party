<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use App\Broadcasting\PartyChannel;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

//Broadcast::channel('presence-game.party.id', function() {
//    if (Auth::check() ) {
//        return [
//            'id' => Auth::user()->id,
//            'name' => Auth::user()->name,
//        ];
//    }
//});

Broadcast::channel('{game}.party.{id}', function() {
    Log::info(request()->user());

    return [
        'id' => 1,
        'name' => 'test',
    ];


    if (! Auth::check()) {
        return false;
    }

    return Auth::user();
});

Broadcast::channel('test', function(User $user) {
    return request()->user()->id;
});

//Broadcast::channel('*', function() {
//    return true;
//});

