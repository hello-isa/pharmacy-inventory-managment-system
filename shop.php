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

$sql = "SELECT `product_id`, `name`, `description`, `quantity`, `availability`, `product_price` FROM `products`";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

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

    <script>
        function incrementCounter(btn, maxQuantity) {
            var wrapperEl = btn.parentNode;
            var numEl = wrapperEl.querySelector('.num');
            var quantity = parseInt(numEl.value);
            if (quantity < maxQuantity) {
                quantity += 1;
            }
            numEl.value = quantity;
            event.preventDefault();
        }


        function decrementCounter(btn) {
            var wrapperEl = btn.parentNode;
            var numEl = wrapperEl.querySelector('.num');
            var quantity = parseInt(numEl.value);
            if (quantity > 0) {
                quantity -= 1;
            }
            numEl.value = quantity;
            event.preventDefault();
        }
    </script>

</head>

<body>
    <br><br>

    <!-- TABLE -->
    <table class="table table-striped" style="width: 70%; margin-left: 340px;">
        <thead>
            <tr>
                <th scope="col" style="width: 10%">Name</th>
                <th scope="col" style="width: 20%">Description</th>
                <th scope="col" style="width: 10%">Quantity</th>
                <th scope="col" style="width: 10%">Availability</th>
                <th scope="col" style="width: 10%">Price</th>
                <th scope="col" style="width: 10%"></th>
            </tr>
        </thead>


        <tbody>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $button_class = "";
                    $button_name = "";
                    if ($row["availability"] == "available") {
                        $button_class = "btn btn-info";
                        $button_name = "Available";
                    } else {
                        $button_class = "btn btn-warning";
                        $button_name = "Unavailable";
                    }
                    echo "<tr>
        <form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>
        <td>" . $row["name"] . "</td>
        <td>" . $row["description"] . "</td>
        
        <td>
            <div class=\"wrapper\">
                <button class=\"minus\" onclick=\"decrementCounter(this)\">-</button>
                &nbsp&nbsp
                <input type='text' class='num' name='quantity' value='0' readonly>
                <button class= \"plus\" onclick=\"incrementCounter(this, value='" . $row["quantity"] . "')\">+</button>
            </div>                   
        </td>

        <td>";
                    // Kung wala stocks kay unavailable
                    if ($row["quantity"] == "0") {
                        $availability = "Unavailable";
                        $sql = "UPDATE `products` SET availability='$availability' WHERE product_id='" . $row["product_id"] . "'";
                        $conn->query($sql);
                        echo "<button type='submit' class='btn btn-warning' style='color:#FFF;' name='unavailable'>Unavailable</button>";
                    } else if ($row["quantity"] > "0" && $row["availability"] != "Unavailable") { // Kung naa kay available
                        $availability = "Available";
                        $sql = "UPDATE `products` SET availability='$availability' WHERE product_id='" . $row["product_id"] . "'";
                        $conn->query($sql);
                        echo "<button type='submit' class='btn btn-info' style='color:#FFF;' name='available'>Available</button>";
                    }
                    // Kung naa kay available
                    else {
                        if ($row["availability"] == "Available") {
                            echo "<button type='submit' class='btn btn-info' style='color:#FFF;' name='available'>Available</button>";
                        } else {
                            echo "<button type='submit' class='btn btn-warning' style='color:#FFF;' name='unavailable'>Unavailable</button>";
                        }
                    }
                    echo "</td>

        <td>" . $row["product_price"] . "</td>

        <td>
        <input type='hidden' name='product_ids' value='" . $row["product_id"] . "'>
        <input type='hidden' name='productprice' value='" . $row["product_price"] . "'>
        <input type='hidden' name='availability2' value='" . $row["availability"] . "'>
        <button type='submit' class='btn btn-primary' style='color: white;' name='order'>Order</button>
        </td>
        
        </form>
        </tr>";
                }

                if (isset($_POST['order']) && $_POST['availability2'] == "Available" && $_POST['quantity'] != 0) {
                    $product_id = $_POST['product_ids'];
                    $order_quantity = $_POST['quantity'];
                    $product_price = $_POST['productprice'];
                    $total_price = $product_price * $order_quantity;
                    $status = "Partial";

                    $sql = "INSERT INTO `orders`(`product_id`, `users_id`, `order_quantity`, `total_price`, `status`) VALUES ('$product_id', '$users_id', '$order_quantity', '$total_price', '$status')";

                    $quantity2 = "SELECT `quantity` FROM `products` WHERE `product_id` = '$product_id'";
                    $quantity_result = $conn->query($quantity2);
                    $quantity_row = $quantity_result->fetch_assoc();
                    $quantity = $quantity_row['quantity'] - $order_quantity;

                    $sql2 = "UPDATE `products` SET `quantity`='$quantity' WHERE `product_id` = '$product_id'";

                    if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
                        header("Refresh:0");
                    }
                }
            } else {
                echo "<tr><td colspan='8' style='text-align:center;'>No products available</td></tr>";
            }

            ob_end_flush();

            ?>
    </table>
</body>

</html>