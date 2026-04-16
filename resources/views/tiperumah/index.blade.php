@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4 text-green-700">Data Tipe Rumah</h1>

    <a href="/tiperumah/create" 
       class="bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block">
        + Tambah Tipe
    </a>

    @foreach($data as $t)
        <div class="border p-3 rounded mb-3">
            <p class="font-semibold">{{ $t->nama_tipe }}</p>
            <p class="text-gray-600 text-sm">{{ $t->deskripsi }}</p>

            <div class="mt-2 flex gap-2">
                <a href="/tiperumah/{{ $t->id }}/edit" 
                   class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
                    Edit
                </a>

                <form action="/tiperumah/{{ $t->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                        class="bg-red-500 text-white px-3 py-1 rounded text-sm">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    @endforeach

</div>

@endsection