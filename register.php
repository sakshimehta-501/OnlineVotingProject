<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Voter Registration</title>

<style>
* {
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    margin: 0;
    min-height: 100vh;
    color: #18351b;
    background:
        radial-gradient(circle at 18% 25%, rgba(255,255,255,.8), transparent 25%),
        radial-gradient(circle at 85% 30%, rgba(226,190,70,.18), transparent 28%),
        linear-gradient(135deg, #e7eddc 0%, #f8f3dc 48%, #dce8d0 100%);
    position: relative;
    overflow-x: hidden;
}

/* Background decoration */
body:before {
    content: "";
    position: absolute;
    width: 520px;
    height: 260px;
    left: -130px;
    bottom: 50px;
    background: #55745a;
    border-radius: 50% 50% 0 0;
    opacity: .22;
    transform: rotate(-8deg);
}

body:after {
    content: "";
    position: absolute;
    width: 420px;
    height: 300px;
    right: -120px;
    top: 170px;
    background: #b7c9a9;
    border-radius: 50%;
    opacity: .28;
}

/* Header */
header {
    width: 100%;
    padding: 18px 7%;
    background: #102d13;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    z-index: 5;
}

.logo {
    font-size: 22px;
    font-weight: bold;
}

.logo span {
    color: #efbd25;
}

nav {
    display: flex;
    gap: 30px;
    align-items: center;
}

nav a {
    color: white;
    text-decoration: none;
    font-size: 14px;
}

.nav-btn {
    background: #efbd25;
    color: #102d13;
    padding: 12px 22px;
    border-radius: 10px;
    font-weight: bold;
}

/* Leaves */
.leaves {
    position: absolute;
    left: 0;
    top: 75px;
    width: 190px;
    opacity: .65;
    z-index: 1;
}

/* Main */
.page {
    min-height: 820px;
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 55px;
    padding: 50px 7%;
}

.left {
    width: 27%;
}

.left h1 {
    font-size: 40px;
    line-height: 1.12;
    font-weight: 400;
    margin: 0;
}

.left h1 strong {
    font-style: italic;
    font-weight: bold;
}

.line {
    width: 70px;
    height: 4px;
    background: #e9b91f;
    margin: 22px 0;
}

.left p {
    font-size: 16px;
    color: #526257;
}

/* Register Card */
.card {
    width: 600px;
    padding: 38px 45px;
    background: rgba(255,255,255,.95);
    border: 1px solid rgba(30,70,35,.12);
    border-radius: 28px;
    box-shadow: 0 25px 60px rgba(25,55,25,.20);
    position: relative;
    overflow: hidden;
}

.card:before,
.card:after {
    content: "";
    position: absolute;
    width: 130px;
    height: 130px;
    background: #123b18;
    border-radius: 0 0 100% 0;
    opacity: .95;
}

.card:before {
    left: -70px;
    top: -70px;
}

.card:after {
    right: -70px;
    bottom: -70px;
    transform: rotate(180deg);
}

.card-content {
    position: relative;
    z-index: 2;
}

.user-icon {
    width: 70px;
    height: 70px;
    margin: auto;
    border: 2px solid #e4b51d;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 30px;
    background: #f8f5e8;
}

.card h2 {
    text-align: center;
    font-size: 32px;
    margin: 15px 0 7px;
}

.subtitle {
    text-align: center;
    color: #7b8580;
    margin-bottom: 25px;
}

/* Form rows */
.row {
    display: flex;
    gap: 15px;
}

.field {
    display: flex;
    align-items: center;
    gap: 10px;
    border: 1px solid #d7ddd1;
    border-radius: 11px;
    padding: 12px 14px;
    margin-bottom: 15px;
    background: #fffdf7;
    flex: 1;
}

.field span {
    font-size: 18px;
}

.field input {
    width: 100%;
    border: 0;
    outline: 0;
    background: transparent;
    font-size: 14px;
}

.terms {
    display: flex;
    align-items: center;
    gap: 7px;
    font-size: 13px;
    margin: 8px 0 20px;
    color: #66716a;
}

.terms input {
    accent-color: #e9b525;
}

/* Button */
.register {
    width: 100%;
    padding: 15px;
    border: 0;
    border-radius: 11px;
    background: #e9b525;
    color: #173117;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
}

.register:hover {
    background: #d5a615;
}

/* Login link */
.login-link {
    text-align: center;
    color: #66716a;
    font-size: 14px;
    margin-top: 22px;
}

.login-link a {
    color: #285b31;
    font-weight: bold;
    text-decoration: none;
}

/* Ballot image */
.ballot {
    width: 270px;
    filter: drop-shadow(0 15px 20px rgba(35,60,30,.15));
}

/* Footer */
footer {
    background: #102d13;
    color: white;
    padding: 20px 7%;
    display: flex;
    justify-content: space-between;
    position: relative;
    z-index: 5;
    font-size: 13px;
}

/* Responsive */
@media(max-width: 1000px) {

    .page {
        flex-direction: column;
        gap: 30px;
    }

    .left {
        width: 80%;
        text-align: center;
    }

    .line {
        margin: 18px auto;
    }

    .ballot {
        display: none;
    }

    .card {
        width: min(600px, 92vw);
    }

    nav {
        display: none;
    }
}

@media(max-width: 600px) {

    .row {
        flex-direction: column;
        gap: 0;
    }

    .card {
        padding: 35px 25px;
    }
}
</style>
</head>

<body>

<header>

    <div class="logo">
        🗳 ONLINE <span>VOTING</span> SYSTEM
    </div>

    <nav>
        <a href="index.html">Home</a>
        <a href="#">About Us</a>
        <a href="#">How It Works</a>
        <a class="nav-btn" href="login.html">👤 Login</a>
    </nav>

</header>

<img src="leaf-decoration.png" class="leaves" alt="Leaf decoration">

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
                <a href="login.html">Login here</a>

            </div>

        </div>

    </div>


    <img src="ballot-box.png"
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