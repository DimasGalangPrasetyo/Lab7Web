CREATE DATABASE IF NOT EXISTS lab_ci4 CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE lab_ci4;

DROP TABLE IF EXISTS artikel;
DROP TABLE IF EXISTS kategori;
DROP TABLE IF EXISTS user;

CREATE TABLE user (
    id INT(11) UNSIGNED AUTO_INCREMENT,
    username VARCHAR(200) NOT NULL,
    useremail VARCHAR(200),
    userpassword VARCHAR(200),
    PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE kategori (
    id_kategori INT(11) UNSIGNED AUTO_INCREMENT,
    nama_kategori VARCHAR(100) NOT NULL,
    slug_kategori VARCHAR(100),
    PRIMARY KEY(id_kategori)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE artikel (
    id INT(11) UNSIGNED AUTO_INCREMENT,
    judul VARCHAR(200) NOT NULL,
    isi TEXT,
    gambar VARCHAR(200),
    status TINYINT(1) DEFAULT 0,
    is_terbaru TINYINT(1) DEFAULT 0,
    slug VARCHAR(200),
    id_kategori INT(11) UNSIGNED NULL,
    sumber_nama VARCHAR(200) NULL,
    sumber_url VARCHAR(255) NULL,
    created_at DATETIME NULL,
    updated_at DATETIME NULL,
    PRIMARY KEY(id),
    CONSTRAINT fk_kategori_artikel FOREIGN KEY (id_kategori) REFERENCES kategori(id_kategori) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO user (username, useremail, userpassword) VALUES
('admin', 'admin@email.com', '$2y$12$iB99.5rU3XfMnMf4juv8XOwtBlzbPZVX/vP.JExihsZlay15jOHk.');

INSERT INTO kategori (id_kategori, nama_kategori, slug_kategori) VALUES
(1, 'Sejarah', 'sejarah'),
(2, 'Manajer', 'manajer'),
(3, 'Pemain', 'pemain'),
(4, 'Trofi', 'trofi'),
(5, 'Berita Lapangan', 'berita-lapangan'),
(6, 'Berita Luar Lapangan', 'berita-luar-lapangan'),
(7, 'Transfer', 'transfer'),
(8, 'Akademi', 'akademi'),
(9, 'United Women', 'united-women');

INSERT INTO artikel (judul, isi, gambar, status, is_terbaru, slug, id_kategori, sumber_nama, sumber_url, created_at, updated_at) VALUES
('Transfer news: Rasmus Højlund resmi bergabung permanen dengan Napoli', 'Rasmus Højlund resmi meninggalkan Manchester United dan bergabung permanen dengan Napoli. Kabar ini menjadi salah satu berita transfer utama karena Højlund sebelumnya datang ke Old Trafford dengan ekspektasi besar sebagai penyerang muda masa depan.

Reuters melaporkan bahwa Napoli menuntaskan transfer permanen setelah masa peminjaman yang sukses. Pada musim terakhirnya bersama Napoli, Højlund mencetak 16 gol dari 44 penampilan di semua kompetisi, ikut membantu klub itu meraih Supercoppa Italiana dan finis sebagai runner-up Serie A.

Bagi United, kepindahan ini membuka diskusi baru tentang arah lini depan. Dana hasil penjualan bisa menjadi ruang untuk memperkuat posisi lain, tetapi di sisi lain penggemar juga akan menilai apakah klub terlalu cepat melepas penyerang yang masih berusia muda.

Dalam forum, topik ini bisa dibahas dari beberapa sudut: performa Højlund selama di Manchester, kebutuhan penyerang baru, dan bagaimana strategi transfer United setelah melepas pemain yang pernah menjadi bagian skuad juara FA Cup 2024.', 'mu-transfer.svg', 1, 1, 'transfer-news-rasmus-hojlund-resmi-bergabung-permanen-dengan-napoli', 7, 'Reuters', 'https://www.reuters.com/sports/soccer/napoli-sign-hojlund-man-united-after-loan-spell-2026-06-03/', NOW(), NOW()),
('Laporan Guardian: United mencapai kesepakatan untuk mendatangkan Éderson dari Atalanta', 'Manchester United dikabarkan telah mencapai kesepakatan dengan Atalanta untuk transfer gelandang Brasil, Éderson. Laporan The Guardian menyebut nilai awal kesepakatan berada di kisaran 40,5 juta euro, dengan tambahan bonus yang dapat membuat totalnya naik.

Éderson dipandang sebagai pemain yang cocok untuk kebutuhan lini tengah United karena memiliki energi, kemampuan membaca permainan, dan mobilitas dari area bertahan ke menyerang. Tipe seperti ini penting apabila United ingin memperbaiki keseimbangan antara pressing, transisi, dan perlindungan lini belakang.

Kedatangan Éderson juga menarik karena dikaitkan dengan perubahan era kepelatihan Michael Carrick. Jika transfer ini benar-benar selesai, ia dapat menjadi salah satu fondasi awal dalam pembentukan skuad baru.

Topik diskusi forum: apakah Éderson lebih cocok menjadi gelandang bertahan, gelandang box-to-box, atau bagian dari double pivot? Penggemar juga bisa membandingkan profilnya dengan opsi gelandang lain yang sering dikaitkan dengan United.', 'mu-transfer.svg', 1, 1, 'laporan-guardian-united-mencapai-kesepakatan-untuk-mendatangkan-ederson-dari-atalanta', 7, 'The Guardian', 'https://www.theguardian.com/sport/2026/jun/02/manchester-united-tie-up-35m-deal-to-make-ederson-first-signing-of-carrick-reign', NOW(), NOW()),
('Michael Carrick lanjut sebagai pelatih kepala Manchester United', 'Manchester United mengumumkan bahwa Michael Carrick melanjutkan perannya sebagai pelatih kepala tim utama pria. Berita ini penting karena memberi kejelasan arah proyek tim setelah masa transisi.

Carrick bukan sosok asing bagi United. Ia pernah menjadi pemain penting di lini tengah dan memahami kultur klub dari dalam. Karena itu, keputusannya bertahan sebagai pelatih kepala langsung memunculkan harapan bahwa United bisa membangun identitas permainan yang lebih stabil.

Fokus berikutnya adalah bagaimana Carrick menyusun skuad. Bursa transfer, pengembangan pemain muda, dan pemilihan struktur lini tengah akan menjadi bagian besar dari pekerjaannya. Penggemar tentu ingin melihat apakah ia mampu menjaga keseimbangan antara hasil cepat dan pembangunan jangka panjang.

Di forum ini, berita Carrick bisa dibahas bersama topik transfer Éderson, masa depan pemain senior, dan peluang pemain akademi masuk ke tim utama.', 'mu-manager.svg', 1, 1, 'michael-carrick-lanjut-sebagai-pelatih-kepala-manchester-united', 2, 'Manchester United Official News', 'https://www.manutd.com/en/news/michael-carrick-continues-as-man-united-head-coach-2026', NOW(), NOW()),
('Ronaldo memberi pesan untuk Diogo Dalot: sisi luar lapangan yang tetap menarik bagi fans', 'Berita tentang Cristiano Ronaldo dan Diogo Dalot menjadi contoh kabar luar lapangan yang tetap menarik bagi penggemar United. Pada halaman berita resmi klub, United menampilkan topik tentang pesan Ronaldo kepada Dalot muda.

Kisah seperti ini tidak membahas statistik pertandingan secara langsung, tetapi tetap punya nilai bagi forum. Ada hubungan antara pemain senior dan pemain yang lebih muda, ada pengaruh figur besar terhadap karier pemain lain, dan ada memori tentang periode Ronaldo di Manchester United.

Dalot sendiri sering dipandang sebagai pemain yang berkembang secara mental dan teknis selama beberapa musim terakhir. Ketika namanya dikaitkan dengan Ronaldo, pembahasan tidak hanya berhenti pada nostalgia, tetapi juga tentang bagaimana pemain muda belajar dari standar profesional pemain besar.

Dalam forum, artikel ini masuk kategori berita luar lapangan karena menyorot sisi personal, relasi antar pemain, dan cerita yang membuat klub terasa lebih dekat dengan penggemar.', 'mu-news.svg', 1, 1, 'ronaldo-memberi-pesan-untuk-diogo-dalot-sisi-luar-lapangan-yang-tetap-menarik-bagi-fans', 6, 'Manchester United Official News', 'https://www.manutd.com/en/news/how-ronaldo-influenced-the-career-of-dalot', NOW(), NOW()),
('Academy internationals round-up: pemain muda United tampil di agenda internasional', 'Manchester United kembali menyorot aktivitas pemain akademi pada agenda internasional. Topik ini penting karena akademi selalu menjadi bagian dari identitas klub, bukan sekadar pelengkap skuad senior.

Pemain muda yang mendapat pengalaman di level internasional biasanya pulang dengan kepercayaan diri dan jam terbang tambahan. Bagi klub sebesar United, perkembangan seperti ini perlu dipantau karena jalur dari akademi menuju tim utama adalah salah satu tradisi yang ingin terus dijaga.

Artikel ini membuka ruang diskusi tentang siapa pemain muda yang paling layak diperhatikan, posisi mana yang sedang punya prospek bagus, dan bagaimana klub sebaiknya memberi menit bermain kepada pemain akademi.

Forum United akan terasa lebih hidup jika tidak hanya membahas transfer mahal, tetapi juga perkembangan talenta sendiri. Karena itu kategori Akademi dibuat khusus agar pembahasan pemain muda tidak tenggelam di antara berita tim utama.', 'mu-academy.svg', 1, 1, 'academy-internationals-round-up-pemain-muda-united-tampil-di-agenda-internasional', 8, 'Manchester United Official News', 'https://www.manutd.com/en/news/academy-internationals-round-up', NOW(), NOW()),
('United Women masuk agenda internasional bulan Juni', 'Manchester United juga menampilkan kabar tentang pemain United Women yang masuk agenda internasional bulan Juni. Berita seperti ini penting agar forum tidak hanya berfokus pada tim pria.

United Women terus menjadi bagian penting dari identitas klub modern. Ketika pemain klub tampil untuk tim nasional, penggemar dapat mengikuti perkembangan performa mereka di panggung yang berbeda.

Dari sudut pandang forum, topik ini bisa dikembangkan menjadi pembahasan jadwal internasional, kondisi kebugaran pemain, dan bagaimana pengalaman membela negara dapat memengaruhi performa ketika kembali ke klub.

Kategori United Women disiapkan agar pembaca bisa menemukan berita tim wanita dengan mudah, termasuk kabar pertandingan, pemain, transfer, dan agenda internasional.', 'mu-women.svg', 1, 1, 'united-women-masuk-agenda-internasional-bulan-juni', 9, 'Manchester United Official News', 'https://www.manutd.com/en/news/womens-internationals-whos-playing-in-june-2026', NOW(), NOW()),
('United mengumumkan nomor punggung pemain untuk Piala Dunia 2026', 'Salah satu berita terbaru dari situs resmi Manchester United membahas nomor punggung pemain United pada Piala Dunia 2026. Berita seperti ini cocok untuk pembaca yang mengikuti aktivitas pemain klub saat membela negara masing-masing.

Nomor punggung memang tampak sederhana, tetapi bagi penggemar sepak bola detail seperti ini sering memunculkan cerita. Ada pemain yang memakai nomor ikonik, ada yang mendapat nomor berbeda dari klub, dan ada pula yang menjadikan turnamen internasional sebagai panggung pembuktian.

Untuk forum, artikel ini dapat menjadi pintu diskusi tentang pemain United mana yang paling berpeluang tampil menonjol di Piala Dunia. Pembaca juga bisa membahas risiko cedera, jam bermain, dan dampak turnamen terhadap persiapan musim klub.

Konten ini masuk kategori pemain karena fokusnya berada pada aktivitas individual pemain United di luar kompetisi klub.', 'mu-news.svg', 1, 0, 'united-mengumumkan-nomor-punggung-pemain-untuk-piala-dunia-2026', 3, 'Manchester United Official News', 'https://www.manutd.com/en/news/uniteds-world-cup-2026-shirt-numbers', NOW(), NOW()),
('Manchester United dan adidas merilis home kit 2026/27', 'Manchester United dan adidas merilis seragam kandang untuk musim 2026/27. Situs resmi klub menampilkan peluncuran kit baru tersebut sebagai bagian dari identitas visual United untuk musim berikutnya.

Bagi sebagian penggemar, jersey bukan sekadar pakaian pertandingan. Desain, warna, detail, dan sponsor sering menjadi bagian dari percakapan besar karena melekat dengan memori satu musim penuh.

Artikel ini masuk kategori berita luar lapangan karena membahas sisi komersial dan budaya klub. Walaupun tidak berkaitan langsung dengan taktik, peluncuran jersey tetap menjadi momen yang ramai di kalangan fans.

Forum bisa memakai topik ini untuk membahas desain, unsur sejarah, pemain yang cocok menjadi wajah promosi, sampai bagaimana jersey baru biasanya memengaruhi antusiasme penggemar menjelang musim baru.', 'mu-news.svg', 1, 0, 'manchester-united-dan-adidas-merilis-home-kit-2026-27', 6, 'Manchester United Official News', 'https://www.manutd.com/en/news/united-and-adidas-launch-new-home-kit-for-202627-season', NOW(), NOW()),
('Sejarah singkat Manchester United: dari Newton Heath sampai menjadi raksasa Inggris', 'Manchester United memiliki sejarah panjang yang dimulai dari Newton Heath sebelum berkembang menjadi salah satu klub paling dikenal di dunia. Perjalanan itu tidak hanya berisi gelar, tetapi juga perubahan nama, stadion, tragedi, kebangkitan, dan generasi pemain yang berbeda.

Sejarah United sering dibahas melalui beberapa fase besar: era awal klub, masa Sir Matt Busby, tragedi Munich, kebangkitan di Eropa, dominasi era Sir Alex Ferguson, hingga periode transisi setelahnya.

Artikel sejarah penting untuk forum karena pembaca baru perlu memahami mengapa klub ini memiliki basis penggemar yang emosional. United bukan hanya soal hasil akhir pertandingan, melainkan juga cerita panjang tentang identitas dan daya tahan klub.

Kategori Sejarah akan dipakai untuk menyimpan artikel tentang Old Trafford, Busby Babes, Class of 92, era Ferguson, dan momen-momen penting lainnya.', 'mu-history.svg', 1, 0, 'sejarah-singkat-manchester-united-dari-newton-heath-sampai-menjadi-raksasa-inggris', 1, 'Manchester United History', 'https://www.manutd.com/en/club/history', NOW(), NOW()),
('Ruang trofi Manchester United: liga, Eropa, dan piala domestik', 'Ruang trofi Manchester United menjadi salah satu topik yang tidak pernah habis dibahas oleh penggemar. Klub ini dikenal lewat koleksi gelar liga, piala domestik, dan prestasi di kompetisi Eropa.

Membahas trofi bukan hanya menghitung jumlah gelar. Setiap piala memiliki cerita sendiri: siapa manajernya, siapa pemain kuncinya, bagaimana jalannya musim, dan momen apa yang paling diingat fans.

Dalam forum, kategori Trofi bisa dikembangkan menjadi pembahasan per era. Misalnya gelar-gelar masa Sir Matt Busby, dominasi Premier League di bawah Sir Alex Ferguson, sampai pencapaian piala domestik pada era modern.

Artikel ini menjadi pengantar agar pembaca punya halaman awal sebelum masuk ke pembahasan yang lebih detail tentang musim dan kompetisi tertentu.', 'mu-trophy.svg', 1, 0, 'ruang-trofi-manchester-united-liga-eropa-dan-piala-domestik', 4, 'Manchester United Trophy Room', 'https://www.manutd.com/en/club/history/trophy-room', NOW(), NOW());
