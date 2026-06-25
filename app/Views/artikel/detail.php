<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<article class="detail-card">
    <span class="badge"><?= esc($artikel['nama_kategori'] ?? 'Umum'); ?></span>
    <h2><?= esc($artikel['judul']); ?></h2>
    <img class="detail-image" src="<?= base_url('/gambar/' . ($artikel['gambar'] ?: 'default.svg')); ?>" alt="<?= esc($artikel['judul']); ?>">
    <div class="article-content">
        <?php foreach (explode("\n", trim($artikel['isi'])) as $paragraph): ?>
            <?php if (trim($paragraph) !== ''): ?>
                <p><?= esc($paragraph); ?></p>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <?php if (! empty($artikel['sumber_url'])): ?>
        <div class="source-box">
            <strong>Sumber:</strong>
            <a href="<?= esc($artikel['sumber_url']); ?>" target="_blank" rel="noopener">
                <?= esc($artikel['sumber_nama'] ?: $artikel['sumber_url']); ?>
            </a>
        </div>
    <?php endif; ?>
</article>

<?= $this->endSection() ?>
