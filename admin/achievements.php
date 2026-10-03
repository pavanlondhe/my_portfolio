<?php
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../includes/auth.php';
requireAdmin();

$data = loadSiteData();
$achievements = $data['achievements'] ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newItem = [
        'id' => time(),
        'title' => trim((string) ($_POST['title'] ?? '')),
        'description' => trim((string) ($_POST['description'] ?? '')),
        'date' => trim((string) ($_POST['date'] ?? '')),
        'image' => trim((string) ($_POST['image'] ?? ''))
    ];

    if ($newItem['title'] !== '') {
        $achievements[] = $newItem;
        $data['achievements'] = $achievements;
        saveSiteData($data);
        header('Location: /professional-portfolio/admin/achievements.php?success=1');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achievements | Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body { background: #f4f7fb; }
        .admin-shell { width: min(1000px, calc(100% - 2rem)); margin: 0 auto; padding: 2rem 0 4rem; }
        .admin-nav { display: flex; flex-wrap: wrap; gap: 0.7rem; margin-bottom: 1.6rem; }
        .admin-nav a { background: white; border: 1px solid var(--border); border-radius: 999px; padding: 0.7rem 1rem; font-weight: 600; }
        .panel { background: white; border: 1px solid var(--border); border-radius: 24px; padding: 1.5rem; box-shadow: var(--shadow); }
        .form-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1rem; }
        .field-group { display: grid; gap: 0.4rem; }
        .field-group input, .field-group textarea { width: 100%; border: 1px solid var(--border); border-radius: 12px; padding: 0.8rem 0.9rem; }
        .field-group textarea { min-height: 120px; resize: vertical; }
        @media (max-width: 760px) { .form-grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <div class="admin-shell">
        <div class="admin-nav">
            <a href="dashboard.php">Dashboard</a>
            <a href="profile.php">Profile</a>
            <a href="projects.php">Projects</a>
            <a href="websites.php">Websites</a>
            <a href="certificates.php">Certificates</a>
            <a href="achievements.php">Achievements</a>
            <a href="resume.php">Resume</a>
            <a href="skills.php">Skills</a>
            <a href="education.php">Education</a>
            <a href="settings.php">Settings</a>
            <a href="logout.php">Logout</a>
        </div>

        <div class="panel">
            <p class="eyebrow dark">Achievements</p>
            <h1>Add Achievement</h1>
            <?php if (isset($_GET['success'])): ?><p class="form-status success">Achievement added.</p><?php endif; ?>
            <form method="post" class="form-grid">
                <div class="field-group">
                    <label>Title</label>
                    <input type="text" name="title" required>
                </div>
                <div class="field-group">
                    <label>Date</label>
                    <input type="text" name="date" value="2026">
                </div>
                <div class="field-group" style="grid-column: 1 / -1;">
                    <label>Description</label>
                    <textarea name="description" required></textarea>
                </div>
                <div class="field-group" style="grid-column: 1 / -1;">
                    <label>Image Path (optional)</label>
                    <input type="text" name="image" value="">
                </div>
                <div style="grid-column: 1 / -1;">
                    <button type="submit" class="btn btn-primary">Save Achievement</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
