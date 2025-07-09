<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Proof</title>
    @vite('resources/css/app.css')
</head>
<body class="p-4">
    @include('components.sidebar')
    <div class="px-20 py-4">
        <h1 class="text-4xl font-bold mb-4 ml-5">Upload Proof</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-2 border rounded mb-4 ml-5">
                {{ session('success') }}
            </div>
        @endif

        <form class="w-full ml-5" action="{{ route('admin.batches.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="w-full flex flex-row gap-4">
                <!-- Left Column -->
                <div class="w-1/2 border flex flex-col gap-3 rounded-md p-4">
                    <!-- Organization -->
                    <div>
                        <p>Reforestation Organization</p>
                        <select name="organization_id" class="border w-full rounded-md p-1" required>
                            <option value="">-- Select Organization -- </option>
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

                    <!-- Date of Activity -->
                    <div>
                        <p>Date of Activity</p>
                        <input type="date" name="dateofactivity" class="border w-full rounded-md p-1" value="{{ old('dateofactivity') }}" required />
                        @error('dateofactivity')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Trees Planted -->
                    <div>
                        <p>Trees Planted</p>
                        <input type="number" name="treesplanted" class="border w-full rounded-md p-1" value="{{ old('treesplanted') }}" required />
                        @error('treesplanted')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Batch Date -->
                    <div>
                        <p>Start Date</p>
                        <input type="date" name="startdate" class="border w-full rounded-md p-1" value="{{ old('startdate') }}" required />
                        @error('startdate')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <p>End Date</p>
                        <input type="date" name="enddate" class="border w-full rounded-md p-1" value="{{ old('enddate') }}" required />
                        @error('enddate')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Right Column -->
                <div class="w-1/2 border flex flex-col gap-3 rounded-md p-4">
                    <!-- Upload Photo -->
                    <div>
                        <p>Upload Photo</p>
                        <input type="file" class="border h-40 w-full rounded-md p-1" name="batchproof" id="batchproof" accept="image/*" onchange="previewImage(event)" required />
                        @error('batchproof')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <!-- Preview -->
                        <div id="preview-container" class="mt-2">
                            <img id="preview" class="w-full h-40 object-contain border rounded-md" style="display: none;" />
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mt-5">Upload Proof</button>
            </div>
        </form>
    </div>

    <!-- Image Preview Script -->
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
