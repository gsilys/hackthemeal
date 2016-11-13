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


<!--Add schedule-->
<?php
if (isset($_POST['submit1'])) {
	
	$day = $_POST['date'];
	foreach ($_POST['meals'] as $value){
		$sql = "INSERT INTO schedule (day, meal_id) VALUES ('$day', '$value')";
		mysqli_query($conn, $sql);
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
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/shopping-cart.css">
	
	<link rel="stylesheet" href="css/chosen.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
	<!--datepicker-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: "dd-mm-yy" });
	
  } );
  </script>
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


<?php include 'sidebar_nav.php';?>
	
	
	<div id="content">
	
	
	

 
  </div>
  
  
  <div style="padding-left: 350px; padding-top: 20px;">
   <form action="" method="POST">
   Insert meals:
	Day: <input type="text" id="datepicker" name="date"><br><br>
						
	Choose meals:	<Br>						
		<select data-placeholder="Insert meals..." class="chosen-select" multiple style="width:445px;" tabindex="4" name="meals[]">
						
			<?php	
				
					
					$sql = "SELECT * FROM dish";
					$result = mysqli_query($conn, $sql);
					while($row = $result->fetch_object()) {
						echo '<option value="'.$row->id.'">'.$row->dispname.'</option>';
					}
				
			?>
			</select>
			
			
			
							<script type="text/javascript">
					var config = {
					  '.chosen-select'           : {},
					  '.chosen-select-deselect'  : {allow_single_deselect:true},
					  '.chosen-select-no-single' : {disable_search_threshold:10},
					  '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
					  '.chosen-select-width'     : {width:"95%"}
					}
					for (var selector in config) {
					  $(selector).chosen(config[selector]);
					}
				  </script>
	<br><br>				
  
  
  <input type="submit" name="submit1" value="Submit"><Br>
  </form>
 
  

  <!-- more products -->


	
	
	

	</div>
	<?php include 'footer.php';?>



</div>
</body>

  <script src="css/chosen.jquery.js" type="text/javascript"></script>
  <script src="css/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
			<script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
  
  
  
</html>