<?php
include 'config.php';
session_start();

if (isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($conn, $_POST['username']);
  $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

  $select_account = "SELECT * FROM `account` WHERE username = '$name' AND password = '$pass'";
  $result = mysqli_query($conn, $select_account);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $_SESSION['user_name'] = $row['username'];
    $_SESSION['user_email'] = $row['email'];
    $_SESSION['user_id'] = $row['id'];
    header('Location: dashboard.html');
    exit();
  } else {
    $message = 'Incorrect email or password!';
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> -->
  <link rel="stylesheet" href="./css/login.css">
</head>
<body>
  <header>
    <nav>
      <div class="logo">
        <img src="./assets/BOLCA logo (ambil yang atas).png" alt="logo">
      </div>
      <div class="sign_up">
        <a href="./register.php" >
          Sign Up
        </a>
      </div>
    </nav>
  </header>

  <main>
    <div class="image1">
      <img src="./assets/Screen_Shot_2023-05-31_at_15.37.50-removebg-preview.png" alt="image">
    </div>

    <div class="form">
      <div class="rectangle"></div>

      <form action="" method= "post" name="loginForm" onsubmit="return validateInput()">
        <div class="boxes">
          <div class="text">
            <label for="username_or_email">
              Username or email
            </label>
            <ion-icon name="alert-circle-sharp" id="icon_alert_username"></ion-icon>
          </div>
          <div class="inputbox">
            <input type="text" name="username_or_email" placeholder="Enter username or email" id="username_or_email" required class="box">
          </div>
        </div>

        <div class="boxes">
          <div class="text">
            <label for="password">
              Password
            </label>
            <ion-icon name="alert-circle-sharp" id="icon_alert_password"></ion-icon>
          </div>
          <div class="inputbox">
            <input type="password" name="password" placeholder="Password" id="password" required class="box">
            <div class="eye">
              <div class="eye_closed">
                <ion-icon name="eye-off-sharp" id="closed" onclick="MyPasswordVisible()"></ion-icon>
              </div>
              <div class="eye_open">
                <ion-icon name="eye-sharp" id="open" onclick="MyPasswordVisible()"></ion-icon>
              </div>
            </div>
          </div>
        </div>

        <div class="boxes">
          <div class="checkbox">
            <!-- <input type="checkbox" name="remember" onclick="rememberPassword()">
            <p>
              Remember Password
            </p>   -->
          </div>
        </div>

        <div class="ellips">
          <a href="./html/login_sign_up_page.html" class="ellips1"></a>
          <div class="ellips2"></div>
        </div>

        <button type="submit" name="submit" id="submit">
          <a href="./html/dashboard.html" class="submit">Submit</a>
        </button>
      </form>
    </div>
  </main>

  <!-- <script src="./login.js"></script> -->
</body>
</html>
