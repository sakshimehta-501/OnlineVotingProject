<!doctype html>
<html>
  <head>
    <title>Voter Login</title>
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>

  <body>
    <?php include 'includes/header.php'; ?>

    <div class="container">
      <h2>Voter Login</h2>

      <form method="post">
        <label>Username</label>
        <input type="text" placeholder="Enter Username" name="username" id="username" required />

        <label>Password</label>
        <input type="password" placeholder="Enter Password" name="password" id="password" required />

        <button type="submit">Login</button>
      </form>

      <div class="links">
        <p>
          Don't have an account?
          <a href="register.php">Register</a>
        </p>

        <br />

        <a href="index.php">Back to Home</a>
      </div>
    </div>
    <?php include 'includes/footer.php'; ?>
  </body>
</html>
