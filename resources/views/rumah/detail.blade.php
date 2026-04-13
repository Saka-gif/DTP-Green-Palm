<!DOCTYPE html>
<html>
<head>
    <title>Detail Rumah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50">

<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">
    <a href="/rumah" 
   class="text-green-600 mb-4 inline-block"
    >
   <-Kembali
</a>

    <h1 class="text-2xl font-bold text-green-700 mb-4">
        {{ $rumah->nama_rumah }}
    </h1>

    @if($rumah->foto)
        <img src="{{ asset('images/'.$rumah->foto) }}" 
             class="w-full h-64 object-cover rounded mb-4">
    @endif

    <p class="text-gray-700 mb-2">
        <strong>Harga:</strong> Rp {{ $rumah->harga }}
    </p>

    <p class="text-gray-700 mb-2">
        <strong>Lokasi:</strong> {{ $rumah->lokasi }}
    </p>

    <p class="text-gray-700 mb-4">
        <strong>Deskripsi:</strong> {{ $rumah->deskripsi }}
    </p>

</div>

</body>
</html>