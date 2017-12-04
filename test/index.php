<?php
	session_start();
	include "config.php";
	include "autoload.php";
	$loai = new Db();
	$con=mysqli_connect("localhost","root","","qlpizza");
	if(isset($_POST["exit"]))
	{
		session_destroy();
		header('Location: ../index.php');
	}
	
	if(isset($_POST["Login"]))
	{
		if (isset($_POST["email"]))
			$email = $_POST["email"];
		if (isset($_POST["password"]))
			$password = $_POST["password"];
		$data = $loai->queryLogin($email,$password);
		$_SESSION["Login"] = $data; 
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
		$data = $loai->queryLogin($email,$password);
		if($data!= null)
		{
			?>
			<script>
				alert("Tên không được để trống");
				  window.history.back();
			</script>
			<?php
		}else{
		$loai->querySignUp($name,$email,$password,$ngaysinh,$gioitinh,$phone,$diachi);
		$data = $loai->queryLogin($email,$password);
		$_SESSION["Login"] = $data;
		}
				
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pizza VietNam</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery-3.2.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
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
      background-image:url(images/bg.jpg);
    }
	  header{
      background-image:url(images/bg-nav.jpg);
		color: white;
		  padding: 15px;
    }
	  footer {
      color: white;
      padding: 15px;
		background-image:url(images/bg-nav.jpg);
    }
	
		a:hover {
		text-decoration: underline;
		text-decoration-color: yellow;
	}
		a:hover span {
		text-decoration: underline;
		color:#FF0000;
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
		<div>
			<?php
			if(isset($_SESSION['Login'])== false)
			{
			?>
			<p><a href="links/Login.html"> <img src="images/Human.jpg" class="img-rounded" alt="Cinque Terre"> Đăng nhập</a></p>
		   <p>&nbsp;</p>
		
			<div><a href="links/SignUp.html"> <img src="images/Human.jpg" class="img-rounded" alt="Cinque Terre"> Đăng kí</a></div>
			
			<?php
			}else{
				echo "Welcome {$_SESSION['Login'][0]['TenNguoidung']}";
				if($_SESSION['Login']['0']['MaLoaiNguoidung'] == "admin")
				{
					?>
						<button type="button" class="btn btn-primary btn-lg" onclick="self.location.href='links/Admin.php'">Quản lí</button>
						<form name="exit" action="../index.php"  method="post">
							<button type="submit" class="btn btn-primary btn-lg" name ="exit">Thoát</button>	
						</form>	
					<?php
				}
				else
				{
					?>
						<button type="button" class="btn btn-primary btn-lg" onclick="self.location.href='links/User.php'">Chi tiết</button>	
						<form name="exit" action="../index.php"  method="post">
							<button type="submit" class="btn btn-primary btn-lg" name ="exit">Thoát</button>	
						</form>
					<?php
				}
			}
			?>	
		</div>
	</div>
      <div class="col-sm-8 text-center ">
		  <a href="index.php"><img src="images/ph-logo.png"  height="97"/></a>
      </div> 
      <div class="col-sm-2 text-center">  
		<button type="button" class="btn btn-warning" onclick="self.location.href='links/dathang.php'">Giỏ hàng</button>

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
	  	<div class="col-sm-2 "><a href="../links/combo.php">Combo</a></div>
	  	<div class="col-sm-2 "><a href="../links/pizza.php">Pizza</a></div>
	  	<div class="col-sm-2 "><a href="../links/monchinh.php">Món chính</a></div>
	  	<div class="col-sm-2 "><a href="../links/monkhaivi.php">Món khai vị</a></div>
	  	<div class="col-sm-2 "><a href="../links/thucuong.php">Thức uống</a></div>
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
      <!-- <img src="images/Main-Banner-1.jpg" width="990" height="260"/>
      <hr>
      <img src="images/BOGOBannerHome.jpg" width="990" height="260"/> -->
	  <div id="myCarousel" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<!-- <li data-target="#myCarousel" data-slide-to="2"></li> -->
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner">
			<div class="item active">
			  <a href="combo.html"><img src="images/Main-Banner-1.jpg" /></a>
			</div>

			<div class="item">
			  <a href="combo.html"><img src="images/BOGOBannerHome.jpg" /></a>
			</div>

		  </div>

		  <!-- Left and right controls -->
		  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		  </a>
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
	  	<div class="col-sm-4 "><img src="images/Hotline_No.png" height="97"/></div>
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
