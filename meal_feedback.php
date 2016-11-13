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

	
	if (isset($_POST['submit1'])) {
	$review = $_POST['review'];
	$rating = $_POST['rating'];
	
		$sql1 = "INSERT INTO feedback_meal (meal_id, review, rating) VALUES ('$meal_id', '$review', '$rating')";
		mysqli_query($conn, $sql1);
	
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
		<form action="" method="POST">
			<font color="black">Please give some feedback of selected meal...<br><br>
			<?php $result_meal = mysqli_query($conn, "SELECT * FROM dish WHERE id='$meal_id'");
			$row_meal = mysqli_fetch_array($result_meal, MYSQLI_ASSOC);
			
			echo 'Selected meal: <b>'.$row_meal['dispname'].'</b><br><br>';?> 
			<b>Feedback:</b><br>
			<textarea maxlength="200" name="review" rows="5" cols="50">
			</textarea><br>
			Note: only 200 characters allowed. So be clear and strict.
			<br><br>
			
			
				<b>Rate us</b>
				
				  <fieldset>
					<span class="star-cb-group">
					  <input type="radio" id="rating-5" name="rating" value="5" checked="checked" /><label for="rating-5">5</label>
					  <input type="radio" id="rating-4" name="rating" value="4" /><label for="rating-4">4</label>
					  <input type="radio" id="rating-3" name="rating" value="3" /><label for="rating-3">3</label>
					  <input type="radio" id="rating-2" name="rating" value="2" /><label for="rating-2">2</label>
					  <input type="radio" id="rating-1" name="rating" value="1" /><label for="rating-1">1</label>
					  <input type="radio" id="rating-0" name="rating" value="0" class="star-cb-clear" /><label for="rating-0">0</label>
					</span>
				  </fieldset>
				
				
				
			<input type="submit" name="submit1" value="submit">
			</font>
			</form>
	

 
  </div>
  
  
  <div style="padding-left: 300px; padding-top: 20px;">
  
 
 
  
  
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