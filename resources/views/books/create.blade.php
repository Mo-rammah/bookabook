<x-layout>
    @include('components.nav')
    
    <x-card class="p-10s max-w-lg mx-auto mt-24 "
    >
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Create a Book
        </h2>
        <p class="mb-4">Post information about a book's availability</p>
    </header>

    <form method="POST"  action="/listing" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label
                for="title"
                class="inline-block text-lg mb-2"
                >Book title</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="title"
                value="{{ old('title') }}"
            />
            @error('title')
                <p class="text-purple-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="author" class="inline-block text-lg mb-2"
                >Author name</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="author"
                value="{{ old('author') }}"
            />
            @error('author')
                <p class="text-purple-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="publisher"
                class="inline-block text-lg mb-2"
                >Publisher</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="publisher"
                placeholder="Example: Enslow Publishing, Editions Frontieres, ETC"
                value="{{ old('publisher') }}"
            />
            @error('publisher')
                <p class="text-purple-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="language"
                class="inline-block text-lg mb-2"
                >Language</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="language"
                placeholder="Example: English, Russian, German"
                value="{{ old('language') }}"
            />
            @error('language')
                <p class="text-purple-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="year" class="inline-block text-lg mb-2"
                >Year</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="year"
                placeholder="the year at which the book was published"
                value="{{ old('year') }}"
            />
            @error('year')
                <p class="text-purple-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        

        <div class="mb-6">
            <label for="genres" class="inline-block text-lg mb-2">
                genres (Comma Separated)
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="genres"
                placeholder="Example: Horror, Drama, Sci-fi etc"
                value="{{ old('genres') }}"
            />
            @error('genres')
                <p class="text-purple-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="cover" class="inline-block text-lg mb-2">
                Book cover
            </label>
            <input
                type="file"
                class="border border-gray-200 rounded p-2 w-full"
                name="cover"
                
            />
            @error('cover')
                <p class="text-purple-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="description"
                class="inline-block text-lg mb-2"
            >
                Book Description
            </label>
            <textarea
                class="border border-gray-200 rounded p-2 w-full"
                name="description"
                rows="10"
                placeholder="Include a breif description of the book"
            >{{ old('description') }}</textarea>
            @error('description')
                <p class="text-purple-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button
                class="bg-purple-900 text-white rounded py-2 px-4 hover:bg-purple-800"
            >
                Create Book
            </button>

            <a href="/" class="text-black ml-4"> Back </a>
        </div>
    </form>
    </x-card>
</x-layout>