<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\CompanyProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin Utama
        User::updateOrCreate(
            ['email' => 'admin@solusikoneksianda.co.id'],
            [
                'name' => 'Admin SolusiKoneksi',
                'password' => Hash::make('KoneksiPintar2026!'),
            ]
        );

        // 2. Profil Perusahaan (Singleton)
        CompanyProfile::updateOrCreate(
            ['id' => 1],
            [
                'title' => 'Pelopor Inovasi IoT, Robotika, dan Kecerdasan Buatan di Indonesia',
                'history' => 'PT Solusi Koneksi Anda didirikan dengan visi untuk mempercepat transformasi digital industri nasional melalui infrastruktur perangkat keras pintar, sistem otomasi robotik, serta integrasi teknologi berbasis Artificial Intelligence.',
                'image' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1000&q=80',
                'vision' => 'Menjadi perusahaan teknologi terdepan di Asia Tenggara yang menghadirkan solusi ekosistem pintar mandiri dan berdaya saing global.',
                'mission' => "- Mengembangkan perangkat keras IoT berkualitas tinggi.\n- Menyediakan layanan kustomisasi robotika industri.\n- Mengintegrasikan sistem AI yang aman dan efisien."
            ]
        );

        // 3. Layanan IoT & AI (5 Item dengan Gambar Stabil)
        $services = [
            [
                'name' => 'Mesin Kompos Pintar IoT (Compost-IT)',
                'description' => 'Sistem pengolahan sampah organik dan kompos kering otomatis berbasis sensor IoT terintegrasi cloud untuk pemantauan suhu, kelembaban, dan durasi fermentasi secara real-time.',
                'price' => 15000000,
                'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=1000&q=80',
            ],
            [
                'name' => 'Robot Humanoid Kolaboratif Industri',
                'description' => 'Perancangan dan pemrograman robot humanoid cerdas dengan kecerdasan buatan untuk membantu tugas repetitif dan presisi tinggi di lini manufaktur modern.',
                'price' => 85000000,
                'image' => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?auto=format&fit=crop&w=1000&q=80',
            ],
            [
                'name' => 'Sistem Monitoring Kualitas Air & Lingkungan IoT',
                'description' => 'Perangkat sensor pintar multi-parameter untuk memantau pH, turbidity, dan debit air secara otomatis dengan sistem peringatan dini berbasis IoT.',
                'price' => 12500000,
                'image' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1000&q=80',
            ],
            [
                'name' => 'Smart Greenhouse & Pertanian Presisi IoT',
                'description' => 'Otomasi irigasi tetes, kontrol nutrisi pupuk cair, dan mikroklimat rumah kaca berbasis mikrokontroler nirkabel yang dapat dikontrol via smartphone.',
                'price' => 25000000,
                'image' => 'https://images.unsplash.com/photo-1530836369250-ef72a3f5cda8?auto=format&fit=crop&w=1000&q=80',
            ],
            [
                'name' => 'AI Computer Vision untuk Keamanan Pabrik',
                'description' => 'Solusi kamera pintar dengan algoritma AI deep learning untuk deteksi pelanggaran APD, pengawasan perimeter otomatis, dan analitik keselamatan kerja.',
                'price' => 35000000,
                'image' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=1000&q=80',
            ],
        ];

        foreach ($services as $srv) {
            Service::create($srv);
        }

        // 4. Artikel Terkini (Status: Published)
        $articles = [
            [
                'title' => 'Revolusi Pengolahan Sampah Organik dengan Teknologi Kompos Pintar IoT',
                'content' => 'Pengelolaan limbah organik kini memasuki babak baru berkat integrasi teknologi IoT. Mesin pembuat kompos kering otomatis seperti Compost-IT memungkinkan pemantauan suhu dan kadar air secara akurat tanpa bau.',
                'status' => 'published',
                'date' => now()->subDays(1),
                'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=1000&q=80',
            ],
            [
                'title' => 'Mengenal Peran Robot Humanoid dalam Transformasi Industri 4.0',
                'content' => 'Robot humanoid tidak lagi sekadar fiksi ilmiah. Di sektor industri modern, robot berwujud manusia ini mulai diuji coba untuk menangani tugas-tugas berbahaya dan perakitan kompleks dengan tingkat akurasi tinggi.',
                'status' => 'published',
                'date' => now()->subDays(2),
                'image' => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?auto=format&fit=crop&w=1000&q=80',
            ],
            [
                'title' => 'Optimalisasi Pertanian Presisi Menggunakan Sensor IoT Terdistribusi',
                'content' => 'Pertanian modern menuntut efisiensi tinggi. Dengan sensor kelembaban tanah dan cuaca berbasis IoT, petani dapat menghemat penggunaan air hingga 40% sekaligus meningkatkan hasil panen secara signifikan.',
                'status' => 'published',
                'date' => now()->subDays(3),
                'image' => 'https://images.unsplash.com/photo-1530836369250-ef72a3f5cda8?auto=format&fit=crop&w=1000&q=80',
            ],
            [
                'title' => 'Penerapan Artificial Intelligence pada Sistem Keamanan Pabrik Pintar',
                'content' => 'Kombinasi kamera resolusi tinggi dan algoritma Computer Vision mampu mendeteksi potensi kecelakaan kerja di area pabrik secara real-time sebelum insiden benar-benar terjadi.',
                'status' => 'published',
                'date' => now()->subDays(4),
                'image' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=1000&q=80',
            ],
            [
                'title' => 'Masa Depan Smart City di Indonesia Berbasis Konektivitas 5G dan IoT',
                'content' => 'Infrastruktur kota cerdas membutuhkan jaringan internet berkecepatan tinggi dan sensor cerdas yang saling terhubung untuk manajemen lampu jalan, parkir otomatis, dan mitigasi bencana.',
                'status' => 'published',
                'date' => now()->subDays(5),
                'image' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1000&q=80',
            ],
        ];

        foreach ($articles as $art) {
            Article::create($art);
        }

        // 5. Galeri Kegiatan (5 Item)
        $galleries = [
            [
                'title' => 'Perakitan Modul IoT Kompos Pintar di Laboratorium',
                'image' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=1000&q=80',
            ],
            [
                'title' => 'Uji Coba Lengan Robot Humanoid untuk Manufaktur',
                'image' => 'https://images.unsplash.com/photo-1561557944-6e7860d1a7eb?auto=format&fit=crop&w=1000&q=80',
            ],
            [
                'title' => 'Instalasi Sensor Air Otomatis di Waduk Industri',
                'image' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1000&q=80',
            ],
            [
                'title' => 'Workshop Teknologi AI dan Robotika untuk Pelajar',
                'image' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=1000&q=80',
            ],
            [
                'title' => 'Pameran Inovasi Teknologi Nasional 2026',
                'image' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=1000&q=80',
            ],
        ];

        foreach ($galleries as $gal) {
            Gallery::create($gal);
        }
    }
}