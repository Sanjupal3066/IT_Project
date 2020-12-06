<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>DELETE</title>
	<!--	Adding Icon in title Bar	-->
	<link rel = "icon" href = "Backgrounds/title_icon.png" type = "image/x-icon">
	<!--	Adding script for `sweetalert`	-->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script>
		//Creating my own `Delete` function
		function Delete()
		{
			<?php
				//Storing the values in php variable which coming from `HouseDropDown.php` and `HouseSearch.php`
				$name = $_GET['q'];
				$type = $_GET['p'];
				$loc = $_GET['r'];
				$imgPath = $_GET['s'];
			?>
			//Creating SweetAlert
			swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to recover this!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			}).then((willDelete) => {
			  if (willDelete) {
				swal({
					title: "HOUSE REMOVED",
					text: "House Data will be Deleted",
					icon: "success",
					button: "Ok!",
				}).then(function() {
						//Fetching the php variables values in the javascript so we can use it to pass to the another page for deleting the correct house details
						var name="<?php echo $name ?>";
						var type="<?php echo $type ?>";
						var loc="<?php echo $loc ?>";
						var imgPath="<?php echo $imgPath ?>";
						
						//Lastly calling the ``deleteHouse.php` which will delete the desired house details
						window.location = "deleteHouse.php?q="+name+"&p="+type+"&r="+loc+"&s="+imgPath;	
					});
					  } else {
						swal("CANCELED","House Data is safe!","error").then(function() {
						//If user click on `cancel` it will again redirect you to the same home page `Home.php`
						window.location = "Home.php";
					});
					  }
					});
		}

	</script>
</head>
<!--	As soon as body loads it will call this Delete() function	-->
<body onload="Delete()">
</body>
</html>