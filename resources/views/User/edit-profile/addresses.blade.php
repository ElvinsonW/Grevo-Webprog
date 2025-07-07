<x-layout>
    <div class="flex mx-[5vw] my-[2vw]">
        <x-profilebar :user="$user" />

        <div class="flex flex-col ml-[2vw] w-full">
            {{-- Filter Bar --}}
            <div class="flex border-b border-gray-300 mb-[3vw] text-[1.2vw]">
                <a href="{{ route('profile') }}" class="py-[0.75vw] px-[2vw] text-gray-600 hover:text-[var(--color-green-3)] border-r border-gray-300">Profile</a>
                <a href="{{ route('addresses') }}" class="py-[0.75vw] px-[2vw] text-[var(--color-green-3)] font-bold border-b-[0.2vw] border-[var(--color-green-3)] -mb-px">Addresses</a>
            </div>

            <h1 class="text-[2vw] font-bold mb-[3vw]">Addresses</h1>

            {{-- Pesan Sukses (jika ada) --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-[1vw]" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="this.closest('[role=alert]').remove()">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.15a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.15 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
            @endif

            {{-- Address List Container --}}
            <div class="grid grid-cols-1 gap-[1vw]">
                @forelse ($addresses as $address)
                <div class="border border-gray-300 rounded-[0.5vw] p-[1.5vw] flex flex-col lg:flex-row justify-between items-start lg:items-center bg-white shadow-sm"
                     data-id="{{ $address->id }}"
                     data-recipient-name="{{ $address->recipient_name }}"
                     data-phone-number="{{ $address->phone_number }}"
                     data-street-address="{{ $address->street_address }}"
                     data-city="{{ $address->city }}"
                     data-province="{{ $address->province }}"
                     data-urban-village="{{ $address->urban_village }}"
                     data-subdistrict="{{ $address->subdistrict }}"
                     data-label="{{ $address->label }}"
                     data-is-default="{{ $address->is_default ? 'true' : 'false' }}">

                    <div class="flex-grow">
                        <p class="text-[1.2vw] font-semibold text-gray-800">{{ $address->recipient_name }} <span class="ml-[0.5vw] text-gray-600">{{ $address->phone_number }}</span></p>
                        <p class="text-[0.9vw] text-gray-700 mt-[0.25vw]">{{ $address->street_address }}</p>
                        <p class="text-[0.9vw] text-gray-500">
                            {{ implode(', ', array_filter([
                                $address->urban_village,
                                $address->subdistrict,
                                $address->city,
                                $address->province
                            ])) }}
                        </p>

                        <div class="flex items-center gap-[0.5vw] mt-[0.5vw]">
                            @if ($address->is_default)
                                <span class="px-[1vw] py-[0.25vw] text-[0.8vw] font-semibold rounded-full" style="background-color: var(--color-green-1); color: var(--color-green-2);">Default</span>
                            @endif
                            @if ($address->label)
                                <span class="px-[1vw] py-[0.25vw] text-[0.8vw] font-semibold rounded-full bg-gray-200 text-gray-700">{{ $address->label }}</span>
                            @endif
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex flex-col lg:flex-row items-end lg:items-center gap-[0.5vw] mt-[1vw] lg:mt-0 lg:ml-[2vw]">
                        <button type="button" class="edit-address-btn text-[0.9vw] text-gray-500 hover:text-blue-600">Edit</button>
                        <form action="{{ route('addresses.destroy', $address) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this address?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-[0.9vw] text-gray-500 hover:text-red-600">Delete</button>
                        </form>
                        @if (!$address->is_default)
                            <form action="{{ route('addresses.setDefault', $address) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-[1.2vw] py-[0.5vw] text-[0.9vw] rounded-[0.3vw] border border-gray-300 text-gray-600 hover:bg-gray-100">Set as Default</button>
                            </form>
                        @endif
                    </div>
                </div>
                @empty
                    <p class="text-gray-500 text-[1vw] text-center py-[2vw]">No addresses found.</p>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Include the modal partial (sesuaikan path jika Anda simpan di tempat lain) --}}
    @include('partials.address-edit-modal')

    @push('scripts')
    <script>
        // JavaScript for sidebar dropdown (unchanged)
        const toggle = document.getElementById('profile-menu');
        const menu = document.getElementById('profile-dropdown');
        const icon = document.getElementById('dropdown-icon')

        if (toggle && menu && icon) {
            toggle.addEventListener('click', () => {
                menu.classList.toggle('hidden');
                menu.classList.toggle('flex');
                icon.classList.toggle('rotate-180');
            });
        }

        // JavaScript for Edit Address Modal
        const editModal = document.getElementById('editAddressModal');
        const closeModalBtn = document.getElementById('closeModal');
        const cancelModalBtn = document.getElementById('cancelModal');
        const addressForm = document.getElementById('editAddressForm');

        document.querySelectorAll('.edit-address-btn').forEach(button => {
            button.addEventListener('click', function() {
                const addressDiv = this.closest('[data-id]');
                if (!addressDiv) {
                    console.error('Error: Parent div with data-id not found for edit button.');
                    return;
                }

                const addressId = addressDiv.dataset.id;
                const recipientName = addressDiv.dataset.recipientName;
                const phoneNumber = addressDiv.dataset.phoneNumber;
                const streetAddress = addressDiv.dataset.streetAddress;
                const city = addressDiv.dataset.city;
                const province = addressDiv.dataset.province;
                const urbanVillage = addressDiv.dataset.urbanVillage;
                const subdistrict = addressDiv.dataset.subdistrict;
                const label = addressDiv.dataset.label;
                const isDefault = addressDiv.dataset.isDefault === 'true';

                // Isi formulir modal dengan data alamat
                document.getElementById('edit_recipient_name').value = recipientName;
                document.getElementById('edit_phone_number').value = phoneNumber;
                document.getElementById('edit_street_address').value = streetAddress;
                document.getElementById('edit_city').value = city;
                document.getElementById('edit_province').value = province;
                document.getElementById('edit_urban_village').value = urbanVillage;
                document.getElementById('edit_subdistrict').value = subdistrict;

                // Set label radio button
                const labelRadios = document.querySelectorAll('input[name="edit_label"]');
                labelRadios.forEach(radio => {
                    radio.checked = (radio.value === label);
                });

                document.getElementById('edit_is_default').checked = isDefault;

                // Set action form untuk PUT request ke route update
                addressForm.action = `/addresses/${addressId}`; // Pastikan ini cocok dengan URL rute Laravel Anda

                editModal.classList.remove('hidden'); // Tampilkan modal
            });
        });

        // Event listener untuk tombol tutup modal (X)
        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', () => {
                editModal.classList.add('hidden');
            });
        }

        // Event listener untuk tombol "Cancel" di modal
        if (cancelModalBtn) {
            cancelModalBtn.addEventListener('click', () => {
                editModal.classList.add('hidden');
            });
        }

        // Event listener untuk menutup modal saat mengklik di luar area modal
        if (editModal) {
            editModal.addEventListener('click', (e) => {
                if (e.target === editModal) {
                    editModal.classList.add('hidden');
                }
            });
        }

        // Script untuk tombol alert close
        document.querySelectorAll('[role="alert"]').forEach(alert => {
            const closeButton = alert.querySelector('svg');
            if (closeButton) {
                closeButton.addEventListener('click', () => {
                    alert.remove();
                });
            }
        });
    </script>
    @endpush
</x-layout>