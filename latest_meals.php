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
	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
	}else{
		echo "Please log in";
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



	
	
		<?php include 'sidebar_nav.php'; ?>
	<div id="content">

	

 
  </div>
  
  
  <div style="padding-left: 300px; padding-top: 20px;">
  
  <b><center>Last meals:</center></b><br><Br>
  <table>
  <thead>
	<th>Meal name</th>
	<th>Weight</th>
	<th>Moment</th>
	<th>Energy</th>
	<th>Protein</th>
	<th>Fat</th>
	<th>Carbon</th>
	<!--<th>Isn't it too much?</th>-->
  
  
  </thead>
  
	
	<?php
		$sql_meal = "SELECT * FROM portion where dinerid='$user'";
		$result_meal = mysqli_query($conn, $sql_meal);
		while($row_meal = $result_meal->fetch_object()) {
			echo '<tr>';
			echo '<td>'.$row_meal->mealname.'</td>';
			echo '<td>'.$row_meal->weight.'</td>';
			echo '<td>'.$row_meal->moment.'</td>';
			echo '<td>'.$row_meal->energy.'</td>';
			echo '<td>'.$row_meal->protein.'</td>';
			echo '<td>'.$row_meal->fat.'</td>';
			echo '<td>'.$row_meal->carbon.'</td>';
			//echo '<td align="center"><img src="images/red.png" height="20"></td>';
			echo '</tr>';	
		}
		?>
	
  
 
  
</table>
  
  <br><br>
  <div style="padding-left:50px;">
  *Energy - the number of calories consumed. An average adult should receive approximately 2000 kcal per day.<br>

*Protein - a molecule, which consists of amino acids. Helps body cells to function properly. Best sources of protein are beef, poultry, fish, eggs, dairy products and nuts.<br>

*Fat - the main source of energy. Some vitamins (A, D, E) cannot be absorbed without fats. Unsaturated fats help to lower cholesterol levels. Nuts, plant oils and olives contain unsaturated fats. Saturated fats differ in chemical structure and are unhealthy for a human body. It is recommended to decrease the consumption of processed meats and junk food.<br>

*Carbohydrates - sugars that break down inside the body to create a glucose. Not essential to human body and should not be consumed much.<br>

*Fibers - found in vegetables, whole grains and fruits. Maintain the weight, lower risk of diabetes and heart disease.<Br>
  </div>
  </div>
  

  


	
	
	

	
<?php include 'footer.php';?>

</div>


</body>
</html>