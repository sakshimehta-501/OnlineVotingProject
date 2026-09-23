<?php

require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../database/db.php';

// Start session if not started yet
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
function is_logged_in(): bool
{
    return isset($_SESSION['user_id']);
}

// Get current user ID
function current_user_id()
{
    return $_SESSION['user_id'] ?? null;
}

// Get current user role
function current_role(): ?string
{
    return $_SESSION['role'] ?? null;
}

// Redirect to login if user is not logged in
function require_login(): void
{
    if (!is_logged_in()) {
        redirect('login.php');
    }
}

// Log in user by saving information in session
function login_user($userId, $role = 'voter', $username = '', $fullName = ''): void
{
    $_SESSION['user_id']   = $userId;
    $_SESSION['role']      = $role;
    $_SESSION['username']  = $username;
    $_SESSION['full_name'] = $fullName;
}

// Log out user by clearing session
function logout_user(): void
{
    $_SESSION = [];
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_destroy();
    }
}

?>