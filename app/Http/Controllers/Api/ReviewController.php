<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Item;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class ReviewController extends Controller
{
    public function index(Item $item)
    {
        return ReviewResource::collection($item->reviews);
    }

    public function store(Item $item, ReviewRequest $request)
    {
        $data = $request->validated();
        $data['item_id'] = $item->id;
        $data['user_id'] = Auth::user()->id;

        $review = Review::create($data);

        return new ReviewResource($review);
    }

    public function show($id)
    {
        //
    }
    public function update(Review $review, ReviewRequest $request)
    {
        $review->update($request->validated());

        return new ReviewResource(Review::find($review->id));
    }
    public function destroy($id)
    {
        //
    }

    public function canReview(Item $item)
    {
        $customer = $item->reviews()->where('user_id', Auth::user()->id)->first();
        if($customer)
        {
            return ['can-review' => false];
        }

        return ['can-review' => true];
    }
}
