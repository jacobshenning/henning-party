<?php

use App\Models\User;
use App\Repos\UserRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

//use Predis\Command\Redis\AUTH;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    if (! Auth::check()) {
        return redirect('/login');
    }

    return view('home');
});

Route::get('/logout', function () {
    Auth::logout();

    return redirect('/');
});

Route::get('/login', function() {
    if (Auth::check()) {
        return redirect('/');
    }

    return view('auth.login');
});

Route::post('/login', function() {
    $credentials = request()->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (!Auth::attempt($credentials)) {
        return back()->withErrors([
            'message' => 'Invalid credentials.'
        ]);
    }
    return redirect('/');
});

Route::get('/register', function() {
    if (Auth::check()) {
        return redirect('/');
    }

    return view('auth.register');
});

Route::post('/register', function() {
    $data = request()->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed'
    ]);

    $userRepo = new UserRepo();

    $userRepo->create($data);

    return redirect('/');
});
