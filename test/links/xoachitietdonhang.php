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
	$mama=$_GET["MaMonan"];
	$madonhang=$_GET["MaDonhang"];
	$sql="delete from chitietdonhang where MaMonan='$mama' and MaDonhang='$madonhang'";
	$loai->query($sql);
	$data1 = $loai->queryput2("select * from chitietdonhang where MaDonhang = :ten ",$madonhang);
	$data2 = $loai->queryput2("select * from nguoidung where MaNguoidung = :ten ",$data1[0]["MaNguoidung"]);
	$tong = 0;
	$giam = 0;
	$tt = 0;
	if($data1 != null)
	{
		foreach($data1 as $rr)
		{
			$gt=$rr["Giatien"];
			$sl=$rr["Soluong"];
			$tong += $gt * $sl;												
		}
		if($data2[0]["Soluong"] == "gm")
		{
			$giam= $tong * 0.1;
		}	
		$tt = $tong - $giam;
	}
	$sql2="update donhang set TongGiatien ='$tong',Giamgia='$giam',Thanhtien='$tt' where MaDonhang='$madonhang'";
		$loai->query($sql2);
	header("location:qldonhang.php");
	?>
<body>
</body>
</html>