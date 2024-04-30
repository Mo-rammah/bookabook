<nav class="relative container mx-auto p-6 bg-purple-950">
    <div class="flex items-center justify-between">
        <div class="pt-2">
            <img class="object-contain h-20 w-20" src="{{ asset('images/logo.png') }}" style="" alt="">
        </div>
        <div class="hidden md:flex space-x-6 text-xl text-purple-500">
            <a href="/list/?order=popular" class="hover:text-purple-300">Book List</a>
            <a href="/genres" class="hover:text-purple-300">Categories</a>
            <a href="/posts" class="hover:text-purple-300">File Sharing</a>
            <a href="/about" class="hover:text-purple-300">About me</a>
        </div>
                <ul class="flex space-x-6 mr-6 text-lg text-purple-500">
                @auth
                <li>
                    <span class="font-bold uppercase">welcome {{ auth()->user()->name}}</span>
                </li>
                <li>
                    <a href="/listings/manage" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i>
                        Manage </a
                    >
                </li>
                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-right-from-bracket"></i> logout
                        </button>
                    </form>
                </li>

                @else
                <li>
                    <a href="/register" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>
                @endauth
            </ul>
    </div>
</nav>