{{-- resources/views/User/edit-profile/index.blade.php --}}
<x-layout>
    <div class="flex mx-[5vw] my-[2vw]">
        {{-- Left Sidebar: User Profile and Navigation --}}
        <x-profilebar :user="$user" />

         @if (session('updateSuccess'))
        
            <div 
                class="alert absolute z-40 flex items-center justify-center p-4 mb-4 w-[30vw] text-green-800 rounded-lg bg-green-50" 
                style="top: 10%; left: 50%; transform: translate(-50%, -50%);" 
                role="alert">
                <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('updateSuccess') }}
                </div>
                <button type="button" class="close-button ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>

        @endif

        {{-- Right Content: Profile Details --}}
        <div class="flex flex-col ml-[2vw] w-full">
            <h1 class="text-[2vw] font-bold mb-[1vw]">Edit Profile</h1>

            <form action="/user/{{ Auth::user()->username }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-[3vw]">
                @csrf
                @method('PUT')
                <div class="flex gap-[7vw]">
                    <div class="flex flex-col gap-[1vw]">
                        <div class="flex flex-col gap-[0.5vw]">
                            <label for="name" class="text-[1.2vw] font-bold">Nama</label>
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
                            <label for="phone_number" class="text-[1.2vw] font-bold">Nomor Telepon</label>
                            <input type="text" id="phone_number" name="phone_number" class="w-[40vw] h-[3vw] rounded-[0.5vw] px-[1vw] focus:outline-none border border-gray-300" value="{{ old('phone_number', Auth::user()->phone_number) }}">
                            @error('phone_number')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-[0.5vw]">
                            <label for="address" class="text-[1.2vw] font-bold">Alamat</label>
                            <input type="text" id="address" name="address" class="w-[40vw] h-[3vw] rounded-[0.5vw] px-[1vw] focus:outline-none border border-gray-300" value="{{ old('address', Auth::user()->address) }}">
                            @error('address')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-[0.5vw]">
                            <label for="gender" class="text-[1.2vw] font-bold">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="w-[40vw] h-[3vw] rounded-[0.5vw] px-[0.75vw] focus:outline-none border border-gray-300">
                                <option value="" disabled {{ old('gender', Auth::user()->gender) == null ? 'selected' : '' }}>Select gender...</option>
                                <option value="male" {{ old('gender', Auth::user()->gender) == 'male' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="female" {{ old('gender', Auth::user()->gender) == 'female' ? 'selected' : '' }}>Perempuan</option>
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
                        <label for="profile-img" class="w-[70%] p-[0.5vw] rounded-[0.5vw] bg-green-2 text-[1.1vw] text-center text-white font-bold cursor-pointer">Unggah Foto Baru</label>
                        <p class="text-[1vw] font-bold text-gray-500 w-[90%] text-center">Hanya menerima file JPG dan PNG. Max 1 MB.</p>
                        @error('image')
                            <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="flex gap-[2vw]">
                    <button class="w-[10vw] py-[0.5vw] rounded-[0.5vw] border border-green-2 font-bold text-green-2 hover:bg-green-2 hover:text-white transition-colors duration-200">
                        <a href="/">
                            Batal
                        </a>
                    </button>
                    <button type="submit" class="w-[10vw] py-[0.5vw] rounded-[0.5vw] bg-green-2 font-bold text-white hover:bg-yellow-2 hover:border hover:border-green-2 hover:text-green-2 transition-colors duration-200">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const profileImage = document.getElementById('profileImage');

        const handleFormChange = (e) => {
            const file = e.target.files[0];

            if(file && file.type.startsWith("image/")){
                const reader = new FileReader();
                reader.onloadend = () => {
                    profileImage.src = reader.result;
                }
                reader.readAsDataURL(file);ph
            }
        }
    </script>
</x-layout>