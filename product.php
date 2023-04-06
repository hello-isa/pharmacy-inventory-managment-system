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

$sql = "SELECT `product_id`, `name`, `description`, `quantity`, `availability`, `product_price` FROM `products`";
$result = $conn-> query($sql);

?>

<!DOCTYPE html>
<html lang="en">

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

    <script>

function incrementCounter(btn) {
    var wrapperEl = btn.parentNode;
    var numEl = wrapperEl.querySelector('.num');
    var quantity = parseInt(numEl.value);
    quantity += 1;
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

function Avail2(btn) {
    if (btn.name === 'unavailable2') {
        btn.name = 'available2';
        btn.classList.remove('btn-warning');
        btn.classList.add('btn-info');
        btn.textContent = 'Available';
    } else {
        btn.name = 'unavailable2';
        btn.classList.remove('btn-info');
        btn.classList.add('btn-warning');
        btn.textContent = 'Unavailable';
    }
    event.preventDefault();
    return true;
}


    </script>

</head>

<body>
    <br><br>

    <!-- TABLE -->
    <table class="table table-striped" style="width: 50%; margin-left: 340px;">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Quantity</th>
        <th scope="col">Availability</th>
        <th scope="col">Price</th>
        <th scope="col"></th>
        <th scope="col"></th>
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
        <td>" . $row["product_id"] . "</td>
        <td><input type='text' style='width: 150px;' name='name' value='".$row["name"]."'></td>
        <td><input type='text' style='width: 390px;' name='description' value='".$row["description"]."'></td>
        
        <td>
            <div class=\"wrapper\">
                <button class=\"minus\" onclick=\"decrementCounter(this)\">-</button>
                &nbsp&nbsp
                <input style='width: 36px;' type='text' class='num' name='quantity' value='".$row["quantity"]."' readonly>
                <button class=\"plus\" onclick=\"incrementCounter(this)\">+</button> 
            </div>                   
        </td>

        <td>";
            // Kung naa stocks kay available sha
            if ($row["quantity"] == "0") {
                $availability = "Unavailable";
                $sql = "UPDATE `products` SET availability='$availability' WHERE product_id='".$row["product_id"]."'";
                $conn->query($sql);
                echo "<button type='submit' class='btn btn-warning' style='width: 120px; color:#FFF;' name='unavailable'>Unavailable</button>";  
            } 
            // Kung dili kay awww
            else {
                if ($row["availability"] == "Available") {
                    echo "<button type='submit' class='btn btn-info' style='width: 120px; color:#FFF;' name='available'>Available</button>"; 
                } else {
                    echo "<button type='submit' class='btn btn-warning' style='width: 120px; color:#FFF;' name='unavailable'>Unavailable</button>";    
                }
            }
            echo "</td>

        <td><input type='text' style='width: 50px;' name='price' value='".$row["product_price"]."'></td>
        <td><button type='submit' class='btn btn-danger' name='delete' value='".$row["product_id"]."'>Delete</button></td>
        <td>
            <input type='hidden' name='id' value='".$row["product_id"]."'>
            <button type='submit' class='btn btn-success' name='update'>Update</button>
        </td>
        </form>
        </tr>";
    }

 // Edit functionality uwu
 if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "UPDATE `products` SET name='$name', description='$description', quantity='$quantity', product_price='$price' WHERE product_id='$id'";
  
    if ($conn->query($sql) === TRUE) {
      header("Refresh:0");
    } else {
      echo "Error updating user details: " . $conn->error;
    }
  }
  
  // Delete functionality kekw
  if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $sql = "DELETE FROM `products` WHERE product_id = $id";
  
    if ($conn->query($sql) === TRUE) {
      header("Refresh:0");   
    } else {
      echo "Error deleting record: " . $conn->error;
    }
  }

  // Available to Unavailable functionality lmao
  if (isset($_POST['available'])) {
    $id = $_POST['id'];
    $availability = "Unavailable";

    $sql = "UPDATE `products` SET availability = '$availability' WHERE product_id='$id'";

    if ($conn->query($sql) === TRUE){
        header("Refresh:0");
    } else {
        echo "Error updating record: ". $conn->error;
    }
  } 

  // Unavailable to Available functionality lmao
  if (isset($_POST['unavailable'])) {
    $id = $_POST['id'];
    $availability = "Available";

    $sql = "UPDATE `products` SET availability = '$availability' WHERE product_id='$id'";

    if ($conn->query($sql) === TRUE){
        header("Refresh:0");
    } else {
        echo "Error updating record: ". $conn->error;
    }
  } 


} else {
    echo "<tr><td colspan='8' style='text-align:center;'>No products available</td></tr>";
}

?>

    </tbody>

    </br></br>
    </table>
    <!-- Input new products uwu -->

<table class="table table-striped" style="width: 50%; margin-left: 340px;">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Quantity</th>
            <th scope="col">Availability</th>
            <th scope="col">Price</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <form method="POST">
                <td><input type="text" style="width: 187px;" name="name2"></td>
                <td><input type="text" style="width: 390px;" name="description2"></td>
                <td>
                    <div class="wrapper" style="width: 75px;">
                        <button class="minus" style="width: 20px;" onclick="decrementCounter(this)">-</button>
                        <input style="width: 26px;" type="text" class="num" name="quantity2" value="0" readonly>
                        <button class="plus" style="width: 20px;" onclick="incrementCounter(this)">+</button>
                    </div>
                </td>
                <td>
                    <button type="submit" style="width: 120px; color:#FFF;" class="btn btn-info" style="color: #FFF" name="available2">Available</button>
                </td>
                <td><input type="text" style="width: 50px;" name="price2"></td><td>
                    <button type="submit" style="width: 178px; color:#FFF;" class="btn btn-primary" name="insert">Insert</button>
                </td>
            </form>
        </tr>
    </tbody>
</table>

<?php 
if (isset($_POST['insert'])) {

    $name = $_POST['name2'];
    $description = $_POST['description2'];
    $quantity = $_POST['quantity2'];
    $price = $_POST['price2'];
    $availability2 = "Available";
    
    $sql = "INSERT INTO `products`(`name`, `description`, `quantity`, `availability`, `product_price`) VALUES ('$name', '$description', '$quantity', '$availability2', '$price')";
    
    if ($conn->query($sql) === TRUE) {
        header("Refresh:0");
    } else {
        echo "Error inserting product: " . $conn->error;
    }
}

ob_end_flush();

?>

    </body>
</html>