<x-layout>
    <a href="/list" class="inline-block text-white ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="bg-purple-800 text-white border border-purple-200 rounded p-10">
        <div
                        class="flex flex-col items-center justify-center text-center"
                    >
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{ $book->logo ? asset('storage/'. $book->logo) : asset('images/logo.png')}}"
                            alt=""
                        />

                        <h3 class="text-2xl mb-2">{{ $book->title }}</h3>
                        <div class="text-xl font-bold mb-4">{{ $book->author }}</div>

                        <div class="text-lg my-4">
                            {{-- <i class="fa-solid fa-location-dot"></i> {{ $listing->location }} --}}
                        </div>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Book Description
                            </h3>
                            <div class="text-lg space-y-6">
                                {{ $book->description }}

                            </div>
                        </div>
                        <a href="/books/{{ $book->id }}/edit">
                            <i class="fa-solid fa-pencil"></i> Edit
                        </a>

                        <form method="POST" action="/books/{{ $book->id }}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
                        </form>
                    </div>
    </div>

</x-layout>