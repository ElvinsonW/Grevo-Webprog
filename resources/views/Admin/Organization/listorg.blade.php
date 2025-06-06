<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organization List</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>
<body class="p-4">
    @include('components.sidebar')
    <div class="px-20 py-4">
    <div class="flex flex-row items-center justify-between">
        <h1 class="text-4xl font-bold">Organization List</h1>
        <a href ="{{ route('organization.create') }}" class= "bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"> + Add New Organization </a>
    </div>
    <div class="mb-1 mt-4">
            <a href="{{ route('organization.listorg', ['filter' => 'Active']) }}" 
               class="bg-green-200 text-green-800 px-3 py-1 rounded mr-2 hover:bg-green-400 {{ request()->query('filter') == 'Active' ? 'font-bold bg-green-400' : '' }}">
                Active
            </a>
            <a href="{{ route('organization.listorg', ['filter' => 'Not Active']) }}" 
               class="bg-red-200 text-red-800 px-3 py-1 rounded hover:bg-red-400 {{ request()->query('filter') == 'Not Active' ? 'font-bold bg-red-400' : '' }}">
                Not Active
            </a>
        </div>

    <div class ="border border-blue-400 rounded-md overflow-x-auto">
        <table class ="w-full text-left">
            <thead class= "bg-gray-100">
                <tr>
                    <th class="px-4">Organization Name</th>
                    <th>Organization ID</th>
                    <th>Address</th>
                    <th>Types of Trees</th>
                    <th>Contact Info </th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>    

            <tbody>
                @foreach ($organizations as $org)
                <tr class= "border-t">
                    <td class = "px-4 py-2 flex items-center gap-2">
                        <div class = "w-6 h-6 bg-gray-300 rounded-full">
                            @if(!empty($org->organization_logo))
                            <img class="w-full h-full object-cover rounded-full" src="{{ asset('storage/' .$org->organization_logo) }}" alt="">
                            @endif
                        </div>
                        {{ $org->organization_name}}
                    </td>

                    <td class ="py-2">#{{$org->organization_id}}</td>
                    <td class ="py-2">{{$org->operational_address}}</td>
                    <td class ="py-2">{{$org->types_of_tree_planted}}</td>
                    <td class ="py-2">{{$org->official_contact_info}}</td>
                    <!-- <td class ="px-4 py-2">{{$org->organization_status}}</td> -->
                     <td class="py-2">
                        @if(strtolower($org->organization_status) == 'active')
                            <span class="bg-green-200 text-green-800 px-2 py-1 rounded">Active</span>
                        @else
                            <span class="bg-red-200 text-red-800 px-2 py-1 rounded">Not Active</span>
                        @endif
                    </td>

                    <td class= "py-2 relative">
                        <div class ="group inline block">
                            <button class="hover:bg-gray-200 px-2 py-1 rounded focus:outline-none">...</button>
                            <div class="hidden group-hover:block absolute right-0 mt-2 bg-white border shadow-md rounded z-10">
                                <a href="{{ route('organization.edit', $org->organization_id) }}" class = "block px-4 py-2 hover:bg-gray-100">Edit Organization</a>
                                <form action ="{{ route('organization.destroy', $org->organization_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this organization and all its associated trees?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-red-100 text-red-600">Delete Organization</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        <div class="mt-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <!-- Previous Button -->
                @if ($organizations->onFirstPage())
                    <span class="px-3 py-1 bg-gray-200 text-gray-500 rounded">Prev</span>
                @else
                    <a href="{{ $organizations->previousPageUrl() }}" class="px-3 py-1 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Prev</a>
                @endif

                <!-- Page Numbers -->
                @foreach ($organizations->getUrlRange(1, $organizations->lastPage()) as $page => $url)
                    @if ($page == $organizations->currentPage())
                        <span class="px-3 py-1 bg-blue-500 text-white rounded">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</span>
                    @else
                        <a href="{{ $url }}" class="px-3 py-1 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</a>
                    @endif
                @endforeach

                <!-- Next Button -->
                @if ($organizations->hasMorePages())
                    <a href="{{ $organizations->nextPageUrl() }}" class="px-3 py-1 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Next</a>
                @else
                    <span class="px-3 py-1 bg-gray-200 text-gray-500 rounded">Next</span>
                @endif
            </div>
        </div>
</div>
</body>
</html>