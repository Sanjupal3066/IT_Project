function validateForm() 
{
    if (document.forms["myForm"]["email"].value == "") 
    {
        alert("Please Enter Your Email-ID");
        return false;
    }
	
	if (!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(document.myForm.email.value))
    {
        alert("Enter Valid Email Address.");
        return false;
    }
	
    if (document.forms["myForm"]["password"].value == "") 
    {
        alert("Please Enter Password");
        return false;
    }
}