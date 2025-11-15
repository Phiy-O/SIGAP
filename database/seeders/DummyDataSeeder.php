<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Hash;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        // Buat beberapa User (pembuat pekerjaan)
        $users = [
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'password' => Hash::make('password'),
                'phone' => '081234567890',
                'role' => 'user',
                'address' => 'Jl. Sudirman No. 123, Jakarta',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Siti Nurhaliza',
                'email' => 'siti@example.com',
                'password' => Hash::make('password'),
                'phone' => '081234567891',
                'role' => 'user',
                'address' => 'Jl. Gatot Subroto No. 45, Jakarta',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Ahmad Fauzi',
                'email' => 'ahmad@example.com',
                'password' => Hash::make('password'),
                'phone' => '081234567892',
                'role' => 'user',
                'address' => 'Jl. Thamrin No. 78, Jakarta',
                'email_verified_at' => now(),
            ],
        ];

        $createdUsers = [];
        foreach ($users as $userData) {
            $user = User::firstOrCreate(
                ['email' => $userData['email']],
                $userData
            );
            $createdUsers[] = $user;
        }

        // Buat beberapa Pekerja SIGAP
        $pekerja = [
            [
                'name' => 'Andi Pratama',
                'email' => 'andi@example.com',
                'password' => Hash::make('password'),
                'phone' => '081234567893',
                'role' => 'pekerja',
                'address' => 'Jl. Kebon Jeruk No. 12, Jakarta',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Rina Wati',
                'email' => 'rina@example.com',
                'password' => Hash::make('password'),
                'phone' => '081234567894',
                'role' => 'pekerja',
                'address' => 'Jl. Kemang No. 34, Jakarta',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Dedi Kurniawan',
                'email' => 'dedi@example.com',
                'password' => Hash::make('password'),
                'phone' => '081234567895',
                'role' => 'pekerja',
                'address' => 'Jl. Cikini No. 56, Jakarta',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Maya Sari',
                'email' => 'maya@example.com',
                'password' => Hash::make('password'),
                'phone' => '081234567896',
                'role' => 'pekerja',
                'address' => 'Jl. Senopati No. 78, Jakarta',
                'email_verified_at' => now(),
            ],
        ];

        $createdPekerja = [];
        foreach ($pekerja as $pekerjaData) {
            $user = User::firstOrCreate(
                ['email' => $pekerjaData['email']],
                $pekerjaData
            );
            $createdPekerja[] = $user;
        }

        // Buat beberapa Pekerjaan (lebih banyak untuk testing algoritma urgent/calm)
        $jobs = [
            // URGENT JOBS - Budget tinggi + Deadline dekat
            [
                'user_id' => $createdUsers[0]->id,
                'title' => 'Butuh Jasa Bersih-bersih Rumah 3 Lantai URGENT',
                'description' => 'Membutuhkan jasa bersih-bersih rumah 3 lantai di area Jakarta Selatan. Pekerjaan meliputi: menyapu, mengepel, membersihkan kamar mandi, dan merapikan ruangan. Waktu kerja: 4 jam. Peralatan sudah disediakan.',
                'category' => 'Bersih-bersih',
                'location' => 'Jakarta Selatan',
                'budget' => 1500000,
                'status' => 'open',
                'deadline' => now()->addDays(3),
            ],
            [
                'user_id' => $createdUsers[1]->id,
                'title' => 'Bantuan Pindahan Barang Rumah - Komisi Besar',
                'description' => 'Membutuhkan bantuan untuk pindahan dari Jakarta Selatan ke Jakarta Utara. Barang termasuk: furniture, elektronik, dan barang pribadi. Butuh 2-3 orang pekerja. Kendaraan sudah disediakan.',
                'category' => 'Pindahan',
                'location' => 'Jakarta Selatan ke Jakarta Utara',
                'budget' => 2000000,
                'status' => 'open',
                'deadline' => now()->addDays(5),
            ],
            [
                'user_id' => $createdUsers[0]->id,
                'title' => 'Perbaikan Pagar dan Cat Ulang - Deadline Cepat',
                'description' => 'Membutuhkan tukang untuk perbaikan pagar yang rusak dan cat ulang pagar. Area pagar sekitar 20 meter. Material sudah disediakan, hanya butuh tenaga kerja.',
                'category' => 'Tukang',
                'location' => 'Jakarta Barat',
                'budget' => 1200000,
                'status' => 'open',
                'deadline' => now()->addDays(4),
            ],
            // REGULAR JOBS
            [
                'user_id' => $createdUsers[2]->id,
                'title' => 'Delivery Makanan untuk Acara',
                'description' => 'Membutuhkan jasa delivery makanan untuk acara ulang tahun. Lokasi pengiriman: Jakarta Pusat. Waktu: hari Sabtu, jam 10.00-14.00. Total paket: 50 box.',
                'category' => 'Delivery',
                'location' => 'Jakarta Pusat',
                'budget' => 300000,
                'status' => 'open',
                'deadline' => now()->addDays(7),
            ],
            [
                'user_id' => $createdUsers[1]->id,
                'title' => 'Bersih-bersih Kantor Setelah Renovasi',
                'description' => 'Membutuhkan jasa bersih-bersih kantor setelah renovasi. Area: 100 m². Pekerjaan: membersihkan debu, sisa material, dan merapikan ruangan. Peralatan disediakan.',
                'category' => 'Bersih-bersih',
                'location' => 'Jakarta Timur',
                'budget' => 400000,
                'status' => 'open',
                'deadline' => now()->addDays(10),
            ],
            [
                'user_id' => $createdUsers[2]->id,
                'title' => 'Bantuan Set Up Acara Pernikahan',
                'description' => 'Membutuhkan bantuan untuk set up acara pernikahan. Tugas: memasang tenda, mengatur meja kursi, dekorasi, dan bantuan selama acara. Waktu: 1 hari penuh.',
                'category' => 'Lainnya',
                'location' => 'Jakarta Selatan',
                'budget' => 600000,
                'status' => 'open',
                'deadline' => now()->addDays(14),
            ],
            // MORE JOBS FOR FULL PAGE
            [
                'user_id' => $createdUsers[0]->id,
                'title' => 'Jasa Cuci Mobil Premium',
                'description' => 'Membutuhkan jasa cuci mobil premium untuk 5 unit mobil. Lokasi: Jakarta Selatan. Peralatan dan bahan sudah disediakan.',
                'category' => 'Lainnya',
                'location' => 'Jakarta Selatan',
                'budget' => 250000,
                'status' => 'open',
                'deadline' => now()->addDays(15),
            ],
            [
                'user_id' => $createdUsers[1]->id,
                'title' => 'Bantuan Packing Barang untuk Ekspor',
                'description' => 'Membutuhkan bantuan packing barang untuk ekspor. Barang: kerajinan tangan. Butuh 2 orang untuk packing rapi dan aman.',
                'category' => 'Lainnya',
                'location' => 'Jakarta Barat',
                'budget' => 350000,
                'status' => 'open',
                'deadline' => now()->addDays(20),
            ],
            [
                'user_id' => $createdUsers[2]->id,
                'title' => 'Jasa Potong Rumput dan Taman',
                'description' => 'Membutuhkan jasa potong rumput dan perawatan taman. Area: 200 m². Peralatan sudah disediakan.',
                'category' => 'Lainnya',
                'location' => 'Jakarta Utara',
                'budget' => 280000,
                'status' => 'open',
                'deadline' => now()->addDays(12),
            ],
            [
                'user_id' => $createdUsers[0]->id,
                'title' => 'Bantuan Dokumentasi Acara',
                'description' => 'Membutuhkan bantuan dokumentasi acara ulang tahun. Tugas: foto dan video selama acara. Durasi: 3 jam.',
                'category' => 'Lainnya',
                'location' => 'Jakarta Pusat',
                'budget' => 450000,
                'status' => 'open',
                'deadline' => now()->addDays(8),
            ],
            [
                'user_id' => $createdUsers[1]->id,
                'title' => 'Jasa Penataan Ruangan',
                'description' => 'Membutuhkan jasa penataan ruangan untuk rumah baru. Tugas: mengatur furniture dan dekorasi sesuai desain.',
                'category' => 'Lainnya',
                'location' => 'Jakarta Timur',
                'budget' => 500000,
                'status' => 'open',
                'deadline' => now()->addDays(18),
            ],
            [
                'user_id' => $createdUsers[2]->id,
                'title' => 'Bantuan Loading Barang ke Truk',
                'description' => 'Membutuhkan bantuan loading barang ke truk. Barang: furniture dan elektronik. Butuh 3-4 orang pekerja kuat.',
                'category' => 'Pindahan',
                'location' => 'Jakarta Selatan',
                'budget' => 400000,
                'status' => 'open',
                'deadline' => now()->addDays(9),
            ],
        ];

        $createdJobs = [];
        foreach ($jobs as $jobData) {
            $job = Job::create($jobData);
            $createdJobs[] = $job;
        }

        // Buat beberapa Lamaran
        $applications = [
            [
                'job_id' => $createdJobs[0]->id,
                'pekerja_id' => $createdPekerja[0]->id,
                'message' => 'Saya sudah berpengalaman bersih-bersih rumah selama 2 tahun. Siap bekerja dengan baik dan teliti.',
                'status' => 'pending',
            ],
            [
                'job_id' => $createdJobs[0]->id,
                'pekerja_id' => $createdPekerja[1]->id,
                'message' => 'Saya sangat tertarik dengan pekerjaan ini. Saya bisa bekerja dengan cepat dan rapi.',
                'status' => 'pending',
            ],
            [
                'job_id' => $createdJobs[1]->id,
                'pekerja_id' => $createdPekerja[2]->id,
                'message' => 'Saya sudah sering membantu pindahan. Saya kuat dan bisa mengangkat barang berat.',
                'status' => 'accepted',
            ],
            [
                'job_id' => $createdJobs[2]->id,
                'pekerja_id' => $createdPekerja[3]->id,
                'message' => 'Saya tukang berpengalaman dengan perbaikan pagar dan cat. Siap mengerjakan dengan hasil maksimal.',
                'status' => 'pending',
            ],
            [
                'job_id' => $createdJobs[3]->id,
                'pekerja_id' => $createdPekerja[0]->id,
                'message' => 'Saya punya motor dan sudah berpengalaman delivery. Bisa mengantarkan tepat waktu.',
                'status' => 'pending',
            ],
        ];

        foreach ($applications as $appData) {
            JobApplication::firstOrCreate(
                [
                    'job_id' => $appData['job_id'],
                    'pekerja_id' => $appData['pekerja_id'],
                ],
                $appData
            );
        }

        $this->command->info('Dummy data berhasil dibuat!');
        $this->command->info('- ' . count($createdUsers) . ' User (pembuat pekerjaan)');
        $this->command->info('- ' . count($createdPekerja) . ' Pekerja SIGAP');
        $this->command->info('- ' . count($createdJobs) . ' Pekerjaan pekerjaan');
        $this->command->info('- ' . count($applications) . ' Lamaran');
    }
}

