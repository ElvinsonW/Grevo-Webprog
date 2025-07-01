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
    <div class ="px-20 py-6">
    <h1 class="text-4xl font-bold mb-4">Add Tree</h1>

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
    <form class="w-full" action="{{ route('tree.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="w-full flex flex-row gap-4">
            <div class="w-1/2 border border-green-300 bg-white flex flex-col gap-3 rounded-md p-4">
                <div>
                    <p class="font-medium">Tree Na me</p>
                    <input type ="text" name="treename" class="border border-black w-full rounded-md p-1" required />
                </div>
                <div>
                    <p class="font-medium">Tree Category</p>
                    <input type ="text" name="treecategory" class="border border-black w-full rounded-md p-1" required />
                </div>
                <div>
                    <p class="font-medium">Tree Description</p>
                    <input type ="text" name="treedesc" class="border border-black w-full h-20 rounded-md p-1" required />
                </div>
                <div>
                    <p class="font-medium">Tree Lifespan (Estimate)</p>
                    <input type ="text" name="treelife" class="border border-black w-full rounded-md p-1" required />
                </div>
                <div>
                    <p class="font-medium">Tree Price</p>
                    <input type ="text" name="treeprice" class="border border-black w-full rounded-md p-1" required />
                </div>
            </div>
            <div class="w-1/2 border border-green-300 bg-white flex flex-col gap-3 rounded-md p-4">
                <div>
                    <p class="font-medium">Reforestation Organization</p>
                    <select name="organization_id" class="border border-black w-full rounded-md p-1" required>
                        <option value="">-- Select Organization --</option>
                        @foreach($organizations as $org)
                            <option value="{{ $org->organization_id }}">{{ $org->organization_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <p class="font-medium">Tree Photo</p>
                    <input type="file" class="border border-black h-40 w-full rounded-md p-1" name="treephoto" required />
                </div>
            </div>
        </div>

        <div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mt-5">Add Tree</button>
        </div>
    </form>
    </div>
</body>
</html>