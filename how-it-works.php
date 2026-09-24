<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How It Works - Online Voting System</title>
    <link rel="stylesheet" href="assets/css/main/how-it-works.css">
</head>

<body>

<?php include 'includes/header.php'; ?>

<!-- MAIN CONTENT -->
<main class="container">

    <section class="hero">
        <h1>How <span>It Works</span></h1>

        <p class="intro">
            Our online voting system makes the voting process simple,
            secure and convenient. Follow these easy steps to cast your vote.
        </p>
    </section>

    <!-- FOUR STEPS -->
    <section class="steps">

        <div class="step">
            <div class="number">1</div>
            <h2>Register</h2>
            <p>
                Create your account by providing your basic information,
                voter ID and email address.
            </p>
        </div>

        <div class="step">
            <div class="number">2</div>
            <h2>Login</h2>
            <p>
                Use your registered email and password to securely
                access your voting account.
            </p>
        </div>

        <div class="step">
            <div class="number">3</div>
            <h2>Choose Candidate</h2>
            <p>
                View the available candidates and select the candidate
                you want to vote for.
            </p>
        </div>

        <div class="step">
            <div class="number">4</div>
            <h2>Cast Your Vote</h2>
            <p>
                Confirm your selection and submit your vote securely.
            </p>
        </div>

    </section>

    <!-- BOTTOM SECTION -->
    <section class="info-box">

        <div class="info-text">
            <h2>🗳 Your Vote Matters</h2>

            <p>
                Every vote contributes to the election process.
                Our system is designed to make voting easier while
                keeping the process organized and secure.
            </p>

            <a href="register.php" class="start-btn">Get Started</a>
        </div>

        <!-- CSS ballot box: no external image required -->
        <div class="ballot-illustration" aria-label="Ballot Box">
            <div class="ballot-slot"></div>
            <div class="ballot-paper">✓</div>
        </div>

    </section>

</main>

<!-- FOOTER -->
<?php include 'includes/footer.php'; ?> 

</body>
</html>
