<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Transaction $transaction)
    {
        return view('pages/reviews/create', compact('transaction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Transaction $transaction)
    {
        $user = auth()->user();
        $requestReview = $request->only('content', 'rating');
        $review = $transaction->review()->create([
            'user_id' => $user->id,
            'content' => $requestReview['content'],
            'rating' => $requestReview['rating']
        ]);
        $review->save();

        $user = auth()->user();

        $transactions = Transaction::where('user_id',$user->id)->get();
        if($user->seller == null) $type = 'buyer';
        else $type = 'seller';
        return view('pages.transactions.index', compact('transactions','type'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('pages.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $requestReview = $request->only('content', 'rating');
        $review->update([
            'content' => $requestReview['content'],
            'rating' => $requestReview['rating']
        ]);
        $review->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
