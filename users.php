<!-- Admin page: Users -->
<?php
ob_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "pharmacy_inventory_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, email, username, password, registration, usertype from users";
$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Homepage</title>
  <link rel="stylesheet" href="css\style(code).css" />
  <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflaire.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

  <style>
    th,
    td {
      border: 1px solid black;
      padding: 8px;
      text-align: left;
    }

    input {
      background-color: transparent;
      border: transparent;
    }
  </style>

  <script>
    function deleteRow(ids) {
      id.splice(ids, 1);
      bookname.splice(ids, 1);
      genre.splice(ids, 1);
      quantity.splice(ids, 1);
    }
  </script>
</head>

<body>
  <!-- Side nav -->
  <div class="flex-column p-3 bg-light" style="width: 280px; height: 100%; z-index: 1000; position: fixed;">
    <!-- Account  -->
    <div class="m-3">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle me-2" viewBox="0 0 16 16">
          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
        </svg>
        <strong><?php session_start();
                echo $_SESSION['email'];
                $users_id = $_SESSION['id']; ?></strong>
      </a>
    </div>
    <hr>

    <!-- Links -->
    <ul class="nav nav-pills flex-column" style="margin-bottom: 400px;">
      <li class="nav-item">
        <a class="nav-link" href="orders.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 16 16">
            <path d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z" />
          </svg>
          Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="products.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-prescription" viewBox="0 0 16 16">
            <path d="M5.5 6a.5.5 0 0 0-.5.5v4a.5.5 0 0 0 1 0V9h.293l2 2-1.147 1.146a.5.5 0 0 0 .708.708L9 11.707l1.146 1.147a.5.5 0 0 0 .708-.708L9.707 11l1.147-1.146a.5.5 0 0 0-.708-.708L9 10.293 7.695 8.987A1.5 1.5 0 0 0 7.5 6h-2ZM6 7h1.5a.5.5 0 0 1 0 1H6V7Z" />
            <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v10.5a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 3 14.5V4a1 1 0 0 1-1-1V1Zm2 3v10.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V4H4ZM3 3h10V1H3v2Z" />
          </svg>
          Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sales.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-receipt-cutoff" viewBox="0 0 16 16">
            <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zM11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
            <path d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293 2.354.646zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118l.137-.274z" />
          </svg>
          Sales</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="users.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
          </svg>
          Users</a>
      </li>
    </ul>

    <!-- Sign out -->
    <hr>
    <ul class="nav nav-pills flex-column">
      <li class="nav-item">
        <a class="nav-link" href="login.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
          </svg>
          Sign out</a>
      </li>
    </ul>
  </div>
  <br><br>

  <!-- TABLE -->
  <table class="table table-striped" style="width: 70%; margin-left: 340px;">
    <thead>
      <tr>
        <th scope="col" style="width: 15%">Email</th>
        <th scope="col" style="width: 10%">Username</th>
        <th scope="col" style="width: 15%">Registration</th>
        <th scope="col" style="width: 10%">Usertype</th>
        <th scope="col" style="width: 10%"></th>
        <th scope="col" style="width: 10%"></th>
      </tr>
    </thead>
    <tbody>

      <?php

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
      <form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>
        <td><input type='text' name='email' value='" . $row["email"] . "'></td>
        <td><input type='text' name='username' value='" . $row["username"] . "'></td>
        <td>" . $row["registration"] . "</td>
        <td>";
          if ($row["usertype"] == "Customer") {
            echo "<button type='submit' class='btn btn-info' style='color:#FFF;' name='customer'>Customer</button>";
          } else {
            echo "<button type='submit' class='btn btn-warning' style='color:#FFF;' name='admin'>Admin</button>";
          }
          echo "</td>
        <td><button onclick='deleteRow(" . $row["id"] . ")'type='submit' class='btn btn-danger' name='delete' value='" . $row["id"] . "'>Delete</button></td>
        <td>
          <input type='hidden' name='id' value='" . $row["id"] . "'>
          <button type='submit' class='btn btn-success' name='update'>Update</button>
        </td>
      </form>
    </tr>";
        }

        // Available to Unavailable functionality lmao
        if (isset($_POST['customer'])) {
          $id = $_POST['id'];
          $usertype = "Admin";

          $sql = "UPDATE `users` SET usertype = '$usertype' WHERE id='$id'";

          if ($conn->query($sql) === TRUE) {
            header("Refresh:0");
          } else {
            echo "Error updating record: " . $conn->error;
          }
        }

        // Unavailable to Available functionality lmao
        if (isset($_POST['admin'])) {
          $id = $_POST['id'];
          $usertype = "Customer";

          $sql = "UPDATE `users` SET usertype = '$usertype' WHERE id='$id'";

          if ($conn->query($sql) === TRUE) {
            header("Refresh:0");
          } else {
            echo "Error updating record: " . $conn->error;
          }
        }
      } else {
        echo "<tr><td colspan='7'>No results found</td></tr>";
      }

      // Edit functionality uwu
      if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $usertype = $_POST['usertype'];

        $sql = "UPDATE `users` SET email='$email', username='$username', usertype='$usertype' WHERE id='$id'";

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