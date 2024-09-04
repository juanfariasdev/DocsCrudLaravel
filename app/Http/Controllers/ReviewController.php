<?php

namespace App\Http\Controllers;

use App\Services\ReviewService;
use Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function startReviewRoute($id_empresa)
    {
        $user = Auth::user();
        $businessId = $this->reviewService->getBusinessId($id_empresa);
        $result = $this->reviewService->startReview($businessId);
        $business = $this->reviewService->getBusiness($businessId);
        return view('review.index', compact('user', 'business'));
    }

    public function startReview($id_empresa)
    {
        $result = $this->reviewService->startReview($id_empresa);

        if (!$result['success']) {
            return response()->json(['message' => $result['message']], 403);
        }

        return response()->json([
            'message' => 'Avaliação iniciada com sucesso.',
            'review' => $result['review']
        ], 201);
    }

    public function storeReview(Request $request, $id_empresa)
    {
        $businessId = $this->reviewService->getBusinessId($id_empresa);
        $result = $this->reviewService->storeReview($request, $businessId);

        if (!$result['success']) {
            return response()->json(['message' => $result['message']], 403);
        }

        return response()->json([
            'message' => 'Avaliação salva com sucesso.',
            'review' => $result['review']
        ], 200);
    }

    public function deleteReview($id)
    {
        $result = $this->reviewService->deleteReview($id);

        return response()->json(['message' => $result['message']], 200);
    }

    public function getReviewsByBusiness($id_empresa)
    {
        $reviews = $this->reviewService->getReviewsByBusiness($id_empresa);

        return response()->json([
            'reviews' => $reviews
        ], 200);
    }

    public function getReviewById($id)
    {
        $review = $this->reviewService->getReviewById($id);

        return response()->json([
            'review' => $review
        ], 200);
    }
}
