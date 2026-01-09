<!DOCTYPE html>
<html lang="id" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font Inter untuk kesan modern -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        window.addEventListener('alpine:init', () => {
            if (!window.Alpine.store('notifications')) {
                Alpine.store('notifications', {
                    items: [],
                    add(data) {
                        const id = Date.now();
                        this.items.push({ id, ...data });
                        setTimeout(() => this.remove(id), 5000);
                    },
                    remove(id) {
                        this.items = this.items.filter(i => i.id !== id);
                    }
                });
            }
        });
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }

        /* Background Mesh Gradient */
        .bg-mesh {
            background-color: #000000;
            background-image: 
                radial-gradient(at 0% 0%, hsla(45, 100%, 50%, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 100%, hsla(45, 100%, 50%, 0.05) 0px, transparent 50%);
        }

        .gold-gradient {
            background: linear-gradient(135deg, #fbbf24 0%, #d97706 100%);
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-4px); }
            75% { transform: translateX(4px); }
        }
        .animate-shake { animation: shake 0.4s cubic-bezier(.36, .07, .19, .97) both; }
    </style>
</head>

<body class="bg-mesh text-slate-200 min-h-screen flex items-center justify-center p-6 antialiased">
        <div style="position: absolute; z-index: 9999; left: 50%; top: 20%; transform: translateX(-50%); min-width: 320px; max-width: 90vw;">
            @if(session('error'))
                <div class="w-full rounded-lg shadow-lg p-4 bg-red-50 border-l-4 border-red-500 text-red-800 mb-6" role="alert">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3 flex-1">
                            <p class="text-sm font-bold">Terjadi Kesalahan</p>
                            <div class="mt-1 text-sm opacity-90">{{ session('error') }}</div>
                        </div>
                        <div class="ml-auto pl-3">
                            <div class="-mx-1.5 -my-1.5">
                                <button type="button" onclick="this.closest('div[role=alert]').remove()" class="inline-flex rounded-md p-1.5 focus:outline-none focus:ring-2 focus:ring-offset-2 bg-red-50 text-red-500 hover:bg-red-100 focus:ring-offset-red-50 focus:ring-red-600">
                                    <span class="sr-only">Tutup</span>
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if($errors->any())
                <div class="w-full rounded-lg shadow-lg p-4 bg-red-50 border-l-4 border-red-500 text-red-800 mb-6" role="alert">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3 flex-1">
                            <p class="text-sm font-bold">Terjadi Kesalahan</p>
                            <div class="mt-1 text-sm opacity-90">
                                <ul class="list-disc pl-5">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="ml-auto pl-3">
                            <div class="-mx-1.5 -my-1.5">
                                <button type="button" onclick="this.closest('div[role=alert]').remove()" class="inline-flex rounded-md p-1.5 focus:outline-none focus:ring-2 focus:ring-offset-2 bg-red-50 text-red-500 hover:bg-red-100 focus:ring-offset-red-50 focus:ring-red-600">
                                    <span class="sr-only">Tutup</span>
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    <div class="w-full max-w-[420px]">
        <!-- HEADER -->
        <div class="text-center mb-10">
            <div class="relative inline-block mb-6">
                <!-- Ring Glow -->
                <div class="absolute -inset-1 bg-amber-500/20 rounded-xl blur-md"></div>
                <div class="relative w-16 h-16 rounded-xl bg-zinc-900 border border-white/10 flex items-center justify-center">
                    <svg class="w-8 h-8 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
            </div>
            <h1 class="text-3xl font-extrabold tracking-tighter text-white uppercase italic">
                Staff<span class="text-amber-500">Login</span>
            </h1>
            <p class="mt-2 text-[11px] font-bold tracking-[0.3em] text-zinc-500 uppercase">
                Staff Secure Access Portal
            </p>
        </div>




        {{-- Custom alert styling langsung, tanpa Alpine, pakai styling dari components/alert.blade.php --}}
        @if(session('error'))
            <div class="w-full rounded-lg shadow-lg p-4 bg-red-50 border-l-4 border-red-500 text-red-800 mb-6" role="alert">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3 flex-1">
                        <p class="text-sm font-bold">Terjadi Kesalahan</p>
                        <div class="mt-1 text-sm opacity-90">{{ session('error') }}</div>
                    </div>
                    <div class="ml-auto pl-3">
                        <div class="-mx-1.5 -my-1.5">
                            <button type="button" onclick="this.closest('div[role=alert]').remove()" class="inline-flex rounded-md p-1.5 focus:outline-none focus:ring-2 focus:ring-offset-2 bg-red-50 text-red-500 hover:bg-red-100 focus:ring-offset-red-50 focus:ring-red-600">
                                <span class="sr-only">Tutup</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
        <script>
        document.addEventListener('alpine:init', function() {
            if (window.Alpine && Alpine.store && Alpine.store('notifications')) {
                Alpine.store('notifications').add({
                    type: 'error',
                    message: @json(session('error'))
                });
            }
        });
        // Fallback jika Alpine sudah siap sebelum script ini
        if (window.Alpine && Alpine.store && Alpine.store('notifications')) {
            Alpine.store('notifications').add({
                type: 'error',
                message: @json(session('error'))
            });
        }
        </script>
        @endif

        <script>
        function pushNotificationToAlpine() {
            var manager = document.getElementById('notification-manager');
            if (manager && manager.dataset.notification) {
                try {
                    var data = JSON.parse(manager.dataset.notification);
                    if (window.Alpine && Alpine.store && Alpine.store('notifications')) {
                        Alpine.store('notifications').add(data);
                    }
                } catch (e) {}
            }
        }
        document.addEventListener('alpine:init', pushNotificationToAlpine);
        // Fallback jika Alpine sudah siap sebelum script ini
        if (window.Alpine && Alpine.store && Alpine.store('notifications')) {
            pushNotificationToAlpine();
        }
        </script>

        <!-- MAIN CARD -->
        <div class="relative group">
            <!-- Dynamic Glow Background -->
            <div class="absolute -inset-px bg-gradient-to-r from-amber-500/20 to-yellow-500/0 rounded-2xl blur-sm transition duration-1000 group-hover:duration-200"></div>
            
            <div class="relative bg-zinc-900/80 backdrop-blur-xl border border-white/10 rounded-2xl p-8 shadow-2xl">
                <!-- Decorative Top Line -->
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-1/3 h-px bg-gradient-to-r from-transparent via-amber-500/50 to-transparent"></div>

                <form method="POST" action="{{ route('login') }}" class="space-y-5"
                    x-data="{ showPass: false, loading: false }" @submit="loading = true">
                    @csrf

                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label class="block text-[11px] font-bold text-zinc-400 uppercase tracking-widest ml-1">
                            Work Email
                        </label>
                        <div class="relative group/input">
                            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                                class="w-full bg-black/40 border border-white/5 rounded-xl px-4 py-3.5 text-sm text-white placeholder:text-zinc-600 focus:border-amber-500/50 focus:ring-4 focus:ring-amber-500/10 transition-all outline-none"
                                placeholder="name@classbilliard.com">
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-2">
                        <div class="flex justify-between items-center ml-1">
                            <label class="block text-[11px] font-bold text-zinc-400 uppercase tracking-widest">
                                Password
                            </label>
                            <a href="#" class="text-[10px] text-zinc-500 hover:text-amber-400 transition-colors uppercase font-bold tracking-tighter">Forgot?</a>
                        </div>
                        <div class="relative">
                            <input :type="showPass ? 'text' : 'password'" name="password" required
                                class="w-full bg-black/40 border border-white/5 rounded-xl px-4 py-3.5 text-sm text-white placeholder:text-zinc-600 focus:border-amber-500/50 focus:ring-4 focus:ring-amber-500/10 transition-all outline-none"
                                placeholder="••••••••">

                            <button type="button" @click="showPass = !showPass"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-zinc-500 hover:text-amber-400 transition-colors">
                                <svg x-show="!showPass" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg x-show="showPass" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center gap-2 ml-1">
                        <input type="checkbox" id="remember" class="w-4 h-4 rounded border-white/10 bg-black/40 text-amber-500 focus:ring-amber-500/20">
                        <label for="remember" class="text-[11px] text-zinc-500 font-medium">Remember this device</label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" :disabled="loading"
                        class="w-full gold-gradient hover:opacity-90 disabled:opacity-50 disabled:cursor-not-allowed text-black text-xs font-black uppercase tracking-[0.2em] py-4 rounded-xl transition-all duration-300 shadow-[0_0_20px_rgba(251,191,36,0.1)] flex items-center justify-center gap-3 group relative overflow-hidden">
                        
                        <span x-show="!loading" class="flex items-center gap-2">
                            Authorize Access
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M13 7l5 5m0 0l-5 5m5-5H6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>

                        <span x-show="loading" x-cloak class="flex items-center gap-2 text-black">
                            <svg class="animate-spin h-4 w-4" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Authenticating...
                        </span>
                    </button>
                </form>
            </div>
        </div>

        <!-- FOOTER -->
        <div class="mt-12 text-center">
            <p class="text-zinc-600 text-[10px] font-bold tracking-[0.2em] uppercase">
                &copy; 2025 CLASS BILLIARD SYSTEM &bull; V.2.0.4
            </p>
            <div class="mt-4 flex justify-center gap-6">
                <a href="#" class="text-zinc-700 hover:text-zinc-400 text-[10px] font-bold uppercase transition-colors">Privacy</a>
                <a href="#" class="text-zinc-700 hover:text-zinc-400 text-[10px] font-bold uppercase transition-colors">Support</a>
            </div>
        </div>
    </div>

    <!-- Alpine.js sudah dipindah ke <head> agar siap sebelum komponen alert -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const dismissAlert = (id) => {
                const el = document.getElementById(id);
                if (el) {
                    setTimeout(() => {
                        el.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
                        el.style.opacity = '0';
                        el.style.transform = 'scale(0.95)';
                        setTimeout(() => el.remove(), 800);
                    }, 4000);
                }
            };
            dismissAlert('error-alert');
        });
    </script>
</body>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('notifications', {
            items: [],
            add(data) {
                const id = Date.now();
                this.items.push({ id, ...data });
                // Otomatis hilang dalam 5 detik
                setTimeout(() => this.remove(id), 5000);
            },
            remove(id) {
                this.items = this.items.filter(i => i.id !== id);
            }
        });

        // Ambil data dari atribut data-notification di HTML
        const manager = document.getElementById('notification-manager');
        if (manager && manager.dataset.notification) {
            const data = JSON.parse(manager.dataset.notification);
            Alpine.store('notifications').add(data);
        }
    });
</script>
</html>