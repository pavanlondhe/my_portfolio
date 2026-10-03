<?php
require __DIR__ . '/config/database.php';

$contactStatus = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['contact_submit'])) {
    $name = trim((string) ($_POST['name'] ?? ''));
    $email = trim((string) ($_POST['email'] ?? ''));
    $subject = trim((string) ($_POST['subject'] ?? ''));
    $message = trim((string) ($_POST['message'] ?? ''));

    if ($name !== '' && $email !== '' && $subject !== '' && strlen($message) >= 20) {
        $saved = saveContactMessage([
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $message,
        ]);
        $contactStatus = $saved ? 'Thank you! Your message has been saved successfully.' : 'There was a problem saving your message. Please try again.';
    } else {
        $contactStatus = 'Please provide valid name, email, subject and a clear message.';
    }
}

$data = loadSiteData();
$profile = $data['profile'] ?? [];
$settings = $data['settings'] ?? [];
$skills = $data['skills'] ?? [];
$projects = $data['projects'] ?? [];
$websites = $data['websites'] ?? [];
$certificates = $data['certificates'] ?? [];
$achievements = $data['achievements'] ?? [];
$education = $data['education'] ?? [];
$resume = $data['resume'] ?? [];
$awsData = $data['aws_data'] ?? [
    'title' => 'AWS & Data Analysis',
    'description' => 'AWS and Data Analysis are my current areas of interest. I am exploring cloud technologies, data handling, visualization and analytical workflows while continuing my Full Stack Development journey.',
    'aws_cards' => [
        ['title' => 'AWS', 'items' => ['Cloud Fundamentals', 'AWS Services', 'Cloud Deployment', 'Currently Learning']],
        ['title' => 'Data Analysis', 'items' => ['Python', 'Data Processing', 'Data Visualization', 'Analytical Thinking', 'Currently Learning']],
    ],
];

$activeNav = 'home';
include __DIR__ . '/includes/header.php';
?>

