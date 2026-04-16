@extends('layouts.app')

@section('content')

<body class="bg-green-50">
    

<h1 class="text-2xl font-bold text-green-700 mb-6">Data Tipe Rumah</h1>

<a href="/tiperumah/create"
   class="bg-green-600 text-white px-4 py-2 rounded mb-6 inline-block">
   + Tambah Tipe Rumah
</a>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
@foreach($data as $t)
    <div class="bg-white p-4 rounded-xl shadow">

        <h2 class="text-lg font-semibold text-green-700">
            {{ $t->nama_tipe }}
        </h2>

        <p class="text-gray-600 text-sm mb-3">
            {{ $t->deskripsi }}
        </p>

        <div class="flex gap-2">
            <a href="/tiperumah/{{ $t->id }}/edit"
               class="bg-yellow-400 px-3 py-1 rounded text-sm">
               Edit
            </a>

            <form action="/tiperumah/{{ $t->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 text-white px-3 py-1 rounded text-sm">
                    Hapus
                </button>
            </form>
        </div>

    </div>
@endforeach
</div>
</body>

@endsection