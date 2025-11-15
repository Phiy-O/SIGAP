# SIGAP - Platform Layanan On-Demand

SIGAP adalah platform layanan on-demand yang dirancang untuk memecahkan masalah sosial maraknya pengangguran di Indonesia. Platform ini berfungsi sebagai jembatan, menciptakan lapangan kerja baru yang fleksibel dengan menyediakan wadah bagi individu yang memiliki waktu luang dan keterampilan seperti mahasiswa atau pekerja lepas untuk menjadi "Pekerja SIGAP".

## Fitur MVP

- ✅ Multi-role authentication (User & Pekerja SIGAP)
- ✅ Landing page yang menarik dan modern
- ✅ Dashboard terpisah untuk User dan Pekerja
- ✅ Job posting dan listing
- ✅ Job application system
- ✅ Profile management
- ✅ Modern UI dengan design system konsisten

## Tech Stack

- **Backend**: Laravel 11
- **Frontend**: Blade Templates + Tailwind CSS
- **Build Tool**: Vite
- **Database**: MySQL

## Design System

### Warna
- **Primary Blue**: `#082453` (sigap-blue)
- **Primary Orange**: `#FBA81F` (sigap-orange)
- **Background**: `#FFFFFF` (white)

## Instalasi

1. Clone repository
```bash
git clone <repository-url>
cd sigap
```

2. Install dependencies
```bash
composer install
npm install
```

3. Setup environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Konfigurasi database di `.env`
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sigap
DB_USERNAME=root
DB_PASSWORD=
```

5. Jalankan migrations
```bash
php artisan migrate
```

6. Build assets
```bash
npm run dev
# atau untuk production
npm run build
```

7. Jalankan server
```bash
php artisan serve
```

## Struktur Project

```
sigap/
├── app/
│   ├── Http/Controllers/
│   │   ├── Auth/          # Authentication controllers
│   │   ├── DashboardController.php
│   │   ├── JobController.php
│   │   └── ProfileController.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Job.php
│   │   └── JobApplication.php
│   └── Policies/
│       └── JobPolicy.php
├── database/
│   └── migrations/        # Database migrations
├── resources/
│   ├── css/
│   │   └── app.css        # Tailwind CSS dengan design system
│   ├── js/
│   │   └── app.js
│   └── views/
│       ├── layouts/
│       ├── auth/
│       ├── dashboard/
│       ├── jobs/
│       └── profile/
└── routes/
    ├── web.php
    └── auth.php
```

## Peran Pengguna

### User
- Membuat lowongan pekerjaan
- Menerima dan meninjau lamaran dari Pekerja SIGAP
- Mengelola lowongan yang dibuat

### Pekerja SIGAP
- Melihat daftar lowongan tersedia
- Melamar pekerjaan
- Mengelola lamaran yang dikirim

## License

MIT License

