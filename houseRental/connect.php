<?php
	
	//NOTE: IF YOU WANT TO CHANGE SOMETHING THEN CHANGE HERE AND ALSO GO AND CHANGE IN `initialize.php` FILE
	
	//Giving Details of MySQL to connect
	$mysql_host = "localhost";						//host_id	
	$mysql_username = "root";						//MySQL UserName
	$mysql_password = "";							//MySQL Password(In my case i don't give any password to MYSQL that's why it's Blank)
	$mysql_database = "houseRentalDB";				//DataBase Name
		
	//Establishing a connection with MySQL
	$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

	//If found some error while connecting then this block will execute
	if ($mysqli->connect_error) 
	{
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}	
?>