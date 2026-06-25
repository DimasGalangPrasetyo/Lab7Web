<?= $this->include('template/admin_header'); ?>
<h1><?= esc($title); ?></h1>
<table class="table-data">
    <thead>
        <tr><th>ID</th><th>Username</th><th>Email</th></tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= esc($user['id']); ?></td>
                <td><?= esc($user['username']); ?></td>
                <td><?= esc($user['useremail']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->include('template/admin_footer'); ?>
