<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Online Voting System</title>

    <link rel="stylesheet" href="/assets/css/main/home.css">
</head>

<body>
    <?php include 'includes/header.php'; ?>

    <!-- Main Home Section -->
    <section class="hero">

        <!-- Left Content -->
        <div class="hero-text">

            <h1>
                Your Vote<br>
                Builds a Better<br>
                <span class="highlight">Tomorrow</span>
            </h1>

            <div class="yellow-line"></div>

            <p>
                Secure. Transparent. Reliable.
            </p>

            <a href="login.php" class="vote-btn">
                🗳️ &nbsp; Vote Now
            </a>

        </div>


        <!-- Right Image with Leaf Shadows -->
        <div class="hero-image">
            <span class="leaf-shadow leaf-top" aria-hidden="true"></span>
            <span class="leaf-shadow leaf-top-sub" aria-hidden="true"></span>
            <span class="leaf-shadow leaf-bottom" aria-hidden="true"></span>
            <span class="leaf-shadow leaf-bottom-sub" aria-hidden="true"></span>

            <img src="/assets/images/ballot-box.png"
                 alt="Online Voting">

        </div>

    </section>

    <!-- FOOTER -->
    <?php include 'includes/footer.php'; ?>
</body>

</html>