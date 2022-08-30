<?php

namespace App\Broadcasting;

class PartyChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param $game
     * @param $id
     * @return bool
     */
    public function join($game, $id): bool
    {
        return true;
    }
}