<main>
    <section id="home" class="hero section">
        <div class="container hero-grid">
            <div class="hero-copy">
                <p class="eyebrow">INFORMATION TECHNOLOGY ENGINEERING STUDENT</p>
                <h1><?= htmlspecialchars($profile['name'] ?? 'Pavan Londhe') ?></h1>
                <h2>Full Stack Developer in Progress</h2>
                <p>
                    I am a 2nd year Information Technology Engineering student at <?= htmlspecialchars($profile['college'] ?? 'Tulshiramji Gaikwad-Patil College of Engineering and Technology, Nagpur') ?>,
                    currently building my skills in Full Stack Development, AWS and Data Analysis.
                </p>
                <div class="cta-row">
                    <a href="#projects" class="btn btn-primary">View My Work</a>
                    <a href="<?= htmlspecialchars($resume['path'] ?? 'assets/resume/resume.pdf') ?>" class="btn btn-secondary" target="_blank" rel="noopener">View Resume</a>
                    <a href="#contact" class="btn btn-secondary">Contact Me</a>
                </div>
                <div class="social-row">
                    <a href="<?= htmlspecialchars($settings['github_url'] ?? '#') ?>" target="_blank" rel="noopener" aria-label="GitHub"><i class="fa-brands fa-github"></i> GitHub</a>
                    <a href="<?= htmlspecialchars($settings['linkedin_url'] ?? '#') ?>" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i> LinkedIn</a>
                    <a href="mailto:<?= htmlspecialchars($profile['email'] ?? 'hello@example.com') ?>" aria-label="Email"><i class="fa-solid fa-envelope"></i> Email</a>
                </div>
            </div>

            <div class="hero-visual">
                <div class="profile-card-visual">
                    <img src="<?= htmlspecialchars($profile['profile_image'] ?? 'assets/images/profile/profile-placeholder.svg') ?>" alt="Pavan Londhe profile image">
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="section alt-section">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow dark">About Me</p>
                <h2>Simple, practical, and focused on building real technology skills.</h2>
            </div>

            <div class="about-grid">
                <div class="about-copy">
                    <p><?= htmlspecialchars($profile['about'] ?? '') ?></p>
                </div>

                <aside class="info-card">
                    <div class="info-header">
                        <div class="mini-photo">
                            <img src="<?= htmlspecialchars($profile['profile_image'] ?? 'assets/images/profile/profile-placeholder.svg') ?>" alt="Pavan Londhe mini profile">
                        </div>
                        <div>
                            <h3><?= htmlspecialchars($profile['name'] ?? 'Pavan Londhe') ?></h3>
                            <p><?= htmlspecialchars($profile['role'] ?? '2nd Year IT Engineering Student') ?></p>
                        </div>
                    </div>

                    <div class="info-list">
                        <div><span>Name</span><strong><?= htmlspecialchars($profile['name'] ?? 'Pavan Londhe') ?></strong></div>
                        <div><span>Education</span><strong>B.Tech / Engineering — Information Technology</strong></div>
                        <div><span>Year</span><strong><?= htmlspecialchars($profile['year'] ?? '2nd Year') ?></strong></div>
                        <div><span>College</span><strong><?= htmlspecialchars($profile['college'] ?? 'TGPCET, Nagpur') ?></strong></div>
                        <div><span>Location</span><strong><?= htmlspecialchars($profile['location'] ?? 'Hingoli, Maharashtra, India') ?></strong></div>
                        <div><span>Current Focus</span><strong><?= htmlspecialchars($profile['current_focus'] ?? 'Full Stack Development') ?></strong></div>
                        <div><span>Domain</span><strong><?= htmlspecialchars($profile['domain'] ?? 'AWS & Data Analysis') ?></strong></div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <section id="skills" class="section">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow dark">Skills</p>
                <h2>Technologies I am building with and learning every day.</h2>
            </div>

            <div class="skills-grid">
                <?php
                $categories = ['Frontend Development', 'Programming Languages', 'Backend / Web Development', 'Currently Learning'];
                foreach ($categories as $category):
                    $items = array_filter($skills, fn($skill) => ($skill['category'] ?? '') === $category);
                    if (empty($items)) continue;
                ?>
                <div class="skill-block">
                    <h3><?= htmlspecialchars($category) ?></h3>
                    <div class="chip-grid">
                        <?php foreach ($items as $skill): ?>
                            <div class="tech-chip">
                                <i class="<?= htmlspecialchars($skill['icon'] ?? 'fa-solid fa-code') ?>"></i>
                                <span><?= htmlspecialchars($skill['name'] ?? '') ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="education" class="section alt-section">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow dark">Education</p>
                <h2>My academic journey in engineering and technology.</h2>
            </div>

            <div class="timeline">
                <?php foreach ($education as $edu): ?>
                    <article class="timeline-item">
                        <span class="timeline-year"><?= htmlspecialchars($edu['status'] ?? 'Currently Studying') ?></span>
                        <div class="timeline-card">
                            <h3><?= htmlspecialchars($edu['course'] ?? 'Bachelor of Engineering / Technology') ?></h3>
                            <p class="muted"><strong><?= htmlspecialchars($edu['branch'] ?? 'Information Technology') ?></strong></p>
                            <p><?= htmlspecialchars($edu['college'] ?? 'Tulshiramji Gaikwad-Patil College of Engineering and Technology, Nagpur') ?></p>
                            <p><?= htmlspecialchars($edu['year'] ?? '2nd Year') ?></p>
                            <p><?= htmlspecialchars($edu['description'] ?? '') ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="projects" class="section">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow dark">My Projects</p>
                <h2>Projects that reflect my learning, problem solving and development interest.</h2>
            </div>

            <div class="filter-bar">
                <button class="filter-btn active" type="button" data-filter="all">All</button>
                <button class="filter-btn" type="button" data-filter="Web Development">Web Development</button>
                <button class="filter-btn" type="button" data-filter="PHP">PHP</button>
                <button class="filter-btn" type="button" data-filter="JavaScript">JavaScript</button>
                <button class="filter-btn" type="button" data-filter="Python">Python</button>
                <button class="filter-btn" type="button" data-filter="Academic">Academic</button>
                <button class="filter-btn" type="button" data-filter="Other">Other</button>
            </div>

            <div class="project-grid">
                <?php foreach ($projects as $project): ?>
                    <?php
                    $tags = is_array($project['technologies'] ?? []) ? $project['technologies'] : [$project['technologies'] ?? 'Web'];
                    $projectCategory = strtolower((string) ($project['category'] ?? 'Other'));
                    ?>
                    <article class="project-card" data-category="<?= htmlspecialchars(strtolower($project['category'] ?? 'Other')) ?>">
                        <div class="project-image">
                            <img src="<?= htmlspecialchars($project['image'] ?? 'assets/projects/project-placeholder.svg') ?>" alt="<?= htmlspecialchars($project['name'] ?? 'Project image') ?>">
                        </div>
                        <div class="project-content">
                            <h3><?= htmlspecialchars($project['name'] ?? 'Project Name') ?></h3>
                            <p><?= htmlspecialchars($project['description'] ?? '') ?></p>
                            <div class="tag-list">
                                <?php foreach ($tags as $tag): ?>
                                    <span><?= htmlspecialchars((string) $tag) ?></span>
                                <?php endforeach; ?>
                            </div>
                            <div class="project-links">
                                <a href="<?= htmlspecialchars($project['live_url'] ?? '#') ?>" class="btn btn-primary small" target="_blank" rel="noopener">View Project</a>
                                <a href="<?= htmlspecialchars($project['github_url'] ?? '#') ?>" class="btn btn-secondary small" target="_blank" rel="noopener">GitHub</a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="websites" class="section alt-section">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow dark">Websites & Digital Projects</p>
                <h2>Selected websites and digital project work.</h2>
            </div>

            <div class="website-grid">
                <?php foreach ($websites as $website): ?>
                    <article class="website-card">
                        <img src="<?= htmlspecialchars($website['image'] ?? 'assets/projects/project-placeholder.svg') ?>" alt="<?= htmlspecialchars($website['name'] ?? 'Website preview') ?>">
                        <div class="website-content">
                            <h3><?= htmlspecialchars($website['name'] ?? 'Website Name') ?></h3>
                            <p><?= htmlspecialchars($website['description'] ?? '') ?></p>
                            <div class="meta-line">
                                <span><?= htmlspecialchars($website['technology'] ?? 'Web') ?></span>
                                <span class="status-badge"><?= htmlspecialchars($website['status'] ?? 'Development') ?></span>
                            </div>
                            <div class="project-links">
                                <a href="<?= htmlspecialchars($website['live_url'] ?? '#') ?>" class="btn btn-primary small" target="_blank" rel="noopener">Live Website</a>
                                <a href="<?= htmlspecialchars($website['github_url'] ?? '#') ?>" class="btn btn-secondary small" target="_blank" rel="noopener">GitHub</a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="resume" class="section">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow dark">My Resume</p>
                <h2>View my latest resume containing my education, skills, projects and career interests.</h2>
            </div>

            <div class="resume-box">
                <div class="resume-icon"><i class="fa-solid fa-file-pdf"></i></div>
                <div>
                    <h3>Pavan Londhe Resume</h3>
                    <p>2nd Year Information Technology Engineering Student</p>
                </div>
                <div class="resume-actions">
                    <a href="<?= htmlspecialchars($resume['path'] ?? 'assets/resume/resume.pdf') ?>" class="btn btn-primary" target="_blank" rel="noopener">View Resume</a>
                    <a href="<?= htmlspecialchars($resume['path'] ?? 'assets/resume/resume.pdf') ?>" class="btn btn-secondary" download>Download Resume</a>
                </div>
            </div>
        </div>
    </section>

    <section id="certificates" class="section alt-section">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow dark">Certificates & Credentials</p>
                <h2>Learning progress and technical milestones.</h2>
            </div>

            <div class="certificate-grid">
                <?php foreach ($certificates as $certificate): ?>
                    <article class="certificate-card">
                        <img src="<?= htmlspecialchars($certificate['image'] ?? 'assets/certificates/certificate-placeholder.svg') ?>" alt="<?= htmlspecialchars($certificate['name'] ?? 'Certificate') ?>">
                        <div class="certificate-content">
                            <h3><?= htmlspecialchars($certificate['name'] ?? 'Certificate Name') ?></h3>
                            <p><?= htmlspecialchars($certificate['organization'] ?? 'Organization') ?></p>
                            <div class="meta-line small-meta">
                                <span><?= htmlspecialchars($certificate['date'] ?? 'Date') ?></span>
                                <span><?= htmlspecialchars($certificate['category'] ?? 'Other') ?></span>
                            </div>
                            <small><?= htmlspecialchars($certificate['credential_id'] ?? 'Credential ID unavailable') ?></small>
                            <div class="project-links">
                                <a href="<?= htmlspecialchars($certificate['credential_url'] ?? '#') ?>" class="btn btn-secondary small" target="_blank" rel="noopener">View Certificate</a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="achievements" class="section">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow dark">Achievements & Activities</p>
                <h2>Academic and technical activities that support my growth.</h2>
            </div>

            <div class="timeline">
                <?php foreach ($achievements as $achievement): ?>
                    <article class="timeline-item">
                        <span class="timeline-year"><?= htmlspecialchars($achievement['date'] ?? '2026') ?></span>
                        <div class="timeline-card">
                            <h3><?= htmlspecialchars($achievement['title'] ?? 'Achievement') ?></h3>
                            <p><?= htmlspecialchars($achievement['description'] ?? '') ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="aws" class="section alt-section">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow dark"><?= htmlspecialchars($awsData['title'] ?? 'AWS & Data Analysis') ?></p>
                <h2><?= htmlspecialchars($awsData['description'] ?? 'AWS and Data Analysis are my current areas of interest.') ?></h2>
            </div>

            <div class="double-grid">
                <?php foreach (($awsData['aws_cards'] ?? []) as $card): ?>
                    <div class="feature-box">
                        <h3><?= htmlspecialchars($card['title'] ?? 'Learning Area') ?></h3>
                        <ul>
                            <?php foreach (($card['items'] ?? []) as $item): ?>
                                <li><?= htmlspecialchars($item) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow dark">Currently Learning</p>
                <h2>Focused on building the foundation for my future career.</h2>
            </div>

            <div class="learning-row">
                <?php foreach ($profile['current_learning'] ?? [] as $item): ?>
                    <span class="learning-pill"><?= htmlspecialchars($item) ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="contact" class="section contact-section">
        <div class="container contact-grid">
            <div class="contact-copy">
                <p class="eyebrow dark">Let's Connect</p>
                <h2>Open to learning, projects, internships and meaningful collaboration.</h2>
                <p>
                    I enjoy building practical software projects and learning through real-world development. If you are working on a project, internship opportunity, or technical discussion, I would be glad to connect.
                </p>

                <ul class="contact-list">
                    <li><i class="fa-solid fa-envelope"></i> <?= htmlspecialchars($profile['email'] ?? 'pavanlondhe.25@gmail.com') ?></li>
                    <li><i class="fa-brands fa-github"></i> <?= htmlspecialchars($settings['github_url'] ?? 'https://github.com/') ?></li>
                    <li><i class="fa-brands fa-linkedin-in"></i> <?= htmlspecialchars($settings['linkedin_url'] ?? 'https://www.linkedin.com/') ?></li>
                    <li><i class="fa-solid fa-location-dot"></i> <?= htmlspecialchars($profile['location'] ?? 'Hingoli, Maharashtra, India') ?></li>
                </ul>
            </div>

            <div class="contact-box">
                <?php if ($contactStatus): ?>
                    <p class="form-status success"><?= htmlspecialchars($contactStatus) ?></p>
                <?php endif; ?>
                <form class="contact-form" id="contactForm" method="post" novalidate>
                    <input type="hidden" name="contact_submit" value="1">
                    <div class="field-group">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" placeholder="Your name">
                        <small class="error-message" data-error-for="name"></small>
                    </div>

                    <div class="field-group">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" placeholder="your@email.com">
                        <small class="error-message" data-error-for="email"></small>
                    </div>

                    <div class="field-group">
                        <label for="subject">Subject</label>
                        <input id="subject" name="subject" type="text" placeholder="Project or opportunity">
                        <small class="error-message" data-error-for="subject"></small>
                    </div>

                    <div class="field-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="Write your message here..."></textarea>
                        <small class="error-message" data-error-for="message"></small>
                    </div>

                    <button type="submit" class="btn btn-primary">Send Message</button>
                    <p class="form-status" aria-live="polite"></p>
                    <p class="backend-note">Your message is saved in the admin dashboard once submitted.</p>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
