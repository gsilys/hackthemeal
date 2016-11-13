<div id="sidebar-a">
		<li class="sidebar-brand">
					<script> var result = getWeekNumber(new Date());
					document.write('<font color="white">week ' + result[1]); </script>
					</li>
				<ul class="sidebar-nav">
					<li>
						<?php $start_date = new dateTime;
						//echo '<a href="all_meals.php?date='.$start_date->format('d-m-Y').'">'.$start_date->format('y-m-d').'</a>';
						for ($i=0; $i < 7; $i++){
							echo '<a href="all_meals.php?date='.$start_date->format('d-m-Y').'">'.$start_date->format('D d-m-Y').'</a>';
							$start_date->modify('+1 days');
						}
						
						?>
					</li>
					
				</ul>

	</div>
	
		<ul class="nav">
	  <li class="nav"><a class="active" href="index.php">Home</a></li>
	 <!-- <li class="nav"><a href="#Meniu">Meniu</a></li>-->
	  <li class="nav" ><a href="latest_meals.php">Latest meals</a></li>
	  <li class="nav" ><a href="meals_summary.php">Meals summary</a></li>
	  <li class="nav" ><a href="make_schedule.php">Make new menu</a></li>
	  <li class="nav" ><a href="feedback.php">Feedback</a></li>
	</ul>
	
	
	
	
	