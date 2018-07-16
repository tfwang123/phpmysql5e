<html>
<head>
  <title>Bob's Auto Parts - Order Results</title>
</head>
<body>
<h1>Bob's Auto Parts</h1>
<h2>Order Results</h2>
<?php

$tireqty = $_POST['tireqty'];
$oilqty = $_POST['oilqty'];
$sparkqty = $_POST['sparkqty'];



  echo '<p>Order processed at ';
  echo date('H:i, jS F');
  echo '</p>';

  if($tireqty == 0){
    echo 'You did not order anything on the previous page!<br />';
  }




  $totalqty = 0;
  $totalamount = 0.00;

  $totalqty = 0;
  $totalqty = $tireqty + $oilqty + $sparkqty;
  if ($totalqty == 0){
    echo '<p style="color:red">';
    echo 'You did not order anything on the previous page!';
    echo '</p>';
  }else {
      echo '<p>Your order is as follows: </p>';
      if ($tireqty > 0)
        echo $tireqty.' tires<br />';
      if ($oilqty > 0)
        echo $oilqty.' bottles of oil<br />';
      if ($sparkqty > 0)
        echo $sparkqty.' spark plugs<br />';
  }
  echo 'Items ordered: '.$totalqty.'<br />';

  $totalamount = 0.00;

  define('TIREPRICE', 100);
  define('OILPRICE', 10);
  define('SPARKPRICE', 4);

  $totalamount = $tireqty * TIREPRICE
               + $oilqty * OILPRICE
               + $sparkqty * SPARKPRICE;

  if ($tireqty < 10){
      $discount = 0;
  }elseif (($tireqty >= 10) && ($tireqty <= 49)){
      $discount = 5;
  }elseif (($tireqty >= 50) && ($tireqty <= 99)){
      $discount = 10;
  } elseif ($tireqty >= 100){
      $discount = 15;
  }

  echo 'Subtotal: $'.number_format($totalamount,2).'<br />';

  $taxrate = 0.10;  // local sales tax is 10%
  $totalamount = ($totalamount * (1 + $taxrate)) * (100 - $discount) / 100;
  echo 'Total including tax: $'.number_format($totalamount,2).'<br />';

?>
</body>
</html>

