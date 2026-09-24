<?php
/**
 * Voter Registration Page
 * Encrypted backend registration matching the PostgreSQL schema
 */

require_once __DIR__ . '/auth/auth.php';
require_once __DIR__ . '/includes/function.php';
require_once __DIR__ . '/database/db.php';

// If already logged in, redirect to home
if (is_logged_in()) {
    redirect('home.php');
}

$error = '';
$first_name = '';
$last_name = '';
$voter_id = '';
$email = '';

// Handle POST request
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $first_name       = clean($_POST['first_name'] ?? '');
    $last_name        = clean($_POST['last_name'] ?? '');
    $voter_id         = clean($_POST['voter_id'] ?? '');
    $email            = clean($_POST['email'] ?? '');
    $password         = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $terms            = isset($_POST['terms']);

    if (empty($first_name) || empty($last_name) || empty($voter_id) || empty($email) || empty($password)) {
        $error = 'Please fill in all required fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters.';
    } elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match.';
    } elseif (!$terms) {
        $error = 'You must agree to the Terms and Conditions.';
    } else {
        if (!$conn) {
            $error = 'Database connection error. Please verify PostgreSQL is running.';
        } else {
            // Generate HMAC lookup hashes for uniqueness check
            $voter_id_hash = lookup_hash($voter_id);
            $email_hash    = lookup_hash($email);

            // Check if Voter ID or Email already registered in users table
            $checkSql = "SELECT user_id FROM users WHERE member_id_hash = $1 OR email_hash = $2 LIMIT 1";
            $checkRes = pg_query_params($conn, $checkSql, [$voter_id_hash, $email_hash]);

            if ($checkRes && pg_num_rows($checkRes) > 0) {
                $error = 'Voter ID or Email is already registered.';
            } else {
                // Encrypt sensitive fields with AES-256-GCM
                $first_name_enc = encrypt_data($first_name);
                $last_name_enc  = encrypt_data($last_name);
                $voter_id_enc   = encrypt_data($voter_id);
                $email_enc      = encrypt_data($email);
                $hashed_pass    = password_hash($password, PASSWORD_DEFAULT);

                // Insert into users table
                $insertSql = "INSERT INTO users (
                    member_id_encrypted, member_id_hash,
                    first_name_encrypted, last_name_encrypted,
                    email_encrypted, email_hash,
                    password_hash, status, role, terms_accepted
                ) VALUES ($1, $2, $3, $4, $5, $6, $7, 'active', 'voter', true) RETURNING user_id";

                $insertRes = pg_query_params($conn, $insertSql, [
                    $voter_id_enc,
                    $voter_id_hash,
                    $first_name_enc,
                    $last_name_enc,
                    $email_enc,
                    $email_hash,
                    $hashed_pass
                ]);

                if ($insertRes && $row = pg_fetch_assoc($insertRes)) {
                    $new_id = (int)$row['user_id'];
                    $full_name = $first_name . ' ' . $last_name;

                    // Log in user
                    login_user($new_id, 'voter', $voter_id, $full_name, $voter_id);

                    // Redirect to home
                    redirect('home.php');
                } else {
                    $error = 'Registration failed. Please try again.';
                }
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
<title>Voter Registration</title>

<link rel="stylesheet" href="/assets/css/login/register.css">
</head>

<body>

<?php include 'includes/header.php'; ?>

<img src="/assets/images/leaf-decoration.png" class="leaves" alt="Leaf decoration">

<section class="page">

    <div class="left">

        <h1>
            Your Vote<br>
            Builds a Better<br>
            <strong>Tomorrow</strong>
        </h1>

        <div class="line"></div>

        <p>Secure. Transparent. Reliable.</p>

    </div>


    <div class="card">

        <div class="card-content">

            <div class="user-icon">
                👤
            </div>

            <h2>Voter Registration</h2>

            <div class="subtitle">
                Create your account to vote online.
            </div>

            <!-- Display Errors -->
            <?php if (!empty($error)): ?>
                <div class="alert alert-error" role="alert">
                    <strong>Error:</strong> <?php echo e($error); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="register.php">

                <div class="row">

                    <div class="field">
                        <span>👤</span>
                        <input type="text"
                               name="first_name"
                               placeholder="First Name"
                               value="<?php echo e($first_name); ?>"
                               required>
                    </div>

                    <div class="field">
                        <span>👤</span>
                        <input type="text"
                               name="last_name"
                               placeholder="Last Name"
                               value="<?php echo e($last_name); ?>"
                               required>
                    </div>

                </div>


                <div class="row">

                    <div class="field">
                        <span>🪪</span>
                        <input type="text"
                               name="voter_id"
                               placeholder="Voter ID"
                               value="<?php echo e($voter_id); ?>"
                               required>
                    </div>

                    <div class="field">
                        <span>✉</span>
                        <input type="email"
                               name="email"
                               placeholder="Email"
                               value="<?php echo e($email); ?>"
                               required>
                    </div>

                </div>


                <div class="row">

                    <div class="field">
                        <span>🔒</span>
                        <input type="password"
                               name="password"
                               placeholder="Password (min 6 chars)"
                               required>
                    </div>

                    <div class="field">
                        <span>🔒</span>
                        <input type="password"
                               name="confirm_password"
                               placeholder="Confirm Password"
                               required>
                    </div>

                </div>


                <label class="terms">

                    <input type="checkbox" name="terms" required>

                    I agree to the Terms and Conditions

                </label>


                <button type="submit" class="register">
                    👤 Create Account
                </button>

            </form>


            <div class="login-link">

                Already have an account?
                <a href="login.php">Login here</a>

            </div>

        </div>

    </div>


    <img src="/assets/images/ballot-box.png"
         class="ballot"
         alt="Voting ballot box">

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