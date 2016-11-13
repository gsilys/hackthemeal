<?php include 'connect.php';

	if(isset($_POST['submit'])){
		echo $name = $_POST['name'];
		echo $card_id = $_POST['card_id'];
		echo $password = md5($_POST['password']);
		echo $age = $_POST['age'];
		echo $genre = $_POST['genre'];
		echo $activity = $_POST['activity'];
		echo $diet = $_POST['diet'];
		echo $max_calories = $_POST['max_calories'];
		echo '<script>alert("Registration successful")</script>';
		$sql = "INSERT INTO users (name, password, age, genre, activity, diet, max_calories)
		VALUES ('$name', '$password', '$age', '$genre', '$activity', '$diet', '$max_calories')";
		mysqli_query($conn, $sql);
	}





?>

<html>
<body>
<form action="" method="POST">
	Card ID: <input type="text" name="card_id" value=""><br>
	Name: <input type="text" name="name" value=""><br>
	Password: <input type="password" name="password" value=""><br>
	Age: <input type="text" name="age" value=""><br>
	Genre: <input type="text" name="genre" value=""><br>
	Activity: <input type="text" name="activity" value=""><br>
	Diet: <input type="text" name="diet" value=""><br>
	Maximum chalories (if needed): <input type="text" name="max_calories" value=""><br>
	<input type="submit" name="submit" >
	
</form>

</body>

</html>
