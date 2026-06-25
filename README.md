# MU Forum CI4 - Praktikum 1 sampai 14

Tema proyek: **Forum Manchester United**.

Paket ini dibuat untuk ditempelkan ke project CodeIgniter 4 yang sudah dibuat dengan Composer. Folder `vendor/` tidak disertakan.

## Isi Paket

```text
app/
public/
lab8_vuejs/
database.sql
env_contoh_ci4.txt
README.md
```

## URL Backend CI4

- Public: `http://localhost:8080/`
- Admin: `http://localhost:8080/admin`
- Login Admin MVC: `http://localhost:8080/admin/login`
- REST API Artikel: `http://localhost:8080/post`
- REST API Login SPA: `http://localhost:8080/api/login`

## Login Admin

Akun ini bisa dipakai untuk login admin MVC dan login SPA VueJS.

```text
Email    : admin@email.com
Password : admin123
```

## Cara Pasang Backend CI4

1. Ekstrak isi ZIP ini ke folder project CI4 kamu.
2. Pastikan file `.env` mengarah ke database `lab_ci4`.
3. Contoh konfigurasi ada di `env_contoh_ci4.txt`.
4. Jalankan salah satu pilihan database berikut.

### Pilihan A - Pakai Migration + Seeder

```bash
php spark migrate
php spark db:seed DatabaseSeeder
php spark serve
```

### Pilihan B - Import Manual

Import file:

```text
database.sql
```

ke phpMyAdmin atau MySQL. File ini sudah membuat database `lab_ci4`, tabel `user`, `kategori`, dan `artikel`, beserta data awal.

> Pilih salah satu saja: Migration + Seeder atau import `database.sql`.

## Cara Menjalankan VueJS SPA Praktikum 12-14

Folder frontend ada di:

```text
lab8_vuejs/
```

Buka file berikut di browser:

```text
lab8_vuejs/index.html
```

Pastikan server CI4 masih berjalan:

```bash
php spark serve
```

Endpoint API yang dipakai di VueJS:

```text
http://localhost:8080/post
http://localhost:8080/api/login
```

Menu SPA yang tersedia:

- Beranda: `#/`
- Login: `#/login`
- Kelola Artikel: `#/artikel` — diproteksi login
- About: `#/about` — diproteksi login sesuai tugas Praktikum 13

Perpindahan menu menggunakan `router-link` dan isi halaman tampil melalui `router-view`, sehingga halaman tidak melakukan hard-reload.

## Update Praktikum 13 - VueJS Autentikasi dan Navigation Guards

Tambahan backend:

```text
app/Controllers/Api/Auth.php
```

Route baru:

```php
$routes->post('api/login', 'Api\\Auth::login');
```

Tambahan frontend:

```text
lab8_vuejs/assets/js/components/Login.js
```

Perubahan utama:

- Login SPA memakai endpoint `POST /api/login`.
- Jika login berhasil, server mengirim token.
- Token disimpan ke `localStorage` sebagai `userToken`.
- Status login disimpan sebagai `isLoggedIn`.
- Route `/artikel` dan `/about` diberi `meta: { requiresAuth: true }`.
- `router.beforeEach()` menolak akses jika user belum login.
- Menu menampilkan Login saat belum login dan Logout setelah login.

Skenario uji:

1. Bersihkan localStorage browser.
2. Buka `#/artikel` atau `#/about`.
3. Sistem menampilkan alert dan mengalihkan ke `#/login`.
4. Login dengan `admin@email.com / admin123`.
5. Sistem masuk ke halaman Kelola Artikel.
6. Klik Logout untuk menghapus token dan status login.

## Update Praktikum 14 - Keamanan API dan Axios Interceptors

Tambahan backend:

```text
app/Filters/ApiAuthFilter.php
```

Filter baru didaftarkan di:

```text
app/Config/Filters.php
```

Alias filter:

```php
'apiauth' => ApiAuthFilter::class,
```

Route API yang diproteksi:

```php
$routes->post('post', 'Post::create', ['filter' => 'apiauth']);
$routes->put('post/(:num)', 'Post::update/$1', ['filter' => 'apiauth']);
$routes->patch('post/(:num)', 'Post::update/$1', ['filter' => 'apiauth']);
$routes->delete('post/(:num)', 'Post::delete/$1', ['filter' => 'apiauth']);
```

Route GET tetap terbuka agar artikel bisa dibaca:

```php
$routes->get('post', 'Post::index');
$routes->get('post/(:num)', 'Post::show/$1');
```

Tambahan frontend pada:

```text
lab8_vuejs/assets/js/app.js
```

Fungsi Axios Interceptors:

- Sebelum request dikirim, interceptor mengambil `userToken` dari localStorage.
- Jika token tersedia, header berikut dikirim otomatis:

```text
Authorization: Bearer <token>
```

- Jika server mengembalikan HTTP 401 pada endpoint terlindungi, SPA menghapus localStorage dan mengarahkan user ke `#/login`.

Skenario uji Postman/Insomnia untuk Praktikum 14:

1. Method: `POST`
2. URL: `http://localhost:8080/post`
3. Body JSON:

```json
{
  "judul": "Tes Postman Tanpa Token",
  "isi": "Data ini harus ditolak jika token tidak dikirim.",
  "status": 1,
  "id_kategori": 7
}
```

