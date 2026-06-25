<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Admin MU Forum') ?></title>
    <link rel="stylesheet" href="<?= base_url('/style.css'); ?>">
</head>
<body class="admin-body">
<div class="admin-shell">
    <aside class="admin-sidebar">
        <h2>MU Admin</h2>
        <p><?= esc(session()->get('user_name') ?? 'Admin') ?></p>
        <nav>
            <a href="<?= base_url('/admin'); ?>">Dashboard</a>
            <a href="<?= base_url('/admin/artikel'); ?>">Kelola Artikel</a>
            <a href="<?= base_url('/admin/artikel/add'); ?>">Tambah Artikel</a>
            <a href="<?= base_url('/admin/logout'); ?>">Logout</a>
        </nav>
    </aside>
    <main class="admin-content">
