<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request, $film_id) {

        $request->validate([
            'content' => 'required|min:5',
            'point' => 'required|integer|min:1|max:10'
        ]);
        

         $userid = Auth::id();

         $review = new Review;

         $review->content = $request->input('content');
         $review->point = $request->input('point');
         $review->user_id = $userid;
         $review->film_id = $film_id;

         $review->save();
         
         return redirect('/film/' . $film_id);

    }
}
