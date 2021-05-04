<?php 

if (isset($_GET['action'])) {
	$action=$_GET['action'];
}
else
{
	$action=NULL;
}


session_start();

switch ($action) {

	case 'QLxuong':
		if (isset($_SESSION['username'])&&isset($_SESSION['password'])) 
		{
		//Neu da dang nhap-->SET QUYEN
			if ($_SESSION['quyen']==1) 
			{
				//ADMIN
				//$user=Database::laydulieuSQL("SELECT *FROM congnhan INNER JOIN xuong_san_xuat WHERE congnhan.ma_xuongSX=xuong_san_xuat.ma_xuongSX");

			$user=Database::GetAllData("xuong_san_xuat");
			/*echo "<pre>";
			print_r($user);*/
			require_once("view/admin/qlxuongsx.php");
				
				
			}
			if ($_SESSION['quyen']==0) 
			{
				//USER
				echo "Bạn Không Có Quyền Admin !!";
			}
		}
		else
		{//Neu chua dang nhap--->thong bao
			echo "Bạn chưa Đăng Nhập !! <br>";
			echo "<a href='index.php?controller=congnhan&action=dangnhap'>Đăng Nhập</a>";
		}

		break;

	case 'add':

		if (isset($_SESSION['username'])&&isset($_SESSION['password'])) 
		{
			//Neu da dang nhap-->SET QUYEN
			if ($_SESSION['quyen']==1) 
			{
			
			
				//ADMIN
				if (isset($_POST['them_xuong'])) 
				{
					$tenxuong=$_POST['tenxuong'];
					$maxuong=$_POST['maxuong'];


					if(Database::ThemXuong("xuong_san_xuat",$tenxuong,$maxuong))
					{
						echo '<script>alert("Thêm thông tin Xưởng thành công");
							window.location="index.php?controller=xuongsx&action=QLxuong" </script>';
					}

				}
			
			require_once 'view/admin/themxuong.php';
			}
			if ($_SESSION['quyen']==0) 
			{
				//USER
				echo "Bạn Không Có Quyền Admin !!";
			}
		}
		else
		{//Neu chua dang nhap--->thong bao
			echo "Bạn chưa Đăng Nhập !! <br>";
			echo "<a href='index.php?controller=congnhan&action=dangnhap'>Đăng Nhập</a>";
		}

		break;

	case 'edit':

		if (isset($_SESSION['username'])&&isset($_SESSION['password'])) 
		{
			//Neu da dang nhap-->SET QUYEN
			if ($_SESSION['quyen']==1) 
			{
				//ADMIN
			
				$idxuong=$_GET['id'];
				echo "id la:".$idxuong;
				if (isset($_POST['sua_xuong'])) 
				{
					$tenxuong=$_POST['tenxuong'];
					$maxuong=$_POST['maxuong'];


					if(Database::SuaXuong("xuong_san_xuat",$idxuong,$tenxuong,$maxuong))
					{
						echo '<script>alert("Sửa thông tin Xưởng thành công");
							window.location="index.php?controller=xuongsx&action=QLxuong" </script>';
					}
					else
					{
						echo "sửa không được";
					}

				}
			$user=Database::GetDataIDXUONG("xuong_san_xuat",$idxuong);
			require_once 'view/admin/editxuong.php';
				
			}
			if ($_SESSION['quyen']==0) 
			{
				//USER
				echo "Bạn Không Có Quyền Admin !!";
			}
		}
		else
		{//Neu chua dang nhap--->thong bao
			echo "Bạn chưa Đăng Nhập  !! <br>";
			echo "<a href='index.php?controller=congnhan&action=dangnhap'>Đăng Nhập</a>";
		}

		break;
	
	case 'xoa':

		if (isset($_SESSION['username'])&&isset($_SESSION['password'])) 
		{
			//Neu da dang nhap-->SET QUYEN
			if ($_SESSION['quyen']==1) 
			{
				//ADMIN
				echo "day la trang xoa XUONG SX";
				$id=$_GET['id'];
				echo "<br> id la:".$id;

				if (Database::XoaXuong("xuong_san_xuat",$id)) 
				{
					echo '<script>alert("Xóa thông tin Xưởng thành công");
							window.location="index.php?controller=xuongsx&action=QLxuong" </script>';
				}
				
			}
			if ($_SESSION['quyen']==0) 
			{
				//USER
				echo "Bạn Không Có Quyền Admin !!";
			}
		}
		else
		{//Neu chua dang nhap--->thong bao
			echo "Bạn chưa Đăng Nhập !! <br>";
			echo "<a href='index.php?controller=congnhan&action=dangnhap'>Đăng Nhập</a>";
		}

		break;

	default:
		echo "Trang Web Không Tồn Tại !";
		break;
}

?>