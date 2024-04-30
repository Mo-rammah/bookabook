<x-layout>
    @include('components.nav')
    @include('partials._search')

    <div class="container mx-auto text-white">
        @foreach ($genres as $genre )
            <a href="/list/?genre={{ $genre }}"><i class="fa-solid fa-circle"></i>{{ $genre }}</a>
        @endforeach
    </div>
    
</x-layout>