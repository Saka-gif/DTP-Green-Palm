@extends('layouts.app')

@section('content')
<div class="space-y-8 pb-10">
    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div class="flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-2xl shadow-sm animate-fade-in">
            <svg xmlns="http://w3.org" class="h-5 w-5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-sm font-medium">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Header --}}
    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.3em] text-emerald-600">Admin Dashboard</p>
            <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-slate-950">Kelola Properti</h1>
            <p class="mt-2 text-sm text-slate-500 max-w-xl">Manajemen unit rumah dan kategori tipe dalam satu panel kendali terpusat.</p>
        </div>
        <div class="flex flex-wrap gap-3">
            <a href="{{ url('/rumah/create') }}" class="inline-flex items-center justify-center rounded-xl bg-emerald-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700 focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">
                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Rumah
            </a>
            <a href="{{ url('/tiperumah/create') }}" class="inline-flex items-center justify-center rounded-xl bg-slate-900 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-slate-800 focus:ring-2 focus:ring-slate-500 focus:ring-offset-2">
                Tambah Tipe
            </a>
        </div>
    </div>

    {{-- Stats Grid --}}
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @php
            $statCards = [
                ['label' => 'Total Rumah', 'value' => $stats['totalRumah'], 'desc' => 'Unit terdaftar', 'color' => 'text-slate-900'],
                ['label' => 'Tipe Rumah', 'value' => $stats['totalTipe'], 'desc' => 'Kategori tersedia', 'color' => 'text-slate-900'],
                ['label' => 'Status Tersedia', 'value' => $stats['tersedia'], 'desc' => 'Siap huni/jual', 'color' => 'text-emerald-600'],
            ];
        @endphp

        @foreach($statCards as $card)
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition-hover hover:shadow-md">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">{{ $card['label'] }}</p>
                <div class="mt-4 flex items-baseline gap-2">
                    <p class="text-4xl font-black {{ $card['color'] }}">{{ $card['value'] }}</p>
                    <p class="text-xs font-medium text-slate-400">{{ $card['desc'] }}</p>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Tables Section --}}
    <div class="grid gap-8">
        
        {{-- Table Rumah --}}
        <section class="rounded-3xl border border-slate-200 bg-white shadow-sm overflow-hidden">
            <div class="flex items-center justify-between border-b border-slate-100 p-6">
                <div>
                    <h2 class="text-lg font-bold text-slate-900">Daftar Unit Rumah</h2>
                    <p class="text-xs text-slate-500">Total {{ $stats['totalRumah'] }} unit ditemukan</p>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-slate-50/50 text-xs uppercase tracking-wider text-slate-500">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Informasi Rumah</th>
                            <th class="px-6 py-4 font-semibold">Tipe</th>
                            <th class="px-6 py-4 font-semibold">Harga</th>
                            <th class="px-6 py-4 font-semibold">Status</th>
                            <th class="px-6 py-4 font-semibold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($rumah as $item)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <img src="{{ $item->foto_url ?: asset('gambar/default-home.jpg') }}" 
                                         class="h-12 w-16 rounded-xl object-cover bg-slate-100 shadow-sm" />
                                    <div>
                                        <p class="font-bold text-slate-900">{{ $item->nama_rumah }}</p>
                                        <p class="text-xs text-slate-500"><i class="fas fa-map-marker-alt mr-1"></i>{{ $item->lokasi }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium text-slate-600">{{ $item->tipe->nama_tipe ?? '-' }}</td>
                            <td class="px-6 py-4 font-bold text-slate-900">Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-bold {{ strtolower($item->status) === 'tersedia' ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
                                    <span class="mr-1.5 h-1.5 w-1.5 rounded-full {{ strtolower($item->status) === 'tersedia' ? 'bg-emerald-500' : 'bg-rose-500' }}"></span>
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="/rumah/edit/{{ $item->id }}" class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 text-slate-600 hover:bg-yellow-400 hover:text-white transition-all shadow-sm">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>
                                    <form action="/rumah/delete/{{ $item->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus rumah ini?')">
                                        @csrf @method('DELETE')
                                        <button class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 text-rose-500 hover:bg-rose-500 hover:text-white transition-all shadow-sm">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-400 italic">Belum ada data rumah yang tersedia.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        {{-- Table Tipe Rumah --}}
        <section class="rounded-3xl border border-slate-200 bg-white shadow-sm overflow-hidden">
            <div class="flex items-center justify-between border-b border-slate-100 p-6">
                <div>
                    <h2 class="text-lg font-bold text-slate-900">Kategori Tipe</h2>
                    <p class="text-xs text-slate-500">Terdapat {{ $stats['totalTipe'] }} kategori aktif</p>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-slate-50/50 text-xs uppercase tracking-wider text-slate-500">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Nama Tipe</th>
                            <th class="px-6 py-4 font-semibold">Deskripsi Singkat</th>
                            <th class="px-6 py-4 font-semibold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($tipeRumah as $tipe)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4 font-bold text-slate-900">{{ $tipe->nama_tipe }}</td>
                            <td class="px-6 py-4 text-slate-500 leading-relaxed">{{ Str::limit($tipe->deskripsi, 80) }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="/tiperumah/{{ $tipe->id }}/edit" class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 text-slate-600 hover:bg-yellow-400 hover:text-white transition-all shadow-sm">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>
                                    <form action="/tiperumah/{{ $tipe->id }}" method="POST" onsubmit="return confirm('Menghapus tipe akan berdampak pada data rumah terkait. Lanjutkan?')">
                                        @csrf @method('DELETE')
                                        <button class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 text-rose-500 hover:bg-rose-500 hover:text-white transition-all shadow-sm">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-12 text-center text-slate-400 italic">Belum ada kategori tipe.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
@endsection
