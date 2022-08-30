<?php

namespace App\Auth;

use App\Models\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;

class User extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;

    /**
     * @return string
     */
    public function getAuthIdentifierName(): string
    {
        return 'id';
    }

    /**
     * @return mixed
     */
    public function getAuthIdentifier(): mixed
    {
        $identifier = $this->getAuthIdentifierName();

        return $this->$identifier;
    }

    /**
     * @return string|null
     */
    public function getAuthPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @return mixed|string
     */
    public function getRememberToken(): mixed
    {
        $remember_token_name = $this->getRememberTokenName();

        return $this->$remember_token_name;
    }

    /**
     * @param $value
     * @return void
     */
    public function setRememberToken($value): void
    {
        $remember_token_name = $this->getRememberTokenName();

        $this->$remember_token_name = $value;
    }

    /**
     * @return string
     */
    public function getRememberTokenName(): string
    {
        return 'remember_token';
    }
}
