<?php
class Db
{
	private $_numRow;
	protected $data, $conn;
	
	function __construct()
	{
		$dsn = "mysql:host=" .HOST."; dbname=". DB;
		try
		{
		$this->conn = new PDO( $dsn, USER, PASS);
		$this->conn->query("set names 'utf8' ");	
		}
		catch(Exception $e)
		{
		   echo 'Lỗi: '. $e->getMessage();
		   exit;
		}
		
	}
	public function __destruct()
		{
			$this->conn= null;
		}
	
	public function getRowCount()
		{
			return $this->_numRow;	
		}
		
	private function queryDH($sql, $arr = array(), $mode = PDO::FETCH_ASSOC)
		{
			$stm = $this->conn->prepare($sql);
			if (!$stm->execute( $arr)) 
				{
				echo "Sql lỗi."; exit;	
				}
			$this->_numRow = $stm->rowCount();
			return $stm->fetchAll($mode);
			
		}
		/*
		Sử dụng cho các sql select
		*/
	public function exeQuery($sql,  $arr = array(), $mode = PDO::FETCH_ASSOC)
		{
			return $this->queryDH($sql, $arr, $mode);	
		}
		/*
		Sử dụng cho các sql cập nhật dữ liệu. Kết quả trả về số dòng bị tác động
		*/
	public function exeNoneQuery($sql,  $arr = array(), $mode = PDO::FETCH_ASSOC)
		{
			$this->queryDH($sql, $arr, $mode);	
			return $this->getRowCount();
		}
	
	
	public function query($sql, $arr=array())
	{
		$stm = $this->conn->prepare($sql);
		$stm->execute($arr);
		$this->data = $stm->fetchAll(PDO::FETCH_ASSOC);
		return $this->data;	
	}
	public function queryput($sql,$ten, $arr=array())
	{
		$stm = $this->conn->prepare($sql);
		$stm->bindValue(":ten","%$ten%");
		$stm->execute();
		$this->data = $stm->fetchAll(PDO::FETCH_ASSOC);
		return $this->data;	
	}
	
	public function queryUser($sql,$ma, $arr=array())
	{
		$stm = $this->conn->prepare($sql);
		$stm->bindValue(":ma","%$ma%");
		$stm->execute();
		$this->data = $stm->fetchAll(PDO::FETCH_ASSOC);
		return $this->data;	
	}
	public function queryLogin($email,$password, $arr=array())
	{
		$sql = "select * from nguoidung where Email = :email and Matkhau = :password";
		$stm = $this->conn->prepare($sql);
		$stm ->bindValue(":email",$email,PDO::PARAM_STR);
		$stm ->bindValue(":password",$password,PDO::PARAM_STR);
		$stm->execute();
		$this->data = $stm->fetchAll(PDO::FETCH_ASSOC);
		return $this->data;	
	}
	public function querySignUp($name,$email,$password,$ngaysinh,$gioitinh,$phone,$diachi,$arr=array())
	{
		$sql = "INSERT INTO nguoidung (TenNguoidung, Matkhau, Ngaysinh, Gioitinh, Sodienthoai, Diachi, Email, Diem, MaLoaiNguoidung)
				VALUES (:name,:password,:ngaysinh,:gioitinh,:phone,:diachi,:email,0,'nm')";
		$stm = $this->conn->prepare($sql);
		$arr = array(":name"=> $name,":password" =>$password,":email"=> $email,":ngaysinh" =>$ngaysinh,":gioitinh"=> $gioitinh,":phone" =>$phone,":diachi"=> $diachi);
		$stm->execute($arr);
		$this->data = $stm->fetchAll(PDO::FETCH_ASSOC);
		return $this->data;	
	}
	public function queryaddMA($ma,$ten,$gia,$ct,$ha,$maloai=array())
	{
		$sql = "INSERT INTO monan (MaMonan, TenMonan, Giatien, Chitiet, Hinhanh, MaLoaiMonan)
				VALUES (:ma,:ten,:gia,:chitiet,:hinh,:maloai)";
		$stm = $this->conn->prepare($sql);
		$arr = array(":ma"=> $ma,":ten" =>$ten,":gia"=> $gia,":chitiet" =>$ct,":hinh"=> $ha,":maloai" =>$maloai);
		$stm->execute($arr);
		$this->data = $stm->fetchAll(PDO::FETCH_ASSOC);
		return $this->data;	
	}

	
}