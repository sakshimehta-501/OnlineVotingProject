<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How It Works - Online Voting System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at 10% 20%, rgba(220, 237, 200, 0.8), transparent 30%),
                radial-gradient(circle at 90% 80%, rgba(198, 219, 170, 0.7), transparent 30%),
                linear-gradient(135deg, #f5f1df, #dce8c8);
            color: #183b2b;
        }

        /* HEADER */
        header {
            height: 75px;
            background: #174b35;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .logo {
            font-size: 21px;
            font-weight: bold;
        }

        .logo span {
            color: #e8c766;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        nav a:hover {
            color: #e8c766;
        }

        .nav-btn {
            background: #e8c766;
            color: #183b2b !important;
            padding: 10px 18px;
            border-radius: 20px;
            font-weight: bold;
        }

        /* MAIN */
        .container {
            width: 90%;
            max-width: 1100px;
            margin: 50px auto;
            text-align: center;
        }

        .container h1 {
            font-size: 38px;
            color: #174b35;
            margin-bottom: 12px;
        }

        .container h1 span {
            color: #c79f32;
        }

        .intro {
            max-width: 700px;
            margin: auto;
            color: #526457;
            line-height: 1.7;
            font-size: 15px;
        }

        /* STEPS */
        .steps {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
            margin-top: 45px;
        }

        .step {
            background: rgba(255, 255, 255, 0.92);
            padding: 30px 20px;
            border-radius: 22px;
            box-shadow: 0 8px 25px rgba(39, 70, 49, 0.15);
            border: 1px solid rgba(23, 75, 53, 0.08);
            transition: 0.3s;
        }

        .step:hover {
            transform: translateY(-7px);
            box-shadow: 0 12px 30px rgba(39, 70, 49, 0.22);
        }

        .number {
            width: 55px;
            height: 55px;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: #174b35;
            color: #e8c766;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: bold;
        }

        .step h2 {
            color: #174b35;
            font-size: 20px;
            margin-bottom: 12px;
        }

        .step p {
            color: #66756a;
            font-size: 14px;
            line-height: 1.6;
        }

        /* BOTTOM BOX */
        .info-box {
            margin-top: 45px;
            background: #174b35;
            color: white;
            padding: 35px;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-align: left;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.18);
        }

        .info-text {
            max-width: 650px;
        }

        .info-text h2 {
            color: #e8c766;
            margin-bottom: 12px;
            font-size: 25px;
        }

        .info-text p {
            line-height: 1.7;
            color: #e7eee8;
        }

        .info-box img {
            width: 130px;
        }

        .start-btn {
            display: inline-block;
            margin-top: 18px;
            background: #e8c766;
            color: #183b2b;
            padding: 12px 22px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
        }

        .start-btn:hover {
            background: #f2d98a;
        }

        /* FOOTER */
        footer {
            margin-top: 60px;
            background: #123a2a;
            color: #dce6df;
            text-align: center;
            padding: 18px;
            font-size: 13px;
        }

        /* RESPONSIVE */
        @media (max-width: 850px) {

            header {
                padding: 0 4%;
            }

            nav {
                gap: 10px;
            }

            .steps {
                grid-template-columns: repeat(2, 1fr);
            }

            .info-box {
                flex-direction: column;
                text-align: center;
                gap: 25px;
            }
        }

        @media (max-width: 600px) {

            header {
                height: auto;
                padding: 20px;
                flex-direction: column;
                gap: 15px;
            }

            nav {
                flex-wrap: wrap;
                justify-content: center;
            }

            .steps {
                grid-template-columns: 1fr;
            }

            .container h1 {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header>

        <div class="logo">
            🗳 ONLINE <span>VOTING</span> SYSTEM
        </div>

        <nav>
            <a href="index.php">Home</a>
            <a href="#">About Us</a>
            <a href="how-it-works.php">How It Works</a>
    
            <a href="login.php" class="nav-btn">👤 Login</a>
        </nav>

    </header>


    <!-- MAIN CONTENT -->
    <div class="container">

        <h1>How <span>It Works</span></h1>

        <p class="intro">
            Our online voting system makes the voting process simple,
            secure and convenient. Follow these easy steps to cast your vote.
        </p>


        <!-- FOUR STEPS -->
        <div class="steps">

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

        </div>


        <!-- BOTTOM SECTION -->
        <div class="info-box">

            <div class="info-text">

                <h2>🗳 Your Vote Matters</h2>

                <p>
                    Every vote contributes to the election process.
                    Our system is designed to make voting easier while
                    keeping the process organized and secure.
                </p>

                <a href="register.php" class="start-btn">
                    Get Started
                </a>

            </div>

            <img src="ballot-box.png" alt="Ballot Box">

        </div>

    </div>


    <!-- FOOTER -->
    <footer>
        © 2026 Online Voting System | Secure • Simple • Transparent
    </footer>

</body>
</html>