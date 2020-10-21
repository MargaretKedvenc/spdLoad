<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\FormRequest;

/**
 * @property string $name
 * @property string $description
 * @property string|null $logo_url
 * @property string|null $price_id
 */
class CreateProduct extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:products,name',
            'description' => 'required|string',
            'logo_url' => 'nullable|string|url|max:255',
            'price_id' => 'nullable|integer',
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getLogoUrl(): string
    {
        return $this->logo_url;
    }

    public function getPriceId(): string
    {
        return $this->price_id;
    }
}
