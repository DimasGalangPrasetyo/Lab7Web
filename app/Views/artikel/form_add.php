<?= $this->include('template/admin_header'); ?>

<h1><?= esc($title); ?></h1>

<form action="" method="post" enctype="multipart/form-data" class="admin-form">
    <label>Judul</label>
    <input type="text" name="judul" value="<?= old('judul'); ?>" required>

    <label>Kategori</label>
    <select name="id_kategori" required>
        <option value="">Pilih Kategori</option>
        <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['id_kategori']; ?>"><?= esc($k['nama_kategori']); ?></option>
        <?php endforeach; ?>
    </select>

    <label>Isi Artikel</label>
    <textarea name="isi" rows="10"><?= old('isi'); ?></textarea>

    <label>Status</label>
    <select name="status">
        <option value="0">Draft</option>
        <option value="1" selected>Publish</option>
    </select>

    <label class="checkbox-label">
        <input type="checkbox" name="is_terbaru" value="1" <?= old('is_terbaru') ? 'checked' : ''; ?>>
        Tampilkan di Artikel Terbaru public dan sidebar
    </label>
    <small class="form-help">Centang hanya artikel pilihan yang ingin muncul di bagian Artikel Terbaru.</small>

    <label>Gambar</label>
    <input type="file" name="gambar" accept="image/*">
    <small class="form-help">File gambar akan disimpan ke folder <code>public/gambar</code> dan tampil sebagai sampul berita.</small>

    <label>Nama Sumber</label>
    <input type="text" name="sumber_nama" placeholder="Contoh: Reuters, ManUtd.com, Sky Sports">

    <label>URL Sumber</label>
    <input type="url" name="sumber_url" placeholder="https://...">

    <div class="button-row">
        <button type="submit" class="btn">Simpan</button>
        <a class="btn secondary" href="<?= base_url('/admin/artikel'); ?>">Batal</a>
    </div>
</form>

<?= $this->include('template/admin_footer'); ?>
