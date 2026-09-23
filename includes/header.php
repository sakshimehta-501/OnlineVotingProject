<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <style>
        header {
  width: 100%;
  padding: 18px 7%;
  background: #102d13;
  color: white;
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: fixed;
  z-index: 1000;
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
  gap: 34px;
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
</style>
</head>
<body>
    <header>
    <div class="logo">🗳 ONLINE <span>VOTING</span> SYSTEM</div>
    <nav>
        <a href="index.php">Home</a>
        <a href="about-us.php">About Us</a>
        <a href="how-it-works.php">How It Works</a>
        
  
        <a class="nav-btn" href="register.php">👤 Register</a>
    </nav>
</header>
</body>
</html>