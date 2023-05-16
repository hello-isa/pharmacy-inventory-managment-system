<!DOCTYPE html>
<html>

<head>
  <title>Registration Form</title>
</head>

<body>

  <?php
  if (isset($_POST['reg_button'])) {

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pharmacy_inventory_db";
    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['user'];
    $email = $_POST['email'];

    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $registration_date = date("Y-m-d H:i:s");
    $usertype = "Customer";

    $sql = "INSERT INTO users (email, username, password, registration, usertype) VALUES ('$email', '$username', '$hashed_password', '$registration_date', '$usertype')";
    if ($conn->query($sql) === TRUE) {
      header("Refresh:0");
      exit();
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }
  ?>

  <!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>User Login</title>
    <link rel="stylesheet" href="css\style(login).css">
  </head>

  <body>

    <!-- Start of form -->
    <form action="" method="post">
      <div class="container col-4 border border-1 p-5" style="margin-top: 7.5rem;">

        <!-- Login heading -->
        <div class="mb-4">
          <img src="images\logo.png" style="height: 60px;">
          <h2>Create an Account!</h2>
        </div>

        <!-- Email address-->
        <div class="mb-4">
          <input name="email" type="email" placeholder="Email" class="form-control">
        </div>

        <!-- Username field -->
        <div class="mb-4">
          <input name="user" type="username" placeholder="Username" class="form-control">
        </div>

        <!-- Password field -->
        <div class="mb-4">
          <input name="password" type="password" placeholder="Password" class="form-control">
        </div>

        <!-- Submit button -->
        <div class="mb-4" style="text-align:center">
          <button name="reg_button" class="login-button" type="submit">Submit</button>
        </div>

        <hr />
        <!-- Login link -->
        <div class="" style="text-align:center">
          <p>Already have an account? <a href="login.php">Log In</a></p>
        </div>
      </div>
    </form>
    <script src="js\bootstrap.bundle.js" crossorigin="anonymous">
    </script>
  </body>

  </html>