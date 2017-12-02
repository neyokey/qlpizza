// JavaScript Document

function kiemtra(evt)
	{
		
		var a=document.getElementById('email').value;
		var b=document.getElementById('password').value;
		var c=document.getElementById('name').value;
		var d=document.getElementById('cpassword').value;
		var e=document.getElementById('phone').value;
		if(a.length==0)
		{
			alert("Email không được để trống");
			email.focus();
			 return false;
		}
		else if(b.length<=6)
		{
			alert("password phải trên 6 ký tự");
			password.focus();
			 return false;
		}
		else if(c.length==0)
		{
			alert("Tên không được để trống");
			name.focus();
			 return false;
		}else if(d.length==0)
		{
			alert("Nhập lại password không được để trống");
			cpassword.focus();
			 return false;
		}
		else if(b!=d)
		{
			alert("Sai nhập lại mật khảu");
			name.focus();
			 return false;
		}else if(isNaN(document.getElementById('phone').value))
		{
			document.getElementById('phone').style.backgroundColor="red";
			alert("Số điện thoại phải là số");
			txt1.focus();
			return false;
		} else{
			return true;
		}
	}