<?php

namespace App\Http\Controllers\avi_dveri\admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Services\ReviewService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ReviewController extends Controller
{
    public function __construct(
        public ReviewService $reviewService,
    ) {}

    public function index(): View
    {
        $reviews = Review::with(['reviewable.door', 'reviewable.fitting'])
            ->latest()
            ->get();

        return view('avi-dveri.admin.reviews.reviews', compact('reviews'));
    }

    public function hide(Review $review): RedirectResponse
    {
        $this->reviewService->hide($review);

        return back();
    }

    public function restore(Review $review): RedirectResponse
    {
        $this->reviewService->restore($review);

        return back();
    }
}
