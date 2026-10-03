<?php

const SITE_ROOT = __DIR__ . '/..';
const DATA_FILE = SITE_ROOT . '/data/site.json';
const DEFAULT_ADMIN_EMAIL = 'admin@pavanportfolio.local';
const DEFAULT_ADMIN_PASSWORD = 'admin123';
const DEFAULT_ADMIN_PASSWORD_HASH = '$2y$10$Wnle7rF5EX8Q7mkXDVVvNO/8VgU9bKxZJzhQ1mufJfi8XqziwQ5Se';

function getDefaultData(): array
{
    return [
        'profile' => [
            'name' => 'Pavan Londhe',
            'role' => '2nd Year Information Technology Engineering Student',
            'college' => 'Tulshiramji Gaikwad-Patil College of Engineering and Technology, Nagpur',
            'branch' => 'Information Technology',
            'year' => '2nd Year',
            'current_focus' => 'Full Stack Development',
            'domain' => 'AWS & Data Analysis',
            'location' => 'At Post Lakh, Taluka Aundha (Nagnath), District Hingoli, Maharashtra, India',
            'email' => 'pavanlondhe.25@gmail.com',
            'github' => 'https://github.com/',
            'linkedin' => 'https://www.linkedin.com/',
            'profile_image' => 'assets/images/image',
            'about' => 'I am Pavan Londhe, a 2nd year Information Technology Engineering student at Tulshiramji Gaikwad-Patil College of Engineering and Technology, Nagpur. My current focus is Full Stack Development. I have learned HTML, CSS, JavaScript, Python, C and PHP and I am continuing to develop my backend, database and software development skills. Alongside web development, I am interested in AWS and Data Analysis. I enjoy creating practical websites and software projects and learning through hands-on development.',
            'current_learning' => ['Full Stack Development', 'AWS', 'Data Analysis']
        ],
        'skills' => [
            ['name' => 'HTML', 'category' => 'Frontend Development', 'icon' => 'fa-brands fa-html5', 'status' => 'Learned'],
            ['name' => 'CSS', 'category' => 'Frontend Development', 'icon' => 'fa-brands fa-css3-alt', 'status' => 'Learned'],
            ['name' => 'JavaScript', 'category' => 'Frontend Development', 'icon' => 'fa-brands fa-js', 'status' => 'Learned'],
            ['name' => 'C', 'category' => 'Programming Languages', 'icon' => 'fa-solid fa-code', 'status' => 'Learned'],
            ['name' => 'Python', 'category' => 'Programming Languages', 'icon' => 'fa-brands fa-python', 'status' => 'Learned'],
            ['name' => 'PHP', 'category' => 'Programming Languages', 'icon' => 'fa-brands fa-php', 'status' => 'Learned'],
            ['name' => 'Backend Fundamentals', 'category' => 'Backend / Web Development', 'icon' => 'fa-solid fa-server', 'status' => 'Learned'],
            ['name' => 'Database Integration', 'category' => 'Backend / Web Development', 'icon' => 'fa-solid fa-database', 'status' => 'Learned'],
            ['name' => 'Full Stack Development', 'category' => 'Currently Learning', 'icon' => 'fa-solid fa-layer-group', 'status' => 'Currently Learning'],
            ['name' => 'AWS', 'category' => 'Currently Learning', 'icon' => 'fa-brands fa-aws', 'status' => 'Currently Learning'],
            ['name' => 'Data Analysis', 'category' => 'Currently Learning', 'icon' => 'fa-solid fa-chart-line', 'status' => 'Currently Learning']
        ],
        'projects' => [
            [
                'id' => 1,
                'name' => 'Smart Print System',
                'description' => 'A smart printing workflow project focused on digital file submission, QR-based access and print desk management.',
                'category' => 'Web Development',
                'technologies' => ['HTML', 'CSS', 'JavaScript', 'PHP', 'Database'],
                'github_url' => 'https://github.com/',
                'live_url' => '#',
                'status' => 'Development',
                'image' => 'assets/projects/project-smart-print.svg',
                'features' => ['QR-based workflow', 'File upload', 'Photo upload', 'Admin desk', 'Print management']
            ],
            [
                'id' => 2,
                'name' => 'Voting Management System',
                'description' => 'A web-based voting management project created for managing election-related information and candidate data.',
                'category' => 'PHP',
                'technologies' => ['HTML', 'CSS', 'JavaScript', 'PHP', 'MySQL'],
                'github_url' => 'https://github.com/',
                'live_url' => '#',
                'status' => 'Completed',
                'image' => 'assets/projects/project-voting.svg',
                'features' => []
            ],
            [
                'id' => 3,
                'name' => 'FacultyCare AI',
                'description' => 'A faculty workload and risk analysis dashboard created as an academic technology project.',
                'category' => 'Academic',
                'technologies' => ['JavaScript', 'Chart.js', 'Dashboard', 'Data Analysis'],
                'github_url' => 'https://github.com/',
                'live_url' => '#',
                'status' => 'Completed',
                'image' => 'assets/projects/project-facultycare.svg',
                'features' => []
            ],
            [
                'id' => 4,
                'name' => 'Ideal Lab / College Project',
                'description' => 'A college-related technology project supporting learning, digital workflows and practical experimentation.',
                'category' => 'Academic',
                'technologies' => ['HTML', 'CSS', 'JavaScript', 'College Project'],
                'github_url' => 'https://github.com/',
                'live_url' => '#',
                'status' => 'In Progress',
                'image' => 'assets/projects/project-ideal-lab.svg',
                'features' => []
            ]
        ],
        'websites' => [
            ['id' => 1, 'name' => 'Portfolio Website', 'description' => 'Personal developer portfolio for showcasing projects and profile.', 'technology' => 'HTML, CSS, JavaScript', 'live_url' => '#', 'github_url' => 'https://github.com/', 'status' => 'Live', 'image' => 'assets/projects/project-smart-print.svg'],
            ['id' => 2, 'name' => 'Student Project Hub', 'description' => 'A project showcase page for academic work and learning progress.', 'technology' => 'PHP, HTML, CSS', 'live_url' => '#', 'github_url' => 'https://github.com/', 'status' => 'Development', 'image' => 'assets/projects/project-voting.svg']
        ],
        'certificates' => [
            ['id' => 1, 'name' => 'Web Development Fundamentals', 'organization' => 'SkillForge Academy', 'date' => 'March 2026', 'category' => 'Web Development', 'credential_id' => 'WDF-2048', 'image' => 'assets/certificates/certificate-1.svg', 'credential_url' => '#', 'pdf_url' => 'assets/certificates/certificate-1.pdf'],
            ['id' => 2, 'name' => 'PHP & Database Workshop', 'organization' => 'CodeCraft Lab', 'date' => 'January 2026', 'category' => 'Workshop', 'credential_id' => 'PHP-1187', 'image' => 'assets/certificates/certificate-2.svg', 'credential_url' => '#', 'pdf_url' => 'assets/certificates/certificate-2.pdf'],
            ['id' => 3, 'name' => 'Innovation Hackathon Participation', 'organization' => 'Campus Tech League', 'date' => 'December 2025', 'category' => 'Hackathon', 'credential_id' => 'HT-4311', 'image' => 'assets/certificates/certificate-3.svg', 'credential_url' => '#', 'pdf_url' => 'assets/certificates/certificate-3.pdf'],
            ['id' => 4, 'name' => 'JavaScript Essentials', 'organization' => 'TechNest Courses', 'date' => 'October 2025', 'category' => 'Programming', 'credential_id' => 'JS-9024', 'image' => 'assets/certificates/certificate-4.svg', 'credential_url' => '#', 'pdf_url' => 'assets/certificates/certificate-4.pdf']
        ],
        'achievements' => [
            ['id' => 1, 'title' => 'Engineering Projects', 'description' => 'Developed multiple practical software projects focused on web solutions and academic tools.', 'date' => '2026', 'category' => 'Project Development', 'image' => ''],
            ['id' => 2, 'title' => 'Hackathon Participation', 'description' => 'Participated in technology and innovation projects with a focus on problem solving.', 'date' => '2026', 'category' => 'Hackathon', 'image' => ''],
            ['id' => 3, 'title' => 'Technical Learning', 'description' => 'Completed learning modules and workshops to strengthen concepts in web development and programming.', 'date' => '2025', 'category' => 'Workshop', 'image' => '']
        ],
        'education' => [
            ['id' => 1, 'course' => 'Bachelor of Engineering / Technology', 'branch' => 'Information Technology', 'college' => 'Tulshiramji Gaikwad-Patil College of Engineering and Technology, Nagpur', 'year' => '2nd Year', 'status' => 'Currently Studying', 'description' => 'Building a strong foundation in software engineering, web development and practical technology learning.']
        ],
        'resume' => ['path' => 'assets/resume/resume.pdf', 'status' => 'Available', 'uploaded_at' => date('Y-m-d H:i:s')],
        'settings' => [
            'site_title' => 'Pavan Londhe | IT Engineering Student & Full Stack Developer',
            'meta_description' => 'Official portfolio of Pavan Londhe, a 2nd year Information Technology Engineering student at TGPCET Nagpur, focused on Full Stack Development, AWS and Data Analysis.',
            'footer_text' => 'Built with HTML, CSS, JavaScript and PHP.',
            'admin_email' => DEFAULT_ADMIN_EMAIL,
            'github_url' => 'https://github.com/',
            'linkedin_url' => 'https://www.linkedin.com/',
            'email' => 'pavanlondhe.25@gmail.com'
        ],
        'aws_data' => [
            'title' => 'AWS & Data Analysis',
            'description' => 'AWS and Data Analysis are my current areas of interest. I am exploring cloud technologies, data handling, visualization and analytical workflows while continuing my Full Stack Development journey.',
            'aws_cards' => [
                ['title' => 'AWS', 'items' => ['Cloud Fundamentals', 'AWS Services', 'Cloud Deployment', 'Currently Learning']],
                ['title' => 'Data Analysis', 'items' => ['Python', 'Data Processing', 'Data Visualization', 'Analytical Thinking', 'Currently Learning']]
            ]
        ],
        'contact_messages' => []
    ];
}

