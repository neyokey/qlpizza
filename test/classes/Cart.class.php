<?php
class Cart extends Db{
	private $_cart;
	private $_num_item =0;
	public function  __construct()
	{
		if(!isset($_SESSION["cart"])) $this->_cart= array();
		else $this->_cart = $_SESSION["cart"];
		$this->_num_item = array_sum($this->_cart);
		
	}

	public function getThanhTien()
		{
			$sql="select * from monan where MaMonan = :id";
			$temp = new Db();
			$thanhtien = 0;
			foreach($this->_cart as $id=>$quantity)
			{
				$temp->queryCheckDH($sql,$id);
				$data = $temp->getData();
				foreach($data as $row)
				{
					
					$thanhtien += $row["Giatien"];
				}

			}
			return $thanhtien;
		}
	public function SaveDatHang($giatien,$giamgia,$tongTT,$manguoidung)
		{
			$sql = "INSERT INTO donhang (Thoigiandathang, TongGiatien, Giamgia, Thanhtien,MaNguoidung)
				VALUES (:ngay,:giatien,:giamgia,:tongTT,:manguoidung)";
			$temp = new Db();
			$date = date("Y-m-d H:i:s");
			$arr = array(":ngay"=> $date,":giatien" =>$giatien,":giamgia"=> $giamgia,":tongTT" =>$tongTT,":manguoidung"=>$manguoidung);
			$temp->query($sql,$arr);
		
			$sql = "select * from donhang where ThoiGianDathang = :date and MaNguoidung = :id";
			$arr = array(":date"=> $date,":id" =>$manguoidung);
			$data = $temp->query($sql,$arr);
			foreach($this->_cart as $id=>$quantity)
			{	
				$sql="select * from monan where MaMonan = :id";
				$temp->queryCheckDH($sql,$id);
				$data2 = $temp->getData();
				foreach($data2 as $row)
				{
					$sql = "INSERT INTO chitietdonhang (MaDonhang, MaMonan, Giatien, Soluong)
					VALUES (:MaDonhang,:MaMonan,:Giatien,:Soluong)";
					$arr = array(":MaDonhang"=> $data[0]["MaDonhang"],":MaMonan" => $row["MaMonan"],":Giatien"=> $row["Giatien"],":Soluong" =>$quantity);
					$temp->query($sql,$arr);
				}

			}
			echo "<script language=javascript>window.location='dathang.php';</script>";
		}
	
	
	public function getNumItem()
	{
		return $this->_num_item;	
	}
	public function __destruct()
	{
		$_SESSION["cart"] = $this->_cart;	
	}
	/*
	Them san pham có mã $id và số lương $quantity vào giỏ hàng
	*/
	
	public function bookExist($book_id)
	{
		$sql="select * from monan where MaMonan = '$book_id' ";
		$temp = new Db();
		$temp->exeQuery($sql);
		if ($temp->getRowCount()==0) return false;
		return true;
	}
	public function add($id, $quantity=1)
	{	
		if ($id=="" || $quantity<1) return;
		if (!$this->bookExist($id)) return;	
		if (isset($this->_cart[$id]))
			$this->_cart[$id]+=	$quantity;
		else $this->_cart[$id]=	$quantity;
		$_SESSION["cart"] = $this->_cart;	
		$this->_num_item = array_sum($this->_cart);
		echo "<script language=javascript>window.location='dathang.php';</script>";//Chuyển trình duyệt web tới trang hiển thị cart
	}
	
	public function remove($id)
	{
		unset($this->_cart[$id]);
		$this->_num_item = array_sum($this->_cart);
		$_SESSION["cart"] = $this->_cart;	
	}
	public function edit($id, $quantity)
	{
		$this->_cart[$id]	= $quantity;
		$this->_num_item = array_sum($this->_cart);
		$_SESSION["cart"] = $this->_cart;	
	}
	
	public function show()
	{
		$sql="select * from monan where MaMonan = :id";
		$temp = new Db();
		if (Count($this->_cart)==0) 
		{	echo "Giỏ hàng rỗng";
			return;
		}
		echo "<table border=\"1\"><tr><td>Tên món ăn</td><td>Giá tiền</td><td>Chi tiết</td><td>Hình ảnh</td><td>Số lượng</td></tr>";
		foreach($this->_cart as $id=>$quantity)
		{
				$temp->queryCheckDH($sql,$id);
				$data = $temp->getData();
				
				foreach($data as $row)
				{
					?>
					<tr>
						<td><?php echo $row["TenMonan"];?></td>
					   <td><?php echo $row["Giatien"];?></td>
					   <td><?php echo $row["Chitiet"];?></td>
					   <td>
					   		<?php if($row["MaLoaiMonan"] == "cb"){?>
									<img src="../images/cb/<?php echo $row["Hinhanh"];?>" />
							<?php }else if($row["MaLoaiMonan"] == "pz"){?>	
									<img src="../images/pz/<?php echo $row["Hinhanh"];?>" />
							<?php }else if($row["MaLoaiMonan"] == "mc"){?>	
									<img src="../images/mc/<?php echo $row["Hinhanh"];?>" />
							<?php }else if($row["MaLoaiMonan"] == "mkv"){?>	
									<img src="../images/mkv/<?php echo $row["Hinhanh"];?>" />
							<?php }else if($row["MaLoaiMonan"] == "mn"){?>	
									<img src="../images/mn/<?php echo $row["Hinhanh"];?>" />
									<?php } ?>
						</td>	
						<td><?php echo $quantity;?></td>							
						<td><button type="button" class="btn btn-warning" onclick="self.location.href='dathang.php?ac=del&id=<?php echo $row["MaMonan"];?>'">Xóa</button></td>
						</tr>
						<?php
				}

		}
		
		echo "</table>";	
		$this->setCartInfo($this->getNumItem());
		//Update số lượng item của cart trong header.php. Có thể không sử dụng method này nếu mỗi lần thêm xong, chuyển trang về mod=cart.
		
	}
	
	function setCartInfo( $quantity=0, $id="cart_sumary")
	{
		echo "<script language=javascript> document.getElementById('$id').innerHTML =$quantity; </script>";
	}

}
?>