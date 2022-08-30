<?php

namespace App\Http\Middleware;

use Closure;
use App\Repos\UserRepo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateViaToken
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userRepo = new UserRepo();

        $user = $userRepo->getBy('api_token', $request->header('API-TOKEN'));

        if (empty($user)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        Auth::login($user);

        return $next($request);
    }
}
