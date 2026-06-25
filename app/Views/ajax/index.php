<?= $this->include('template/header'); ?>

<h1>Data Artikel via AJAX</h1>
<p>Contoh praktikum 8: data artikel diambil tanpa reload halaman memakai jQuery AJAX.</p>
<table class="table-data" id="artikelTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function statusText(status) {
        return Number(status) === 1 ? 'Publish' : 'Draft';
    }

    function showLoadingMessage() {
        $('#artikelTable tbody').html('<tr><td colspan="5">Loading data...</td></tr>');
    }

    function loadData() {
        showLoadingMessage();
        $.ajax({
            url: "<?= base_url('ajax/getData') ?>",
            method: "GET",
            dataType: "json",
            success: function(data) {
                let tableBody = '';
                for (let i = 0; i < data.length; i++) {
                    const row = data[i];
                    tableBody += '<tr>';
                    tableBody += '<td>' + row.id + '</td>';
                    tableBody += '<td>' + row.judul + '</td>';
                    tableBody += '<td>' + (row.nama_kategori || '-') + '</td>';
                    tableBody += '<td>' + statusText(row.status) + '</td>';
                    tableBody += '<td><button class="btn-delete" data-id="' + row.id + '">Hapus</button></td>';
                    tableBody += '</tr>';
                }
                $('#artikelTable tbody').html(tableBody || '<tr><td colspan="5">Tidak ada data.</td></tr>');
            }
        });
    }

    $('#artikelTable').on('click', '.btn-delete', function() {
        if (!confirm('Yakin menghapus data?')) return;
        const id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('ajax/delete') ?>/" + id,
            method: "DELETE",
            dataType: "json",
            success: function() {
                loadData();
            }
        });
    });

    loadData();
});
</script>

<?= $this->include('template/footer'); ?>
