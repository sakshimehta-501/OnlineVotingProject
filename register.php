<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Voter Registration</title>

<link rel="stylesheet" href="/assets/css/login/register.css">
</head>

<body>

<!-- <header>

    <div class="logo">
        🗳 ONLINE <span>VOTING</span> SYSTEM
    </div>

    <nav>
        <a href="index.php">Home</a>
        <a href="about-us.php">About Us</a>
        <a href="how-it-works.php">How It Works</a>
        <a class="nav-btn" href="login.php">👤 Login</a>
    </nav>

</header> -->

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


            <form>

                <div class="row">

                    <div class="field">
                        <span>👤</span>
                        <input type="text"
                               placeholder="First Name"
                               required>
                    </div>

                    <div class="field">
                        <span>👤</span>
                        <input type="text"
                               placeholder="Last Name"
                               required>
                    </div>

                </div>


                <div class="row">

                    <div class="field">
                        <span>🪪</span>
                        <input type="text"
                               placeholder="Voter ID"
                               required>
                    </div>

                    <div class="field">
                        <span>✉</span>
                        <input type="email"
                               placeholder="Email"
                               required>
                    </div>

                </div>


                <div class="row">

                    <div class="field">
                        <span>🔒</span>
                        <input type="password"
                               placeholder="Password"
                               required>
                    </div>

                    <div class="field">
                        <span>🔒</span>
                        <input type="password"
                               placeholder="Confirm Password"
                               required>
                    </div>

                </div>


                <label class="terms">

                    <input type="checkbox" required>

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


<footer>

    <span>
        © 2026 Online Voting System. All rights reserved.
    </span>

    <span>
        ● &nbsp; ● &nbsp; ● &nbsp; ●
    </span>

</footer>

</body>
</html>