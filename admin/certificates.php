<?php
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../includes/auth.php';
requireAdmin();

$data = loadSiteData();
$certificates = $data['certificates'] ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newItem = [
        'id' => time(),
        'name' => trim((string) ($_POST['name'] ?? '')),
        'organization' => trim((string) ($_POST['organization'] ?? '')),
        'date' => trim((string) ($_POST['date'] ?? '')),
        'category' => trim((string) ($_POST['category'] ?? 'Workshop')),
        'credential_id' => trim((string) ($_POST['credential_id'] ?? '')),
        'image' => trim((string) ($_POST['image'] ?? 'assets/certificates/certificate-placeholder.svg')),
        'credential_url' => trim((string) ($_POST['credential_url'] ?? '#'))
    ];

    if ($newItem['name'] !== '') {
        $certificates[] = $newItem;
        $data['certificates'] = $certificates;
        saveSiteData($data);
        header('Location: /professional-portfolio/admin/certificates.php?success=1');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificates | Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body { background: #f4f7fb; }
        .admin-shell { width: min(1100px, calc(100% - 2rem)); margin: 0 auto; padding: 2rem 0 4rem; }
        .admin-nav { display: flex; flex-wrap: wrap; gap: 0.7rem; margin-bottom: 1.6rem; }
        .admin-nav a { background: white; border: 1px solid var(--border); border-radius: 999px; padding: 0.7rem 1rem; font-weight: 600; }
        .panel { background: white; border: 1px solid var(--border); border-radius: 24px; padding: 1.5rem; box-shadow: var(--shadow); }
        .form-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1rem; }
        .field-group { display: grid; gap: 0.4rem; }
        .field-group input, .field-group textarea { width: 100%; border: 1px solid var(--border); border-radius: 12px; padding: 0.8rem 0.9rem; }
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
            <p class="eyebrow dark">Certificates</p>
            <h1>Add Certificate</h1>
            <?php if (isset($_GET['success'])): ?><p class="form-status success">Certificate added.</p><?php endif; ?>
            <form method="post" class="form-grid">
                <div class="field-group">
                    <label>Certificate Name</label>
                    <input type="text" name="name" required>
                </div>
                <div class="field-group">
                    <label>Organization</label>
                    <input type="text" name="organization" required>
                </div>
                <div class="field-group">
                    <label>Date</label>
                    <input type="text" name="date" placeholder="March 2026">
                </div>
                <div class="field-group">
                    <label>Category</label>
                    <input type="text" name="category" value="Workshop">
                </div>
                <div class="field-group">
                    <label>Credential ID</label>
                    <input type="text" name="credential_id">
                </div>
                <div class="field-group">
                    <label>Image Path</label>
                    <input type="text" name="image" value="assets/certificates/certificate-placeholder.svg">
                </div>
                <div class="field-group" style="grid-column: 1 / -1;">
                    <label>Credential URL</label>
                    <input type="text" name="credential_url" value="#">
                </div>
                <div style="grid-column: 1 / -1;">
                    <button type="submit" class="btn btn-primary">Save Certificate</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
