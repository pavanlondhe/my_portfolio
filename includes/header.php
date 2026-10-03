<?php
$data = loadSiteData();
$profile = $data['profile'] ?? [];
$settings = $data['settings'] ?? [];
$siteTitle = $settings['site_title'] ?? ($profile['name'] ?? 'Pavan Londhe');
$activeNav = $activeNav ?? 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($siteTitle) ?></title>
    <meta name="description" content="Professional portfolio of Pavan Londhe, a 2nd year Information Technology Engineering student focused on Full Stack Development, AWS and Data Analysis.">
    <meta property="og:title" content="<?= htmlspecialchars($siteTitle) ?>">
    <meta property="og:description" content="Professional portfolio of Pavan Londhe, a 2nd year Information Technology Engineering student focused on Full Stack Development, AWS and Data Analysis.">
    <meta property="og:type" content="website">
    <link rel="icon" href="assets/images/profile/profile-placeholder.svg" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="site-header">
        <div class="container nav-wrap">
            <a href="index.php" class="brand">Pavan<span>.</span></a>

            <button class="menu-toggle" type="button" aria-label="Open navigation menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <nav class="main-nav" aria-label="Main navigation">
                <a href="index.php#home" class="<?= $activeNav === 'home' ? 'active' : '' ?>">Home</a>
                <a href="index.php#about" class="<?= $activeNav === 'about' ? 'active' : '' ?>">About</a>
                <a href="index.php#skills" class="<?= $activeNav === 'skills' ? 'active' : '' ?>">Skills</a>
                <a href="index.php#education" class="<?= $activeNav === 'education' ? 'active' : '' ?>">Education</a>
                <a href="index.php#projects" class="<?= $activeNav === 'projects' ? 'active' : '' ?>">Projects</a>
                <a href="index.php#websites" class="<?= $activeNav === 'websites' ? 'active' : '' ?>">Websites</a>
                <a href="index.php#resume" class="<?= $activeNav === 'resume' ? 'active' : '' ?>">Resume</a>
                <a href="index.php#certificates" class="<?= $activeNav === 'certificates' ? 'active' : '' ?>">Certificates</a>
                <a href="index.php#achievements" class="<?= $activeNav === 'achievements' ? 'active' : '' ?>">Achievements</a>
                <a href="index.php#aws" class="<?= $activeNav === 'aws' ? 'active' : '' ?>">AWS & Data</a>
                <a href="index.php#contact" class="<?= $activeNav === 'contact' ? 'active' : '' ?>">Contact</a>
            </nav>

            <a href="index.php#contact" class="btn btn-primary small">Contact Me</a>
        </div>
    </header>
