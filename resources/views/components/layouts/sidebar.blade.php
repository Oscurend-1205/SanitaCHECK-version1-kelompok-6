@props(['activePage' => 'dashboard'])

<aside class="w-64 bg-[#144A32] text-white flex flex-col h-full flex-shrink-0 shadow-lg z-20">
    <!-- Logo Area -->
    <div class="px-6 py-5 flex items-center border-b border-white/10">
        <img src="{{ asset('images/sanita logo.png') }}" alt="Logo" class="w-10 h-10 mr-3">
        <div>
            <h2 class="text-lg font-bold leading-tight">SanitaCheck</h2>
            <p class="text-[10px] text-green-200">Kampus Sehat Terintegrasi</p>
        </div>
    </div>

    <!-- User Profile -->
    <div class="px-6 py-6 flex items-center border-b border-white/10">
        <div class="w-12 h-12 rounded-full bg-white overflow-hidden mr-3">
            <img src="https://ui-avatars.com/api/?name=Admin&background=random" alt="Admin" class="w-full h-full object-cover">
        </div>
        <div>
            <h3 class="font-bold text-sm">Admin</h3>
            <p class="text-xs text-green-200">Administrator</p>
            <div class="flex items-center mt-1">
                <span class="w-2 h-2 bg-green-400 rounded-full mr-1.5"></span>
                <span class="text-[10px] text-green-200">Online</span>
            </div>
        </div>
    </div>

    <!-- Menu -->
    <div class="px-4 py-6 flex-1 overflow-y-auto">
        <p class="text-xs text-green-300 mb-3 px-2">MENU UTAMA</p>
        <nav class="space-y-1">
            <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2.5 {{ $activePage === 'dashboard' ? 'bg-white/20' : 'hover:bg-white/10 text-gray-200' }} rounded-lg text-sm font-medium transition-colors">
                <svg class="w-5 h-5 mr-3 {{ $activePage !== 'dashboard' ? 'opacity-70' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Dashboard
            </a>
            <a href="{{ route('fasilitas-umum') }}" class="flex items-center px-3 py-2.5 {{ $activePage === 'fasilitas-umum' ? 'bg-white/20' : 'hover:bg-white/10 text-gray-200' }} rounded-lg text-sm font-medium transition-colors">
                <svg class="w-5 h-5 mr-3 {{ $activePage !== 'fasilitas-umum' ? 'opacity-70' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                Fasilitas Umum
            </a>
            <a href="#" class="flex items-center px-3 py-2.5 {{ $activePage === 'inspeksi-sanitasi' ? 'bg-white/20' : 'hover:bg-white/10 text-gray-200' }} rounded-lg text-sm font-medium transition-colors">
                <svg class="w-5 h-5 mr-3 {{ $activePage !== 'inspeksi-sanitasi' ? 'opacity-70' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                Inspeksi Sanitasi
            </a>
            <a href="#" class="flex items-center px-3 py-2.5 {{ $activePage === 'petugas' ? 'bg-white/20' : 'hover:bg-white/10 text-gray-200' }} rounded-lg text-sm font-medium transition-colors">
                <svg class="w-5 h-5 mr-3 {{ $activePage !== 'petugas' ? 'opacity-70' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                Petugas
            </a>
            <a href="#" class="flex items-center px-3 py-2.5 {{ $activePage === 'jadwal-petugas' ? 'bg-white/20' : 'hover:bg-white/10 text-gray-200' }} rounded-lg text-sm font-medium transition-colors">
                <svg class="w-5 h-5 mr-3 {{ $activePage !== 'jadwal-petugas' ? 'opacity-70' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Jadwal Petugas
            </a>
            <a href="#" class="flex items-center px-3 py-2.5 {{ $activePage === 'rekap-laporan' ? 'bg-white/20' : 'hover:bg-white/10 text-gray-200' }} rounded-lg text-sm font-medium transition-colors">
                <svg class="w-5 h-5 mr-3 {{ $activePage !== 'rekap-laporan' ? 'opacity-70' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                Rekap &amp; Laporan
            </a>
            <a href="#" class="flex items-center px-3 py-2.5 {{ $activePage === 'tindak-lanjut' ? 'bg-white/20' : 'hover:bg-white/10 text-gray-200' }} rounded-lg text-sm font-medium transition-colors">
                <svg class="w-5 h-5 mr-3 {{ $activePage !== 'tindak-lanjut' ? 'opacity-70' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Tindak Lanjut
            </a>
            <a href="#" class="flex items-center px-3 py-2.5 {{ $activePage === 'riwayat-tindak-lanjut' ? 'bg-white/20' : 'hover:bg-white/10 text-gray-200' }} rounded-lg text-sm font-medium transition-colors">
                <svg class="w-5 h-5 mr-3 {{ $activePage !== 'riwayat-tindak-lanjut' ? 'opacity-70' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path></svg>
                Riwayat Tindak Lanjut
            </a>
            <a href="#" class="flex items-center px-3 py-2.5 {{ $activePage === 'profil' ? 'bg-white/20' : 'hover:bg-white/10 text-gray-200' }} rounded-lg text-sm font-medium transition-colors">
                <svg class="w-5 h-5 mr-3 {{ $activePage !== 'profil' ? 'opacity-70' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Profil
            </a>
        </nav>
    </div>

    <div class="p-4 mt-auto">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="flex items-center w-full px-3 py-2 hover:bg-white/10 rounded-lg text-sm font-medium transition-colors text-gray-200">
                <svg class="w-5 h-5 mr-3 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Keluar
            </button>
        </form>
    </div>
</aside>
