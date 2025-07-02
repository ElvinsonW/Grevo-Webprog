<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    @vite('resources/css/app.css')
</head>
<body class="p-4">
    @include('components.sidebar')

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Product List</h1>
    <div class="flex flex-row justify-between mb-4">
        {{-- Filter --}}
        <form method="GET" class="mb-4 flex gap-4 items-center">
            <label class="font-semibold">Filter Stock:</label>
            <select name="stock" onchange="this.form.submit()" class="border px-3 py-1 rounded">
                <option value="">All</option>
                <option value="in" {{ request('stock') === 'in' ? 'selected' : '' }}>In Stock</option>
                <option value="out" {{ request('stock') === 'out' ? 'selected' : '' }}>Out of Stock</option>
            </select>
        </form>
        <a href="{{ route('products.create') }}" class="px-4 py-3 bg-blue-600 text-white rounded hover:bg-blue-700">
            + Add New Product
        </a>
    </div>



    {{-- Products Table --}}
    <div class="bg-white rounded shadow">
        <table class="min-w-full text-sm">
            <thead class="bg-green-100 text-left">
                <tr>
                    <th class="px-4 py-3">Image</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Category</th>
                    <th class="px-4 py-3">Stock</th>
                    <th class="px-4 py-3">Lowest Price</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    @php
                        $stock = $product->product_variants->sum('stock');
                        $lowestPrice = $product->product_variants->min('price');
                        $image = $product->product_images->first();
                    @endphp
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">
                            @if ($image)
                                <img src="{{ asset('storage/' . $image->image) }}" class="w-6 h-6 rounded-full object-cover" alt="Product Image">
                            @else
                                <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">N/A</div>
                            @endif
                        </td>
                        <td class="px-4 py-3 font-medium">{{ $product->name }}</td>
                        <td class="px-4 py-3">{{ $product->product_category->name ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $stock }}</td>
                        <td class="px-4 py-3">Rp {{ number_format($lowestPrice ?? 0, 0, ',', '.') }}</td>
                        <td class="px-4 py-3">
                            <div class="relative group inline-block text-left">
                                <button class="bg-gray-100 px-3 py-1 rounded hover:bg-gray-200">...</button>
                                <div class="absolute hidden group-hover:block bg-white border rounded shadow z-10 mt-1">
                                    <a href="{{ route('products.edit', $product->id) }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

                @if ($products->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center px-4 py-6 text-gray-500">No products found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $products->withQueryString()->links() }}
    </div>
</div>
</body>
</html>
