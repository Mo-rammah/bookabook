<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Vote;
use Illuminate\Http\Request;


class VoteController extends Controller
{
    public function upvote(Book $book)
    {
        $isVoted = Vote::where('book_id', $book->id)->where('user_id', auth()->id())->first();
        if (!is_null($isVoted)) {
            //if this user voted before, remove their vote
            $isVoted->delete();
            $book->decrement('votes', 1);
            return redirect()->back();
        } else {
            //if the user wants to add this book to favorites
            Vote::create([
                'book_id' => $book->id,
                'user_id' => auth()->id(),
                'vote' => 1,
            ]);
            $book->increment('votes', 1);
            return redirect()->back();
        }
    }
    public function downvote(Book $book)
    {
        dd($book);
    }
}

// if ($isVoted->vote === 0) {
//     $isVoted->update(['vote' => 1]);
//     $book->increment('votes', 1);
//     return redirect()->back();
// } elseif ($isVoted->vote === 1) {
//     $isVoted->update(['vote' => 0]);
//     $book->decrement('votes', 1);
//     return redirect()->back();
// }
