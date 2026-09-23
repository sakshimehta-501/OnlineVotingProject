<style>
header {
  width: 100%;
  padding: 18px 7%;
  background: #102d13;
  color: white;
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: sticky;
  top: 0;
  left: 0;
  z-index: 1000;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
}

.logo {
  font-size: 22px;
  font-weight: bold;
  letter-spacing: 0.5px;
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
  transition: color 0.2s ease;
}

nav a:hover {
  color: #efbd25;
}

.nav-btn {
  background: #efbd25;
  color: #102d13 !important;
  padding: 12px 22px;
  border-radius: 10px;
  font-weight: bold;
  transition: transform 0.2s ease, background-color 0.2s ease;
}

.nav-btn:hover {
  background: #f7ca38;
  transform: translateY(-1px);
}
</style>

<header>
    <div class="logo">🗳 ONLINE <span>VOTING</span> SYSTEM</div>
    <nav>
        <a href="home.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="how-it-works.php">How It Works</a>
        <a class="nav-btn" href="login.php">👤 Login</a>
        <a class="nav-btn" href="register.php">👤 Register</a>
    </nav>
</header>