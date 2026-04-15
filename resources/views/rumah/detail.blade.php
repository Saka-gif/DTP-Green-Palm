<!DOCTYPE html>
<html>
<head>
    <title>Detail Rumah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-5xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

    <!-- FOTO -->
    @if($rumah->foto)
        <img src="{{ asset('images/'.$rumah->foto) }}" 
             class="w-full h-96 object-cover rounded mb-6">
    @endif

    <!-- NAMA -->
    <h1 class="text-3xl font-bold text-green-800 mb-2">
        {{ $rumah->nama_rumah }}
    </h1>

    <!-- HARGA -->
    <p class="text-xl text-gray-700 mb-4">
        Rp {{ number_format($rumah->harga,0,',','.') }}
    </p>

    <!-- STATUS -->
    <p class="mb-4">
        <span class="px-3 py-1 rounded 
        {{ $rumah->status == 'Tersedia' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
            {{ $rumah->status }}
        </span>
    </p>

    <!-- DESKRIPSI -->
    <p class="text-gray-600 mb-6">
        {{ $rumah->deskripsi }}
    </p>

    <!-- WHATSAPP -->
    @if($rumah->status == 'Tersedia')
    <a href="https://wa.me/6281234567890?text=Saya tertarik dengan rumah {{ $rumah->nama_rumah }}"
       target="_blank"
       class="bg-green-600 text-white px-6 py-3 rounded-lg">
       Chat WhatsApp
    </a>
    @endif

</div>

</body>
</html>