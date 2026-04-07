# PRAKTIKUM CODEIGNITER 4

Praktikum ini berisi tutorial atau pengenalan framework codeigniter untuk mengembangkan atau membuat web dasar

## Praktikum 1

Untuk langkah awal kita akan mempersiapkan alat dan bahan yang diperlukan untuk praktikum ini.

### Alat dan bahan
unduh dan install alat dan bahan terlebih dahulu

* Visual Studio code [link download](https://code.visualstudio.com/download)
* XAMPP [Link download](https://www.apachefriends.org/download.html)
* Composer [Link download](https://getcomposer.org/download/)
* 


### Langkah-langkah praktikum
setelah alat dan bahan selesai diinstall selanjutnya adalah mempersiapkannya

#### Persiapan XAMPP
Tampilan XAMPP setelah diunduh dan berhasil dinstall atau XAMPP control panel
<img width="1366" height="768" alt="tampilan xampp" src="https://github.com/user-attachments/assets/22e2a96b-df2b-46f4-bd9e-417a7d53f7f3" />


---
Langkah pertama adalah mempersiapkan XAMPP agar framework dapat digunakan. Ada beberapa ekstensi yang perlu diaktifkan sebelum framework digunakan, untuk mengaktifkannya kita perlu menuju ke **Config > php.ini**
<img width="1366" height="768" alt="xampp setup" src="https://github.com/user-attachments/assets/3d0fe253-9ded-4851-b2e6-7e05cfaca2d2" />


---
Hapus tanda ";" yang berada didepan ekstensi untuk mengaktifkan, aktifkan ekstensi yang diperlukan untuk kebutuhan framework
<img width="1366" height="768" alt="php ini" src="https://github.com/user-attachments/assets/a46087c8-bcf7-448a-b424-18220e024989" />


---
#### Instalasi CodeIgniter 4
Setelah persiapan XAMPP selesai sekarang saat nya memepersiapkan framework. Ada 2 cara untuk menginstall Codeigniter, yaitu dengan cara mengunduh Codeigniter dari situs web resminya dan dengan menginstallnya menggunakan composer. Pada praktikum ini saya akan menginstall menggunakan composer.
* Pertama kalian buat folder **Praktikum_CI4** pada direktori htcos kalian. Tempatnya berada di **XAMPP > htdocs***
* Kedua buka folder yang sudah kalian buat di codeigniter, lalu buka terminal vs code. Ketik perintah ini untuk menginstall Codeigniter
```
composer create-project codeigniter4/appstarter nama-proyek
```
Tunggu hingga proses instalasi selesai dan framework siap
<img width="1365" height="767" alt="install ci4 dari composer" src="https://github.com/user-attachments/assets/95b1072b-1a29-46b6-bc40-7117aa0d320b" />


---
#### Mengaktifkan mode debugging
Ini adalah fitur yang disediakan oleh CodeIgniter 4 untuk mempermudah memperbaiki error pada code
<img width="1321" height="692" alt="tanpa mode debugging" src="https://github.com/user-attachments/assets/906c2b16-dbff-49c6-b90b-497e33004442" />


---
Untuk mengaktifkannya kalian perlu ubah nama file **env** menjadi **.env**. Jika sudah kalian buka lalu cari CI_ENVIRINMENT ubah menjadi development. Maka hasilnya akan menunjukkan pesan error jika tejadi anomali pada code
<img width="1321" height="692" alt="mode debugging" src="https://github.com/user-attachments/assets/8509dcc4-e16c-4b17-b4ff-91c1f2b45cdd" />


---
#### Memahami MVC
Apa itu MVC? MVC adalah kepanjangan dari Model, View dan Controller. Mereka ini adalah arsitektur atau pondasi utama dalam pengembagan aplikasi, tugas nya adalah memisahkan code berdasarkan logic controll, model data, dan tampilan.

* Model
Merupakan kode program yang isinya pemodelan data. Biasanya berupa data daei database
* View
View menangani bagian depan atau tampilan program
* Controller
Berisi code program yang berkaitan dengan logic proses. Bisa dibilang disinilah otak dari sebuah proses program


#### Routing
Routing berfungsi untuk mengatur jalur atau rute dari request yang akan digunakan pada program aplikasi. Roiting juga yang menentukan controller mana yang bisa menerima request.

#### Penerapan MVC & Routing
Pertama buka directori **app/config/routes.php** lalu tambahkan code berikut
```
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
```
Kedua tambahkan code berikut di direktori app/controller buat file page.php
```
<?php
namespace App\Controllers;
class Page extends BaseController
{
 public function about()
 {
    return view('about', [
    'title' => 'Halaman Abot',
    'content' => 'Ini adalah halaman abaut yang menjelaskan tentang isi
    halaman ini.'
 ]); }
 public function contact()
 {
 echo "Ini halaman Contact";
 }
 public function faqs()
 {
 echo "Ini halaman FAQ";
 }
 public function tos()
 {
 echo "ini halaman Term of Services";
 }
}
```
Ketiga pergi kedirektori app/views buat folder tamplate, lalu buat file header.php
```
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title><?= $title; ?></title>
 <link rel="stylesheet" href="<?= base_url('/style.css');?>">
</head>
<body>
 <div id="container">
 <header>
 <h1>Layout Sederhana</h1>
 </header>
 <nav>
 <a href="<?= base_url('/');?>" class="active">Home</a>
 <a href="<?= base_url('/artikel');?>">Artikel</a>
 <a href="<?= base_url('/about');?>">About</a>
 <a href="<?= base_url('/contact');?>">Kontak</a>
 </nav>
 <section id="wrapper">
 <section id="main">
```
lalu buat file footer.php
```
</section>
 <aside id="sidebar">
 <div class="widget-box">
 <h3 class="title">Widget Header</h3>
 <ul>
 <li><a href="#">Widget Link</a></li>
 <li><a href="#">Widget Link</a></li>
 </ul>
 </div>
 <div class="widget-box">
 <h3 class="title">Widget Text</h3>
 <p>Vestibulum lorem elit, iaculis in nisl volutpat,
malesuada tincidunt arcu. Proin in leo fringilla, vestibulum mi porta,
faucibus felis. Integer pharetra est nunc, nec pretium nunc pretium ac.</p>
 </div>
 </aside>
 </section>
 <footer>
 <p>&copy; 2021 - Universitas Pelita Bangsa</p>
 </footer>
 </div>
</body>
</html>
```
masih di tempat yang sama app/views buat file about.php
```
<!DOCTYPE html>
<html lang="en">
<head>
 <?= $this->include('template/header'); ?>
<h1><?= $title; ?></h1>
<hr>
<p><?= $content; ?></p>
<?= $this->include('template/footer'); ?>
</body>
</html>
```


Hasil akan menampilkan halaman ini
<img width="1321" height="692" alt="Hasil praktikum 1" src="https://github.com/user-attachments/assets/97d5f0f1-9ae3-441b-8c85-d86a2640aaed" />


---


## Praktikum 2

Pada praktikum 2 ini kita akan membuat database dan tabel serta menghubungkannya menggunakan .env

Kita juga akan menambahkan atau menyesuaikan MVC dan routing yang sudah kita buat kemarin, juga membuat crud admin

### Membuat database & Tabel

buka control panel xampp, lalu pada menu control panel start atau jalankan apche dan mysql. Lalu tekan admin pada pilihan menu mysql, tunggu sebentar dan akan terbuka phpmyadmin dibrowser. Selanjutnya pilih sql pada menu diatas phpmyadmin lalu ketik
```
CREATE DATABASE lab_ci4;
```
Kemudian database akan dibuat dan akan muncul disidebar menu, pilih database lalu pilih kembali sql pada menu diatas kemudian ketik
```
CREATE TABLE artikel (
 id INT(11) auto_increment,
 judul VARCHAR(200) NOT NULL,
 isi TEXT,
 gambar VARCHAR(200),
 status TINYINT(1) DEFAULT 0,
 slug VARCHAR(200),
 PRIMARY KEY(id)
);
```
Tabel sudah dibuat, sekarang saatnya menghubungkan menggunakan .env. Buka kembali project Praktikum_CI4 di vs code, buka file .env lalu hapus tanda pagar (#) pada bagian database dan isi kolom sesuai database yang dibuat
<img width="389" height="149" alt="menghubungkan database" src="https://github.com/user-attachments/assets/73b96653-8331-4a95-813f-20eb8aada86b" />


---

### Membuat model
Buat artikel.php pada dirktori app/models. Pastikam penamaan dalam model sesuai dengan penamaan pada tabel
```
<?php
namespace App\Models;
use CodeIgniter\Model;
class ArtikelModel extends Model
{
 protected $table = 'artikel';
 protected $primaryKey = 'id';
 protected $useAutoIncrement = true;
 protected $allowedFields = ['judul', 'isi', 'status', 'slug',
'gambar'];
}
```

### Membuat controller
Sekarang kita buat controllernya, buat artikel.php pada direktori app/controller. Jangan lupa masukkan model yang sudah dibuat tadi
```
<?php
namespace App\Controllers;
use App\Models\ArtikelModel;
class Artikel extends BaseController
{
 public function index()
 {
 $title = 'Daftar Artikel';
 $model = new ArtikelModel();
 $artikel = $model->findAll();
 return view('artikel/index', compact('artikel', 'title'));
 }
 public function view($slug)
 {
 $model = new ArtikelModel();
 $artikel = $model->where([
 'slug' => $slug
 ])->first();
 // Menampilkan error apabila data tidak ada.
 if (!$artikel)
 {
 throw PageNotFoundException::forPageNotFound();
 }
 $title = $artikel['judul'];
 return view('artikel/detail', compact('artikel', 'title'));
 }
}

```

### Membuat view
sekarang agar model dan controller bisa terlihat fungsinya kita buat viewnya. Buat folder artikel di app/views, lalu buat index.php pada direktori app/views/artikel
```
<?= $this->include('template/header'); ?>
<?php if($artikel): foreach($artikel as $row): ?>
<article class="entry">
 <h2><a href="<?= base_url('/artikel/' . $row['slug']);?>"><?=
$row['judul']; ?></a>
</h2>
 <img src="<?= base_url('/gambar/' . $row['gambar']);?>" alt="<?=
$row['judul']; ?>">
 <p><?= substr($row['isi'], 0, 200); ?></p>
</article>
<hr class="divider" />
<?php endforeach; else: ?>
<article class="entry">
 <h2>Belum ada data.</h2>
</article>
<?php endif; ?>
<?= $this->include('template/footer'); ?>
```
<img width="1321" height="692" alt="modul_praktikum2" src="https://github.com/user-attachments/assets/0138efae-9d96-4b79-b1a3-8709fc63f798" />


---

Belum ada berita atau belum ada isi yang bisa ditampilkan. Kita isi dulu agar menampilkan berita atau artikel, buka kembali phpmyadmin, buka database lab_ci4, buka tabel artikel, pilih sql pada menu diatas
```
INSERT INTO artikel (judul, isi, slug) VALUE
('Artikel pertama', 'dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah
menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak
yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk
menjadi sebuah buku contoh huruf.', 'artikel-pertama'),
('Artikel kedua', 'Tidak seperti anggapan banyak orang, Lorem Ipsum
bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin
klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah
mencapai lebih dari 2000 tahun.', 'artikel-kedua');
```
refresh halaman, sekarang berita akan ditampilkan berdasarkan isi yang dimasukkan tadi. Klo error berarti kalian ada typo dipenamaanya
<img width="1321" height="692" alt="sudah diisi" src="https://github.com/user-attachments/assets/59adba34-a922-4912-9899-79fc4546a1b7" />


---

### Buat view tampilan detail artikel
Buat detail.php pada direktori app/views/artikel
```
<?= $this->include('template/header'); ?>
<article class="entry">
 <h2><?= $artikel['judul']; ?></h2>
 <img src="<?= base_url('/gambar/' . $artikel['gambar']);?>" alt="<?=
$artikel['judul']; ?>">
 <p><?= $artikel['isi']; ?></p>
</article>
<?= $this->include('template/footer'); ?>
```

### Menambahkan routing
tambahkan routing atau jalur untuk halaman detail
```
$routes->get('/artikel/(:any)', 'Artikel::view/$1');
```
<img width="1321" height="692" alt="detail artikel" src="https://github.com/user-attachments/assets/2a847062-b428-4734-b742-cca3e7672f87" />


---

### Membuat crud admin
buat method baru untuk admin pada controller artikel
```
public function admin_index()
 {
 $title = 'Daftar Artikel';
 $model = new ArtikelModel();
 $artikel = $model->findAll();
 return view('artikel/admin_index', compact('artikel', 'title'));
 }
```

kemudian buat admin_index.php untuk tampilan admin pada direktori app/views/artikel
```
<?= $this->include('template/header'); ?>
<table class="table">
 <thead>
 <tr>
 <th>ID</th>
 <th>Judul</th>
 <th>Status</th>
 <th>AKsi</th>
 </tr>
 </thead>
 <tbody>
 <?php if($artikel): foreach($artikel as $row): ?>
 <tr>
 <td><?= $row['id']; ?></td>
 <td>
 <b><?= $row['judul']; ?></b>
 <p><small><?= substr($row['isi'], 0, 50); ?></small></p>
 </td>
 <td><?= $row['status']; ?></td>
 <td>
 <a class="btn" href="<?= base_url('/admin/artikel/edit/' .
$row['id']);?>">Ubah</a>
 <a class="btn btn-danger" onclick="return confirm('Yakin
menghapus data?');" href="<?= base_url('/admin/artikel/delete/' .
$row['id']);?>">Hapus</a>
 </td>
 </tr>
 <?php endforeach; else: ?>
 <tr>
 <td colspan="4">Belum ada data.</td>
 </tr>
 <?php endif; ?>
 </tbody>
 <tfoot>
 <tr>
 <th>ID</th>
 <th>Judul</th>
 <th>Status</th>
 <th>AKsi</th>
 </tr>
 </tfoot>
</table>
<?= $this->include('template/footer'); ?>
```
kemudian tambahkan routingnya
```
$routes->group('admin', function($routes) {
$routes->get('artikel', 'Artikel::admin_index');
$routes->add('artikel/add', 'Artikel::add');
$routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
$routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
});
```
<img width="1321" height="692" alt="admin crud" src="https://github.com/user-attachments/assets/520a340a-e334-48c2-861a-6696865b3ca3" />



---
sekarag buat untuk menambahkan berita, tambahkan di controller artikel
```
public function add()
 {
 // validasi data.
 $validation = \Config\Services::validation();
 $validation->setRules(['judul' => 'required']);
 $isDataValid = $validation->withRequest($this->request)->run();
 if ($isDataValid)
 {
 $artikel = new ArtikelModel();
 $artikel->insert([
 'judul' => $this->request->getPost('judul'),
 'isi' => $this->request->getPost('isi'),
 'slug' => url_title($this->request->getPost('judul')),
 ]);
 return redirect('admin/artikel');
 }
 $title = "Tambah Artikel";
 return view('artikel/form_add', compact('title'));
 }
```
lalu, buat viewnya add.php pada direktori app/view/artikel
```
<?= $this->include('template/admin_header'); ?>
<h2><?= $title; ?></h2>
<form action="" method="post">
 <p>
 <input type="text" name="judul">
 </p>
 <p>
 <textarea name="isi" cols="50" rows="10"></textarea>
 </p>
 <p><input type="submit" value="Kirim" class="btn btn-large"></p>
</form>
<?= $this->include('template/admin_footer'); ?>
```
<img width="1321" height="692" alt="tambah artikel" src="https://github.com/user-attachments/assets/008b5e55-4ffc-43e4-afd6-21820b15e3b1" />



---

sekarang crud ubah data, tambahkan pada controller artikel
```
public function edit($id)
 {
 $artikel = new ArtikelModel();
 // validasi data.
 $validation = \Config\Services::validation();
 $validation->setRules(['judul' => 'required']);
 $isDataValid = $validation->withRequest($this->request)->run();
 if ($isDataValid)
 {
 $artikel->update($id, [
 'judul' => $this->request->getPost('judul'),
 'isi' => $this->request->getPost('isi'),
 ]);
 return redirect('admin/artikel');
 }
 // ambil data lama
 $data = $artikel->where('id', $id)->first();
 $title = "Edit Artikel";
 return view('artikel/edit', compact('title', 'data'));
 }
```
sekarang buat viewnya edit.php pada direktori app/views/artikel
```
<?= $this->include('template/header'); ?>
<h2><?= $title; ?></h2>
<form action="" method="post">
 <p>
 <input type="text" name="judul" value="<?= $data['judul'];?>" >
 </p>
 <p>
 <textarea name="isi" cols="50" rows="10"><?=
$data['isi'];?></textarea>
 </p>
 <p><input type="submit" value="Kirim" class="btn btn-large"></p>
</form>
<?= $this->include('template/footer'); ?>
```
<img width="1321" height="692" alt="edit artikel" src="https://github.com/user-attachments/assets/8602af10-a074-4cea-895e-56c5c5e024f2" />


---
tambahkan method untuk menghapus data di controller artikel
```
public function delete($id)
 {
 $artikel = new ArtikelModel();
 $artikel->delete($id);
 return redirect('admin/artikel');
 }
```


`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 8.2 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - The end of life date for PHP 8.1 was December 31, 2025.
> - If you are still using below PHP 8.2, you should upgrade immediately.
> - The end of life date for PHP 8.2 will be December 31, 2026.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
