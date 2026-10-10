<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <style>
        .login-card {
            width: 90%;
            max-width: 420px;
            margin: 70px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 5px 18px rgba(139, 117, 153, 0.18);
        }

        .login-card h1 {
            text-align: center;
        }

        .login-card label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        .login-card input {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            border: 1px solid #e2cfe0;
            border-radius: 10px;
        }

        .login-card button {
            width: 100%;
            margin-top: 22px;
        }

        .error {
            padding: 10px;
            border-radius: 8px;
            background: #ffd6d6;
            color: #8a3030;
        }
    </style>
</head>
<body>

<nav>
    <a href="<?= base_url('/') ?>">Home</a>
    <a href="<?= base_url('/tasks') ?>">All Tasks</a>
    <a href="<?= base_url('/profile') ?>">Profile</a>
    <a href="<?= base_url('/about') ?>">About</a>
</nav>

<div class="login-card">
    <h1>Login</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <p class="error">
            <?= esc(session()->getFlashdata('error')) ?>
        </p>
    <?php endif; ?>

    <form action="<?= site_url('login') ?>" method="post">
        <?= csrf_field() ?>

        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>