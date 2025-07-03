<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Tree</title>
    @vite('resources/css/app.css')
</head>
<body class="p-4 bg-green-100">
    @include('components.sidebar')

    <div class="px-20 py-6">
        <h1 class="text-4xl font-bold mb-4">Add Tree</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-2 border rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form class="w-full" action="{{ route('tree.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="w-full flex flex-row gap-4">
                <!-- Left Column -->
                <div class="w-1/2 border border-green-300 bg-white flex flex-col gap-3 rounded-md p-4">
                    <div>
                        <p class="font-medium">Tree Name</p>
                        <input type="text" name="treename" value="{{ old('treename') }}" class="border border-black w-full rounded-md p-1" required />
                        @error('treename')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <p class="font-medium">Tree Category</p>
                        <input type="text" name="treecategory" value="{{ old('treecategory') }}" class="border border-black w-full rounded-md p-1" required />
                        @error('treecategory')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <p class="font-medium">Tree Description</p>
                        <textarea name="treedesc" class="border border-black w-full h-20 rounded-md p-1" required>{{ old('treedesc') }}</textarea>
                        @error('treedesc')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <p class="font-medium">Tree Lifespan (Years)</p>
                        <input type="number" name="treelife" value="{{ old('treelife') }}" class="border border-black w-full rounded-md p-1" required />
                        @error('treelife')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <p class="font-medium">Tree Price</p>
                        <input type="number" name="treeprice" step="0.01" value="{{ old('treeprice') }}" class="border border-black w-full rounded-md p-1" required />
                        @error('treeprice')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Right Column -->
                <div class="w-1/2 border border-green-300 bg-white flex flex-col gap-3 rounded-md p-4">
                    <div>
                        <p class="font-medium">Reforestation Organization</p>
                        <select name="organization_id" class="border border-black w-full rounded-md p-1" required>
                            <option value="">-- Select Organization --</option>
                            @foreach($organizations as $org)
                                <option value="{{ $org->organization_id }}" {{ old('organization_id') == $org->organization_id ? 'selected' : '' }}>
                                    {{ $org->organization_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('organization_id')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <p class="font-medium">Tree Photo</p>
                        <input 
                            type="file" 
                            name="treephoto" 
                            id="treephoto" 
                            accept="image/*"
                            class="border border-black h-20 w-full rounded-md p-1 text-center"
                            onchange="previewImage(event)"
                            required
                        />
                        @error('treephoto')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <div id="preview-container" class="mt-2">
                            <img id="preview" class="w-full h-40 object-contain border rounded-md" style="display: none;" />
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mt-5">Add Tree</button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById('preview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            if (event.target.files.length > 0) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }
    </script>
</body>
</html>
