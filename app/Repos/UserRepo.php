<?php

namespace App\Repos;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class UserRepo
{
    /**
     * @var string
     */
    protected $key = 'user';

    /**
     * @return array
     */
    protected $indexes = [
        'email',
        'remember_token',
        'api_token'
    ];

    /**
     * Get all users
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        $keys = Redis::keys($this->key . ':' . '*');

        $users = collect();

        foreach ($keys as $key) {
            $data = json_decode(Redis::get($key));
            $users->push(new User($data));
        }

        return $users;
    }

    public function get($email) {
        $user_id = Redis::get($this->key . '_email:' . $email);
        if (empty($user_id)) {
            return null;
        }
        $user = Redis::get($this->key . ':' . $user_id);
        if (empty($user)) {
            return null;
        }
        return new User((array) json_decode($user));
    }

    public function getBy($key, $value) {
        if (! in_array($key, $this->indexes)) {
            return null;
        }

        $user_id = Redis::get($this->key . '_' . $key . ':' . $value);
        if (empty($user_id)) {
            return null;
        }
        $user = Redis::get($this->key . ':' . $user_id);
        if (empty($user)) {
            return null;
        }
        return new User((array) json_decode($user));
    }

    /**
     * Create a new user
     *
     * @param $data
     * @return void
     */
    public function create($data)
    {
        $data['id'] = Str::random('64');
        $data['remember_token'] = Str::random('64');
        $data['api_token'] = Str::random('64');

        $user = new User($data);
        $key = $this->key . ':' . $user->id;
        Redis::set($key, json_encode($data));
        foreach ($this->indexes as $index) {
            Redis::set($this->key . '_' . $index . ':' . $user->{$index}, $user->id);
        }
    }
}
