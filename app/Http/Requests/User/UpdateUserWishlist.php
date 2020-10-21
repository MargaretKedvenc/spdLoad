<?php

namespace App\Http\Requests\User;

use App\Http\Requests\FormRequest;

/**
 * @property int[] $wished_products
 */
class UpdateUserWishlist extends FormRequest
{
    public function rules(): array
    {
        return [
            'wished_products' => 'required|array',
            'wished_products.*' => 'required|integer|exists:products,id',
        ];
    }

    public function getWishedProducts(): array
    {
        return $this->wished_products;
    }
}
