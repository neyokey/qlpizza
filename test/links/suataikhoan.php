<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	include "../config.php";
	include "../autoload.php";
	$loai = new Db();
	if(isset($_POST))
	{
		$ma=$_POST["ma"];
		$ten=$_POST["ten"];
		$mk=$_POST["matkhau"];
		$ns=$_POST["ngaysinh"];
		$gt=$_POST["gioitinh"];
		$sdt=$_POST["phone"];
		$e=$_POST["email"];
		$dc=$_POST["diachi"];
		$d=$_POST["diem"];
		$l=$_POST["loai"];
		$sql="update nguoidung set TenNguoidung='$ten', Matkhau='$mk', Ngaysinh='$ns', Gioitinh='$gt', Sodienthoai='$sdt', Diachi='$dc', Email='$e' , Diem='$d' , MaLoaiNguoidung='$l' where MaNguoidung='$ma'";
	}	
	$loai->query($sql);
	header("location:qltaikhoan.php");	
	?>
</body>
</html>