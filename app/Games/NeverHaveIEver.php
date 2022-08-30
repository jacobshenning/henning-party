<?php

namespace App\Games;

class NeverHaveIEver extends Game {

    /**
     * @var string
     */
    public string $name = "Never Have I Ever";

    /**
     * @var string
     */
    public string $id = "never-have-i-ever";

    /**
     * @var string|null
     */
    public ?string $room_id = null;

    /**
     * @var array
     */
    public array $players = [];

    /**
     *
     */
    public static function details(): array
    {
        return [
            'name' => 'Never Have I Ever',
            'id' => 'never-have-i-ever',
            'class' => NeverHaveIEver::class,
            'description' => 'Never Have I Ever is a drinking game where players take turns saying things they have never done, and if anyone else at the table has done it, they have to drink.',
            'category' => 'contest',
            'category_color' => 'red',
            'players_min' => 2,
            'players_max' => 16,
        ];
    }




}
