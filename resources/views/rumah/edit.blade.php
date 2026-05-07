<!DOCTYPE html>
<html>
<head>
    <title>Edit Rumah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('gambar/logo_green_palm.jpeg') }}">
</head>
<body class="bg-green-50">

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

<h1 class="text-xl font-bold text-green-800 mb-4">Edit Rumah</h1>

    <form action="/rumah/update/{{ $rumah->id }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label class="block mb-2 text-sm font-medium text-gray-700">Foto Rumah</label>
    <input type="file" name="foto" id="fotoRumah" class="hidden" onchange="updateFileName(this, 'fotoRumahText')">
    <div class="flex items-center gap-3 mb-3">
        <label for="fotoRumah" class="bg-green-600 text-white px-4 py-2 rounded cursor-pointer hover:bg-green-700">
            Ganti Foto Rumah
        </label>
        <span id="fotoRumahText" class="text-sm text-gray-500">
            {{ $rumah->foto ? $rumah->foto : 'Belum ada foto rumah dipilih' }}
        </span>
    </div>

    @if($rumah->foto)
        <img src="{{ asset('images/'.$rumah->foto) }}" width="100" class="mb-3 rounded">
    @endif

    <label class="block mb-2 text-sm font-medium text-gray-700">Denah Rumah</label>
    <input type="file" name="denah" id="denahRumah" class="hidden" onchange="updateFileName(this, 'denahRumahText')">
    <div class="flex items-center gap-3 mb-3">
        <label for="denahRumah" class="bg-green-600 text-white px-4 py-2 rounded cursor-pointer hover:bg-green-700">
            Ganti Denah Rumah
        </label>
        <span id="denahRumahText" class="text-sm text-gray-500">
            {{ $rumah->denah ? $rumah->denah : 'Belum ada denah rumah dipilih' }}
        </span>
    </div>

    @if($rumah->denah)
        <img src="{{ asset('images/'.$rumah->denah) }}" width="100" class="mb-3 rounded">
    @endif

    <p class="text-xs text-gray-500 mb-3">Foto rumah ditampilkan di halaman utama, denah dipakai di bagian specifications.</p>

    <input type="text" name="nama_rumah" value="{{ $rumah->nama_rumah }}" placeholder="Nama Rumah"
        class="w-full border p-2 mb-3 rounded">

    <input type="number" name="harga" value="{{ $rumah->harga }}" placeholder="Harga Rumah"
        class="w-full border p-2 mb-3 rounded">

    <input type="text" name="lokasi" value="{{ $rumah->lokasi }}"placeholder="Lokasi Rumah"
        class="w-full border p-2 mb-3 rounded">

    <input type="text" name="status" value="{{ $rumah->status }}" placeholder="Status Rumah (Tersedia/Sold Out)"
        class="w-full border p-2 mb-3 rounded">

    <textarea name="deskripsi" class="w-full border p-2 mb-3 rounded" placeholder="Deskripsi Rumah">
    {{ $rumah->deskripsi }}
</textarea>

<input type="text" name="luas_tanah" placeholder="Luas Tanah" value="{{ $rumah->luas_tanah }}"
    class="w-full border p-2 mb-3 rounded">

<input type="text" name="luas_bangunan" placeholder="Luas Bangunan" value="{{ $rumah->luas_bangunan }}"
    class="w-full border p-2 mb-3 rounded">

<input type="number" name="kamar_tidur" placeholder="Jumlah Kamar Tidur" value="{{ $rumah->kamar_tidur }}"
    class="w-full border p-2 mb-3 rounded">

<input type="number" name="kamar_mandi" placeholder="Jumlah Kamar Mandi" value="{{ $rumah->kamar_mandi }}"
    class="w-full border p-2 mb-3 rounded">

<input type="number" name="lantai" placeholder="Jumlah Lantai" value="{{ $rumah->lantai }}"
    class="w-full border p-2 mb-3 rounded">

<input type="number" name="carport" placeholder="Jumlah Carport" value="{{ $rumah->carport }}"
    class="w-full border p-2 mb-3 rounded">

<select name="tipe_id" class="w-full border p-2 mb-3 rounded">
    <option value="">Pilih Tipe Rumah</option>
    @foreach(\App\Models\TipeRumah::all() as $tipe)
        <option value="{{ $tipe->id }}" {{ $rumah->tipe_id == $tipe->id ? 'selected' : '' }}>
            {{ $tipe->nama_tipe }}
        </option>
    @endforeach
</select>


    <button class="bg-green-600 text-white px-4 py-2 rounded">
        Update
    </button>
</form>

</div>

<script>
    function updateFileName(input, targetId) {
        const target = document.getElementById(targetId);
        target.textContent = input.files.length ? input.files[0].name : 'Belum ada file dipilih';
    }
</script>

</body>
</html>