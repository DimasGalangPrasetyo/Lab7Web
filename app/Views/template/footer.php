        </main>
        <aside id="sidebar">
            <?= view_cell('App\\Cells\\ArtikelTerkini::render') ?>
            <div class="widget-box">
                <h3 class="title">Quick Links</h3>
                <ul>
                    <li><a href="<?= base_url('/artikel?kategori_id=7'); ?>">Transfer</a></li>
                    <li><a href="<?= base_url('/artikel?kategori_id=4'); ?>">Trofi</a></li>
                    <li><a href="<?= base_url('/artikel?kategori_id=8'); ?>">Akademi</a></li>
                </ul>
            </div>
        </aside>
    </section>
    <footer class="site-footer">
        <div>
            <h3>MU Forum</h3>
            <p>Public page khusus pembaca. Admin tidak ditampilkan pada menu public.</p>
        </div>
        <small>&copy; <?= date('Y') ?> MU Forum Praktikum Web 2</small>
    </footer>
</div>
</body>
</html>
