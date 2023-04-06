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

$sql = $sql = "SELECT `orders_id`, `product_id`, `users_id`, `order_quantity`, `total_price`, `date_ordered`, `status` FROM `orders` WHERE `users_id` = '$users_id'";

$result = $conn-> query($sql);

?>

<head>
    <meta charset="UTF-8" />
    <title>Homepage</title>
    <link rel="stylesheet" href="css\style(code).css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

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
        <th scope="col">Product ID</th>
        <th scope="col">Users ID</th>
        <th scope="col">Order Quantity</th>
        <th scope="col">Order Price</th>
        <th scope="col">Date Ordered</th>
        <th scope="col">Status</th>
        <th scope="col"></th>
    </tr>
    </thead>


        <tbody>

<?php
if ($result->num_rows > 0) {

    $total = 0;

    while ($row = $result->fetch_assoc()) {
        
        echo "<tr>
        <form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>
        <td>" . $row["orders_id"] . "</td>
        <td style='width: 150px;'>" . $row["product_id"] . "</td>
        <td style='width: 390px;'>" . $row["users_id"] . "</td>
        <td style='width: 50px;'>" . $row["order_quantity"] . "</td>
        <td style='width: 50px;'>" . $row["total_price"] . "</td>
        
        <td style='width: 50px;'>" . $row["date_ordered"] . "</td>
        <td style='width: 50px;'>" . $row["status"] . "</td>
        
        <td>
        <input type='hidden' name='product_ids' value='".$row["product_id"]."'>
        <input type='hidden' name='quantity' value='".$row["order_quantity"]."'>
        <button type='submit' class='btn btn-danger' name='delete' value='".$row["orders_id"]."'>Delete</button></td>
        
        </form>
        </tr>";

        $total += $row["total_price"];
        
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
    echo "<tr><td colspan='8' style='text-align:center;'>No products available</td></tr>";
}

ob_end_flush();

?>

  </table>

  <thead>
  <table class="table table-striped" style="width: 50%; margin-left: 340px;">

  <tr>
    <th scope="col" style="text-align: center">Total Price</th>
  </tr>

  </thead>

  <?php 

    echo"<td>$total</td>";
  
  ?>

  </table>

</body>
</html>
