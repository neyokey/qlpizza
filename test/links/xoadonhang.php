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
	
	$datai = $loai->queryput2("select * from donhang where MaDonhang = :ten ",$ma);
	$mand = $datai[0]["MaNguoidung"];
	
	$data0 = $loai->query("select * from chitietdonhang where MaDonhang='$ma'");
	$data2 = $loai->queryput2("select * from nguoidung where MaNguoidung = :ten ",$mand);
		$tongold = 0;
		foreach($data0 as $rr)
		{
			$tien = $rr["Giatien"];
			$soluong=$rr["Soluong"];
			$tongold += $tien * $soluong;		
		}
		$diem=$data2[0]["Diem"];
		$diemtru= $diem - ($tongold / 10000);
		$loaikh=$data2[0]["MaLoaiNguoidung"];
		if($loaikh != "admin")
		{	
			if($diemtru > 100 )
			{
				$loaikh = "gm";
			}
			else
			{
				$loaikh = "nm";
			}
		}
	$sql3="update nguoidung set MaLoaiNguoidung ='$loaikh', Diem='$diemtru' where MaNguoidung='$mand'";
	$loai->query($sql3);
	
	$sql="delete from chitietdonhang where MaDonhang='$ma'";
	$sql1="delete from donhang where MaDonhang='$ma'";
	$loai->query($sql);
	$loai->query($sql1);
	header("location:qldonhang.php");
	
?>

<body>
</body>
</html>