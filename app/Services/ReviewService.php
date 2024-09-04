<?php

namespace App\Services;

use App\Models\Business;
use App\Models\NpsReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReviewService
{
    public function getBusinessId($id)
    {
        return Business::where('user_id', $id)->value('id');

    }
    public function getBusiness($id)
    {
        return Business::where('id', $id)->first();

    }
    public function startReview($businessId)
    {

        if ($businessId) {
            // Verifica se já existe uma avaliação iniciada mas não concluída
            $alreadyStarted = NpsReview::where('user_id', Auth::id())
                ->where('business_id', $businessId)
                ->whereNull('rating')
                ->first();

            if ($alreadyStarted) {
                return [
                    'success' => false,
                    'message' => 'Você já iniciou uma avaliação para este local.'
                ];
            }
            $review = NpsReview::create([
                'user_id' => Auth::id(),
                'business_id' => $businessId,
                'started_at' => Carbon::now(),
            ]);

            return [
                'success' => true,
                'review' => $review
            ];
        }
    }

    public function storeReview(Request $request, $businessId)
    {
        $this->validateReviewData($request);

        // Busca uma avaliação já iniciada mas não concluída
        $review = NpsReview::where('user_id', Auth::id())
            ->where('business_id', $businessId)
            // ->whereNull('rating')
            ->first();


        if (!$review) {
            return [
                'success' => false,
                'message' => 'Avaliação não iniciada ou já concluída.'
            ];
        }

        if (Carbon::now()->diffInMinutes($review->started_at) > 10) {
            return [
                'success' => false,
                'message' => 'Tempo limite para completar a avaliação expirou.'
            ];
        }

        $isOutsideAllowedArea = $this->isOutsideAllowedArea($request->input('latitude'), $request->input('longitude'), $review->business);
        if ($isOutsideAllowedArea['isOutside']) {
            return [
                'success' => false,
                'message' => 'Você está fora da área permitida para avaliação. você está há ' . $isOutsideAllowedArea['distance'] . ' do local.'
            ];
        }

        // Atualiza a avaliação com nota e feedback
        DB::transaction(function () use ($request, $review) {
            $review->update([
                'rating' => $request->input('rating'),
                'feedback' => $request->input('feedback'),
            ]);
        });

        return [
            'success' => true,
            'review' => $review

        ];
    }

    public function deleteReview($reviewId)
    {
        $review = NpsReview::findOrFail($reviewId);

        DB::transaction(function () use ($review) {
            $review->delete();
        });

        return [
            'success' => true,
            'message' => 'Avaliação deletada com sucesso.'
        ];
    }

    public function getReviewsByBusiness($businessId)
    {
        return NpsReview::where('business_id', $businessId)->get();
    }

    public function getReviewById($id)
    {
        return NpsReview::findOrFail($id);
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
        $distance = $this->calculateDistance($userLat, $userLng, $business->latitude, $business->longitude);//+
        return [
            'isOutside' => $distance > 0.1,//+
            'distance' => round($distance, 2) . ' metros' // Distância em metros para mostrar mais precisão//+
        ]; // 0.1 km = 100 metros
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
}
