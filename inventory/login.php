<?php
include 'src/connect.php';

$error = false;

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "select * from user where username='".$username."' AND password='".$password."'
            ";
    $result=mysqli_query($conn,$sql);

    $row=mysqli_fetch_array($result);

    if ($result && mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: src/index.php");
        exit();
    } else {
      $error = true;
        // echo "<script>alert('Incorrect Username or Password');</script>";
      // exit(); // Remove this exit so the error message can show
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>TKUISA Login</title>
  <link href="login.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <!-- Left Side -->
    <div class="left">
      <img src="src/image/logo.png" alt="TKUISA Logo" class="logo">
    </div>

    <!-- Right Side -->
    <div class="right">
      <h2>TKUISA</h2>
      <p id="welcome-text">Welcome!<br><small>Please enter your details below</small></p>

      <form method="post">
        <label for="username">ID</label>
        <input type="text" id="username" name="username" placeholder="Enter Username" required/>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter Password" required/>

        <?php if ($error): ?>
          <p class="error" id="error-msg">Wrong Password!</p>
        <?php endif; ?>
        
        <button class="button">LOGIN</button>
      </form>
    </div>
  </div>
</body>
</html>