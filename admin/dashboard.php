<?php
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../includes/auth.php';
requireAdmin();

$data = loadSiteData();
$profile = $data['profile'] ?? [];
$projects = $data['projects'] ?? [];
$websites = $data['websites'] ?? [];
$certificates = $data['certificates'] ?? [];
$achievements = $data['achievements'] ?? [];
$skills = $data['skills'] ?? [];
$education = $data['education'] ?? [];
$resume = $data['resume'] ?? [];
$messages = $data['contact_messages'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Pavan Londhe</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body { background: #f4f7fb; }
        .admin-shell { width: min(1200px, calc(100% - 2rem)); margin: 0 auto; padding: 2rem 0 4rem; }
        .admin-topbar { display: flex; justify-content: space-between; align-items: center; gap: 1rem; margin-bottom: 2rem; }
        .admin-nav { display: flex; flex-wrap: wrap; gap: 0.7rem; }
        .admin-nav a { background: white; border: 1px solid var(--border); border-radius: 999px; padding: 0.7rem 1rem; font-weight: 600; }
        .stats-grid { display: grid; grid-template-columns: repeat(5, minmax(0, 1fr)); gap: 1rem; }
        .stat-box { background: white; border: 1px solid var(--border); border-radius: 18px; padding: 1.2rem; box-shadow: var(--shadow); }
        .stat-box strong { display: block; font-size: 2rem; }
        .panel-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1rem; margin-top: 1.2rem; }
        .panel { background: white; border: 1px solid var(--border); border-radius: 18px; padding: 1.3rem; box-shadow: var(--shadow); }
        @media (max-width: 760px) { .stats-grid, .panel-grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <div class="admin-shell">
        <div class="admin-topbar">
            <div>
                <p class="eyebrow dark">Admin Dashboard</p>
                <h1>Pavan Londhe</h1>
            </div>
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
        </div>

        <div class="stats-grid">
            <div class="stat-box"><span>Total Projects</span><strong><?= count($projects) ?></strong></div>
            <div class="stat-box"><span>Total Websites</span><strong><?= count($websites) ?></strong></div>
            <div class="stat-box"><span>Total Certificates</span><strong><?= count($certificates) ?></strong></div>
            <div class="stat-box"><span>Total Achievements</span><strong><?= count($achievements) ?></strong></div>
            <div class="stat-box"><span>Messages</span><strong><?= count($messages) ?></strong></div>
        </div>

        <div class="panel-grid">
            <div class="panel">
                <h3>Profile Summary</h3>
                <p><strong>Name:</strong> <?= htmlspecialchars($profile['name'] ?? 'Pavan Londhe') ?></p>
                <p><strong>Role:</strong> <?= htmlspecialchars($profile['role'] ?? '2nd Year IT Engineering Student') ?></p>
                <p><strong>College:</strong> <?= htmlspecialchars($profile['college'] ?? 'TGPCET, Nagpur') ?></p>
                <p><strong>Current Focus:</strong> <?= htmlspecialchars($profile['current_focus'] ?? 'Full Stack Development') ?></p>
            </div>

            <div class="panel">
                <h3>Quick Management</h3>
                <p><a href="profile.php">Update profile</a></p>
                <p><a href="projects.php">Add or edit project</a></p>
                <p><a href="certificates.php">Manage certificates</a></p>
                <p><a href="resume.php">Upload resume</a></p>
            </div>
        </div>
    </div>
</body>
</html>
