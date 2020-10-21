<?php


namespace App\Services;


use App\Http\Requests\Order\CreateOrder;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Contracts\Auth\Factory as AuthManager;

class OrderService
{
    private AuthManager $auth;

    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
    }

    public function create(CreateOrder $request): Order
    {
        return Order::create([
            'user_id' => $this->auth->guard()->id(),
            'status_id' => Status::where('name', 'new'),
        ]);
    }

}
