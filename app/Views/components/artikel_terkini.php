<div class="widget-box">
    <h3 class="title">Artikel Terbaru Pilihan</h3>
    <?php if ($artikel): ?>
        <ul class="latest-list">
            <?php foreach ($artikel as $row): ?>
                <li>
                    <a href="<?= base_url('/artikel/' . $row['slug']); ?>"><?= esc($row['judul']); ?></a>
                    <small><?= esc($row['nama_kategori'] ?? 'Umum'); ?></small>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Belum ada artikel terbaru.</p>
    <?php endif; ?>
</div>
