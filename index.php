<?php 	
require_once("model/db.php");
Database::ketnoi();
if (isset($_GET['controller'])) {
	$controller=$_GET['controller'];
}
else
{
	$controller=NULL;
}
switch ($controller) {
	case 'congnhan':
		require_once("controller/CNcontroller.php");
		break;
	case 'xuongsx':
		require_once("controller/XuongSXController.php");
		break;
	default:
		echo "Controller Xử Lý Không Tồn Tại !";
		break;
}


/*
index-->db.php,controller.php
controller-->model,view(lay DL tu view truyen sang Model)
model-->tenbang_trongPHPMyadmin
view-->duong dan tren trinh duyet,dinh huong -->controller
*/

  ?>