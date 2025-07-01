<x-layout>
    <div class="flex mx-[5vw] my-[2vw]">
        {{-- Left Sidebar: User Profile and Navigation --}}
        <div class="relative flex flex-col items-center w-[16vw] h-fit px-[1.5vw] pt-[2vw] pb-[3vw] bg-[var(--color-yellow-2)] rounded-[1vw]">
            <div class="flex flex-col items-center gap-[0.25vw] mb-[1.5vw]">
                {{-- Menghilangkan mt-[-2vw] dan memastikan gambar berada di dalam aliran normal --}}
                {{-- Jika ingin gambar sedikit 'keluar' tapi tetap di dalam area, bisa pakai mt-[-1vw] atau posisi relatif--}}
                <img src="{{ $user && $user->image ? asset('storage/' . $user->image) : asset('images/skz.jpg') }}" alt="profile" class="w-[5vw] h-[5vw] rounded-full object-cover">
                {{-- Menampilkan username user jika ada, atau 'Guest User' --}}
                <p class="text-[1.1vw] font-bold">
                    {{ $user ? $user->username : 'Guest User' }}
                </p>
            </div>

            {{-- PTS Section --}}
            <div class="flex w-full px-[1vw] py-[0.5vw] border border-[var(--color-green-3)] text-[var(--color-green-3)] rounded-full mb-[1.2vw] items-center justify-center gap-[0.5vw]">
                <i class="fa-solid fa-star text-[0.9vw]"></i>
                {{-- poin user--}}
                <p class="text-[1vw] font-semibold">{{ $user ? $user->points : '0' }} Pts</p>
            </div>

            <div class="flex flex-col gap-[0.75vw] justify-start w-full px-[1vw]">
                <div class="flex flex-col" id="profile-menu">
                    <div class="flex items-center justify-between cursor-pointer">
                        <div class="flex items-center gap-[0.5vw]">
                            {{-- Ikon dengan lebar konsisten --}}
                            <i class="fa-regular fa-user text-[1vw] w-[1.2vw] text-[var(--color-green-3)]"></i>
                            <p class="text-[1vw] font-bold text-[var(--color-green-3)]">My Account</p>
                        </div>
                        {{-- Ikon panah dropdown --}}
                        <i class="fa-solid fa-chevron-down text-[1vw] transition-transform duration-400 rotate-180" id="dropdown-icon"></i>
                    </div>

                    {{-- Dropdown Links --}}
                    <div class="flex flex-col gap-[0.5vw] ml-[1.7vw] mt-[0.5vw] mb-[0.25vw]" id="profile-dropdown">
                        {{-- Link Profile (active class berdasarkan route) --}}
                        <a href="{{ route('profile') }}" class="text-[1vw] font-bold {{ Request::routeIs('profile') ? 'text-[var(--color-green-3)]' : 'text-gray-700' }}">Profile</a>
                        {{-- Link Addresses (active class berdasarkan route) --}}
                        <a href="{{ route('addresses') }}" class="text-[1vw] font-bold {{ Request::routeIs('addresses') ? 'text-[var(--color-green-3)]' : 'text-gray-700' }}">Addresses</a>
                    </div>
                </div>

                {{-- Order Link --}}
                <a href="{{ route('orders') }}" class="flex items-center gap-[0.5vw]">
                    <i class="fa-solid fa-box-open text-[1vw] w-[1.2vw] text-gray-700"></i>
                    <p class="text-[1vw] font-bold text-gray-700">Order</p>
                </a>

                {{-- Review Link --}}
                <a href="{{ route('reviews') }}" class="flex items-center gap-[0.5vw]">
                    <i class="fa-regular fa-comment-dots text-[1vw] w-[1.2vw] text-gray-700"></i>
                    <p class="text-[1vw] font-bold text-gray-700">Review</p>
                </a>

                {{-- Logout Link (hanya tampil jika user login) atau Login Link (jika tidak login) --}}
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
            {{-- Filter Bar --}}
            <div class="flex border-b border-gray-300 mb-[3vw] text-[1.2vw]">
                <a href="{{ route('profile') }}" class="py-[0.75vw] px-[2vw] text-gray-600 hover:text-[var(--color-green-3)] border-r border-gray-300">Profile</a>
                {{-- Link Addresses (active class untuk filter bar) --}}
                <a href="{{ route('addresses') }}" class="py-[0.75vw] px-[2vw] text-[var(--color-green-3)] font-bold border-b-[0.2vw] border-[var(--color-green-3)] -mb-px">Addresses</a>
            </div>

            <h1 class="text-[2vw] font-bold mb-[3vw]">Addresses</h1>

            {{-- Address List Container --}}
            <div class="grid grid-cols-1 gap-[1vw]">
                {{-- Address Card 1 (Default Address) --}}
                <div class="border border-gray-300 rounded-[0.5vw] p-[1.5vw] flex flex-col lg:flex-row justify-between items-start lg:items-center bg-white shadow-sm">
                    <div class="flex-grow">
                        <p class="text-[1.2vw] font-semibold text-gray-800">Cecilia Supardi <span class="ml-[0.5vw] text-gray-600">(+62) 891 2173 8472</span></p>
                        <p class="text-[0.9vw] text-gray-700 mt-[0.25vw]">Jl. Pakuan no. 3, Daan Mogot Raya</p>
                        <p class="text-[0.9vw] text-gray-500">DKI Jakarta, KOTA JAKARTA PUSAT, GAMBIR, 10101</p>
                        <span class="inline-block mt-[0.5vw] px-[1vw] py-[0.25vw] text-[0.8vw] font-semibold rounded-full" style="background-color: var(--color-green-1); color: var(--color-green-2);">Default</span>
                        <span class="inline-block mt-[0.5vw] ml-[0.5vw] px-[1vw] py-[0.25vw] text-[0.8vw] font-semibold rounded-full bg-gray-200 text-gray-700">Home</span>
                    </div>
                    <div class="flex flex-col lg:flex-row gap-[0.5vw] mt-[1vw] lg:mt-0 lg:ml-[1vw]">
                        <button class="text-[0.9vw] px-[1vw] py-[0.4vw] rounded-[0.3vw] border border-gray-400 text-gray-700 hover:bg-gray-100" onclick="openEditModal()">Edit</button>
                        <button class="text-[0.9vw] px-[1vw] py-[0.4vw] rounded-[0.3vw] border border-gray-400 text-red-600 hover:bg-red-50" onclick="confirmDelete()">Delete</button>
                        {{-- Set as Default button not needed for default address --}}
                    </div>
                </div>

                {{-- Address Card 2 --}}
                <div class="border border-gray-300 rounded-[0.5vw] p-[1.5vw] flex flex-col lg:flex-row justify-between items-start lg:items-center bg-white shadow-sm">
                    <div class="flex-grow">
                        <p class="text-[1.2vw] font-semibold text-gray-800">Nama Penerima Lain <span class="ml-[0.5vw] text-gray-600">(+62) 812 3456 7890</span></p>
                        <p class="text-[0.9vw] text-gray-700 mt-[0.25vw]">Jl. Contoh Alamat No. 123</p>
                        <p class="text-[0.9vw] text-gray-500">KECAMATAN CONTOH, KABUPATEN CONTOH, PROVINSI CONTOH, 12345</p>
                        <span class="inline-block mt-[0.5vw] px-[1vw] py-[0.25vw] text-[0.8vw] font-semibold rounded-full bg-gray-200 text-gray-700">Work</span>
                    </div>
                    <div class="flex flex-col lg:flex-row gap-[0.5vw] mt-[1vw] lg:mt-0 lg:ml-[1vw]">
                        <button class="text-[0.9vw] px-[1vw] py-[0.4vw] rounded-[0.3vw] border border-gray-400 text-gray-700 hover:bg-gray-100" onclick="openEditModal()">Edit</button>
                        <button class="text-[0.9vw] px-[1vw] py-[0.4vw] rounded-[0.3vw] border border-gray-400 text-red-600 hover:bg-red-50" onclick="confirmDelete()">Delete</button>
                        <button class="text-[0.9vw] px-[1vw] py-[0.4vw] rounded-[0.3vw] border border-gray-400 text-gray-700 hover:bg-gray-100">Set as Default</button>
                    </div>
                </div>

                {{-- kl mw nmbahin address card di bwh ini y--}}

                {{-- Button add new address --}}
                <button class="w-full py-[0.75vw] px-[2vw] border-2 border-dashed border-gray-400 text-gray-600 rounded-[0.5vw] hover:bg-gray-50 flex items-center justify-center gap-[0.5vw] mt-[1vw]" onclick="openAddModal()">
                    <i class="fa-solid fa-plus text-[1.2vw]"></i> Add New Address
                </button>
            </div>

            {{-- Edit Address Modal (Pop-up) --}}
            <div id="editAddressModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                <div class="bg-white p-[2vw] rounded-[1vw] shadow-xl w-full max-w-[45vw] mx-[2vw]">
                    <h2 class="text-[1.8vw] font-bold text-[var(--color-green-2)] mb-[1.5vw]">Edit Address</h2>
                    <form>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-[1vw] mb-[1vw]">
                            <div>
                                <label for="fullName" class="block text-[1vw] font-medium text-gray-700 mb-[0.25vw]">Full Name</label>
                                <input type="text" id="fullName" name="fullName" value="Cecilio Supardi" class="w-full p-[0.75vw] border border-gray-300 rounded-[0.3vw] focus:outline-none focus:ring-1 focus:ring-[var(--color-green-3)] text-[1vw]">
                            </div>
                            <div>
                                <label for="phoneNumber" class="block text-[1vw] font-medium text-gray-700 mb-[0.25vw]">Phone Number</label>
                                <input type="text" id="phoneNumber" name="phoneNumber" value="(+62) 891 2173 8472" class="w-full p-[0.75vw] border border-gray-300 rounded-[0.3vw] focus:outline-none focus:ring-1 focus:ring-[var(--color-green-3)] text-[1vw]">
                            </div>
                        </div>

                        <div class="mb-[1vw]">
                            <label for="provinceCityDistrict" class="block text-[1vw] font-medium text-gray-700 mb-[0.25vw]">Province, City, District, Postal Code</label>
                            <select id="provinceCityDistrict" name="provinceCityDistrict" class="w-full p-[0.75vw] border border-gray-300 rounded-[0.3vw] focus:outline-none focus:ring-1 focus:ring-[var(--color-green-3)] text-[1vw]">
                                <option value="DKI Jakarta, KOTA JAKARTA PUSAT, GAMBIR, 10101">DKI Jakarta, KOTA JAKARTA PUSAT, GAMBIR, 10101</option>
                                <option value="Option 2">Other Location Option</option>
                            </select>
                        </div>

                        <div class="mb-[1vw]">
                            <label for="streetName" class="block text-[1vw] font-medium text-gray-700 mb-[0.25vw]">Street Name, Building, House Number</label>
                            <input type="text" id="streetName" name="streetName" value="Jl. Pokaun no. 3" class="w-full p-[0.75vw] border border-gray-300 rounded-[0.3vw] focus:outline-none focus:ring-1 focus:ring-[var(--color-green-3)] text-[1vw]">
                        </div>

                        <div class="mb-[1vw]">
                            <label for="otherDetails" class="block text-[1vw] font-medium text-gray-700 mb-[0.25vw]">Other Details</label>
                            <textarea id="otherDetails" name="otherDetails" rows="2" class="w-full p-[0.75vw] border border-gray-300 rounded-[0.3vw] focus:outline-none focus:ring-1 focus:ring-[var(--color-green-3)] text-[1vw]">tolong titipin di resepsionis</textarea>
                        </div>

                        <div class="mb-[1.5vw]">
                            <label class="block text-[1vw] font-medium text-gray-700 mb-[0.5vw]">Label As</label>
                            <div class="flex gap-[0.75vw]">
                                {{-- Pastikan input radio di luar span untuk label --}}
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" name="addressLabel" value="Home" class="form-radio text-[var(--color-green-3)] hidden" checked>
                                    <span class="py-[0.25vw] px-[0.75vw] border border-gray-300 rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 text-[0.9vw] peer-checked:bg-[var(--color-green-1)] peer-checked:text-[var(--color-green-2)] peer-checked:border-[var(--color-green-3)] transition-colors duration-200">Home</span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" name="addressLabel" value="Work" class="form-radio text-[var(--color-green-3)] hidden">
                                    <span class="py-[0.25vw] px-[0.75vw] border border-gray-300 rounded-full text-gray-700 hover:bg-gray-200 text-[0.9vw] peer-checked:bg-[var(--color-green-1)] peer-checked:text-[var(--color-green-2)] peer-checked:border-[var(--color-green-3)] transition-colors duration-200">Work</span>
                                </label>
                            </div>
                        </div>

                        <div class="mb-[1.5vw]">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="setDefault" class="form-checkbox text-[var(--color-green-3)] rounded focus:ring-[var(--color-green-3)]">
                                <span class="ml-[0.5vw] text-gray-700 text-[1vw]">Set as default address</span>
                            </label>
                        </div>

                        <div class="flex justify-end gap-[1vw]">
                            <button type="button" class="px-[1.5vw] py-[0.75vw] rounded-[0.3vw] border border-gray-300 text-gray-700 hover:bg-gray-100 text-[1vw]" onclick="closeEditModal()">Cancel</button>
                            <button type="submit" class="px-[1.5vw] py-[0.75vw] rounded-[0.3vw] bg-[var(--color-orange-1)] text-white font-semibold hover:bg-orange-500 text-[1vw]">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Delete Confirmation Modal (Pop-up) --}}
            <div id="deleteConfirmModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                <div class="bg-white p-[2vw] rounded-[1vw] shadow-xl w-full max-w-[25vw] mx-[2vw] text-center">
                    <h2 class="text-[1.5vw] font-bold text-[var(--color-green-2)] mb-[1vw]">Confirm Deletion</h2>
                    <p class="text-gray-700 mb-[1.5vw] text-[1vw]">Are you sure you want to delete this address?</p>
                    <div class="flex justify-center gap-[1vw]">
                        <button type="button" class="px-[1.5vw] py-[0.75vw] rounded-[0.3vw] border border-gray-300 text-gray-700 hover:bg-gray-100 text-[1vw]" onclick="closeDeleteConfirmModal()">Cancel</button>
                        <button type="button" class="px-[1.5vw] py-[0.75vw] rounded-[0.3vw] bg-red-600 text-white font-semibold hover:bg-red-700 text-[1vw]" onclick="deleteAddress()">Delete</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

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