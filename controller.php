<?php
$conn = new mysqli('127.0.0.1', 'root', '', 'medical');

$method=$_POST['method'];

$method();

function addproduct(){
	$data=$_POST['pdata'];
	
	foreach ($data as $value) {
		if($value['name']=='productname')
		{
			$productname=$value['value'];
		}
		else if($value['name']=='batch number')
		{
			$batch=$value['value'];
		}
		else if($value['name']=='datem')
		{
			$datem=$value['value'];
		}
		else if($value['name']=='datee')
		{
			$datee=$value['value'];
		}
		else if($value['name']=='rate')
		{
			$rate=$value['value'];
		}
		else if($value['name']=='quantity')
		{
			$quantity=$value['value'];
		}
	}
$conn = new mysqli('127.0.0.1', 'root', '', 'medical');
    $sql = "insert into purchasedproducts (name,batch,quantity,datem,datee,rate) values('$productname','$batch',$quantity,'$datem','$datee',$rate)";
$result = $conn->query($sql);


}


function getproducts(){
	$conn = new mysqli('127.0.0.1', 'root', '', 'medical');
	 $sql = "SELECT * FROM purchasedproducts";
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
  

}

function getproductbyname(){
	$name=$_POST['name'];
	$conn = new mysqli('127.0.0.1', 'root', '', 'medical');
 $sql = "SELECT * FROM purchasedproducts where name ='$name' limit 1";
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
}



function delp(){
	$id=$_POST['id'];
$conn = new mysqli('127.0.0.1', 'root', '', 'medical');
	 $sql = "delete  FROM purchasedproducts where id=$id";
$result = $conn->query($sql);

}

function editproduct(){
	$data=$_POST['pdata'];
	$id=$_POST['id'];
	
	foreach ($data as $value) {
		if($value['name']=='productname')
		{
			$productname=$value['value'];
		}
		else if($value['name']=='batch number')
		{
			$batch=$value['value'];
		}
		else if($value['name']=='datem')
		{
			$datem=$value['value'];
		}
		else if($value['name']=='datee')
		{
			$datee=$value['value'];
		}
		else if($value['name']=='rate')
		{
			$rate=$value['value'];
		}
		else if($value['name']=='quantity')
		{
			$quantity=$value['value'];
		}
	}
$conn = new mysqli('127.0.0.1', 'root', '', 'medical');
    echo $sql = "update purchasedproducts set name='$productname',quantity=$quantity,batch='$batch',datem='$datem',datee='$datee',rate=$rate where id=$id";
$result = $conn->query($sql);

}


function sortexpiry(){
$conn = new mysqli('127.0.0.1', 'root', '', 'medical');
	 $sql = "SELECT * FROM `purchasedproducts` WHERE datee < CURDATE() ";
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

}

function sortexpiryshort(){
$conn = new mysqli('127.0.0.1', 'root', '', 'medical');
	 $sql = "SELECT * FROM `purchasedproducts` where datee  between curdate() and  DATE_ADD(CURDATE(), INTERVAL 60 DAY) ";
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

}


function sellsingle(){
$conn = new mysqli('127.0.0.1', 'root', '', 'medical');

$batch=$_POST['batch'];

$exdate=$_POST['exdate'];	

$mfdate=$_POST['mfdate'];	

$name=$_POST['name'];	

$price=$_POST['price'];	

$qty=$_POST['qty'];

$sql="select * from purchasedproducts where name='$name' limit 1";
$result = $conn->query($sql);
$res=array();
if ($result->num_rows > 0) {
	$name=array();
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
      $row_id=$row['id'];
      $row_qty=$row['quantity'];

    echo  $new_qty=$row_qty-$qty;
     $sql="update purchasedproducts set quantity=$new_qty where id=$row_id";
     $res=$conn->query($sql);

      $sql1="insert into soldproduct (purchasedid,quantity) values ($row_id,$qty)";
     $res1=$conn->query($sql1);
     
    }
  }

}



?>
