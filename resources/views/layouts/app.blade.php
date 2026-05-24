<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Manajemen - Toko Kelontong</title>
    <!-- Tailwind Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: PLUS JAKARTA SANS -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f3f4f6; }
        .glass-panel {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
        }
        .sidebar-item { transition: all 0.3s ease; }
        .sidebar-item:hover, .sidebar-item.active { background-color: #eef2ff; color: #4338ca; transform: translateX(5px); }
        .sidebar-item.active { font-weight: 600; border-right: 4px solid #4338ca; }
        
        .fade-in { animation: fadeIn 0.5s ease-out; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="text-slate-800 antialiased overflow-hidden h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 glass-panel h-full flex flex-col z-20 shrink-0 shadow-lg border-r border-slate-200/50">
        <div class="h-16 flex items-center px-6 border-b border-slate-200/50 bg-white/40">
            <i class="ph-fill ph-storefront text-indigo-600 text-2xl mr-3"></i>
            <span class="font-bold text-lg tracking-tight text-slate-900 line-clamp-1">
                {{ \Illuminate\Support\Facades\DB::table('pengaturans')->value('nama_toko') ?? 'Toko Kelontong' }}
            </span>
        </div>
        
        <div class="px-4 py-6 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">
            {{ Auth::user()->role == 'owner' ? 'Owner Menu' : 'Admin Menu' }}
        </div>
        <nav class="flex-1 px-3 space-y-1 overflow-y-auto">
            @if(Auth::user()->role == 'owner')
                <a href="{{ route('owner.dashboard') }}" class="sidebar-item {{ request()->routeIs('owner.dashboard') ? 'active' : '' }} flex items-center px-3 py-2.5 rounded-xl text-slate-600">
                    <i class="ph ph-trend-up text-xl mr-3 {{ request()->routeIs('owner.dashboard') ? 'text-indigo-600 ph-fill' : '' }}"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('owner.laporan') }}" class="sidebar-item {{ request()->routeIs('owner.laporan') ? 'active' : '' }} flex items-center px-3 py-2.5 rounded-xl text-slate-600 mt-2">
                    <i class="ph ph-chart-pie text-xl mr-3 {{ request()->routeIs('owner.laporan') ? 'text-indigo-600 ph-fill' : '' }}"></i>
                    <span>Pusat Data & Laporan</span>
                </a>
                <a href="{{ route('owner.karyawan') }}" class="sidebar-item {{ request()->routeIs('owner.karyawan') ? 'active' : '' }} flex items-center px-3 py-2.5 rounded-xl text-slate-600 mt-2">
                    <i class="ph ph-identification-card text-xl mr-3 {{ request()->routeIs('owner.karyawan') ? 'text-indigo-600 ph-fill' : '' }}"></i>
                    <span>Manajemen Karyawan</span>
                </a>
                <a href="{{ route('owner.pengaturan') }}" class="sidebar-item {{ request()->routeIs('owner.pengaturan') ? 'active' : '' }} flex items-center px-3 py-2.5 rounded-xl text-slate-600 mt-2">
                    <i class="ph ph-gear text-xl mr-3 {{ request()->routeIs('owner.pengaturan') ? 'text-indigo-600 ph-fill' : '' }}"></i>
                    <span>Pengaturan Toko</span>
                </a>
            @elseif(Auth::user()->role == 'kasir')
                <a href="{{ route('pos.index') }}" class="sidebar-item {{ request()->routeIs('pos.*') ? 'active' : '' }} flex items-center px-3 py-2.5 rounded-xl text-slate-600 mt-2 bg-indigo-50 border border-indigo-100 font-bold hover:bg-indigo-100 transition">
                    <i class="ph ph-cash-register text-xl mr-3 text-indigo-600 ph-fill"></i>
                    <span>Mesin Kasir (POS)</span>
                </a>
            @else
                <a href="{{ route('dashboard') }}" class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }} flex items-center px-3 py-2.5 rounded-xl text-slate-600">
                    <i class="ph ph-squares-four text-xl mr-3 {{ request()->routeIs('dashboard') ? 'text-indigo-600 ph-fill' : '' }}"></i>
                    <span>Dashboard</span>
                </a>
                
                <!-- Data Master -->
                <div class="mb-4 mt-4">
                    <p class="px-3 text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2">Master Data & Gudang</p>
                    <a href="{{ route('barang.index') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl {{ request()->routeIs('barang.*') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} transition-all group">
                        <i class="ph-bold ph-package mr-3 text-lg {{ request()->routeIs('barang.*') ? 'text-indigo-600' : 'text-slate-400 group-hover:text-slate-600' }}"></i>
                        Data Barang
                    </a>
                    <a href="{{ route('barang-masuk.index') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl {{ request()->routeIs('barang-masuk.*') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} transition-all group mt-1">
                        <i class="ph-bold ph-download-simple mr-3 text-lg {{ request()->routeIs('barang-masuk.*') ? 'text-indigo-600' : 'text-slate-400 group-hover:text-slate-600' }}"></i>
                        Barang Masuk (Restock)
                    </a>
                    <a href="{{ route('kategori.index') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl {{ request()->routeIs('kategori.*') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} transition-all group mt-1">
                        <i class="ph-bold ph-tag mr-3 text-lg {{ request()->routeIs('kategori.*') ? 'text-indigo-600' : 'text-slate-400 group-hover:text-slate-600' }}"></i>
                        Kategori
                    </a>
                </div>
                
                <a href="{{ route('kasir.index') }}" class="sidebar-item {{ request()->routeIs('kasir.*') ? 'active' : '' }} flex items-center px-3 py-2.5 rounded-xl text-slate-600 mt-2">
                    <i class="ph ph-users text-xl mr-3 {{ request()->routeIs('kasir.*') ? 'text-indigo-600 ph-fill' : '' }}"></i>
                    <span>Data Kasir</span>
                </a>
                <a href="{{ route('laporan.index') }}" class="sidebar-item {{ request()->routeIs('laporan.*') ? 'active' : '' }} flex items-center px-3 py-2.5 rounded-xl text-slate-600 mt-2">
                    <i class="ph ph-chart-line-up text-xl mr-3 {{ request()->routeIs('laporan.*') ? 'text-indigo-600 ph-fill' : '' }}"></i>
                    <span>Laporan</span>
                </a>
            @endif
        </nav>

        <div class="p-4 border-t border-slate-200/50 bg-white/40">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center px-3 py-2.5 rounded-xl text-rose-500 hover:bg-rose-50 hover:text-rose-600 transition-colors">
                    <i class="ph ph-sign-out text-xl mr-3"></i>
                    <span class="font-medium">Logout {{ ucfirst(Auth::user()->role) }}</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col h-full bg-slate-50/50 relative">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-[0.03] z-0 pointer-events-none"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-indigo-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 z-0"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-emerald-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 z-0"></div>

        <!-- Header -->
        <header class="h-16 flex items-center justify-between px-8 bg-white/60 backdrop-blur-md border-b border-slate-200/50 z-10 sticky top-0">
            <h1 class="text-xl font-bold tracking-tight text-slate-800">
                @yield('header', 'Dashboard')
            </h1>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <i class="ph ph-bell text-xl text-slate-500 hover:text-indigo-600 cursor-pointer transition"></i>
                    <span class="absolute -top-1 -right-1 flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-rose-500 border-2 border-white"></span>
                    </span>
                </div>
                
                <!-- Profile Menu -->
                <div class="relative group cursor-pointer z-50">
                    <div class="flex items-center space-x-3 bg-white/60 border border-slate-200/60 py-1.5 pl-4 pr-1.5 rounded-full hover:bg-white shadow-sm transition-all">
                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-extrabold text-slate-800 leading-tight">{{ Auth::user()->name }}</p>
                            <p class="text-[10px] font-bold text-indigo-500 uppercase tracking-widest">{{ Auth::user()->role }}</p>
                        </div>
                        <div class="h-9 w-9 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-600 text-white flex items-center justify-center font-bold text-sm shadow-md ring-2 ring-indigo-100 flex-shrink-0">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                    </div>
                    
                    <!-- Dropdown -->
                    <div class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.1)] border border-slate-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-right group-hover:translate-y-0 translate-y-2 z-50">
                        <div class="p-4 border-b border-slate-100 sm:hidden">
                            <p class="text-sm font-bold text-slate-800">{{ Auth::user()->name }}</p>
                            <p class="text-xs font-semibold text-slate-500 uppercase">{{ Auth::user()->role }}</p>
                        </div>
                        <div class="p-2 space-y-1">
                            <a href="#" class="flex items-center px-3 py-2 text-sm font-semibold text-slate-600 hover:bg-indigo-50 hover:text-indigo-600 rounded-xl transition-colors">
                                <i class="ph-bold ph-user mr-3 text-lg"></i> Profil Saya
                            </a>
                            <a href="#" class="flex items-center px-3 py-2 text-sm font-semibold text-slate-600 hover:bg-indigo-50 hover:text-indigo-600 rounded-xl transition-colors">
                                <i class="ph-bold ph-gear mr-3 text-lg"></i> Pengaturan
                            </a>
                            <div class="h-px bg-slate-100 my-1"></div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full flex items-center px-3 py-2 text-sm font-bold text-rose-500 hover:bg-rose-50 hover:text-rose-600 rounded-xl transition-colors">
                                    <i class="ph-bold ph-sign-out mr-3 text-lg"></i> Logout Sistem
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Body -->
        <main class="flex-1 overflow-y-auto p-8 z-10 fade-in">
            @if(session('success'))
            <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-600 px-4 py-3 rounded-xl flex items-center shadow-sm">
                <i class="ph-fill ph-check-circle text-xl mr-3"></i>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
            @endif

            @if(session('error'))
            <div class="mb-6 bg-rose-50 border border-rose-200 text-rose-600 px-4 py-3 rounded-xl flex items-center shadow-sm">
                <i class="ph-fill ph-warning-circle text-xl mr-3"></i>
                <span class="font-medium">{{ session('error') }}</span>
            </div>
            @endif

            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
