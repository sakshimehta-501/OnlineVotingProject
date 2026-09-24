<?php

require_once __DIR__ . '/../includes/function.php';
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
function current_user_id(): ?int
{
    return isset($_SESSION['user_id']) ? (int) $_SESSION['user_id'] : null;
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

// Get current member ID
function current_member_id(): ?string
{
    return $_SESSION['member_id'] ?? null;
}

// Log in user by saving information in session
function login_user(
    int $userId, 
    string $role = 'voter', 
    string $username = '', 
    string $fullName = '', 
    string $member_id = ''): void
{
    $_SESSION['user_id']   = $userId;
    $_SESSION['role']      = $role;
    $_SESSION['username']  = $username;
    $_SESSION['full_name'] = $fullName;
    $_SESSION['member_id'] = $member_id;
}

// Log out user by clearing session
function logout_user(): void
{
    $_SESSION = [];

    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }

    if (session_status() === PHP_SESSION_ACTIVE) {
        session_destroy();
    }
}

?>