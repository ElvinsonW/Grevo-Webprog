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



        <!-- kanan side -->
        <div class="sidebar-right p-3 border rounded bg-light">
        {{-- Status Pemesanan --}}
        <div class="order-status mb-4">
            <h5 class="mb-3">Order Placed</h5>
            <ul class="list-unstyled ps-3">
                <li class="mb-2 d-flex align-items-center">
                    <img src="{{ asset('icons/calendar.svg') }}" alt="calendar icon" width="16" height="16" class="me-2">
                    <span>27 May 2025 - 01:30 PM</span>
                </li>
                <li class="mb-2 d-flex align-items-center">
                    <img src="{{ asset('icons/truck.svg') }}" alt="truck icon" width="16" height="16" class="me-2">
                    <span>Expected Ship: 27 May 2025</span>
                </li>
                <li class="mb-2 d-flex align-items-center">
                    <img src="{{ asset('icons/box.svg') }}" alt="box icon" width="16" height="16" class="me-2">
                    <span>Expected Arrival: 29–30 May 2025</span>
                </li>
                <li class="d-flex align-items-center">
                    <img src="{{ asset('icons/star.svg') }}" alt="star icon" width="16" height="16" class="me-2">
                    <span>Leave a Review</span>
                </li>
            </ul>
        </div>

        

        {{-- Tombol Aksi --}}
        <div class="order-actions d-grid gap-2">
            <button class="btn btn-outline-secondary">View Invoice</button>
            <button class="btn btn-outline-primary">Buy Again</button>
            <button class="btn btn-warning text-white">Give Rating</button>
        </div>
    </div>
    </div>
</x-layout>