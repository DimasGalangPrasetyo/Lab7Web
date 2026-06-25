<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<article class="page-card">
    <h2>FAQ</h2>
    <h3>Apa isi forum ini?</h3>
    <p>Forum ini berisi artikel Manchester United: sejarah, pemain, manajer, trofi, berita pertandingan, berita luar lapangan, transfer, dan akademi.</p>
    <h3>Apakah bisa tambah artikel?</h3>
    <p>Bisa. Login sebagai admin, lalu buka menu kelola artikel.</p>
    <h3>Apakah ada API?</h3>
    <p>Ada. Endpoint utama berada di <code>/post</code> dan dipakai oleh frontend VueJS.</p>
</article>
<?= $this->endSection() ?>
