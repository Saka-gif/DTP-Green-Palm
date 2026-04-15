<h1>Data Tipe Rumah</h1>

<a href="/tiperumah/create">+ Tambah Tipe</a>

@foreach($data as $t)
    <p>{{ $t->nama_tipe }} - {{ $t->deskripsi }}</p>
@endforeach