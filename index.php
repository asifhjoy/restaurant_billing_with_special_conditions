<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Billing</title>
</head>

<body>
  <center>
      <h1>Restaurant Billing Management System</h1>
      <hr><hr>
  </center>
  <div class="content">
  <br><br>
  <form action="order.php" method="POST">
  <table class="hideborder">
      <tr>
          <th class="hideborder">
              Customer Name
          </th>
          <th class="hideborder">
              :
          </th>
          <td class="hideborder">
              <input type="text" name="customer_name" class="input" required>
          </td>
      </tr>


      <tr>
          <th class="hideborder">
              Date of Birth
            </th>

            <th class="hideborder">
                :
            </th>
            <td class="hideborder">
                <input type="date" name="bday" class="input" required>
            </td>
      </tr>
  </table>    
    </div>
    <br><br>
    
<hr>

<center>
    <h2>Menu Items</h2>
    
<?php require_once("menuitem.php"); ?>

<button id='btn' disabled>Proceed</button><br><br><hr><br>
</form>

<a href="crud.php"><button>Management Panel</button></a>

</center>
</body>
</html>







