<?php

namespace App\Http\Controllers\avi_dveri;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\Product;
use App\Services\ReviewService;
use Exception;

class ReviewController extends Controller
{
    public function __construct(
        public ReviewService $reviewService,
    ) {}

    public function store(ReviewRequest $request)
    {
        try {
            $product = Product::findOrFail($request->integer('product_id'));
            $review = $this->reviewService->storeForProduct($product, $request->validated());

            return ApiResponse::success([
                'id' => $review->id,
                'name' => $review->name,
                'rating' => $review->rating,
                'comment' => $review->comment,
                'date' => $review->created_at?->format('d.m.Y'),
            ], 'Отзыв успешно отправлен');
        } catch (Exception $e) {
            return ApiResponse::error($e);
        }
    }
}