@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.32em] text-emerald-700">Admin Dashboard</p>
            <h1 class="mt-3 text-3xl font-bold tracking-tight text-slate-950">Kelola Rumah & Tipe Rumah</h1>
            <p class="mt-2 text-sm text-slate-600 max-w-2xl">Semua data rumah dan tipe tampil terstruktur di satu dashboard. Edit, hapus, dan tambah langsung dari halaman admin.</p>
        </div>
        <div class="flex flex-wrap gap-3">
            <a href="/rumah/create" class="inline-flex items-center justify-center rounded-full bg-emerald-700 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-800">Tambah Rumah</a>
            <a href="/tiperumah/create" class="inline-flex items-center justify-center rounded-full bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-slate-800">Tambah Tipe</a>
        </div>
    </div>

    <div class="grid gap-4 md:grid-cols-3">
        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-sm font-semibold text-slate-500">Total Rumah</p>
            <p class="mt-4 text-3xl font-bold text-slate-900">{{ $stats['totalRumah'] }}</p>
            <p class="mt-2 text-sm text-slate-500">Jumlah total unit yang bisa dikelola.</p>
        </div>
        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-sm font-semibold text-slate-500">Tipe Rumah</p>
            <p class="mt-4 text-3xl font-bold text-slate-900">{{ $stats['totalTipe'] }}</p>
            <p class="mt-2 text-sm text-slate-500">Jumlah kategori tipe rumah.</p>
        </div>
        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-sm font-semibold text-slate-500">Status Tersedia</p>
            <p class="mt-4 text-3xl font-bold text-emerald-700">{{ $stats['tersedia'] }}</p>
            <p class="mt-2 text-sm text-slate-500">Unit yang saat ini berstatus tersedia.</p>
        </div>
    </div>

    <div class="grid gap-6">
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Data Rumah</h2>
                    <p class="mt-1 text-sm text-slate-500">Lihat semua rumah, edit data, atau hapus unit yang sudah tidak aktif.</p>
                </div>
                <span class="rounded-full bg-emerald-100 px-4 py-2 text-sm font-semibold text-emerald-800">{{ $stats['totalRumah'] }} units</span>
            </div>

            <div class="mt-6 overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-4 py-3 font-semibold text-slate-600">Nama Rumah</th>
                            <th class="px-4 py-3 font-semibold text-slate-600">Tipe</th>
                            <th class="px-4 py-3 font-semibold text-slate-600">Harga</th>
                            <th class="px-4 py-3 font-semibold text-slate-600">Status</th>
                            <th class="px-4 py-3 font-semibold text-slate-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        @forelse($rumah as $item)
                        <tr>
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="h-12 w-16 overflow-hidden rounded-2xl bg-slate-100">
                                        <img src="{{ $item->foto ? asset('images/' . $item->foto) : asset('gambar/home_page_green_palm.jpeg') }}" alt="{{ $item->nama_rumah }}" class="h-full w-full object-cover" />
                                    </div>
                                    <div>
                                        <p class="font-semibold text-slate-900">{{ $item->nama_rumah }}</p>
                                        <p class="text-xs text-slate-500">{{ $item->lokasi }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4 text-slate-700">{{ $item->tipe->nama_tipe ?? '-' }}</td>
                            <td class="px-4 py-4 text-slate-700">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td class="px-4 py-4">
                                <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ strtolower($item->status) === 'tersedia' ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800' }}">{{ $item->status }}</span>
                            </td>
                            <td class="px-4 py-4">
                                <div class="flex flex-wrap gap-2">
                                    <a href="/rumah/edit/{{ $item->id }}" class="rounded-full bg-yellow-400 px-3 py-1 text-xs font-semibold text-slate-900">Edit</a>
                                    <form action="/rumah/delete/{{ $item->id }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-full bg-rose-500 px-3 py-1 text-xs font-semibold text-white">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-sm text-slate-500">Tidak ada data rumah.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Data Tipe Rumah</h2>
                    <p class="mt-1 text-sm text-slate-500">Kelola semua tipe rumah yang tersedia di platform.</p>
                </div>
                <span class="rounded-full bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700">{{ $stats['totalTipe'] }} tipe</span>
            </div>

            <div class="mt-6 overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-4 py-3 font-semibold text-slate-600">Nama Tipe</th>
                            <th class="px-4 py-3 font-semibold text-slate-600">Deskripsi</th>
                            <th class="px-4 py-3 font-semibold text-slate-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        @forelse($tipeRumah as $tipe)
                        <tr>
                            <td class="px-4 py-4 font-semibold text-slate-900">{{ $tipe->nama_tipe }}</td>
                            <td class="px-4 py-4 text-slate-700">{{ Str::limit($tipe->deskripsi, 70, '...') }}</td>
                            <td class="px-4 py-4">
                                <div class="flex flex-wrap gap-2">
                                    <a href="/tiperumah/{{ $tipe->id }}/edit" class="rounded-full bg-yellow-400 px-3 py-1 text-xs font-semibold text-slate-900">Edit</a>
                                    <form action="/tiperumah/{{ $tipe->id }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-full bg-rose-500 px-3 py-1 text-xs font-semibold text-white">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-4 py-8 text-center text-sm text-slate-500">Tidak ada data tipe rumah.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
@endsection
