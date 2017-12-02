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
	$ma=$_GET["MaNguoidung"];
	$sql="delete from nguoidung where MaNguoidung='$ma'";
	$loai->query($sql);
	header("location:qltaikhoan.php");
	?>
</body>
</html>