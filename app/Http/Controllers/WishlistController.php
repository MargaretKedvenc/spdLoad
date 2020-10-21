<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserWishlist;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class WishlistController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        parent::__construct();

        $this->userService = $userService;
    }

    /**
     * @param UpdateUserWishlist $request
     * @return JsonResponse
     */
    public function update(UpdateUserWishlist $request): JsonResponse
    {
        $user = $this->userService->updateWishlist($request);

        return $this->json($user->toArray());
    }
}
