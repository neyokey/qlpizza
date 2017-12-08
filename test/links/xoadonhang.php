<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	include "../config.php";
	include "../autoload.php";
	
	$loai = new Db();
	$ma=$_GET["MaDonhang"];
	$sql="delete from chitietdonhang where MaDonhang='$ma'";
	$sql1="delete from donhang where MaDonhang='$ma'";
	$loai->query($sql);
	$loai->query($sql1);
	header("location:qldonhang.php");
	
?>

<body>
</body>
</html>