<?php

namespace App\Services;

use App\Models\NpsReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReviewService
{
    public function startReview($businessId)
    {
        $alreadyStarted = NpsReview::where('user_id', Auth::id())
            ->where('business_id', $businessId)
            ->whereNull('rating') // Só pega a avaliação se ainda não foi concluída
            ->first();

        if ($alreadyStarted) {
            return response()->json(['message' => 'Você já iniciou uma avaliação para este local.'], 403);
        }

        return NpsReview::create([
            'user_id' => Auth::id(),
            'business_id' => $businessId,
            'started_at' => Carbon::now(),
        ]);
    }

    public function storeReview(Request $request, $businessId)
    {
        $this->validateReviewData($request);

        $review = NpsReview::where('user_id', Auth::id())
            ->where('business_id', $businessId)
            ->whereNull('rating') // Avaliação ainda não concluída
            ->first();

        if (!$review) {
            return response()->json(['message' => 'Avaliação não iniciada ou já concluída.'], 403);
        }

        if (Carbon::now()->diffInMinutes($review->started_at) > 10) {
            return response()->json(['message' => 'Tempo limite para completar a avaliação expirou.'], 403);
        }

        if ($this->isOutsideAllowedArea($request->input('latitude'), $request->input('longitude'), $review->business)) {
            return response()->json(['message' => 'Você está fora da área permitida para avaliação.'], 403);
        }

        DB::transaction(function () use ($request, $review) {
            $review->update([
                'rating' => $request->input('rating'),
                'feedback' => $request->input('feedback'),
            ]);
        });

        return $review;
    }

    private function validateReviewData(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'feedback' => 'nullable|string'
        ]);
    }

    private function isOutsideAllowedArea($userLat, $userLng, $business)
    {
        $distance = $this->calculateDistance($userLat, $userLng, $business->latitude, $business->longitude);
        return $distance > 0.1; // 0.1 km = 100 metros
    }

    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371; // Raio da Terra em km

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return $earthRadius * $c; // Distância em km
    }

    public function deleteReview($reviewId)
    {
        $review = NpsReview::findOrFail($reviewId);

        DB::transaction(function () use ($review) {
            $review->delete();
        });

        return true;
    }

    public function getReviewsByBusiness($businessId)
    {
        return NpsReview::where('business_id', $businessId)->get();
    }

    public function getReviewById($id)
    {
        return NpsReview::findOrFail($id);
    }
}
