<x-layout>
    <div class="p-[4vw]">
        <!-- product things -->
        <div class="flex flex-wrap lg:flex-nowrap gap-10 pl-[3vw] pr-[3vw]">
            <!-- gambar + details -->
            <div class="flex flex-col w-[50%]">
                <!-- all gambar -->
                <div class="flex flex-row mb-4">
                    <!-- preview gambar di samping -->
                    <div class="flex flex-col items-center mr-6">
                        <button class="p-[0.75vw] bg-gray-200 rounded-full mb-2">▲</button>

                        <div class="flex flex-col gap-3">
                            <img src="{{ asset('images/home_green1.png') }}" class="w-[7vw] h-[7vw] object-cover rounded"
                                style="box-shadow: 0 0 12.2px 0 rgba(0,0,0,0.06);">
                            <img src="{{ asset('images/home_green1.png') }}"
                                class="w-[7vw] h-[7vw] object-cover rounded"
                                style="box-shadow: 0 0 12.2px 0 rgba(0,0,0,0.06);">
                            <img src="{{ asset('images/home_green1.png') }}"
                                class="w-[7vw] h-[7vw] object-cover rounded"
                                style="box-shadow: 0 0 12.2px 0 rgba(0,0,0,0.06);">
                        </div>

                        <button class="p-[0.75vw] bg-gray-200 rounded-full mt-2">▼</button>
                    </div>

                    <!-- main gambar -->
                    <div class="flex items-center justify-center w-[35vw] h-[35vw] relative">
                        <!-- slider indicator di atas gambar -->
                        <div class="flex space-x-2 absolute bottom-10 left-1/2 transform -translate-x-1/2 z-10">
                            <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
                            <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
                            <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
                            <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
                            <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
                        </div>
                        <img src="{{ asset('images/home_green2.png') }}" class="rounded-lg w-full h-full object-cover"
                            style="background-size: cover; background-position: center; box-shadow: 0 0 12.2px 0 rgba(0,0,0,0.06);">
                    </div>
                </div>


            </div>

            <!-- Right: Tab Area -->
            <form action="/cart" method="POST" class="inline-flex flex-col w-full lg:w-1/2 max-h-fit rounded-lg p-8"
                style="background-color: #FCFCF5; box-shadow: 0px 0px 12.2px 0px rgba(0,0,0,0.06);">
                @csrf
                {{-- Product Input --}}
                <input type="text" name="product_id" id="product_id" value="{{ $product->id }}" class="hidden">

                <!-- header produk -->
                <div class="flex flex-col space-y-[9px] border-b mb-5" style="border-color: #D2D2B0;">
                    <!-- nama+share -->
                    <div class="flex flex-row items-center justify-between">
                        <!-- nama produk -->
                        <h1 class="font-bold text-[#3E6137] text-[20px]">{{ $product->name }}</h1>
                        <!-- share button -->
                        <div class="relative">
                            <button onclick="copyLink()" class="flex items-center gap-2">
                                <img src="{{ asset('images/share-button.svg') }}" alt="">
                                <span>Share</span>
                            </button>

                            <p id="copyStatus"
                                class="absolute top-[3vw] right-[-2.5vw] bg-green-50 text-green-3 py-[0.75vw] w-[10vw] flex justify-center hidden">
                                Link copied!</p>
                        </div>
                    </div>

                    <div class="flex flex-row items-center justify-between mb-[8px]">
                        <!-- harga produk -->
                        <p class="text-red-600 text-lg font-bold mb-2">Rp
                            {{ number_format($product->product_variants->first()->price) }}</p>
                        <!-- stars -->
                        <div class="flex items-center space-x-3 text-sm text-gray-600 mb-2">
                            <span class="font-bold text-green-2">⭐ {{ round($product->reviews_avg_rate, 1) }}</span>
                            <span style="color: #D2D2B0; font-size: 20px;">|</span>
                            <span>
                                <span class="font-bold text-green-2">{{ count($product->reviews) }}</span> Ratings
                            </span>
                            <span style="color: #D2D2B0; font-size: 20px;">|</span>
                            <span>
                                <span class="font-bold text-green2">{{ $product->sold }}</span> Sold
                            </span>
                        </div>
                    </div>
                </div>


                <!-- color -->
                <div class="flex items-center mb-[2vw]">
                    <p class="w-[10vw] text-green-2" style="line-height:25px;">Color</p>
                    <div class="flex gap-[1vw] text-green-2">
                        @foreach ($product->product_variants->pluck('color')->unique('id') as $color)
                            @if ($color)
                                <label class="items-center">
                                    <input type="radio" name="color" value="{{ $color->id }}"
                                        class="hidden peer" required>
                                    <span
                                        class="px-4 py-1 border rounded cursor-pointer text-[13px] min-w-[40px] h-[25px] flex items-center justify-center
                                        bg-yellow-2 peer-checked:bg-green-2 peer-checked:text-white transition">
                                        {{ $color->name }}
                                    </span>
                                </label>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- size -->
                <div class="flex items-center mb-[2vw]">
                    <p class="w-[10vw] text-green-2" style="line-height:25px;">Size</p>
                    <div class="flex gap-[1vw] text-green-2">
                        @foreach ($product->product_variants->pluck('size')->unique('id') as $size)
                            @if ($size)
                                <label class="items-center">
                                    <input type="radio" name="size" value="{{ $size->id }}"
                                        class="hidden peer" required>
                                    <span
                                        class="px-4 py-1 border rounded cursor-pointer text-[13px] min-w-[40px] h-[25px] flex items-center justify-center
                                        bg-yellow-2 peer-checked:bg-green-2 peer-checked:text-white transition">
                                        {{ $size->name }}
                                    </span>
                                </label>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- shipping -->
                <div class="flex items-center mb-8 ">
                    <p class="w-[10vw] text-green-2">Certificate</p>
                    <p class="text-sm text-green-2">{{ $product->certification }}</p>
                </div>

                <!-- stock + add to cart -->
                <div class="flex items-center justify-center">
                    <div class="flex flex-col items-center justify-center mr-15">
                        <div class="flex items-center space-x-4 mb-2">
                            <button type="button"
                                class="bg-yellow-2 border w-8 h-8 flex items-center justify-center rounded-full"
                                style="border-color: #D2D2B0;" id="subButton">-</button>
                            <input type="number" name="amount" class="hidden" id="amountInput" value="1">
                            <span class="bold w-[1vw] text-center" id="amountView">1</span>
                            <button type="button"
                                class="bg-yellow-2 border w-8 h-8 flex items-center justify-center rounded-full"
                                style="border-color: #D2D2B0;" id="addButton">+</button>
                        </div>
                        <p class="text-sm text-gray-600 mb-2">Stock: 200</p>
                    </div>
                    <button class="bg-orange-1 text-white font-bold w-60 py-2 rounded mt-2">ADD TO CART</button>
                </div>
            </form>
        </div>

        <div class="mb-[5vw]">
            <!-- product details dll -->
            <div class="mt-[2vw] w-full">
                <!-- tab -->
                <div class="flex justify-center border-b border-t border-[#D2D2B0] px-5 pt-5">
                    <!-- Product Description Tab -->
                    <div class="flex flex-col w-fit" id="details-tab">
                        <button class="text-green-2 font-semibold" onclick="setActiveTab('details')">
                            Product Description
                        </button>
                        <hr class="mt-2 border-b-2 border-green-2 rounded-full w-full" id="details-underline">
                    </div>

                    <!-- Product Material Tab -->
                    <div class="flex flex-col w-fit ml-10" id="material-tab">
                        <button class="text-[#7B8C7F] font-normal" onclick="setActiveTab('material')">
                            Product Material
                        </button>
                        <hr class="hidden mt-2 border-b-2 border-[#3E6137] rounded-full w-full"
                            id="material-underline">
                    </div>

                    <!-- Process Details Tab -->
                    <div class="flex flex-col w-fit ml-10" id="process-tab">
                        <button class="text-[#7B8C7F] font-normal" onclick="setActiveTab('process')">
                            Process Details
                        </button>
                        <hr class="hidden mt-2 border-b-2 border-[#3E6137] rounded-full w-full"
                            id="process-underline">
                    </div>

                    <!-- Buyer Reviews Tab -->
                    <div class="flex flex-col w-fit ml-10" id="reviews-tab">
                        <button class="text-[#7B8C7F] font-normal" onclick="setActiveTab('reviews')">
                            Buyer Reviews
                        </button>
                        <hr class="hidden mt-2 border-b-2 border-[#3E6137] rounded-full w-full"
                            id="reviews-underline">
                    </div>
                </div>

                <div class="p-5 pl-8">
                    <!-- Product Description -->
                    <div id="details-content" class="flex flex-col gap-[1vw]">
                        <div>
                            <h1 class="font-bold text-green-2 mb-[0.5vw]">Product Description</h1>
                            <p class="text-[1.2vw] text-gray-700">
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>

                    <!-- Product Material -->
                    <div id="material-content" class="flex flex-col gap-[1vw]">
                        <div>
                            <h1 class="font-bold text-green-2 mb-[0.5vw]">Product Material</h1>
                            <p class="text-[1.2vw] text-gray-700">
                                {{ $product->material }}
                            </p>
                        </div>
                    </div>

                    <!-- Process Details -->
                    <div id="process-content" class="hidden space-y-3">
                        <h1 class="font-bold text-green-2">Process Details</h1>
                        <p class="text-[1.2vw] text-gray-700">
                            {{ $product->process }}
                        </p>
                    </div>

                    <!-- Buyer Reviews -->
                    <div id="reviews-content" class="hidden space-y-3">
                        <h1 class="font-bold text-green-2">Buyer Reviews</h1>
                        <div class="flex flex-col">
                            @foreach ($reviews as $review)    
                                <div class="flex gap-[5vw] py-[1.5vw] border-0  border-b-1 border-gray-300">
                                    <div class="flex gap-[1vw] w-[25%]">
                                        <img src="{{ asset('images/elvinson.jpg') }}" alt="elvinson"
                                            class="w-[4vw] h-[4vw] rounded-[0.5vw] object-cover">
                                        <div class="flex flex-col">
                                            <p class="text-[1.3vw] font-bold">Nicholas Defin</p>
                                            <p class="text-[0.9vw] font-bold text-orange-600">May 22, 2025</p>
                                        </div>
                                    </div>

                                    <div class="flex flex-col gap-[0.5vw] w-[70%]">
                                        <div>
                                            @for ($i = 0; $i < $review->rate; $i++)
                                                <i class="fa-solid fa-star text-yellow-400 text-[1.3vw]"></i>
                                            @endfor

                                            @for ($i = $review->rate; $i < 5; $i++)
                                                <i class="fa-solid fa-star text-gray-200"></i>
                                            @endfor
                                        </div>

                                        <div class="text-[1vw] font-bold">
                                            {{ $review->description }}
                                        </div>

                                        <div class="flex gap-[1vw] mt-[0.5vw]">
                                            @foreach ($review->review_images as $review_image)
                                                <img src="{{ asset('storage/' . $review_image->source) }}"
                                                    alt="Review Image"
                                                    class="w-[3.5vw] h-[3.5vw] rounded-[0.5vw] object-cover cursor-pointer hover:brightness-75"
                                                    onclick="showImage('{{ $review->id }}', '{{ asset('storage/' . $review_image->source) }}')">
                                            @endforeach
                                        </div>
                                        <img src="{{ asset('storage/' . $review_image->source) }}" alt="Review Image"
                                            class="big-image w-[15vw] h-[15vw] rounded-[0.5vw] object-cover hidden"
                                            id="{{ $review->id }}">
                                    </div>

                                </div>
                            @endforeach

                            <a href="/review/{{ $product->slug }}" class="cursor-pointer hover:text-green-2 text-[1.5vw] text-center text-orange-1 font-bold mt-[2vw]">See more review</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <div class="my-[2vw] px-[5vw]">
            <!-- text -->
            <span class="flex items-center justify-center space-x-[16px] mb-10">
                <h3 class="text-[20px] font-bold text-[#3E6137]">EXPLORE</h3>
                <h1 class="text-[30px] font-bold text-[#D1764F]">RELATED PRODUCTS</h1>
            </span>

            <!-- item list -->
            <div class="flex gap-4  mx-auto justify-center">
                @foreach ($similarProducts as $similarProduct)
                    @php
                        $avgRating = round($similarProduct->reviews_avg_rate, 1);
                    @endphp
                    <a href="/products/{{ $similarProduct->slug }}"
                        class="flex flex-col w-[15vw] h-[21vw] p-[1vw] bg-green-2">
                        <div class="relative w-full mb-[0.5vw]">
                            <img src="{{ asset('storage/' . $similarProduct->product_images->first()->image) }}"
                                alt="{{ $similarProduct->name }}" class="w-[13vw] h-[13vw] object-cover">
                            <p
                                class="absolute bottom-0 right-0 bg-orange-1 px-[1vw] py-[0.5vw] text-[1vw] text-white font-semibold">
                                Rp. {{ number_format($similarProduct->product_variants->first()->price) }}</p>
                        </div>

                        <p class="text-yellow-4 font-bold text-[1vw] opacity-75 mb-[-0.1vw]">
                            {{ $similarProduct->product_category->name }}</p>
                        <h3 class="text-[1.4vw] font-bold text-yellow-4 mb-[0.3vw]">{{ $similarProduct->name }}</h3>
                        <div class="flex items-center gap-[0.5vw] mb-[0.75vw]">
                            <div class="flex items-center gap-[0.5vw]">
                                <i class="fa-solid fa-star text-yellow-400 text-[1.1vw]"></i>
                                <p class="text-white font-bold text-[1vw]">{{ $avgRating }}</p>
                            </div>
                            <div class="border-l-2 border-l-yellow-2 h-[80%]"></div>
                            <p class="text-yellow-4 font-bold text-[1vw]"> {{ $similarProduct->sold }} Sold</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        const addButton = document.querySelector("#addButton");
        const subButton = document.querySelector("#subButton");
        const amountInput = document.querySelector("#amountInput");
        const amountView = document.querySelector("#amountView");

        addButton.onclick = function() {
            let currentValue = parseInt(amountInput.value);
            amountInput.value = currentValue + 1;
            amountView.textContent = amountInput.value;
        };

        subButton.onclick = function() {
            let currentValue = parseInt(amountInput.value);
            if (currentValue > 1) {
                amountInput.value = currentValue - 1;
                amountView.textContent = amountInput.value;
            }
        };

        function copyLink() {
            const url = window.location.href;

            navigator.clipboard.writeText(url).then(() => {
                const status = document.getElementById('copyStatus');
                status.classList.remove('hidden');
                status.textContent = 'Link copied!';

                setTimeout(() => {
                    status.classList.add('hidden');
                }, 2000);
            }).catch(err => {
                console.error('Failed to copy: ', err);
            });
        }

        function setActiveTab(tabId) {
            const tabs = ['details', 'reviews', 'process', 'material'];

            tabs.forEach(id => {
                // Tabs styling
                const button = document.querySelector(`#${id}-tab button`);
                const underline = document.querySelector(`#${id}-underline`);
                if (id === tabId) {
                    button.classList.add('text-green-2', 'font-semibold');
                    button.classList.remove('text-[#7B8C7F]', 'font-normal');
                    underline.classList.remove('hidden');
                } else {
                    button.classList.add('text-green-2', 'font-normal');
                    button.classList.remove('text-[#3E6137]', 'font-semibold');
                    underline.classList.add('hidden');
                }

                // Content show/hide
                const content = document.querySelector(`#${id}-content`);
                if (id === tabId) {
                    content.classList.remove('hidden');
                } else {
                    content.classList.add('hidden');
                }
            });
        }
    </script>
</x-layout>
