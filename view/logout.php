<?php 
	session_start();
	if($_SESSION['username'])
	{
		session_destroy();
		header("location: ../index.php?controller=congnhan&action=dangnhap");
		
	}
	else
	{
		header("location:../index.php?controller=congnhan&action=dangnhap");
	}

 ?>