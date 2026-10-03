<?php

session_start();

function requireAdmin(): void
{
    if (empty($_SESSION['admin_logged_in'])) {
        header('Location: /professional-portfolio/admin/login.php');
        exit();
    }
}

function redirectIfLoggedIn(): void
{
    if (!empty($_SESSION['admin_logged_in'])) {
        header('Location: /professional-portfolio/admin/dashboard.php');
        exit();
    }
}
