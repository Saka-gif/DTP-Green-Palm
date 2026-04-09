<h1>Tambah Rumah</h1>

<form action="/rumah/store" method="POST">
    @csrf

    <input type="text" name="nama_rumah" placeholder="Nama Rumah"><br>
    <input type="number" name="harga" placeholder="Harga"><br>
    <input type="text" name="lokasi" placeholder="Lokasi"><br>
    <input type="text" name="status" placeholder="Status"><br>
    <textarea name="deskripsi" placeholder="Deskripsi"></textarea><br>

    <button type="submit">Simpan</button>
</form>