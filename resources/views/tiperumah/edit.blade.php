@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

    <h2 class="text-xl font-bold text-green-700 mb-4">
        Edit Tipe Rumah
    </h2>

    <form action="/tiperumah/{{ $tipe->id }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="nama_tipe"
            value="{{ $tipe->nama_tipe }}"
            class="w-full border p-2 mb-3 rounded">

        <textarea name="deskripsi"
            class="w-full border p-2 mb-3 rounded">{{ $tipe->deskripsi }}</textarea>

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Update
        </button>

    </form>

</div>

@endsection