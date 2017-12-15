<?php
$ac= getIndex("ac");
if ($ac=="add")
		{
			$quantity = getIndex("quantity", 1);
			$id = getIndex("id");
			$cart->add($id, $quantity);
			exit;
		}
		//Biến $cart được tạo từ trang chủ index.php
if ($ac=="del")
		{
			$quantity = getIndex("quantity", 1);
			$id = getIndex("id");
			$cart->remove($id);
		}
if ($ac=="minus")
		{
			$quantity = getIndex("quantity", 1);
			$id = getIndex("id");
			$cart->minus($id, $quantity);
			exit;
		}