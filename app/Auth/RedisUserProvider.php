<?php

namespace App\Auth;

use App\Auth\User as GenericUser;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Redis;

class RedisUserProvider implements UserProvider
{
    /**
     * Retrieve a user by their unique identifier.
     *
     * @param $user_id
     * @return GenericUser|null
     */
    public function retrieveById($user_id): ?GenericUser
    {
        $user = Redis::get('user:'.$user_id);
        if (empty($user)) {
            return null;
        }
        return new GenericUser((array) json_decode($user));
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param $identifier
     * @param $token
     * @return GenericUser|null
     */
    public function retrieveByToken($identifier, $token): ?GenericUser
    {
        $user_id = Redis::get('user_remember_token:'.$identifier);
        if (empty($user_id)) {
            return null;
        }

        $user = Redis::get('user:'.$user_id);
        if (empty($user)) {
            return null;
        }

        return new GenericUser((array) json_decode($user));
    }

    /**
     * @param Authenticatable $user
     * @param $token
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        Redis::set('user_remember_token:' . $user->getAuthIdentifier(), $token);
    }

    /**
     * @param array $credentials
     * @return Authenticatable $user|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        if (! array_key_exists('email', $credentials)) {
            return null;
        }

        $user_id = Redis::get('user_email:'.$credentials['email']);
        if (empty($user_id)) {
            return null;
        }

        $user = Redis::get('user:'.$user_id);
        if (empty($user)) {
            return null;
        }

        return new GenericUser((array) json_decode($user));
    }

    /**
     *
     * @param Authenticatable $user
     * @param array $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        if (! array_key_exists('password', $credentials)) {
            return false;
        }

        return $credentials['password'] === $user->getAuthPassword();
    }

}