4. Jangan isi header Authorization.
5. Hasil yang benar:

```json
{
  "status": 401,
  "error": 401,
  "messages": "Akses Ditolak. Token tidak ditemukan pada request!"
}
```

Skenario uji browser untuk Praktikum 14:

1. Buka `lab8_vuejs/index.html`.
2. Login dengan akun admin.
3. Buka Developer Tools → Network.
4. Tambah/edit/hapus artikel.
5. Klik request `post` pada tab Network.
6. Pastikan Request Headers memuat:

```text
Authorization: Bearer <string_token>
```

## Analisis Ringkas Praktikum 13 dan 14

**Navigation Guards** bekerja di sisi browser. Fungsinya mencegah pengguna membuka route tertentu pada SPA jika status login di localStorage belum valid. Proteksi ini bagus untuk pengalaman pengguna, tetapi belum cukup untuk keamanan database karena masih bisa dilewati lewat REST Client.

**CodeIgniter Filters** bekerja di sisi server. Filter `apiauth` memeriksa header Authorization sebelum controller API menjalankan proses tambah, ubah, atau hapus artikel. Proteksi ini lebih penting karena membatasi akses langsung ke endpoint API walaupun request dikirim dari luar aplikasi VueJS.

**Axios Interceptors** menjadi penghubung di sisi frontend. Fungsinya menambahkan token secara otomatis ke setiap request, sehingga kode `axios.post`, `axios.put`, dan `axios.delete` tidak perlu menulis header Authorization satu-satu.

## Perbaikan Public/Admin

- Menu **Admin** tidak ditampilkan di public.
- Menu admin tidak menampilkan tombol balik ke public.
- `/admin` masuk ke dashboard admin.
- Login admin MVC dibuat di `/admin/login`.
- Footer public dan footer admin ditambahkan.
- Sampul berita sudah disiapkan melalui field `gambar` pada tabel `artikel` dan input file pada form tambah/edit artikel.
- Data awal artikel memakai berita/rujukan nyata dan disertai `sumber_nama` serta `sumber_url`.

## Update Pilihan Artikel Terbaru oleh Admin

Admin bisa memilih artikel mana yang muncul di bagian **Artikel Terbaru** public dan sidebar.

Cara pakai:

1. Login admin MVC.
2. Buka `http://localhost:8080/admin/artikel`.
3. Klik **Masukkan ke Terbaru** untuk menampilkan artikel di public.
4. Klik **Keluarkan dari Terbaru** untuk menghapus artikel dari bagian Artikel Terbaru.
5. Bisa juga lewat form tambah/edit artikel dengan mencentang field **Tampilkan di Artikel Terbaru public dan sidebar**.

Perubahan database:

- Tabel `artikel` mendapat kolom `is_terbaru`.
- Kalau database sudah pernah dimigrate sebelumnya, jalankan:

```bash
php spark migrate
```

## Modul yang Tercakup

- Praktikum 1: routing, controller, view dasar.
- Praktikum 2: CRUD artikel.
- Praktikum 3: layout dan view cell.
- Praktikum 4: login admin dan filter auth.
- Praktikum 5: pagination dan pencarian.
- Praktikum 6: upload gambar.
- Praktikum 7: relasi kategori dan query builder join.
- Praktikum 8: AJAX.
- Praktikum 9: AJAX pagination dan search.
- Praktikum 10: REST API `/post`.
- Praktikum 11: VueJS 3 + Axios.
- Praktikum 12: Vue Components dan Vue Router SPA.
- Praktikum 13: Login API, Login.js, Navigation Guards.
- Praktikum 14: ApiAuthFilter, Token-Based Authentication, Axios Interceptors.

## Catatan Gambar

Gambar bawaan menggunakan placeholder SVG bertema MU Forum agar aman untuk praktikum. Untuk mengganti sampul berita:

1. Login ke admin MVC.
2. Masuk ke Kelola Artikel.
3. Edit atau tambah artikel.
4. Upload gambar di field **Gambar**.
5. File akan tersimpan di `public/gambar` dan tampil sebagai sampul artikel.


## Lampiran
1. Gambar halaman public
---
<img width="1365" height="717" alt="ft1" src="https://github.com/user-attachments/assets/90b86965-2159-4e70-84b2-f65ce5c7eda0" />
---
2. Gambar halaman berita
---
<img width="1362" height="723" alt="ft7" src="https://github.com/user-attachments/assets/0d04298e-24e6-487a-a906-5010efd4a266" />
---
3. Gambar halaman admin login
---
<img width="1365" height="725" alt="ft3" src="https://github.com/user-attachments/assets/39df2d40-6fc2-42f2-8c27-9eb68ccebc3c" />
---
4. Gambar dashboard admin
---
<img width="1365" height="723" alt="ft4" src="https://github.com/user-attachments/assets/fa93d8fb-d974-433b-8f96-3c47717be442" />
---
5. Gambar halaman tambah berita
---
<img width="1365" height="730" alt="ft6" src="https://github.com/user-attachments/assets/2d2a2229-5540-4b68-86d5-c5146b441323" />
---
6. Gambar halaman manajemen berita
---
<img width="1365" height="724" alt="ft5" src="https://github.com/user-attachments/assets/b9dbe866-209e-4d08-a3fa-b596fea700be" />
