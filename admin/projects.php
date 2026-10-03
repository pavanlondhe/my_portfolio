<?php
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../includes/auth.php';
requireAdmin();

$data = loadSiteData();
$projects = $data['projects'] ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newProject = [
        'id' => time(),
        'name' => trim((string) ($_POST['name'] ?? '')),
        'description' => trim((string) ($_POST['description'] ?? '')),
        'category' => trim((string) ($_POST['category'] ?? 'Other')),
        'technologies' => array_values(array_filter(array_map('trim', preg_split('/[,]+/', (string) ($_POST['technologies'] ?? ''))))),
        'github_url' => trim((string) ($_POST['github_url'] ?? '#')),
        'live_url' => trim((string) ($_POST['live_url'] ?? '#')),
        'status' => trim((string) ($_POST['status'] ?? 'Development')),
        'image' => trim((string) ($_POST['image'] ?? 'assets/projects/project-placeholder.svg'))
    ];

    if ($newProject['name'] !== '') {
        $projects[] = $newProject;
        $data['projects'] = $projects;
        saveSiteData($data);
        header('Location: /professional-portfolio/admin/projects.php?success=1');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects | Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body { background: #f4f7fb; }
        .admin-shell { width: min(1100px, calc(100% - 2rem)); margin: 0 auto; padding: 2rem 0 4rem; }
        .admin-nav { display: flex; flex-wrap: wrap; gap: 0.7rem; margin-bottom: 1.6rem; }
        .admin-nav a { background: white; border: 1px solid var(--border); border-radius: 999px; padding: 0.7rem 1rem; font-weight: 600; }
        .panel { background: white; border: 1px solid var(--border); border-radius: 24px; padding: 1.4rem; box-shadow: var(--shadow); }
        .form-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1rem; }
        .field-group { display: grid; gap: 0.4rem; }
        .field-group input, .field-group textarea, .field-group select { width: 100%; border: 1px solid var(--border); border-radius: 12px; padding: 0.8rem 0.9rem; }
        .field-group textarea { min-height: 120px; resize: vertical; }
        .list-card { margin-top: 1rem; display: grid; gap: 0.8rem; }
        .list-item { border: 1px solid var(--border); border-radius: 14px; padding: 1rem; }
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
            <p class="eyebrow dark">Projects</p>
            <h1>Add Project</h1>
            <?php if (isset($_GET['success'])): ?><p class="form-status success">Project added.</p><?php endif; ?>
            <form method="post" class="form-grid">
                <div class="field-group">
                    <label>Project Name</label>
                    <input type="text" name="name" required>
                </div>
                <div class="field-group">
                    <label>Category</label>
                    <select name="category">
                        <option>Web Development</option>
                        <option>PHP</option>
                        <option>JavaScript</option>
                        <option>Python</option>
                        <option>Academic</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="field-group" style="grid-column: 1 / -1;">
                    <label>Description</label>
                    <textarea name="description" required></textarea>
                </div>
                <div class="field-group" style="grid-column: 1 / -1;">
                    <label>Technologies (comma separated)</label>
                    <input type="text" name="technologies" placeholder="HTML, CSS, JavaScript, PHP">
                </div>
                <div class="field-group">
                    <label>GitHub URL</label>
                    <input type="text" name="github_url" value="https://github.com/">
                </div>
                <div class="field-group">
                    <label>Live Demo URL</label>
                    <input type="text" name="live_url" value="#">
                </div>
                <div class="field-group">
                    <label>Status</label>
                    <select name="status">
                        <option>Development</option>
                        <option>Completed</option>
                        <option>In Progress</option>
                    </select>
                </div>
                <div class="field-group">
                    <label>Image Path</label>
                    <input type="text" name="image" value="assets/projects/project-placeholder.svg">
                </div>
                <div style="grid-column: 1 / -1;">
                    <button type="submit" class="btn btn-primary">Save Project</button>
                </div>
            </form>

            <div class="list-card">
                <?php foreach ($projects as $project): ?>
                    <div class="list-item">
                        <strong><?= htmlspecialchars($project['name'] ?? 'Untitled') ?></strong>
                        <p><?= htmlspecialchars($project['category'] ?? 'Other') ?> • <?= htmlspecialchars($project['status'] ?? 'Development') ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>
