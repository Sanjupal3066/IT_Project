<html>
<head>
	<title>Schedule a Visit</title>
	
	<!--	Adding icon on title	-->
	<link rel = "icon" href = "Backgrounds/title_icon.png" type = "image/x-icon"> 
	
	<!-- Including our own created `schedule.js` script file for validating the Form Data before submitting		-->
	<script src="scripts/schedule.js"></script>
	
	<!-- Adding the css files for icons and sweetalert which I used in Website	-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
	
	<!-- Adding the script files for sweetalert which I used in Website	-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	
	<!-- Adding the `print.css` file	-->
	<link rel="stylesheet" href="css/print.css" type="text/css"/>
</head>
<body>
	<!--	Creating the Header for displaying the Company Name and it's logo	-->
	<div id="divTop">
		<h3><i class="fa fa-home">&nbsp;Rental Management</i></h3>
	</div>
	<h1>Schedule a Visit</h1><br/>
	<!-- Creating Form which help us to call `Alert.php` and sending the form data to `Alert.php` using POST Method-->
	<center><form name='myForm' method="POST" action='Alert.php' onsubmit='return validateForm()'>
		<!--	Creating the box using div for storing all the form element in the single box		-->
		<div id="div_schedule">
			<label>Name: </label><input type="Text" name="name" placeholder="Enter Your Name"><br/><br/>
			<label>Date: </label><input type="date" name="date"><br/><br/>
			<label>Mobile Number: </label><input type="Number" name="phone" placeholder="Enter Your Mobile Number"><br/><br/>
			<input type='submit'>&nbsp;&nbsp;&nbsp;&nbsp;<input type='button' value='Cancel' onclick='location.href=`Home.php`;'>
				
		</div>
	</form></center>
</body>
</html>