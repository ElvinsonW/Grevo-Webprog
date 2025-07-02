<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batch List</title>
    @vite('resources/css/app.css')
</head>
<body class="p-4">
    @include('components.sidebar')
    <div class="px-20 py-4">
    <div class="flex flex-row items-center justify-between">
        <h1 class="text-4xl">Batch List</h1>
        <a href ="{{ route('batch.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">+ Upload Proof </a>
    </div>

    <div class="border border-blue-400 rounded-md overflow-x-auto mt-4">
        <table class="w-full text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-2">Batch ID</th>
                    <th>Organization Name</th>
                    <th>Date of Activity</th>
                    <th>Trees Planted</th>
                    <th>Batch Date</th>
                </tr>
            </thead>

            <tbody>
                @foreach($batches as $batch)
                <tr class ="border-t">
                    <td class = "px-2 py-2">{{ $batch->batchid }}</td>
                    <td class = "py-2">{{ $batch->organization->organization_name ?? 'N/A'}}</td>
                    <td class = "py-2">{{ $batch->dateofactivity}}</td>
                    <td class = "py-2">{{ $batch->treesplanted}}</td>
                    <td class = "py-2">{{ $batch->batchdate}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
            <div class="mt-4 flex justify-between flex-row w-full">
                <div id="pagination-links">
                        {{ $batches->links() }}
                </div>
            </div>
</div>
</body>
</html>