{{-- resources/views/User/treecatalogue/tree.blade.php --}}
<x-layout>
    <div class="flex mx-[5vw] my-[2vw]">
        {{-- Left Sidebar: Filters --}}
        <div class="w-[16vw] h-fit px-[1.5vw] pt-[2vw] pb-[3vw] bg-[var(--color-yellow-2)] rounded-[1vw] mr-[2vw]">
            <h2 class="text-[1.8vw] font-bold text-[var(--color-green-2)] mb-[1.5vw]">FILTERS</h2>

            {{-- Form for Filters --}}
            <form id="filter-form" action="{{ route('tree.index2') }}" method="GET"> {{-- Ensure 'tree.index2' is your correct route name --}}
                <div class="flex flex-col gap-[1vw] mb-[2vw]">
                    <h3 class="text-[1.2vw] font-semibold text-gray-700">Organization</h3>
                    <div class="flex flex-col gap-[0.5vw] ml-[0.5vw]">
                        {{-- "All Organizations" Radio Button (for single selection) --}}
                        <label class="inline-flex items-center text-[1vw] text-gray-700 cursor-pointer">
                            <input type="radio"
                                class="form-radio text-[var(--color-green-3)] rounded focus:ring-[var(--color-green-3)] organization-filter-radio"
                                name="organization_id"
                                value="" {{-- Empty value means no organization filter --}}
                                {{-- Check if no specific organization is selected in the URL, or if it's explicitly an empty string --}}
                                {{ (empty(request()->query('organization_id')) || request()->query('organization_id') === '') ? 'checked' : '' }}
                            >
                            <span class="ml-[0.5vw]">All Organizations</span>
                        </label>

                        {{-- Loop for dynamic organization filters --}}
                        @foreach ($organizations as $org)
                            <label class="inline-flex items-center text-[1vw] text-gray-700 cursor-pointer">
                                <input type="radio"
                                    class="form-radio text-[var(--color-green-3)] rounded focus:ring-[var(--color-green-3)] organization-filter-radio"
                                    name="organization_id"
                                    value="{{ $org->organization_id }}" {{-- Use organization_id as the value --}}
                                    {{-- Check this radio button if it matches the selected organization from the URL --}}
                                    {{ (isset($selectedOrganization) && $selectedOrganization->organization_id === $org->organization_id) ? 'checked' : '' }}>
                                <span class="ml-[0.5vw]">{{ $org->organization_name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- REMOVED: Redeemable Filter Checkbox Section --}}

                {{-- The hidden submit button is good to keep for the JS auto-submit --}}
                <button type="submit" class="hidden" id="filter-submit-btn"></button>
            </form>
        </div>

        {{-- Right Content: Tree Catalogue / Products Catalogue --}}
        <div class="flex flex-col w-full">
            {{-- My Points Section --}}
            <div class="flex items-center text-[1.2vw] font-bold text-gray-700 mb-[2vw]">
                <p>My Points:</p>
                <span class="ml-[0.5vw] text-[var(--color-green-3)]">200 pts</span> {{-- You'll need to pass user points from controller --}}
            </div>

            {{-- Products Grid --}}
            <div>
                <div class="flex flex-wrap gap-[1.5vw]" id="products-grid">
                    @forelse ($tree as $product) {{-- Loop through FILTERED trees --}}
                        <a href="/adoption/{{ $product->treename }}" {{-- Adjust slug based on your Tree model --}}
                           class="flex flex-col gap-3 p-3 pb-4 bg-green-2 w-[196px] h-[280px] flex-shrink-0 product-card"
                           style="box-shadow: 0px 4px 4px 2px rgba(0,0,0,0.25);">
                            <div class="relative w-full">
                                {{-- Image Path Fix (retained from previous fix) --}}
                                <img src="{{ asset('storage/' . ($product->treephoto ?? 'images/product-placeholder.jpg')) }}"
                                     alt="{{ $product->treename }}"
                                     class="w-[210px] h-[168px] object-cover">
                                <p class="absolute bottom-0 right-0 text-xs text-white font-bold px-3 py-1 bg-orange-1">PTS {{ number_format($product->treeprice) }}</p>
                            </div>
                            <h2 class="text-base font-bold text-white truncate">{{ $product->treename }}</h2>
                            <p class="text-xs text-white line-clamp-2 leading-tight">{{ Str::limit($product->treedesc, 55) }}</p>
                        </a>
                    @empty
                        <p class="text-gray-600 text-lg">No trees found matching your filters.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layout>

{{-- Minimal JavaScript to auto-submit the form --}}
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterForm = document.getElementById('filter-form');
        const organizationRadios = document.querySelectorAll('.organization-filter-radio');
        // REMOVED: const redeemableFilter = document.getElementById('redeemable-filter');

        // Function to submit the form
        function submitForm() {
            filterForm.submit();
        }

        // Add event listeners to radio buttons to submit the form on change
        organizationRadios.forEach(radio => {
            radio.addEventListener('change', submitForm);
        });

        // REMOVED: redeemableFilter.addEventListener('change', submitForm);
    });
</script>
@endpush