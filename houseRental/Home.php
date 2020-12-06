<html>
<head>
	<title>Home Page</title>
	
	<!--	Adding the Title Icon	-->
	<link rel = "icon" href = "Backgrounds/title_icon.png" type = "image/x-icon"> 
	
	<!-- Adding the css files for icons which I used in Website	-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<!-- Adding the `print.css` file	-->
	<link rel="stylesheet" href="css/print.css">
</head>
<body>
	<!--	Creating the Header for displaying the Company Name and it's logo	-->
	<div id="divTop">
		<h3><i class="fa fa-home">&nbsp;Rental Management</i></h3>
	</div>
	<!--	Including the `HousePrint.php` file	-->
	<?php include 'HousePrint.php'; ?>
	
	<!--	this div is used for placing this links on the top right corner		-->
	<div class="topright">
		<label>
			<?php
			//Starting the session
			session_start();
			//And printing the value of session variable(variable_name) which we stored in it while login
			echo "Welcome, ".$_SESSION['variable_name']."&nbsp;";
			echo "<i class='glyphicon glyphicon-user'></i>";					//For Displaying the Icon
			?>
		</label><br/>
		<a href="insertData.php">Upload House</a><br/>
		<a href="login.php">LogOut</a><br/>
	</div>
</body>
</html>