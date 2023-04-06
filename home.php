<?php
ob_start();
//--Nav-Bar--//
include("sidenav.php");

$host = "localhost";
$user = "root";
$pass = "";
$db = "pharmacy_inventory_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, email, username, password, registration, usertype from users";
$result = $conn-> query($sql);

?>

<!DOCTYPE html>

<html lang="en">
<head>
        <meta charset="UTF-8" />
        <title>Homepage</title>
        <link rel="stylesheet" href="css\style(code).css" />
        <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflaire.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

<style>   
    th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
    } 

    input {
      background-color: transparent;
      border: transparent;
    }
</style>
</head>

<body>
<br><br>

<!-- TABLE -->
<table class="table table-striped" style="width: 50%; margin-left: 340px;">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Registration</th>
      <th scope="col">Usertype</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

  <?php

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
      <form action='".$_SERVER['PHP_SELF']."' method='POST'>
        <td>".$row["id"]."</td>
        <td><input type='text' name='email' value='".$row["email"]."'></td>
        <td><input type='text' name='username' value='".$row["username"]."'></td>
        <td><input type='text' name='password' value='".$row["password"]."'></td>
        <td>".$row["registration"]."</td>
        <td>".$row["usertype"]."</td>
        <td><button type='submit' class='btn btn-danger' name='delete' value='".$row["id"]."'>Delete</button></td>
        <td>
          <input type='hidden' name='id' value='".$row["id"]."'>
          <button type='submit' class='btn btn-success' name='update'>Update</button>
        </td>
      </form>
    </tr>";
  }
} else {
  echo "<tr><td colspan='7'>No results found</td></tr>";
}

// Edit functionality uwu
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "UPDATE `users` SET email='$email', username='$username', password='$password' WHERE id='$id'";

  if ($conn->query($sql) === TRUE) {
    header("Refresh:0");
  } else {
    echo "Error updating user details: " . $conn->error;
  }
}

// Delete functionality kekw
if (isset($_POST['delete'])) {
  $id = $_POST['delete'];
  $sql = "DELETE FROM `users` WHERE id = $id";

  if ($conn->query($sql) === TRUE) {
    header("Refresh:0");   
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}



ob_end_flush();
?>

  </tbody>
  </table>
</body>
</html>
