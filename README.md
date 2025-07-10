# 🏆 SIREKOM - Sistem Informasi Registrasi Kompetisi

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-10.x-red?style=for-the-badge&logo=laravel" alt="Laravel Version">
  <img src="https://img.shields.io/badge/PHP-8.1+-blue?style=for-the-badge&logo=php" alt="PHP Version">
  <img src="https://img.shields.io/badge/License-MIT-green?style=for-the-badge" alt="License">
  <img src="https://img.shields.io/badge/Status-Active-brightgreen?style=for-the-badge" alt="Status">
</p>

<p align="center">
  <strong>Sistem Informasi Registrasi Kompetisi</strong> adalah aplikasi web berbasis Laravel yang dirancang untuk mengelola pendaftaran dan administrasi kompetisi mahasiswa dengan fitur dashboard interaktif, manajemen peserta, dan pelaporan yang komprehensif.
</p>

## ✨ Fitur Utama

### 🎯 Manajemen Kompetisi
- **Pendaftaran Kompetisi**: Sistem pendaftaran online yang mudah dan efisien
- **Manajemen Lomba**: CRUD lengkap untuk data kompetisi dengan poster dan lampiran
- **Periode Pendaftaran**: Pengaturan waktu buka dan tutup pendaftaran yang fleksibel

### 👥 Manajemen Peserta
- **Registrasi Mahasiswa**: Pendaftaran mahasiswa dengan data lengkap
- **Role-based Access**: Sistem hak akses berbasis peran (Admin, Mahasiswa)
- **Upload Dokumen**: Fitur upload file pendukung pendaftaran

### 📊 Dashboard & Analytics
- **Dashboard Interaktif**: Grafik dan statistik real-time menggunakan LarapexCharts
- **Statistik Peserta**: Visualisasi data pendaftar per kompetisi
- **Monitoring Kompetisi**: Tracking status dan progress kompetisi

### 📈 Export & Reporting
- **Export Excel**: Export data peserta ke format Excel menggunakan Laravel Excel
- **Laporan Komprehensif**: Generate laporan detail dengan berbagai filter
- **Data Analytics**: Analisis tren pendaftaran dan statistik kompetisi

### 🔐 Keamanan & Autentikasi
- **Multi-Auth System**: Sistem autentikasi terpisah untuk Admin dan Mahasiswa
- **JWT Authentication**: API authentication menggunakan JWT
- **Role Permissions**: Manajemen hak akses menggunakan Spatie Laravel Permission

## 🛠️ Teknologi yang Digunakan

- **Backend**: Laravel 10.x
- **Database**: MySQL
- **Frontend**: Blade Templates, CSS, JavaScript
- **Charts**: LarapexCharts
- **Export**: Laravel Excel
- **Authentication**: JWT Auth, Spatie Laravel Permission
- **File Upload**: Laravel Storage

## 🚀 Instalasi

### Prerequisites
- PHP >= 8.1
- Composer
- MySQL
- Node.js & NPM (untuk asset compilation)

### Langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/username/SIREKOM.git
   cd SIREKOM
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Configuration**
   - Edit file `.env` dan sesuaikan konfigurasi database
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=sirekom_db
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Database Migration & Seeding**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Storage Setup**
   ```bash
   php artisan storage:link
   ```

7. **Compile Assets**
   ```bash
   npm run dev
   ```

8. **Jalankan Server**
   ```bash
   php artisan serve
   ```

Aplikasi akan berjalan di `http://localhost:8000`

## 📁 Struktur Proyek

```
SIREKOM/
├── app/
│   ├── Charts/           # Chart components
│   ├── Exports/          # Excel export classes
│   ├── Http/Controllers/ # Controllers
│   ├── Models/           # Eloquent models
│   └── Providers/        # Service providers
├── database/
│   ├── migrations/       # Database migrations
│   ├── seeders/          # Database seeders
│   └── factories/        # Model factories
├── public/
│   ├── assets/          # Compiled assets
│   └── uploads/         # Uploaded files
├── resources/
│   ├── views/           # Blade templates
│   ├── css/             # Stylesheets
│   └── js/              # JavaScript files
└── routes/              # Route definitions
```

## 👤 Akun Default

Setelah menjalankan seeder, Anda dapat login dengan akun default:

### Admin
- **Username**: admin
- **Password**: password

### Mahasiswa
- **Email**: mahasiswa@example.com
- **Password**: password

## 🔧 Konfigurasi

### File Upload
File upload disimpan di direktori `public/uploads/` sesuai dengan preferensi Anda untuk menghindari symlinks di cPanel.

### JWT Configuration
Untuk menggunakan API dengan JWT, pastikan konfigurasi JWT sudah benar di file `.env`:
```env
JWT_SECRET=your_jwt_secret
JWT_TTL=60
```

## 📊 Fitur Dashboard

Dashboard admin menyediakan:
- **Total Peserta**: Jumlah keseluruhan peserta terdaftar
- **Total Lomba**: Jumlah kompetisi yang tersedia
- **Grafik Pendaftaran**: Visualisasi tren pendaftaran
- **Info Lomba Terbaru**: Daftar 3 kompetisi terbaru

## 📈 Export Data

Sistem mendukung export data peserta ke Excel dengan fitur:
- Export semua peserta
- Export berdasarkan kompetisi tertentu
- Format data yang terstruktur
- Headers yang informatif

## 🤝 Kontribusi

Kami sangat menghargai kontribusi dari komunitas! Untuk berkontribusi:

1. Fork repository ini
2. Buat branch fitur baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan Anda (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buka Pull Request

### Guidelines
- Ikuti standar coding Laravel
- Tambahkan test untuk fitur baru
- Update dokumentasi jika diperlukan
- Pastikan semua test berhasil

## 🐛 Bug Reports

Jika Anda menemukan bug, silakan buat issue di repository ini dengan:
- Deskripsi bug yang jelas
- Langkah-langkah untuk reproduce
- Screenshot jika diperlukan
- Informasi environment (OS, PHP version, dll)

## 📝 License

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

## 📞 Kontak

- **Email**: [your-email@example.com]
- **Website**: [your-website.com]
- **GitHub**: [github.com/username]

---

<div align="center">
  <p>Dibuat dengan ❤️ menggunakan Laravel</p>
  <p>SIREKOM - Sistem Informasi Registrasi Kompetisi</p>
</div>
