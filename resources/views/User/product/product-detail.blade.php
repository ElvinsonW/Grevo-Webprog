<x-layout>
  <main class="mx-auto p-6 text-gray-800" style="background-color: #F7F6EB;">
    <!-- product things -->
    <div class="flex flex-wrap lg:flex-nowrap gap-10 pl-20 pr-20">
        <!-- gambar + details -->
        <div class="flex flex-col w-[580px]">
            <!-- all gambar -->
            <div class="flex flex-row mb-4">
                <!-- preview gambar di samping -->
                <div class="flex flex-col items-center mr-6">
                    <button class="p-2 bg-gray-200 rounded-full mb-2">▲</button>

                    <div class="flex flex-col gap-3">
                        <img src="image1.jpg" class="w-20 h-22 rounded" style="box-shadow: 0 0 12.2px 0 rgba(0,0,0,0.06);">
                        <img src="image2.jpg" class="w-20 h-22 rounded" style="box-shadow: 0 0 12.2px 0 rgba(0,0,0,0.06);">
                        <img src="image3.jpg" class="w-20 h-22 rounded" style="box-shadow: 0 0 12.2px 0 rgba(0,0,0,0.06);">
                        <img src="image4.jpg" class="w-20 h-22 rounded" style="box-shadow: 0 0 12.2px 0 rgba(0,0,0,0.06);">
                    </div>
                    
                    <button class="p-2 bg-gray-200 rounded-full mt-2">▼</button>
                </div>

                <!-- main gambar -->
                <div class="flex items-center justify-center w-full h-full relative">
                    <!-- slider indicator di atas gambar -->
                    <div class="flex space-x-2 absolute bottom-10 left-1/2 transform -translate-x-1/2 z-10">
                        <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
                        <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
                        <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
                        <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
                        <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
                    </div>
                    <img src="main-image.jpg" class="rounded-lg w-full h-full object-cover" style="background-size: cover; background-position: center; box-shadow: 0 0 12.2px 0 rgba(0,0,0,0.06);">
                </div>
            </div>
            
            <!-- product details dll -->
            <div class="mt-6 w-full">
                <!-- tab -->
                <div class="flex space-x-15 border-b border-t p-5 pb-0 mb-1" style="border-color: #D2D2B0;">
                    <div class="flex flex-col w-35" id="details">
                        <button class="font-semibold" style="color: #3E6137">Product Details</button>
                        <hr class="mt-5 border w-35" style="color: #3E6137; border-radius:30px;">
                    </div>
                    <div class="flex flex-col w-32" id="reviews">
                        <button style="color: #7B8C7F">Buyer Reviews</button>
                        <hr class="hidden mt-5 border w-32" style="color: #3E6137; border-radius:30px;">
                    </div>
                    
                    <div class="flex flex-col w-45" id="manufacture">
                        <button style="color: #7B8C7F">Manufacturing Details</button>
                        <hr class="hidden mt-5 border w-45" style="color: #3E6137; border-radius:30px;">
                    </div>
                </div>
                <!-- isi -->
                <div class="space-y-3 p-5 pl-8">
                    <h1>Product Details</h1>
                    <p class="text-sm text-gray-700">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam in purus eget dui lobortis pulvinar...
                    </p>
                </div>
                <div class="hidden space-y-3 p-5 pl-8">
                    <h1>Buyer Reviews</h1>
                    <p class="text-sm text-gray-700">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam in purus eget dui lobortis pulvinar...
                    </p>
                </div>
                <div class="hidden space-y-3 p-5 pl-8">
                    <h1>Manufacturing Details</h1>
                    <p class="text-sm text-gray-700">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam in purus eget dui lobortis pulvinar...
                    </p>
                </div>
            </div>
        </div>
    
        
        

        <!-- Right: Tab Area -->
        <div class="inline-flex flex-col w-full lg:w-1/2 max-h-fit rounded-lg p-8" style="background-color: #FCFCF5; box-shadow: 0px 0px 12.2px 0px rgba(0,0,0,0.06);">
            <!-- header produk -->
            <div class="flex flex-col space-y-[9px] border-b mb-5" style="border-color: #D2D2B0;">
                <!-- nama+share -->
                <div class="flex flex-row items-center justify-between">
                    <!-- nama produk -->
                    <h1 class="font-bold text-[#3E6137] text-[20px]">NAMA PRODUK lalala eube hih aievna</h1>
                    <!-- share button -->
                    <img src="{{asset('images/share-button.svg')}}" alt="">
                </div>
                
                <div class="flex flex-row items-center justify-between mb-[8px]">
                    <!-- harga produk -->
                    <p class="text-red-600 text-lg font-bold mb-2">Rp 50.000</p>
                    <!-- stars -->
                    <div class="flex items-center space-x-3 text-sm text-gray-600 mb-2">
                        <span class="font-bold" style="color: #3E6137;">⭐ 4.3</span>
                        <span style="color: #D2D2B0; font-size: 20px;">|</span>
                        <span style="color: #7B8C7F;">
                            <span class="font-bold" style="color: #3E6137;">500</span> Ratings
                        </span>
                        <span style="color: #D2D2B0; font-size: 20px;">|</span>
                        <span style="color: #7B8C7F;">
                            <span class="font-bold" style="color: #3E6137;">5.7k</span> Sold
                        </span>
                    </div>
                </div>
            </div>


            <!-- variant -->
            <div class="flex items-center mb-4 pl-10" style="height:25px;">
                <p class="w-40" style="color: #7B8C7F; line-height:25px;">Variant</p>
                <div class="flex space-x-2 h-[25px] text-[#7B8C7F]">
                    <label class="inline-flex items-center">
                        <input type="radio" name="variant_color" value="Red" class="hidden peer">
                        <span class="ml-2 px-4 py-1 border rounded cursor-pointer text-[13px] min-w-[40px] h-[25px] flex items-center justify-center
                            bg-[#F5F5E9] peer-checked:bg-[#9BA89C] peer-checked:text-white transition">
                            Red
                        </span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="variant_color" value="Purple" class="hidden peer">
                        <span class="ml-2 px-4 py-1 border rounded cursor-pointer text-[13px] min-w-[40px] h-[25px] flex items-center justify-center
                            bg-[#F5F5E9] peer-checked:bg-[#9BA89C] peer-checked:text-white transition">
                            Purple
                        </span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="variant_color" value="Yellow" class="hidden peer">
                        <span class="ml-2 px-4 py-1 border rounded cursor-pointer text-[13px] min-w-[40px] h-[25px] flex items-center justify-center
                            bg-[#F5F5E9] peer-checked:bg-[#9BA89C] peer-checked:text-white transition">
                            Yellow
                        </span>
                    </label>
                </div>
            </div>

            <!-- shipping -->
            <div class="flex items-center mb-8 pl-10">
                <p class="w-40" style="color: #7B8C7F;">Shipping</p>
                <p class="text-sm text-gray-600">Shipped from: DKI Jakarta, Kota Jakarta Pusat</p>
            </div>

            <!-- stock + add to cart -->
            <div class="flex items-center justify-center">
                <div class="flex flex-col items-center justify-center mr-15">
                    <div class="flex items-center space-x-4 mb-2">
                        <button class="bg-[#F5F5E9] border w-8 h-8 flex items-center justify-center rounded-full" style="border-color: #D2D2B0;">-</button>
                        <span>1</span>
                        <button class="bg-[#F5F5E9] border w-8 h-8 flex items-center justify-center rounded-full" style="border-color: #D2D2B0;">+</button>
                    </div>
                    <p class="text-sm text-gray-600 mb-2">Stock: 200</p>
                </div>
                <button class="bg-green-700 text-white w-60 py-2 rounded mt-2">ADD TO CART</button>
            </div>
        </div>
    </div>  

    <!-- Related Products -->
    <div class="my-10 px-2">
        <!-- text -->
        <span class="flex items-center justify-center space-x-[16px] mb-10">
            <h3 class="text-[20px] font-bold text-[#3E6137]">EXPLORE</h3>
            <h1 class="text-[30px] font-bold text-[#D1764F]">RELATED PRODUCTS</h1>
        </span>

        <!-- item list -->
        <div class="flex gap-4 w-full px-20 mx-auto justify-center">
            <div class="flex flex-col gap-3 p-3 pb-4 bg-green-2 w-[196px] h-[280px] flex-shrink-0" style="box-shadow: 0px 4px 4px 2px rgba(0,0,0,0.25);">
                <div class="relative w-full">
                    <img src="{{ asset('images/home_bestseller1.png') }}" alt="Best Seller" class="w-[210px] h-[168px] object-cover">
                    <p class="absolute bottom-0 right-0 text-xs text-white font-bold px-3 py-1 bg-orange-1">IDR 20.000</p>
                </div>
                <h2 class="text-base font-bold text-white truncate">Sikat Gigi Bambu</h2>
                <p class="text-xs text-white line-clamp-2 leading-tight">Sikat gigi bambu alami dengan bulu biodegradable. Menjaga senyum tetap cerah dan ramah lingkungan.</p>
            </div>

            <div class="flex flex-col gap-3 p-3 pb-4 bg-green-2 w-[196px] h-[280px] flex-shrink-0" style="box-shadow: 0px 4px 4px 2px rgba(0,0,0,0.25);">
                <div class="relative w-full">
                    <img src="{{ asset('images/home_katalog1.png') }}" alt="Best Seller" class="w-[210px] h-[168px] object-cover">
                    <p class="absolute bottom-0 right-0 text-xs text-white font-bold px-3 py-1 bg-orange-1">IDR 20.000</p>
                </div>
                <h2 class="text-base font-bold text-white truncate">Sabun Organik</h2>
                <p class="text-xs text-white line-clamp-2 leading-tight">Sabun mandi alami tanpa bahan kimia, cocok untuk kulit sensitif dan menjaga kelembapan kulit.</p>
            </div>

            <div class="flex flex-col gap-3 p-3 pb-4 bg-green-2 w-[196px] h-[280px] flex-shrink-0" style="box-shadow: 0px 4px 4px 2px rgba(0,0,0,0.25);">
                <div class="relative w-full">
                    <img src="{{ asset('images/home_katalog2.png') }}" alt="Best Seller" class="w-[210px] h-[168px] object-cover">
                    <p class="absolute bottom-0 right-0 text-xs text-white font-bold px-3 py-1 bg-orange-1">IDR 20.000</p>
                </div>
                <h2 class="text-base font-bold text-white truncate">Sedotan Stainless</h2>
                <p class="text-xs text-white line-clamp-2 leading-tight">Sedotan ramah lingkungan, dapat digunakan berulang kali dan mudah dibersihkan.</p>
            </div>

            <div class="flex flex-col gap-3 p-3 pb-4 bg-green-2 w-[196px] h-[280px] flex-shrink-0" style="box-shadow: 0px 4px 4px 2px rgba(0,0,0,0.25);">
                <div class="relative w-full">
                    <img src="{{ asset('images/home_bestseller1.png') }}" alt="Best Seller" class="w-[210px] h-[168px] object-cover">
                    <p class="absolute bottom-0 right-0 text-xs text-white font-bold px-3 py-1 bg-orange-1">IDR 20.000</p>
                </div>
                <h2 class="text-base font-bold text-white truncate">Sikat Gigi Anak</h2>
                <p class="text-xs text-white line-clamp-2 leading-tight">Sikat gigi bambu khusus anak, bulu lembut dan ukuran pas untuk si kecil.</p>
            </div>

            <div class="flex flex-col gap-3 p-3 pb-4 bg-green-2 w-[196px] h-[280px] flex-shrink-0" style="box-shadow: 0px 4px 4px 2px rgba(0,0,0,0.25);">
                <div class="relative w-full">
                    <img src="{{ asset('images/home_katalog1.png') }}" alt="Best Seller" class="w-[210px] h-[168px] object-cover">
                    <p class="absolute bottom-0 right-0 text-xs text-white font-bold px-3 py-1 bg-orange-1">IDR 20.000</p>
                </div>
                <h2 class="text-base font-bold text-white truncate">Sabun Cuci Piring</h2>
                <p class="text-xs text-white line-clamp-2 leading-tight">Sabun cuci piring alami, efektif membersihkan lemak tanpa residu berbahaya.</p>
            </div>

            <div class="flex flex-col gap-3 p-3 pb-4 bg-green-2 w-[196px] h-[280px] flex-shrink-0" style="box-shadow: 0px 4px 4px 2px rgba(0,0,0,0.25);">
                <div class="relative w-full">
                    <img src="{{ asset('images/home_katalog2.png') }}" alt="Best Seller" class="w-[210px] h-[168px] object-cover">
                    <p class="absolute bottom-0 right-0 text-xs text-white font-bold px-3 py-1 bg-orange-1">IDR 20.000</p>
                </div>
                <h2 class="text-base font-bold text-white truncate">Tote Bag Kanvas</h2>
                <p class="text-xs text-white line-clamp-2 leading-tight">Tas belanja kanvas kuat dan stylish, bisa dipakai berulang kali untuk kurangi plastik.</p>
            </div>
        </div>
    </div>
  </main>
</x-layout>