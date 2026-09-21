<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

  echo "<pre>";
  print_r($_REQUEST);
  echo "</pre>";

  $fullName = $_POST['full_name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm_password'];

  $full_name = trim($full_name);
  {
    if (empty($full_name)) {
      echo "Full name is required.";
    }
  }
  $email = trim($email);
  $phone = trim($phone);
  $username = trim($username);
  $password = trim($password);
  $confirmPassword = trim($confirmPassword);
}

?>

<!doctype html>
<html>
  <head>
    <title>Voter Registration</title>
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>

  <body>
    <?php include 'includes/header.php'; ?>

    <div class="container">
      <h2>Voter Registration</h2>

      <form method="post">
        <label>Full Name</label>
        <input type="text" placeholder="Enter Full Name" name="full_name" id="full_name" required />

        <label>Email Address</label>
        <input type="email" placeholder="Enter Email" name="email" id="email" required />

        <label>Phone Number</label>
        <input type="text" placeholder="Enter Phone Number" name="phone" id="phone" required />

        <label>Member ID</label>
        <input type="text" placeholder="Enter Member ID" name="member_id" id="member_id" required />

        <label>Username</label>
        <input type="text" placeholder="Choose Username" name="username" id="username" required />

        <label>Password</label>
        <input type="password" placeholder="Create Password" name="password" id="password"   required />

        <label>Confirm Password</label>
        <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" required />

        <button type="submit">Register</button>
      </form>

      <div class="links">
        <p>
          Already have an account?
          <a href="login.php">Login</a>
        </p>

        <br />

        <a href="index.php">Back to Home</a>
      </div>
    </div>
    <?php include 'includes/footer.php'; ?>
  </body>
</html>
