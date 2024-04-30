<x-layout>
    @include('components.nav')
    @include('partials._search')

    {{-- show this only when a user is an admin --}} 
    
    @auth
        @if (  auth()->user()->admin) 
        <div>
            <a href="/books/create" class="p-3 px-6 pt-2 text-purple-300 bg-purple-800 rounded-full hover:bg-purple-400 max-w-fit absolute top-24 right-3 ">add a new book</a>
        </div>
        @endif
    @endauth
    
    
    <div class=" text-white pl-5 ">
        <a class="hover:text-purple-700" href="/list/?order=latest">Latest</a>
        <a class="hover:text-purple-700" href="list/?order=popular">Popular</a>
    </div>
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4 text-white bg-purple-900 rounded">
        
        @foreach ($books as $book)
        <div class="flex">
            
            <div class="flex flex-col pl-1">
                @if (in_array($book->id, $votes ))
                    <form action="/books/{{ $book->id }}/favorite" method="POST">@csrf <button type="submit" name="favorite"><i class="fa-solid fa-star"></i></button></form>
                @else
                    <form action="/books/{{ $book->id }}/favorite" method="POST">@csrf <button type="submit" name="favorite"><i class="fa-regular fa-star"></i></button></form>
                @endif
                <p>{{ $book->votes }}</p>
            </div>   
            
            <img
                class="hidden w-48 mr-6 md:block"
                src="{{ $book->logo ? asset('storage/'. $book->logo) : asset('images/logo.png')}}"
                alt=""
            />
            <div>
                <h3 class="text-2xl">
                    <a href="/books/{{ $book->id }}">{{ $book->title }}</a>
                </h3>
                <div class="text-xl font-bold mb-4"><i class="fa-solid fa-pen"></i> Author: {{ $book->author}}</div>
                <div class="text-lg mt-4">
                    <i class="fa-solid fa-bullhorn"></i> 
                    {{ $book->publisher }}
                </div>
                <div class="text-lg mt-4">
                    <i class="fa-solid fa-globe"></i> 
                    {{ $book->language }}
                </div>
                 <div class="text-lg mt-4">
                    <i class="fa-solid fa-star"></i> 
                    {{ $book->rating }}
                </div>
            </div>

            <div>
                @php
                    $genres = explode(',', $book->genres);
                @endphp
                
                <ul class="flex pt-2">
                    @foreach ($genres as $genre)
                    <li
                        class="bg-black text-white rounded-xl px-3 py-1 mr-2"
                    >   
                        <a href="/list/?genre={{ $genre }}">{{ $genre }}</a>
                    </li>
                    @endforeach
                
                </ul> 
            </div>
        </div>
        @endforeach
    </div> 
    <div class="mt-6 p-4">
        {{ $books->links() }}
    </div>
</x-layout>

