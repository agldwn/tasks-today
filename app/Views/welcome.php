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
    <h1>Tasks for Today</h1>
    <p class="date">Date: <?= date('F j, Y') ?></p>

    <?php if (empty($tasks)): ?>
        <p class="empty">No tasks scheduled for today.</p>
    <?php else: ?>
        <div class="task-list">
            <?php foreach ($tasks as $task): ?>
                <div class="task-card">
                    <h3><?= esc($task['title']) ?></h3>
                    <span class="status">
                        <?= esc($task['status']) ?>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>

</body>
</html>