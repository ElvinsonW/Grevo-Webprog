<header class="flex items-center justify-around w-full h-[8vw] px-[5vw] bg-green-1">
        <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-[10vw]">
        <div class="flex flex-col items-center justify-center gap-[0.75vw]">
            <form action="" class="flex items-center gap-[0.5vw] pl-[1vw] pr-[0.5vw] w-[60vw] h-[3vw] bg-yellow-2">
                <input type="text" name="search" id="search" class="w-[90%] focus:outline-none">

                <button class="px-[2vw] py-[0.25vw] bg-green-1 text-white">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
            <li class="list-none flex gap-[5vw] text-green-3 font-bold">
                <ul><a href="/">Home</a></ul>
                <ul><a href="/catalogue">Products</a></ul>
                <ul><a href="/tree">Green Activity</a></ul>
                <ul><a href="/carbon-calculator">Carbon calculator</a></ul>
            </li>
        </div>
        <a href="/cart">
            <i class="fa-solid fa-cart-shopping text-[2vw] text-green-3"></i>
        </a>
        <i class="fa-solid fa-user text-[2vw] text-green-3"></i>
    </header>