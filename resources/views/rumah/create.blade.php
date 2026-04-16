<head>
    <link rel="icon" type="image/x-icon" href="{{ asset('gambar/logo_green_palm.jpeg') }}">
</head>

<body class="bg-green-50">
    <script src="https://cdn.tailwindcss.com"></script>

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

<h1 class="text-xl font-bold text-green-800 mb-4">Tambah Rumah</h1>
<form action="/rumah" method="POST" enctype="multipart/form-data">
    @csrf

<select name="tipe_id" class="w-full border p-2 mb-3 rounded">
    <option value="">-- Pilih Tipe Rumah --</option>
    @foreach($tipe as $t)
        <option value="{{ $t->id }}">{{ $t->nama_tipe }}</option>
    @endforeach
</select>

    <input type="file" name="foto" class="mb-3">

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