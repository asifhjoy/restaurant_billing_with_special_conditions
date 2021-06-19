<?php
require_once('dbconnection.php');

$item = ucwords($_POST['itemname']);
$price = $_POST['price'];

echo $item;


$sql = "INSERT INTO menu_items (item,price)
VALUES ('$item',$price)";

if ($conn->query($sql) == TRUE) {
    header('Location: crud.php');
} else {
         echo "<center><h2><br><br><br><br>Problem To INSERT Data</h2></center>";
}

$conn->close();

?>