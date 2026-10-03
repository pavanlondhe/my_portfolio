<?php
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../includes/auth.php';
requireAdmin();

$data = loadSiteData();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['resume_file']) && $_FILES['resume_file']['error'] === UPLOAD_ERR_OK) {
        $tmp = $_FILES['resume_file']['tmp_name'];
        $name = basename($_FILES['resume_file']['name']);
        $uploadDir = __DIR__ . '/../assets/resume';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $target = $uploadDir . '/resume.pdf';
        if (move_uploaded_file($tmp, $target)) {
            $data['resume'] = ['path' => 'assets/resume/resume.pdf', 'status' => 'Available'];
            saveSiteData($data);
            $message = 'Resume uploaded successfully.';
        } else {
            $message = 'Could not upload file. Please try again.';
        }
    } else {
        $message = 'Please select a valid PDF file.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume | Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body { background: #f4f7fb; }
        .admin-shell { width: min(900px, calc(100% - 2rem)); margin: 0 auto; padding: 2rem 0 4rem; }
        .admin-nav { display: flex; flex-wrap: wrap; gap: 0.7rem; margin-bottom: 1.6rem; }
        .admin-nav a { background: white; border: 1px solid var(--border); border-radius: 999px; padding: 0.7rem 1rem; font-weight: 600; }
        .panel { background: white; border: 1px solid var(--border); border-radius: 24px; padding: 1.5rem; box-shadow: var(--shadow); }
        .field-group { display: grid; gap: 0.4rem; }
        .field-group input { width: 100%; border: 1px solid var(--border); border-radius: 12px; padding: 0.8rem 0.9rem; }
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
            <p class="eyebrow dark">Resume</p>
            <h1>Upload Latest Resume PDF</h1>
            <?php if ($message): ?><p class="form-status success"><?= htmlspecialchars($message) ?></p><?php endif; ?>
            <form method="post" enctype="multipart/form-data">
                <div class="field-group">
                    <label>Resume PDF File</label>
                    <input type="file" name="resume_file" accept="application/pdf" required>
                </div>
                <div style="margin-top: 1rem;">
                    <button type="submit" class="btn btn-primary">Upload Resume</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
