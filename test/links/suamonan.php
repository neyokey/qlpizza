<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	$o = new PDO("mysql:host=localhost; dbname=bookstore","root","");
	$o->query("set names 'utf8'");
	if(isset($_POST))
	{
		$ma=$_POST["mamonan"];
		$ten=$_POST["tenmonan"];
		$gt=$_POST["giatien"];
		$ct=$_POST["chitiet"];	
		$h=$_POST["hinhanh"];
		$ml=$_POST["maloai"];
		$sql="update nguoidung set TenNguoidung='$ten', Matkhau='$mk', Ngaysinh='$ns', Gioitinh='$gt', Sodienthoai='$sdt', Diachi='$dc', Email='$e' , Diem='$d' , MaLoaiMonan='$l' where MaNguoidung='$ma'";
		$o->query($sql);
	}	
	header("location:ketnoidb3.php");
	?>
</body>
</html>