<?php
function postIndex($index, $value="")
{
	if (!isset($_POST[$index]))	return $value;
	return $_POST[$index];
}

$sm 	= postIndex("submit");
$ma 	= postIndex("mamonan");
$ten 	= postIndex("tenmon");
$gt 	= postIndex("giatien");
$ct 	= postIndex("chitiet");
$arrHinh   = array("image/png");


$err = "";
if ($ten=="") $err .="Phải nhập mã <br>";
if ($ten=="") $err .="Phải nhập tên <br>";
if ($gt=="") $err .="Phải nhập giá tiền <br>";



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
			if (!move_uploaded_file($temp, "image/".$name))
				$err .="Không thể lưu file<br>";

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
  </style>
</head>

<body>	
	<div class="col-sm-12 text-center ">
		  <img src="../images/ph-logo2.png" width="240" height="205"/>
    </div>
    <div class="col-sm-4">
	</div>
	<div class="col-sm-4">
       <form name="register" action="formadd.php" method="post" enctype="multipart/form-data">
          <div class="step-1">
             <div class="tieude">Vui lòng điền vào biểu mẫu dưới đây</div>
                 <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="mamonan" placeholder="Mã món ăn">
                    </div>
                        </div>
                  <div class="row">
                            <div class="col-sm-6">
                                <input type="text" name="tenmonan" placeholder="Tên món ăn">
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" name="giatien" placeholder="Giá tiền">
                            </div>
                        </div>
                        <div class="row">	
                            <div class="col-sm-6">
                                    <input type="text" name="chitiet" placeholder="Chi tiết món ăn">
                            </div>
                        </div>
                        <div class="row">
                     <div class="col-sm-6">
                         <input class="hinh" type="file" name="hinh">
                     </div>
                     <div class="col-sm-6">
                         <input type="text" name="maloai" placeholder="Mã loại món ăn">
                     </div>
                   </div>                     
                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary btn-lg">Thêm</button>
                            <button type="button" class="btn btn-primary btn-lg" onclick="self.location.href='../index.php'">Quay lại trang chủ</button>
                        </div>
                    </div>                 
                </form>           
            </div>
            <div class="err">
            <?php
            	if (isset($_POST["submit"]))
					echo $err;
				?>
            </div>
</body>
</html>
