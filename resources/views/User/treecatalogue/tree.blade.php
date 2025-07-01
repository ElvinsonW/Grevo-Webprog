{{-- resources/views/User/treecatalogue/tree.blade.php --}}
<x-layout>
    <div class="flex mx-[5vw] my-[2vw]">
        {{-- Left Sidebar: Filters --}}
        <div class="w-[16vw] h-fit px-[1.5vw] pt-[2vw] pb-[3vw] bg-[var(--color-yellow-2)] rounded-[1vw] mr-[2vw]">
            <h2 class="text-[1.8vw] font-bold text-[var(--color-green-2)] mb-[1.5vw]">FILTERS</h2>

            <div class="flex flex-col gap-[1vw] mb-[2vw]">
                <h3 class="text-[1.2vw] font-semibold text-gray-700">Organization</h3>
                <div class="flex flex-col gap-[0.5vw] ml-[0.5vw]">
                    {{-- Loop for dynamic organization filters --}}
                    @for ($i = 1; $i <= 3; $i++)
                        <label class="inline-flex items-center text-[1vw] text-gray-700 cursor-pointer">
                            {{-- Add a unique value and class for JS targeting --}}
                            <input type="checkbox" class="form-checkbox text-[var(--color-green-3)] rounded focus:ring-[var(--color-green-3)] organization-filter" value="{{ $i }}">
                            <span class="ml-[0.5vw]">Organization {{ $i }}</span>
                        </label>
                    @endfor
                </div>
            </div>

            <div class="flex items-center gap-[0.5vw]">
                {{-- Add an ID for JS targeting --}}
                <input type="checkbox" id="redeemable-filter" class="form-checkbox text-[var(--color-green-3)] rounded focus:ring-[var(--color-green-3)]" checked>
                <span class="text-[1vw] text-gray-700">Only show redeemable</span>
            </div>
        </div>

        {{-- Right Content: Tree Catalogue / Products Catalogue --}}
        <div class="flex flex-col w-full">
            {{-- My Points Section --}}
            <div class="flex items-center text-[1.2vw] font-bold text-gray-700 mb-[2vw]">
                <p>My Points:</p>
                <span class="ml-[0.5vw] text-[var(--color-green-3)]">200 pts</span>
            </div>

            {{-- Products Grid --}}
            <div>
                <div class="flex flex-wrap gap-[1.5vw]" id="products-grid"> {{-- Add an ID to the grid container --}}
                    @php
                        // Placeholder data for products, mimicking a database collection
                        // IMPORTANT: In your actual application, this data will come from your Controller
                        // ADDED 'organization_id' and 'is_redeemable' for filtering
                        $products = [
                            (object)[
                                'id' => 1,
                                'name' => 'Oak Tree Sapling',
                                'slug' => 'oak-tree-sapling',
                                'description' => 'A young oak tree, perfect for planting in your garden. Known for its strong wood and longevity.',
                                'image_path' => 'images/oaktree.jpg',
                                'product_variants' => collect([(object)['price' => 4000]]),
                                'organization_id' => 1, // Example: belongs to Organization 1
                                'is_redeemable' => true // Example: can be redeemed
                            ],
                            (object)[
                                'id' => 2,
                                'name' => 'Japanese Maple',
                                'slug' => 'japanese-maple',
                                'description' => 'Beautiful ornamental tree with vibrant red leaves in autumn. Ideal for small gardens.',
                                'image_path' => 'images/japanesemaple.jpg',
                                'product_variants' => collect([(object)['price' => 5000]]),
                                'organization_id' => 2, // Example: belongs to Organization 2
                                'is_redeemable' => false // Example: cannot be redeemed
                            ],
                            (object)[
                                'id' => 3,
                                'name' => 'Pine Tree',
                                'slug' => 'pine-tree',
                                'description' => 'Evergreen tree with needle-like leaves, common in temperate climates. Grows tall and provides shade.',
                                'image_path' => 'images/pinetree.jpg',
                                'product_variants' => collect([(object)['price' => 3000]]),
                                'organization_id' => 1,
                                'is_redeemable' => true
                            ],
                            (object)[
                                'id' => 4,
                                'name' => 'Willow Tree',
                                'slug' => 'willow-tree',
                                'description' => 'Graceful tree often found near water, known for its drooping branches and rapid growth.',
                                'image_path' => 'images/willowtree.jpg',
                                'product_variants' => collect([(object)['price' => 4500]]),
                                'organization_id' => 3, // Example: belongs to Organization 3
                                'is_redeemable' => true
                            ],
                            (object)[
                                'id' => 5,
                                'name' => 'Cherry Blossom',
                                'slug' => 'cherry-blossom',
                                'description' => 'Famous for its stunning pink and white flowers in spring, a symbol of renewal.',
                                'image_path' => 'images/cherryblossom.jpg',
                                'product_variants' => collect([(object)['price' => 4000]]),
                                'organization_id' => 2,
                                'is_redeemable' => false
                            ],
                            (object)[
                                'id' => 6,
                                'name' => 'Palm Tree',
                                'slug' => 'palm-tree',
                                'description' => 'Tropical tree, perfect for adding a touch of exotic beauty to warmer climates.',
                                'image_path' => 'images/palmtree.jpg',
                                'product_variants' => collect([(object)['price' => 600]]),
                                'organization_id' => 1,
                                'is_redeemable' => true
                            ],
                            (object)[
                                'id' => 7,
                                'name' => 'Bonsai Starter Kit',
                                'slug' => 'bonsai-starter-kit',
                                'description' => 'Begin your bonsai journey with this complete starter kit. Includes a young tree, pot, and tools.',
                                'image_path' => 'images/bonsaikit.jpg',
                                'product_variants' => collect([(object)['price' => 1200]]),
                                'organization_id' => 3,
                                'is_redeemable' => true
                            ],
                            (object)[
                                'id' => 8,
                                'name' => 'Fruit Tree (Apple)',
                                'slug' => 'fruit-tree-apple',
                                'description' => 'Grow your own fresh apples! A healthy and rewarding addition to any garden.',
                                'image_path' => 'images/appletree.jpg',
                                'product_variants' => collect([(object)['price' => 2000]]),
                                'organization_id' => 2,
                                'is_redeemable' => true
                            ],
                        ];
                    @endphp

                    @foreach ($products as $product)
                        <a href="/adoption/{{ $product->slug }}"
                           class="flex flex-col gap-3 p-3 pb-4 bg-green-2 w-[196px] h-[280px] flex-shrink-0 product-card"
                           style="box-shadow: 0px 4px 4px 2px rgba(0,0,0,0.25);"
                           data-organization-id="{{ $product->organization_id }}" {{-- Add data attribute for organization --}}
                           data-is-redeemable="{{ $product->is_redeemable ? 'true' : 'false' }}"> {{-- Add data attribute for redeemable --}}
                            <div class="relative w-full">
                                <img src="{{ asset($product->image_path ?? 'images/product-placeholder.jpg') }}" alt="{{ $product->name }}" class="w-[210px] h-[168px] object-cover">
                                <p class="absolute bottom-0 right-0 text-xs text-white font-bold px-3 py-1 bg-orange-1">PTS {{ number_format($product->product_variants->first()->price) }}</p>
                            </div>
                            <h2 class="text-base font-bold text-white truncate">{{ $product->name }}</h2>
                            <p class="text-xs text-white line-clamp-2 leading-tight">{{ Str::limit($product->description, 55) }}</p>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-layout>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const organizationFilters = document.querySelectorAll('.organization-filter');
        const redeemableFilter = document.getElementById('redeemable-filter');
        const productCards = document.querySelectorAll('.product-card'); // All product cards

        function applyFilters() {
            const selectedOrganizations = Array.from(organizationFilters)
                                            .filter(checkbox => checkbox.checked)
                                            .map(checkbox => parseInt(checkbox.value));

            const showOnlyRedeemable = redeemableFilter.checked;

            productCards.forEach(card => {
                const cardOrganizationId = parseInt(card.dataset.organizationId);
                const cardIsRedeemable = card.dataset.isRedeemable === 'true'; // Convert string 'true'/'false' to boolean

                let isVisible = true;

                // Filter by Organization
                if (selectedOrganizations.length > 0 && !selectedOrganizations.includes(cardOrganizationId)) {
                    isVisible = false;
                }

                // Filter by Redeemable
                if (showOnlyRedeemable && !cardIsRedeemable) {
                    isVisible = false;
                }

                // Show or hide the card
                if (isVisible) {
                    card.style.display = 'flex'; // Show card (using flex display for the card layout)
                } else {
                    card.style.display = 'none'; // Hide card
                }
            });
        }

        // Add event listeners to all filter checkboxes
        organizationFilters.forEach(checkbox => {
            checkbox.addEventListener('change', applyFilters);
        });

        redeemableFilter.addEventListener('change', applyFilters);

        // Initial application of filters when the page loads (to respect checked filters like "Only show redeemable")
        applyFilters();
    });
</script>
@endpush