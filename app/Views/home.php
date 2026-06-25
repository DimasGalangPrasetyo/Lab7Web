<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<section class="intro-card">
    <p class="eyebrow">Forum Manchester United</p>
    <h2>Berita asli, sejarah, transfer, dan diskusi Red Devils</h2>
    <p>Dukungdan ikuti perkembangan Manchester United dalam meraih tsunami trofi di setiap musimnya melalui forum ini.</p>
    <div class="button-row">
        <a class="btn" href="<?= base_url('/artikel'); ?>">Baca Artikel</a>
    </div>
</section>

<section class="category-grid">
    <?php foreach ($kategori as $k): ?>
        <a class="category-pill" href="<?= base_url('/artikel?kategori_id=' . $k['id_kategori']); ?>">
            <?= esc($k['nama_kategori']); ?>
        </a>
    <?php endforeach; ?>
</section>

<h2>Artikel Terbaru Pilihan Admin</h2>
<?php if (! empty($artikel)): ?>
    <div class="card-grid">
        <?php foreach ($artikel as $row): ?>
            <article class="article-card">
                <img src="<?= base_url('/gambar/' . ($row['gambar'] ?: 'default.svg')); ?>" alt="<?= esc($row['judul']); ?>">
                <div class="article-card-body">
                    <span class="badge"><?= esc($row['nama_kategori'] ?? 'Umum'); ?></span>
                    <h3><a href="<?= base_url('/artikel/' . $row['slug']); ?>"><?= esc($row['judul']); ?></a></h3>
                    <p><?= esc(substr(strip_tags($row['isi']), 0, 145)); ?>...</p>
                    <?php if (! empty($row['sumber_nama'])): ?>
                        <small class="source-inline">Sumber: <?= esc($row['sumber_nama']); ?></small>
                    <?php endif; ?>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="intro-card">
        <h3>Belum ada artikel terbaru.</h3>
        <p>Admin belum memilih artikel yang ditampilkan pada bagian Artikel Terbaru.</p>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>