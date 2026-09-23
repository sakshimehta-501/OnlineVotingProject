<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Voter Login</title>
<link rel="stylesheet" href="/assets/css/login/login.css">
</head>

<body>

<!-- <header>
    <div class="logo">🗳 ONLINE <span>VOTING</span> SYSTEM</div>
    <nav>
        <a href="index.php">Home</a>
        <a href="about-us.php">About Us</a>
        <a href="how-it-works.php">How It Works</a>
        
  
        <a class="nav-btn" href="register.php">👤 Register</a>
    </nav>
</header> -->

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

            <form method="POST" action="login.php">
                <div class="field">
                    <span>👤</span>
                    <input type="text" name="username" placeholder="Enter Voter ID / Username" required>
                </div>

                <div class="field">
                    <span>🔒</span>
                    <input type="password" name="password" placeholder="Enter Password" required>
                </div>

                <div class="options">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                    <a href="#">Forgot Password?</a>
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

<!-- <footer>
    <span>© 2026 Online Voting System. All rights reserved.</span>
    <span>● &nbsp; ● &nbsp; ● &nbsp; ●</span>
</footer> -->
<?php include 'includes/footer.php'; ?>
</body>
</html>