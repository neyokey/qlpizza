<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	$o = new PDO("mysql:host=localhost; dbname=bookstore","root","");
	$o->query("set names 'utf8'");
	if(isset($_POST))
	{
		$ma=$_POST["ma"];
		$ten=$_POST["ten"];
		$sql="update category set cat_name='$ten' where cat_id='$ma'";
		$o->query($sql);
	}	
	header("location:ketnoidb3.php");
	?>
</body>
</html>