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
  
  <b><center>Mostly eaten food:</center></b><br><Br>
  <table>
  <thead>
	<th>Meal name</th>
	<th>Weight sum</th>
	
	<!--<th>Isn't it too much?</th>-->
  
  
  </thead>
  
	
	<?php
		/*$start_date = new dateTime;
		for ($i=0; $i < 30; $i++;){
			$sql_weight = "SELECT * FROM portion";
			$result_weight = mysqli_query($conn, $sql_weight);*/
			
		
		$sql_meal = "SELECT * FROM portion";
		$result_meal = mysqli_query($conn, $sql_meal);
		while($row_meal = $result_meal->fetch_object()) {
			$dishid = $row_meal->dishid;
			$sql_meal1 = "SELECT * FROM portion WHERE dishid='$dishid'";
			$result_meal1 = mysqli_query($conn, $sql_meal1);
			$sum = 0;
			while($row_meal1 = $result_meal1->fetch_object()) {
					$sum = $sum + $row_meal1->weight;
			}
			echo '<tr>';
			echo '<td>'.$row_meal->mealname.'</td>';
			echo '<td>'.$sum.'</td>';
			echo '</tr>';	
		}
		?>
	
  
 
  
</table>
  
  <br><br>
   <b><center>General feedback:</center></b><br><Br>
   <table>
  <thead>
	<th>Feedback</th>
	<th>Rating</th>

  </thead>
  
	
	<?php
	
		
		$sql_feed_gen = "SELECT * FROM feedback_general";
		$result_feed_gen = mysqli_query($conn, $sql_feed_gen);
		$average_feed_gen = 0;
		$k = 0;
			while($row_feed_gen = $result_feed_gen->fetch_object()) {
					$average_feed_gen= $average_feed_gen + $row_feed_gen->rating;
					$k++;
			
			echo '<tr>';
			echo '<td>'.$row_feed_gen->review.'</td>';
			echo '<td>'.$row_feed_gen->rating.'</td>';
			echo '</tr>';
			}	
			$average_feed_gen = $average_feed_gen / $k;
			echo '<tr><td collspan="2">Average rating:'.$average_feed_gen.'';
			echo '</td></tr>';	
			
		?>
	
  
 
  
</table>
 
 
 </table>
  
  <br><br>
   <b><center>Meal feedback:</center></b><br><Br>
   <table>
  <thead>
	<th>Meal name</th>
	<th>Feedback</th>
	<th>Rating</th>

  </thead>
  
	
	<?php
	$sql_meal2 = "SELECT * FROM dish";
		$result_meal2 = mysqli_query($conn, $sql_meal2);
		
		
		
		while($row_meal2 = $result_meal2->fetch_object()) {
			$temp_meal_id = $row_meal2->id;
			$sql_feed_gen1 = "SELECT * FROM feedback_meal WHERE meal_id='$temp_meal_id'";
			$result_feed_gen1 = mysqli_query($conn, $sql_feed_gen1);
			$average_feed_gen1 = 0;
			$k1 = 0;
			while($row_feed_gen1 = $result_feed_gen1->fetch_object()) {
					$average_feed_gen1= $average_feed_gen1 + $row_feed_gen1->rating;
					$k1++;
			}
			echo '<tr>';
			echo '<td>'.$row_meal2->dispname.'</td>';
			echo '<td><a href="sel_meal_feed.php?id='.$temp_meal_id.'">Click to see feedback</a></td>';
			echo '<td>'.$average_feed_gen1 = $average_feed_gen1 / $k1.'</td>';
			echo '</tr>';
				
		}
			
			echo '<tr><td collspan="2">Average rating:'.$average_feed_gen.'';
			echo '</td></tr>';	
			
		?>
	
  
 
  
</table>
 
 
 
  </div>
  

  


	
	
	

	
	<?php include 'footer.php';?>

</div>


</body>
</html>