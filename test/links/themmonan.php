<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	include "../config.php";
	include "../autoload.php";
	$loai = new Db();
	
	function postIndex($index, $value="")
{
	if (!isset($_POST[$index]))	return $value;
	return $_POST[$index];
}

	$ma 	= postIndex("mamonan");
	$ten 	= postIndex("tenmon");
	$gt 	= postIndex("giatien");
	$ct 	= postIndex("chitiet");
	$maloai   = postIndex("maloai");
	
	if(isset($_POST["them"]))
	{
		//$sql_them="insert into category(cat_id,cat_name) values ('$ma','$ten')";
		$sql_them="insert into category(cat_id,cat_name) values (:vt1,:vt2)";
		$o3= $o->query($sql_them);
		$o2=$o->prepare($sql_them);
		$arr = array(":vt1"=> $ma,":vt2" =>$ten);
		$o2->execute($arr);
	

	}
	header("location:qlmonan.php");
	?>
</body>
</html>