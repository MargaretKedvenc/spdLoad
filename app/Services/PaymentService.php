<?php

namespace App\Services;

use App\Http\Requests\Payment\CreatePayment;

class PaymentService
{
    public function create(string $type, CreatePayment $request)
    {
        // make purchase

        // push event OrderPayed
    }
}
