function validateForm() 
{
    if (document.forms["myForm"]["name"].value == "") 
    {
        alert("Please Enter House name.");
        return false;
    }
	
	if (document.forms["myForm"]["area"].value == "") 
    {
        alert("Please Enter House Area.");
        return false;
    }
	
	if (!/^[0-9]*$/g.test(document.myForm.area.value)) {
        alert("Please Enter Number of House Area in number only.");
        return false;
    }
	
	if (document.forms["myForm"]["loc"].value == "") 
    {
        alert("Please Enter Location.");
        return false;
	}
	
	if (document.forms["myForm"]["price"].value == "") 
    {
        alert("Please Enter Price.");
        return false;
    }
	
	if((document.forms["myForm"]["price"].value < 0))
	{
		alert("Enter Valid Price");
		return false;
	}
	
	if (!/^[0-9]*$/g.test(document.myForm.price.value)) {
        alert("Please Enter Price in integer only");
        return false;
    }
	
	if (document.forms["myForm"]["contact"].value == "") 
    {
        alert("Please Enter Contact Information.");
        return false;
    }
	
	    if (!/^[0-9]*$/g.test(document.myForm.contact.value)) {
        alert("Invalid characters. Contact Number can contain only Digits[0-9].");
        return false;
    }
	
    if (document.forms["myForm"]["contact"].value.length != 10)
    {
        alert("Number must be of 10 digits.");
        return false;
    }
}