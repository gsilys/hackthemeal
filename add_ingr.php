<?php
include 'connect.php';
if (isset($_POST['submit'])) {
	
	$meal_id = $_POST['meal_id'];
	$ingredient = $_POST['ingredient'];
	
		$sql = "INSERT INTO ingredients (meal_id, ingredient) VALUES ('$meal_id', '$ingredient')";
		mysqli_query($conn, $sql);
	
}

?>

<html>


<body>
<form action="" method="POST">
Meal id: <input type="text" name="meal_id"><br>
Ingredient: <input type="text" name="ingredient"><br>
<input type="submit" name="submit">
</form>
</body>
</html>