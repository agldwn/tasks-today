<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<nav>
    <a href="<?= base_url('/') ?>">Home</a>
    <a href="<?= base_url('/tasks') ?>">All Tasks</a>
    <a href="<?= base_url('/profile') ?>">Profile</a>
    <a href="<?= base_url('/about') ?>">About</a>

    <?php if (session()->get('isLoggedIn')): ?>
        <a href="<?= base_url('/tasks/new') ?>">New Task</a>
        <a href="<?= base_url('/logout') ?>">Logout</a>
    <?php else: ?>
        <a href="<?= base_url('/login') ?>">Login</a>
    <?php endif; ?>
</nav>

<h1>All Tasks</h1>

<?php if (session()->getFlashdata('success')): ?>
    <p><?= esc(session()->getFlashdata('success')) ?></p>
<?php endif; ?>

<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Task Date</th>

            <?php if (session()->get('isLoggedIn')): ?>
                <th>Actions</th>
            <?php endif; ?>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['title']) ?></td>
                <td><?= esc($task['status']) ?></td>
                <td><?= esc($task['task_date']) ?></td>

                <?php if (session()->get('isLoggedIn')): ?>
                    <td>
                        <a class="btn"
                           href="<?= base_url('/tasks/edit/' . $task['id']) ?>">
                            Edit
                        </a>

                        <form action="<?= site_url('/tasks/delete/' . $task['id']) ?>"
                              method="post"
                              style="display:inline;">
                            <?= csrf_field() ?>
                            <button type="submit"
                                    onclick="return confirm('Archive this task?');">
                                Delete
                            </button>
                        </form>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>