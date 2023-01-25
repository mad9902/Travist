<?php

namespace Database\Seeders;

use App\Models\TravelList;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // User
        User::create([
            'name' => 'Admin',
            'email' => 'anis@admin.com',
            'password' => Hash::make('aaaaa'),
            'address' => 'Jalan Kebon Kacang No. 40',
            'phone_number' => 123456789,
            'is_admin' => 1
        ]);

        User::create([
            'name' => 'Muhammad Anis',
            'email' => 'anis@binus.ac.id',
            'password' => Hash::make('aaaaa'),
            'address' => 'Jalan Kebon Kacang No. 40',
            'phone_number' => 123456789,
            'is_admin' => 0
        ]);

        // Travel List

        TravelList::create([
            'image' => 'diamond.jpg',
            'title' => 'Diamond Beach, Nusa Penida',
            'description' => 'Nusa Penida merupakan salah satu pulau di Indonesia yang memiliki pemandangan alam yang luar biasa indah. Banyak pantai-pantai indah yang ada di pulau yang terletak di sebelah tenggara Bali ini. Salah satu yang memiliki pemandangan alam terindah adalah Diamond Beach. Lokasinya sekitar 45 menit perjalanan menggunakan kendaraan dari pelabuhan Banjar Nyuh yang merupakan pintu masuk dan keluar pulau ini.',
            'curr_price' => 500000,
            'discount' => 50,
            'price_after_discount' => 250000
        ]);

        TravelList::create([
            'image' => 'dufan.jpg',
            'title' => 'Dunia Fantasi, Jakarta Utara',
            'description' => 'Dunia Fantasi atau yang lebih populer dengan sebutan Dufan, pertama kali dibuka untuk umum pada 29 Agustus 1985 dan merupakan theme park pertama yang dikembangkan oleh Perseroan dan telah memiliki sertifikat ISO 9001:2015 sejak Februari 2017.',
            'curr_price' => 200000,
            'discount' => null,
            'price_after_discount' => null
        ]);

        TravelList::create([
            'image' => 'geopark.jpg',
            'title' => 'Geopark Ciletuh, Sukabumi',
            'description' => 'Di Sukabumi terdapat Geopark Ciletuh yang pernah diumumkan sebagai Global Geoparks oleh UNESCO pada beberapa tahun lalu. Banyak pemandangan alam yang bisa kamu nikmati di geopark ini, mulai dari pantai, air terjun, hingga spot-spot foto terbaik di dalamnya.',
            'curr_price' => 100000,
            'discount' => 20,
            'price_after_discount' => 80000
        ]);

        TravelList::create([
            'image' => 'kelingking.jpg',
            'title' => 'Kelingking Beach, Nusa Penida',
            'description' => 'Selain Diamond Beach, Nusa Penida juga punya Kelingking Beach yang punya pemandangan alam yang ikonik banget. Bisa dibilang Kelingking Beach adalah ikonnya Nusa Penida saat ini karena terkenal untuk wisatawan lokal maupun mancanegara. Alasan utamanya tentu saja karena pemandangan alam menakjubkan berupa tebing yang memiliki bentuk mirip seperti kepala T-Rex.',
            'curr_price' => 800000,
            'discount' => null,
            'price_after_discount' => null
        ]);

        TravelList::create([
            'image' => 'pink.jpg',
            'title' => 'Pink Beach, Pulau Komodo',
            'description' => 'Kalau biasanya pasir pantai berwarna coklat agak putih atau bahkan kehitaman, pantai yang terletak di Pulau Komodo ini punya pasir berwarna pink. Maka dari itu enggak heran kalau dinamakan Pink Beach. Fenomena alam ini bisa terjadi karena ada hewan berukuran mikroskopis bernama foraminifera yang meninggalkan pigmen merah pada koral. Hingga akhirnya koral-koral ini lah yang memberi warna pink pada pasir pantai tersebut.',
            'curr_price' => 1200000,
            'discount' => 50,
            'price_after_discount' => 600000
        ]);

        TravelList::create([
            'image' => 'pulocinta.jpg',
            'title' => 'Pulo Cinta, Gorontalo',
            'description' => 'Tak cuma Maldives yang punya pulau resort, Indonesia juga ada. Namanya Pulo Cinta dan berada di Teluk Tomni, Gorontalo. Dinamakan Pulo Cinta atau pulau cinta karena resort ini dibuat bentuknya mirip seperti jantung hati jika dilihat dari atas. Pulau ini memiliki daya tarik tersendiri dengan hamparan laut yang bersih dan jernih.',
            'curr_price' => 700000,
            'discount' => null,
            'price_after_discount' => null
        ]);

        TravelList::create([
            'image' => 'rajaampat.jpg',
            'title' => 'Raja Ampat, Papua Barat',
            'description' => 'Sulit untuk tidak memasukkan Raja Ampat ke daftar tempat wisata dengan pemandangan alam terindah. Kepulauan yang masuk dalam wilayah Papua Barat ini merupakan salah satu dari 10 tempat menyelam dan snorkeling terbaik di dunia. Kamu bisa mengeksplor semua pulau yang ada di Kepulauan Raja Ampat. Antara lain Pulau Waigeo, Misool, Salawati, Batanta dan deretan pulau kecil lainnya. Semuanya memiliki pemandangan yang indah!',
            'curr_price' => 1000000,
            'discount' => null,
            'price_after_discount' => null
        ]);

        TravelList::create([
            'image' => 'bunaken.jpg',
            'title' => 'Taman Laut Bunaken, Sulawesi Utara',
            'description' => 'Seperti yang diketahui, Bunaken menjadi salah satu taman laut pertama di Indonesia yang sudah diresmikan sejak 1991. Keindahan yang ada di dalam laut ini seringkali mengundang decak kagum pengunjungnya. Tidak ada negara lain yang bisa meniru keindahan yang ada di dalam laut Bunaken ini.',
            'curr_price' => 500000,
            'discount' => 50,
            'price_after_discount' => 250000
        ]);
    }
}
