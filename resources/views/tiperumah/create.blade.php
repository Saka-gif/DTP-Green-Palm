@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

    <h2 class="text-xl font-bold text-green-700 mb-4">
        Tambah Tipe Rumah
    </h2>

    <form action="/tiperumah" method="POST">
        @csrf

        <input type="text" name="nama_tipe"
            placeholder="Nama Tipe"
            class="w-full border p-2 mb-3 rounded">

        <textarea name="deskripsi"
            placeholder="Deskripsi"
            class="w-full border p-2 mb-3 rounded"></textarea>

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Simpan
        </button>

    </form>

</div>

@endsection