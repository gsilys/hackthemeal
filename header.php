<div id="header">

		<div id="logo"><span style="color: black; font-size: 40px;"><b>FirstHackatonEver</b></span></div>
		<?php if (!isset($_SESSION['user'])){ ?>
			<form action="" method="POST">
			<input type="text" class="login-input" placeholder="Login" />
			<input type="text" class="login-password" placeholder="Password" />
			<input type="button" class="login-button" value="Login" />
			<!--<input type="button" class="signup-button" value="Sign-Up" />-->
			</form>
	</div>
	<?php }else{
			echo '<div style="position: relative; padding-left: 1000px;">
				Hello, '.$_SESSION['user'].'
				<br>
				<a href="index.php?logout=true">logout</a>
			</div>';
			
		}
	?>