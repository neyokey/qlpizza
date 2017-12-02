<?php
	include "../config.php";
	include "../autoload.php";
	$loai = new Db();
	$ma=$_GET["MaNguoidung"];
	$sql="select * from nguoidung where MaNguoidung='$ma'";
	$row= $loai->query($sql);

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
  </style>
</head>

<body>	
	<div class="col-sm-12 text-center ">
		  <img src="../images/ph-logo2.png" width="240" height="205"/>
    </div>
    <div class="col-sm-4">
	</div>
	<div class="col-sm-4">
       <form name="Sua" action="suataikhoan.php"  method="post" >
          <div class="step-1">
             <div class="tieude">Vui lòng điền vào biểu mẫu dưới đây</div>
                 <div class="row">
                   <div class="tt col-sm-2"> Mã:</div>
                    <div class="col-sm-6">
                        <input type="text" name="ma" value="<?php echo $row[0]["MaNguoidung"] ?>">
                    </div>
                   </div>
                  <div class="row">
                            <div class="tt col-sm-2"> Tên:</div>
                            <div class="col-sm-6">
                                <input type="text" name="ten" value="<?php echo $row[0]["TenNguoidung"] ?>">
                            </div>
			  	</div>
                       <div class="row">
                           <div class="tt col-sm-2"> Mật khẩu:</div>
                            <div class="col-sm-6">
                                <input type="text" name="matkhau" value="<?php echo $row[0]["Matkhau"] ?>">
                            </div>
                        </div> 
						<div class="row">
						<div class="tt col-sm-2"> Ngày sinh:</div>
							<div class='col-sm-6'>
								<div class="form-group">
									<div class='input-group date' id='datetimepicker1'>
										<input type='text' name="ngaysinh" class="form-control" />
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</div>
							</div>
							<script type="text/javascript">
								$(function () {
									$('#datetimepicker1').datetimepicker({ format: 'YYYY-MM-DD'});
								});
							</script>
						</div>
						<div class="row">
                           <div class="tt col-sm-2"> Giới tính:</div>
                            <div class="col-sm-6">
                                   <select name="gioitinh">
                                    <option value="nam" <?php if($row[0]["Gioitinh"] == "nam") echo "selected" ?>>Nam</option>
                                    <option value="nu" <?php if($row[0]["Gioitinh"] == "nu") echo "selected" ?>>Nữ</option>
                                </select>
                                </div>
                                
                        </div>
                        <div class="row">	
                           <div class="tt col-sm-2"> Số điện thoại:</div>
                            <div class="col-sm-6">
                                    <input type="text" name="phone" value="<?php echo $row[0]["Sodienthoai"] ?>">
                            </div>
                        </div>
                        <div class="row">
                        <div class="tt col-sm-2"> Email:</div>
                     <div class="col-sm-6">
                         <input type="text" name="email" value="<?php echo $row[0]["Email"] ?>">
                     </div>
			  </div>
                    <div class="row">
                     <div class="tt col-sm-2"> Địa chỉ:</div>
                     <div class="col-sm-6">
                         <input type="text" name="diachi" value="<?php echo $row[0]["Diachi"] ?>">
                     </div>
                      </div>
                    <div class="row">
                    <div class="tt col-sm-2"> Điểm:</div>
                     <div class="col-sm-6">
                         <input type="text" name="diem" value="<?php echo $row[0]["Diem"] ?>">
                     </div>
                      </div>
                    <div class="row">
                           <div class="tt col-sm-2"> Loại thành viên:</div>
                            <div class="col-sm-6">
                                   <select name="loai">
                                    <option value="nm" <?php if($row[0]["MaLoaiNguoidung"] == "nm") echo "selected" ?>>Normal member</option>
                                    <option value="gm" <?php if($row[0]["MaLoaiNguoidung"] == "gm") echo "selected" ?>>Gold member</option>
                                    <option value="admin" <?php if($row[0]["MaLoaiNguoidung"] == "ad") echo "selected" ?>>Admin</option>
                                </select>
                                </div>
                   </div>                     
                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary btn-lg" name="SignUp">Sửa</button>
                            <button type="button" class="btn btn-primary btn-lg" onclick="self.location.href='../index.php'">Quay lại trang chủ</button>
                        </div>
                    </div>                 
                </form>
            </div>
</body>
</html>
