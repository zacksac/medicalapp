<?php
$conn = new mysqli('127.0.0.1', 'root', '', 'medical');

$method=$_POST['phrase'];




$conn = new mysqli('127.0.0.1', 'root', '', 'medical');
	 $sql = "SELECT * FROM purchasedproducts where name like '$method%' ";
$result = $conn->query($sql);
$res=array();
if ($result->num_rows > 0) {
	$name=array();
    // output data of each row
    while($row = $result->fetch_assoc()) {
     
      $res[]=$row;
     
    }
  }
  echo json_encode($res);


?>