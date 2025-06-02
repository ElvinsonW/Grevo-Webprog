<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="flex mx-[5vw] my-[2vw]">
        <div class="relative flex flex-col items-center w-[16vw] h-fit px-[1.5vw] pb-[3vw] bg-green-200 rounded-[1vw]">
            <div class="flex flex-col items-center gap-[0.25vw] mb-[1.5vw]">
                <img src="{{ asset('images/elvinson.jpg') }}" alt="profile" class="mt-[-2vw] w-[5vw] h-[5vw] rounded-full object-cover">
                <p class="text-[1.1vw] font-bold">Username</p>
            </div>
            
            <div class="flex w-full px-[1vw] py-[0.5vw] border rounded-full mb-[1.2vw]">
                <i class="fa-solid fa-gem"></i>
            </div>

            <div class="flex flex-col gap-[0.75vw] justify-start w-full px-[1vw]">
                <div class="flex flex-col" id="profile-menu">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-[0.5vw]" >
                            <i class="fa-regular fa-user text-[1vw] w-[1.2vw]"></i>
                            <p class="text-[1vw] font-bold">My Account</p>
                        </div>
    
                        <i class="fa-solid fa-chevron-down text-[1vw] transition-transform duration-400" id="dropdown-icon"></i>
                    </div>
                    
                    <div class="flex-col gap-[0.5vw] ml-[1.7vw] mt-[0.5vw] mb-[0.25vw] hidden" id="profile-dropdown">
                        <p class="text-[1vw] font-bold">Profile</p>
                        <p class="text-[1vw] font-bold">Addresses</p>
                    </div>
                </div>

                <div class="flex items-center gap-[0.5vw]">
                    <i class="fa-regular fa-user text-[1vw] w-[1.2vw]"></i>
                    <p class="text-[1vw] font-bold">Order</p>
                </div>
                
                <div class="flex items-center gap-[0.5vw]">
                    <i class="fa-regular fa-user text-[1vw] w-[1.2vw]"></i>
                    <p class="text-[1vw] font-bold">Review</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col">
            <h1 class="text-[2vw] font-bold mb-[3vw]">Edit Profile</h1>
    
            <form action="/user/{{ $user->username }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-[3vw]">
                @csrf
                @method('PUT')
                <div class="flex gap-[7vw]">
                    <div class="flex flex-col gap-[1vw]">
                        <div class="flex flex-col gap-[0.5vw]">
                            <label for="" class="text-[1.2vw] font-bold">Name</label>
                            <input type="text" name="name" class="w-[40vw] h-[3vw] rounded-[0.5vw] px-[1vw] focus:outline-none border" value="{{ old('name', $user->name) }}">
                            @error('name')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
    
                        <div class="flex flex-col gap-[0.5vw]">
                            <label for="" class="text-[1.2vw] font-bold">Username</label>
                            <input type="text" name="username" class="w-[40vw] h-[3vw] rounded-[0.5vw] px-[1vw] focus:outline-none border" value="{{ old('username', $user->username) }}">
                            @error('username')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
    
                        <div class="flex flex-col gap-[0.5vw]">
                            <label for="" class="text-[1.2vw] font-bold">Email</label>
                            <input type="email" name="email" class="w-[40vw] h-[3vw] rounded-[0.5vw] px-[1vw] focus:outline-none border" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
    
                        <div class="flex flex-col gap-[0.5vw]">
                            <label for="" class="text-[1.2vw] font-bold">Phone Number</label>
                            <input type="text" name="phone_number" class="w-[40vw] h-[3vw] rounded-[0.5vw] px-[1vw] focus:outline-none border" value="{{ old('phone_number', $user->phone_number) }}">
                            @error('phone_number')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
    
                        <div class="flex flex-col gap-[0.5vw]">
                            <label for="" class="text-[1.2vw] font-bold">Address</label>
                            <input type="text" name="address" class="w-[40vw] h-[3vw] rounded-[0.5vw] px-[1vw] focus:outline-none border" value="{{ old('address', $user->address) }}">
                            @error('address')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
    
                        <div class="flex flex-col gap-[0.5vw]">
                            <label for="" class="text-[1.2vw] font-bold">Gender</label>
                            <select name="gender" id="gender" class="w-[40vw] h-[3vw] rounded-[0.5vw] px-[0.75vw] focus:outline-none border">
                                <option value="" disabled selected>Select gender...</option>
                                @if (old('gender', $user->gender) == 'male')
                                    <option value="male" selected>Male</option>
                                @else
                                    <option value="male">Male</option>
                                @endif

                                @if (old('gender', $user->gender) == 'female')
                                    <option value="female" selected>Female</option>
                                @else
                                    <option value="female">Male</option>
                                @endif
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
                        <img src="{{ asset('storage/' . $user->image) }}" alt="profile" class="w-[15vw] h-[15vw] object-cover rounded-full" id="profileImage">
                        <label for="profile-img" class="w-full p-[0.5vw] rounded-[0.5vw] bg-green-600 text-[1.1vw] text-center text-white font-bold">Upload New Profile</label>
                        <p class="text-[1vw] font-bold text-gray-500 w-[90%] text-center">Only JPG or PNG allowed. Max 1 MB.</p>
                        @error('image')
                            <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                
    
                <div class="flex gap-[2vw]">
                    <button class="w-[10vw] py-[0.5vw] rounded-[0.5vw] border border-green-600 font-bold text-green-600">
                        <a href="/">
                            Cancel
                        </a>
                    </button>
                    <button type="submit" class="w-[10vw] py-[0.5vw] rounded-[0.5vw] bg-green-600 font-bold text-white">Save</button>
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
                reader.readAsDataURL(file);
            }
        }
        

        const toggle = document.getElementById('profile-menu');
        const menu = document.getElementById('profile-dropdown');
        const icon = document.getElementById('dropdown-icon')

        toggle.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            menu.classList.toggle('flex');
            menu.classList.toggle('animate-dropdown');
            icon.classList.toggle('rotate-180')
        });
    </script>
</body>
</html>