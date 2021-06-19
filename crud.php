<head>
<title>Manage Panel</title>
<link rel="stylesheet" href="index.css">
</head>

<center>
    <br>
<a href="index.php" style="text-decoration:none;"><h1>Restaurant Billing Management System</h1></a>
<h2>Management Panel</h2>
<hr><hr><br>

<div class="content">
  <form action="addtomenu.php" method="POST">
  <table class="hideborder">
      <tr>
          <th colspan='3'>Add Item to Menu</th>
        </tr>
      
</table><br><br>


<table class='hideborder'>
<tr>
          <th class="hideborder">
              Item Name
          </th>
          <th class="hideborder">
              :
          </th>
          <td class="hideborder">
              <input type="text" name="itemname" class="input" required>
          </td>
      </tr>


      <tr>
          <th class="hideborder">
              Item Price
            </th>

            <th class="hideborder">
                :
            </th>
            <td class="hideborder">
                <input type="number" name="price" class="input" required>
            </td>
      </tr>
  </table> <br><br>
  
  <button>Add Item</button>
</form>
    </div>
    <br><br>
    <hr>
    <br><br>

<?php

require_once("dbconnection.php");


$sql = "Select * from menu_items";
$result = $conn->query($sql);
$i=1;

if ($result->num_rows > 0) {
  echo  "<table class='item-table'>
  <tr>
  <th colspan='4'>Modify Existing Items</th>
  </tr>
        <tr>
            <th>Serial</th>
            <th>Item Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$i."</td><td>" . $row["item"]. "</td><td>" . $row["price"]. "</td><td><a href=delete.php?id=".$row["id"]."><button>Delete</button></a> / <a href=update.php?id=".$row['id']."><button>Update</button></a></td></tr>" ;
        $i++;
    }
    echo "</table><br><br>";
} else {
    echo "0 results";
}

$conn->close();

?>

