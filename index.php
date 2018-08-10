<html>
<head>
	<link rel="stylesheet" href="css/bootsrap.css">
	<script src="js/jquery.js"></script>
</head>
<body>
<div class="container">

<?php
session_start();
$conn = new mysqli('127.0.0.1', 'root', '', 'medical');
if(isset($_POST['username']))
{
  
  $sql = "SELECT id, username, password FROM users";
$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
       $name=$row["username"];
      $pw=$row["password"];
      
    }
    if($name==$_POST['username'] && $pw==$_POST["password"])
    {
      $_SESSION["username"] = "admin";
         echo 'logged in ';
         header("Location: main.php");
    }
    else
    {
      echo 'sorry wrong username or password';
    }
}

}
?>
<h1>Medical store</h1>
  <form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>




</html>