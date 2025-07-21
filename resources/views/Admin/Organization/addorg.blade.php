<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Organization Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="p-5 bg-yellow-2">
  @include('components.sidebar')

  <div class="px-20 py-4 mt-5 ml-[2vw]">
    <h1 class="text-4xl font-bold mb-4">Tambah Organisasi Reboisasi</h1>

    @if(session('success'))
      <div class="bg-green-100 text-green-700 p-2 border rounded mb-4">
        {{ session('success') }}
      </div>
    @endif

    <form class="w-full" action="{{route('admin.organizations.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="w-full flex flex-row gap-4">
        <!-- LEFT COLUMN -->
        <div class="w-1/2 border border-green-2 flex flex-col gap-3 rounded-md p-4">
          <div>
            <p class="font-medium">Nama Organisasi</p>
            <input type="text" name="organization_name" class="border border-green-2 w-full rounded-md p-2" value="{{ old('organization_name') }}" required />
            @error('organization_name')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <p class="font-medium">Alamat Operasional</p>
            <input type="text" class="border border-green-2 w-full rounded-md p-2" name="operational_address" value="{{ old('operational_address') }}" required />
            @error('operational_address')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <p class="font-medium">Deskripsi Singkat</p>
            <textarea class="border border-green-2 w-full h-20 rounded-md p-2" name="brief_description" required>{{ old('brief_description') }}</textarea>
            @error('brief_description')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <p class="font-medium">Wilayah Cakupan</p>
            <input type="text" class="border border-green-2 w-full rounded-md p-2" name="coverage_region" value="{{ old('coverage_region') }}" required />
            @error('coverage_region')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <p class="font-medium">Info Kontak</p>
            <input type="text" class="border border-green-2 w-full rounded-md p-2" name="official_contact_info" value="{{ old('official_contact_info') }}" required />
            @error('official_contact_info')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="w-1/2 border border-green-2 flex flex-col gap-3 rounded-md p-4">
          <div>
            <p class="font-medium">Logo Organisasi</p>
            
                    <div class="relative w-full">
                        <input 
                            id="organization_logo" 
                            type="file" 
                            name="organization_logo" 
                            class="hidden" 
                            accept="image/*" 
                            onchange="previewLogo(event)"
                            
                        />

                        <label 
                            for="organization_logo" 
                            class="cursor-pointer inline-block px-4 py-2 bg-green-2 text-white rounded hover:bg-green-3 text-center font-medium w-1/2">
                            Unggah Logo Organisasi
                        </label>
                        @error('organization_logo')
                          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
              

            <!-- Preview -->
            <div id="preview-container" class="mt-2">
              <img id="preview" class="w-full h-40 object-contain border border-green-2 rounded-md" style="display: none;" />
            </div>
          </div>

          <div>
            <p class="font-medium">Mitra atau Sponsor yang Sudah Ada (Opsional)</p>
            <input type="text" class="border border-green-2 w-full rounded-md p-2" name="existing_partner_or_sponsor" value="{{ old('existing_partner_or_sponsor') }}" />
            @error('existing_partner_or_sponsor')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <p class="font-medium">Status Organisasi</p>
            <select name="organization_status" class="border border-green-2 w-full rounded-md p-2 bg-yellow-2" required>
              <option value="">-- Pilih Status --</option>
              <option value="Active" {{ old('organization_status') == 'Active' ? 'selected' : '' }}>Aktif</option>
              <option value="Not Active" {{ old('organization_status') == 'Not Active' ? 'selected' : '' }}>Nonaktif</option>
            </select>
            @error('organization_status')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </div>

      <div>
        <button type="submit" class="bg-green-2 text-white px-4 py-2 rounded-md hover:bg-green-3 font-medium mt-5">Tambah Organisasi</button>
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
