<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\Vote;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //main landing page
    //show all books
    public function index()
    {

        if (request('order') == 'popular') {
            $books = Book::orderBy('rating', 'desc')->filter(request(['genre', 'search']))->paginate(8)->withPath('/list/?order=popular');
        } else {
            $books = Book::latest()->filter(request(['genre', 'search']))->paginate(8)->withPath('/list/?order=latest');
        }

        $votes = Vote::where('user_id', auth()->id())->pluck('book_id')->toArray();


        return view('books.list', [
            'books' => $books,
            'votes' => $votes
        ]);
    }
    //show a single book
    public function show(Book $book)
    {
        return view('books.show', [
            'book' => $book
        ]);
    }

    //show the create form for admin users
    public function create()
    {
        return view('books.create');
    }
    //store the book data entered by admin
    public function store(Request $request)
    {

        $formFields = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'language' => 'required',
            'year' => 'required',
            'genres' => 'required',
            'description' => 'required'

        ]);

        if ($request->hasFile('cover')) {
            $formFields['cover'] = $request->file('cover')->store('cover', 'public');
        }
        // $formFields['user_id'] = auth()->id();
        Book::create($formFields);


        return redirect('/list')->with('message', 'Book created successfully');
    }

    //delete
    public function destroy(Book $book)
    {
        //make sure logged in user is the owner
        // if($listing->user_id != auth()->id()){
        //     abort(403, 'Unauthorized action!');
        // }
        $book->delete();
        return redirect('/')->with("message", "Listing deleted successfully!");
    }

    //show edit form    
    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    public function update(Request $request, book $book)
    {

        //make sure loggedin use ris the wner
        // if($book->user_id != auth()->id()){
        //     abort(403, 'Unauthorized action!');
        // }

        $formFields = $request->validate([
            'author' => 'required',
            'publisher' => 'required',
            'language' => 'required',
            'year' => 'required',
            'genres' => 'required',
            'description' => 'required'

        ]);

        if ($request->hasFile('cover')) {
            $formFields['cover'] = $request->file('cover')->store('cover', 'public');
        }

        $book->update($formFields);


        return back()->with('message', 'Book Updated successfully');
    }

    public function genres()
    {
        //get all the DB genres
        $genres = Book::pluck('genres');

        // collect all genres into one string
        $allgenres = null;
        foreach ($genres as $genre) {
            $allgenres = $allgenres . "," . $genre; //this adds an extra element at the start of the array
        }

        $allgenres = explode(',', $allgenres);      //seperate the genres into an array 
        unset($allgenres[0]);                       //remove the extra array element at the start

        $uniqueGenres = collect($allgenres)->unique()->values()->all(); //extract only the unique genres


        return view('books.genres', [
            'genres' => $uniqueGenres
        ]);
    }
    public function favorite(Book $book)
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
}
