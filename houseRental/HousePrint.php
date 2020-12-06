<?php
	//AJAX CODE
	echo "<script>
				function showData(str) {
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						//Making the Connection
						xmlhttp = new XMLHttpRequest();
						} else {
						// code for IE6, IE5
						//Making the Connection
						xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
						}
						xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
						//Storing the Result of `HousesDropDown.php` in the div element whose id is DATA
						document.getElementById('DATA').innerHTML =
						this.responseText;
						}
						};
						//this will call `HousesDropDown.php` while calling it also pass one parameter while will help us to print desired data
						xmlhttp.open('GET','HousesDropDown.php?q='+str,true);
						xmlhttp.send();
				}
				
				function search()
				{
					var x = document.getElementById('search').value;
					if(x == '')
						return;
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						//Making the Connection
						xmlhttp = new XMLHttpRequest();
						} else {
						// code for IE6, IE5
						//Making the Connection
						xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
						}
						xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
						//Storing the Result of `HouseSearch.php` in the div element whose id is DATA
						document.getElementById('DATA').innerHTML =
						this.responseText;
						}
						};
						//this will call `HouseSearch.php` while calling it also pass one parameter while will help us to print desired data
						xmlhttp.open('GET','HouseSearch.php?q='+x,true);
						xmlhttp.send();
				}
				//As soon as program loads it will call the `showData` function and print all the house details
				window.onload=showData('*');
		</script>";
	
	//Creating the Drop Down and Search box 
	echo "<center><br><Label>House Type:&nbsp;</Label><select name='users' onchange='showData(this.value)'>
				<option value='*' selected>ALL</option>
				<option value='Apartments'>Apartments</option>
				<option value='BuilderFloors'>Builder Floors</option>
				<option value='Villa'>Villas</option>
			</select>&emsp;&emsp;&emsp;&emsp;
			<input type='text' name='t1' id='search' placeholder='Enter Location' />&nbsp;<input type='submit' value='Search' id='submitt' onclick='search()'/>
			</center>";
	
	//Use this Div Tag for printing the Data
	echo "<div id='DATA'></div>";
?>