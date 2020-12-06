function Schedule()
{
	swal({
		title: "CONFIRMED!",
		text: "Visit Confirmed",
		icon: "success",
		button: "Ok!",
	}).then(function() {
		window.location = "Home.php";
	});
}