function getDbConnection(): ?PDO
{
    $host = getenv('DB_HOST') ?: 'localhost';
    $db = getenv('DB_NAME') ?: 'pavan_portfolio';
    $user = getenv('DB_USER') ?: 'root';
    $pass = getenv('DB_PASS') ?: '';
    $charset = 'utf8mb4';

    try {
        $dsn = "mysql:host={$host};dbname={$db};charset={$charset}";
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
        return $pdo;
    } catch (PDOException $e) {
        return null;
    }
}

function ensureDatabaseStructure(): void
{
    $pdo = getDbConnection();
    if (!$pdo) {
        return;
    }

    $tables = [
        'users' => "CREATE TABLE IF NOT EXISTS users (id INT AUTO_INCREMENT PRIMARY KEY, email VARCHAR(255) NOT NULL UNIQUE, password_hash VARCHAR(255) NOT NULL, role VARCHAR(50) DEFAULT 'admin', created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)",
        'profile' => "CREATE TABLE IF NOT EXISTS profile (id INT AUTO_INCREMENT PRIMARY KEY, data JSON NOT NULL)",
        'skills' => "CREATE TABLE IF NOT EXISTS skills (id INT AUTO_INCREMENT PRIMARY KEY, data JSON NOT NULL)",
        'education' => "CREATE TABLE IF NOT EXISTS education (id INT AUTO_INCREMENT PRIMARY KEY, data JSON NOT NULL)",
        'projects' => "CREATE TABLE IF NOT EXISTS projects (id INT AUTO_INCREMENT PRIMARY KEY, data JSON NOT NULL)",
        'websites' => "CREATE TABLE IF NOT EXISTS websites (id INT AUTO_INCREMENT PRIMARY KEY, data JSON NOT NULL)",
        'certificates' => "CREATE TABLE IF NOT EXISTS certificates (id INT AUTO_INCREMENT PRIMARY KEY, data JSON NOT NULL)",
        'achievements' => "CREATE TABLE IF NOT EXISTS achievements (id INT AUTO_INCREMENT PRIMARY KEY, data JSON NOT NULL)",
        'resume' => "CREATE TABLE IF NOT EXISTS resume (id INT AUTO_INCREMENT PRIMARY KEY, data JSON NOT NULL)",
        'settings' => "CREATE TABLE IF NOT EXISTS settings (id INT AUTO_INCREMENT PRIMARY KEY, data JSON NOT NULL)",
        'aws_data' => "CREATE TABLE IF NOT EXISTS aws_data (id INT AUTO_INCREMENT PRIMARY KEY, data JSON NOT NULL)",
        'contact_messages' => "CREATE TABLE IF NOT EXISTS contact_messages (id INT AUTO_INCREMENT PRIMARY KEY, data JSON NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)",
    ];

    foreach ($tables as $query) {
        $pdo->exec($query);
    }

    $stmt = $pdo->prepare('SELECT id FROM users WHERE email = :email LIMIT 1');
    $stmt->execute([':email' => DEFAULT_ADMIN_EMAIL]);
    if (!$stmt->fetch()) {
        $stmt = $pdo->prepare('INSERT INTO users (email, password_hash, role) VALUES (:email, :hash, :role)');
        $stmt->execute([
            ':email' => DEFAULT_ADMIN_EMAIL,
            ':hash' => password_hash(DEFAULT_ADMIN_PASSWORD, PASSWORD_BCRYPT),
            ':role' => 'admin',
        ]);
    }
}

