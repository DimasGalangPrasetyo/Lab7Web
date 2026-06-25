<?= $this->include('template/admin_header'); ?>

<div class="admin-page-title">
    <p class="eyebrow">Admin Panel</p>
    <h1>Dashboard MU Forum</h1>
    <p>Ringkasan konten, status publikasi, kategori, dan artikel yang dipilih masuk bagian Artikel Terbaru.</p>
</div>

<div class="stat-grid">
    <div class="stat-card">
        <span>Total Artikel</span>
        <strong><?= esc($totalArtikel); ?></strong>
    </div>
    <div class="stat-card">
        <span>Publish</span>
        <strong><?= esc($publish); ?></strong>
    </div>
    <div class="stat-card">
        <span>Draft</span>
        <strong><?= esc($draft); ?></strong>
    </div>
    <div class="stat-card">
        <span>Artikel Terbaru</span>
        <strong><?= esc($terbaru); ?></strong>
    </div>
    <div class="stat-card">
        <span>Kategori</span>
        <strong><?= esc($kategori); ?></strong>
    </div>
</div>

<section class="admin-panel-card">
    <div class="admin-toolbar compact">
        <div>
            <h2>Artikel Terbaru Pilihan</h2>
            <p>Data ini hanya menampilkan artikel yang dicentang admin sebagai Artikel Terbaru.</p>
        </div>
        <a class="btn" href="<?= base_url('/admin/artikel/add'); ?>">Tambah Artikel</a>
    </div>

    <table class="table-data">
        <thead>
            <tr>
                <th>Cover</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Terbaru</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($latest): foreach ($latest as $row): ?>
                <tr>
                    <td><img class="admin-thumb" src="<?= base_url('/gambar/' . ($row['gambar'] ?: 'default.svg')); ?>" alt="<?= esc($row['judul']); ?>"></td>
                    <td>
                        <strong><?= esc($row['judul']); ?></strong><br>
                        <small><?= esc(substr(strip_tags($row['isi'] ?? ''), 0, 95)); ?>...</small>
                    </td>
                    <td><?= esc($row['nama_kategori'] ?? '-'); ?></td>
                    <td><span class="status-badge"><?= ((int) $row['status'] === 1) ? 'Publish' : 'Draft'; ?></span></td>
                    <td><span class="status-badge featured">Tampil</span></td>
                    <td class="action-links">
                        <a href="<?= base_url('/admin/artikel/edit/' . $row['id']); ?>">Edit</a>
                        <a href="<?= base_url('/admin/artikel/toggle-terbaru/' . $row['id']); ?>">Keluarkan dari Terbaru</a>
                        <a href="<?= base_url('/admin/artikel/delete/' . $row['id']); ?>" onclick="return confirm('Yakin menghapus artikel ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; else: ?>
                <tr><td colspan="6">Belum ada artikel yang dipilih untuk Artikel Terbaru.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</section>

<?= $this->include('template/admin_footer'); ?>
