<?php 
session_start();
//neu user da dang nhap-->hien TT
//neu chua dang nhap-->ban chua dang nhap
if (isset($_SESSION['username'])&&isset($_SESSION['password'])) {
	if ($_SESSION['quyen']==0) 
	{
		//ĐÚNG LÀ USER
		
		//echo "quyền là: ".$_SESSION['quyen'];
		require_once 'userheader.php';
?>



<?php
echo "Xin chào : " .$_SESSION['username'];

 } ?>

<?php 
}
else
{
	echo "Bạn chưa Đăng Nhập !! <br>";
	echo "<a href='http://localhost/hocphp/Baocao/QLCN/index.php?controller=congnhan&action=dangnhap'>Đăng Nhập</a>";

}

 ?>