function loadSiteData(): array
{
    ensureDatabaseStructure();

    $pdo = getDbConnection();
    if ($pdo) {
        $data = getDefaultData();
        $tables = ['profile', 'skills', 'education', 'projects', 'websites', 'certificates', 'achievements', 'resume', 'settings', 'aws_data', 'contact_messages'];

        foreach ($tables as $table) {
            $stmt = $pdo->query("SELECT data FROM {$table} ORDER BY id");
            $rows = $stmt->fetchAll();
            $decoded = [];
            foreach ($rows as $row) {
                $decoded[] = json_decode((string) ($row['data'] ?? '[]'), true);
            }

            if ($table === 'profile' && !empty($decoded)) {
                $data['profile'] = $decoded[0] ?? $data['profile'];
            } elseif ($table === 'settings' && !empty($decoded)) {
                $data['settings'] = $decoded[0] ?? $data['settings'];
            } elseif ($table === 'resume' && !empty($decoded)) {
                $data['resume'] = $decoded[0] ?? $data['resume'];
            } elseif ($table === 'aws_data' && !empty($decoded)) {
                $data['aws_data'] = $decoded[0] ?? $data['aws_data'];
            } elseif ($table === 'contact_messages') {
                $data['contact_messages'] = $decoded;
            } else {
                $data[$table] = $decoded;
            }
        }

        return array_replace_recursive(getDefaultData(), $data);
    }

    if (!file_exists(DATA_FILE)) {
        saveSiteData(getDefaultData());
    }

    $content = file_get_contents(DATA_FILE);
    $data = json_decode((string) $content, true);
    if (!is_array($data)) {
        $data = getDefaultData();
    }

    return array_replace_recursive(getDefaultData(), $data);
}

