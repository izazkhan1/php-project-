<?php
session_start();
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $_SESSION['admin'] = $username;
    header("Location: dashboard.php");
    exit();
  } else {
    $error = "Invalid credentials!";
  }
}
?>
<!DOCTYPE html>
<html>
<head><title>Admin Login</title></head>
<body>
  <h2>Login</h2>
  <form method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
  </form>
  <?php if(!empty($error)) echo "<p>$error</p>"; ?>
</body>
</html>
