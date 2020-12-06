<?php
	//Created this variable for showing `Error` or `Success`
	$showerror = false;
	$showalert = false;
	
	
	
	//Checking is `REQUEST_METHOD` POST or not
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//including the `initialize.php` for auto creating the DATABASE,TABLES and Admin User
		include 'initialize.php';
		
		//Including the `connect.php` file for running MYSQL Query
		include 'connect.php';	
		
		
		
		//Storing the values in php variable which coming from the below form
		$u_mail = $_POST["email"];
		$u_pass = $_POST["password"];

		//Encrypting the password(We encrypt it because while storing the password we encrypt the password so it will help us to compare the password)
		$encrypted_pass = md5($u_pass);
		
		//Writing the Query for checking is user give right credentials or not
		$query = "SELECT * from `USERS` WHERE `Email`='$u_mail' AND  `Password`='$encrypted_pass' ";
		$result = mysqli_query($mysqli, $query);				//Executing the Above Query
		$num = mysqli_num_rows($result);						//Counting the Number of Rows
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);		//Fetching the result as Associative Array(Column name is Key here)
		
		//Starting the session
		session_start();
		$_SESSION['variable_name']=$row['Name'];		//Storing the value in session variable(variable_name) which will help us to print who will be logged in
		$_SESSION['variable_uid']=$row['id'];			//Storing the value in session variable(variable_uid) which will help us to find is the logged in user is `Admin` or not
		
		//If the Given Credentials is right then the above query will able to fetch one tuple that's why we comparing it with 1 then it will redirect you to `Home.php`
		if($num == 1)											
		{
			header("Location: Home.php");
		}
		else											//If given Credentials is wrong then it will generate error message
		{
			$showerror = "Invalid Login Credentials.";
		}
		$mysqli->close();						//Closing the MySQL connection for avoiding Resource Leak
	}
?>


<html>
<head>
	<title>Login</title>
	<!--	Adding icon on title	-->
	<link rel = "icon" href = "Backgrounds/title_icon.png" type = "image/x-icon"> 
	<!--	Adding the script file(loginScript.js) for validation before submitting the form		-->
	<script src="scripts/loginScript.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Adding the css files for icons which I used in Website	-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	
	<!-- Adding the `login.css` and `buttons.css` css files	-->
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="css/buttons.css">
</head>
<body>
	<!--	Creating the Header for displaying the Company Name and it's logo	-->
	<div id="divTop">
		<h3><i class="fa fa-home">&nbsp;Rental Management</i></h3>
	</div>
	<!--	Including the `notify.php` file for the the showing error or success messages	-->
	<?php include 'notify.php' ?>
	<h1>Login</h1><br/>
	
	<!--	Creating the box using div for storing all the form element in the single box		-->
	<div id="divLogin">
		<!-- Creating Form which help us to send the form data to the above php code using POST Method-->
		<form name="myForm" method="post" action="login.php" onsubmit="return validateForm()">
			<label>Email-ID : </label><input type="text" name="email" placeholder="Enter Your Email-ID" /><br/><br/>
			<label>Password : </label><input type="password" name="password" placeholder="Enter Your Password" /><br/><br/>
			<button class="button"><span>Login </span></button>
			<br/><br/>
			<a href="register.php">New User? Register Here!</a><br/>
			<a href="forgot.php">Forgot Password? Click Here!</a><br/>
		</form>
	</div>
</body>
</html>