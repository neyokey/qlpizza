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
	
	
	$datai = $loai->queryput2("select * from donhang where MaDonhang = :ten ",$madonhang);
	$mand = $datai[0]["MaNguoidung"];
	
	$data0 = $loai->query("select * from chitietdonhang where MaMonan='$mama' and MaDonhang='$madonhang'");
	$data2 = $loai->queryput2("select * from nguoidung where MaNguoidung = :ten ",$mand);
	
	$tien = $data0[0]["Giatien"];
	$soluong=$data0[0]["Soluong"];
	$tongold = $tien * $soluong;
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
	
	
	$sql="delete from chitietdonhang where MaMonan='$mama' and MaDonhang='$madonhang'";
	$loai->query($sql);
	$data1 = $loai->queryput2("select * from chitietdonhang where MaDonhang = :ten ",$madonhang);
	
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
		if($data2[0]["MaLoaiNguoidung"] == "gm")
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