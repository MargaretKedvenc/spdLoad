<?php

namespace App\Services;

use App\Http\Requests\Feedback\CreateFeedback;
use App\Models\Feedback;
use Illuminate\Contracts\Auth\Factory as AuthManager;

class FeedbackService
{
    private AuthManager $auth;

    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
    }

    public function create(CreateFeedback $request): Feedback
    {
        return Feedback::create([
            'user_id' => $this->auth->guard()->id(),
            'product_id' => $request->getProductId(),
            'comment' => $request->getComment(),
        ]);
    }

    public function getList(array $filters): array
    {
        $query = Feedback::query();

        if (isset($filters['product_id'])) {
            $query->where('product_id', $filters['product_id']);
        }

        return $query->get()->all();
    }

    public function like(int $id): Feedback
    {
        $feedback = Feedback::with('likes')->find($id);

        $feedback->likes()->attach($this->auth->guard()->id());

        return $feedback;
    }

    public function unlike(int $id): Feedback
    {
        $feedback = Feedback::with('likes')->find($id);

        $feedback->likes()->detach($this->auth->guard()->id());

        return $feedback;
    }
}
