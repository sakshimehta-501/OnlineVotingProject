<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Voter Login</title>

<style>
*{box-sizing:border-box;font-family:Arial,sans-serif}
body{
    margin:0;
    min-height:100vh;
    color:#18351b;
    background:
      radial-gradient(circle at 18% 25%,rgba(255,255,255,.8),transparent 25%),
      radial-gradient(circle at 85% 30%,rgba(226,190,70,.18),transparent 28%),
      linear-gradient(135deg,#e7eddc 0%,#f8f3dc 48%,#dce8d0 100%);
    position:relative;
    overflow-x:hidden;
}
body:before{
    content:"";
    position:absolute;
    width:520px;height:260px;
    left:-130px;bottom:50px;
    background:#55745a;
    border-radius:50% 50% 0 0;
    opacity:.22;
    transform:rotate(-8deg);
}
body:after{
    content:"";
    position:absolute;
    width:420px;height:300px;
    right:-120px;top:170px;
    background:#b7c9a9;
    border-radius:50%;
    opacity:.28;
}
header{
    width:100%;
    padding:18px 7%;
    background:#102d13;
    color:white;
    display:flex;
    justify-content:space-between;
    align-items:center;
    position:relative;
    z-index:5;
}
.logo{font-size:22px;font-weight:bold}
.logo span{color:#efbd25}
nav{display:flex;gap:34px;align-items:center}
nav a{color:white;text-decoration:none;font-size:14px}
.nav-btn{
    background:#efbd25;
    color:#102d13;
    padding:12px 22px;
    border-radius:10px;
    font-weight:bold;
}
.page{
    min-height:820px;
    position:relative;
    z-index:2;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:70px;
    padding:55px 7%;
}
.left{width:28%}
.left h1{font-size:43px;line-height:1.12;font-weight:400;margin:0}
.left h1 strong{font-style:italic;font-weight:bold}
.line{width:70px;height:4px;background:#e9b91f;margin:22px 0}
.left p{font-size:16px;color:#526257}
.leaves{
    position:absolute;
    left:0;
    top:0;
    width:190px;
    opacity:.65;
}
.card{
    width:540px;
    padding:45px 48px;
    background:rgba(255,255,255,.94);
    border:1px solid rgba(30,70,35,.12);
    border-radius:28px;
    box-shadow:0 25px 60px rgba(25,55,25,.20);
    position:relative;
    overflow:hidden;
}
.card:before,.card:after{
    content:"";
    position:absolute;
    width:130px;height:130px;
    background:#123b18;
    border-radius:0 0 100% 0;
    opacity:.95;
}
.card:before{left:-70px;top:-70px}
.card:after{right:-70px;bottom:-70px;transform:rotate(180deg)}
.card-content{position:relative;z-index:2}
.user-icon{
    width:78px;height:78px;
    margin:auto;
    border:2px solid #e4b51d;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:34px;
    background:#f8f5e8;
}
.card h2{text-align:center;font-size:34px;margin:18px 0 8px}
.subtitle{text-align:center;color:#7b8580;margin-bottom:30px}
.field{
    display:flex;align-items:center;gap:12px;
    border:1px solid #d7ddd1;
    border-radius:12px;
    padding:14px 16px;
    margin-bottom:18px;
    background:#fffdf7;
}
.field span{font-size:20px}
.field input{
    width:100%;border:0;outline:0;
    background:transparent;font-size:15px;
}
.options{
    display:flex;justify-content:space-between;
    align-items:center;font-size:13px;margin:8px 0 25px;
}
.options a{color:#285b31;text-decoration:none}
.login{
    width:100%;padding:16px;
    border:0;border-radius:11px;
    background:#e9b525;color:#173117;
    font-size:17px;font-weight:bold;
    cursor:pointer;
}
.or{
    display:flex;align-items:center;gap:12px;
    color:#89918b;margin:28px 0;
}
.or:before,.or:after{content:"";height:1px;background:#ddd;flex:1}
.register{text-align:center;color:#66716a;font-size:14px}
.register a{color:#285b31;font-weight:bold;text-decoration:none}
.ballot{
    width:310px;
    max-width:30vw;
    filter:drop-shadow(0 15px 20px rgba(35,60,30,.15));
}
footer{
    background:#102d13;color:white;
    padding:20px 7%;
    display:flex;justify-content:space-between;
    position:relative;z-index:5;
    font-size:13px;
}
@media(max-width:950px){
    .page{flex-direction:column;gap:30px}
    .left{width:80%;text-align:center}
    .line{margin:18px auto}
    .ballot{display:none}
    .card{width:min(540px,92vw)}
    nav{display:none}
}
</style>
</head>

<body>

<header>
    <div class="logo">🗳 ONLINE <span>VOTING</span> SYSTEM</div>
    <nav>
        <a href="index.html">Home</a>
        <a href="#">About Us</a>
        <a href="#">How It Works</a>
  
        <a class="nav-btn" href="register.html">👤 Login / Register</a>
    </nav>
</header>

<img class="leaves" src="leaf-decoration.png" alt="Decorative leaves">

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

            <form>
                <div class="field">
                    <span>👤</span>
                    <input type="text" placeholder="Enter Voter ID" required>
                </div>

                <div class="field">
                    <span>🔒</span>
                    <input type="password" placeholder="Enter Password" required>
                </div>

                <div class="options">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>

                <button class="login" type="submit">🔒 Login</button>
            </form>

            <div class="or">OR</div>

            <div class="register">
                Don't have an account?
                <a href="register.html">Register here</a>
            </div>

        </div>
    </div>

    <img class="ballot" src="ballot-box.png" alt="Voting ballot box">

</section>

<footer>
    <span>© 2026 Online Voting System. All rights reserved.</span>
    <span>● &nbsp; ● &nbsp; ● &nbsp; ●</span>
</footer>

</body>
</html>