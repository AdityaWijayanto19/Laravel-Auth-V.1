@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Header Page -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-extrabold text-white tracking-tight">MANAGE USERS</h2>
            <p class="text-zinc-500 text-sm">Kelola hak akses dan informasi staff Class Billiard.</p>
        </div>
        <button class="flex items-center justify-center gap-2 px-5 py-2.5 bg-amber-500 hover:bg-amber-600 text-black text-xs font-black uppercase tracking-widest rounded-xl transition-all shadow-[0_0_20px_rgba(245,158,11,0.2)]">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="3" stroke-linecap="round"/></svg>
            Add New Staff
        </button>
    </div>

    <!-- Filter & Search Bar -->
    <div class="bg-zinc-900/50 border border-white/5 p-4 rounded-2xl flex flex-col md:flex-row gap-4">
        <div class="relative flex-1">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-zinc-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2"/></svg>
            </span>
            <input type="text" placeholder="Search by name or email..." 
                class="w-full bg-black/40 border border-white/5 rounded-xl pl-11 pr-4 py-2.5 text-sm text-white focus:border-amber-500/50 focus:ring-0 transition-all outline-none">
        </div>
        <select class="bg-black/40 border border-white/5 rounded-xl px-4 py-2.5 text-sm text-zinc-400 outline-none focus:border-amber-500/50">
            <option>All Roles</option>
            <option>Administrator</option>
            <option>Staff Cashier</option>
            <option>Manager</option>
        </select>
    </div>

    <!-- Users Table Card -->
    <div class="bg-zinc-900 border border-white/5 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white/[0.02] text-zinc-500 text-[10px] font-black uppercase tracking-[0.2em]">
                        <th class="px-6 py-5">User Info</th>
                        <th class="px-6 py-5">Role</th>
                        <th class="px-6 py-5">Status</th>
                        <th class="px-6 py-5">Last Login</th>
                        <th class="px-6 py-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    <!-- Row 1 -->
                    <tr class="hover:bg-white/[0.01] transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Alex+Johnson&background=f59e0b&color=000" class="w-10 h-10 rounded-xl shadow-lg">
                                <div class="max-w-[200px]">
                                    <p class="text-sm font-bold text-white truncate">Alex Johnson</p>
                                    <p class="text-xs text-zinc-500 truncate">alex.j@classbilliard.com</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-[10px] font-bold px-2 py-1 rounded bg-amber-500/10 text-amber-500 uppercase tracking-tighter">Administrator</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                <span class="text-xs text-zinc-400">Active</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-xs text-zinc-500 font-medium">2 mins ago</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="p-2 bg-white/5 hover:bg-white/10 text-zinc-400 hover:text-white rounded-lg transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" stroke-width="2"/></svg>
                                </button>
                                <button class="p-2 bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white rounded-lg transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 2 -->
                    <tr class="hover:bg-white/[0.01] transition-colors group">
                        <td class="px-6 py-4 text-sm font-medium text-white">
                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Sarah+Miller&background=3b82f6&color=fff" class="w-10 h-10 rounded-xl shadow-lg">
                                <div class="max-w-[200px]">
                                    <p class="text-sm font-bold text-white truncate">Sarah Miller</p>
                                    <p class="text-xs text-zinc-500 truncate">sarah.m@classbilliard.com</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-[10px] font-bold px-2 py-1 rounded bg-zinc-800 text-zinc-400 uppercase tracking-tighter">Staff Cashier</span>
                        </td>
                        <td class="px-6 py-4 text-xs">
                            <div class="flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-zinc-600"></span>
                                <span class="text-zinc-500">Offline</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-xs text-zinc-500 font-medium">5 hours ago</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="p-2 bg-white/5 rounded-lg hover:text-white transition-all"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" stroke-width="2"/></svg></button>
                                <button class="p-2 bg-red-500/10 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition-all"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2"/></svg></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="px-6 py-4 bg-white/[0.01] border-t border-white/5 flex items-center justify-between text-xs text-zinc-500">
            <p>Showing 2 of 12 entries</p>
            <div class="flex gap-2">
                <button class="px-3 py-1 bg-white/5 rounded hover:bg-white/10 transition-colors">Prev</button>
                <button class="px-3 py-1 bg-amber-500 text-black font-bold rounded">1</button>
                <button class="px-3 py-1 bg-white/5 rounded hover:bg-white/10 transition-colors">Next</button>
            </div>
        </div>
    </div>
</div>
@endsection