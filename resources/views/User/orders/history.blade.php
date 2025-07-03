<x-layout>
    <main class="mx-auto p-6 pt-12 min-h-screen" style="background-color: #F7F6EB;">
        <div class="flex mx-[5vw] gap-10">
            <!-- Left Sidebar: User Profile and Navigation -->
            @include('components.profilebar', ['user' => $user])

            <!-- Right Side: Order History -->
            <div class="w-full bg-[#FCFCF5] h-auto">
                <div class="flex flex-col justify-content items-center p-6">
                    
                </div>
            </div>
        </div>
    </div>
</x-layout>
