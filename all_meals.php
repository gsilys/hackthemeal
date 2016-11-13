<?php include 'connect.php';
session_start();
include_once 'connect.php';
	if(isset($_GET['logout']) == "yes"){
		unset($_SESSION['user']);
	}



	if((isset($_POST['submit'])) && (!isset($_SESSION['user']))){
		$card_id = $_POST['card_id'];
		$password = $_POST['password'];
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
<!--Show schedule-->
<?php
	if(isset($_GET['date'])){
		$got_date = $_GET['date'];
	}else{
		echo 'Wrong date';
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

	<!--<div id="main-nav">
		<dl class="hidden">
			<dt id="about"><a href="#">About</a></dt>
			<dt id="services"><a href="#">Services</a></dt>
			<dt id="portfolio"><a href="#">Portfolio</a></dt>
			<dt id="contact"><a href="#">Contact Us</a></dt>
		</dl>
	</div>-->
	
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



<?php include 'sidebar_nav.php';?>
	
	<div id="content">

 
  </div>
  
  
  <div style="padding-left: 300px; padding-top: 20px;">
  <table>
  <thead>
	<th>Photo</th>
	<th>Meal name</th>
	<th>Energy</th>
	<th>Fat</th>
	<th>Price</th>
	<th></th>
  </thead>
  <?php
	$sql_meal = "SELECT * FROM schedule where day='$got_date'";
	$result_meal = mysqli_query($conn, $sql_meal);
	
	while($row_meal = $result_meal->fetch_object()) {
		$id = $row_meal->id;
		echo '<tr>';
		echo '<td><img src="images/meal_img.jpeg" style="width:120px;">';
		echo '<td style="padding-left:20px;">';
		$result_one_meal = mysqli_query($conn, "SELECT * FROM dish WHERE id='$id'");
		$row_one_meal = mysqli_fetch_array($result_one_meal, MYSQLI_ASSOC);
		echo $row_one_meal['dispname'].'</td><td>';
		echo $row_one_meal['energy'].'</td><td>';
		echo $row_one_meal['fat'];
		echo '</td>';
		echo '<td>2.50 Eur</td>';
		echo '<td style="padding-left:20px;"><a href="meal.php?id='.$id.'">More info</a></td>';
		echo '</tr>';
	}
	
  ?>
  
  </table>
  </div>
  

  <!-- more products -->


	
	
	

	
<?php include 'footer.php';?>

</div>


</body>
</html>