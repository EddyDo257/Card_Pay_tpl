<?php

session_start();
  $conn = new mysqli('localhost', 'root', '', 'pay');

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

if(isset($_POST['submit'])){
	
	$toal= $_POST['total'];
	$card= $_POST['card-number'];

	$sql2 = "SELECT card_number,amount FROM pay WHERE card_number = '$card' AND amount >= '$toal'";
    $result = $conn->query($sql2);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $payout= $row["amount"];
        
        $total = $payout - $toal ;

        $sql = "UPDATE pay SET amount = '$total' WHERE card_number = '$card'";
    if($conn->query($sql)){
      echo 'money updating successfully';
      
    }
    else{
      echo 'Error updating money';
    }
        
      }
        
      }else {
      echo "No money";
    }
}

?>