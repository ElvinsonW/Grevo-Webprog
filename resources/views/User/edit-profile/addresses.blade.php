{{-- resources/views/User/edit-profile/addresses.blade.php --}}
<x-layout>
    <div class="flex mx-[5vw] my-[2vw]">
        {{-- Left Sidebar: User Profile and Navigation (tetap sama) --}}
        <div class="relative flex flex-col items-center w-[16vw] h-fit px-[1.5vw] pt-[2vw] pb-[3vw] bg-[var(--color-yellow-2)] rounded-[1vw]">
            {{-- ... (kode sidebar) ... --}}

            <div class="flex flex-col gap-[0.75vw] justify-start w-full px-[1vw]">
                <div class="flex flex-col" id="profile-menu">
                    <div class="flex items-center justify-between cursor-pointer">
                        <div class="flex items-center gap-[0.5vw]">
                            <i class="fa-regular fa-user text-[1vw] w-[1.2vw] text-[var(--color-green-3)]"></i>
                            <p class="text-[1vw] font-bold text-[var(--color-green-3)]">My Account</p>
                        </div>
                        <i class="fa-solid fa-chevron-down text-[1vw] transition-transform duration-400 rotate-180" id="dropdown-icon"></i>
                    </div>

                    <div class="flex flex-col gap-[0.5vw] ml-[1.7vw] mt-[0.5vw] mb-[0.25vw]" id="profile-dropdown">
                        <a href="{{ route('profile') }}" class="text-[1vw] font-bold {{ Request::routeIs('profile') ? 'text-[var(--color-green-3)]' : 'text-gray-700' }}">Profile</a>
                        <a href="{{ route('addresses') }}" class="text-[1vw] font-bold {{ Request::routeIs('addresses') ? 'text-[var(--color-green-3)]' : 'text-gray-700' }}">Addresses</a>
                    </div>
                </div>

                <a href="{{ route('orders') }}" class="flex items-center gap-[0.5vw]">
                    <i class="fa-solid fa-box-open text-[1vw] w-[1.2vw] text-gray-700"></i>
                    <p class="text-[1vw] font-bold text-gray-700">Order</p>
                </a>

                <a href="{{ route('reviews') }}" class="flex items-center gap-[0.5vw]">
                    <i class="fa-regular fa-comment-dots text-[1vw] w-[1.2vw] text-gray-700"></i>
                    <p class="text-[1vw] font-bold text-gray-700">Review</p>
                </a>

                @auth
                <form action="{{ route('logout') }}" method="POST" class="mt-[1vw]">
                    @csrf
                    <button type="submit" class="flex items-center gap-[0.5vw] w-full text-left">
                        <i class="fa-solid fa-right-from-bracket text-[1vw] w-[1.2vw] text-red-600"></i>
                        <p class="text-[1vw] font-bold text-red-600">Logout</p>
                    </button>
                </form>
                @else
                <a href="{{ route('signin') }}" class="flex items-center gap-[0.5vw] mt-[1vw]">
                    <i class="fa-solid fa-right-to-bracket text-[1vw] w-[1.2vw] text-gray-700"></i>
                    <p class="text-[1vw] font-bold text-gray-700">Login</p>
                </a>
                @endauth
            </div>
        </div>

        {{-- Right Content: Addresses --}}
        <div class="flex flex-col ml-[2vw] w-full">
            {{-- Filter Bar (tetap sama) --}}
            <div class="flex border-b border-gray-300 mb-[3vw] text-[1.2vw]">
                <a href="{{ route('profile') }}" class="py-[0.75vw] px-[2vw] text-gray-600 hover:text-[var(--color-green-3)] border-r border-gray-300">Profile</a>
                <a href="{{ route('addresses') }}" class="py-[0.75vw] px-[2vw] text-[var(--color-green-3)] font-bold border-b-[0.2vw] border-[var(--color-green-3)] -mb-px">Addresses</a>
            </div>

            <h1 class="text-[2vw] font-bold mb-[3vw]">Addresses</h1>

            {{-- Address List Container --}}
            <div class="grid grid-cols-1 gap-[1vw]">
                @forelse ($addresses as $address)
                    <div class="border border-gray-300 rounded-[0.5vw] p-[1.5vw] flex flex-col lg:flex-row justify-between items-start lg:items-center bg-white shadow-sm">
                        <div class="flex-grow">
                            <p class="text-[1.2vw] font-semibold text-gray-800">{{ $address->recipient_name }} <span class="ml-[0.5vw] text-gray-600">{{ $address->phone_number }}</span></p>
                            <p class="text-[0.9vw] text-gray-700 mt-[0.25vw]">{{ $address->street_address }}</p>
                            <p class="text-[0.9vw] text-gray-500">{{ $address->province }}, {{ $address->city }}, {{ $address->postal_code }}</p>
                            @if ($address->is_default)
                                <span class="inline-block mt-[0.5vw] px-[1vw] py-[0.25vw] text-[0.8vw] font-semibold rounded-full" style="background-color: var(--color-green-1); color: var(--color-green-2);">Default</span>
                            @endif
                            @if ($address->label)
                                <span class="inline-block mt-[0.5vw] ml-[0.5vw] px-[1vw] py-[0.25vw] text-[0.8vw] font-semibold rounded-full bg-gray-200 text-gray-700">{{ $address->label }}</span>
                            @endif
                        </div>
                        <div class="flex flex-col lg:flex-row gap-[0.5vw] mt-[1vw] lg:mt-0 lg:ml-[1vw]">
                            <button class="text-[0.9vw] px-[1vw] py-[0.4vw] rounded-[0.3vw] border border-gray-400 text-gray-700 hover:bg-gray-100" onclick="openEditModal()">Edit</button>
                            <button class="text-[0.9vw] px-[1vw] py-[0.4vw] rounded-[0.3vw] border border-gray-400 text-red-600 hover:bg-red-50" onclick="confirmDelete()">Delete</button>
                            @if (!$address->is_default)
                                <button class="text-[0.9vw] px-[1vw] py-[0.4vw] rounded-[0.3vw] border border-gray-400 text-gray-700 hover:bg-gray-100">Set as Default</button>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600 text-lg">No addresses found.</p>
                @endforelse

                {{-- Button add new address --}}
                <button class="w-full py-[0.75vw] px-[2vw] border-2 border-dashed border-gray-400 text-gray-600 rounded-[0.5vw] hover:bg-gray-50 flex items-center justify-center gap-[0.5vw] mt-[1vw]" onclick="openAddModal()">
                    <i class="fa-solid fa-plus text-[1.2vw]"></i> Add New Address
                </button>
            </div>

            {{-- Modals (tetap sama, nanti bisa diisi data dinamis dari address object yang diedit) --}}
            {{-- Edit Address Modal (Pop-up) --}}
            <div id="editAddressModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                {{-- ... (kode modal edit) ... --}}
            </div>

            {{-- Delete Confirmation Modal (Pop-up) --}}
            <div id="deleteConfirmModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                {{-- ... (kode modal delete) ... --}}
            </div>

        </div>
    </div>

    @push('scripts')
    {{-- ... (kode JavaScript Anda tetap sama) ... --}}
    @endpush
