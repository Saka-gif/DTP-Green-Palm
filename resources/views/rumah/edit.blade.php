<h1>Edit Rumah</h1>

<form action="/rumah/update/{{ $rumah->id }}" method="POST">
    @csrf

    <input type="text" name="nama_rumah" value="{{ $rumah->nama_rumah }}"><br>
    <input type="number" name="harga" value="{{ $rumah->harga }}"><br>
    <input type="text" name="lokasi" value="{{ $rumah->lokasi }}"><br>
    <input type="text" name="status" value="{{ $rumah->status }}"><br>
    <textarea name="deskripsi">{{ $rumah->deskripsi }}</textarea><br>

    <button type="submit">Update</button>
</form>