<?php include 'connect.php';
session_start();
include_once 'connect.php';
	if(isset($_GET['logout']) == "yes"){
		unset($_SESSION['user']);
	}



	if((isset($_POST['submit'])) && (!isset($_SESSION['user']))){
		echo $card_id = $_POST['card_id'];
		echo $password = $_POST['password'];
		 $res=mysqli_query($conn, "SELECT * FROM diner WHERE id='$card_id'");
		 $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
		 if(($row['password']==md5($password)))
		 {
		  $_SESSION['user'] = $row['id'];
		 
		  
			header("Location: index.php");
  
			 } else {
			?>
					<script>alert('Wrong information');</script>
<?php
			}
 
		}

?>

<!--Get user ID-->
<?php
	if(isset($_GET['id'])){
		$meal_id = $_GET['id'];
	}


?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>FirstHackathonEver</title>
	<meta http-equiv="Content-Language" content="en-us" />
	
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="MSSmartTagsPreventParsing" content="true" />
	
	<meta name="description" content="Description" />
	<meta name="keywords" content="Keywords" />
	
	<meta name="author" content="Enlighten Designs" />
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/shopping-cart.css">
</head>
<body>
<div id="page-container">

	
	
	<div id="header">

	<div id="logo"><span style="color: black; font-size: 40px;"><b>FirstHackathonEver</b></span></div>
	<?php if (!isset($_SESSION['user'])){ ?>
	<div style="position: absolute; padding-left: 1000px; padding-top: 20px;">
		<form action="" method="POST">
			Card ID: <input type="text" name="card_id" value=""><br>
			Password: <input type="password" name="password" value=""><br>
			
			<input type="submit" name="submit" >
	
		</form>
	
	</div>
	<?php }else{
			echo '<div style="position: absolute; padding-left: 1000px;">
				Hello, '.$_SESSION['user'].'
				<br>
				<a href="index.php?logout=true">logout</a>
			</div>';
			
		}
	?>
	<!--<h1><img src="images/general/logo_enlighten.gif" 
		width="236" height="36" alt="Enlighten Designs" border="0" /></h1>-->
</div>



<?php include 'sidebar_nav.php'; ?>
	
	<div id="content">

	

 
  </div>
  
  
  <div style="padding-left: 300px; padding-top: 20px;">
  
 
  
  <br><br>
   <b><center>Meal feedback:</center></b><br><Br>
   <center>This table shows all meals feedback</center><Br><Br>
   <table>
  <thead>
	<th>Meal name</th>
	<th>Feedback</th>
	<th>Rating</th>

  </thead>
  
	
	<?php
	
			$sql_feed = "SELECT * FROM feedback_meal WHERE meal_id='$meal_id'";
			$result_feed = mysqli_query($conn, $sql_feed);
			
			while($row_feed = $result_feed->fetch_object()) {
				$temp_meal_id = $row_feed->meal_id;
				$result_meal = mysqli_query($conn, "SELECT * FROM dish WHERE id='$temp_meal_id'");
				$row_meal = mysqli_fetch_array($result_meal, MYSQLI_ASSOC);
	
			
			echo '<tr>';
			echo '<td>'.$row_meal['dispname'].'</td>';
			echo '<td>'.$row_feed->review.'</td>';
			echo '<td>'.$row_feed->rating.'</td>';
			echo '</tr>';
			}
				
	
			
			
			
		?>
	
  
 
  
</table>
 
 
 
  </div>
  

  


	
	
	

	
	<?php include 'footer.php';?>

</div>


</body>
</html>