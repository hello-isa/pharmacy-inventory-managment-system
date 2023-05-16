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

$ready = "Ready";
$sql = "SELECT o.`orders_id`, o.`product_id`, o.`users_id`, o.`order_quantity`, o.`total_price`, o.`date_ordered`, o.`status`, u.email 
        FROM `orders` o 
        JOIN `users` u ON o.users_id = u.id 
        WHERE o.`users_id` = '$users_id' AND o.`status` = '$ready'";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Homepage</title>
    <link rel="stylesheet" href="style(receipt).css">
    <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

</head>

<body>
    <br><br>

    <!-- TABLE -->
    <?php
    echo '
<table class="body-wrap">
    <tbody><tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td class="content-block">
                                        <h2>Thanks for using our app</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tbody><tr>
                                                <td>Anna Smith<br>Invoice #12345<br>June 01 2015</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <tbody><tr>
                                                            <td>Service 1</td>
                                                            <td class="alignright">$ 20.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Service 2</td>
                                                            <td class="alignright">$ 10.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Service 3</td>
                                                            <td class="alignright">$ 6.00</td>
                                                        </tr>
                                                        <tr class="total">
                                                            <td class="alignright" width="80%">Total</td>
                                                            <td class="alignright">$ 36.00</td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <a href="#">View in browser</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        Company Inc. 123 Van Ness, San Francisco 94102
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>';
    ?>

    </div>
    </td>
    <td></td>
    </tr>
    </tbody>
    </table>
</body>