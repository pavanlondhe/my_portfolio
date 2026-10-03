<?php
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../includes/auth.php';
requireAdmin();

$data = loadSiteData();
$settings = $data['settings'] ?? [];
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $settings['site_title'] = trim((string) ($_POST['site_title'] ?? $settings['site_title'] ?? 'Pavan Londhe | 2nd Year IT Engineering Student | Full Stack Developer | AWS & Data Analysis'));
    $settings['footer_text'] = trim((string) ($_POST['footer_text'] ?? $settings['footer_text'] ?? 'Built with HTML, CSS, JavaScript and PHP.'));
    $settings['admin_email'] = trim((string) ($_POST['admin_email'] ?? $settings['admin_email'] ?? 'admin@pavanportfolio.local'));
    $settings['github_url'] = trim((string) ($_POST['github_url'] ?? $settings['github_url'] ?? 'https://github.com/'));
    $settings['linkedin_url'] = trim((string) ($_POST['linkedin_url'] ?? $settings['linkedin_url'] ?? 'https://www.linkedin.com/'));
    $settings['email'] = trim((string) ($_POST['email'] ?? $settings['email'] ?? 'pavanlondhe.25@gmail.com'));

    $data['settings'] = $settings;
    saveSiteData($data);
    $message = 'Site settings updated successfully.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings | Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body { background: #f4f7fb; }
        .admin-shell { width: min(900px, calc(100% - 2rem)); margin: 0 auto; padding: 2rem 0 4rem; }
        .admin-nav { display: flex; flex-wrap: wrap; gap: 0.7rem; margin-bottom: 1.6rem; }
        .admin-nav a { background: white; border: 1px solid var(--border); border-radius: 999px; padding: 0.7rem 1rem; font-weight: 600; }
        .panel { background: white; border: 1px solid var(--border); border-radius: 24px; padding: 1.5rem; box-shadow: var(--shadow); }
        .form-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1rem; }
        .field-group { display: grid; gap: 0.4rem; }
        .field-group input { width: 100%; border: 1px solid var(--border); border-radius: 12px; padding: 0.8rem 0.9rem; }
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
            <p class="eyebrow dark">Settings</p>
            <h1>General site settings</h1>
            <?php if ($message): ?><p class="form-status success"><?= htmlspecialchars($message) ?></p><?php endif; ?>
            <form method="post" class="form-grid">
                <div class="field-group" style="grid-column: 1 / -1;">
                    <label>Site Title</label>
                    <input type="text" name="site_title" value="<?= htmlspecialchars($settings['site_title'] ?? 'Pavan Londhe | 2nd Year IT Engineering Student | Full Stack Developer | AWS & Data Analysis') ?>">
                </div>
                <div class="field-group" style="grid-column: 1 / -1;">
                    <label>Footer Text</label>
                    <input type="text" name="footer_text" value="<?= htmlspecialchars($settings['footer_text'] ?? 'Built with HTML, CSS, JavaScript and PHP.') ?>">
                </div>
                <div class="field-group">
                    <label>Admin Email</label>
                    <input type="email" name="admin_email" value="<?= htmlspecialchars($settings['admin_email'] ?? 'admin@pavanportfolio.local') ?>">
                </div>
                <div class="field-group">
                    <label>Public Email</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($settings['email'] ?? 'pavanlondhe.25@gmail.com') ?>">
                </div>
                <div class="field-group">
                    <label>GitHub URL</label>
                    <input type="text" name="github_url" value="<?= htmlspecialchars($settings['github_url'] ?? 'https://github.com/') ?>">
                </div>
                <div class="field-group">
                    <label>LinkedIn URL</label>
                    <input type="text" name="linkedin_url" value="<?= htmlspecialchars($settings['linkedin_url'] ?? 'https://www.linkedin.com/') ?>">
                </div>
                <div style="grid-column: 1 / -1;">
                    <button type="submit" class="btn btn-primary">Save Settings</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
