<header class="flex items-center justify-around w-full h-[8vw] px-[5vw] bg-green-1">
    <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-[10vw]">
    <div class="flex flex-col items-center justify-center gap-[0.75vw]">
        <form action="" class="flex items-center gap-[0.5vw] pl-[1vw] pr-[0.5vw] w-[60vw] h-[3vw] bg-yellow-2">
            @php
                $params = ["category","max_price","min_price","min_rating"];
            @endphp
            @foreach ($params as $param)
                @if (request($param))
                    <input type="hidden" value="{{ request($param) }}" name="{{ $param }}">
                @endif
            @endforeach
            <input type="text" name="search" value="{{ request()->query('search') }}" id="search" class="w-[90%] focus:outline-none">

            <button class="px-[2vw] py-[0.25vw] bg-green-1 text-white">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
        <li class="list-none flex gap-[5vw] text-green-3 text-[1.2vw] font-bold mt-[0.25vw]">
            <ul><a href="/">Home</a></ul>
            <ul><a href="/products">Products</a></ul>
            <ul><a href="/trees">Green Activity</a></ul>
            <ul><a href="/carbon-calculator">Carbon calculator</a></ul>
        </li>
    </div>
    <a href="/cart">
        <i class="fa-solid fa-cart-shopping text-[2vw] text-green-3"></i>
    </a>
    <div class="flex items-center gap-[0.5vw]">
        @auth
            <i class="fa-solid fa-user text-[2vw] text-green-3"></i>
            <p class="font-bold text-green-3">{{ auth()->user()->username }}</p>    
        @else
            <button class="">
                <a href="{{ route('login') }}" 
                    class="bg-green-2 text-white border-none rounded-md px-6 py-2 text-sm font-semibold cursor-pointer inline-block leading-normal hover:bg-green-3 transition-colors duration-300">SIGN
                    IN</a>
            </button>
        @endif
    </div>
</header>