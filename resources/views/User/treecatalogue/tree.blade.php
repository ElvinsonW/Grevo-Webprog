{{-- resources/views/User/treecatalogue/tree.blade.php --}}
<x-layout>
    <div class="flex mx-[5vw] my-[2vw]">
        {{-- Left Sidebar: Filters --}}
        <div class="w-[16vw] h-fit px-[1.5vw] pt-[2vw] pb-[3vw] bg-[var(--color-yellow-2)] rounded-[1vw] mr-[2vw]">
            <h2 class="text-[1.8vw] font-bold text-[var(--color-green-2)] mb-[1.5vw]">FILTERS</h2>

            {{-- Form for Filters --}}
            <form action="{{ url('/trees') }}" method="GET">
                <div class="flex flex-col gap-[1vw] mb-[2vw]">
                    <h3 class="text-[1.2vw] font-semibold text-gray-700">Organization</h3>
                    <div class="flex flex-col gap-[0.5vw] ml-[0.5vw]">
                        {{-- All Organizations --}}
                        <label class="inline-flex items-center text-[1vw] text-gray-700 cursor-pointer">
                            <input type="radio"
                                   name="organization_id"
                                   value=""
                                   onchange="this.form.submit()"
                                   {{ (empty(request()->query('organization_id'))) ? 'checked' : '' }}>
                            <span class="ml-[0.5vw]">All Organizations</span>
                        </label>

                        {{-- Dynamic Organization List --}}
                        @foreach ($organizations as $org)
                            <label class="inline-flex items-center text-[1vw] text-gray-700 cursor-pointer">
                                <input type="radio"
                                       name="organization_id"
                                       value="{{ $org->organization_id }}"
                                       onchange="this.form.submit()"
                                       {{ request()->query('organization_id') == $org->organization_id ? 'checked' : '' }}>
                                <span class="ml-[0.5vw]">{{ $org->organization_name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </form>
        </div>

        {{-- Right Content --}}
        <div class="flex flex-col w-full">
            <div class="flex items-center text-[1.2vw] font-bold text-gray-700 mb-[2vw]">
                <p>My Points:</p>
                <span class="ml-[0.5vw] text-[var(--color-green-3)]">200 pts</span>
            </div>

            {{-- Product Grid --}}
            <div>
                <div class="flex flex-wrap gap-[1.5vw]" id="products-grid">
                    @forelse ($trees as $product)
                        <a href="/adoption/{{ $product->treename }}"
                           class="flex flex-col gap-3 p-3 pb-4 bg-green-2 w-[196px] h-[280px] flex-shrink-0 product-card"
                           style="box-shadow: 0px 4px 4px 2px rgba(0,0,0,0.25);">
                            <div class="relative w-full">
                                <img src="{{ asset('storage/' . ($product->treephoto ?? 'images/product-placeholder.jpg')) }}"
                                     alt="{{ $product->treename }}"
                                     class="w-[210px] h-[168px] object-cover">
                                <p class="absolute bottom-0 right-0 text-xs text-white font-bold px-3 py-1 bg-orange-1">
                                    PTS {{ number_format($product->treeprice) }}</p>
                            </div>
                            <h2 class="text-base font-bold text-white truncate">{{ $product->treename }}</h2>
                            <p class="text-xs text-white line-clamp-2 leading-tight">
                                {{ \Illuminate\Support\Str::limit($product->treedesc, 55) }}
                            </p>
                        </a>
                    @empty
                        <p class="text-gray-600 text-lg">No trees found matching your filters.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layout>
