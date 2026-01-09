@extends('layouts.admin')

@section('content')
<div class="space-y-8">
    <!-- Page Title -->
    <div class="flex items-end justify-between">
        <div>
            <h2 class="text-3xl font-extrabold text-white tracking-tighter">DASHBOARD</h2>
            <p class="text-zinc-500 text-sm font-medium mt-1">Manajemen data dan statistik Class Billiard.</p>
        </div>
        <div class="text-right hidden md:block">
            <p class="text-[10px] font-black text-amber-500 uppercase tracking-[0.2em]">Sistem Versi</p>
            <p class="text-xs text-zinc-400">v2.4.0-stable</p>
        </div>
    </div>

    <!-- CARDS GRID -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        
        <!-- Card: Data Meja -->
        <a href="/admin/meja" class="group relative block h-full">
            <div class="absolute -inset-0.5 bg-amber-500/20 rounded-2xl blur opacity-0 group-hover:opacity-100 transition duration-500"></div>
            <div class="relative bg-zinc-900 border border-white/5 p-6 rounded-2xl flex flex-col h-full min-h-[180px] hover:border-amber-500/40 transition-all">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-amber-500/10 rounded-xl text-amber-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" stroke-width="2"/></svg>
                    </div>
                    <span class="text-zinc-600 group-hover:text-amber-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 7l5 5m0 0l-5 5m5-5H6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                </div>
                <!-- Handle Text Overflow pada Judul -->
                <h3 class="text-lg font-bold text-white mb-1 truncate">Manajemen Meja Billiard</h3>
                <!-- Handle Text Overflow pada Deskripsi -->
                <p class="text-xs text-zinc-500 line-clamp-2 leading-relaxed">
                    Atur status meja, harga per jam, dan ketersediaan unit meja secara real-time.
                </p>
                <div class="mt-auto pt-4 flex items-center gap-2">
                    <span class="text-2xl font-black text-white">16</span>
                    <span class="text-[10px] font-bold text-zinc-600 uppercase tracking-widest">Total Unit</span>
                </div>
            </div>
        </a>

        <!-- Card: Member (Contoh Teks Sangat Panjang) -->
        <a href="/admin/members" class="group relative block h-full">
            <div class="absolute -inset-0.5 bg-blue-500/20 rounded-2xl blur opacity-0 group-hover:opacity-100 transition duration-500"></div>
            <div class="relative bg-zinc-900 border border-white/5 p-6 rounded-2xl flex flex-col h-full min-h-[180px] hover:border-blue-500/40 transition-all">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-blue-500/10 rounded-xl text-blue-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" stroke-width="2"/></svg>
                    </div>
                </div>
                <!-- Judul Terpotong jika terlalu panjang -->
                <h3 class="text-lg font-bold text-white mb-1 truncate">Database Member Loyalitas Pelanggan</h3>
                <!-- Deskripsi Terpotong otomatis jadi 2 baris (line-clamp-2) -->
                <p class="text-xs text-zinc-500 line-clamp-2 leading-relaxed">
                    Lihat histori kunjungan, poin reward, dan manajemen level membership untuk seluruh pelanggan tetap Class Billiard.
                </p>
                <div class="mt-auto pt-4">
                    <span class="text-2xl font-black text-white">1,240</span>
                    <span class="ml-2 text-[10px] font-bold text-blue-400 uppercase tracking-widest">Aktif</span>
                </div>
            </div>
        </a>

        <!-- Card: Transaksi -->
        <a href="/admin/laporan" class="group relative block h-full">
            <div class="absolute -inset-0.5 bg-emerald-500/20 rounded-2xl blur opacity-0 group-hover:opacity-100 transition duration-500"></div>
            <div class="relative bg-zinc-900 border border-white/5 p-6 rounded-2xl flex flex-col h-full min-h-[180px] hover:border-emerald-500/40 transition-all">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-emerald-500/10 rounded-xl text-emerald-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" stroke-width="2"/></svg>
                    </div>
                </div>
                <h3 class="text-lg font-bold text-white mb-1 truncate">Laporan Keuangan</h3>
                <p class="text-xs text-zinc-500 line-clamp-2 leading-relaxed">
                    Rekapitulasi pendapatan harian, mingguan, dan bulanan secara otomatis.
                </p>
                <div class="mt-auto pt-4 flex items-baseline gap-1">
                    <span class="text-xs font-bold text-zinc-500 tracking-tighter uppercase">IDR</span>
                    <span class="text-2xl font-black text-white">45.8M</span>
                </div>
            </div>
        </a>

        <!-- Card: Pengaturan Sistem -->
        <a href="/admin/settings" class="group relative block h-full">
            <div class="absolute -inset-0.5 bg-zinc-500/20 rounded-2xl blur opacity-0 group-hover:opacity-100 transition duration-500"></div>
            <div class="relative bg-zinc-900 border border-white/5 p-6 rounded-2xl flex flex-col h-full min-h-[180px] hover:border-white/20 transition-all">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-white/5 rounded-xl text-zinc-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" stroke-width="2"/></svg>
                    </div>
                </div>
                <h3 class="text-lg font-bold text-white mb-1 truncate">Konfigurasi Sistem</h3>
                <p class="text-xs text-zinc-500 line-clamp-2 leading-relaxed">
                    Kelola operasional sistem, jam buka/tutup, dan backup database.
                </p>
                <div class="mt-auto pt-4">
                    <span class="text-[10px] font-bold px-2 py-1 rounded bg-white/5 text-zinc-400 uppercase tracking-widest">Ready</span>
                </div>
            </div>
        </a>

    </div>
</div>
@endsection