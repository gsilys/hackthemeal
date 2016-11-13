<?php
include 'connect.php';
if (isset($_POST['submit1'])) {
	$review = $_POST['review'];
	$rating = $_POST['rating'];
	
		$sql1 = "INSERT INTO feedback_general (review, rating) VALUES ('$review', '$rating')";
		mysqli_query($conn, $sql1);
	
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>FirstHackatonEver</title>
	<meta http-equiv="Content-Language" content="en-us" />
	
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="MSSmartTagsPreventParsing" content="true" />
	
	<meta name="description" content="Description" />
	<meta name="keywords" content="Keywords" />
	
	<meta name="author" content="Enlighten Designs" />
	
	<script type="text/javascript" src="JavaScript.js"></script>
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

	
<div id="header">

		<div id="logo"><span style="color: black; font-size: 40px;"><b>FirstHackatonEver</b></span></div>
		<input type="text" class="login-input" placeholder="Login" />
		<input type="text" class="login-password" placeholder="Password" />
		<input type="button" class="login-button" value="Login" />
		<input type="button" class="signup-button" value="Sign-Up" />
	</div>


	<?php include 'sidebar_nav.php';?>
		
		<div id="content">
		<form action="" method="POST">
			<font color="black">Feedback for us is the important thing, which let us know if we are on the right track. Give us your opinnion about our food as well as services. We will be happy
			with every given feedback and this will give us strength to grow.<br><br>
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
	  
	  
	  <section class="products">

	</section>

		
	<?php include 'footer.php';?>

</div>


</body>
</html>