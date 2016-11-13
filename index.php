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
	
	<script type="text/javascript" src="css/JavaScript.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/shopping-cart.css">
	<style>
	p {
		display: inline;
	}
	</style>
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
				<span style="font-size:25"><b>Hello, '.$_SESSION['user'].'</b>
				<br>
				<a href="index.php?logout=true">logout</a></font>
			</div>';
			
		}
	?>
	<!--<h1><img src="images/general/logo_enlighten.gif" 
		width="236" height="36" alt="Enlighten Designs" border="0" /></h1>-->
</div>



	<?php include 'sidebar_nav.php';?>
	
	<div id="content">
	<br><font color="black"> <u><b>About</b></u> <font color="brown"><br><br>Smartmeal </font> is an innovative technology, which provides personalized nutrition information, 
		as well as advices on healthy diet and lifestyle.<br><br> <u><b>How does it work?</b></u><br><br><br>1. Order a Smartmeal card<br>2. Create an account<br>3. Check weekly menu<br>
		4. Take your meal from Smart buffer<br>5. Log in and check out your diet details
		

  </div>
  
  
  <section class="products">
  
  
  
  

  <!-- more products -->

</section>
	
	
	
	

	
	<?php include 'footer.php';?>

</div>


</body>
</html>