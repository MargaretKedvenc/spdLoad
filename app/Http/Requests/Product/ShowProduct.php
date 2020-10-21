<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\FormRequest;

/**
 * @property string $id
 */
class ShowProduct extends FormRequest
{
    public function getId(): int
    {
        return (int) $this->id;
    }
}
