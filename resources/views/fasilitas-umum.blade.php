<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasilitas Umum - SanitaCheck</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F4F7F6] text-gray-800 font-sans flex h-screen overflow-hidden">

    <x-layouts.sidebar activePage="fasilitas-umum" />

    <main class="flex-1 overflow-y-auto p-6 lg:p-8 h-full">
        
        <header class="mb-6">
            <h1 class="text-2xl font-bold text-[#144A32]">Fasilitas Umum</h1>
            <p class="text-gray-500 text-sm mt-1">Fasilitas Umum ITSK RS dr. Soepraoen Kesdam V/BRW Malang</p>
        </header>
        <div class="flex flex-col lg:flex-row gap-4 mb-6 items-start lg:items-center justify-between">
            <div class="flex gap-4 w-full lg:w-auto">
                <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-200 flex items-center min-w-[220px]">
                    <div class="w-14 h-14 rounded-xl bg-[#44A067] text-white flex items-center justify-center mr-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-[11px] font-bold text-gray-800 tracking-wide">Total Fasilitas</h3>
                        <p class="text-2xl font-black text-[#144A32] leading-none mt-1">25</p>
                        <p class="text-[10px] text-gray-500 mt-1">Semua fasilitas aktif</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-200 flex items-center min-w-[220px]">
                    <div class="w-14 h-14 rounded-xl bg-[#1A56DB] text-white flex items-center justify-center mr-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-[11px] font-bold text-gray-800 tracking-wide">Aktif</h3>
                        <p class="text-2xl font-black text-[#144A32] leading-none mt-1">23</p>
                        <p class="text-[10px] text-gray-500 mt-1">Fasilitas Aktif</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-200 flex items-center min-w-[220px]">
                    <div class="w-14 h-14 rounded-xl bg-[#EAB308] text-white flex items-center justify-center mr-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-[11px] font-bold text-gray-800 tracking-wide">Tidak Aktif</h3>
                        <p class="text-2xl font-black text-[#144A32] leading-none mt-1">2</p>
                        <p class="text-[10px] text-gray-500 mt-1">Fasilitas Tidak Aktif</p>
                    </div>
                </div>
            </div>
            
            <button class="bg-[#2B6D36] hover:bg-[#1f5027] text-white font-semibold py-2.5 px-5 rounded-xl shadow-md transition-colors text-sm flex items-center shrink-0">
                <span class="mr-2">+</span> Tambah Jadwal
            </button>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 flex flex-col min-h-[500px]">
            <div class="p-5 border-b border-gray-100 flex flex-col md:flex-row gap-4 items-end">
                <div class="flex-1 w-full">
                    <div class="relative">
                        <input type="text" placeholder="Cari nama fasilitas, lokasi, dan penanggung jawab..." class="w-full pl-4 pr-10 py-2.5 border border-gray-300 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500">
                        <div class="absolute right-0 top-0 h-full flex items-center border-l border-gray-300 px-3">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                    </div>
                </div>
                
                <div class="w-full md:w-48">
                    <label class="block text-xs font-bold text-[#144A32] mb-1">Jenis Fasilitas</label>
                    <div class="relative">
                        <select class="w-full appearance-none pl-4 pr-10 py-2.5 border border-gray-300 rounded-xl text-sm focus:outline-none focus:border-green-500 bg-white text-gray-600">
                            <option>Semua Jenis</option>
                        </select>
                        <div class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-48">
                    <label class="block text-xs font-bold text-[#144A32] mb-1">Status</label>
                    <div class="relative">
                        <select class="w-full appearance-none pl-4 pr-10 py-2.5 border border-gray-300 rounded-xl text-sm focus:outline-none focus:border-green-500 bg-white text-gray-600">
                            <option>Semua Status</option>
                        </select>
                        <div class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>

                <button class="border border-gray-300 text-[#144A32] font-bold py-2.5 px-4 rounded-xl text-sm flex items-center hover:bg-gray-50 transition-colors w-full md:w-auto justify-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    Semua Status
                </button>
            </div>

            <div class="flex-1 overflow-x-auto p-5">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50">
                            <th class="py-3 px-4 text-xs font-bold text-[#144A32] border-b border-gray-200">No</th>
                            <th class="py-3 px-4 text-xs font-bold text-[#144A32] border-b border-gray-200">Nama Fasilitas</th>
                            <th class="py-3 px-4 text-xs font-bold text-[#144A32] border-b border-gray-200">Jenis Fasilitas</th>
                            <th class="py-3 px-4 text-xs font-bold text-[#144A32] border-b border-gray-200">Lokasi</th>
                            <th class="py-3 px-4 text-xs font-bold text-[#144A32] border-b border-gray-200">Penanggung Jawab</th>
                            <th class="py-3 px-4 text-xs font-bold text-[#144A32] border-b border-gray-200">Status</th>
                            <th class="py-3 px-4 text-xs font-bold text-[#144A32] border-b border-gray-200 text-center w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 8; $i++)
                        <tr class="border-b border-gray-100 last:border-0 hover:bg-gray-50/50 transition-colors">
                            <td class="py-4 px-4"></td>
                            <td class="py-4 px-4"></td>
                            <td class="py-4 px-4"></td>
                            <td class="py-4 px-4"></td>
                            <td class="py-4 px-4"></td>
                            <td class="py-4 px-4"></td>
                            <td class="py-4 px-4 text-center">
                                <div class="flex justify-center space-x-2">
                                    <button class="w-8 h-8 rounded-lg border border-gray-200 flex items-center justify-center text-gray-500 hover:bg-gray-100">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </button>
                                    <button class="w-8 h-8 rounded-lg border border-gray-200 flex items-center justify-center text-gray-700 hover:bg-gray-100">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                    </button>
                                    <button class="w-8 h-8 rounded-lg border border-gray-200 flex items-center justify-center text-gray-400 hover:bg-red-50 hover:text-red-500 hover:border-red-200">
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

            <div class="p-5 border-t border-gray-100 flex items-center justify-between">
                <p class="text-xs text-gray-500">Menampilkan 1 sampai 8 dari 25 Data</p>
                <div class="flex space-x-1">
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#2B6D36] text-white font-medium">1</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 font-medium">2</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 font-medium">3</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>
            </div>
        </div>

    </main>
</body>
</html>
