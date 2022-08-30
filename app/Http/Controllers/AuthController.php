<?php

namespace App\Http\Controllers;


use App\Http\Requests\PostLogin;
use App\Http\Requests\PostRegister;
use App\Repos\UserRepo;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthController extends Controller
{

    public function __construct()
    {
//        $this->middleware('throttle:60,1')');
    }

    /**
     * @return bool
     */
    public function broadcasting(): bool
    {
        return Broadcast::auth(request());
    }

    /**
     * Return login form
     *
     * @return View
     */
    public function login(): View
    {
        return view('auth.login');
    }

    /**
     * Return register form
     *
     * @return View
     */
    public function register(): View
    {
        return view('auth.register');
    }

    /**
     * Process login form
     *
     * @param PostLogin $request
     * @return RedirectResponse
     */
    public function postLogin(PostLogin $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            return redirect(route('dashboard.home'));
        }

        return back()->withErrors([
            'password' => 'Incorrect email or password'
        ]);
    }

    /**
     * Process register form
     *
     * @param PostRegister $request
     * @return RedirectResponse
     */
    public function postRegister(PostRegister $request): RedirectResponse
    {
        $potential_user = $request->validated();

        $userRepo = new UserRepo();

        if (! $userRepo->get($potential_user['email'])) {

            $userRepo->create($potential_user);

            return redirect(route('dashboard.home'));
        }

        return back()->withErrors([
            'email' => 'An account with this email already exists.'
        ]);
    }

    /**
     * Logout user
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect(route('auth.login'));
    }



}
