<x-layout>
    @include('components.nav')
    @include('partials._search')
      
        @foreach ($posts as $post)    
            <div class="lg:grid lg:grid-cols-1 gap-4 space-y-4 md:space-y-0 mx-4">
                <div class="bg-gray-50 border border-gray-200 rounded p-6 ">
                    <div class="flex ">
                        <img
                            class="hidden w-48 mr-6 md:block"
                            src="{{ $post->logo ? asset('storage/'. $post->logo) : asset('images/pdf/genric-pdf.png')}}"
                            alt=""
                        />
                        <div>
                            <h3 class="text-2xl">
                                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                            </h3>
                            <div class="text-xl font-bold mb-4"> Blitz </div>
                            
                            <div class="text-lg mt-4">
                              {{ $post->description }}
                            </div>
                            <div class="text-lg mt-6" >
                                <button class="rounded"><i class="fa-solid fa-download"></i> Download </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
</x-layout> 

