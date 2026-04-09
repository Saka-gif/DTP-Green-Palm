<h1>Hapus Rumah</h1>

<p>Apakah Anda yakin ingin menghapus rumah ini?</p>

<form action="/rumah/delete/{{ $rumah->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Ya, Hapus</button>
</form>