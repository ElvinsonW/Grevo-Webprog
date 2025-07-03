<x-layout>
    <div class="flex flex-col justify-center items-center bg-yellow-2">
        @if (!request()->query())
            <img src="{{ asset('images/product_banner.png') }}" alt="banner" class="w-full h-[40vw]">
        @endif
        <div
            class="w-fit px-[7vw] py-[1.5vw] rounded-[1vw] bg-yellow-2 {{ !request()->query() ? 'mt-[-6vw]' : '' }} mb-[3vw]">
            <h1 class="text-[5vw] font-bold text-green-2">GREVO CATALOGUE</h1>
        </div>
        <div class="flex w-full px-[5vw] gap-[6vw]">
            <div class="flex flex-col gap-[2vw]">
                <div
                    class="flex flex-col bg-green-1 w-[18vw] px-[1.5vw] py-[1.5vw] rounded-[0.5vw] text-green-2 shadow-lg">
                    <h2 class="text-[2vw] font-bold ">CATEGORY</h2>
                    <div class="w-full border-b-2 border-green-2 mt-[0.5vw] mb-[1vw]"></div>
                    <div class="flex flex-col gap-[0.5vw]">
                        @php
                            $hasCategoryQuery = request()->query('category') != null;
                        @endphp
                        <div class="flex items-center gap-[1vw] {{ $hasCategoryQuery ? 'ml-[2vw]' : '' }}">
                            @php
                                $queryParams = request()->query();
                            @endphp
                            @if (!$hasCategoryQuery)
                                <i class="fa-solid fa-bag-shopping"></i>
                                <a href="{{ url('products') . '?' . http_build_query($queryParams) }}"
                                    class="font-bold">All Product</a>
                            @else
                                @php
                                    unset($queryParams['category']);
                                @endphp
                                <a href="{{ url('products') . '?' . http_build_query($queryParams) }}">All Product</a>
                            @endif
                        </div>
                        @foreach ($categories as $category)
                            @php
                                $isActive = request()->query('category') == $category->slug;
                                $queryParams = request()->query();
                                $queryParams['category'] = $category->slug;
                                unset($queryParams['page']);
                            @endphp


                            <div class="flex items-center gap-[1vw] {{ $isActive ? '' : 'ml-[2vw]' }}">

                                @if ($isActive)
                                    @php
                                        unset($queryParams['category']);
                                    @endphp
                                    <i class="fa-solid fa-bag-shopping"></i>
                                    <a href="{{ url('products') . '?' . http_build_query($queryParams) }}"
                                        class="font-bold">{{ $category->name }}</a>
                                @else
                                    <a
                                        href="{{ url('products') . '?' . http_build_query($queryParams) }}">{{ $category->name }}</a>
                                @endif
                            </div>
                        @endforeach

                    </div>
                </div>

                <div
                    class="flex flex-col bg-green-1 w-[18vw] px-[1.5vw] py-[1.5vw] rounded-[0.5vw] text-green-2 shadow-lg">
                    <h2 class="text-[2vw] font-bold ">FILTER</h2>
                    <div class="w-full border-b-2 border-green-2 mt-[0.5vw] mb-[1vw]"></div>
                    <div class="flex flex-col gap-[0.75vw]">
                        <form class="flex flex-col gap-[1vw]">
                            @php
                                $params = ['category', 'search'];
                            @endphp

                            @foreach ($params as $param)
                                @if ($param)
                                    <input type="hidden" name="{{ $param }}" value="{{ request($param) }}" >    
                                @endif
                            @endforeach
                            <div class="flex items-center gap-[0.5vw]">
                                <i class="fa-solid fa-money-bill text-green-3 text-[1.5vw]"></i>
                                <h3 class="text-[1.3vw] font-bold">PRICE</h3>
                            </div>

                            <input type="number" name="min_price" value="{{ request('min_price') }}"
                                class="px-[1vw] py-[0.5vw] rounded-[0.5vw] border border-green-2 focus:outline-none"
                                placeholder="Minimum Price">
                            <input type="number" name="max_price" value="{{ request('max_price') }}"
                                class="px-[1vw] py-[0.5vw] rounded-[0.5vw] border border-green-2 focus:outline-none"
                                placeholder="Maximum Price">

                            <div class="flex items-center gap-[0.5vw]">
                                <i class="fa-solid fa-star text-yellow-400 text-[1.3vw]"></i>
                                <h3 class="text-[1.3vw] font-bold">RATING</h3>
                            </div>
                            
                            <input type="number" name="min_rating" value="{{ request('min_rating') }}"
                                min="1" max="5"
                                class="px-[1vw] py-[0.5vw] rounded-[0.5vw] border border-green-2 focus:outline-none"
                                placeholder="Minimum Rating">
                            <button
                                class="w-[50%] h-[3vw] rounded-[0.5vw] bg-green-2 font-bold text-white mt-[1vw]">Apply</button>
                        </form>
                    </div>
                </div>
            </div>

            <div>
                <div class="flex flex-wrap gap-[1.5vw]">
                    @foreach ($products as $product)
                        @php
                            $avgRating = round($product->reviews_avg_rate, 1); // misalnya: 4.2
                        @endphp
                        <a href="/products/{{ $product->slug }}"
                            class="flex flex-col w-[15vw] h-[21vw] p-[1vw] bg-green-2">
                            <div class="relative w-full mb-[0.5vw]">
                                <img src="{{ asset('storage/' . $product->product_images->first()->image) }}" alt="{{ $product->name }}"
                                    class="w-[13vw] h-[13vw] object-cover">
                                <p
                                    class="absolute bottom-0 right-0 bg-orange-1 px-[1vw] py-[0.5vw] text-[1vw] text-white font-semibold">
                                    Rp. {{ number_format($product->product_variants->first()->price) }}</p>
                            </div>

                            <p class="text-yellow-4 font-bold text-[1vw] opacity-75 mb-[-0.1vw]">{{ $product->product_category->name }}</p>
                            <h3 class="text-[1.4vw] font-bold text-yellow-4 mb-[0.3vw]">{{ $product->name }}</h3>
                            <div class="flex items-center gap-[0.5vw] mb-[0.75vw]">
                                <div class="flex items-center gap-[0.5vw]">
                                    <i class="fa-solid fa-star text-yellow-400 text-[1.1vw]"></i>
                                    <p class="text-white font-bold text-[1vw]">{{ $avgRating }}</p>
                                </div>
                                <div class="border-l-2 border-l-yellow-2 h-[80%]"></div>
                                <p class="text-yellow-4 font-bold text-[1vw]"> {{ $product->sold }} Sold</p>
                            </div>
                        </a>
                    @endforeach

                </div>
                <div class="w-full mt-[3vw]">
                    {{ $products->links() }}
                </div>
            </div>
        </div>


    </div>
</x-layout>
