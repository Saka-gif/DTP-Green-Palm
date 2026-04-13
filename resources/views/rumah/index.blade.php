<!DOCTYPE html>
<html>
<head>
    <title>Data Rumah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50">

<div class="max-w-5xl mx-auto mt-10">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-green-800">Data Rumah</h1>
        <a href="/rumah/create" class="bg-green-600 text-white px-4 py-2 rounded-lg">
            + Tambah Rumah
        </a>
    </div>

    <!-- Card List -->
    <div class="grid grid-cols-2 gap-6">

@foreach($data as $r)
    <div class="bg-white p-4 rounded-xl shadow">

        @if($r->foto)
            <img src="{{ asset('images/'.$r->foto) }}" 
                 class="w-full h-40 object-cover rounded">
        @endif

        <a href="/rumah/{{ $r->id }}">
            <h2 class="text-lg font-bold text-green-700 mt-2">
                {{ $r->nama_rumah }}
            </h2>
        </a>

        <p class="text-gray-600">Rp {{ $r->harga }}</p>

        <!-- tombol tetap di dalam card -->
        <div class="mt-4 flex gap-2">
            <a href="/rumah/edit/{{ $r->id }}" 
               class="bg-yellow-400 px-3 py-1 rounded text-sm">
               Edit
            </a>

            <form action="/rumah/delete/{{ $r->id }}" method="POST">
                @csrf
                <button class="bg-red-500 text-white px-3 py-1 rounded text-sm">
                    Hapus
                </button>
            </form>
        </div>

    </div>
@endforeach

</div>