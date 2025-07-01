{{-- resources/views/User/edit-profile/index.blade.php --}}
<x-layout>
    <div class="flex mx-[5vw] my-[2vw]">
        {{-- Left Sidebar: User Profile and Navigation --}}
        <div class="relative flex flex-col items-center w-[16vw] h-fit px-[1.5vw] pb-[3vw] bg-[var(--color-yellow-2)] rounded-[1vw]">
            <div class="flex flex-col items-center gap-[0.25vw] mb-[1.5vw]">
                <img src="{{ asset('images/profile_placeholder.png') }}" alt="profile" class="mt-[-2vw] w-[5vw] h-[5vw] rounded-full object-cover">
                <p class="text-[1.1vw] font-bold">Username</p>
            </div>

            {{-- Points/Gem Section --}}
            <div class="flex w-full px-[1vw] py-[0.5vw] border border-[var(--color-green-3)] text-[var(--color-green-3)] rounded-full mb-[1.2vw] items-center justify-center gap-[0.5vw]">
                <i class="fa-solid fa-star text-[0.9vw]"></i>
                <p class="text-[1vw] font-semibold">200 Pts</p>
            </div>

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
                        <a href="{{ route('profile') }}" class="text-[1vw] font-bold text-[var(--color-green-3)]">Profile</a> {{-- Active link --}}
                        <a href="{{ route('addresses') }}" class="text-[1vw] font-bold text-gray-700">Addresses</a>
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

                {{-- Tambahkan link Logout --}}
                <form action="{{ route('logout') }}" method="POST" class="mt-[1vw]">
                    @csrf
                    <button type="submit" class="flex items-center gap-[0.5vw] w-full text-left">
                        <i class="fa-solid fa-right-from-bracket text-[1vw] w-[1.2vw] text-red-600"></i>
                        <p class="text-[1vw] font-bold text-red-600">Logout</p>
                    </button>
                </form>
            </div>
        </div>

        {{-- Right Content: Profile Details --}}
        <div class="flex flex-col ml-[2vw] w-full">
            {{-- Filter Bar --}}
            <div class="flex border-b border-gray-300 mb-[3vw] text-[1.2vw]">
                <a href="{{ route('profile') }}" class="py-[0.75vw] px-[2vw] text-[var(--color-green-3)] font-bold border-b-[0.2vw] border-[var(--color-green-3)] -mb-px">Profile</a>
                <a href="{{ route('addresses') }}" class="py-[0.75vw] px-[2vw] text-gray-600 hover:text-[var(--color-green-3)] border-l border-gray-300">Addresses</a>
            </div>

            <h1 class="text-[2vw] font-bold mb-[3vw]">Edit Profile</h1>

            <form action="/user/{{ Auth::user()->username }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-[3vw]">
                @csrf
                @method('PUT')
                <div class="flex gap-[7vw]">
                    <div class="flex flex-col gap-[1vw]">
                        <div class="flex flex-col gap-[0.5vw]">
                            <label for="name" class="text-[1.2vw] font-bold">Name</label>
                            <input type="text" id="name" name="name" class="w-[40vw] h-[3vw] rounded-[0.5vw] px-[1vw] focus:outline-none border border-gray-300" value="{{ old('name', Auth::user()->name) }}">
                            @error('name')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-[0.5vw]">
                            <label for="username" class="text-[1.2vw] font-bold">Username</label>
                            <input type="text" id="username" name="username" class="w-[40vw] h-[3vw] rounded-[0.5vw] px-[1vw] focus:outline-none border border-gray-300" value="{{ old('username', Auth::user()->username) }}">
                            @error('username')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-[0.5vw]">
                            <label for="email" class="text-[1.2vw] font-bold">Email</label>
                            <input type="email" id="email" name="email" class="w-[40vw] h-[3vw] rounded-[0.5vw] px-[1vw] focus:outline-none border border-gray-300" value="{{ old('email', Auth::user()->email) }}">
                            @error('email')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-[0.5vw]">
                            <label for="phone_number" class="text-[1.2vw] font-bold">Phone Number</label>
                            <input type="text" id="phone_number" name="phone_number" class="w-[40vw] h-[3vw] rounded-[0.5vw] px-[1vw] focus:outline-none border border-gray-300" value="{{ old('phone_number', Auth::user()->phone_number) }}">
                            @error('phone_number')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-[0.5vw]">
                            <label for="address" class="text-[1.2vw] font-bold">Address</label>
                            <input type="text" id="address" name="address" class="w-[40vw] h-[3vw] rounded-[0.5vw] px-[1vw] focus:outline-none border border-gray-300" value="{{ old('address', Auth::user()->address) }}">
                            @error('address')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-[0.5vw]">
                            <label for="gender" class="text-[1.2vw] font-bold">Gender</label>
                            <select name="gender" id="gender" class="w-[40vw] h-[3vw] rounded-[0.5vw] px-[0.75vw] focus:outline-none border border-gray-300">
                                <option value="" disabled {{ old('gender', Auth::user()->gender) == null ? 'selected' : '' }}>Select gender...</option>
                                <option value="male" {{ old('gender', Auth::user()->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender', Auth::user()->gender) == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col items-center gap-[1vw]">
                        <input type="file" name="image" id="profile-img" class="hidden" onchange="handleFormChange(event)">
                        <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('images/profile_placeholder.png') }}" alt="profile" class="w-[15vw] h-[15vw] object-cover rounded-full" id="profileImage">
                        <label for="profile-img" class="w-full p-[0.5vw] rounded-[0.5vw] bg-[var(--color-green-3)] text-[1.1vw] text-center text-white font-bold cursor-pointer">Upload New Profile</label>
                        <p class="text-[1vw] font-bold text-gray-500 w-[90%] text-center">Only JPG or PNG allowed. Max 1 MB.</p>
                        @error('image')
                            <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="flex gap-[2vw]">
                    <button class="w-[10vw] py-[0.5vw] rounded-[0.5vw] border border-[var(--color-green-3)] font-bold text-[var(--color-green-3)] hover:bg-[var(--color-green-3)] hover:text-white transition-colors duration-200">
                        <a href="/">
                            Cancel
                        </a>
                    </button>
                    <button type="submit" class="w-[10vw] py-[0.5vw] rounded-[0.5vw] bg-[var(--color-green-3)] font-bold text-white hover:bg-[var(--color-green-4)] transition-colors duration-200">Save</button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        const profileImage = document.getElementById('profileImage');

        const handleFormChange = (e) => {
            const file = e.target.files[0];

            if(file && file.type.startsWith("image/")){
                const reader = new FileReader();
                reader.onloadend = () => {
                    profileImage.src = reader.result;
                }
                reader.readAsDataURL(file);
            }
        }

        const toggle = document.getElementById('profile-menu');
        const menu = document.getElementById('profile-dropdown');
        const icon = document.getElementById('dropdown-icon')

        toggle.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            menu.classList.toggle('flex');
            icon.classList.toggle('rotate-180')
        });
    </script>
    @endpush
</x-layout>