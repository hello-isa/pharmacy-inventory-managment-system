<!-- Customer Page -->
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

$partial = "Partial";
$sql = "SELECT `orders_id`, `product_id`, `users_id`, `order_quantity`, `total_price`, `date_ordered`, `status` FROM `orders` WHERE `users_id` = '$users_id' AND `status` = '$partial'";

$result = $conn->query($sql);

?>

<head>
  <meta charset="UTF-8" />
  <title>Homepage</title>
  <link rel="stylesheet" href="css\style(code).css" />
  <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

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

</head>

<body>

  <br><br>

  <!-- TABLE -->
  <table class="table table-striped" style="width: 70%; margin-left: 340px;">
    <thead>
      <tr>
        <th scope="col" style="width: 15%">Product Name</th>
        <th scope="col" style="width: 30%">Product Description</th>
        <th scope="col" style="width: 10%">Order Quantity</th>
        <th scope="col" style="width: 7.5%">Order Price</th>
        <th scope="col" style="width: 7.5%"></th>
      </tr>
    </thead>


    <tbody>

      <?php
      if ($result->num_rows > 0) {

        $total = 0;

        while ($row = $result->fetch_assoc()) {

          $temp = $row["product_id"];
          $pname_query = "SELECT `name`, `description` FROM `products` WHERE `product_id` = $temp";
          $pname_result = $conn->query($pname_query);
          $pname_row = $pname_result->fetch_assoc();
          $pname = $pname_row['name'];
          $pdesc = $pname_row['description'];

          echo "<tr>
        <form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>
        <td>" . $pname . "</td>
        <td>" . $pdesc . "</td>
        <td>" . $row["order_quantity"] . "</td>
        <td>" . $row["total_price"] . "</td>    
        <td>
        <input type='hidden' name='product_ids' value='" . $row["product_id"] . "'>
        <input type='hidden' name='quantity' value='" . $row["order_quantity"] . "'>
        <button type='submit' class='btn btn-danger' name='delete' value='" . $row["orders_id"] . "'>Delete</button></td>
        
        </form>
        </tr>";
        }

        // Delete functionality kekw
        if (isset($_POST['delete'])) {
          $id = $_POST['delete'];
          $product_id = $_POST['product_ids'];

          $quantity_query = "SELECT `order_quantity` FROM `orders` WHERE `orders_id` = $id";
          $quantity_result = $conn->query($quantity_query);
          $quantity_row = $quantity_result->fetch_assoc();
          $quantity = $quantity_row['order_quantity'];

          $quantity_query2 = "SELECT `quantity` FROM `products` WHERE `quantity` = 0 AND `product_id` = $product_id";
          $quantity_result2 = $conn->query($quantity_query2);

          if ($quantity_result2->num_rows > 0) {
            $update_avail = "UPDATE `products` SET `availability` = 'Available' WHERE `product_id` = $product_id";
            $conn->query($update_avail);
          }


          $update_query = "UPDATE `products` SET `quantity` = `quantity` + $quantity WHERE `product_id` = $product_id";
          $conn->query($update_query);

          $delete_query = "DELETE FROM `orders` WHERE `orders_id` = $id";
          if ($conn->query($delete_query) === TRUE) {
            header("Refresh:0");
          } else {
            echo "Error deleting record: " . $conn->error;
          }
        }
      } else {
        echo "<tr><td colspan='5' style='text-align:center;'>No products available</td></tr>";
      }

      ob_end_flush();

      ?>

  </table>

  <thead>
    <table class="table table-striped" style="width: 70%; margin-left: 340px;">

      <tr>
        <th scope="col" style="text-align: center">Total Price</th>
        <th></th>
      </tr>

  </thead>

  <?php
  $partial = "Partial";
  $total_query = "SELECT SUM(`total_price`) FROM `orders` WHERE `users_id` = $users_id AND `status` = '$partial';";
  $result2 = $conn->query($total_query);
  $SUM = $result2->fetch_assoc();
  $total = $SUM['SUM(`total_price`)'];

  echo "<td><center>$total</center></td>
  <td>
    <form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>
      <button type='submit' class='btn btn-info' name='confirm'>Confirm</button>
    </form>
  </td>";

  if (isset($_POST['confirm'])) {

    $update_query = "UPDATE `orders` SET `status` = 'Pending', `date_ordered` = NOW() WHERE `users_id` = $users_id AND `status` = '$partial';";
    $result3 = $conn->query($update_query);

    if ($result3) {
      echo "Orders confirmed successfully.";
    } else {
      echo "Error: " . $conn->error;
    }
  }
  ?>


  </table>

</body>

</html>