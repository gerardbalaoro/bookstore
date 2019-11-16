<nav class="flex items-center justify-between flex-wrap bg-blue-500 p-3 xl:px-64 px-6">
    <a href="{{ url('/') }}" class="flex items-center flex-shrink-0 text-white mx-auto sm:mr-10 my-2">
        {{-- Icon Source: https://www.flaticon.com/free-icon/book-shelf_1872779 --}}
        <svg class="fill-current h-10 pr-3" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
            <path d="m512 422h-60v-422h-128v40h-48v-40h-128v80h-88v342h-60v40h40v50h40v-50h352v50h
            40v-50h40zm-236-263h48v183h-48zm48-79v39h-48v-39zm-176 40v39h-48v-39zm-48 302v-223h48v
            223zm88 0v-382h48v382zm88 0v-40h48v40zm88 0v-382h48v382zm0 0" />
        </svg>
        <span class="font-semibold text-3xl tracking-tight pr-3">{{ config('app.name', 'BookStore') }}</span>
    </a>
    <div class="block flex-grow lg:flex xl:mr-10">
        <form class="w-full" action="{{ route('search') }}" method="get">
            <input name="q" class="transition placeholder-gray-600 rounded-lg bg-gray-200 py-2 px-4 block w-full
            focus:outline-none border border-transparent focus:bg-white focus:border-gray-300" type="text" placeholder="Search Books"/>
        </form>
    </div>
    <div class="block sm:hidden ml-4">
        <label data-toggle="menu" class="cursor-pointer focus:outline-none">
            <svg class="fill-current text-blue-200 hover:text-white" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </label>        
    </div>
    <div class="w-full hidden sm:flex flex-grow justify-center mt-3 lg:w-auto lg:mt-0" id="menu">
        <div class="text-sm flex my-auto">
            <a href="{{ route('book.index') }}" class="block text-base mt-4 sm:inline-block lg:mt-0 text-blue-200 
            hover:text-white hover:font-medium mr-4 pl-5">
                Books
            </a>
            <a href="{{ route('author.index') }}" class="block text-base mt-4 sm:inline-block lg:mt-0 text-blue-200 
            hover:text-white hover:font-medium mr-4 pl-5">
                Authors
            </a>
            <a href="{{ route('series.index') }}" class="block text-base mt-4 sm:inline-block lg:mt-0 text-blue-200
            hover:text-white hover:font-medium mr-4 pl-5">
                Series
            </a>
            <a href="{{ route('publisher.index') }}" class="block text-base mt-4 sm:inline-block lg:mt-0 text-blue-200
            hover:text-white hover:font-medium mr-4 pl-5">
                Publishers
            </a>
        </div>
        {{-- <div>
            <a href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white
            hover:border-transparent hover:text-blue-500 hover:bg-white mt-4 lg:mt-0">Log In</a>
        </div> --}}
    </div>
</nav>