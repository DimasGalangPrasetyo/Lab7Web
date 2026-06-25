<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'MU Forum') ?></title>
    <link rel="stylesheet" href="<?= base_url('/style.css'); ?>">
</head>

<body>
    <div id="container">
        <header class="hero-header">
            <div>
                <p class="eyebrow">Red Devils Indonesia</p>
                <h1>Manchester United Forum</h1>
                <p>Forum informasi Manchester United: berita terkini, sejarah, pemain, trofi, transfer, akademi, dan kabar luar lapangan.</p>
            </div>
        </header>

        <nav class="main-nav public-only">
            <a href="<?= base_url('/'); ?>">Home</a>
            <a href="<?= base_url('/artikel'); ?>">Artikel</a>
            <a href="<?= base_url('/about'); ?>">About</a>
            <a href="<?= base_url('/contact'); ?>">Kontak</a>
            <a href="<?= base_url('/faqs'); ?>">FAQ</a>
        </nav>

        <section id="wrapper">
            <main id="main">
                <?= $this->renderSection('content') ?>
            </main>

            <aside id="sidebar">
                <div class="widget-box highlight-widget">
                    <h3 class="title">Tentang Forum</h3>
                    <p>Berikan dukunganmu bersama kami dengan membaca setiap berita terkini Manchester United disini.</p>
                </div>

                <?= view_cell('App\\Cells\\ArtikelTerkini::render') ?>

                <div class="widget-box">
                    <h3 class="title">Kategori</h3>
                    <ul>
                        <li><a href="<?= base_url('/artikel?kategori_id=1'); ?>">Sejarah</a></li>
                        <li><a href="<?= base_url('/artikel?kategori_id=7'); ?>">Transfer</a></li>
                        <li><a href="<?= base_url('/artikel?kategori_id=8'); ?>">Akademi</a></li>
                        <li><a href="<?= base_url('/artikel?kategori_id=9'); ?>">United Women</a></li>
                    </ul>
                </div>
            </aside>
        </section>

        <footer class="site-footer">
            <div>
                <h3>MU Forum</h3>
                <p>Website praktikum CodeIgniter 4 bertema Manchester United. Konten berita pada data awal disertai sumber.</p>
            </div>
            <div class="footer-links">
                <a href="<?= base_url('/artikel'); ?>">Artikel</a>
                <a href="<?= base_url('/about'); ?>">About</a>
                <a href="<?= base_url('/contact'); ?>">Kontak</a>
                <a href="<?= base_url('/faqs'); ?>">FAQ</a>
            </div>
            <small>&copy; <?= date('Y') ?> MU Forum Praktikum Web 2.</small>
        </footer>
    </div>
</body>

</html>