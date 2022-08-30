<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{

    /**
     * Get the dashboard home view.
     *
     * @return View
     */
    public function home(): View
    {
        $games = config('games');

        return view('dashboard.home', compact('games'));
    }


    /**
     * Start a game.
     *
     * @param string $game
     * @return View
     */
    public function startGame(string $game): View
    {
        $game = config('games.' . $game);

        return view('dashboard.start', compact('game'));
    }
}
