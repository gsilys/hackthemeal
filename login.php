<?php include 'connect.php';
session_start();
include_once 'connect.php';
	if(isset($_GET['logout']) == "yes"){
		unset($_SESSION['user']);
	}


	
	if(isset($_POST['submit'])){
		echo $card_id = $_POST['card_id'];
		echo $password = $_POST['password'];
		 $res=mysqli_query($conn, "SELECT * FROM diner WHERE id='$card_id'");
		 $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
		 if(($row['password']==md5($password)))
		 {
		  $_SESSION['user'] = $row['card_id'];
		 
		  
			header("Location: index.php");
  
			 } else {
			?>
					<script>alert('Wrong information');</script>
<?php
			}
 
		}
	




?>
<html>
<body>
<form action="" method="POST">
	Card ID: <input type="text" name="card_id" value=""><br>
	Password: <input type="password" name="password" value=""><br>
	
	<input type="submit" name="submit" >
	
</form>

</body>

</html>