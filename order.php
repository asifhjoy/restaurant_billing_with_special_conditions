<?php


function discount()
{
    include("dbconnection.php");

    $discount[]=0.0;  
    $string = ''; 
    $bday = $_POST['bday'];
    $dob = new DateTime($bday);
    $now = new DateTime(date("Y-m-d"));
    $age = $now->diff($dob)->y;


    if($dob->format("m-d") == $now->format("m-d"))
    {
        if($age<25)
        {
            $discount[]=15/100;
        }
        elseif($age>60)
        {
            $discount[]=30/100;
        }
        else
        {
          $discount[]=5/100;  
        }
    }

   
 
    foreach($_POST['orderitem'] as $i)
    {
        $sql = "Select item from menu_items where id=$i";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
              $string = $row["item"];
              if (strpos($string,'Pasta')==true){
                    $discount[]=20/100;
                    break;
                }
            }
            
        }
    }
   
    rsort($discount);
    return $discount[0];
 
}




require_once("dbconnection.php");
$discount = discount();
$discountamount = 0.0;
$pastamount = 0.0;
$othersamount = 0.0;
$total_bill=0.0;
$net_bill=0.0;


$customer_name = $_POST['customer_name'];
$customer_bday = $_POST['bday'];
$customer_id='';

$customersql = "INSERT INTO customer(name,dob) VALUES('$customer_name','$customer_bday')";

if($conn->query($customersql)==true)
{
    $customer_id = $conn->insert_id;

}

$ordernumsql = "SELECT * FROM orders";
$result = $conn->query($ordernumsql);
$ordernum = 0;
if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
             $ordernum = $row['order_id'];
            }
            
        }
    
        $ordernum++;


foreach(array_combine($_POST['orderitem'], $_POST['quantity']) as $item=>$qt)
{
    $ordersql = "INSERT INTO orders(order_id,customer_id,item_id,quantity) VALUES('$ordernum','$customer_id','$item','$qt')";
    $conn->query($ordersql);

    $sql = "Select * from menu_items where id=$item";
    $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $string = $row["item"];
                if (strpos($string,'Pasta')==true){

                    $pastamount = $pastamount + ($row['price']*$qt);
                        
                    }
                else
                {
                    $othersamount = $othersamount + ($row['price']*$qt);
                }
            }
            
        }

}

if($discount==0.2)
{
    $total_bill = floatval($pastamount+$othersamount);
    $discountamount = floatval($pastamount)*floatval($discount);
   
}
else
{
    $total_bill = floatval($pastamount+$othersamount);
    $discountamount = $total_bill*floatval($discount);
  
}

$net_bill = $total_bill-$discountamount;

$today = date('Y-m-d');
$invoice_id='';

$invoicesql = "INSERT INTO bill(bill_date,customer_id,order_id,total_bill,discount,net_bill) VALUES('$today','$customer_id','$ordernum','$total_bill','$discountamount','$net_bill')";
if($conn->query($invoicesql)==true)
{
    $invoice_id = $conn->insert_id;
}


$conn->close();


header('Location: invoice.php?invoice='.$invoice_id.'&&orderid='.$ordernum.'&&customer='.$customer_name.'&&customerday='.$customer_bday.'&&total='.$total_bill.'&&discount='.$discountamount.'&&net='.$net_bill);


?>

