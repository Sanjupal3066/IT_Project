<html>
<head>
	<title>Houses</title>
	<!--	Adding the Title Icon	-->
	<link rel = "icon" href = "Backgrounds/title_icon.png" type = "image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Adding the css files for icons which I used in Website	-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<?php
	
		// fetching the value and storing in variable which comes from `HousePrint.php`
		$q = $_GET['q'];
		
		//Including the `connect.php` file for running MYSQL Query
		include 'connect.php';
		$sql="";
		if($q == '*')				//If the fetched Variable is `*` that means we need to print the whole data of house
		{
			$sql = "SELECT * FROM Houses";
		}
		else						//It will print only the desired house type data
		{	
			$sql="SELECT * FROM Houses WHERE Type = '".$q."'";
		}

		session_start();					//Starting the session
		$userid = $_SESSION['variable_uid'];	//Storing value of session variable(variable_uid) which we stored in it while login

		$result = mysqli_query($mysqli,$sql);			//Executing the above SQL Query
		while($row = mysqli_fetch_array($result)) {					//Printing the fetched data
			echo "<div id='img_div'>";
			echo "<img src='images/".$row['Image']."'>";
			if($userid == 1)					//While Creating Database we use (initialize.php) and here we explicitly create `Admin` whose id is 1
				echo "<p><b><label>&nbsp;Name: </b></label><label>".$row['Name']."</label><a href='deleteAlert.php?q=".$row['Name']."&p=".$row['Type']."&r=".$row['Location']."&s=".$row['Image']."' style='float: right; margin-right:20px; margin-top:5px; font-size: 25px;'><i class='fa fa-trash'></i></a></p>";
			else								//If id is not 1 means he is not admin(I won't provide delete button to the simple User)
				echo "<p><b><label>&nbsp;Name: </b></label><label>".$row['Name']."</label></p>";
			echo "<p><b><label>&nbsp;Type: </b></label><label>".$row['Type']."</label></p>";
			echo "<p><b><label>&nbsp;Area: </b></label><label>".$row['Area']." in Sq. ft</label></p>";
			echo "<p><b><label>&nbsp;Location: </b></label><label>".$row['Location']."</label></p>";
			echo "<p><b><label>&nbsp;Car Parking: </b></label><label>".$row['CarParking']."</label></p>";
			echo "<p><b><label>&nbsp;Preferred Tenant: </b></label><label>".$row['Tenants']."</label></p>";
			echo "<p><b><label>&nbsp;Price(in Rs): </b></label><label>".$row['Price']."</label></p>";
			echo "<p><b><label>&nbsp;Contact: </b></label><label>".$row['Contact']."</label></p>";
			echo "<p><b><label>&nbsp;Published Date: </b></label><label>".$row['Publish']."</label><a href='schedule.php' style='float: right; margin-right:20px; margin-top:-5px; font-size: 25px;'>Schedule a Visit</a></p>";
			echo "</div>";
		}
		//if num of rows is 0 means we can't find any data that's why we printing `No Result Found` in the middle of page
		if(mysqli_num_rows($result) == 0)
			echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><center><h1>No Result Found</h1></center>";
		mysqli_close($mysqli);				//Closing the mysql connection for avoiding Resource leak
	?>
</body>
</html>