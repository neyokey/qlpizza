<!doctype html>
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
  </style>
</head>

<body>	
	<div class="col-sm-12 text-center ">
		  <img src="../images/ph-logo2.png" width="240" height="205"/>
    </div>
    <div class="col-sm-4">
	</div>
	<div class="col-sm-4">
       <form name="register" action="../index.php"  method="post" >
          <div class="step-1">
             <div class="tieude">Vui lòng điền vào biểu mẫu dưới đây</div>
                 <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="name" placeholder="Tên">
                    </div>
                        </div>
                  <div class="row">
                            <div class="col-sm-6">
                                <input type="password" name="password" placeholder="Mật khẩu (tối thiểu 6 ký tự)">
                            </div>
                            <div class="col-sm-6">
                                <input type="password" name="cpassword" placeholder="Nhập lại mật khẩu">
                            </div>
                        </div> 
						<div class="row">
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
                            <div class="col-sm-6">
                                   <select name="gioitinh">
                                    <option value="">Vui lòng chọn giới tính</option>
                                    <option value="nam">Nam</option>
                                    <option value="nu">Nữ</option>
                                </select>
                                </div>
                                
                        </div>
                        <div class="row">	
                            <div class="col-sm-6">
                                    <input type="text" name="phone" placeholder="Số điện thoại" pattern="[0-9]*" maxlength="11">
                            </div>
                        </div>
                        <div class="row">
                     <div class="col-sm-6">
                         <input type="email" name="email" placeholder="Email">
                     </div>
                     <div class="col-sm-6">
                         <input type="text" name="diachi" placeholder="Địa chỉ">
                     </div>
                   </div>                     
                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary btn-lg" name="SignUp">Đăng ký</button>
                            <button type="button" class="btn btn-primary btn-lg" onclick="self.location.href='../index.php'">Quay lại trang chủ</button>
                        </div>
                    </div>                 
                </form>
            </div>
</body>
</html>
