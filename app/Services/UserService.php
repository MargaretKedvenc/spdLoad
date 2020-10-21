<?php

namespace App\Services;

use App\Http\Requests\User\UpdateUserWishlist;
use App\Models\User;
use Illuminate\Contracts\Auth\Factory as AuthManager;

class UserService
{
    private AuthManager $auth;

    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
    }

    public function updateWishlist(UpdateUserWishlist $request): User
    {
        /** @var User $user */
        $user = $this->auth->guard()->user();

        $user->wishedProducts()->sync($request->getWishedProducts());

        return $user;
    }
}
