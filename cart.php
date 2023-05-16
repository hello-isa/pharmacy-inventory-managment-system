<!-- Customer page: Cart -->
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
  <!-- Side nav -->
  <div class="flex-column p-3 bg-light" style="width: 280px; height: 750px; z-index: 1000; position: absolute;">
      <!-- Account  -->
      <div class="m-3">
          <a href="#" class="d-flex align-items-center link-dark text-decoration-none" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle me-2" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg>
                  <strong><?php session_start();
                      echo $_SESSION['email'];
                      $users_id = $_SESSION['id']; ?></strong>
              </a>
      </div>
      <hr>

      <!-- Pages -->
      <ul class="nav nav-pills flex-column" style="margin-bottom: 510px;">
      <li class="nav-item">
              <a class="nav-link " aria-current="page" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z"/>
                </svg>
                  Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link " aria-current="page" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                </svg>
                  About</a>
          </li>
          <li class="nav-item">
              <a class="nav-link " aria-current="page" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                </svg>
                  Contact</a>
          </li>
          <li class="nav-item">
              <a class="nav-link " aria-current="page" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-prescription" viewBox="0 0 16 16">
                      <path d="M5.5 6a.5.5 0 0 0-.5.5v4a.5.5 0 0 0 1 0V9h.293l2 2-1.147 1.146a.5.5 0 0 0 .708.708L9 11.707l1.146 1.147a.5.5 0 0 0 .708-.708L9.707 11l1.147-1.146a.5.5 0 0 0-.708-.708L9 10.293 7.695 8.987A1.5 1.5 0 0 0 7.5 6h-2ZM6 7h1.5a.5.5 0 0 1 0 1H6V7Z"/>
                      <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v10.5a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 3 14.5V4a1 1 0 0 1-1-1V1Zm2 3v10.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V4H4ZM3 3h10V1H3v2Z"/></svg>
                  Shop</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/></svg>
                  Cart</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-receipt-cutoff" viewBox="0 0 16 16">
                <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zM11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                <path d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293 2.354.646zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118l.137-.274z"/></svg>
                  Receipt</a>
          </li>
      </ul>

      <!-- Sign out -->
      <hr>
      <ul class="nav nav-pills flex-column">
          <li class="nav-item">
              <a class="nav-link" href="">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
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