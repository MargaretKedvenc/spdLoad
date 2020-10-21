<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feedback\CreateFeedback;
use App\Http\Requests\Feedback\FeedbackList;
use App\Http\Requests\Feedback\LikeFeedback;
use App\Http\Requests\Feedback\UnlikeFeedback;
use App\Services\FeedbackService;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class FeedbackController extends Controller
{
    private FeedbackService $feedbackService;

    public function __construct(FeedbackService $feedbackService)
    {
        parent::__construct();

        $this->feedbackService = $feedbackService;
    }

    /**
     * @param FeedbackList $request
     * @return JsonResponse
     */
    public function index(FeedbackList $request): JsonResponse
    {
        $feedbackList = $this->feedbackService->getList($request->all());

        return $this->json($feedbackList);
    }

    /**
     * @param CreateFeedback $request
     * @return JsonResponse
     */
    public function create(CreateFeedback $request): JsonResponse
    {
        $feedback = $this->feedbackService->create($request);

        return $this->json($feedback->toArray(), Response::HTTP_CREATED);
    }

    /**
     * @param LikeFeedback $request
     * @return JsonResponse
     */
    public function like(LikeFeedback $request): JsonResponse
    {
        try {
            $feedback = $this->feedbackService->like($request->getId());

            return $this->json($feedback);
        } catch (QueryException $e) { // TODO: create and use custom NotUniqueException
            return $this->json(['message' => 'You already like it.'], JsonResponse::HTTP_NOT_ACCEPTABLE);
        }
    }

    /**
     * @param UnlikeFeedback $request
     * @return JsonResponse
     */
    public function unlike(UnlikeFeedback $request): JsonResponse
    {
        $feedback = $this->feedbackService->unlike($request->getId());

        return $this->json($feedback);
    }
}
