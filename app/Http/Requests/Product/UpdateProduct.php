<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\FormRequest;

/**
 * @property string $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $logo_url
 * @property int|null $price_id
 */
class UpdateProduct extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'nullable|string|max:255|unique:products,name,id,' . $this->getId(),
            'description' => 'nullable|string',
            'logo_url' => 'nullable|string|url|max:255',
            'price_id' => 'nullable|integer',
        ];
    }

    public function getId(): int
    {
        return (int) $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getLogoUrl(): ?string
    {
        return $this->logo_url;
    }

    public function getPriceId(): ?int
    {
        return $this->price_id;
    }
}
