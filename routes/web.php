<?php

use App\Events\TestEvent;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PartyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Redis;
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

//  Auth routes
Route::controller(AuthController::class)
        ->name('auth.')
        ->group(function () {

    //  Broadcast auth
    Route::middleware('auth.token')->match(['get', 'head', 'post'], 'broadcasting', 'broadcasting')->name('broadcasting.auth');

    //  Login
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');

    // Register
    Route::post('/login', 'postLogin')->name('postLogin');
    Route::post('/register', 'postRegister')->name('postRegister');

    // Logout
    Route::get('/logout', 'logout')->name('logout');
});

//  Dashboard routes
Route::controller(DashboardController::class)
        ->name('dashboard.')
        ->middleware('auth')
        ->group(function () {

    //  Home
    Route::get('/', 'home')->name('home');

    //  Start Game
    Route::get('/{game}/start', 'startGame')->name('start-game');


});

//  Party routes
Route::controller(PartyController::class)
        ->name('party.')
        ->group(function () {

});




Route::middleware(['user'])->get('/test_auth', function (Request $request) {

    $user = $request->user()->toArray();

    return response()->json([
        'session_id' => $request->session()->getId(),
        'user' => request()->user(),
        'user_2' => Auth::user(),
        'user_3' => $request->user(),
        'user_4' => auth()->user(),
        'user_5' => $user,
        'test' => session()->get("Test"),
        'auth' => Auth::check(),
    ]);
});








Route::get('/broadcast', function () {

    broadcast(new TestEvent());

    return 'Broadcasted';

});

Route::get('/join', function() {

    if (Auth::check()) {
        echo Auth::user()->name;
    }

    if (session()->has('player_id')) {
        echo "You already joined";
        return session()->get('player_id');
    }

    session()->put('player_id', Str::random('32'));

    return session()->get('player_id');
});

Route::get('/flushall', function() {
    Redis::flushall();

    return redirect(route('auth.register'));
});


Route::get('/debug', function() {
    $keys = Redis::keys('*');

    echo '<pre>';

    foreach($keys as $key) {
        echo  $key . " = " . Redis::get($key) . "<br><br>\n";
    }

    echo '</pre>';

    echo '<a href="' . route('dashboard.home') . '">Home</a>';
});


//Route::get('/', function () {
//    if (! Auth::check()) {
//        return redirect('/login');
//    }
//
//    return view('home');
//});
////
//Route::get('/logout', function () {
//    Auth::logout();
//
//    return redirect('/');
//});
//
//Route::get('/login', function() {
//    if (Auth::check()) {
//        return redirect('/');
//    }
//
//    return view('auth.login');
//});
//
//Route::post('/login', function() {
//    $credentials = request()->validate([
//        'email' => 'required|email',
//        'password' => 'required'
//    ]);
//
//    if (!Auth::attempt($credentials)) {
//        return back()->withErrors([
//            'message' => 'Invalid credentials.'
//        ]);
//    }
//    return redirect('/');
//});
//
//Route::get('/register', function() {
//    if (Auth::check()) {
//        return redirect('/');
//    }
//
//    return view('auth.register');
//});
//
//Route::post('/register', function() {
//    $data = request()->validate([
//        'name' => 'required',
//        'email' => 'required|email',
//        'password' => 'required|confirmed'
//    ]);
//
//    $userRepo = new UserRepo();
//
//    $userRepo->create($data);
//
//    return redirect('/');
//});
