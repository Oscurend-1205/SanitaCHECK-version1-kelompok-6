<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SanitaCheck</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Chart.js via CDN for easy setup -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-[#F4F7F6] text-gray-800 font-sans flex h-screen overflow-hidden">

    <!-- Sidebar -->
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
                <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2.5 bg-white/20 rounded-lg text-sm font-medium transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard
                </a>
                <a href="{{ route('fasilitas-umum') }}" class="flex items-center px-3 py-2.5 hover:bg-white/10 rounded-lg text-sm font-medium transition-colors text-gray-200">
                    <svg class="w-5 h-5 mr-3 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    Fasilitas Umum
                </a>
                <a href="#" class="flex items-center px-3 py-2.5 hover:bg-white/10 rounded-lg text-sm font-medium transition-colors text-gray-200">
                    <svg class="w-5 h-5 mr-3 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                    Inspeksi Sanitasi
                </a>
                <a href="#" class="flex items-center px-3 py-2.5 hover:bg-white/10 rounded-lg text-sm font-medium transition-colors text-gray-200">
                    <svg class="w-5 h-5 mr-3 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Petugas
                </a>
                <a href="#" class="flex items-center px-3 py-2.5 hover:bg-white/10 rounded-lg text-sm font-medium transition-colors text-gray-200">
                    <svg class="w-5 h-5 mr-3 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Jadwal Petugas
                </a>
                <a href="#" class="flex items-center px-3 py-2.5 hover:bg-white/10 rounded-lg text-sm font-medium transition-colors text-gray-200">
                    <svg class="w-5 h-5 mr-3 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    Rekap & Laporan
                </a>
                <a href="#" class="flex items-center px-3 py-2.5 hover:bg-white/10 rounded-lg text-sm font-medium transition-colors text-gray-200">
                    <svg class="w-5 h-5 mr-3 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Tindak Lanjut
                </a>
                <a href="#" class="flex items-center px-3 py-2.5 hover:bg-white/10 rounded-lg text-sm font-medium transition-colors text-gray-200">
                    <svg class="w-5 h-5 mr-3 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path></svg>
                    Riwayat Tindak Lanjut
                </a>
                <a href="#" class="flex items-center px-3 py-2.5 hover:bg-white/10 rounded-lg text-sm font-medium transition-colors text-gray-200">
                    <svg class="w-5 h-5 mr-3 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
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

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto p-6 lg:p-8 h-full">
        
        <!-- Header -->
        <header class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-[#144A32]">Dashboard</h1>
                <p class="text-gray-500 text-sm mt-1">Selamat datang, Admin! Berikut ringkasan monitoring sanitasi hari ini.</p>
            </div>
            <div class="flex items-center space-x-6">
                <div class="flex items-center text-sm text-gray-600 bg-white px-4 py-2 rounded-lg shadow-sm border border-gray-100">
                    <svg class="w-4 h-4 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Senin, 15 Juni 2026
                </div>
                <button class="relative p-2 text-gray-400 hover:text-[#144A32] transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <span class="absolute top-1.5 right-2 w-2 h-2 bg-red-500 rounded-full border border-white"></span>
                </button>
            </div>
        </header>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <!-- Card 1 -->
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-center">
                <div class="w-16 h-16 rounded-xl bg-green-600 text-white flex items-center justify-center mr-4 shadow-md shadow-green-200">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <div>
                    <h3 class="text-xs font-bold text-gray-800 uppercase tracking-wide">Total Fasilitas</h3>
                    <p class="text-3xl font-black text-[#144A32] mt-0.5">25</p>
                    <p class="text-[10px] text-gray-500 mt-0.5">Semua fasilitas aktif</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-center">
                <div class="w-16 h-16 rounded-xl bg-blue-500 text-white flex items-center justify-center mr-4 shadow-md shadow-blue-200">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                </div>
                <div>
                    <h3 class="text-xs font-bold text-gray-800 uppercase tracking-wide">Inspeksi Hari Ini</h3>
                    <p class="text-3xl font-black text-[#144A32] mt-0.5">8</p>
                    <p class="text-[10px] text-gray-500 mt-0.5">Dari total 25 fasilitas</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-center">
                <div class="w-16 h-16 rounded-xl bg-amber-400 text-white flex items-center justify-center mr-4 shadow-md shadow-amber-200">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
                <div>
                    <h3 class="text-xs font-bold text-gray-800 uppercase tracking-wide">Tindak Lanjut</h3>
                    <p class="text-3xl font-black text-[#144A32] mt-0.5">6</p>
                    <p class="text-[10px] text-gray-500 mt-0.5">Perlu dibersihkan</p>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-center">
                <div class="w-16 h-16 rounded-xl bg-red-500 text-white flex items-center justify-center mr-4 shadow-md shadow-red-200">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <h3 class="text-xs font-bold text-gray-800 uppercase tracking-wide">Fasilitas Buruk</h3>
                    <p class="text-3xl font-black text-[#144A32] mt-0.5">2</p>
                    <p class="text-[10px] text-gray-500 mt-0.5">Kondisi sanitasi buruk</p>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- Chart 1: Donut -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-[#144A32] mb-6">Ringkasan Status Fasilitas</h3>
                <div class="flex items-center">
                    <div class="w-1/2 relative h-48">
                        <canvas id="statusChart"></canvas>
                        <!-- Center Text for Donut -->
                        <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none mt-2">
                            <span class="text-2xl font-black text-gray-800">25</span>
                            <span class="text-[10px] text-gray-500">Total (Items)</span>
                        </div>
                    </div>
                    <div class="w-1/2 pl-6 space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <span class="w-3.5 h-3.5 rounded-full bg-green-500 mr-2"></span>
                                <span class="text-xs font-medium text-gray-600">Bersih dan Aman</span>
                            </div>
                            <span class="text-xs text-gray-500">13 (25%)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <span class="w-3.5 h-3.5 rounded-full bg-amber-400 mr-2"></span>
                                <span class="text-xs font-medium text-gray-600">Perlu Perhatian</span>
                            </div>
                            <span class="text-xs text-gray-500">6 (24%)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <span class="w-3.5 h-3.5 rounded-full bg-orange-500 mr-2"></span>
                                <span class="text-xs font-medium text-gray-600">Perlu Dibersihkan</span>
                            </div>
                            <span class="text-xs text-gray-500">4 (16%)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <span class="w-3.5 h-3.5 rounded-full bg-red-500 mr-2"></span>
                                <span class="text-xs font-medium text-gray-600">Buruk</span>
                            </div>
                            <span class="text-xs text-gray-500">2 (8%)</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart 2: Line -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-[#144A32] mb-4">Inspeksi 7 Hari Terakhir</h3>
                <div class="h-48 w-full">
                    <canvas id="trendChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Tables Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Table -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 lg:col-span-2">
                <h3 class="text-base font-bold text-[#144A32] mb-4">Fasilitas Perlu Tindak Lanjut</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="py-3 px-2 text-xs font-bold text-[#144A32] uppercase">No</th>
                                <th class="py-3 px-2 text-xs font-bold text-[#144A32] uppercase">Nama Fasilitas</th>
                                <th class="py-3 px-2 text-xs font-bold text-[#144A32] uppercase">Lokasi</th>
                                <th class="py-3 px-2 text-xs font-bold text-[#144A32] uppercase text-center">Status</th>
                                <th class="py-3 px-2 text-xs font-bold text-[#144A32] uppercase text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="border-b border-gray-100 last:border-0 hover:bg-gray-50 transition-colors">
                                <td class="py-3 px-2 text-gray-500">1</td>
                                <td class="py-3 px-2 text-gray-700">Toilet Lantai 2</td>
                                <td class="py-3 px-2 text-gray-500">Kampus 3</td>
                                <td class="py-3 px-2 text-center">
                                    <span class="inline-block px-4 py-1.5 bg-green-600 text-white text-xs rounded-lg font-medium shadow-sm">Kampus 3</span>
                                </td>
                                <td class="py-3 px-2 text-center">
                                    <button class="text-gray-400 hover:text-gray-600 font-bold px-2 py-1">!</button>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-100 last:border-0 hover:bg-gray-50 transition-colors">
                                <td class="py-3 px-2 text-gray-500">2</td>
                                <td class="py-3 px-2 text-gray-700">Kantin Mami ITSK</td>
                                <td class="py-3 px-2 text-gray-500">Kampus 2</td>
                                <td class="py-3 px-2 text-center">
                                    <span class="inline-block px-4 py-1.5 bg-red-600 text-white text-xs rounded-lg font-medium shadow-sm">Kampus 3</span>
                                </td>
                                <td class="py-3 px-2 text-center">
                                    <button class="text-gray-400 hover:text-gray-600 font-bold px-2 py-1">!</button>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-100 last:border-0 hover:bg-gray-50 transition-colors">
                                <td class="py-3 px-2 text-gray-500">3</td>
                                <td class="py-3 px-2 text-gray-700">Wastafel Cuci Tangan</td>
                                <td class="py-3 px-2 text-gray-500">Kampus 4</td>
                                <td class="py-3 px-2 text-center">
                                    <span class="inline-block px-4 py-1.5 bg-orange-500 text-white text-xs rounded-lg font-medium shadow-sm">Kampus 3</span>
                                </td>
                                <td class="py-3 px-2 text-center">
                                    <button class="text-gray-400 hover:text-gray-600 font-bold px-2 py-1">!</button>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-100 last:border-0 hover:bg-gray-50 transition-colors">
                                <td class="py-3 px-2 text-gray-500">4</td>
                                <td class="py-3 px-2 text-gray-700">Lobby Rektorat ITSK Soepraoen</td>
                                <td class="py-3 px-2 text-gray-500">Kampus 2</td>
                                <td class="py-3 px-2 text-center">
                                    <span class="inline-block px-4 py-1.5 bg-amber-400 text-white text-xs rounded-lg font-medium shadow-sm">Kampus 3</span>
                                </td>
                                <td class="py-3 px-2 text-center">
                                    <button class="text-gray-400 hover:text-gray-600 font-bold px-2 py-1">!</button>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-100 last:border-0 hover:bg-gray-50 transition-colors">
                                <td class="py-3 px-2 text-gray-500">5</td>
                                <td class="py-3 px-2 text-gray-700">LPPM ITSK Soepraoen</td>
                                <td class="py-3 px-2 text-gray-500">Kampus 2</td>
                                <td class="py-3 px-2 text-center">
                                    <span class="inline-block px-4 py-1.5 bg-amber-400 text-white text-xs rounded-lg font-medium shadow-sm">Kampus 3</span>
                                </td>
                                <td class="py-3 px-2 text-center">
                                    <button class="text-gray-400 hover:text-gray-600 font-bold px-2 py-1">!</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    <button class="px-5 py-2 border border-gray-300 rounded-lg text-sm font-medium text-[#144A32] hover:bg-gray-50 transition-colors">Lihat Semua</button>
                </div>
            </div>

            <!-- Right List -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-[#144A32] mb-4">Fasilitas dengan Masalah Terbanyak</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-sm text-gray-600">
                            <span class="w-5 text-gray-400 text-xs">1</span>
                            Kantin Mami ITSK
                        </div>
                        <span class="px-2.5 py-1 bg-red-500 text-white text-[10px] rounded-md font-bold">4 Kali</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-sm text-gray-600">
                            <span class="w-5 text-gray-400 text-xs">2</span>
                            Wastafel Cuci Tangan
                        </div>
                        <span class="px-2.5 py-1 bg-orange-500 text-white text-[10px] rounded-md font-bold">2 Kali</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-sm text-gray-600">
                            <span class="w-5 text-gray-400 text-xs">3</span>
                            Lobby Rektorat ITSK Soepraoen
                        </div>
                        <span class="px-2.5 py-1 bg-amber-400 text-white text-[10px] rounded-md font-bold">8 Kali</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-sm text-gray-600">
                            <span class="w-5 text-gray-400 text-xs">4</span>
                            LPPM ITSK Soepraoen
                        </div>
                        <span class="px-2.5 py-1 bg-amber-400 text-white text-[10px] rounded-md font-bold">7 Kali</span>
                    </div>
                </div>
                <div class="mt-6 pt-4 border-t border-gray-100">
                    <button class="px-5 py-2 border border-gray-300 rounded-lg text-sm font-medium text-[#144A32] hover:bg-gray-50 transition-colors">Lihat Semua</button>
                </div>
            </div>
        </div>

    </main>

    <script>
        // Initialize Charts when DOM is loaded
        document.addEventListener("DOMContentLoaded", function() {
            // Chart 1: Donut Chart
            const ctxDonut = document.getElementById('statusChart').getContext('2d');
            new Chart(ctxDonut, {
                type: 'doughnut',
                data: {
                    labels: ['Bersih dan Aman', 'Perlu Perhatian', 'Perlu Dibersihkan', 'Buruk'],
                    datasets: [{
                        data: [13, 6, 4, 2],
                        backgroundColor: [
                            '#22c55e', // green-500
                            '#fbbf24', // amber-400
                            '#f97316', // orange-500
                            '#ef4444'  // red-500
                        ],
                        borderWidth: 0,
                        hoverOffset: 4
                    }]
                },
                options: {
                    cutout: '70%',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                }
            });

            // Chart 2: Line Chart
            const ctxLine = document.getElementById('trendChart').getContext('2d');
            new Chart(ctxLine, {
                type: 'line',
                data: {
                    labels: ['16 Mei', '17 Mei', '18 Mei', '19 Mei', '20 Mei', '21 Mei', '22 Mei'],
                    datasets: [{
                        label: 'Inspeksi',
                        data: [7, 12, 15, 11, 14, 10, 17],
                        borderColor: '#22c55e', // green-500
                        backgroundColor: '#22c55e',
                        borderWidth: 3,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#22c55e',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        fill: false,
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 20,
                            grid: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                font: { size: 10 },
                                color: '#9ca3af'
                            }
                        },
                        x: {
                            grid: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                font: { size: 10 },
                                color: '#9ca3af'
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
