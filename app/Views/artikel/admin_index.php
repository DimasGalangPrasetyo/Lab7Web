<?= $this->include('template/admin_header'); ?>

<h1><?= esc($title); ?></h1>
<p>Halaman ini memakai AJAX untuk search dan pagination, sesuai praktikum 9.</p>

<div class="admin-toolbar">
    <form id="search-form" class="filter-form">
        <input type="text" name="q" id="search-box" value="<?= esc($q); ?>" placeholder="Cari judul artikel">
        <select name="kategori_id" id="category-filter">
            <option value="">Semua Kategori</option>
            <?php foreach ($kategori as $k): ?>
                <option value="<?= $k['id_kategori']; ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                    <?= esc($k['nama_kategori']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Cari</button>
    </form>
    <a class="btn" href="<?= base_url('/admin/artikel/add'); ?>">Tambah Artikel</a>
</div>

<div id="article-container"></div>
<div id="pagination-container"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    const articleContainer = $('#article-container');
    const paginationContainer = $('#pagination-container');
    const searchForm = $('#search-form');
    const baseAdminEdit = "<?= base_url('/admin/artikel/edit'); ?>";
    const baseAdminDelete = "<?= base_url('/admin/artikel/delete'); ?>";
    const baseToggleTerbaru = "<?= base_url('/admin/artikel/toggle-terbaru'); ?>";
    const initialUrl = "<?= site_url('admin/artikel'); ?>";

    function statusText(status) {
        return Number(status) === 1 ? 'Publish' : 'Draft';
    }

    function terbaruText(isTerbaru) {
        return Number(isTerbaru) === 1 ? 'Tampil' : 'Tidak';
    }

    function renderArticles(articles) {
        let html = '<table class="table-data"><thead><tr><th>ID</th><th>Cover</th><th>Judul</th><th>Kategori</th><th>Status</th><th>Artikel Terbaru</th><th>Aksi</th></tr></thead><tbody>';
        if (articles.length > 0) {
            articles.forEach(article => {
                const isi = article.isi ? article.isi.substring(0, 70) : '';
                html += `
                    <tr>
                        <td>${article.id}</td>
                        <td><img class="admin-thumb" src="<?= base_url('/gambar'); ?>/${article.gambar || 'default.svg'}" alt="${article.judul}"></td>
                        <td><strong>${article.judul}</strong><br><small>${isi}...</small></td>
                        <td>${article.nama_kategori || '-'}</td>
                        <td><span class="status-badge">${statusText(article.status)}</span></td>
                        <td><span class="status-badge ${Number(article.is_terbaru) === 1 ? 'featured' : 'muted'}">${terbaruText(article.is_terbaru)}</span></td>
                        <td class="action-links">
                            <a href="${baseAdminEdit}/${article.id}">Edit</a>
                            <a href="${baseToggleTerbaru}/${article.id}">${Number(article.is_terbaru) === 1 ? 'Keluarkan dari Terbaru' : 'Masukkan ke Terbaru'}</a>
                            <a onclick="return confirm('Yakin menghapus data?');" href="${baseAdminDelete}/${article.id}">Hapus</a>
                        </td>
                    </tr>`;
            });
        } else {
            html += '<tr><td colspan="7">Tidak ada data.</td></tr>';
        }
        html += '</tbody></table>';
        articleContainer.html(html);
    }

    function fetchData(url) {
        articleContainer.html('<div class="loading-box">Loading data...</div>');
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            success: function(data) {
                renderArticles(data.artikel || []);
                paginationContainer.html(data.pager_links || '');
            },
            error: function() {
                articleContainer.html('<div class="alert">Gagal mengambil data AJAX.</div>');
            }
        });
    }

    searchForm.on('submit', function(e) {
        e.preventDefault();
        fetchData(initialUrl + '?' + searchForm.serialize());
    });

    paginationContainer.on('click', 'a', function(e) {
        e.preventDefault();
        fetchData($(this).attr('href'));
    });

    fetchData(initialUrl + '?' + searchForm.serialize());
});
</script>

<?= $this->include('template/admin_footer'); ?>
