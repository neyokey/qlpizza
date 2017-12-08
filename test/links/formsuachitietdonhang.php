<?php

	include "../config.php";
	include "../autoload.php";
	$loai = new Db();

	$mamonan=$_GET["MaMonan"];
	$madonhang=$_GET["MaDonhang"];
	$sql="select * from chitietdonhang where MaMonan='$mamonan' and MaDonhang='$madonhang'";
	$row=$loai->query($sql);

function postIndex($index, $value="")
{
	if (!isset($_POST[$index]))	return $value;
	return $_POST[$index];
}

		$madh=postIndex("madonhang");
		$mama=postIndex("mamonan");
		$gt=postIndex("giatien");
		$sl=postIndex("soluong");	
$err = "";
if ($madh=="") $err .="Phải nhập mã đơn hàng <br>";
if ($mama=="") $err .="Phải nhập mã món ăn <br>";
if ($gt=="") $err .="Phải nhập giá tiền <br>";
if ($sl=="") $err .="Phải nhập số lượng<br>";
?>
<html>
<head>
<title>Pizza VietNam</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../jquery-3.2.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/moment.js"></script>
  <link href="../css/bootstrap-datetimepicker.css" rel="stylesheet"/>
  <script src="../js/bootstrap-datetimepicker.min.js"></script>

  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
	/* bdy bg */
	 body {
      background-image:url(../images/bg.jpg);
    }
	  header{
      background-image:url(../images/bg-nav.jpg);
		color: white;
		  padding: 15px;
    }
	  footer {
      color: white;
      padding: 15px;
		background-image:url(../images/bg-nav.jpg);
    }
	  .tieude{
		  color: white;
	  }
	  .tt{
		  color: white;
		  text-align: center;
	  }
	  .err{
		  color: red;
	  }
  </style>
</head>

<body>	
	<div class="col-sm-12 text-center ">
		  <img src="../images/ph-logo2.png" width="240" height="205"/>
    </div>
    <div class="col-sm-4">
	</div>
	<div class="col-sm-4">
       <form name="Sua" action="formsuachitietdonhang.php?MaDonhang=<?php echo $row[0]["MaDonhang"];?>&MaMonan=<?php echo $row[0]["MaMonan"];?>"  method="post" >
          <div class="step-1">
             <div class="tieude">Vui lòng điền vào biểu mẫu dưới đây</div>
                 <div class="row">
                   <div class="tt col-sm-2"> Mã đơn hàng:</div>
                    <div class="col-sm-6">
                        <input type="text" name="madonhang" value="<?php echo $row[0]["MaDonhang"] ?>">
                    </div>
                   </div>
                  <div class="row">
                            <div class="tt col-sm-2"> Mã món ăn:</div>
                            <div class="col-sm-6">
                                <input type="text" name="mamonan" value="<?php echo $row[0]["MaMonan"] ?>">
                            </div>
			  	</div>
                       <div class="row">
                           <div class="tt col-sm-2"> Giá tiền:</div>
                            <div class="col-sm-6">
                                <input type="text" name="giatien" value="<?php echo $row[0]["Giatien"] ?>">
                            </div>
                        </div> 					
                        <div class="row">	
                           <div class="tt col-sm-2"> Số lượng:</div>
                            <div class="col-sm-6">
                                    <input type="text" name="soluong" value="<?php echo $row[0]["Soluong"] ?>">
                            </div>
                        </div>                   
                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary btn-lg" name="Sua">Sửa</button>
                            <button type="button" class="btn btn-primary btn-lg" onclick="self.location.href='../index.php'">Quay lại trang chủ</button>
                        </div>
                    </div>                 
                </form>
            </div>
            <div class="err">
            <?php
            	if (isset($_POST["Sua"]))
				{
					if($err != "")
						echo $err;
					else
					{
						$datai = $loai->queryput2("select * from donhang where MaDonhang = :ten ",$madh);
						$mand = $datai[0]["MaNguoidung"];

						$data0 = $loai->query("select * from chitietdonhang where MaMonan='$mama' and MaDonhang='$madh'");
						$data1 = $loai->queryput2("select * from nguoidung where MaNguoidung = :ten ",$mand);

						$tien = $data0[0]["Giatien"];
						$soluong=$data0[0]["Soluong"];
						$tongold = $tien * $soluong;
						$diem=$data1[0]["Diem"];
						$diemtru= $diem - ($tongold / 10000);						
						$sqlupdate = "update chitietdonhang set Soluong='$sl', Giatien='$gt'where MaMonan='$mama' and MaDonhang='$madh'";
						$data = $loai->query($sqlupdate);	
						
						$data2 = $loai->query("select * from chitietdonhang where MaMonan='$mama' and MaDonhang='$madh'");
							
						$tiennew = $data2[0]["Giatien"];
						$soluongnew=$data2[0]["Soluong"];
						$tongnew = $tiennew * $soluongnew;
						$diemnew =$diemtru+ ($tongnew / 10000);
						
						$loaikh=$data1[0]["MaLoaiNguoidung"];
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
						$sql3="update nguoidung set MaLoaiNguoidung ='$loaikh', Diem='$diemnew' where MaNguoidung='$mand'";
						$loai->query($sql3);
						
						$data3 = $loai->queryput2("select * from chitietdonhang where MaDonhang = :ten ",$madh);
						$tong = 0;
						$giam = 0;
						$tt = 0;
						if($data3 != null)
						{
							foreach($data3 as $rr)
							{
								$gt=$rr["Giatien"];
								$sl=$rr["Soluong"];
								$tong += $gt * $sl;												
							}
							if($data1[0]["MaLoaiNguoidung"] == "gm")
							{
								$giam= $tong * 0.1;
							}	
							$tt = $tong - $giam;
						}
											
						$sql2="update donhang set TongGiatien ='$tong',Giamgia='$giam',Thanhtien='$tt' where MaDonhang='$madonhang'";
							$loai->query($sql2);
						?>
							<script>location.href="qldonhang.php" </script>				
						<?php
					}
				}
				?>
            </div>
</body>
</html>