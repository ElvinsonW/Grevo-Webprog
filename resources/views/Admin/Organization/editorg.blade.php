<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Organization Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="p-5">
  @include('components.sidebar')

  <div class="px-20 py-4">
    <h1 class="text-4xl font-bold mb-4">Edit Reforestation Organization</h1>

    @if(session('success'))
      <div class="bg-green-100 text-green-700 p-2 border rounded mb-4">
        {{ session('success') }}
      </div>
    @endif

    <form class="w-full" action="{{ route('admin.organizations.update', $organization->organization_id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="w-full flex flex-row gap-4">
        <!-- LEFT COLUMN -->
        <div class="w-1/2 border flex flex-col gap-3 rounded-md p-4">
          <div>
            <p>Organization Name</p>
            <input type="text" name="organization_name" class="border w-full rounded-md p-1"
                   value="{{ old('organization_name', $organization->organization_name) }}" required />
            @error('organization_name')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <p>Operational Address</p>
            <input type="text" name="operational_address" class="border w-full rounded-md p-1"
                   value="{{ old('operational_address', $organization->operational_address) }}" required />
            @error('operational_address')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <p>Brief Description</p>
            <textarea name="brief_description" class="border w-full h-20 rounded-md p-1" required>{{ old('brief_description', $organization->brief_description) }}</textarea>
            @error('brief_description')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <p>Coverage Region</p>
            <input type="text" name="coverage_region" class="border w-full rounded-md p-1"
                   value="{{ old('coverage_region', $organization->coverage_region) }}" required />
            @error('coverage_region')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <p>Official Contact Info</p>
            <input type="text" name="official_contact_info" class="border w-full rounded-md p-1"
                   value="{{ old('official_contact_info', $organization->official_contact_info) }}" required />
            @error('official_contact_info')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="w-1/2 border flex flex-col gap-3 rounded-md p-4">
          <div>
            <p>Organization Logo</p>
            @if ($organization->organization_logo)
              <div class="mb-2">
                <img src="{{ asset('storage/' . $organization->organization_logo) }}" alt="Current Logo" class="w-10 h-10 object-cover rounded-full">
                <p class="text-sm text-gray-500">Current logo. Upload a new one to replace it.</p>
              </div>
            @endif
            <input type="file" class="border h-40 w-full rounded-md p-1" name="organization_logo" />
            @error('organization_logo')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
            <p class="text-sm text-gray-500 mt-1">Leave blank to keep existing logo.</p>
          </div>

          <div>
            <p>Existing Partner or Sponsor (Optional)</p>
            <input type="text" name="existing_partner_or_sponsor" class="border w-full rounded-md p-1"
                   value="{{ old('existing_partner_or_sponsor', $organization->existing_partner_or_sponsor) }}" />
            @error('existing_partner_or_sponsor')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <p>Organization Status</p>
            <select name="organization_status" class="border w-full rounded-md p-1" required>
              <option value="">-- Select Status --</option>
              <option value="Active" {{ old('organization_status', $organization->organization_status) == 'Active' ? 'selected' : '' }}>Active</option>
              <option value="Not Active" {{ old('organization_status', $organization->organization_status) == 'Not Active' ? 'selected' : '' }}>Not Active</option>
            </select>
            @error('organization_status')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </div>

      <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mt-5">Save Changes</button>
      </div>
    </form>
  </div>
</body>
</html>
