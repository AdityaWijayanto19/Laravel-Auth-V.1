<!DOCTYPE html>
<html lang="id" x-data="{ 
    sidebarOpen: true, 
    isHovered: false,
    profileOpen: false 
}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Class Billiard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #050505; }
        [x-cloak] { display: none !important; }
        .sidebar-transition { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
        /* Mengatasi text overflow secara global untuk judul card */
        .text-truncate-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body class="text-slate-300 antialiased overflow-x-hidden">

    <!-- SIDEBAR -->
    <aside 
        @mouseenter="isHovered = true" 
        @mouseleave="isHovered = false"
        :class="{ 
            'w-64': sidebarOpen || isHovered, 
            'w-20': !sidebarOpen && !isHovered,
            'z-[60] shadow-[20px_0_50px_rgba(0,0,0,0.8)]': isHovered && !sidebarOpen,
            'z-40': sidebarOpen
        }"
        class="sidebar-transition fixed inset-y-0 left-0 bg-[#0A0A0A] border-r border-white/5 flex flex-col">
        
        <!-- Logo Area -->
        <div class="h-20 flex items-center px-6 shrink-0 border-b border-white/5 overflow-hidden">
            <div class="w-8 h-8 rounded-lg bg-amber-500 flex items-center justify-center shrink-0 shadow-[0_0_15px_rgba(245,158,11,0.3)]">
                <span class="text-black font-black text-xl italic">C</span>
            </div>
            <span x-show="sidebarOpen || isHovered" x-transition.opacity 
                class="ml-4 font-extrabold text-white tracking-tighter text-lg whitespace-nowrap uppercase italic">
                Class<span class="text-amber-500">Billiard</span>
            </span>
        </div>

        <!-- Menu -->
        <nav class="flex-1 pt-6 px-3 space-y-2 overflow-y-auto overflow-x-hidden">
            <a href="#" class="flex items-center px-4 py-3 rounded-xl bg-amber-500/10 text-amber-500 transition-all">
                <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                <span x-show="sidebarOpen || isHovered" class="ml-4 font-bold text-sm whitespace-nowrap">Dashboard</span>
            </a>
            <a href="#" class="flex items-center px-4 py-3 rounded-xl text-zinc-500 hover:bg-white/5 hover:text-white transition-all group">
                <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span x-show="sidebarOpen || isHovered" class="ml-4 font-bold text-sm whitespace-nowrap">Reservasi</span>
            </a>
        </nav>
    </aside>

    <!-- CONTENT WRAPPER -->
    <div 
        class="sidebar-transition min-h-screen flex flex-col"
        :class="{ 'pl-64': sidebarOpen, 'pl-20': !sidebarOpen }">
        
        <!-- TOP HEADER -->
        <header class="h-20 border-b border-white/5 bg-black/40 backdrop-blur-xl sticky top-0 z-30 px-8 flex items-center justify-between">
            <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-lg bg-zinc-900 border border-white/5 text-zinc-400 hover:text-amber-500 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" /></svg>
            </button>

            <!-- Profile Dropdown Area -->
            <div class="relative" x-data="{ profileOpen: false }">
                <button @click="profileOpen = !profileOpen" @click.away="profileOpen = false" class="flex items-center gap-3 p-1.5 pr-4 rounded-full bg-zinc-900 border border-white/5 hover:border-amber-500/30 transition-all">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=f59e0b&color=000" class="w-8 h-8 rounded-full">
                    <span class="text-xs font-bold text-zinc-300">Administrator</span>
                    <svg class="w-4 h-4 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="profileOpen" x-cloak 
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    class="absolute right-0 mt-3 w-48 bg-[#0A0A0A] border border-white/10 rounded-xl shadow-2xl py-2 z-50">
                    <a href="#" class="flex items-center px-4 py-2.5 text-xs font-bold text-zinc-400 hover:bg-white/5 hover:text-amber-500 transition-colors">
                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" stroke-width="2"/></svg>
                        Settings
                    </a>
                    <hr class="border-white/5 my-1">
                    <a href="#" class="flex items-center px-4 py-2.5 text-xs font-bold text-red-500 hover:bg-red-500/5 transition-colors">
                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" stroke-width="2"/></svg>
                        Logout System
                    </a>
                </div>
            </div>
        </header>

        <!-- MAIN CONTENT -->
        <main class="p-8">
            @yield('content')
        </main>
    </div>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>