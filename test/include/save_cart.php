<?php
$giamgia =0;
$ac= getIndex("ac");
if(isset($_SESSION['Login']) ==  true)
						{
							if($_SESSION['Login'][0]['MaLoaiNguoidung']=="nm")
							{
								$giamgia = 0;
							}else if($_SESSION['Login'][0]['MaLoaiNguoidung']=="gm")
							{
								$giamgia = 10;								
							}else{
							$giamgia = 0;
							
							}
						}else{
							$giamgia = 0;
							
						}
		 $tongTT = ($cart ->getThanhTien())-($cart ->getThanhTien()*$giamgia/100) ;
		 if ($ac=="save"&&isset($_SESSION['Login'])== true&&isset($_SESSION["cart"])==true)
						{
							$cart->SaveDatHang($cart ->getThanhTien(),$giamgia,$tongTT,$_SESSION['Login'][0]['MaNguoidung']);
							$cart->UpdateDiem($tongTT,$_SESSION['Login'][0]['MaNguoidung']);
							$cart->UpdateMaLoaiNguoidung($_SESSION['Login'][0]['MaNguoidung']);
						
							
						}else if($ac=="save"&&isset($_SESSION['Login'])== false){
								?>
								<script>
									alert("Vui long dang nhap");
									  window.history.back();
								</script>
								<?php
						}