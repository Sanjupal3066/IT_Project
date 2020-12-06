<?php
	
	//Storing the values in php variable which coming from `deleteAlert.php`
	$name = $_GET['q'];
	$type = $_GET['p'];
	$loc = $_GET['r'];
	$imgPath = $_GET['s'];
	
	$imgdelete = 'images/'.$imgPath;			//Concating the image name with the folder name
	
	//Including the `connect.php` file for running MYSQL Query
	include 'connect.php';
	$sql="delete from houses where name = '".$name."' and type='".$type."' and image='".$imgPath."'";			//Writing the SQL Query
	$result = mysqli_query($mysqli,$sql);										//Executing the Above Query
	if($result)
	{
		unlink($imgdelete);									//Deleting the image from directory
		header("Location: Home.php");						//Redirecting to `Home.php`
	}
?>