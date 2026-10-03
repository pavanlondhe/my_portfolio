<?php
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../includes/auth.php';
requireAdmin();

$data = loadSiteData();
$skills = $data['skills'] ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newSkill = [
        'name' => trim((string) ($_POST['name'] ?? '')),
        'category' => trim((string) ($_POST['category'] ?? 'Frontend Development')),
        'icon' => trim((string) ($_POST['icon'] ?? 'fa-solid fa-code')),
        'status' => trim((string) ($_POST['status'] ?? 'Active'))
    ];

    if ($newSkill['name'] !== '') {
        $skills[] = $newSkill;
        $data['skills'] = $skills;
        saveSiteData($data);
        header('Location: /professional-portfolio/admin/skills.php?success=1');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skills | Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body { background: #f4f7fb; }
        .admin-shell { width: min(1000px, calc(100% - 2rem)); margin: 0 auto; padding: 2rem 0 4rem; }
        .admin-nav { display: flex; flex-wrap: wrap; gap: 0.7rem; margin-bottom: 1.6rem; }
        .admin-nav a { background: white; border: 1px solid var(--border); border-radius: 999px; padding: 0.7rem 1rem; font-weight: 600; }
        .panel { background: white; border: 1px solid var(--border); border-radius: 24px; padding: 1.5rem; box-shadow: var(--shadow); }
        .form-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1rem; }
        .field-group { display: grid; gap: 0.4rem; }
        .field-group input, .field-group select { width: 100%; border: 1px solid var(--border); border-radius: 12px; padding: 0.8rem 0.9rem; }
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
            <p class="eyebrow dark">Skills</p>
            <h1>Add Skill</h1>
            <?php if (isset($_GET['success'])): ?><p class="form-status success">Skill added.</p><?php endif; ?>
            <form method="post" class="form-grid">
                <div class="field-group">
                    <label>Skill Name</label>
                    <input type="text" name="name" required>
                </div>
                <div class="field-group">
                    <label>Category</label>
                    <select name="category">
                        <option>Frontend Development</option>
                        <option>Programming Languages</option>
                        <option>Backend / Web Development</option>
                        <option>Currently Learning</option>
                    </select>
                </div>
                <div class="field-group">
                    <label>Icon Class</label>
                    <input type="text" name="icon" value="fa-solid fa-code">
                </div>
                <div class="field-group">
                    <label>Status</label>
                    <select name="status">
                        <option>Active</option>
                        <option>Currently Learning</option>
                    </select>
                </div>
                <div style="grid-column: 1 / -1;">
                    <button type="submit" class="btn btn-primary">Save Skill</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
