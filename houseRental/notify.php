<?php
	//For showing the error or success messages
	if($showalert){
		echo '<div class="success" style=" width: 300px; text-align: center;    background-color: rgba(158, 219, 45,0.3);margin : 20px auto; color: #ffffff;">
			<strong>Success! </strong></br>'.$showalert.'</div>';}
	if($showerror){
		echo '<div class="failure" style=" width: 300px; text-align: center;    background-color: rgba(250,0,0,0.6);margin : 20px auto; color: #ffffff;">
		<strong>Error! </strong>'.$showerror.'</div>';}
?>
