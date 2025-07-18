<div class="p-6 ml-[5vw]">
    @if ($step === 1)
        <!-- Step 1: Basic Info -->
        <h1 class="text-4xl font-bold ml-[2vw]">Informasi Dasar</h1>
        <div class="flex flex-row gap-4 w-full p-8">
            <!-- Left Column -->
            <div class="space-y-4 w-1/2 border border-green-2 p-6 rounded-md">
                <div>
                    <label class="block text-sm font-medium">Nama Produk</label>
                    <input type="text" wire:model="name" class="w-full border border-green-2 rounded px-3 py-2" />
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium">Kategori</label>
                    <select wire:model="category" class="w-full border border-green-2 rounded px-3 py-2 bg-yellow-2">
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    @error('category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium">Deskripsi</label>
                    <textarea wire:model="description" class="w-full border border-green-2 rounded px-3 py-2"></textarea>
                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium">Material</label>
                    <input type="text" wire:model="material" class="w-full border border-green-2 rounded px-3 py-2" />
                    @error('material') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium">Massa (grams)</label>
                    <input type="number" wire:model="weight" class="w-full border border-green-2 rounded px-3 py-2" />
                    @error('weight') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-4 w-1/2 border border-green-2 p-6 rounded-md">
                <div>
                    <label class="block text-sm font-medium">Sertifikat</label>
                    <input type="text" wire:model="certificate" class="w-full border border-green-2 rounded px-3 py-2" />
                    @error('certificate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium">Proses</label>
                    <input type="text" wire:model="process" class="w-full border border-green-2 rounded px-3 py-2" />
                    @error('process') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Image Upload -->
                <div>
                    <label class="block text-sm font-medium">
                        Gambar Produk ({{ count($images) }}/8)
                    </label>
                    <div class="relative mt-2">
                        <input 
                            id="imagesUpload" 
                            type="file" 
                            wire:model="imagesUpload" 
                            multiple 
                            class="hidden" 
                            accept="image/*"
                            required/>
                        <label 
                            for="imagesUpload"
                            class="cursor-pointer inline-block px-4 py-2 bg-green-2 text-white rounded-md hover:bg-green-3 transition-all font-medium">
                            Unggah Gambar
                        </label>
                        @error('imagesUpload') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                    </div>

                    <div class="grid grid-cols-4 gap-4 mt-2">
                        @foreach ($images as $index => $img)
                            <div class="relative">
                                <img src="{{ $img->temporaryUrl() }}" class="w-full h-24 object-cover rounded border" />
                                <button type="button" wire:click="removeImage({{ $index }})"
                                        class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center">x</button>
                            </div>
                        @endforeach

                        @for ($i = count($images); $i < 8; $i++)
                            <div class="w-full h-24 border border-dashed rounded flex items-center justify-center text-gray-400">
                                Kosong
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    
    @elseif ($step === 2)
    <div class="w-[80vw] ml-[2vw]">
        <h1 class="text-4xl font-bold mb-4">Informasi Penjualan</h1>

        <!-- Toggle for No Variants -->
        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" wire:model="hasVariants" class="form-checkbox">
                <span class="ml-2 text-sm font-medium">Aktifkan varian ukuran atau warna</span>
            </label>
        </div>

        <div class="border border-green-300 rounded-md p-4 space-y-4 bg-green-50">
            <!-- SIZE Input -->
            <div>
                <label class="block font-semibold">Ukuran</label>
                <div class="flex gap-2 my-2">
                    <input type="text" wire:model="newSize" wire:keydown.enter.prevent="addSize"
                        class="border border-gray-400 rounded px-2 py-1 w-1/2"
                        placeholder="Tambah Ukuran (Tekan Enter)" />
                    <button wire:click="addSize" type="button"
                        class="bg-black text-white px-3 py-1 rounded hover:bg-gray-600">+</button>
                </div>
                <div class="flex flex-wrap gap-2 p-2 border rounded">
                    @foreach ($sizes as $index => $size)
                        <div class="flex items-center bg-white border rounded px-3 py-1">
                            {{ $size }}
                            <button wire:click="removeSize({{ $index }})" type="button"
                                class="ml-2 text-red-600 font-bold">✕</button>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- COLOR Input -->
            <div>
                <label class="block font-semibold">Warna</label>
                <div class="flex gap-2 my-2">
                    <input type="text" wire:model="newColor" wire:keydown.enter.prevent="addColor"
                        class="border border-gray-400 rounded px-2 py-1 w-1/2"
                        placeholder="Tambah Warna (Tekan Enter)" />
                    <button wire:click="addColor" type="button"
                        class="bg-black text-white px-3 py-1 rounded hover:bg-gray-600" >+</button>
                </div>
                <div class="flex flex-wrap gap-2 p-2 border rounded">
                    @foreach ($colors as $index => $color)
                        <div class="flex items-center bg-white border rounded px-3 py-1">
                            {{ $color }}
                            <button wire:click="removeColor({{ $index }})" type="button"
                                class="ml-2 text-red-600 font-bold">✕</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="flex flex-col">
            @error('sizes') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            @error('colors') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
    </div>



    @elseif ($step === 3)
    <div class="space-y-4 w-[80vw] ml-[2vw]">
        <h1 class="text-4xl font-bold mb-4">Informasi Varian</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @if (!$hasVariants)
                <!-- Single variant -->
                <div class="border border-green-300 bg-green-50 rounded-md p-4">
                    <h3 class="font-semibold mb-3">Satu Varian - {{ $name }}</h3>
                    <div class="space-y-3">
                        <div>
                            <label class="block font-medium">Stok</label>
                            <input type="number" wire:model="singleStock"
                                class="w-full border rounded px-3 py-2" />
                        </div>
                        <div>
                            <label class="block font-medium">Harga</label>
                            <input type="number" wire:model="singlePrice"
                                class="w-full border rounded px-3 py-2" />
                        </div>
                        <div>
                            <label class="block font-medium">SKU</label>
                            <input type="text" wire:model="singleSku"
                                class="w-full border rounded px-3 py-2" />
                        </div>
                    </div>
                </div>
            @else
                <!-- Variant combinations -->
                @foreach ($variantData as $key => $data)
                    @php
                        $parts = explode('|', $key);
                        $size = $parts[0] ?? null;
                        $color = $parts[1] ?? null;

                        $label = [];
                        if ($size) $label[] = "Size = $size";
                        if ($color) $label[] = "Color = $color";
                    @endphp
                    <div class="border border-green-300 bg-green-50 rounded-md p-4">
                        <h3 class="font-semibold mb-3">{{ implode(', ', $label) }}</h3>
                        <div class="space-y-3">
                            <div>
                                <label class="block font-medium">Stok</label>
                                <input type="number" wire:model="variantData.{{ $key }}.stock"
                                    class="w-full border rounded px-3 py-2" />
                            </div>
                            <div>
                                <label class="block font-medium">Harga</label>
                                <input type="number" wire:model="variantData.{{ $key }}.price"
                                    class="w-full border rounded px-3 py-2" />
                            </div>
                            <div>
                                <label class="block font-medium">SKU</label>
                                <input type="text" wire:model="variantData.{{ $key }}.sku"
                                    class="w-full border rounded px-3 py-2" />
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endif


    <!-- Navigation -->
    <div class="flex justify-between pt-3 ml-[2vw]">
        @if ($step > 1)
            <button type="button" wire:click="previousStep"
                class="bg-green-2 hover:bg-green-3 text-white font-semibold py-2 px-4 rounded mr-[2vw]">
                Kembali
            </button>
        @endif

        @if ($step < 3)
            <button type="button" wire:click="nextStep"
                class="bg-green-2 hover:bg-green-3 text-white font-semibold py-2 px-4 rounded mr-[7.5vw]">
                Selanjutnya
            </button>
        @else
            <button type="button" wire:click="store"
                class="bg-green-2 hover:bg-green-3 text-white font-semibold py-2 px-4 rounded mr-[7.5vw]">
                Unggah Produk
            </button>
        @endif
    </div>
</div>
