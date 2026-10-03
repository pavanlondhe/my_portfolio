<?php
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../includes/auth.php';
requireAdmin();

$data = loadSiteData();
$profile = $data['profile'] ?? [];
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data['profile'] = [
        'name' => trim((string) ($_POST['name'] ?? $profile['name'] ?? 'Pavan Londhe')),
        'role' => trim((string) ($_POST['role'] ?? $profile['role'] ?? '2nd Year Information Technology Engineering Student')),
        'college' => trim((string) ($_POST['college'] ?? $profile['college'] ?? 'TGPCET, Nagpur')),
        'branch' => trim((string) ($_POST['branch'] ?? $profile['branch'] ?? 'Information Technology (IT)')),
        'year' => trim((string) ($_POST['year'] ?? $profile['year'] ?? '2nd Year')),
        'current_focus' => trim((string) ($_POST['current_focus'] ?? $profile['current_focus'] ?? 'Full Stack Development')),
        'domain' => trim((string) ($_POST['domain'] ?? $profile['domain'] ?? 'AWS & Data Analysis')),
        'location' => trim((string) ($_POST['location'] ?? $profile['location'] ?? 'Hingoli, Maharashtra, India')),
        'email' => trim((string) ($_POST['email'] ?? $profile['email'] ?? 'pavanlondhe.25@gmail.com')),
        'github' => trim((string) ($_POST['github'] ?? $profile['github'] ?? 'https://github.com/')),
        'linkedin' => trim((string) ($_POST['linkedin'] ?? $profile['linkedin'] ?? 'https://www.linkedin.com/')),
        'profile_image' => trim((string) ($_POST['profile_image'] ?? $profile['profile_image'] ?? 'assets/images/image')),
        'about' => trim((string) ($_POST['about'] ?? $profile['about'] ?? '')),
        'current_learning' => array_filter(array_map('trim', explode(',', (string) ($_POST['current_learning'] ?? 'Full Stack Development, AWS, Data Analysis'))))
    ];

    saveSiteData($data);
    $message = 'Profile updated successfully.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body { background: #f4f7fb; }
        .admin-shell { width: min(1000px, calc(100% - 2rem)); margin: 0 auto; padding: 2rem 0 4rem; }
        .admin-nav { display: flex; flex-wrap: wrap; gap: 0.7rem; margin-bottom: 1.6rem; }
        .admin-nav a { background: white; border: 1px solid var(--border); border-radius: 999px; padding: 0.7rem 1rem; font-weight: 600; }
        .admin-panel { background: white; border: 1px solid var(--border); border-radius: 24px; padding: 1.5rem; box-shadow: var(--shadow); }
        .form-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1rem; }
        .field-group { display: grid; gap: 0.4rem; }
        .field-group input, .field-group textarea { width: 100%; border: 1px solid var(--border); border-radius: 12px; padding: 0.8rem 0.9rem; }
        .field-group textarea { min-height: 140px; resize: vertical; }
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

        <div class="admin-panel">
            <p class="eyebrow dark">Profile Settings</p>
            <h1>Update public profile</h1>
            <?php if ($message): ?><p class="form-status success"><?= htmlspecialchars($message) ?></p><?php endif; ?>

            <form method="post" class="form-grid">
                <div class="field-group">
                    <label>Name</label>
                    <input type="text" name="name" value="<?= htmlspecialchars($profile['name'] ?? 'Pavan Londhe') ?>">
                </div>
                <div class="field-group">
                    <label>Role</label>
                    <input type="text" name="role" value="<?= htmlspecialchars($profile['role'] ?? '2nd Year Information Technology Engineering Student') ?>">
                </div>
                <div class="field-group">
                    <label>College</label>
                    <input type="text" name="college" value="<?= htmlspecialchars($profile['college'] ?? 'TGPCET, Nagpur') ?>">
                </div>
                <div class="field-group">
                    <label>Branch</label>
                    <input type="text" name="branch" value="<?= htmlspecialchars($profile['branch'] ?? 'Information Technology (IT)') ?>">
                </div>
                <div class="field-group">
                    <label>Year</label>
                    <input type="text" name="year" value="<?= htmlspecialchars($profile['year'] ?? '2nd Year') ?>">
                </div>
                <div class="field-group">
                    <label>Current Focus</label>
                    <input type="text" name="current_focus" value="<?= htmlspecialchars($profile['current_focus'] ?? 'Full Stack Development') ?>">
                </div>
                <div class="field-group">
                    <label>Domain</label>
                    <input type="text" name="domain" value="<?= htmlspecialchars($profile['domain'] ?? 'AWS & Data Analysis') ?>">
                </div>
                <div class="field-group">
                    <label>Location</label>
                    <input type="text" name="location" value="<?= htmlspecialchars($profile['location'] ?? 'Hingoli, Maharashtra, India') ?>">
                </div>
                <div class="field-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($profile['email'] ?? 'pavanlondhe.25@gmail.com') ?>">
                </div>
                <div class="field-group">
                    <label>GitHub URL</label>
                    <input type="text" name="github" value="<?= htmlspecialchars($profile['github'] ?? 'https://github.com/') ?>">
                </div>
                <div class="field-group">
                    <label>LinkedIn URL</label>
                    <input type="text" name="linkedin" value="<?= htmlspecialchars($profile['linkedin'] ?? 'https://www.linkedin.com/') ?>">
                </div>
                <div class="field-group">
                    <label>Profile Image Path</label>
                    <input type="text" name="profile_image" value="<?= htmlspecialchars($profile['profile_image'] ?? 'assets/images/image') ?>">
                </div>
                <div class="field-group" style="grid-column: 1 / -1;">
                    <label>About Me</label>
                    <textarea name="about"><?= htmlspecialchars($profile['about'] ?? '') ?></textarea>
                </div>
                <div class="field-group" style="grid-column: 1 / -1;">
                    <label>Current Learning (comma separated)</label>
                    <input type="text" name="current_learning" value="<?= htmlspecialchars(implode(', ', $profile['current_learning'] ?? ['Full Stack Development', 'AWS', 'Data Analysis'])) ?>">
                </div>

                <div style="grid-column: 1 / -1;">
                    <button type="submit" class="btn btn-primary">Save Profile</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
