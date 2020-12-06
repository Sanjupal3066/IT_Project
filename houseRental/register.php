<?php
	//Created this variable for showing `Error` or `Success`
	$showalert = false;
	$showerror = false;
	
	//Checking is `REQUEST_METHOD` POST or not
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		//Including the `connect.php` and `initialize.php` file for running MYSQL Query
		include 'initialize.php';
		include 'connect.php';
		
		
		//Storing the values in variables which coming using POST method
		$u_name = $_POST["name"]; 
		$u_pass = $_POST["pass"];
		$u_phone = $_POST["phone"];
		$u_mail = $_POST["email"];
		
		//Encrypting the password(We encrypt it because while storing the password to DataBase no one can read your password)
		$psw = md5($u_pass);
		
		//Writing the Query for checking is Given Email Already Registered or Not
		$query = "SELECT * from `USERS` WHERE `Email`='$u_mail'";
		$result = mysqli_query($mysqli, $query);			//Executing the Above Query
		$num = mysqli_num_rows($result);				//Counting the Number of Rows
		
		if($num == 1)					//If $num==1 means the Email-ID is Already used by Someone
		{
			$showerror="Email-ID Already Exists.";
		}
		else{							//If we can't find Email-ID in our DataBase then we execute this Block
			
			//Writing the Query for Inserting the User credentials to the Users Table(Which will help us to identify later is user credentials is right or not)
			$statement = "INSERT INTO USERS (Name, Email, Phone, Password) 
							VALUES('$u_name', '$u_mail', '$u_phone', '$psw')"; 
				
			if ($mysqli->query($statement) === TRUE) {											//Executing the Above Query and if it success it will generate a success message
				$showalert = "Email-ID: $u_mail<br/>Phone Number: $u_phone";
			} 
			else {
				echo "Error: " . $statement . "<br>" . $mysqli->error;						//If the Above Query Execution fails then this block will generate an Error Message
			}
		}
		
		$mysqli->close();							//Closing the Mysql Connection for Avoid Resource Leak
	}
	?>

<html>
	<head>
		<title>Register</title>
		<!--	Adding icon on title	-->
		<link rel = "icon" href = "Backgrounds/title_icon.png" type = "image/x-icon"> 
		<!-- Adding the `registerScript.js` for Validation before submitting the form-->
		<script src="scripts/registerScript.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Adding the css files for icons which I used in Website	-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- Adding the `login.css` file	-->
		<link rel="stylesheet" href="css/login.css">
	</head>
	<body>
		<!--	Creating the Header for displaying the Company Name and it's logo	-->
		<div id="divTop">
			<h3><i class="fa fa-home">&nbsp;Rental Management</i></h3>
		</div>
		<!--	Including the `notify.php` file for showing success and error messages	-->
		<?php include 'notify.php' ?>
		<h1>Registration Form</h1><br/>
		<!--	Creating the box for storing all form elements in this box		-->
		<div id="divRegister">
			<form name="myForm" method="POST" action="register.php" onsubmit="return validateForm()">
				<label>Name: </label><input type="text" name="name" placeholder="Enter Your Name"><br><br>
				<label>Email: </label><input type="text" name="email" placeholder="Enter Your Email Address"><br><br>
				<label>Phone: </label><input type="text" name="phone" placeholder="Enter Your Phone Number"><br><br>
				<label>Password: </label><input type="password" name="pass" placeholder="Enter Your Password"><br><br>
				
				<input type="submit">&nbsp;&nbsp;
				<input type="reset">
				<br/><br/>
			</form>
			<a href="login.php">Already Registered? Click Here to Login!</a><br/>
		</div>
	</body>
</html>