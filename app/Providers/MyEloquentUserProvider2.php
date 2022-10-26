<?php
/*
namespace App\Providers;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class MyEloquentUserProvider2 extends EloquentUserProvider
{
    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     s
    public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['pwd'];
        $hashed_value = $user->getAuthPassword();
        return $hashed_value == md5($plain);
    }
}*/