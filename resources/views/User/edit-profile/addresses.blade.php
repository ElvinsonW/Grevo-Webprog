<x-layout>
    <div class="flex mx-[5vw] my-[2vw]">
        {{-- Left Content: Sidebar (Menggunakan komponen Blade) --}}
        {{-- Pastikan variabel $user dilewatkan ke komponen profilebar --}}
        <x-profilebar :user="$user" />

        {{-- Right Content: Addresses --}}
        <div class="flex flex-col ml-[2vw] w-full">
            {{-- Filter Bar --}}
            <div class="flex border-b border-gray-300 mb-[3vw] text-[1.2vw]">
                <a href="{{ route('profile') }}" class="py-[0.75vw] px-[2vw] text-gray-600 hover:text-[var(--color-green-3)] border-r border-gray-300">Profile</a>
                <a href="{{ route('addresses') }}" class="py-[0.75vw] px-[2vw] text-[var(--color-green-3)] font-bold border-b-[0.2vw] border-[var(--color-green-3)] -mb-px">Addresses</a>
            </div>

            <h1 class="text-[2vw] font-bold mb-[3vw]">Addresses</h1>

            {{-- Address List Container --}}
            <div class="grid grid-cols-1 gap-[1vw]">
                {{-- Loop through addresses --}}
                @forelse ($addresses as $address)
                <div class="border border-gray-300 rounded-[0.5vw] p-[1.5vw] flex flex-col lg:flex-row justify-between items-start lg:items-center bg-white shadow-sm">
                    <div class="flex-grow">
                        <p class="text-[1.2vw] font-semibold text-gray-800">{{ $address->recipient_name }} <span class="ml-[0.5vw] text-gray-600">{{ $address->phone_number }}</span></p>
                        <p class="text-[0.9vw] text-gray-700 mt-[0.25vw]">{{ $address->street_address }}</p>
                        <p class="text-[0.9vw] text-gray-500">{{ $address->province }}, {{ $address->city }}, {{ $address->district }}, {{ $address->postal_code }}</p>

                        <div class="flex items-center gap-[0.5vw] mt-[0.5vw]">
                            @if ($address->is_default)
                                <span class="px-[1vw] py-[0.25vw] text-[0.8vw] font-semibold rounded-full" style="background-color: var(--color-green-1); color: var(--color-green-2);">Default</span>
                            @endif
                            @if ($address->label)
                                <span class="px-[1vw] py-[0.25vw] text-[0.8vw] font-semibold rounded-full bg-gray-200 text-gray-700">{{ $address->label }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                    <p class="text-gray-500 text-[1vw] text-center py-[2vw]">No addresses found.</p>
                @endforelse
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // JavaScript for sidebar dropdown
        // Pindahkan script ini ke dalam komponen profilebar jika hanya terkait dengan sidebar
        // Jika script ini perlu tetap di addresses.blade.php karena alasan lain, biarkan saja.
        const toggle = document.getElementById('profile-menu');
        const menu = document.getElementById('profile-dropdown');
        const icon = document.getElementById('dropdown-icon')

        if (toggle && menu && icon) { // Pastikan elemen ada sebelum menambahkan event listener
            toggle.addEventListener('click', () => {
                menu.classList.toggle('hidden');
                menu.classList.toggle('flex');
                icon.classList.toggle('rotate-180');
            });
        }
    </script>
    @endpush
</x-layout>