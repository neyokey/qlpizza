<?php
		session_start();
		include "../config.php";
		include "../autoload.php";
		include "../include/function.php";
		$obj = new Monan();
		$loai = new Db();
		$cart = new Cart();
		$giamgia =0;
		include "../include/add_del_cart.php";
	
		
?>
<!DOCTYPE html>
<html lang="en">
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
		 color: white;
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
	
		a:hover {
		text-decoration: underline;
		text-decoration-color: yellow;
	}
		a:hover span {
		text-decoration: underline;
		color:#FF0000;
	}
	  .tieude{
		  color: white;
		  font-size: 40px;
	  }
	  .row{
		  color: white;
		  font-size: 20px;
	  }
	  .btn.btn-cta{
		  font-size: 20px;
	  }
	  .textbox{
		  color: black;
	  }
	  .input-group.date{
		  color: black;
	  }
	  .input-group-addon
	  {
		  color: black;
	  }
  </style>
</head>
<body>  
 <header class="container-fluid text-center">
   	<div class="row logo head">
   		<div class="col-sm-2 ">
	</div>
   <div class="col-sm-8 text-center">
     <div class="col-sm-2 text-center ">
		<?php
			if(isset($_SESSION['Login'])== false)
			{
			?>
			<p><a href="Login.html"> <img src="../images/Human.jpg" class="img-rounded" alt="Cinque Terre"> Đăng nhập</a></p>
		   <p>&nbsp;</p>
		
			<div><a href="SignUp.php"> <img src="../images/Human.jpg" class="img-rounded" alt="Cinque Terre"> Đăng kí</a></div>
			
			<?php
			}else{
				echo "Welcome {$_SESSION['Login'][0]['TenNguoidung']}";
				if($_SESSION['Login']['0']['MaLoaiNguoidung'] == "admin")
				{
					?>
						<button type="button" class="btn btn-primary btn-lg" onclick="self.location.href='Admin.php'">Quản lí</button>
						<form name="exit" action="../index.php"  method="post">
							<button type="submit" class="btn btn-primary btn-lg" name ="exit">Thoát</button>	
						</form>	
					<?php
				}
				else
				{
					?>
						<button type="button" class="btn btn-primary btn-lg" onclick="self.location.href='User.php'">Chi tiết</button>	
						<form name="exit" action="../index.php"  method="post">
							<button type="submit" class="btn btn-primary btn-lg" name ="exit">Thoát</button>	
						</form>
					<?php
				}
			}
			?>
      </div>
      <div class="col-sm-8 text-center ">
		  <a href="index.php"><img src="../images/ph-logo.png" height="97"/></a>
      </div> 
      <div class="col-sm-2 text-center">  
		<button type="button" class="btn btn-warning" onclick="self.location.href='dathang.php'">Giỏ hàng</button>

      </div>
	</div>
	<div class="col-sm-2 ">
	</div>
	  </div>  
	  <div class="row space head">
	  <p>&nbsp;</p>
	 </div>
	  <div class="row menu head">
	  <div class="col-sm-2 ">
		</div>
	  <div class="col-sm-8">
	  <hr>
		
		<div class="col-sm-2 " border-color: green><a href="../index.php">TRANG CHỦ</a></div>
	  	<div class="col-sm-2 "><a href="combo.php">Combo</a></div>
	  	<div class="col-sm-2 "><a href="pizza.php">Pizza</a></div>
	  	<div class="col-sm-2 "><a href="monchinh.php">Món chính</a></div>
	  	<div class="col-sm-2 "><a href="monkhaivi.php">Món khai vị</a></div>
	  	<div class="col-sm-2 "><a href="thucuong.php">Thức uống</a></div>
	  </div>
	  <div class="col-sm-2 ">
	</div>
  	</div>
   </header>
 
<div class="container-fluid text-center">    
  <div class="row content">
   <p>&nbsp;</p>

    <div class="col-sm-12 text-center"> 
			<div class="tieude"> Thanh toán </div>
		  <div class="intent">
				<?php
				$cart -> show();
				?>
		  </div>
		  
		  <?php
			if($cart -> getNumItem()!=0)
			{
				?>
			<div class="intent">
				<table class="table table-bordered" border=\"1\"><tr><td>Tổng tiền</td><td>Giảm giá</td><td>Thành tiền</td></tr>
				<tr>
						<td><?php $tt =$cart ->getThanhTien()."VNĐ";
									echo $tt;?></td>
						<td><?php 
						if(isset($_SESSION['Login']) ==  true)
						{
							if($_SESSION['Login'][0]['MaLoaiNguoidung']=="nm")
							{
								$giamgia = 0;
								echo "0 VND";
							}else if($_SESSION['Login'][0]['MaLoaiNguoidung']=="gm")
							{
								$giamgia = $tt*0.1;
								echo $giamgia." VNĐ";
							}else{
							$giamgia = 0;
							echo "0 VNĐ";
							}
						
						}else{
							$giamgia = 0;
							echo "0 VNĐ";
						}
						?>
						</td>
						
						<hr>
						<div class="tieude"> Thanh toán </div>
						<td><?php echo ($tongTT = $tt - $giamgia)." VNĐ" ;?></td>
						
				
						</tr>
						
				
				</table>
				
		  </div>
		   <div>
				<button type="button" class="btn btn-warning" onclick="self.location.href='hoadon.php?ac=save'">Thanh Toán</button>
		  </div>
		  <?php
			}
			?>
		</div>
  </div>
</div>


<footer class="container-fluid text-center">
  <div class="row logo foot">
	  <div class="col-sm-2 ">
		</div>
	  <div class="col-sm-8">
	  <hr>
		<div class="col-sm-4 "></div>
	  	<div class="col-sm-4 "><img src="../images/Hotline_No.png" height="97"/></div>
	  	<div class="col-sm-4 "></div>  	
	  </div>
	  <div class="col-sm-2 ">
	</div>
  	</div>
	<div class="row info foot">
	  <div class="col-sm-2 ">
		</div>
	  <div class="col-sm-8">
		<div class="col-sm-12">
				<div class="col-sm-2 "></div>
				<div class="col-sm-8 text-center ">Nhóm : Trần Ngọc Trọng, Nguyễn Nhật Tuấn</div>
				<div class="col-sm-2 "></div>	  	
	  		</div>
	  		<div class="col-sm-12">
			<div class="col-sm-2 "></div>
			<div class="col-sm-8 text-center ">Lớp:D14-TH03</div>
			<div class="col-sm-2 "></div>
	  </div>
	  <div class="col-sm-2 ">
	</div>
  	</div>
  	</div>
</footer>

</body>
</html>
