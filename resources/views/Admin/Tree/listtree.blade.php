<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tree List</title>
    @vite('resources/css/app.css')
</head>
<body class="p-4 bg-green-100">
    @include('components.sidebar')
    <div class="px-20 py-4">
        <div class="flex flex-row items-center justify-between">
        <h1 class="text-4xl font-bold">Tree List</h1>
        <a href ="{{ route('tree.create') }}" class= "bg-blue-100 text-black font-medium px-4 py-2 rounded hover:bg-blue-300"> + Add New Tree </a>
        </div>

    <div class ="border border-green-400 rounded-md mt-4">
        <table class ="w-full text-left bg-white">
            <thead class= "bg-gray-100">
                <tr>
                    <th class ="px-4">Tree Name</th>
                    <th>Tree ID</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Lifespan</th>
                    <th>Organization</th>
                    <th>Action</th>
                </tr>
            </thead>    

            <tbody>
                @foreach ($trees as $tree)
                <tr class= "border-t">
                    <td class = "px-4 py-2 flex items-center gap-2">
                        <div class = "w-6 h-6 bg-gray-300 rounded-full">
                            @if(!empty($tree->treephoto))
                            <img class="w-full h-full object-cover rounded-full" src="{{ asset('storage/' .$tree->treephoto) }}" alt="">
                            @endif
                        </div>
                        {{ $tree->treename}}
                    </td>

                    <td class ="py-2">#{{$tree->treeid}}</td>
                    <td class ="py-2">{{$tree->treeprice}}</td>
                    <td class ="py-2">{{$tree->treecategory}}</td>
                    <td class ="py-2">{{$tree->treelife}}</td>
                    <td class ="py-2">{{$tree->organization->organization_name ?? 'N/A'}}</td>

<td class="py-2 relative z-50">
    <div class="relative group inline-block">
        <!-- Action button -->
        <button class="hover:bg-gray-200 px-2 py-1 rounded focus:outline-none">...</button>

        <!-- Dropdown menu -->
        <div class="invisible opacity-0 group-hover:visible group-hover:opacity-100
                    transition-opacity duration-200 absolute right-0 top-8 
                    bg-white border shadow-md rounded z-50 min-w-[140px]">
            <a href="{{ route('tree.edit', $tree->treeid) }}" class="block px-4 py-2 hover:bg-gray-100">Edit Tree</a>
            <form action="{{ route('tree.destroy', $tree->treeid) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-red-100 text-red-600">Delete Tree</button>
            </form>
        </div>
    </div>
</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

            <div class="mt-4">
                        {{ $trees->withQueryString()->links() }}
            </div>
        </div>
</div>
</body>