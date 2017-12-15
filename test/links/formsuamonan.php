<?php
	include "../config.php";
	include "../autoload.php";
	$obj = new Monan();
	$loai = new Db();
	$ma=$_GET["MaMonan"];
	$sql="select * from monan where MaMonan='$ma'";
	$row= $loai->query($sql);

function postIndex($index, $value="")
{
	if (!isset($_POST[$index]))	return $value;
	return $_POST[$index];
}

$ma 	= postIndex("mamonan");
$ten 	= postIndex("tenmonan");
$gt 	= postIndex("giatien");
$ct 	= postIndex("chitiet");
$maloai   = postIndex("maloai");
$err = "";
if ($ma=="") $err .="Phải nhập mã <br>";
if ($ten=="") $err .="Phải nhập tên <br>";
if ($gt=="") $err .="Phải nhập giá tiền <br>";
if ($ct=="") $err .="Phải nhập chi tiết <br>";

$arrHinh   = array("image/png");


if (isset($_FILES["hinh"]))
{
	$errFile = $_FILES["hinh"]["error"];
	if ($errFile>0)
		$err .="Lỗi file hình <br>";
	else
	{
		$type = $_FILES["hinh"]["type"];
		if (!in_array($type, $arrHinh))
			$err .="Không phải file hình png<br>";
		else
		{	$temp = $_FILES["hinh"]["tmp_name"];
			$name = $_FILES["hinh"]["name"];
			if (!move_uploaded_file($temp, "../images/".$maloai."/".$name))
				$err .="Không thể lưu file<br>";
		 	else
			{
				$ran = rand(10, 1000);
				rename("../images/".$maloai."/".$name,"../images/".$maloai."/".$ma.$ran.".png");
			}
		 		
		}
	}
}
else
{
	$err .="Chưa có hình <br>";
}
?>
<!doctype html>
<html>
<head>
<title>Pizza VietNam</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../jquery-3.2.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
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
		background-image:url(images/bg-nav.jpg);
    }
	  .tieude{
		  color: white;
	  }
	  .hinh{
		  color: white;
	  }
	  .tt{
		  color: white;
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
       <form name="register" action="formsuamonan.php?MaMonan=<?php echo $row[0]["MaMonan"];?>" method="post" enctype="multipart/form-data">
          <div class="step-1">
             <div class="tieude">Vui lòng điền vào biểu mẫu dưới đây</div>
                 <div class="row">
                   <div class="tt col-sm-2">Mã:</div>
                    <div class="col-sm-6">
                        <input type="text" name="mamonan" value="<?php echo $row[0]["MaMonan"] ?>">
                    </div>
                        </div>
                  <div class="row">
                           <div class="tt col-sm-2">Tên:</div>
                            <div class="col-sm-6">
                                <input type="text" name="tenmonan" value="<?php echo $row[0]["TenMonan"] ?>">
                            </div>
                        </div> 
                        <div class="row">
                           <div class="tt col-sm-2">Giá tiền:</div>
                            <div class="col-sm-6">
                                <input type="text" name="giatien" value="<?php echo $row[0]["Giatien"] ?>">
                            </div>
                        </div>
                        <div class="row">	
                           <div class="tt col-sm-2">Chi tiết:</div>
                            <div class="col-sm-6">
                                    <input type="text" name="chitiet" value="<?php echo $row[0]["Chitiet"] ?>">
                            </div>
                        </div>
                        <div class="row">
                        <div class="tt col-sm-2">Hình hiện tại:</div>
                        <div class="col-sm-6"> 
							<?php if($row[0]["MaLoaiMonan"] == "cb"){?>
									<img src="../images/cb/<?php echo $row[0]["Hinhanh"];?>" />
							<?php }else if($row[0]["MaLoaiMonan"] == "pz"){?>	
									<img src="../images/pz/<?php echo $row[0]["Hinhanh"];?>" />
							<?php }else if($row[0]["MaLoaiMonan"] == "mc"){?>	
									<img src="../images/mc/<?php echo $row[0]["Hinhanh"];?>" />
							<?php }else if($row[0]["MaLoaiMonan"] == "mkv"){?>	
									<img src="../images/mkv/<?php echo $row[0]["Hinhanh"];?>" />
							<?php }else if($row[0]["MaLoaiMonan"] == "mn"){?>	
									<img src="../images/mn/<?php echo $row[0]["Hinhanh"];?>" />
									<?php } ?>					
					</div>
                     <div class="col-sm-8" name="a">
                         <input class="hinh" type="file" name="hinh"> 
                     </div>
                     <div class="col-sm-8 tt">(Size : 286 × 176) (Type: png)</div>
                   			  </div>

                       <div class="row">
                           <div class="tt col-sm-2">Loại:</div>	
                            <div class="col-sm-6">
                                 <select name ="maloai">
									<option value="cb" <?php if($row[0]["MaLoaiMonan"] == "cb") echo "selected"?>>Combo</option>
									<option value="pz" <?php if($row[0]["MaLoaiMonan"] == "pz") echo "selected"?>>Pizza</option>
									<option  value="mc" <?php if($row[0]["MaLoaiMonan"] == "mc") echo "selected"?>>Món chính</option>
									<option  value="mkv" <?php if($row[0]["MaLoaiMonan"] == "mkv") echo "selected"?>>Món khai vị</option>
									<option  value="mn" <?php if($row[0]["MaLoaiMonan"] == "mn") echo "selected"?>>Nước</option>
								</select>
                            </div>
                        </div>                    
                        <div class="text-center">
                            <button type="submit" name="them" class="btn btn-secondary btn-lg">Sửa</button>
                            <button type="button" class="btn btn-primary btn-lg" onclick="self.location.href='../index.php'">Quay lại trang chủ</button>
                        </div>
                    </div>                 
                </form>           
            </div>
            <div class="err">
            <?php
            	if (isset($_POST["them"]))
				{
					if($err != "")
						echo $err;
					else
					{
						$h = $ma.$ran.".png";
						$sqlupdate = "update monan set TenMonan='$ten', Giatien='$gt', Chitiet='$ct', Hinhanh='$h', MaLoaiMonan='$maloai' where MaMonan='$ma'";
						$data = $loai->query($sqlupdate);
						
						?>
							<script>location.href="qlmonan.php" </script>
				
				<?php
					}
				}
				?>
            </div>
</body>
</html>
