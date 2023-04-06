<!-- Customer and Admin Page -->
<?php
session_start();

// Establish connection to the database
$host = "localhost";
$user = "root";
$pass = "";
$db = "pharmacy_inventory_db";

$conn = mysqli_connect($host, $user, $pass, $db);

//Check if connection is established
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $email = $_POST['email'];
  $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' and password='$password' OR username='$email' and password='$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $id = $row['id'];
  
      $_SESSION['email'] = $email;
      $_SESSION['id'] = $id;
        header("Location: pending_orders.php");
    } else {
        echo '<script language="javascript">';
        echo 'alert("Invalid email or password")'; 
        echo '</script>';
    }
    
}

$conn->close();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Login</title>
        <link rel="stylesheet" href="css\style(login).css">
        <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflaire.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
        <script src="js/bootstrap.bundle.js"></script>
      </head>
    <body>

      <!-- Start of form -->
      <form action="" method="post">
        <div class="container col-4 border border-1 p-5" style="margin-top: 7.5rem;">

          <!-- Login heading -->
          <div class="mb-4">
            <img src="images\logo.png" style="height: 60px;">
            <h2>Welcome to ALV Pharmacy!</h2>
          </div>
          
              <!-- Email address or username field -->
              <div class="mb-4">
                <input name="email" type="text" placeholder="Email or Username" class="form-control">
              </div>

              <!-- Password field -->
              <div class="mb-4">
                <input name="password" type="password" placeholder="Password" class="form-control">
              </div>

              <!-- Usertype field -->
              <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item">Admin</a>
    <a class="dropdown-item">Customer</a>
  </div>
</div>


              <!-- Submit button -->
              </br>
              <div class="mb-4" style="text-align:center">
                <button class="login-button" type="submit">Submit</button>
              </div>

              <hr />
              <!-- Sign up link -->
              <div class="" style="text-align:center">
                <p>No account? <a href="register.php">Sign up</a></p>
              </div>
        </div>
      </form>

<!-- Connect to jquery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>