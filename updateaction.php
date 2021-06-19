<?php
require_once('dbconnection.php');

$id = $_POST['id'];
$item = $_POST['item'];
$price = $_POST['price'];


$sql="UPDATE menu_items SET  item='$item', price='$price' WHERE id=$id";


if ($conn->query($sql) == TRUE) {
    header('Location: crud.php');
} else {
         echo "<center><h2>Problem To UPDATE</h2></center>";
}

$conn->close();

?>