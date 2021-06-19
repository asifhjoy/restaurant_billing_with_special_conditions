<head>
<title>Update Information</title>
<link rel="stylesheet" href="index.css">
</head>

<?php
require_once('dbconnection.php');

$id = $_GET['id'];
$item = '';
$price = '';

$sql = "SELECT * FROM menu_items WHERE id=$id";
$result = $conn->query($sql);

if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        $item = $row['item'];
        $price = $row['price']; 
    }
}





echo "<center>
<form method='POST' action = 'updateaction.php'>
<br><br>
<h2><u> Update Information </u></h2><br><br>
<input type='hidden' name='id' value = $id>


<table class='hideborder'>
<tr>
          <th class='hideborder'>
              Item Name
          </th>
          <th class='hideborder'>
              :
          </th>
          <td class='hideborder'>
              <input type='text' name='item' class='input' value='$item'>
          </td>
      </tr>


      <tr>
          <th class='hideborder'>
              Item Price
            </th>

            <th class='hideborder'>
                :
            </th>
            <td class='hideborder'>
                <input type='number' name='price' class='input' value='$price'>
            </td>
      </tr>
  </table>
  <br><br>

 <button class='button' ><b><big>Update</big></button>
  <br><br>
</form>";

$conn->close();

?>