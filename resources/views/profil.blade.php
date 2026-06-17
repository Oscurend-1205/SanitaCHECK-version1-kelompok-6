<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>SanitaCheck - Profil Saya</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
          theme: {
            extend: {
              fontFamily: {
                sans: ['Inter', 'sans-serif'],
              },
              colors: {
                brand: {
                  50: '#f0fdf4',
                  100: '#dcfce7',
                  200: '#bbf7d0',
                  300: '#86efac',
                  400: '#4ade80',
                  500: '#22c55e',
                  600: '#16a34a',
                  700: '#15803d',
                  800: '#166534',
                  900: '#14532d',
                  dark: '#0f4c3a',
                  accent: '#1e7b5f',
                  light: '#f8fafc',
                }
              }
            }
          }
        }
    </script>
    <style data-purpose="custom-utilities">
        body {
          background-color: #f8fafc;
        }
        .sidebar-scroll::-webkit-scrollbar {
          width: 4px;
        }
        .sidebar-scroll::-webkit-scrollbar-track {
          background: transparent;
        }
        .sidebar-scroll::-webkit-scrollbar-thumb {
          background-color: rgba(255, 255, 255, 0.2);
          border-radius: 20px;
        }
        .glass-card {
          background: white;
          border: 1px solid #e2e8f0;
          box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="flex h-screen overflow-hidden font-sans text-slate-800">

    <x-layouts.sidebar activePage="profil" />

    <div class="flex-1 flex flex-col h-screen overflow-hidden bg-[#f8fafc]">
        
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-6 shrink-0 z-10">
            <div class="flex items-center gap-4">
                <button class="text-slate-500 hover:text-slate-700" aria-label="Toggle Sidebar">
                    <i class="fa-solid fa-bars text-lg"></i>
                </button>
                <nav aria-label="Breadcrumb">
                    <h2 class="text-xl font-bold text-slate-800 leading-tight">Profil Saya</h2>
                    <div class="flex items-center text-xs text-slate-500 gap-2 mt-0.5">
                        <a class="hover:text-brand-dark" href="#">Dashboard</a>
                        <span>/</span>
                        <a class="hover:text-brand-dark" href="#">Pengaturan</a>
                        <span>/</span>
                        <span class="text-slate-700 font-medium">Profil</span>
                    </div>
                </nav>
            </div>
            <div class="flex items-center gap-5">
                <div class="flex items-center gap-2 text-sm text-slate-600">
                    <i class="fa-regular fa-calendar text-brand-dark"></i>
                    <span>22 Mei 2025</span>
                </div>
                <button class="relative text-slate-500 hover:text-slate-700" aria-label="Notifikasi">
                    <i class="fa-regular fa-bell text-lg"></i>
                    <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 text-white text-[10px] font-bold rounded-full flex items-center justify-center border-2 border-white">3</span>
                </button>
                <div class="w-px h-6 bg-slate-200 mx-1"></div>
                <button class="flex items-center gap-2">
                    <img alt="Admin" class="w-8 h-8 rounded-full border border-slate-200" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD98qeBooERHbMw0iPI2wXU_wvFoPplGs8DzjacrNIqaWhg0maaft9u_Xx_YmI137XK4xsK8J_Aol1QplvEXU7y3OaJAEjQXBhAMh0YJocxClh1i32-iHVeM-Vt1jlbp185dzuijuS77ADMX-C_BpNa8i5TLFCYjkJ9OJodYK8c4AEV4nCVni2vV7bKvE6-8IWNg24vQLe7cJNgkmBgR9oZ7jDzpg2MmgCJujjUd6X_1Wo2ZHpceEWKA099_tthIYWsW-Clapb-P6E"/>
                    <span class="text-sm font-medium text-slate-700">Admin</span>
                    <i class="fa-solid fa-chevron-down text-xs text-slate-400"></i>
                </button>
            </div>
        </header>
        <main class="flex-1 overflow-y-auto p-6">
            <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-6">
                
                <section class="lg:col-span-4 space-y-6" aria-label="Ringkasan Profil">
                    <div class="glass-card rounded-xl overflow-hidden relative">
                        <div class="h-24 bg-brand-50 relative">
                            <div class="absolute w-full h-full inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
                        </div>
                        <div class="px-6 pb-6 pt-12 relative flex flex-col items-center">
                            <div class="absolute -top-12">
                                <div class="relative">
                                    <img alt="Admin Large" class="w-24 h-24 rounded-full border-4 border-white object-cover shadow-sm bg-white" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCvpBJIO51z_v9ohpgNBSKjkr0Ug95TppiWmw7M2S5J91i7UUl6tGZwxTOLpjO__gRlFkEgo8mtdDh2PL0scPqj39zVEMIEomhbKQPlzbywBKgVDZ_OWGmVoeu24Y8lIKXkCG-DdkneacLtXbiEVqBh5sRcWZRx0gBTX1H_ObSBIIzHdOHFoyqeqeNbJIqI9kS4ERvW18IogFkNvEnEbPYWePrngFGdBFhKRjJaufSsGLjiIZkMugNL-OhHGRf8GPn5EdzoIhOPmRo"/>
                                    <button class="absolute bottom-0 right-0 w-8 h-8 bg-brand-600 text-white rounded-full flex items-center justify-center border-2 border-white hover:bg-brand-700 transition shadow-sm" aria-label="Ubah Foto Profil">
                                        <i class="fa-solid fa-camera text-sm"></i>
                                    </button>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-slate-800 mt-2">Admin</h3>
                            <p class="text-sm text-slate-500 mb-3">Administrator</p>
                            <span class="px-3 py-1 bg-brand-50 text-brand-700 text-xs font-semibold rounded-md border border-brand-100">
                                Akun Aktif
                            </span>
                        </div>
                        <div class="border-t border-slate-100 px-6 py-4 space-y-4">
                            <div class="flex items-center justify-between py-1">
                                <div class="flex items-center gap-3 text-slate-600">
                                    <i class="fa-regular fa-id-badge w-4 text-center"></i>
                                    <span class="text-sm">ID Pengguna</span>
                                </div>
                                <span class="text-sm font-medium text-slate-800">ADM001</span>
                            </div>
                            <div class="flex items-center justify-between py-1">
                                <div class="flex items-center gap-3 text-slate-600">
                                    <i class="fa-regular fa-envelope w-4 text-center"></i>
                                    <span class="text-sm">Email</span>
                                </div>
                                <span class="text-sm font-medium text-slate-800">admin@sanitacheck.id</span>
                            </div>
                            <div class="flex items-center justify-between py-1">
                                <div class="flex items-center gap-3 text-slate-600">
                                    <i class="fa-solid fa-phone w-4 text-center"></i>
                                    <span class="text-sm">No. Telepon</span>
                                </div>
                                <span class="text-sm font-medium text-slate-800">0812 3456 7890</span>
                            </div>
                            <div class="flex items-center justify-between py-1">
                                <div class="flex items-center gap-3 text-slate-600">
                                    <i class="fa-regular fa-calendar w-4 text-center"></i>
                                    <span class="text-sm">Tergabung Sejak</span>
                                </div>
                                <span class="text-sm font-medium text-slate-800">10 Januari 2024</span>
                            </div>
                            <div class="flex items-center justify-between py-1">
                                <div class="flex items-center gap-3 text-slate-600">
                                    <i class="fa-solid fa-clock-rotate-left w-4 text-center"></i>
                                    <span class="text-sm">Terakhir Login</span>
                                </div>
                                <span class="text-sm font-medium text-slate-800">22 Mei 2025 08:45 WIB</span>
                            </div>
                            <div class="flex items-center justify-between py-1">
                                <div class="flex items-center gap-3 text-slate-600">
                                    <i class="fa-regular fa-user w-4 text-center"></i>
                                    <span class="text-sm">Peran</span>
                                </div>
                                <span class="text-sm font-medium text-slate-800">Administrator</span>
                            </div>
                            <div class="flex items-center justify-between py-1">
                                <div class="flex items-center gap-3 text-slate-600">
                                    <i class="fa-solid fa-circle-check w-4 text-center"></i>
                                    <span class="text-sm">Status</span>
                                </div>
                                <span class="text-sm font-medium text-brand-600">Aktif</span>
                            </div>
                        </div>
                        <div class="p-6 border-t border-slate-100 flex justify-center">
                            <button class="px-4 py-2 border border-brand-600 text-brand-600 rounded-lg text-sm font-medium hover:bg-brand-50 transition-colors flex items-center gap-2">
                                <i class="fa-regular fa-clock"></i> Lihat Aktivitas Login
                            </button>
                        </div>
                    </div>
                </section>

                <div class="lg:col-span-8 space-y-6">
                    <section class="glass-card rounded-xl" aria-label="Form Pengaturan Akun">
                        <nav class="flex border-b border-slate-200 overflow-x-auto" aria-label="Tab Pengaturan">
                            <button class="px-6 py-4 text-sm font-medium text-brand-dark border-b-2 border-brand-dark flex items-center gap-2 whitespace-nowrap">
                                <i class="fa-regular fa-user"></i> Informasi Pribadi
                            </button>
                            <button class="px-6 py-4 text-sm font-medium text-slate-500 hover:text-slate-700 flex items-center gap-2 whitespace-nowrap">
                                <i class="fa-solid fa-phone"></i> Kontak
                            </button>
                            <button class="px-6 py-4 text-sm font-medium text-slate-500 hover:text-slate-700 flex items-center gap-2 whitespace-nowrap">
                                <i class="fa-solid fa-gear"></i> Preferensi
                            </button>
                            <button class="px-6 py-4 text-sm font-medium text-slate-500 hover:text-slate-700 flex items-center gap-2 whitespace-nowrap">
                                <i class="fa-solid fa-lock"></i> Keamanan
                            </button>
                        </nav>
                        
                        <div class="p-6">
                            <form>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap</label>
                                        <input class="w-full rounded-lg border-slate-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 text-sm" type="text" value="Admin"/>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Nama Pengguna</label>
                                        <input class="w-full rounded-lg border-slate-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 text-sm bg-slate-50 text-slate-500" readonly="" type="text" value="admin"/>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                                        <input class="w-full rounded-lg border-slate-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 text-sm" type="email" value="admin@sanitacheck.id"/>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Tanggal Lahir</label>
                                        <div class="relative">
                                            <input class="w-full rounded-lg border-slate-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 text-sm pl-3 pr-10" type="text" value="01/01/1990"/>
                                            <i class="fa-regular fa-calendar absolute right-3 top-2.5 text-slate-400"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">No. Telepon</label>
                                        <input class="w-full rounded-lg border-slate-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 text-sm" type="text" value="0812 3456 7890"/>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Jenis Kelamin</label>
                                        <select class="w-full rounded-lg border-slate-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 text-sm">
                                            <option selected="">Laki-laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Alamat</label>
                                        <textarea class="w-full rounded-lg border-slate-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 text-sm resize-none" rows="3">Jl. Kebersihan No. 45, Kota Sejahtera, Provinsi Jawa Barat, 40123</textarea>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Deskripsi</label>
                                        <textarea class="w-full rounded-lg border-slate-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 text-sm resize-none" rows="3">Administrator Sistem Monitoring Sanitasi dan Kebersihan Fasilitas Umum</textarea>
                                    </div>
                                </div>
                                <div class="mt-6 flex justify-end">
                                    <button class="bg-brand-dark hover:bg-brand-800 text-white px-5 py-2.5 rounded-lg text-sm font-medium flex items-center gap-2 transition-colors shadow-sm" type="submit">
                                        <i class="fa-regular fa-floppy-disk"></i> Simpan Perubahan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </section>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <section class="glass-card rounded-xl p-6" aria-label="Ubah Kata Sandi">
                            <h3 class="text-base font-bold text-slate-800 mb-5">Ubah Kata Sandi</h3>
                            <form class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Kata Sandi Saat Ini</label>
                                    <div class="relative">
                                        <input class="w-full rounded-lg border-slate-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 text-sm pr-10" placeholder="Masukkan kata sandi saat ini" type="password"/>
                                        <button class="absolute right-3 top-2.5 text-slate-400 hover:text-slate-600" type="button" aria-label="Tampilkan Kata Sandi">
                                            <i class="fa-regular fa-eye-slash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Kata Sandi Baru</label>
                                    <div class="relative">
                                        <input class="w-full rounded-lg border-slate-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 text-sm pr-10" placeholder="Masukkan kata sandi baru" type="password"/>
                                        <button class="absolute right-3 top-2.5 text-slate-400 hover:text-slate-600" type="button" aria-label="Tampilkan Kata Sandi">
                                            <i class="fa-regular fa-eye-slash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Konfirmasi Kata Sandi Baru</label>
                                    <div class="relative">
                                        <input class="w-full rounded-lg border-slate-300 shadow-sm focus:border-brand-500 focus:ring-brand-500 text-sm pr-10" placeholder="Konfirmasi kata sandi baru" type="password"/>
                                        <button class="absolute right-3 top-2.5 text-slate-400 hover:text-slate-600" type="button" aria-label="Tampilkan Kata Sandi">
                                            <i class="fa-regular fa-eye-slash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="pt-2 flex justify-end">
                                    <button class="bg-brand-dark hover:bg-brand-800 text-white px-5 py-2.5 rounded-lg text-sm font-medium flex items-center gap-2 transition-colors shadow-sm" type="submit">
                                        <i class="fa-solid fa-lock"></i> Ubah Kata Sandi
                                    </button>
                                </div>
                            </form>
                        </section>

                        <section class="glass-card rounded-xl p-6 flex flex-col" aria-label="Aktivitas Login">
                            <h3 class="text-base font-bold text-slate-800 mb-5">Aktivitas Login Terbaru</h3>
                            <div class="overflow-x-auto flex-1">
                                <table class="w-full text-sm text-left">
                                    <thead class="text-xs text-slate-500 bg-slate-50 rounded-lg">
                                        <tr>
                                            <th class="px-4 py-3 font-medium rounded-l-lg">Tanggal & Waktu</th>
                                            <th class="px-4 py-3 font-medium">IP Address</th>
                                            <th class="px-4 py-3 font-medium">Perangkat</th>
                                            <th class="px-4 py-3 font-medium rounded-r-lg">Lokasi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100">
                                        <tr>
                                            <td class="px-4 py-3 flex items-center gap-2 text-slate-700">
                                                <span class="w-2 h-2 rounded-full bg-brand-500"></span> 22 Mei 2025 08:45 WIB
                                            </td>
                                            <td class="px-4 py-3 text-slate-600">103.45.67.89</td>
                                            <td class="px-4 py-3 text-slate-600">Chrome - Windows</td>
                                            <td class="px-4 py-3 text-slate-600">Kota Sejahtera</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 flex items-center gap-2 text-slate-700">
                                                <span class="w-2 h-2 rounded-full bg-brand-500"></span> 21 Mei 2025 16:32 WIB
                                            </td>
                                            <td class="px-4 py-3 text-slate-600">103.45.67.89</td>
                                            <td class="px-4 py-3 text-slate-600">Chrome - Windows</td>
                                            <td class="px-4 py-3 text-slate-600">Kota Sejahtera</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 flex items-center gap-2 text-slate-700">
                                                <span class="w-2 h-2 rounded-full bg-brand-500"></span> 21 Mei 2025 08:10 WIB
                                            </td>
                                            <td class="px-4 py-3 text-slate-600">103.45.67.89</td>
                                            <td class="px-4 py-3 text-slate-600">Chrome - Windows</td>
                                            <td class="px-4 py-3 text-slate-600">Kota Sejahtera</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 flex items-center gap-2 text-slate-700">
                                                <span class="w-2 h-2 rounded-full bg-brand-500"></span> 20 Mei 2025 17:15 WIB
                                            </td>
                                            <td class="px-4 py-3 text-slate-600">103.45.67.89</td>
                                            <td class="px-4 py-3 text-slate-600">Chrome - Windows</td>
                                            <td class="px-4 py-3 text-slate-600">Kota Sejahtera</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 flex items-center gap-2 text-slate-700">
                                                <span class="w-2 h-2 rounded-full bg-brand-500"></span> 20 Mei 2025 08:05 WIB
                                            </td>
                                            <td class="px-4 py-3 text-slate-600">103.45.67.89</td>
                                            <td class="px-4 py-3 text-slate-600">Chrome - Windows</td>
                                            <td class="px-4 py-3 text-slate-600">Kota Sejahtera</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4 pt-4 border-t border-slate-100 flex justify-start">
                                <button class="px-4 py-2 border border-slate-300 text-slate-700 rounded-lg text-sm font-medium hover:bg-slate-50 transition-colors flex items-center gap-2">
                                    <i class="fa-solid fa-list-ul text-brand-dark"></i> Lihat Semua Aktivitas
                                </button>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            
            <footer class="text-center text-xs text-slate-500 mt-8 mb-4">
                © 2025 SanitaCheck. Sistem Monitoring Sanitasi dan Kebersihan Fasilitas Umum.
            </footer>
        </main>
        </div>
    </body>
</html>