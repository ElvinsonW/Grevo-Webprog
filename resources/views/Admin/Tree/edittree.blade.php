<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tree</title>
    @vite('resources/css/app.css')
</head>
<body class="p-4 bg-green-100">
    @include('components.sidebar')

    <div class="px-20 py-6">
        <h1 class="text-4xl font-bold mb-4">Edit Tree</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-2 border rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form class="w-full" action="{{ route('admin.trees.update', $trees->treeid) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="w-full flex flex-row gap-4">
                <!-- Left Column -->
                <div class="w-1/2 border border-green-300 bg-white flex flex-col gap-3 rounded-md p-4">
                    <div>
                        <p class="font-medium">Tree Name</p>
                        <input type="text" name="treename" class="border border-black w-full rounded-md p-1"
                               value="{{ old('treename', $trees->treename) }}" required />
                        @error('treename')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <p class="font-medium">Tree Category</p>
                        <input type="text" name="treecategory" class="border border-black w-full rounded-md p-1"
                               value="{{ old('treecategory', $trees->treecategory) }}" required />
                        @error('treecategory')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <p class="font-medium">Tree Description</p>
                        <textarea name="treedesc" class="border border-black w-full h-20 rounded-md p-1" required>{{ old('treedesc', $trees->treedesc) }}</textarea>
                        @error('treedesc')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <p class="font-medium">Tree Lifespan (Years)</p>
                        <input type="number" name="treelife" class="border border-black w-full rounded-md p-1"
                               value="{{ old('treelife', $trees->treelife) }}" required />
                        @error('treelife')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <p class="font-medium">Tree Price</p>
                        <input type="number" step="0.01" name="treeprice" class="border border-black w-full rounded-md p-1"
                               value="{{ old('treeprice', $trees->treeprice) }}" required />
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
                                <option value="{{ $org->organization_id }}" {{ old('organization_id', $trees->organization_id) == $org->organization_id ? 'selected' : '' }}>
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
                        @if($trees->treephoto)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $trees->treephoto) }}" alt="Current Photo"
                                     class="w-10 h-10 object-cover rounded-full">
                                <p class="text-sm text-gray-500">Current photo. Upload a new one to replace it.</p>
                            </div>
                        @endif
                        <input type="file" name="treephoto" class="border border-black h-20 w-full rounded-md p-1 text-center" accept="image/*" onchange="previewImage(event)" />
                        @error('treephoto')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <div id="preview-container" class="mt-2">
                            <img id="preview" class="w-full h-40 object-contain border rounded-md" style="display: none;" />
                        </div>

                        <p class="text-sm text-gray-500 mt-1">Leave blank to keep existing photo.</p>
                    </div>
                </div>
            </div>

            <div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mt-5">Update Tree</button>
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
