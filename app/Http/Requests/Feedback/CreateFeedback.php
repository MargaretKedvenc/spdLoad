<?php

namespace App\Http\Requests\Feedback;

use App\Http\Requests\FormRequest;

/**
 * @property int $product_id
 * @property string $comment
 */
class CreateFeedback extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_id' => 'required|integer|exists:products,id',
            'comment' => 'required|string|min:10',
        ];
    }

    public function getProductId(): int
    {
        return $this->product_id;
    }

    public function getComment(): string
    {
        return $this->comment;
    }
}
