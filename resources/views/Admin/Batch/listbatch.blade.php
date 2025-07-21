<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batch List</title>
    @vite('resources/css/app.css')
</head>
<body class="p-4 bg-yellow-2">
    @include('components.sidebar')

    <div class="w-[90vw] ml-[5vw] mt-5 p-6">
        <div class="flex flex-row justify-between items-center mb-4">
            <h1 class="text-4xl font-bold">Daftar Batch</h1>
            <a href="{{ route('admin.batches.create') }}" class="px-4 py-3 bg-green-2 text-white rounded hover:bg-green-3 font-medium">
                + Unggah Bukti
            </a>
        </div>

        {{-- Batch Table --}}
        <div class="bg-white rounded shadow">
            <table class="min-w-full text-sm">
                <thead class="bg-green-100 text-left">
                    <tr>
                        <th class="px-4 py-3">ID Batch</th>
                        <th class="px-4 py-3">Nama Organisasi</th>
                        <th class="px-4 py-3">Tanggal Kegiatan</th>
                        <th class="px-4 py-3">Jumlah Pohon Ditanam</th>
                        <th class="px-4 py-3">Tanggal Batch</th>
                    </tr>
                </thead>
                <tbody class="bg-yellow-2">
                    @foreach($batches as $batch)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $batch->batchid }}</td>
                            <td class="px-4 py-3">{{ $batch->organization->organization_name ?? 'N/A' }}</td>
                            <td class="px-4 py-3">{{ $batch->dateofactivity }}</td>
                            <td class="px-4 py-3">{{ $batch->treesplanted }}</td>
                            <td class="px-4 py-3">
                                    {{ \Carbon\Carbon::parse($batch->startdate)->translatedformat('d F Y') }} - 
                                    {{ \Carbon\Carbon::parse($batch->enddate)->translatedformat('d F Y') }}
                            </td>
                        </tr>
                    @endforeach

                    @if ($batches->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center px-4 py-6 text-gray-500">Tidak ditemukan Batch.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $batches->links() }}
        </div>
    </div>
</body>
</html>
