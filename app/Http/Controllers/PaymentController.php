<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feedback\CreateFeedback;
use App\Http\Requests\Payment\CreatePayment;
use App\Services\PaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PaymentController extends Controller
{
    private PaymentService $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        parent::__construct();

        $this->paymentService = $paymentService;
    }

    /**
     * @param CreatePayment $request
     * @return JsonResponse
     */
    public function create(CreatePayment $request): JsonResponse
    {
        $payment = $this->paymentService->create($request->getType(), $request);

        return $this->json($payment->toArray(), Response::HTTP_CREATED);
    }
}
