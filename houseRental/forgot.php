<?php
	
	//Created this variable for showing `Error` or `Success`
	$showerror = false;
	$showalert=false;	
	
	//Checking is `REQUEST_METHOD` POST or not
    if($_SERVER["REQUEST_METHOD"] == "POST"){		
		
		//including the `initialize.php` for auto creating the DATABASE,TABLES and Admin User
		include 'initialize.php';
		
		//Including the `connect.php` file for running MYSQL Query
		include 'connect.php';						
		
		
		
		//Storing the values in variables which coming using POST method
        $email = $_POST["email"];			
        $phone = $_POST["phone"];				
        $newpassword = $_POST["newpass"];						
		
		
        $sql = "SELECT * from `USERS` WHERE `Email`='$email' AND  `Phone`='$phone' ";				//Making SQL Query		
        $result = mysqli_query($mysqli,$sql);							//Executing the Query
        $num = mysqli_num_rows($result);								//Counting the Number of Rows
 
        if($num == 1){												//If number of Rows is 1 means we found the user in our Database(Given Credentials is RIGHT)
            $newpass = md5($newpassword);							//Encrypting the password using 'md5' encryption and storing in `newpass` variable	
            $update = "UPDATE `USERS` SET `Password` = '$newpass' WHERE `Email` = '$email'";				//Making the UPDATE query
            $retval = mysqli_query($mysqli,$update);										//Executing the above UPDATE command
 
            if(!$retval ) {											//IF we can able to update then this block will execute
				$showerror =  "Something is Wrong. Try Again.";
            }
            else{
                $showalert = "Password Reset Success.";							//After Updating the password this Success Alert will show on screen
				
             }
		}
        else{
            $showerror = "Credentials do not match";						//IF the given Credentials is Wrong		
        }
 
        mysqli_close($mysqli);					//Closing the Mysql connection to Avoid Resource Leak		
	}
?>



<html>
<head>
	<title>Forgot Password</title>
	<!--	Adding icon on title	-->
	<link rel = "icon" href = "Backgrounds/title_icon.png" type = "image/x-icon"> 
	
	<!-- Adding the `forgotScript.js` for Validation before submitting the form-->
	<script src="scripts/forgotScript.js"></script>
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
	<h1>Reset Password</h1><br/>
	
	
	<!--	Creating the box for storing all form elements in this box		-->
	<div id="divForgot">
		<form name="myForm" method="post" action="forgot.php" onsubmit="return validateForm()">
			<label>Email-ID : </label><input type="text" name="email" placeholder="Enter Your Email-ID" /><br/><br/>
			<label>Registered Mobile No. : </label><input type="text" name="phone" placeholder="Enter Your Phone Number" /><br/><br/>
			<label>New Password : </label><input type="password" name="newpass" placeholder="Enter Your New Password" /><br/><br/>
			<input type="submit"/>
		</form><br/><br/>
		<a href="login.php">Click here to Login</a>
	</div>
</body>
</html>