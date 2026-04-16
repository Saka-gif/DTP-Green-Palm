<h1>Edit Tipe Rumah</h1>

<form action="/tiperumah/{{ $tipe->id }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nama_tipe" 
        value="{{ $tipe->nama_tipe }}" placeholder="Nama Tipe">

    <input type="text" name="deskripsi" 
        value="{{ $tipe->deskripsi }}" placeholder="Deskripsi">

    <button type="submit">Update</button>
</form>