function saveSiteData(array $data): bool
{
    $pdo = getDbConnection();
    if ($pdo) {
        ensureDatabaseStructure();

        $tables = [
            'profile' => [$data['profile'] ?? getDefaultData()['profile']],
            'skills' => $data['skills'] ?? [],
            'education' => $data['education'] ?? [],
            'projects' => $data['projects'] ?? [],
            'websites' => $data['websites'] ?? [],
            'certificates' => $data['certificates'] ?? [],
            'achievements' => $data['achievements'] ?? [],
            'resume' => [$data['resume'] ?? getDefaultData()['resume']],
            'settings' => [$data['settings'] ?? getDefaultData()['settings']],
            'aws_data' => [$data['aws_data'] ?? getDefaultData()['aws_data']],
            'contact_messages' => $data['contact_messages'] ?? [],
        ];

        foreach ($tables as $tableName => $items) {
            $pdo->exec("DELETE FROM `{$tableName}`");
            foreach ($items as $item) {
                $json = json_encode($item, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                $stmt = $pdo->prepare("INSERT INTO `{$tableName}` (data) VALUES (:data)");
                $stmt->execute([':data' => $json]);
            }
        }

        return true;
    }

    $dir = dirname(DATA_FILE);
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    return (bool) file_put_contents(DATA_FILE, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
}

function saveContactMessage(array $message): bool
{
    $data = loadSiteData();
    $messages = $data['contact_messages'] ?? [];
    $messages[] = $message;
    $data['contact_messages'] = $messages;
    return saveSiteData($data);
}

function getContactMessages(): array
{
    $data = loadSiteData();
    return $data['contact_messages'] ?? [];
}

function verifyAdminLogin(string $email, string $password): bool
{
    $email = trim(strtolower($email));
    $pdo = getDbConnection();

    if ($pdo) {
        ensureDatabaseStructure();
        $stmt = $pdo->prepare('SELECT password_hash FROM users WHERE email = :email LIMIT 1');
        $stmt->execute([':email' => strtolower($email)]);
        $row = $stmt->fetch();
        if ($row && isset($row['password_hash']) && password_verify($password, $row['password_hash'])) {
            return true;
        }
    }

    return strtolower($email) === strtolower(DEFAULT_ADMIN_EMAIL) && $password === DEFAULT_ADMIN_PASSWORD;
}
