<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TravelSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kategori' => 'alam',
                'author' => 1,
                'nama' => 'Taman Nasional Teluk Cendrawasih',
                'gambar' => 'teluk_cendrawasih.jpg',
                'caption_gambar' => 'Taman Nasional Teluk Cendrawasih',
                'deskripsi' => 'Bagi kamu yang gemar berwisata air, di Taman Nasional Teluk Cendrawasih kamu akan puas dimanjakan dengan hamparan laut nan luas. Kekayaan alam Papua benar-benar dipamerkan dengan adanya beragam biota laut yang mendiami Taman Nasional Teluk Cendrawasih ini. Taman Nasional Teluk Cendrawasih ini merupakan taman nasional laut terluas di Indonesia yang memiliki luas mencapai 1.453.500 dengan 18 pulau. Salah satu pulau yang menjadi favorit wisatawan adalah Pulau Mioswaar yang memiliki sumber air panas dengan kandungan belerangnya.

                Selain itu, taman nasional laut ini juga merupakan surga bagi pecinta diving ataupun snorkling. Karena, laut di Taman Nasional Teluk Cendrawasih merupakan rumah bagi beragam biota laut yang menawan. Di sini, kamu bisa menemukan 500 spesies karang, 196 jenis Moluska, dan 209 jenis ikan. Daya tarik utama lainnya di lokasi ini adalah pemandangan para nelayan yang bercengkrama dengan Hiu Paus (Rhincodon Typus).'
            ],
            [
                'kategori' => 'alam',
                'author' => 1,
                'nama' => 'Taman Nasional Lorentz',
                'gambar' => 'tamnas_lorentz.jpg',
                'caption_gambar' => 'Taman Nasional Lorentz | Sumber gambar: Kementrian Lingkungan Hidup dan Kehutanan',
                'deskripsi' => 'Jika Taman Nasional Teluk Cendrawasih adalah taman nasional laut terbesar di Indonesia, kali ini Papua menyimpan Taman Nasional Lorentz yang merupakan taman nasional terbesar di Asia Tenggara. Taman nasional dengan luas 2,4 juta hektar ini membentang di 4 wilayah, diantaranya Jayawijaya, Kabupaten Paniai, Kabupaten Merauke, dan Kabupaten Fakfak.

                Berkat panoramanya yang menakjubkan, lokasi Taman Nasional Lorentz ini juga masuk ke dalam situs warisan dunia oleh UNESCO. Yang menjadi hal unik dari taman nasional ini adalah bahwa Taman Nasional Lorentz merupakan salah satu dari tiga wilayah di dunia yang memiliki gletser di daerah tropis.'
            ],
            [
                'kategori' => 'alam',
                'author' => 1,
                'nama' => 'Danau Habema',
                'gambar' => 'danau_habena.jpg',
                'caption_gambar' => 'Danau Habema',
                'deskripsi' => 'Jika kamu berada di Wamena, kamu tidak boleh melewatkan keindahan alam Papua dalam bentuk Danau Habema yang berada di Kabupaten Jayawijaya ini. Lokasi danau ini memang terbilang cukup jauh dengan jarak 48 km dari Wamena dan membutuhkan waktu selama 4 jam untuk sampai ke lokasi. Namun, lelahnya perjalanan akan terbayar tuntas dengan lanskap bentangan danau yang dijamin akan membuat kamu berdecak kagum.

                Danau yang berada di ketinggian 3.225 mdpl ini merupakan danau tertinggi di Indonesia. Pemandangan eksotis Danau Habema akan semakin mempesona dengan burung-burung yang bertebangan dan hamparan tanaman perdu yang menawan. Ditambah lagi cuaca yang selalu ditutupi kabut, menambah kesyahduan saat berada di lokasi ini.'
            ],
        ];

        $this->db->table('travels')->insertBatch($data);
    }
}
