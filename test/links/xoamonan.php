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
	$ma=$_GET["MaMonan"];
	$sql="delete from chitietdonhang where MaMonan='$ma'";
	$sql1="delete from monan where MaMonan='$ma'";
	$loai->query($sql);
	$loai->query($sql1);
	header("location:qlmonan.php");
	?>
</body>
</html>