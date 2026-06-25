<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    public function run()
    {
        helper('url');
        $model = model('ArtikelModel');

        $articles = [
            [
                'judul' => 'Transfer news: Rasmus Højlund resmi bergabung permanen dengan Napoli',
                'isi' => 'Rasmus Højlund resmi meninggalkan Manchester United dan bergabung permanen dengan Napoli. Kabar ini menjadi salah satu berita transfer utama karena Højlund sebelumnya datang ke Old Trafford dengan ekspektasi besar sebagai penyerang muda masa depan.

Reuters melaporkan bahwa Napoli menuntaskan transfer permanen setelah masa peminjaman yang sukses. Pada musim terakhirnya bersama Napoli, Højlund mencetak 16 gol dari 44 penampilan di semua kompetisi, ikut membantu klub itu meraih Supercoppa Italiana dan finis sebagai runner-up Serie A.

Bagi United, kepindahan ini membuka diskusi baru tentang arah lini depan. Dana hasil penjualan bisa menjadi ruang untuk memperkuat posisi lain, tetapi di sisi lain penggemar juga akan menilai apakah klub terlalu cepat melepas penyerang yang masih berusia muda.

Dalam forum, topik ini bisa dibahas dari beberapa sudut: performa Højlund selama di Manchester, kebutuhan penyerang baru, dan bagaimana strategi transfer United setelah melepas pemain yang pernah menjadi bagian skuad juara FA Cup 2024.',
                'gambar' => 'mu-transfer.svg',
                'status' => 1,
                'is_terbaru' => 1,
                'id_kategori' => 7,
                'sumber_nama' => 'Reuters',
                'sumber_url' => 'https://www.reuters.com/sports/soccer/napoli-sign-hojlund-man-united-after-loan-spell-2026-06-03/',
            ],
            [
                'judul' => 'Laporan Guardian: United mencapai kesepakatan untuk mendatangkan Éderson dari Atalanta',
                'isi' => 'Manchester United dikabarkan telah mencapai kesepakatan dengan Atalanta untuk transfer gelandang Brasil, Éderson. Laporan The Guardian menyebut nilai awal kesepakatan berada di kisaran 40,5 juta euro, dengan tambahan bonus yang dapat membuat totalnya naik.

Éderson dipandang sebagai pemain yang cocok untuk kebutuhan lini tengah United karena memiliki energi, kemampuan membaca permainan, dan mobilitas dari area bertahan ke menyerang. Tipe seperti ini penting apabila United ingin memperbaiki keseimbangan antara pressing, transisi, dan perlindungan lini belakang.

Kedatangan Éderson juga menarik karena dikaitkan dengan perubahan era kepelatihan Michael Carrick. Jika transfer ini benar-benar selesai, ia dapat menjadi salah satu fondasi awal dalam pembentukan skuad baru.

Topik diskusi forum: apakah Éderson lebih cocok menjadi gelandang bertahan, gelandang box-to-box, atau bagian dari double pivot? Penggemar juga bisa membandingkan profilnya dengan opsi gelandang lain yang sering dikaitkan dengan United.',
                'gambar' => 'mu-transfer.svg',
                'status' => 1,
                'is_terbaru' => 1,
                'id_kategori' => 7,
                'sumber_nama' => 'The Guardian',
                'sumber_url' => 'https://www.theguardian.com/sport/2026/jun/02/manchester-united-tie-up-35m-deal-to-make-ederson-first-signing-of-carrick-reign',
            ],
            [
                'judul' => 'Michael Carrick lanjut sebagai pelatih kepala Manchester United',
                'isi' => 'Manchester United mengumumkan bahwa Michael Carrick melanjutkan perannya sebagai pelatih kepala tim utama pria. Berita ini penting karena memberi kejelasan arah proyek tim setelah masa transisi.

Carrick bukan sosok asing bagi United. Ia pernah menjadi pemain penting di lini tengah dan memahami kultur klub dari dalam. Karena itu, keputusannya bertahan sebagai pelatih kepala langsung memunculkan harapan bahwa United bisa membangun identitas permainan yang lebih stabil.

Fokus berikutnya adalah bagaimana Carrick menyusun skuad. Bursa transfer, pengembangan pemain muda, dan pemilihan struktur lini tengah akan menjadi bagian besar dari pekerjaannya. Penggemar tentu ingin melihat apakah ia mampu menjaga keseimbangan antara hasil cepat dan pembangunan jangka panjang.

Di forum ini, berita Carrick bisa dibahas bersama topik transfer Éderson, masa depan pemain senior, dan peluang pemain akademi masuk ke tim utama.',
                'gambar' => 'mu-manager.svg',
                'status' => 1,
                'is_terbaru' => 1,
                'id_kategori' => 2,
                'sumber_nama' => 'Manchester United Official News',
                'sumber_url' => 'https://www.manutd.com/en/news/michael-carrick-continues-as-man-united-head-coach-2026',
            ],
            [
                'judul' => 'Ronaldo memberi pesan untuk Diogo Dalot: sisi luar lapangan yang tetap menarik bagi fans',
                'isi' => 'Berita tentang Cristiano Ronaldo dan Diogo Dalot menjadi contoh kabar luar lapangan yang tetap menarik bagi penggemar United. Pada halaman berita resmi klub, United menampilkan topik tentang pesan Ronaldo kepada Dalot muda.

Kisah seperti ini tidak membahas statistik pertandingan secara langsung, tetapi tetap punya nilai bagi forum. Ada hubungan antara pemain senior dan pemain yang lebih muda, ada pengaruh figur besar terhadap karier pemain lain, dan ada memori tentang periode Ronaldo di Manchester United.

Dalot sendiri sering dipandang sebagai pemain yang berkembang secara mental dan teknis selama beberapa musim terakhir. Ketika namanya dikaitkan dengan Ronaldo, pembahasan tidak hanya berhenti pada nostalgia, tetapi juga tentang bagaimana pemain muda belajar dari standar profesional pemain besar.

Dalam forum, artikel ini masuk kategori berita luar lapangan karena menyorot sisi personal, relasi antar pemain, dan cerita yang membuat klub terasa lebih dekat dengan penggemar.',
                'gambar' => 'mu-news.svg',
                'status' => 1,
                'is_terbaru' => 1,
                'id_kategori' => 6,
                'sumber_nama' => 'Manchester United Official News',
                'sumber_url' => 'https://www.manutd.com/en/news/how-ronaldo-influenced-the-career-of-dalot',
            ],
            [
                'judul' => 'Academy internationals round-up: pemain muda United tampil di agenda internasional',
                'isi' => 'Manchester United kembali menyorot aktivitas pemain akademi pada agenda internasional. Topik ini penting karena akademi selalu menjadi bagian dari identitas klub, bukan sekadar pelengkap skuad senior.

Pemain muda yang mendapat pengalaman di level internasional biasanya pulang dengan kepercayaan diri dan jam terbang tambahan. Bagi klub sebesar United, perkembangan seperti ini perlu dipantau karena jalur dari akademi menuju tim utama adalah salah satu tradisi yang ingin terus dijaga.

Artikel ini membuka ruang diskusi tentang siapa pemain muda yang paling layak diperhatikan, posisi mana yang sedang punya prospek bagus, dan bagaimana klub sebaiknya memberi menit bermain kepada pemain akademi.

Forum United akan terasa lebih hidup jika tidak hanya membahas transfer mahal, tetapi juga perkembangan talenta sendiri. Karena itu kategori Akademi dibuat khusus agar pembahasan pemain muda tidak tenggelam di antara berita tim utama.',
                'gambar' => 'mu-academy.svg',
                'status' => 1,
                'is_terbaru' => 1,
                'id_kategori' => 8,
                'sumber_nama' => 'Manchester United Official News',
                'sumber_url' => 'https://www.manutd.com/en/news/academy-internationals-round-up',
            ],
            [
                'judul' => 'United Women masuk agenda internasional bulan Juni',
                'isi' => 'Manchester United juga menampilkan kabar tentang pemain United Women yang masuk agenda internasional bulan Juni. Berita seperti ini penting agar forum tidak hanya berfokus pada tim pria.

United Women terus menjadi bagian penting dari identitas klub modern. Ketika pemain klub tampil untuk tim nasional, penggemar dapat mengikuti perkembangan performa mereka di panggung yang berbeda.

Dari sudut pandang forum, topik ini bisa dikembangkan menjadi pembahasan jadwal internasional, kondisi kebugaran pemain, dan bagaimana pengalaman membela negara dapat memengaruhi performa ketika kembali ke klub.

Kategori United Women disiapkan agar pembaca bisa menemukan berita tim wanita dengan mudah, termasuk kabar pertandingan, pemain, transfer, dan agenda internasional.',
                'gambar' => 'mu-women.svg',
                'status' => 1,
                'is_terbaru' => 1,
                'id_kategori' => 9,
                'sumber_nama' => 'Manchester United Official News',
                'sumber_url' => 'https://www.manutd.com/en/news/womens-internationals-whos-playing-in-june-2026',
            ],
            [
                'judul' => 'United mengumumkan nomor punggung pemain untuk Piala Dunia 2026',
                'isi' => 'Salah satu berita terbaru dari situs resmi Manchester United membahas nomor punggung pemain United pada Piala Dunia 2026. Berita seperti ini cocok untuk pembaca yang mengikuti aktivitas pemain klub saat membela negara masing-masing.

Nomor punggung memang tampak sederhana, tetapi bagi penggemar sepak bola detail seperti ini sering memunculkan cerita. Ada pemain yang memakai nomor ikonik, ada yang mendapat nomor berbeda dari klub, dan ada pula yang menjadikan turnamen internasional sebagai panggung pembuktian.

Untuk forum, artikel ini dapat menjadi pintu diskusi tentang pemain United mana yang paling berpeluang tampil menonjol di Piala Dunia. Pembaca juga bisa membahas risiko cedera, jam bermain, dan dampak turnamen terhadap persiapan musim klub.

Konten ini masuk kategori pemain karena fokusnya berada pada aktivitas individual pemain United di luar kompetisi klub.',
                'gambar' => 'mu-news.svg',
                'status' => 1,
                'is_terbaru' => 0,
                'id_kategori' => 3,
                'sumber_nama' => 'Manchester United Official News',
                'sumber_url' => 'https://www.manutd.com/en/news/uniteds-world-cup-2026-shirt-numbers',
            ],
            [
                'judul' => 'Manchester United dan adidas merilis home kit 2026/27',
                'isi' => 'Manchester United dan adidas merilis seragam kandang untuk musim 2026/27. Situs resmi klub menampilkan peluncuran kit baru tersebut sebagai bagian dari identitas visual United untuk musim berikutnya.

Bagi sebagian penggemar, jersey bukan sekadar pakaian pertandingan. Desain, warna, detail, dan sponsor sering menjadi bagian dari percakapan besar karena melekat dengan memori satu musim penuh.

Artikel ini masuk kategori berita luar lapangan karena membahas sisi komersial dan budaya klub. Walaupun tidak berkaitan langsung dengan taktik, peluncuran jersey tetap menjadi momen yang ramai di kalangan fans.

Forum bisa memakai topik ini untuk membahas desain, unsur sejarah, pemain yang cocok menjadi wajah promosi, sampai bagaimana jersey baru biasanya memengaruhi antusiasme penggemar menjelang musim baru.',
                'gambar' => 'mu-news.svg',
                'status' => 1,
                'is_terbaru' => 0,
                'id_kategori' => 6,
                'sumber_nama' => 'Manchester United Official News',
                'sumber_url' => 'https://www.manutd.com/en/news/united-and-adidas-launch-new-home-kit-for-202627-season',
            ],
            [
                'judul' => 'Sejarah singkat Manchester United: dari Newton Heath sampai menjadi raksasa Inggris',
                'isi' => 'Manchester United memiliki sejarah panjang yang dimulai dari Newton Heath sebelum berkembang menjadi salah satu klub paling dikenal di dunia. Perjalanan itu tidak hanya berisi gelar, tetapi juga perubahan nama, stadion, tragedi, kebangkitan, dan generasi pemain yang berbeda.

Sejarah United sering dibahas melalui beberapa fase besar: era awal klub, masa Sir Matt Busby, tragedi Munich, kebangkitan di Eropa, dominasi era Sir Alex Ferguson, hingga periode transisi setelahnya.

Artikel sejarah penting untuk forum karena pembaca baru perlu memahami mengapa klub ini memiliki basis penggemar yang emosional. United bukan hanya soal hasil akhir pertandingan, melainkan juga cerita panjang tentang identitas dan daya tahan klub.

Kategori Sejarah akan dipakai untuk menyimpan artikel tentang Old Trafford, Busby Babes, Class of 92, era Ferguson, dan momen-momen penting lainnya.',
                'gambar' => 'mu-history.svg',
                'status' => 1,
                'is_terbaru' => 0,
                'id_kategori' => 1,
                'sumber_nama' => 'Manchester United History',
                'sumber_url' => 'https://www.manutd.com/en/club/history',
            ],
            [
                'judul' => 'Ruang trofi Manchester United: liga, Eropa, dan piala domestik',
                'isi' => 'Ruang trofi Manchester United menjadi salah satu topik yang tidak pernah habis dibahas oleh penggemar. Klub ini dikenal lewat koleksi gelar liga, piala domestik, dan prestasi di kompetisi Eropa.

Membahas trofi bukan hanya menghitung jumlah gelar. Setiap piala memiliki cerita sendiri: siapa manajernya, siapa pemain kuncinya, bagaimana jalannya musim, dan momen apa yang paling diingat fans.

Dalam forum, kategori Trofi bisa dikembangkan menjadi pembahasan per era. Misalnya gelar-gelar masa Sir Matt Busby, dominasi Premier League di bawah Sir Alex Ferguson, sampai pencapaian piala domestik pada era modern.

Artikel ini menjadi pengantar agar pembaca punya halaman awal sebelum masuk ke pembahasan yang lebih detail tentang musim dan kompetisi tertentu.',
                'gambar' => 'mu-trophy.svg',
                'status' => 1,
                'is_terbaru' => 0,
                'id_kategori' => 4,
                'sumber_nama' => 'Manchester United Trophy Room',
                'sumber_url' => 'https://www.manutd.com/en/club/history/trophy-room',
            ],
        ];

        foreach ($articles as $article) {
            $existing = $model->where('judul', $article['judul'])->first();
            $article['slug'] = url_title($article['judul'], '-', true);

            if (! $existing) {
                $model->insert($article);
            } else {
                // Jika data awal sudah pernah dibuat, tetap sinkronkan pilihan Artikel Terbaru.
                $model->update($existing['id'], [
                    'is_terbaru' => $article['is_terbaru'] ?? 0,
                ]);
            }
        }
    }
}
