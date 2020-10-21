<?php

namespace App\Services;

use App\Http\Requests\Product\CreateProduct;
use App\Http\Requests\Product\UpdateProduct;
use App\Models\Product;
use Illuminate\Contracts\Auth\Factory as AuthManager;
use Illuminate\Database\Eloquent\Builder;

class ProductService
{
    private AuthManager $auth;

    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
    }

    public function create(CreateProduct $request): Product
    {
        return Product::create([
            'name' => $request->getName(),
            'description' => $request->getDescription(),
            'logo_url' => $request->getLogoUrl(),
            'price_id' => $request->getPriceId(),
        ]);
    }

    public function getList(?array $filters = []): array
    {
        $query = Product::query();

        if (isset($filters['name'])) {
            $query->where('name', 'LIKE', "%{$filters['name']}%");
        }

        if (isset($filters['price_from'])) {
            $query->where('price', '<=', $filters['price_from']);
        }

        if (isset($filters['price_to'])) {
            $query->where('price', '>=', $filters['price_to']);
        }

        if (isset($filters['wished'])) {
            $query->whereHas('wishedUsers', function (Builder $query) {
                $query->where('id', $this->auth->guard()->id());
            });
        }

        return $query->get()->all();
    }

    public function getById(int $id): Product
    {
        return Product::where('id', $id)->firstOrFail();
    }

    public function delete(int $id): void
    {
        Product::where('id', $id)->delete();
    }

    public function update(int $id, UpdateProduct $data): Product
    {
        $attributesToUpdate = [];

        if ($data->getName()) {
            $attributesToUpdate['name'] = $data->getName();
        }

        if ($data->getLogoUrl()) {
            $attributesToUpdate['logo_url'] = $data->getLogoUrl();
        }

        if ($data->getDescription()) {
            $attributesToUpdate['description'] = $data->getDescription();
        }

        if ($data->getPriceId()) {
            $attributesToUpdate['price_id'] = $data->getPriceId();
        }

        $product = Product::where('id', $id)->firstOrFail();

        $product->update($attributesToUpdate);

        return $product;
    }
}
