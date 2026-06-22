# SanitaCheck Design Guidelines & System Architecture

Dokumen ini berisi panduan desain (UI/UX) dan aturan arsitektur sistem (Backend) untuk memastikan konsistensi dalam pengembangan aplikasi SanitaCheck.

## 1. Color Palette (Palet Warna)
- **Primary Green (Utama)**: `#1b5e3a` - Digunakan untuk sidebar, tombol utama, judul halaman, dan aksen penting.
- **Secondary Green**: `#28a745` - Digunakan untuk ikon sukses, status aktif, dan elemen positif lainnya.
- **Dark Text**: `#333333` - Digunakan untuk teks utama (body text) pada mode terang.
- **Secondary Text (Muted)**: `#6c757d` - Digunakan untuk sub-judul, keterangan tambahan, dan placeholder teks.
- **Background Light**: `#f3f4f7` (Default CoreUI) - Latar belakang halaman utama mode terang.
- **Card Background**: `#ffffff` - Latar belakang kartu/kontainer.
- **Status Colors**:
  - **Blue (Info/Aktif)**: `#0d6efd`
  - **Yellow/Orange (Warning/Tidak Aktif/Perhatian)**: `#ffc107` / `#fd7e14`
  - **Red (Danger/Buruk)**: `#dc3545`

## 2. Typography (Tipografi)
- **Font Family**: `Inter`, `system-ui`, `-apple-system`, `Segoe UI`, `Roboto`, `Helvetica Neue`, `Arial`, `sans-serif`.
- **Kategori Font**: Sans-serif (modern, bersih, tingkat keterbacaan tinggi).
- **Ukuran Font (Font Sizes)**:
  - **H1 / Page Title**: `1.5rem` (24px) - Font weight: Bold.
  - **H2 / Card Number**: `2rem` (32px) - Font weight: Bold.
  - **H3 / Card Title**: `1rem` (16px) - Font weight: Semi-Bold.
  - **Body / Normal Text**: `0.875rem` (14px) atau `1rem` (16px).
  - **Small / Table Header**: `0.85rem` (13.6px) - Font weight: Semi-Bold.
  - **Badge / Tiny Text**: `0.75rem` (12px).

## 3. Spacing & Layout (Jarak, Margin, Padding)
- **Grid System**: Menggunakan sistem Grid Bootstrap 5 (12 kolom).
- **Gaps (Jarak antar elemen)**:
  - Antar Card/Widget di dashboard: `mb-4` (margin-bottom: 1.5rem).
  - Jarak antar form input: `mb-3` (margin-bottom: 1rem).
- **Padding**:
  - Card Body: `p-3` (1rem) atau `p-4` (1.5rem).
  - Main Container: `px-4` (1.5rem) kiri-kanan.
- **Border Radius (Bentuk Sudut)**:
  - **Cards / Kontainer Utama**: `12px` (Soft rounded corners).
  - **Tombol Standar**: `0.375rem` (6px).
  - **Pill Buttons (Tombol bulat panjang)**: `20px` atau `50rem`.
  - **Input Fields**: `8px`.

## 4. UI Components Rules (Aturan Komponen)
- **Komponen Utama**: Wajib menggunakan *utility classes* dan komponen bawaan dari **Bootstrap 5** (karena CoreUI dibangun di atas Bootstrap). Hindari menulis CSS kustom kecuali sangat terpaksa. Manfaatkan fitur seperti Flexbox (`d-flex`, `justify-content-*`, `align-items-*`) dan spacing utilities (`m-*`, `p-*`) dari Bootstrap.
- **Shadows (Bayangan)**: Gunakan `shadow-sm` untuk Card agar terlihat mengambang secara halus namun tidak berlebihan.
- **Borders**: Gunakan `border` (1px solid var(--cui-border-color)) bersamaan dengan shadow untuk memberikan batas yang jelas.
- **Tables**: Gunakan `table-borderless`, `table-hover`, dan `align-middle`. Berikan garis bawah (border-bottom) hanya pada `<thead>`.

---

## 5. Backend & Database Integration Rules
Untuk menjaga kode agar tetap rapi, scalable, dan aman, ikuti aturan pengembangan Laravel berikut:

### Naming Conventions (Aturan Penamaan)
- **Database Tables**: Plural, snake_case (contoh: `facilities`, `inspections`, `users`).
- **Models**: Singular, PascalCase (contoh: `Facility`, `Inspection`, `User`).
- **Controllers**: PascalCase berakhiran 'Controller' (contoh: `FacilityController`).
- **Methods**: camelCase (contoh: `index()`, `store()`, `update()`, `destroy()`).
- **Routes**: Kebab-case untuk URL (contoh: `/fasilitas-umum`, `/inspeksi-sanitasi`).

### Database & Eloquent
- Gunakan **Migrations** untuk setiap perubahan skema database. Jangan mengubah tabel secara manual.
- Gunakan **Seeder & Factory** untuk menghasilkan data dummy selama pengembangan.
- Manfaatkan **Eloquent Relationships** (`hasMany`, `belongsTo`) daripada melakukan query JOIN manual.
- Terapkan **Soft Deletes** pada tabel utama (fasilitas, laporan) agar data tidak benar-benar terhapus dari sistem untuk alasan audit.

### Controllers & Business Logic
- Jaga agar Controllers tetap "Ramping" (Thin Controllers).
- Pindahkan logika bisnis yang kompleks ke dalam **Service Classes** atau **Action Classes**.
- Selalu gunakan **Form Requests** (`php artisan make:request`) untuk memvalidasi input dari user, jangan lakukan validasi langsung di dalam Controller.

### Integrasi Frontend & Blade
- Gunakan pendekatan **Component-based** menggunakan Laravel Blade Components (`<x-card>`, `<x-button>`, dll) untuk kode HTML yang sering digunakan berulang.
- Data yang dikirim dari controller ke view harus dipaginasi menggunakan `$query->paginate(10)` untuk menjaga performa rendering di halaman tabel data (seperti halaman Fasilitas).

### Security (Keamanan)
- Lindungi route administrator menggunakan **Middleware** (contoh: `auth`, `role:admin`).
- Hindari N+1 Query Problem dengan menggunakan Eager Loading (`with('relasi')`) saat memanggil data dari database.
