<body class="bg-green-50">
    <script src="https://cdn.tailwindcss.com"></script>

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

<h1 class="text-xl font-bold text-green-800 mb-4">Tambah Rumah</h1>

<form action="/rumah" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="file" name="foto" class="mb-3">

    <input type="text" name="nama_rumah" placeholder="Nama Rumah"
        class="w-full border p-2 mb-3 rounded">

    <input type="number" name="harga" placeholder="Harga"
        class="w-full border p-2 mb-3 rounded">

    <input type="text" name="lokasi" placeholder="Lokasi"
        class="w-full border p-2 mb-3 rounded">

    <input type="text" name="status" placeholder="Status"
        class="w-full border p-2 mb-3 rounded"  >

    <input type="text" name="deskripsi" placeholder="Deskripsi"
        class="w-full border p-2 mb-3 rounded">

    <button class="bg-green-600 text-white px-4 py-2 rounded">
        Simpan
    </button>
</form>

</div>