<?php
	
	
	//	We Can't use `connect.php` here because here if the database is not created it also create the Database whose name is `houseRentalDB`
	//Giving Details of MySQL to connect
	$mysql_host = "localhost";									//host_id
	$mysql_username = "root";									//MySQL UserName
	$mysql_password = "";										//MySQL Password(In my case i don't give any password to MYSQL that's why it's Blank)
	$mysql_database = "houseRentalDB";							//DataBase Name
	
	//Establishing a connection with MySQL
	$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password);
	
	//If found some error while connecting then this block will execute
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
	
	$sql = "CREATE DATABASE IF NOT EXISTS houseRentalDB";								//Creating the Query for Creating the Database if not exist
	if($mysqli->query($sql) == TRUE)
	{
		//Getting the connection with DataBase Name
		$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
		//If found some error while connecting then this block will execute
		if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
		}
		
		//Writing the Query for Creating the Table for storing the User Info
		$table = 
		"CREATE TABLE IF NOT EXISTS USERS (id int(11) AUTO_INCREMENT,
														Name varchar(100) NOT NULL,
														Email varchar(100) NOT NULL,
														Phone varchar(10) NOT NULL,
														Password varchar(100) NOT NULL,
														KEY (id),
														PRIMARY KEY (Email))";
						 
		$mysqli->query($table);						//Executing the Query for Creating the Table
		
		
		//Writing the Query for Creating the Table for storing the House Info
		$table2 = 
		"CREATE TABLE IF NOT EXISTS HOUSES (id int(11) AUTO_INCREMENT,
														Name varchar(100) NOT NULL,
														Type varchar(100) NOT NULL,
														Area int(50) NOT NULL,
														Location varchar(100) NOT NULL,
														CarParking varchar (100) NOT NULL,
														Tenants varchar(100) NOT NULL,
														Price int(100) NOT NULL,
														Contact varchar (100) NOT NULL,
														Image varchar(100) NOT NULL,
														Publish Date NOT NULL,
														PRIMARY KEY (id))";
		
		$mysqli->query($table2);				//Executing the Query
	}
	else								//If we Can't able to create DB then this block will execute
	{
		$showerror = "Error Creating DB";
	}
	
	//Writing the Query for Checking is `admin` user already there in the DataBase or not
	$query = "SELECT * from USERS WHERE email='admin@gmail.com'";
	$result = mysqli_query($mysqli, $query);			//Executing the Above Query
	$num = mysqli_num_rows($result);					//If we found any tuple means the admin is already present in the DATABASE
	$psw = md5("12345678");								//Creating the Md5 encrypted Password
	if($num == 0)										//if $num == 0 means the admin user is not present in the database so we create it implicitly
	{
		//Writing the query for inserting the Admin info to the DataBase
		$statement = "INSERT INTO USERS (Name, Email, Phone, Password) 
						VALUES('Admin', 'admin@gmail.com', '9872971934', '$psw')";
		
		$mysqli->query($statement);				//Executing the Above Query
	}
?>