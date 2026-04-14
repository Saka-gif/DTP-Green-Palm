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

    <input type="file" name="foto" class="mb-3">

    <img src="{{ asset('images/'.$rumah->foto) }}" width="100" class="mb-3">

    <input type="text" name="nama_rumah" value="{{ $rumah->nama_rumah }}"
        class="w-full border p-2 mb-3 rounded">

    <input type="number" name="harga" value="{{ $rumah->harga }}"
        class="w-full border p-2 mb-3 rounded">

    <input type="text" name="lokasi" value="{{ $rumah->lokasi }}"
        class="w-full border p-2 mb-3 rounded">

    <input type="text" name="status" value="{{ $rumah->status }}"
        class="w-full border p-2 mb-3 rounded">

    <textarea name="deskripsi"
        class="w-full border p-2 mb-3 rounded">{{ $rumah->deskripsi }}</textarea>

    <button class="bg-green-600 text-white px-4 py-2 rounded">
        Update
    </button>
</form>

</div>

</body>
</html>