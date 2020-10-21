<?php


namespace App\Http\Controllers;


use App\Http\Requests\Order\CreateOrder;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        parent::__construct();

        $this->orderService = $orderService;
    }

    /**
     * @param CreateOrder $request
     * @return JsonResponse
     */
    public function create(CreateOrder $request): JsonResponse
    {
        $feedback = $this->orderService->create($request);

        return $this->json($feedback->toArray(), Response::HTTP_CREATED);
    }
}
