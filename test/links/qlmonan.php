<?php
			include "../config.php";
			include "../autoload.php";
			$obj = new Monan();
			$loai = new Db();

			$ten="";
			if (isset($_POST["ten"]))
				$ten = $_POST["ten"];
	
			$data1 = $loai->queryput("select * from monan where TenMonan like :ten ",$ten);
			$data = null;
	if(isset($_POST["Login"]))
	{
			//$obj = new Monan();
		

		if (isset($_POST["email"]))
			$email = $_POST["email"];
		if (isset($_POST["password"]))
			$password = $_POST["password"];
	
		$data = $loai->queryLogin("select * from nguoidung where Email like :email and Matkhau like :password",$email,$password);
	}else if(isset($_POST["SignUp"]))
	{
	
		if (isset($_POST["name"]))
			$name = $_POST["name"];
		if (isset($_POST["email"]))
			$email = $_POST["email"];
		if (isset($_POST["password"]))
			$password = $_POST["password"];
		if (isset($_POST["ngaysinh"]))
			$ngaysinh = $_POST["ngaysinh"];
		if (isset($_POST["gioitinh"]))
			$gioitinh = $_POST["gioitinh"];
		if (isset($_POST["phone"]))
			$phone = $_POST["phone"];
		if (isset($_POST["diachi"]))
			$diachi = $_POST["diachi"];
		print_r($name);
		print_r($password);
		print_r($email);
		print_r($ngaysinh);
		print_r($gioitinh);
		print_r($phone);
		print_r($diachi);
		
		
		$data=$loai->querySignUp("INSERT INTO nguoidung (TenNguoidung, Matkhau, Ngaysinh, Gioitinh, Sodienthoai, Diachi, Email, Diem, MaLoaiNguoidung)
				VALUES (:name,:password,:ngaysinh,:gioitinh,:phone,:diachi,:email,0,'nm')",$name,$email,$password,$ngaysinh,$gioitinh,$phone,$diachi);
				
	}
			
	if (isset($_GET["MaNguoidung"]))
		{
				$ma = $_GET["MaNguoidung"];
		$data = $loai->queryUser("select * from nguoidung where MaNguoidung like :ma",$ma);
		}

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
			if($data == null)
			{
			?>
			<p><a href="Login.php"> <img src="../images/Human.jpg" class="img-rounded" alt="Cinque Terre"> Đăng nhập</a></p>
		   <p>&nbsp;</p>
		
			<div><a href="SignUp.php"> <img src="../images/Human.jpg" class="img-rounded" alt="Cinque Terre"> Đăng kí</a></div>
			
			<?php
			}else{
				echo "Welcome {$data['0']['TenNguoidung']}";
				if($data['0']['MaLoaiNguoidung'] == "admin")
				{
					?>
						<button type="button" class="btn btn-primary btn-lg" onclick="self.location.href='Admin.php?MaNguoidung=<?php echo $data['0']['MaNguoidung'];?>'">Quản lí</button>
						<button type="button" class="btn btn-primary btn-lg" onclick="self.location.href='../index.php'">Thoát</button>		
					<?php
				}
				else
				{
					?>
						<button type="button" class="btn btn-primary btn-lg" onclick="self.location.href='User.php?MaNguoidung=<?php echo $data['0']['MaNguoidung'];?>'">Chi tiết</button>	
						<button type="button" class="btn btn-primary btn-lg" onclick="self.location.href='../index.php'">Thoát</button>	
					<?php
				}
			}
			?>
      </div>
      <div class="col-sm-8 text-center ">
		  <a href="index.html"><img src="../images/ph-logo.png" height="97"/></a>
      </div> 
      <div class="col-sm-2 text-center">  
		<button type="button" class="btn btn-warning">Giỏ hàng</button>

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
		<?php
		  if($data != null)
		  {
		  ?>
		<div class="col-sm-2 " border-color: green><a href="../index.php?MaNguoidung=<?php echo $data['0']['MaNguoidung'];?>">TRANG CHỦ</a></div>
	  	<div class="col-sm-2 "><a href="../links/combo.php?MaNguoidung=<?php echo $data['0']['MaNguoidung'];?>">Combo</a></div>
	  	<div class="col-sm-2 "><a href="../links/pizza.php?MaNguoidung=<?php echo $data['0']['MaNguoidung'];?>">Pizza</a></div>
	  	<div class="col-sm-2 "><a href="../links/monchinh.php?MaNguoidung=<?php echo $data['0']['MaNguoidung'];?>">Món chính</a></div>
	  	<div class="col-sm-2 "><a href="../links/monkhaivi.php?MaNguoidung=<?php echo $data['0']['MaNguoidung'];?>">Món khai vị</a></div>
	  	<div class="col-sm-2 "><a href="../links/thucuong.php?MaNguoidung=<?php echo $data['0']['MaNguoidung'];?>">Thức uống</a></div>
	  	<?php
		  }
		  else
		  {
			?>
		<div class="col-sm-2 " border-color: green><a href="../index.php">TRANG CHỦ</a></div>
	  	<div class="col-sm-2 "><a href="../links/combo.php">Combo</a></div>
	  	<div class="col-sm-2 "><a href="../links/pizza.php">Pizza</a></div>
	  	<div class="col-sm-2 "><a href="../links/monchinh.php">Món chính</a></div>
	  	<div class="col-sm-2 "><a href="../links/monkhaivi.php">Món khai vị</a></div>
	  	<div class="col-sm-2 "><a href="../links/thucuong.php">Thức uống</a></div>	  
			  <?php
		  }
			  ?>
	  </div>
	  <div class="col-sm-2 ">
	</div>
  	</div>
   </header>
 
<div class="container-fluid text-center">    
  <div class="row content">
   <p>&nbsp;</p>
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8 text-center"> 
      	<div class="tieude"> Quản lí món ăn </div>
      		<div class="personal-details">
				<div class="owner-info">
				<div>
				<form action="qlmonan.php?MaNguoidung=<?php echo $data['0']['MaNguoidung'];?>" method="post">
					<tr>Nhập tên món ăn <input type="text" name="ten" class="textbox"></input> </tr>
					<tr><input type="submit" value="Tìm" name="submid"></tr>
					</form>
				</div>
				<div align="center"> <table border="2"><tr><td>Mã món ăn</td><td>Tên món ăn</td><td>Giá</td><td>Chi tiết</td><td>Hình ảnh</td><td>Mã loại món ăn</td><td>Thao tác</td></tr>
   				<?php
				foreach($data1 as $row)
				{
					?>
					<tr><td><?php echo $row["MaMonan"];?></td>
						<td><?php echo $row["TenMonan"];?></td>
					   <td><?php echo $row["Giatien"];?></td>
					   <td><?php echo $row["Chitiet"];?></td>
					   <td><?php echo $row["Hinhanh"];?></td>	
					   <td><?php echo $row["MaLoaiMonan"];?></td>			  
						<td><a href='xoamonan.php?MaMonan=<?php echo $row["MaMonan"];?>'>Xóa</a>
							<a href='suamonan.php?MaMonan=<?php echo $row["MaMonan"];?>'>Sửa</a></td>
						</tr>
					<?php
				}
				?>
				</table>
    			</div>
	  </div>
     	</div>
    </div>
    <div class="col-sm-2">
	
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
