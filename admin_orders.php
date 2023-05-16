<!-- Admin Page -->
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

$pending = "Pending";
$ready = "Ready";
$sql = "SELECT `orders_id`, `product_id`, `users_id`, `order_quantity`, `total_price`, `date_ordered`, `status` FROM `orders` WHERE `status` = '$pending' OR `status` = '$ready'";
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

</head>

<body>
    <br><br>

    <!-- TABLE -->
    <table class="table table-striped" style="width: 70%; margin-left: 340px;">
        <thead>
            <tr>
                <th scope="col" style="width: 15%">Customer Name</th>
                <th scope="col" style="width: 10%">Product Name</th>
                <th scope="col" style="width: 7.5%">Order quantity</th>
                <th scope="col" style="width: 7.5%">Total price</th>
                <th scope="col" style="width: 10%">Date ordered</th>
                <th scope="col" style="width: 10%">Status</th>
                <th scope="col" style="width: 10%"></th>
            </tr>
        </thead>


        <tbody>

            <?php

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    $temp = $row["product_id"];
                    $pname_query = "SELECT `name` FROM `products` WHERE `product_id` = $temp";
                    $pname_result = $conn->query($pname_query);
                    $pname_row = $pname_result->fetch_assoc();
                    $pname = $pname_row['name'];

                    $temp2 = $row["users_id"];
                    $uname_query = "SELECT `username` FROM `users` WHERE `id` = $temp2";
                    $uname_result = $conn->query($uname_query);
                    $uname_row = $uname_result->fetch_assoc();
                    $uname = $uname_row['username'];

                    echo "<tr>
        <form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>
        <td>" . $uname . "</td>
        <td>" . $pname . "</td>
        <td>" . $row["order_quantity"] . "</td>
        <td>" . $row["total_price"] . "</td>
        <td>" . $row["date_ordered"] . "</td>
        <td>";
                    if ($row["status"] == "Ready") {
                        echo "<button type='submit' class='btn btn-info' style='color:#FFF;' name='ready' value='" . $row["orders_id"] . "'>Ready</button>";
                    } else {
                        echo "<button type='submit' class='btn btn-warning' style='color:#FFF;' name='pending' value='" . $row["orders_id"] . "'>Pending</button>";
                    }
                    echo "</td>
        <td>
        <input type='hidden' name='orders_id' value='" . $row["orders_id"] . "'>
        <button type='submit' class='btn btn-danger' name='delete' value='" . $row["orders_id"] . "'>Delete</button></td>
        </form>
        </tr>";
                }

                if (isset($_POST['delete'])) {
                    $id = $_POST['delete'];
                    $delete_query = "DELETE FROM `orders` WHERE `orders_id` = $id";

                    if ($conn->query($delete_query) === TRUE) {
                        header("Refresh:0");
                    } else {
                        echo "Error deleting record: " . $conn->error;
                    }
                }

                if (isset($_POST['ready'])) {
                    $id = $_POST['orders_id'];
                    $availability = "Pending";
                    $sql = "UPDATE `orders` SET status = '$availability' WHERE orders_id='$id'";
                    if ($conn->query($sql) === TRUE) {
                        header("Refresh:0");
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                }

                if (isset($_POST['pending'])) {
                    $id = $_POST['orders_id'];
                    $availability = "Ready";
                    $sql = "UPDATE `orders` SET status = '$availability' WHERE orders_id='$id'";
                    if ($conn->query($sql) === TRUE) {
                        header("Refresh:0");
                    } else {
                        echo "Error updating record: " . $conn->error;
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