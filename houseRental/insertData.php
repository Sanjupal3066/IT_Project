<?php
	//Created this variable for showing `Error` or `Success`
	$showalert = false;
	$showerror = false;
	session_start();		//Starting the session
	$userid = $_SESSION['variable_uid'];		//Storing value of session variable(variable_uid) which we stored in it while login
	//Checking is `REQUEST_METHOD` POST or not
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//Including the `connect.php` and `initialize.php`
		include 'initialize.php';
		include 'connect.php';
		
		
		//Storing the values in variables which coming using POST method
		$name = $_POST["name"]; 
		$type = $_POST["type"];
		$area = $_POST["area"];
		$loc = $_POST["loc"];
		$car = $_POST["car"];
		$tenant = $_POST["tenants"];
		$price =$_POST["price"];
		$contact=$_POST["contact"];
		
		$image =  $_FILES["image"]["name"];
		$tempname = $_FILES["image"]["tmp_name"];
		
		/*Creating the newImageName which will help to maintain the Database properly
			explanation:
				first it will add timestamp() then later concat with any four random integer number and then concat with it's user name and at last fullName with Extension
		*/
		$newImageName = time()."_".rand(1000, 9999)."_".$name."_".basename($image);

		//Creating the Variable which will store the address where the file is storing with it's new name
		$target = "images/".$newImageName;

		//Fetching the File Extension for checking later photo it is in required extension or not
		$fileType1 = strtoupper(pathinfo($target,PATHINFO_EXTENSION));
		
		//storing the date which will help us to determine when this house details will be publish
		$datee = date('Y-m-d',time());

		//Checking User selected the photo or not
		if(!empty($_FILES["image"]["name"])){
			// Allow certain file formats
			$allowTypes1 = array('JPG','JPEG','PNG','TIF');
			if(in_array($fileType1, $allowTypes1)){
				// Upload file to Desired Location
				if(move_uploaded_file($tempname, $target)){
					// Insert image file name into database
					$statement = "INSERT INTO Houses (Name, Type, Area, Location, CarParking, Tenants, Price, Contact, Image, Publish) 
						VALUES('$name', '$type', '$area', '$loc', '$car', '$tenant', '$price', '$contact','$newImageName','$datee')"; 
					$insert = $mysqli->query($statement);								//Executing the Query
					if($insert){									//If Above Query Executed Successfully then it will alert with success
						$showalert = "The House ".$name. " has been uploaded successfully.";
					}else{
						$showerror = "House upload failed, please try again.";			//Otherwise Show Error
					} 
				}else{
					$showerror = "Sorry, there was an error uploading your House.";				//if can't able to move your file then this error will generate
					
				}
			}else{																				//If user select wrong extension photo
				$showerror = 'Sorry, only Image(JPG,JPEG,PNG,& TIF) files are allowed to upload.';
				
			}
		}else{													//If user won't select any photo
			$showerror = 'Please select a file to upload.';
		}
		
		$mysqli->close();						//Closing the Connection to avoid resource leak
	}
?>

<html>
	<head>
		<title>Upload House Details</title>
		<!--	Adding the Title Icon	-->
		<link rel = "icon" href = "Backgrounds/title_icon.png" type = "image/x-icon"> 
		<!--	Adding the script file(insertData.js) for validation before submitting the form		-->
		<script src="scripts/insertData.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Adding the css files for icons which I used in Website	-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- Adding the `insertData.css` file	-->
		<link rel="stylesheet" href="css/insertData.css">
	</head>
	<body>
		<!--	Creating the Header for displaying the Company Name and it's logo	-->
		<div id="divTop">
			<h3><i class="fa fa-home">&nbsp;Rental Management</i></h3>
		</div>
		<!--	Including the `notify.php` file for the the showing error or success messages	-->
		<?php include 'notify.php' ?>
		<h1>Upload House Details</h1><br/>
		<!-- Creating Form which help us to send the form data to the `insertData.php` file using POST Method-->
		<form name="myForm" method="POST" action="insertData.php" enctype="multipart/form-data" onsubmit="return validateForm()">
			<!--	Creating the box using div for storing all the form element in the single box		-->
			<div id="insert_div">
			<label>House Name: </label><input type="text" name="name" placeholder="House Name"><br><br>
			<label>House Type: </label><select name="type" id="selectTag">
					<option value='Apartments'>Apartments</option>
					<option value='BuilderFloors'>Builder Floors</option>
					<option value='Villa'>Villa</option>
				</select><br><br>
			<label>Area(in sq): </label><input type="number" name="area" placeholder="Area (in Sq ft)"><br><br>
			<label>Location: </label><input type="text" name="loc" placeholder="Location"><br><br>
			
			<label>Car Parking: </label><select name="car" id="selectTag">
					<option value='Yes'>Yes</option>
					<option value='No'>No</option>
				</select><br><br>
			<label>Tenants Preferred: </label><select name="tenants" id="selectTag">
					<option value='Bachelors'>Bachelors</option>
					<option value='Girls'>Girls</option>
					<option value='Boys'>Boys</option>
					<option value='Married'>Married</option>
				</select><br><br>
			<label>Price: </label><input type="number" name="price" placeholder="Price"><br><br>	
			<label>Contact Info: </label><input type="number" name="contact" placeholder="Contact"><br><br>
			<label>House Image: <input type="file" name="image" id="imageUpload"></input></label><br/></br>
			<input type="submit">&nbsp;&nbsp;
			<input type="reset">
			<br/><br/>
			<a href='Home.php'>Return to HomePage</a><br/>
			</div>
		</form>
	</body>
</html>