</x-layout>

    @push('scripts')
    <script>
        // JavaScript for sidebar dropdown
        const toggle = document.getElementById('profile-menu');
        const menu = document.getElementById('profile-dropdown');
        const icon = document.getElementById('dropdown-icon')

        toggle.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            menu.classList.toggle('flex'); // Pastikan ini toggling 'flex' jika display defaultnya adalah flex
            icon.classList.toggle('rotate-180')
        });

        // Function to open the Edit Address Modal
        function openEditModal() {
            document.getElementById('editAddressModal').classList.remove('hidden');
        }

        // Function to close the Edit Address Modal
        function closeEditModal() {
            document.getElementById('editAddressModal').classList.add('hidden');
        }

        // Function to open the Add Address Modal (can reuse edit modal or make new)
        function openAddModal() {
            document.getElementById('editAddressModal').classList.remove('hidden');
            // Add logic here to clear form fields if it's an "Add New" operation
            // e.g., document.getElementById('fullName').value = '';
            // Anda mungkin perlu men-reset input value untuk form "Add New"
            // Atau bikin modal terpisah untuk Add dan Edit
        }

        // Function to open the Delete Confirmation Modal
        function confirmDelete() {
            document.getElementById('deleteConfirmModal').classList.remove('hidden');
        }

        // Function to close the Delete Confirmation Modal
        function closeDeleteConfirmModal() {
            document.getElementById('deleteConfirmModal').classList.add('hidden');
        }

        // Function to handle address deletion (frontend only for now)
        function deleteAddress() {
            alert('Address deleted (frontend simulation)!');
            closeDeleteConfirmModal();
            // In a real application, you would send an AJAX request to delete the address
            // and then remove the address card from the DOM.
        }

        // Close modals if clicked outside (optional, but good UX)
        window.onclick = function(event) {
            const editModal = document.getElementById('editAddressModal');
            const deleteModal = document.getElementById('deleteConfirmModal');

            if (event.target == editModal) {
                closeEditModal();
            }
            if (event.target == deleteModal) {
                closeDeleteConfirmModal();
            }
        }

        // Function to open the Add Address Modal (can reuse edit modal or make new)
    function openAddModal() {
        document.getElementById('editAddressModal').classList.remove('hidden');

        // Clear form fields for a new address entry
        document.getElementById('fullName').value = '';
        document.getElementById('phoneNumber').value = '';
        document.getElementById('provinceCityDistrict').selectedIndex = 0; // Reset dropdown to first option
        document.getElementById('streetName').value = '';
        document.getElementById('otherDetails').value = '';

        // Uncheck 'Set as default address' checkbox
        document.querySelector('input[name="setDefault"]').checked = false;

        // Set 'Home' radio button as checked by default for new address
        document.querySelector('input[name="addressLabel"][value="Home"]').checked = true;
        // Trigger the styling update for the radio button if you use peer-checked
        // This part might need more robust handling depending on your exact CSS setup
        const homeLabelSpan = document.querySelector('input[name="addressLabel"][value="Home"]').nextElementSibling;
        const workLabelSpan = document.querySelector('input[name="addressLabel"][value="Work"]').nextElementSibling;

        homeLabelSpan.classList.add('bg-[var(--color-green-1)]', 'text-[var(--color-green-2)]', 'border-[var(--color-green-3)]');
        workLabelSpan.classList.remove('bg-[var(--color-green-1)]', 'text-[var(--color-green-2)]', 'border-[var(--color-green-3)]');
        workLabelSpan.classList.add('bg-gray-200', 'text-gray-700', 'border-gray-300'); // Ensure inactive style
    }
    </script>
    @endpush
</x-layout>