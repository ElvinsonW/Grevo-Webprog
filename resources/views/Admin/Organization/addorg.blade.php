<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Organization Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="p-5">
  @include('components.sidebar')

  <div class="px-20 py-4">
    <h1 class="text-4xl font-bold mb-4">Add Reforestation Organization</h1>

    @if(session('success'))
      <div class="bg-green-100 text-green-700 p-2 border rounded mb-4">
        {{ session('success') }}
      </div>
    @endif

    <form class="w-full" action="{{route('organization.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="w-full flex flex-row gap-4">
        <!-- LEFT COLUMN -->
        <div class="w-1/2 border flex flex-col gap-3 rounded-md p-4">
          <div>
            <p>Organization Name</p>
            <input type="text" name="organization_name" class="border w-full rounded-md p-1" value="{{ old('organization_name') }}" required />
            @error('organization_name')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <p>Operational Address</p>
            <input type="text" class="border w-full rounded-md p-1" name="operational_address" value="{{ old('operational_address') }}" required />
            @error('operational_address')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <p>Brief Description</p>
            <textarea class="border w-full h-20 rounded-md p-1" name="brief_description" required>{{ old('brief_description') }}</textarea>
            @error('brief_description')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <p>Coverage Region</p>
            <input type="text" class="border w-full rounded-md p-1" name="coverage_region" value="{{ old('coverage_region') }}" required />
            @error('coverage_region')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <p>Official Contact Info</p>
            <input type="text" class="border w-full rounded-md p-1" name="official_contact_info" value="{{ old('official_contact_info') }}" required />
            @error('official_contact_info')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="w-1/2 border flex flex-col gap-3 rounded-md p-4">
          <div>
            <p>Organization Logo</p>
            <input type="file" class="border h-40 w-full rounded-md p-1" name="organization_logo" id="organization_logo" accept="image/*" onchange="previewLogo(event)" required />
            @error('organization_logo')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror

            <!-- Preview -->
            <div id="preview-container" class="mt-2">
              <img id="preview" class="w-full h-40 object-contain border rounded-md" style="display: none;" />
            </div>
          </div>

          <div>
            <p>Types of Tree Planted</p>
            <input type="text" class="border w-full rounded-md p-1" name="types_of_tree_planted" value="{{ old('types_of_tree_planted') }}" required />
            @error('types_of_tree_planted')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <p>Existing Partner or Sponsor (Optional)</p>
            <input type="text" class="border w-full rounded-md p-1" name="existing_partner_or_sponsor" value="{{ old('existing_partner_or_sponsor') }}" />
            @error('existing_partner_or_sponsor')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <p>Organization Status</p>
            <select name="organization_status" class="border w-full rounded-md p-1" required>
              <option value="">-- Select Status --</option>
              <option value="Active" {{ old('organization_status') == 'Active' ? 'selected' : '' }}>Active</option>
              <option value="Not Active" {{ old('organization_status') == 'Not Active' ? 'selected' : '' }}>Not Active</option>
            </select>
            @error('organization_status')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </div>

      <div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mt-5">Add Organization</button>
      </div>
    </form>
  </div>

  <!-- JS for Image Preview -->
  <script>
    function previewLogo(event) {
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
