<!DOCTYPE html>
<html>
<head>
    <title>Detail Rumah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50">

<div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

    {{-- Gambar --}}
    @if($rumah->foto)
        <img src="{{ asset('images/'.$rumah->foto) }}"
             class="w-full h-72 object-cover rounded-lg mb-6">
    @endif

    {{-- Nama --}}
    <h1 class="text-2xl font-bold text-green-800 mb-2">
        {{ $rumah->nama_rumah }}
    </h1>

    {{-- Harga --}}
    <p class="text-lg text-gray-700 mb-2">
        Rp {{ number_format($rumah->harga, 0, ',', '.') }}
    </p>

    {{-- Deskripsi --}}
    <p class="text-gray-600 mb-4">
        {{ $rumah->deskripsi }}
    </p>

    {{-- Info tambahan --}}
    <div class="grid grid-cols-2 gap-4 mb-6 text-sm text-gray-700">
        <p><b>Luas Tanah:</b> {{ $rumah->luas_tanah ?? '-' }}</p>
        <p><b>Luas Bangunan:</b> {{ $rumah->luas_bangunan ?? '-' }}</p>
        <p><b>Kamar Tidur:</b> {{ $rumah->kamar_tidur ?? '-' }}</p>
        <p><b>Kamar Mandi:</b> {{ $rumah->kamar_mandi ?? '-' }}</p>
        <p><b>Lokasi:</b> {{ $rumah->lokasi }}</p>
        <p><b>Tipe Rumah:</b> {{ $rumah->tipe->nama_tipe ?? '-' }}</p>
    </div>

    {{-- Tombol --}}
    <div class="mt-6 flex gap-3">
        <a href="/" class="bg-gray-400 text-white px-4 py-2 rounded">
            Kembali
        </a>

        <a href="https://wa.me/628xxxxxxxxxx"
           class="bg-green-600 text-white px-4 py-2 rounded">
           Chat WhatsApp
        </a>
    </div>

</div>

</body>
</html>