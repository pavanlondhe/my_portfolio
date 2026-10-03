<?php
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../includes/auth.php';
requireAdmin();

$data = loadSiteData();
$awsData = $data['aws_data'] ?? [
    'title' => 'AWS & Data Analysis',
    'description' => 'AWS and Data Analysis are my current areas of interest. I am exploring cloud technologies, data handling, visualization and analytical workflows while continuing my Full Stack Development journey.',
    'aws_cards' => [
        ['title' => 'AWS', 'items' => ['Cloud Fundamentals','AWS Services','Cloud Deployment','Currently Learning']],
        ['title' => 'Data Analysis', 'items' => ['Python','Data Processing','Data Visualization','Analytical Thinking','Currently Learning']],
    ],
];
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $awsData['title'] = trim((string) ($_POST['title'] ?? $awsData['title']));
    $awsData['description'] = trim((string) ($_POST['description'] ?? $awsData['description']));
    $awsData['aws_cards'] = [];
    $awsData['aws_cards'][] = [
        'title' => 'AWS',
        'items' => array_values(array_filter(array_map('trim', preg_split('/[,]+/', (string) ($_POST['aws_items'] ?? '')))))
    ];
    $awsData['aws_cards'][] = [
        'title' => 'Data Analysis',
        'items' => array_values(array_filter(array_map('trim', preg_split('/[,]+/', (string) ($_POST['data_items'] ?? '')))))
    ];

    $data['aws_data'] = $awsData;
    saveSiteData($data);
    $message = 'AWS & Data Analysis information updated.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AWS & Data | Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body { background: #f4f7fb; }
        .admin-shell { width: min(1000px, calc(100% - 2rem)); margin: 0 auto; padding: 2rem 0 4rem; }
        .admin-nav { display: flex; flex-wrap: wrap; gap: 0.7rem; margin-bottom: 1.6rem; }
        .admin-nav a { background: white; border: 1px solid var(--border); border-radius: 999px; padding: 0.7rem 1rem; font-weight: 600; }
        .panel { background: white; border: 1px solid var(--border); border-radius: 24px; padding: 1.5rem; box-shadow: var(--shadow); }
        .form-grid { display: grid; gap: 1rem; }
        .field-group { display: grid; gap: 0.4rem; }
        .field-group input, .field-group textarea { width: 100%; border: 1px solid var(--border); border-radius: 12px; padding: 0.8rem 0.9rem; }
        .field-group textarea { min-height: 120px; resize: vertical; }
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
            <p class="eyebrow dark">AWS & Data Analysis</p>
            <h1>Update learning focus</h1>
            <?php if ($message): ?><p class="form-status success"><?= htmlspecialchars($message) ?></p><?php endif; ?>

            <form method="post" class="form-grid">
                <div class="field-group">
                    <label>Section Title</label>
                    <input type="text" name="title" value="<?= htmlspecialchars($awsData['title'] ?? 'AWS & Data Analysis') ?>">
                </div>
                <div class="field-group">
                    <label>Description</label>
                    <textarea name="description"><?= htmlspecialchars($awsData['description'] ?? '') ?></textarea>
                </div>
                <div class="field-group">
                    <label>AWS items (comma separated)</label>
                    <input type="text" name="aws_items" value="<?= htmlspecialchars(implode(', ', $awsData['aws_cards'][0]['items'] ?? ['Cloud Fundamentals','AWS Services','Cloud Deployment','Currently Learning'])) ?>">
                </div>
                <div class="field-group">
                    <label>Data Analysis items (comma separated)</label>
                    <input type="text" name="data_items" value="<?= htmlspecialchars(implode(', ', $awsData['aws_cards'][1]['items'] ?? ['Python','Data Processing','Data Visualization','Analytical Thinking','Currently Learning'])) ?>">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
