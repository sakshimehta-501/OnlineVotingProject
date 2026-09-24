<?php
/**
 * Voter & Admin Login Page
 * Encrypted backend authentication matching the PostgreSQL schema
 */

require_once __DIR__ . '/auth/auth.php';
require_once __DIR__ . '/includes/function.php';
require_once __DIR__ . '/database/db.php';

// If already logged in, redirect to home
if (is_logged_in()) {
    redirect('home.php');
}

$error = '';
$username = '';

// Handle POST request
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $username = clean($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error = 'Please enter both Voter ID/Username and Password.';
    } else {
        if (!$conn) {
            $error = 'Database connection error. Please verify PostgreSQL is running.';
        } else {
            // Generate HMAC hash to search encrypted user identifiers (Voter ID or Email)
            $search_hash = lookup_hash($username);

            $sql = "SELECT user_id, member_id_encrypted, first_name_encrypted, last_name_encrypted, 
                           email_encrypted, password_hash, role, status 
                    FROM users 
                    WHERE (member_id_hash = $1 OR email_hash = $1)
                    LIMIT 1";

            $result = pg_query_params($conn, $sql, [$search_hash]);

            if ($result && $user = pg_fetch_assoc($result)) {
                // Verify password against hash
                if (password_verify($password, $user['password_hash'])) {
                    if ($user['status'] === 'rejected') {
                        $error = 'Your account has been deactivated. Please contact support.';
                    } else {
                        // Decrypt personal data
                        $first_name = decrypt_data($user['first_name_encrypted']);
                        $last_name  = decrypt_data($user['last_name_encrypted']);
                        $member_id  = decrypt_data($user['member_id_encrypted']);
                        $full_name  = trim($first_name . ' ' . $last_name);

                        // Set session
                        login_user((int)$user['user_id'], $user['role'], $member_id, $full_name, $member_id);

                        // Redirect to home
                        redirect('home.php');
                    }
                } else {
                    $error = 'Invalid Voter ID/Username or Password.';
                }
            } else {
                $error = 'Invalid Voter ID/Username or Password.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter Login</title>
    <link rel="stylesheet" href="/assets/css/login/login.css">
</head>

<body>

<?php include 'includes/header.php'; ?>
<img class="leaves" src="/assets/images/leaf-decoration.png" alt="Decorative leaves">

<section class="page">

    <div class="left">
        <h1>Your Vote<br>Builds a Better<br><strong>Tomorrow</strong></h1>
        <div class="line"></div>
        <p>Secure. Transparent. Reliable.</p>
    </div>

    <div class="card">
        <div class="card-content">

            <div class="user-icon">👤</div>

            <h2>Voter Login</h2>
            <div class="subtitle">Access your account to vote online.</div>

            <!-- Display Errors -->
            <?php if (!empty($error)): ?>
                <div class="alert alert-error" role="alert">
                    <strong>Error:</strong> <?php echo e($error); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="login.php">
                <!-- Username/Voter ID Field -->
                <div class="field">
                    <span>👤</span>
                    <input 
                        type="text" 
                        name="username" 
                        placeholder="Enter Voter ID / Username"
                        value="<?php echo e($username); ?>"
                        required
                        autofocus>
                </div>

                <!-- Password Field -->
                <div class="field">
                    <span>🔒</span>
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="Enter Password"
                        required>
                </div>

                <div class="options">
                    <label>
                        <input type="checkbox" name="remember"> Remember me
                    </label>
                    <a href="forgot-password.php">Forgot Password?</a>
                </div>

                <button class="login" type="submit">🔒 Login</button>
            </form>

            <div class="or">OR</div>

            <div class="register">
                Don't have an account?
                <a href="register.php">Register here</a>
            </div>

        </div>
    </div>

    <img class="ballot" src="/assets/images/ballot-box.png" alt="Voting ballot box">

</section>

<?php include 'includes/footer.php'; ?>

<style>
    .alert {
        padding: 12px 16px;
        margin-bottom: 20px;
        border-radius: 6px;
        font-size: 0.95rem;
    }

    .alert-error {
        background-color: #fee;
        border: 1px solid #fcc;
        color: #c33;
    }
</style>

</body>
</html>