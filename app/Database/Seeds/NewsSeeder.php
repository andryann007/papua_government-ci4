<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kategori' => 'umum',
                'author' => 1,
                'title' => 'Korban Eksil 1965 Diberi Kemudahan Pemerintah untuk Masuk Indonesia (KOMPAS.com)',
                'gambar' => '64ebf7c5ad5f1.jpeg',
                'caption_gambar' => 'Menteri Koordinator bidang Politik, Hukum, dan Keamanan (Menko Polhukam) Mahfud MD dan Menteri Hukum dan HAM (Menkumham) Yasonna H. Laoly menemui para mantan Mahasiswa Ikatan Dinas (Mahid) era Presiden Soekarno dan eksil politik di Amsterdam, Belanda, Minggu (27/8/2023) waktu setempat. Sumber: Humas Kemenkumham (KOMPAS.com/Syakirun)',
                'deskripsi' => 'JAKARTA, KOMPAS.com - Mantan Mahasiswa Ikatan Dinas (Mahid) yang diutus ke luar negeri pada era Presiden Soekarno dan tidak bisa kembali karena rezim Soeharto mendapatkan layanan gratis mengurus visa, izin tinggal, dan izin masuk kembali ke Indonesia.

                Menteri Hukum dan Hak Asasi Manusia (Menkumham) Yasonna H. Laoly mengatakan, layanan ini juga diberikan kepada para korban pelanggaran HAM berat atau eksil politik.
                
                Pernyataan tersebut Yasonna sampaikan dalam pertemuannya bersama Menteri Koordinator bidang Politik, Hukum, dan HAM (Menko Polhukam) Mahfud MD dengan korban pelanggaran HAM berat masa lalu di Amsterdam.'
            ],
            [
                'kategori' => 'politik',
                'author' => 1,
                'title' => 'Jokowi dan Prabowo Disebut Akan Bertemu Habib Luthfi di Pekalongan Besok (KOMPAS.com)',
                'gambar' => '63415569399b4.jpg',
                'caption_gambar' => 'Menteri Pertahanan Prabowo Subianto bersama Presiden Republik Indonesia Joko Widodo (Jokowi) di sela peringatan Hari Ulang Tahun (HUT) ke-77 TNI.(Dok. Kementerian Pertahanan)',
                'deskripsi' => 'JAKARTA, KOMPAS.com - Presiden Joko Widodo (Jokowi) bersama Menteri Pertahanan (Menhan) sekaligus Ketua Umum Partai Gerindra Prabowo Subianto akan bertemu Habib Muhammad Luthfi bin Yahya di Pekalongan pada Selasa (29/8/2023) besok.

                Hal tersebut disampaikan Sekretaris Jenderal (Sekjen) Partai Gerindra Ahmad Muzani di Kompleks Parlemen Senayan, Jakarta, Senin (28/8/2023).
                
                "Besok Pak Prabowo Insya Allah akan bertemu Habib Luthfi (di) Pekalongan, mungkin dengan Presiden ya," ujar Muzani.'
            ],
            [
                'kategori' => 'umum',
                'author' => 1,
                'title' => 'Kenangan Pahit Embargo AS yang "Lumpuhkan" Alutsista TNI AU (KOMPAS.com)',
                'gambar' => '630d6fc303d99.jpeg',
                'caption_gambar' => 'Jet tempur F-16 TNI AU dalam latihan bersama Pitch Black 2022 di Royal Australian Air Force (RAAF) Base, Darwin, Australia.((Dispenau))',
                'deskripsi' => 'JAKARTA, KOMPAS.com - Di tengah situasi dunia yang terus berkembang, Indonesia terus berupaya melakukan modernisasi alat utama sistem persenjataan (alutsista).

                Salah satu cara yang dilakukan oleh Menteri Pertahanan Prabowo Subianto buat melakukan modernisasi alutsista adalah dengan meneken nota kesepahaman (MoU) dengan produsen pesawat asal Amerika Serikat, Boeing, buat membeli jet tempur F-15EX.
                
                Di satu sisi banyak kalangan mendukung langkah Prabowo meneken MoU buat rencana pembelian 24 pesawat tempur generasi 4.5 itu, meskipun belum mempunyai kemampuan menghindari radar atau siluman (stealth).'
            ],
        ];

        $this->db->table('news')->insertBatch($data);
    }
}
