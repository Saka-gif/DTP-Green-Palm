<h1>Tambah Tipe Rumah</h1>

<form action="/tiperumah" method="POST">
    @csrf

    <input type="text" name="nama_tipe" placeholder="Nama Tipe">
    <input type="text" name="deskripsi" placeholder="Deskripsi">

    <button type="submit">Simpan</button>
</form>