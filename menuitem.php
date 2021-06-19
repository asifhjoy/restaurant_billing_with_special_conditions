
<?php

require_once("dbconnection.php");


$sql = "Select * from menu_items";
$result = $conn->query($sql);
$i=1;

if ($result->num_rows > 0) {
  echo  "<table class='item-table'>
        <tr>
            <th>Select</th>
            <th>Serial</th>
            <th>Item Name</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td><input type='checkbox' id='checkbox$i' onclick='QuantityBox($i)' name='orderitem[]' value=".$row['id']."></td><td>".$i."</td><td>" . $row["item"]. "</td><td>" . $row["price"]. "</td><td><input type='number' id='quantity$i' name='quantity[]' value='' disabled required></td></tr>" ;
        $i++;
    }
    echo "</table><br><br>";
} else {
    echo "0 results";
}

$conn->close();


?>

<script>
 
function QuantityBox(a){

var quantitybox = document.getElementById('quantity'+a);
var checkbox = document.getElementById('checkbox'+a);
var proceedbtn = document.getElementById('btn');

if(checkbox.checked){
    quantitybox.disabled=false;
}
else{
    quantitybox.disabled=true;
}

var btn = document.getElementsByTagName('input');
var flag=0;
for(var i=0; i<btn.length; i++)
{
    if(btn[i].type.toLowerCase()=='checkbox')
    {
      if(btn[i].checked==true)
      {
        flag=1;
      }  
    }
}
if(flag)
{
    proceedbtn.disabled=false;
}
else
{
    proceedbtn.disabled=true;
}
    

}

</script>