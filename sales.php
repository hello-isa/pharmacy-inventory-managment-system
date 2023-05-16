<!-- Admin Page -->
<?php
ob_start();
//--Nav-Bar--//
//--Records sales made for each day, a succesfull sale is determined if status is no longer pending and admins can also check the most sales made within a specific day--//

include("sidenav.php");

$host = "localhost";
$user = "root";
$pass = "";
$db = "pharmacy_inventory_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$ready = "Ready";
$sql = "SELECT `orders_id`, `product_id`, `users_id`, `order_quantity`, `total_price`, `date_ordered`, `status`, users.email 
        FROM `orders` 
        JOIN `users` 
        ON orders.users_id = users.id
        WHERE `status` = '$ready'";

$total_query = "SELECT SUM(`total_price`) FROM `orders` WHERE `status` = '$ready'";
if (isset($_POST['filter-submit'])) {
    // Get the filter date from the form
    $filter_date = $_POST['filter-date'];

    // Modify the SQL query to filter by the specified date
    $sql .= " AND DATE(date_ordered) = '$filter_date'";
    $total_query .= " AND DATE(date_ordered) = '$filter_date'";
}

$result = $conn->query($sql);
$result2 = $conn->query($total_query);
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
                <th scope="col" style="width: 10%">Customer Email</th>
                <th scope="col" style="width: 10%">Product Name</th>
                <th scope="col" style="width: 10%">Product Description</th>
                <th scope="col" style="width: 10%">Order Quantity</th>
                <th scope="col" style="width: 10%">Order Price</th>
                <th scope="col" style="width: 10%">Date Ordered</th>
                <th scope="col" style="width: 10%">Status</th>
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
        <td>" . $row["email"] . "</td>
        <td>" . $pname . "</td>
        <td>" . $pdesc . "</td>
        <td>" . $row["order_quantity"] . "</td>
        <td>" . $row["total_price"] . "</td>
        
        <td>" . $row["date_ordered"] . "</td>
        <td>" . $row["status"] . "</td>
        
        </form>
        </tr>";
                }

                ob_end_flush();
            }
            ?>
        </tbody>
    </table>

    <thead>
        <table class="table table-striped" style="width: 70%; margin-left: 340px;">

            <tr>
                <th></th>
                <th scope="col" style="text-align: center">Total Price</th>
            </tr>

    </thead>
    <td>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="date" id="filter-date" name="filter-date">
            <button type="submit" name="filter-submit">Filter</button>
        </form>
    </td>
    <td>
        <?php
        $SUM = $result2->fetch_assoc();
        $total = $SUM['SUM(`total_price`)'];
        echo "<center>$total</center>";
        ?>
    </td>
    </table>

</body>

</html>