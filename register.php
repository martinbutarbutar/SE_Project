<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['Cpassword']));


function endsWith($haystack, $needle) {
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }
    return substr($haystack, -$length) === $needle;
}
   function inputError($input, $message) {
    $formlayout = $input;
    $formlayout;

    $errorMessage = $formlayout;
    $errorMessage = $message;
}

function inputSuccess($input, $message) {
    $formlayout = $input;
    $formlayout;

    $successMessage = $formlayout;
    $successMessage = $message;
}

function checkUsername($input) {
    if (strlen($input) < 3) {
        inputError($input, 'First name must be at least 3 characters long');
    } else {
        inputSuccess($input, '');
    }
}

function checkEmail($input) {
    if (strlen($input) === 0) {
        inputError($input, 'Email address cannot be empty');
    } else if (strpos($input, "@") === false) {
        inputError($input, 'Invalid email address');
    } else if (endsWith($input, "gmail.com") && (strlen($input) - 10) > 3) {
        inputSuccess($input, '');
    } else if (endsWith($input, "outlook.com") && (strlen($input) - 12) > 3) {
        inputSuccess($input, '');
    } else if (endsWith($input, "yahoo.com") && (strlen($input) - 10) > 3) {
        inputSuccess($input, '');
    } else if (endsWith($input, "icloud.com") && (strlen($input) - 11) > 3) {
        inputSuccess($input, '');
    } else {
        inputError($input, 'Invalid email address');
    }
}

function checkPassword($input) {
    if (strlen($input) < 8 || strlen($input) > 25) {
        inputError($input, 'Password must be at least 8 to 25 characters long');
    } else if (strpos($input, "1") === false && strpos($input, "2") === false && strpos($input, "3") === false && strpos($input, "4") === false && strpos($input, "5") === false && strpos($input, "6") === false && strpos($input, "7") === false && strpos($input, "8") === false && strpos($input, "9") === false && strpos($input, "0") === false) {
        inputError($input, 'Password must include ONE number');
    } else if (strpos($input, "-") === false && strpos($input, "_") === false && strpos($input, "$") === false && strpos($input, "*") === false && strpos($input, ".") === false && strpos($input, "!") === false && strpos($input, "?") === false && strpos($input, "/") === false && strpos($input, "%") === false) {
        inputError($input, 'Password must include ONE of the special characters (-_.*$)');
    } else {
        inputSuccess($input, '');
    }
}

function checkCPassword($input) {
    if ($input == $_POST['password']) {
        inputSuccess($input, '');
    } else {
        inputError($input, 'Password is not matched');
    }
}

function checkBox($input) {
    if ($input == true) {
        inputSuccess($input, '');
    } else {
        inputError($input, 'Please agree to the Terms & Conditions');
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['Cpassword'];
    $termPrivacy = $_POST['TermPrivacy'];

    checkUsername($username);
    checkEmail($email);
    checkPassword($password);
    checkCPassword($cpassword);
    checkBox($termPrivacy);
}

// function endsWith($haystack, $needle) {
//     return substr($haystack, -strlen($needle)) === $needle;
// }

    $select_account = mysqli_query($conn, "SELECT * FROM `account` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_account) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `account`(username, email, password) VALUES('$name', '$email', '$cpass')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php');
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/register.css">
    <!-- <script defer src="register.js"></script> -->
    <title>Register Account BOLCA</title>
</head>
<body>
    <header>
        <div class="left">
            <a href="./html/welcome.html">
               <img src="./ORNAMEN SOFTWARE PROJECT/BOLCA_logo.png" alt="Logo Bolca" class="logo">
            </a>
        </div>
        <div class="right">
            <a href="./login.php" class="link">Log In</a>
        </div>
    </header>

    <section class="Upper-Container">
        <div class="left">
            <h1 class="title">
                Let's Join
                <br>
                BOLCA
            </h1>
        </div>
        <div class="right">
            <img src="./ORNAMEN SOFTWARE PROJECT/2_anak.png" alt="2KidsPicture" class="title_pict">
        </div>
    </section>

    <Section class="Center-Container">
        <div class="eclipse"></div>
        <div class="Form">
            <form action="register.php" id="form"  method="post">
                <div class="form-layout">
                    <label for="username"> <h2 class="name">Username</h2> </label>
                    <input type="text" id="username" name="username" class="input" name="username" placeholder="Enter Username" required class="box">
                    <p class="erm">Error Message</p>
                </div>
                <div class="form-layout">
                    <label for="email"> <h2 class="email">E-mail</h2> </label>
                    <input type="text" id="email" name="email" class="input" placeholder="Enter Email" data-required="true" data-type="email" data-error-message="Your E-mail is required" required class="box">
                    <p class="erm">Error Message</p>
                </div>
                <div class="form-layout">
                    <label for="password"> <h2 class="pswd">Password</h2> </label>
                    <input type="password" name="password" id="password" class="paswd" placeholder="Enter Password" required class="box">
                    <p class="erm">Error Message</p>
                </div>
                <div class="form-layout">
                    <label for="confirm_password"> <h2 class="Cpswd_title">Confirm Password</h2> </label>
                    <input type="password" id="Cpassword" name="Cpassword" class="Cpswd" placeholder="Enter Confirm Password" required class="box">
                    <p class="erm">Error Message</p>
                </div>
                <div class="form-layout">
                    <input type="checkbox" id="TermPrivacy" name="TermPrivacy" class="input" value="agree" class="TermNCond">
                    <label for="TermPrivacy"> <h3 class="TermNCond">I Have read and agree to Bolca's Terms of Service and Privacy Policy</h3></label>
                    <p class="erm">Error Message</p>
                </div>
                <div class="Submit">
                    <a href="./login.php">
                        <input type="submit" id="submit" name="submit" value="SUBMIT">
                    </a>
                </div>
            </form>
        </div>
    </Section>
</body>
</html>
