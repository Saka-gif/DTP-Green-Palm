<head>
    <link rel="icon" type="image/x-icon" href="{{ asset('gambar/logo_green_palm.jpeg') }}">
</head>

<body class="bg-green-50">
    <script src="https://cdn.tailwindcss.com"></script>

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

<h1 class="text-xl font-bold text-green-800 mb-4">Tambah Rumah</h1>

@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 p-4 mb-4 rounded">
        <p class="font-bold mb-2">Terjadi kesalahan:</p>
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 p-4 mb-4 rounded">
        <p class="font-bold">Error:</p>
        <p>{{ $message }}</p>
    </div>
@endif

<form action="/rumah" method="POST" enctype="multipart/form-data">
    @csrf

<select name="tipe_id" required class="w-full border p-2 mb-3 rounded">
    <option value="">-- Pilih Tipe Rumah --</option>
    @foreach($tipe as $t)
        <option value="{{ $t->id }}">{{ $t->nama_tipe }}</option>
    @endforeach
</select>

    <label class="block mb-2 text-sm font-medium text-gray-700">Foto Rumah</label>
    <input type="file" name="foto" id="fotoRumah" class="hidden" onchange="updateFileName(this, 'fotoRumahText')">
    <div class="flex items-center gap-3 mb-3">
        <label for="fotoRumah" class="bg-green-600 text-white px-4 py-2 rounded cursor-pointer hover:bg-green-700">
            Pilih Foto Rumah
        </label>
        <span id="fotoRumahText" class="text-sm text-gray-500">Belum ada foto rumah dipilih</span>
    </div>

    <label class="block mb-2 text-sm font-medium text-gray-700">Denah Rumah</label>
    <input type="file" name="denah" id="denahRumah" class="hidden" onchange="updateFileName(this, 'denahRumahText')">
    <div class="flex items-center gap-3 mb-3">
        <label for="denahRumah" class="bg-green-600 text-white px-4 py-2 rounded cursor-pointer hover:bg-green-700">
            Pilih Denah Rumah
        </label>
        <span id="denahRumahText" class="text-sm text-gray-500">Belum ada denah rumah dipilih</span>
    </div>
    <p class="text-xs text-gray-500 mb-3">Foto rumah dipakai untuk tampilan utama, denah dipakai di bagian specifications.</p>

    <input type="text" name="nama_rumah" placeholder="Nama Rumah"
        class="w-full border p-2 mb-3 rounded">

    <input type="number" name="harga" placeholder="Harga"
        class="w-full border p-2 mb-3 rounded">

    <input type="text" name="lokasi" placeholder="Lokasi"
        class="w-full border p-2 mb-3 rounded">

   <select name="status" class="w-full border p-2 mb-3 rounded">
    <option value="Tersedia">Tersedia</option>
    <option value="Sold">Sold</option>
</select>

    <textarea name="deskripsi" class="w-full border p-2 mb-3 rounded" placeholder="Deskripsi"></textarea>

<input type="text" name="luas_tanah" placeholder="Luas Tanah"
    class="w-full border p-2 mb-3 rounded">

<input type="text" name="luas_bangunan" placeholder="Luas Bangunan"
    class="w-full border p-2 mb-3 rounded">

<input type="number" name="kamar_tidur" placeholder="Kamar Tidur"
    class="w-full border p-2 mb-3 rounded">

<input type="number" name="kamar_mandi" placeholder="Kamar Mandi"
    class="w-full border p-2 mb-3 rounded">

<input type="number" name="lantai" placeholder="Jumlah Lantai"
    class="w-full border p-2 mb-3 rounded">

<input type="number" name="carport" placeholder="Jumlah Carport"
    class="w-full border p-2 mb-3 rounded">

    <button class="bg-green-600 text-white px-4 py-2 rounded">
        Simpan
    </button>
</form>

</div>

<script>
    function updateFileName(input, targetId) {
        const target = document.getElementById(targetId);
        target.textContent = input.files.length ? input.files[0].name : 'Belum ada file dipilih';
    }
</script>