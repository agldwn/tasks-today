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
    <a href="<?= base_url('/logout') ?>">Logout</a>
</nav>

<h1>Edit Task</h1>

<?php if (session()->getFlashdata('errors')): ?>
    <ul>
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="<?= site_url('/tasks/update/' . $task['id']) ?>" method="post">
    <?= csrf_field() ?>

    <label for="title">Task Title</label>
    <input type="text" name="title" id="title"
           value="<?= old('title', $task['title']) ?>" required>

    <br><br>

    <label for="task_date">Task Date</label>
    <input type="date" name="task_date" id="task_date"
           value="<?= old('task_date', $task['task_date']) ?>" required>

    <br><br>

    <label for="status">Status</label>
    <select name="status" id="status" required>
        <option value="pending"
            <?= old('status', $task['status']) === 'pending' ? 'selected' : '' ?>>
            Pending
        </option>

        <option value="completed"
            <?= old('status', $task['status']) === 'completed' ? 'selected' : '' ?>>
            Completed
        </option>
    </select>

    <br><br>

    <button type="submit">Update Task</button>
    <a href="<?= base_url('/tasks') ?>" class="btn">Cancel</a>
</form>

</body>
</html>