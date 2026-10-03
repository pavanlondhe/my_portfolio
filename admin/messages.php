<?php
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../includes/auth.php';
requireAdmin();

$messages = getContactMessages();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages | Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body { background: #f4f7fb; }
        .admin-shell { width: min(1100px, calc(100% - 2rem)); margin: 0 auto; padding: 2rem 0 4rem; }
        .admin-nav { display: flex; flex-wrap: wrap; gap: 0.7rem; margin-bottom: 1.6rem; }
        .admin-nav a { background: white; border: 1px solid var(--border); border-radius: 999px; padding: 0.7rem 1rem; font-weight: 600; }
        .panel { background: white; border: 1px solid var(--border); border-radius: 18px; padding: 1.4rem; box-shadow: var(--shadow); }
        .message-list { display: grid; gap: 1rem; }
        .message-item { border: 1px solid var(--border); border-radius: 12px; padding: 1rem; }
    </style>
</head>
<body>
    <div class="admin-shell">
        <div class="admin-nav">
            <a href="dashboard.php">Dashboard</a>
            <a href="profile.php">Profile</a>
            <a href="skills.php">Skills</a>
            <a href="education.php">Education</a>
            <a href="projects.php">Projects</a>
            <a href="websites.php">Websites</a>
            <a href="certificates.php">Certificates</a>
            <a href="achievements.php">Achievements</a>
            <a href="resume.php">Resume</a>
            <a href="aws-data.php">AWS & Data</a>
            <a href="messages.php">Messages</a>
            <a href="settings.php">Settings</a>
            <a href="logout.php">Logout</a>
        </div>

        <div class="panel">
            <p class="eyebrow dark">Contact Messages</p>
            <h1>Received enquiries</h1>
            <div class="message-list">
                <?php if (empty($messages)): ?>
                    <p>No messages yet.</p>
                <?php else: ?>
                    <?php foreach ($messages as $message): ?>
                        <div class="message-item">
                            <p><strong>Name:</strong> <?= htmlspecialchars($message['name'] ?? 'Unknown') ?></p>
                            <p><strong>Email:</strong> <?= htmlspecialchars($message['email'] ?? '-') ?></p>
                            <p><strong>Subject:</strong> <?= htmlspecialchars($message['subject'] ?? '-') ?></p>
                            <p><strong>Message:</strong> <?= htmlspecialchars($message['message'] ?? '') ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
