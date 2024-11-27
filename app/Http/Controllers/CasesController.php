<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CasesController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        $users = User::all();
        return view('cases', ['reviews'=>$reviews, 'users'=>$users]);
    }

    public function reviewCreate(Request $request){
        $user = Auth::user();
        $newReview = new Review;
        $newReview->content = $request->content;
        $newReview->client_id = $user->id;
        $newReview->save();
        return redirect('cases');
    }

    public function reviewDelete($review_id){
        $rev = Review::firstWhere('id', $review_id);
        $rev->delete();
        return redirect('cases');
    }
}
