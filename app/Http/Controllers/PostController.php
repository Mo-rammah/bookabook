<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Vote;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        if (request('order') == 'popular') {
            $books = Post::orderBy('rating', 'desc')->filter(request(['genre', 'search']))->paginate(8)->withPath('/posts/?order=popular');
        } else {
            $books = Post::latest()->filter(request(['genre', 'search']))->paginate(8)->withPath('/posts/?order=latest');
        }

        $votes = Vote::where('user_id', auth()->id())->pluck('book_id')->toArray();


        return view('posts.index', [
            'posts' => $books,
            'votes' => $votes
        ]);
    }
}
