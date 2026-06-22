# SanitaCHECK - Kampus Sehat Terintegrasi

Aplikasi **SanitaCHECK** adalah platform monitoring sanitasi terintegrasi untuk kampus yang dibangun menggunakan [Laravel 11](https://laravel.com) dan dikelola oleh **Kelompok 6**. Panel admin telah terintegrasi dengan template CoreUI untuk tampilan yang lebih modern, bersih, dan responsif.

---

## 🛠 Persyaratan Sistem

Sebelum menjalankan proyek ini, pastikan sistem Anda telah menginstal beberapa perangkat lunak berikut:
- **PHP** (Versi 8.2 atau lebih baru)
- **Composer** (Manajer paket untuk PHP)
- **Node.js & npm** (Untuk manajemen aset frontend)
- **Git** (Untuk version control)

---

## 🚀 Cara Instalasi & Menjalankan Proyek (Bagi Kolaborator)

Bagi kolaborator yang baru pertama kali bergabung, silakan ikuti langkah-langkah di bawah ini untuk mengkloning dan menjalankan website di komputer lokal (localhost):

### 1. Clone Repository
Buka terminal/command prompt dan jalankan perintah:
```bash
git clone https://github.com/Oscurend-1205/SanitaCHECK-version1-kelompok-6.git
cd SanitaCHECK-version1-kelompok-6
```

### 2. Instalasi Dependensi PHP (Composer)
Instal semua package Laravel yang dibutuhkan menggunakan Composer:
```bash
composer install
```

### 3. Konfigurasi Environment (`.env`)
Salin file konfigurasi contoh (environment) lalu buat file `.env` yang baru:
```bash
cp .env.example .env
```
*Catatan (Windows): Jika menggunakan Command Prompt Windows, jalankan `copy .env.example .env`.*

Setelah file `.env` terbuat, jalankan perintah ini untuk men-generate App Key:
```bash
php artisan key:generate
```

### 4. Konfigurasi Database (MySQL)
Proyek ini menggunakan **MySQL** untuk database. Anda harus mengatur database secara manual sebelum melakukan migrasi.
- Buka aplikasi XAMPP/Laragon Anda dan pastikan MySQL berjalan.
- Buat database baru bernama **`sanitacheck`** (contohnya melalui phpMyAdmin atau command line).
- Buka file `.env` dan sesuaikan kredensial database Anda:
  ```env
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=sanitacheck
  DB_USERNAME=root
  DB_PASSWORD=
  ```

Jalankan perintah berikut untuk membuat dan memigrasi struktur tabel database:
```bash
php artisan migrate
```

### 5. Instalasi Dependensi Frontend (NPM)
Instal library frontend dan CoreUI dependencies:
```bash
npm install
npm run build
```

### 6. Jalankan Server Lokal
Setelah semuanya siap, jalankan local development server Laravel:
```bash
php artisan serve
```

🌐 Buka browser Anda dan akses: **`http://localhost:8000`**

*(Halaman uji coba Admin Panel dengan CoreUI bisa diakses di: **`http://localhost:8000/coreui-test`**)*

---

## 💡 Informasi Tambahan

- **Tema Admin**: Tema admin terletak di `resources/views/layouts/admin.blade.php`. Aset dari template bawaan ada di folder `public/assets/admin`.
- **Git Ignore**: Folder yang memuat file berukuran besar seperti `vendor/`, `node_modules/`, `public/assets/admin/node_modules/`, dan file database `database.sqlite` sudah otomatis diabaikan oleh `.gitignore` sehingga tidak akan membebani repository.

## Kontributor
- Kelompok 6
