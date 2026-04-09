<h1>Data Rumah</h1>

@foreach($data as $r)
    <p>
        {{ $r->nama_rumah }} - {{ $r->harga }}
        <a href="/rumah/edit/{{ $r->id }}">Edit</a>
        <form action="/rumah/delete/{{ $r->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </p>
@endforeach

