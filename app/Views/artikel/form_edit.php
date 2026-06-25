<?= $this->include('template/admin_header'); ?>

<h1><?= esc($title); ?></h1>

<form action="" method="post" enctype="multipart/form-data" class="admin-form">
    <label>Judul</label>
    <input type="text" name="judul" value="<?= esc($artikel['judul']); ?>" required>

    <label>Kategori</label>
    <select name="id_kategori" required>
        <option value="">Pilih Kategori</option>
        <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['id_kategori']; ?>" <?= ($artikel['id_kategori'] == $k['id_kategori']) ? 'selected' : ''; ?>>
                <?= esc($k['nama_kategori']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Isi Artikel</label>
    <textarea name="isi" rows="10"><?= esc($artikel['isi']); ?></textarea>

    <label>Status</label>
    <select name="status">
        <option value="0" <?= ($artikel['status'] == 0) ? 'selected' : ''; ?>>Draft</option>
        <option value="1" <?= ($artikel['status'] == 1) ? 'selected' : ''; ?>>Publish</option>
    </select>

    <label class="checkbox-label">
        <input type="checkbox" name="is_terbaru" value="1" <?= ((int)($artikel['is_terbaru'] ?? 0) === 1) ? 'checked' : ''; ?>>
        Tampilkan di Artikel Terbaru public dan sidebar
    </label>
    <small class="form-help">Jika dicentang, artikel ini akan masuk daftar Artikel Terbaru di halaman public.</small>

    <label>Gambar Saat Ini</label>
    <img class="preview-image" src="<?= base_url('/gambar/' . ($artikel['gambar'] ?: 'default.svg')); ?>" alt="<?= esc($artikel['judul']); ?>">
    <input type="file" name="gambar" accept="image/*">
    <small class="form-help">Kosongkan jika tidak ingin mengganti sampul berita.</small>

    <label>Nama Sumber</label>
    <input type="text" name="sumber_nama" value="<?= esc($artikel['sumber_nama'] ?? ''); ?>">

    <label>URL Sumber</label>
    <input type="url" name="sumber_url" value="<?= esc($artikel['sumber_url'] ?? ''); ?>">

    <div class="button-row">
        <button type="submit" class="btn">Update</button>
        <a class="btn secondary" href="<?= base_url('/admin/artikel'); ?>">Batal</a>
    </div>
</form>

<?= $this->include('template/admin_footer'); ?>
