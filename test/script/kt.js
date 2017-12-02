// JavaScript Document

function kiemtra(evt)
	{
		var a=document.getElementById('email').value;
		var b=document.getElementById('password').value;
		if(a.length==0)
		{
			alert("email không được để trống");
			email.focus();
			 return false;
		}
		else if(b.length==0)
		{
			alert("password không được để trống");
			password.focus();
			 return false;
		}else{
			return true;
		}
	}