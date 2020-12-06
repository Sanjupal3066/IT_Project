function validateForm() 
{
    if (document.forms["myForm"]["email"].value == "") 
    {
        alert("Email cannot be Empty.");
        return false;
    }
	
    if (!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(document.myForm.email.value))
    {
        alert("Enter Valid Email Address.");
        return false;
    }
	
    if (document.forms["myForm"]["phone"].value == "") 
    {
        alert("Contact Number cannot be Empty.");
        return false;
    }
	
    if (!/^[0-9]*$/g.test(document.myForm.phone.value)) {
        alert("Invalid characters. Contact Number can contain only Digits[0-9].");
        return false;
    }
	
    if (document.forms["myForm"]["phone"].value.length != 10)
    {
        alert("Number must be of 10 digits.");
        return false;
    }

	if (document.forms["myForm"]["newpass"].value.length < 8)
    {
        alert("Password Min Length should be 8");
        return false;
    }
}