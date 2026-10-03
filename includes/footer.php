    <footer class="site-footer">
        <div class="container footer-grid">
            <div>
                <a href="index.php" class="brand footer-brand">Pavan<span>.</span></a>
                <p class="footer-text">2nd Year IT Engineering Student | Full Stack Developer | AWS & Data Analysis</p>
            </div>

            <div>
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="index.php#home">Home</a></li>
                    <li><a href="index.php#about">About</a></li>
                    <li><a href="index.php#projects">Projects</a></li>
                    <li><a href="index.php#resume">Resume</a></li>
                    <li><a href="index.php#contact">Contact</a></li>
                </ul>
            </div>

            <div>
                <h3>Connect</h3>
                <div class="footer-socials">
                    <a href="<?= htmlspecialchars($data['settings']['github_url'] ?? '#') ?>" target="_blank" rel="noopener"><i class="fa-brands fa-github"></i></a>
                    <a href="<?= htmlspecialchars($data['settings']['linkedin_url'] ?? '#') ?>" target="_blank" rel="noopener"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="mailto:<?= htmlspecialchars($data['profile']['email'] ?? 'hello@example.com') ?>"><i class="fa-solid fa-envelope"></i></a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container footer-row">
                <p>© <span id="year"></span> Pavan Londhe. All rights reserved.</p>
                <p><?= htmlspecialchars($data['settings']['footer_text'] ?? 'Built with HTML, CSS, JavaScript and PHP.') ?></p>
            </div>
        </div>
    </footer>

    <button class="back-to-top" aria-label="Back to top"><i class="fa-solid fa-arrow-up"></i></button>
    <script src="assets/js/script.js"></script>
</body>
</html>
