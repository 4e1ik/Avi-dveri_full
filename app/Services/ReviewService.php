<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Review;

class ReviewService
{
    public function storeForProduct(Product $product, array $data): Review
    {
        $review = $product->reviews()->create([
            'name' => $data['name'],
            'rating' => (int) $data['rating'],
            'comment' => $data['comment'],
            'is_hidden' => false,
            'fake' => false,
        ]);

        $this->recalculateRatingAvg($product);

        return $review;
    }

    public function hide(Review $review): Review
    {
        $review->update(['is_hidden' => true]);
        $this->recalculateFromReview($review);

        return $review;
    }

    public function restore(Review $review): Review
    {
        $review->update(['is_hidden' => false]);
        $this->recalculateFromReview($review);

        return $review;
    }

    public function recalculateFromReview(Review $review): void
    {
        $reviewable = $review->reviewable;
        if ($reviewable instanceof Product) {
            $this->recalculateRatingAvg($reviewable);
        }
    }

    public function recalculateRatingAvg(Product $product): void
    {
        $avg = $product->reviews()
            ->visible()
            ->avg('rating');

        $product->update([
            'rating_avg' => $avg !== null ? round((float) $avg, 2) : null,
        ]);
    }
}
