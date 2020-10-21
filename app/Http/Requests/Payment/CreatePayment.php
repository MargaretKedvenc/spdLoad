<?php

namespace App\Http\Requests\Payment;

use App\Http\Requests\FormRequest;

/**
 * @property string $type
 * @property array $credentials
 */
class CreatePayment extends FormRequest
{
    public function rules(): array
    {
        return [
            'type' => 'required|string|in:paypal,stripe,apple-pay',
//            'credentials' => 'required|array',
//            'credentials.full_name' => 'required|string',
        ];
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getCredentials(): array
    {
        return $this->credentials;
    }
}
