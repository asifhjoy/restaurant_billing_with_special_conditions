<head>
<title>Invoice</title>
<link rel="stylesheet" href="index.css">
</head>



<div id="printableArea">

<?php

require_once("dbconnection.php");

$invoiceid = $_GET['invoice'];
$orderid = $_GET['orderid'];
$customername = $_GET['customer'];
$customerbday = $_GET['customerday'];
$total = $_GET['total'];
$discount = $_GET['discount'];
$netamount = $_GET['net'];
$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
$i=1;


echo "<center><h1>Interactive Restaurant and Dine</h1>
Invoice No.".$invoiceid."<br>Date : ".date('m-d-Y')."<br>Time : ".$dt->format('h:i A')."<hr>
<div style='padding-left:5%;' align='left'>
Customer Name : ".$customername."<br>
Customer Birthday : ".$customerbday."</div>";


$sql = "SELECT * FROM orders JOIN menu_items WHERE orders.order_id=$orderid && orders.item_id=menu_items.id";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
    echo "<h3>Ordered Foods</h3>
    <table class='item-table'>
            <tr>
                <th>Serial</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>";

            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$i."</td><td>" . $row["item"]. "</td><td>" . $row["quantity"]. "</td><td>".$row['price']." x ".$row['quantity']." = ".$row['price']*$row['quantity']."/=</td></tr>" ;
                $i++;
            }
            echo "<tr><td colspan='3'>Total Amount</td><td>".$total."/=</td></tr>";
            echo "<tr><td colspan='3'>Discount</td><td>".$discount."/=</td></tr>";
            echo "<tr><td colspan='3'>Net Payable Amount</td><td>".$netamount."/=</td></tr>";
            echo "</table><br><br>";
        } else {
            echo "0 results";
        }
        $conn->close();
?>
</div>
<center>
<a href="index.php"><button onclick="printDiv('printableArea')">Print Invoice</button></a>
    </center>


<script>
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}</script>