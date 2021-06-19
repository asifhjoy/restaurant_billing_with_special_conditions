<?php

require_once('dbconnection.php');

$id = $_GET['id'];

$sql = "DELETE FROM menu_items WHERE id = '$id'";
if ($conn->query($sql) == TRUE) {
    header('Location: crud.php');
} else {
         echo "<center><h2>Problem To DELETE</h2></center>";
}

?>