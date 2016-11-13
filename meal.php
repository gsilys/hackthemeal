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

<!--Get meal ID-->
<?php
	if(isset($_GET['id'])){
		$meal_id = $_GET['id'];
	}else{
		echo "Couldn't get the meal";
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
  <tr>
	<?php
		$result_ingr = mysqli_query($conn, "SELECT * FROM dish WHERE id='$meal_id'");
		$row_ingr = mysqli_fetch_array($result_ingr, MYSQLI_ASSOC);
		?>
    <th colspan="2">Meal: <?php echo $row_ingr['dispname'];?></th>
  </tr>
  <tr>
    <td>Ingredients:</td>
    <td>Nutritive values for 100g:</td>
  </tr>
  <tr>
   <td>
	   <?php
			$sql_ingr = "SELECT * FROM ingredients where meal_id='$meal_id'";
			$result_ingr = mysqli_query($conn, $sql_ingr);
			while($row_ingr = $result_ingr->fetch_object()) {
				echo $row_ingr->ingredient.'<br>';
				
				
				
			}
		  ?>
	  </td>
    <td>
		<?php
		$sql_meal = "SELECT * FROM dish where id='$meal_id'";
		$result_meal = mysqli_query($conn, $sql_meal);
		while($row_meal = $result_meal->fetch_object()) {
			echo 'Energy: '.$row_meal->energy.'<br>';
			echo 'Protein: '.$row_meal->protein.'<br>';
			echo 'Fat: '.$row_meal->fat.'<br>';
			echo 'Carbon: '.$row_meal->carbon.'<br>';
			echo 'Lactose-free: '.$row_meal->L.'<br>';
			echo 'Gluten-free: '.$row_meal->G.'<br>';
			echo 'Milk-free: '.$row_meal->M.'<br>';
			echo 'Low-lactose: '.$row_meal->VL.'<br>';
			echo 'Status: '.$row_meal->status.'<br>';
			echo 'Alergy: '.$row_meal->allergy.'<br>';
			echo 'Origin: '.$row_meal->origin.'<br>';
			
			
		}
	  ?>
  </td>
 
  </tr>
  <tr><td colspan="2"><a href="meal_feedback.php?id=<?php echo $meal_id;?>">Write feedback...</a></td></tr>
</table>
  <Br>
  
  <br><br>
  
  *Energy - the number of calories consumed. An average adult should receive approximately 2000 kcal per day.<br>

*Protein - a molecule, which consists of amino acids. Helps body cells to function properly. Best sources of protein are beef, poultry, fish, eggs, dairy products and nuts.<br>

*Fat - the main source of energy. Some vitamins (A, D, E) cannot be absorbed without fats. Unsaturated fats help to lower cholesterol levels. Nuts, plant oils and olives contain unsaturated fats. Saturated fats differ in chemical structure and are unhealthy for a human body. It is recommended to decrease the consumption of processed meats and junk food.<br>

*Carbohydrates - sugars that break down inside the body to create a glucose. Not essential to human body and should not be consumed much.<br>

*Fibers - found in vegetables, whole grains and fruits. Maintain the weight, lower risk of diabetes and heart disease.<Br>
  
  </div>
  

  <!-- more products -->


	
	
	

	
	<div id="footer">
	<div id="altnav">
		<a href="#">About</a> - 
		<a href="#">Services</a> - 
		<a href="#">Portfolio</a> - 
		<a href="#">Contact Us</a> - 
		<a href="#">Terms of Trade</a>
	</div>
	<div id="copyright">
Copyright © Enlighten Designs<br />
Powered by <a href="http://www.enlightenhosting.com/">Enlighten Hosting</a> and
<a href="http://www.vadmin.co.nz/">Vadmin 3.0 CMS</a>
</div>
</div>

</div>


</body>
</html>