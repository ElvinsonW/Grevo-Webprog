<x-layout>
    @if (session('roleError'))
        
        <div class="alert absolute z-40 flex items-center p-4 mb-4 w-[30vw] text-red-800 rounded-lg bg-red-50 " 
            style="top: 2%; left: 50%; transform: translate(-50%, -50%);" 
            role="alert">
            <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-[1vw] font-medium">
                {{ session('roleError') }}
            </div>
            <button type="button" class="close-button ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-2" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif
    <div class="flex flex-col w-full overflow-hidden">
        <img src="{{ asset('images/home1.jpg') }}" alt="home1" class="w-full object-cover mb-[2vw]">

        <div class="flex flex-col items-center w-full">
            <div class="relative flex justify-center w-[60vw] mb-[3vw]">
                <h1 class="relative z-10 text-[7vw] font-bold text-green-3">Koleksi Baru</h1>
                <h1 class="absolute z-0 top-[0.2vw] left-[9.5vw] text-[7vw] font-bold text-black">Koleksi Baru</h1>
            </div>

            <div class="flex flex-col items-center w-full h-fit px-[7.5vw] py-[5vw] gap-[4vw] bg-green-2">
                <div class="flex justify-between w-full">
                    <img src="{{ asset('images/home_katalog1.png') }}" alt="Katalog" class="w-[25vw] h-[25vw] rounded-[1vw] object-cover">
                    <img src="{{ asset('images/home_katalog2.png') }}" alt="Katalog" class="w-[25vw] h-[25vw] rounded-[1vw] object-cover">
                    <img src="{{ asset('images/home_katalog3.png') }}" alt="Katalog" class="w-[25vw] h-[25vw] rounded-[1vw] object-cover">
                </div>

                <button class="cursor-pointer font-bold px-[3vw] py-[0.5vw] text-[1.5vw] text-yellow-1 border border-yellow-1 hover:border-0 hover:bg-yellow-1 hover:text-green-2">
                    <a href="/products">
                        Lihat Selengkapnya
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </button>
            </div>

        </div>

        <div class="relative flex gap-[4vw] px-[10vw] py-[7vw] mb-[3vw]">
            <img src="{{ asset('images/home2.jpg') }}" alt="home2" class="w-[35vw] ">
            <div class="flex flex-col gap-[2vw] w-[33vw]">
                <h1 class="text-[4.5vw] font-poppins leading-none font-bold text-green-2">PRODUK RAMAH LINGKUNGAN</h1>
                <p class="text-green-2 text-justify">Didirikan pada tahun 2025 di Sukaraja, Jawa Barat, Indonesia, Grevo Marketplace lahir dari ide sederhana namun kuat: menjadikan gaya hidup berkelanjutan dapat diakses oleh semua orang. Kami membayangkan sebuah platform di mana individu dapat dengan mudah menemukan dan mendukung bisnis yang menawarkan produk ramah lingkungan. Komitmen kami tidak hanya sebatas memfasilitasi transaksi; kami berupaya membangun komunitas yang menghargai planet kita dan mengadopsi konsumsi yang sadar.</p>
            </div>

            <div class="absolute bottom-[5vw] right-[13vw] flex w-[45vw] py-[1vw] bg-green-3 text-white opacity-[80%]">
                <div class="flex flex-col items-center justify-center w-[33%] py-[0.75vw] border-r-1 border-r-gray-600">
                    <h2 class="text-[3vw] font-bold">2021</h2>
                    <p>lorem ipsum</p>
                </div>
                <div class="flex flex-col items-center justify-center w-[33%] py-[0.75vw] border-r-1 border-r-gray-600">
                    <h2 class="text-[3vw] font-bold">89.3k</h2>
                    <p>lorem ipsum</p>
                </div>
                <div class="flex flex-col items-center justify-center w-[33%]">
                    <h2 class="text-[3vw] font-bold">2900+</h2>
                    <p>lorem ipsum</p>
                </div>
            </div>
        </div>

        <div class="flex gap-[5vw]  pl-[7.5vw] py-[5vw] bg-yellow-2 mb-[3vw]">
            <div class="flex flex-col w-[35vw] gap-[2vw]">
                <h1 class="text-[4vw] leading-tight font-bold text-green-2">PRODUK TERLARIS</h1>
                <p class="text-green-2">Jangan sampai ketinggalan! Temukan koleksi best seller ramah lingkungan yang paling diminati di GREVO marketplace sekarang juga. Dari barang-barang kebutuhan sehari-hari hingga produk gaya hidup berkelanjutan, semua yang Anda butuhkan ada di sini.</p>
                <button class="cursor-pointer w-fit font-bold px-[3vw] py-[0.5vw] text-[1.5vw] text-orange-1 border border-orange-1 hover:border-0 hover:bg-orange-1 hover:text-white mt-[1vw]">
                    <a href="/products">
                        Lihat Selengkapnya
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </button>
            </div>
 
            <div class="flex gap-[3vw] w-[80vw] overflow-auto">
                <div class="flex flex-col gap-[0.5vw] p-[1vw] pb-[2vw] bg-green-2 w-[20vw] h-fit flex-shrink-0">
                    <div class="relative w-full">
                        <img src="{{ asset('images/home_bestseller1.png') }}" alt="Best Seller" class="w-[20vw] h-[18vw]">
                        <p class="absolute bottom-0 right-0 text-[1.1vw] text-white font-bold px-[1.5vw] py-[0.25vw] bg-orange-1">IDR 20.000</p>
                    </div>
                    <h2 class="text-[2vw] font-bold text-white">Sikat Gigi</h2>
                    <p class="text-[1vw] text-white">Sikat gigi bambu alami dengan bulu biodegradable & menjaga senyum tetap cerah.</p>
                </div>

                <div class="flex flex-col gap-[0.5vw] p-[1vw] pb-[2vw] bg-green-2 w-[20vw] h-fit flex-shrink-0">
                    <div class="relative w-full">
                        <img src="{{ asset('images/home_katalog1.png') }}" alt="Best Seller" class="w-[20vw] h-[18vw]">
                        <p class="absolute bottom-0 right-0 text-[1.1vw] text-white font-bold px-[1.5vw] py-[0.25vw] bg-orange-1">IDR 20.000</p>
                    </div>
                    <h2 class="text-[2vw] font-bold text-white">Sikat Gigi</h2>
                    <p class="text-[1vw] text-white">Sikat gigi bambu alami dengan bulu biodegradable & menjaga senyum tetap cerah.</p>
                </div>

                <div class="flex flex-col gap-[0.5vw] p-[1vw] pb-[2vw] bg-green-2 w-[20vw] h-fit flex-shrink-0">
                    <div class="relative w-full">
                        <img src="{{ asset('images/home_katalog2.png') }}" alt="Best Seller" class="w-[20vw] h-[18vw]">
                        <p class="absolute bottom-0 right-0 text-[1.1vw] text-white font-bold px-[1.5vw] py-[0.25vw] bg-orange-1">IDR 20.000</p>
                    </div>
                    <h2 class="text-[2vw] font-bold text-white">Sikat Gigi</h2>
                    <p class="text-[1vw] text-white">Sikat gigi bambu alami dengan bulu biodegradable & menjaga senyum tetap cerah.</p>
                </div>
            </div>
        </div>

        <div class="flex flex-col items-center gap-[3vw]">
            <h1 class="text-[4.5vw] font-bold text-green-2">AKTIVITAS RAMAH LINGKUNGAN</h1>
            <div class="flex items-center gap-[7vw] w-full bg-green-2 px-[7.5vw] py-[5vw]">
                <div class="flex flex-col w-[35vw] gap-[1vw]">
                    <h2 class="text-yellow-1 text-[4.5vw] leading-tight font-bold mb-[1vw]">Ubah Poin untuk mengadopsi Pohon!</h2>
                    <p class="text-white mb-[1.5vw]">
                        Satu Klik, Satu Pohon Ditanam! <br>
                        Di Grevo, setiap pembelian yang Anda lakukan tidak hanya berarti mendapatkan produk ramah lingkungan terbaik, tetapi juga ikut serta dalam misi #GrevoReforestation kami! Kami percaya alam adalah aset terbesar kita. Oleh karena itu, sebagian dari pembelian Anda akan dialokasikan untuk upaya reboisasi, menanam kembali kehidupan di daerah-daerah yang paling membutuhkannya.</p>
                    <button class="font-bold w-fit px-[3vw] py-[0.5vw] text-[1.5vw] text-yellow-1 border border-yellow-1 hover:border-0 hover:bg-yellow-1 hover:text-green-2">
                        <a href="/trees">
                            Lihat Selengkapnya
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </button>
                </div>
                <div >
                    <img src="{{ asset('images/home_green1.png') }}" alt="Reboisasi1" class="w-[25vw] h-[25vw] object-cover">
                    <img src="{{ asset('images/home_green2.png') }}" alt="Reboisasi2" class="w-[23vw] h-[25vw] object-cover mt-[-15vw] ml-[20vw]">
                </div>
            </div>

        </div>
    </div>

    <script>
        const closeButtons = document.querySelectorAll('.close-button');

        closeButtons.forEach((button) => {
            button.addEventListener('click', function() {
                const alert = button.closest('.alert')
                alert.style.display = "none";
            });
        });
    </script>
</x-layout>