<?php
class Monan extends Db
{
	function getAll()
	{
		return $this->query("select * from monan");	
	}
	
	function search($ten)
	{
		/*$arr = array("%$ten%");
		$sql ="select * from sach where tensach like ? ";
		*/
		$arr = array(":T"=> "%$ten%");
		$sql ="select * from monan where TenMonan like :T ";
		
		return $this->query($sql, $arr);	
	}
	function insert()
	{
		
	}
	
}