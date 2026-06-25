<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h2><?= esc($title); ?></h2>

<form class="filter-form" method="get" action="<?= base_url('/artikel'); ?>">
    <input type="text" name="q" value="<?= esc($q ?? ''); ?>" placeholder="Cari artikel MU...">
    <select name="kategori_id">
        <option value="">Semua Kategori</option>
        <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['id_kategori']; ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                <?= esc($k['nama_kategori']); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Cari</button>
</form>

<?php if ($artikel): ?>
    <?php foreach ($artikel as $row): ?>
        <article class="entry">
            <img src="<?= base_url('/gambar/' . ($row['gambar'] ?: 'default.svg')); ?>" alt="<?= esc($row['judul']); ?>">
            <div>
                <span class="badge"><?= esc($row['nama_kategori'] ?? 'Umum'); ?></span>
                <h2><a href="<?= base_url('/artikel/' . $row['slug']); ?>"><?= esc($row['judul']); ?></a></h2>
                <p><?= esc(substr(strip_tags($row['isi']), 0, 220)); ?>...</p>
                <a class="read-more" href="<?= base_url('/artikel/' . $row['slug']); ?>">Baca selengkapnya</a>
            </div>
        </article>
    <?php endforeach; ?>
    <?= $pager->links(); ?>
<?php else: ?>
    <article class="entry">
        <h2>Belum ada data.</h2>
    </article>
<?php endif; ?>

<?= $this->endSection() ?>
