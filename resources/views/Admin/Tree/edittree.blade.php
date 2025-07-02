<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tree</title>

    @vite('resources/css/app.css')
</head>
<body class="p-4">
    @include('components.sidebar')
    <div class="px-20 py-4">
    <h1 class="text-4xl font-bold mb-4">Edit Tree</h1>

    @if($errors->any())
      <div class="text-red-700 bg-red-100 border">
        <ul class="list-disc pl-5">
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if(session('success'))
      <div class="bg-green-100 text-green-700 p-2 border rounded mb-4">
        {{ session('success') }}
      </div>
    @endif
    <form class="w-full" action="{{ route('tree.update', $trees->treeid) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="w-full flex flex-row">
            <div class="w-1/2 border flex flex-col gap-3 rounded-md p-4">
                <div>
                    <p>Tree Name</p>
                    <input type ="text" name="treename" class="border w-full rounded-md p-1" 
                        value = "{{ old('treename', $trees->treename) }}" required />
                </div>
                <div>
                    <p>Tree Category</p>
                    <input type ="text" name="treecategory" class="border w-full rounded-md p-1" 
                        value = "{{ old('treecategory', $trees->treecategory) }}" required />
                </div>
                <div>
                    <p>Tree Description</p>
                    <input type ="text" name="treedesc" class="border w-full h-20 rounded-md p-1" 
                        value =" {{ old('treedesc', $trees->treedesc) }}" required />
                </div>
                <div>
                    <p>Tree Lifespan (Estimate)</p>
                    <input type ="text" name="treelife" class="border w-full rounded-md p-1" 
                        value ="{{ old('treelife', $trees->treelife) }}" required />
                </div>
                <div>
                    <p>Tree Price</p>
                    <input type ="text" name="treeprice" class="border w-full rounded-md p-1" 
                        value = "{{ old('treeprice', $trees->treeprice) }}" required />
                </div>
            </div>
            <div class="w-1/2 border flex flex-col gap-3 rounded-md p-4">
                <div>
                    <p>Reforestation Organization</p>
                    <select name="organization_id" id="organization_id" class="border w-full rounded-md p-1" required>
                        <option value="">-- Select Organization --</option>
                        @foreach($organizations as $org)
                            <option value="{{ $org->organization_id }}" {{ (old('organization_id', $trees->organization_id) == $org->organization_id) ? 'selected' : '' }}>{{ $org->organization_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
               x     <p>Tree Photo</p>
                    @if($trees->treephoto)
                    <div class="mb-2">
                        <img src=" {{ asset('storage/' . $trees->treephoto) }}" alt = "Current Photo" class="w-10 h-10 object-cover rounded-full">
                        <p class="text-sm text-gray-500">Current Photo. Upload a new one to replace it.</p>
                    </div>
                    @endif
                    <input type="file" class="border h-40 w-full rounded-md p-1" name="treephoto" />
                    <p class="text-sm text-gray-500 mt-1">Leave blank to keep existing photo.</p>
                </div>
            </div>
        </div>

        <div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mt-5">Edit Tree</button>
        </div>
    </form>
</div>
</body>
</html>