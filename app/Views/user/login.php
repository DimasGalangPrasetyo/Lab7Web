<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Login Admin'); ?></title>
    <link rel="stylesheet" href="<?= base_url('/style.css'); ?>">
</head>

<body class="login-page">
    <div id="login-wrapper">
        <h1>Login Admin</h1>
        <?php if (session()->getFlashdata('flash_msg')): ?>
            <div class="alert alert-danger"><?= esc(session()->getFlashdata('flash_msg')); ?></div>
        <?php endif; ?>
        <form action="<?= base_url('/admin/login'); ?>" method="post">
            <label>Email address</label>
            <input type="email" name="email" value="<?= old('email'); ?>" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit" class="btn full">Login</button>
        </form>
    </div>
</body>

</html>