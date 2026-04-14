<!DOCTYPE html>
<html>
<head>
    <title>Detail Rumah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50">

<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

    <img src="{{ asset('images/'.$rumah->foto) }}" 
         class="w-full h-64 object-cover rounded mb-4">

    <h1 class="text-2xl font-bold text-green-800 mb-2">
        {{ $rumah->nama_rumah }}
    </h1>

    <p class="text-gray-700 mb-1">
        Harga: Rp {{ number_format($rumah->harga,0,',','.') }}
    </p>

    <p class="text-gray-700 mb-1">
        Lokasi: {{ $rumah->lokasi }}
    </p>

    <p class="text-gray-700 mb-4">
        Status: {{ $rumah->status }}
    </p>

    <div class="flex gap-3">
        <a href="/"class="bg-green-600 text-black mb-2 py-2 px-4 rounded text-lg inline-block">
            Kembali
        </a>
    </div>

</div>

</body>
</html>