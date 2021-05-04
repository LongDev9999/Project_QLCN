<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng Nhập SAMSUNG</title>
	<style>
		.tong
		{
			border: 4px solid green;
			width: 400px;
			height: 200px;
			position: relative;
			left: 470px;
		}
		.nutdn
		{
			position: relative;
		    left: 36px;
		    top: 20px;
		    /* display: block; */
		    width: 169px;
		    height: 25px;
		    border: none;
		    border-radius: 10px;
		    text-align: center;
		    color: #ffffff;
		    font-size: 13px;
		    background-color: #e8171f;
		}
	</style>
</head>
<body>
	
	
<div align="center" class="tong">
	<h3>SAMSUNG THÁI NGUYÊN LOGIN</h3>
	<form action="" method="POST">
	

	Username:<input type="text" name="tendn"><br><br>
	Mật Khẩu:<input type="Password" name="matkhau"><br>
	<input type="submit" name="dangnhap" value="Đăng Nhập" class="nutdn">

</form>


</div>

</body>
</html>



<?php 

if (isset($thongbao)) 
{
	//echo $thongbao;
	echo "<p style='color: red' align='center'>$thongbao </p>";
}

 ?>



