<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<nav>
    <a href="/">Today</a>
    <a href="/tasks">All Tasks</a>
    <a href="/profile">Profile</a>
    <a href="/about">About</a>
</nav>

<main>
    <h1>About the System</h1>

    <div class="about-card">
        <p>
            Tasks for Today Management System is a CodeIgniter 4 application
            created to organize and display daily tasks.
        </p>

        <p><strong>Developer:</strong> Angeldwin Gapay</p>
        <p><strong>Course:</strong> Web System Technologies</p>
    </div>
</main>

</body>
</html>