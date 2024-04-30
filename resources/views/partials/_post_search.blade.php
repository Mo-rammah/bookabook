<div class="container mx-auto">
    <div class="flex flex-row items-center">
        <form action="/posts" class="items-center">
            <div class="relative border-2 border-black m-4 rounded-lg min-w-40">
                <div class="absolute top-4 left-3">
                    <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
                </div>
                <input type="text" name="search" class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none" placeholder="Search books by name..." />
                <div class="absolute top-2 right-2">
                    <button type="submit" class="h-10 w-20 text-white rounded-lg bg-purple-500 hover:bg-purple-600">
                        Search
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>