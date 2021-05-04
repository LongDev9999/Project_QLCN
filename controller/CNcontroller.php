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

	case 'dangnhap':
		# code...neu nguoi dung chua dang nhap-->dang nhap-->Gan Gia tri cho SESSION-->chuyen huong đến Lấy Quyền
		# neu nguoi dung dang nhap roi--->chuyen huong den ==>lấy Quyền
		if (!isset($_SESSION['username'])&&!isset($_SESSION['password'])) 
		{
			
		
			if (isset($_POST['dangnhap'])) 
				{
					//neu nguoi dung bam vao DN-->lay DL nguoi dung nhap vao-->gan vao bien 
					$username=$_POST['tendn'];

					$pass=$_POST['matkhau'];

					//goi ham XU LY dang nhap,truyen bien vao de XU LY
					
					if (Database::checkDangNhap("taikhoan",$username,$pass)==True) {
						
							//neu dang nhap thanh cong-->luu lai phien dang nhap
						
						//$user=Database::GetDataUSER("congnhan",$username,$pass);

												
						$_SESSION['username']=$username;
						$_SESSION['password']=$pass;
					/*
					echo "session User la:".$_SESSION['username'];
					echo "<br>session password:".$_SESSION['password'];
					*/


						//require_once('view/infor.php');
						//header('location:view/admin.php');
						header('location:index.php?controller=congnhan&action=layquyen');
					}
					else
					{
						$thongbao="Sai Tên Tài Khoản hoặc Mật Khẩu !! hãy Nhập lại";
						
					}
				}
			
		}
		else
		{
			//neu da dang nhap roi
			header('location:index.php?controller=congnhan&action=layquyen');
		}

		require_once("view/login.php");
		break;


	case 'layquyen':
			//echo "session la:".$_SESSION['username'];
			//echo "<br>session password:".$_SESSION['password'];
			if (isset($_SESSION['username'])&&isset($_SESSION['password']))
			{
					# code...
					//TA SE TAN DUNG SESSION SAU KHI DA LUU GIA TRI XONG, TA SE GAN CHO BIEN
					//TU BIEN-->VAO MODEL DE XU LY ,lay DL theo username va PASS-->In ra
				$username=$_SESSION['username'];
				$pass=$_SESSION['password'];
				/*
				echo($username);
				echo "<br>";
				echo($pass);
				*/
				$DL=Database::GetDataUSER("taikhoan",$username,$pass);
			
				//echo "<br>quyền là:".$user->quyen ;

				//sau khi lay dc TT user thanh cong,ta se gan gia tri cho SESSION[quyen];
				$_SESSION['quyen']=$DL->quyen ;
				$_SESSION['id']=$DL->ID_CN;
			/*
				echo "<br>quyền cua bạn là:".$_SESSION['quyen'] ;
				echo "<br>ID cua bạn là:".$_SESSION['id'] ;
				
				echo "<br><a href='view/logout.php'>Logout</a>";
			*/

				if ($_SESSION['quyen']==1) {
					//ADMIN
					header('location:http://localhost/hocphp/Baocao/QLCN/view/admin/admin.php');
				}
				if ($_SESSION['quyen']==0) {
					//USER
					header('location:http://localhost/hocphp/Baocao/QLCN/view/user/user.php');
				}
			}
			else
			{
						header("location:index.php?controller=congnhan&action=dangnhap");
			}
			
			//require_once("view/infor.php");

			break;


	case 'list':
		if (isset($_SESSION['username'])&&isset($_SESSION['password'])) 
		{
			//Neu da dang nhap-->SET QUYEN
			if ($_SESSION['quyen']==1) 
			{
				//ADMIN
					
			$user=Database::laydulieuSQL("SELECT *FROM congnhan INNER JOIN taikhoan WHERE congnhan.ID_CN=taikhoan.ID_CN");
			//$TongsoCN=Database::Demsohang("congnhan");

			//$xuong=Database::laydulieuSQL("SELECT *FROM xuong_san_xuat");
			require_once("view/admin/list.php");
				
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
				if (isset($_POST['them_cn'])) 
				{
					$level=$_POST['level'];
					$idCN=$_POST['idCN'];
					$tencn=$_POST['tenCN'];
					$macn=$_POST['maCN'];
					$tenDN=$_POST['tendn'];
					$matkhau=$_POST['pass'];
					$gioitinh=$_POST['gt'];
					$maphong=$_POST['maP'];
					$quequan=$_POST['quequan'];

					$date=new DateTime($_POST['ns']);
					$ns=$date->format("Y/m/d");

					
					if ($level==1) {
						$phucap=200000;
					}
					if ($level==2) {
						$phucap=500000;
					}
					if ($level==3) {
						$phucap=900000;
					}



					if(Database::ThemCN("congnhan",$idCN,$tencn,$macn,$tenDN,$matkhau,$gioitinh,$maphong,$quequan,$ns,$level)&& Database::ThemCNvaoLuong("luong_congnhan",$idCN,$tencn,$macn,$level,$phucap) && Database::ThemTaiKhoan("taikhoan",$idCN,$tenDN,$matkhau))
					{
						echo '<script>alert("Thêm thông tin Công Nhân thành công");
							window.location="index.php?controller=congnhan&action=list" </script>';
					}
				
					else
					{
						echo "<p style='color: red;text-align: center;''>ID vừa nhập ĐÃ CÓ người dùng,hãy nhập ID KHÁC !!</p>
						
						";
					}

				}
				$xuong=Database::GetAllData("xuong_san_xuat");
				require_once("view/admin/them.php");
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
				$id=$_GET['id'];// B2:Lấy ID của CN cần sửa-->để lấy DL cũ của CN xuất ra -->rồi sửa
				
				//B4: Khi Admin Bấm vào sửa CN -->Lấy DL từ form-->gán vào biến-->gọi hàm xử lý
				if (isset($_POST['sua_cn'])) 
				{
					
					$idCN=$_POST['idCN'];
					$tencn=$_POST['tenCN'];
					$macn=$_POST['maCN'];
					$tenDN=$_POST['tendn'];
					$matkhau=$_POST['pass'];
					$gioitinh=$_POST['gt'];
					$maphong=$_POST['maP'];
					$quequan=$_POST['quequan'];

					$date=new DateTime($_POST['ns']);
					$ns=$date->format("Y/m/d");

					$level=$_POST['level'];

					if ($level==1) {
						$phucap=200000;
					}
					if ($level==2) {
						$phucap=500000;
					}
					if ($level==3) {
						$phucap=900000;
					}

					Database::SuaTaiKhoan("taikhoan",$id,$tenDN,$matkhau);

					if(Database::SuaCN("congnhan",$id,$idCN,$tencn,$macn,$gioitinh,$maphong,$quequan,$ns,$level) && Database::SuaCNvaoLuong("luong_congnhan",$id,$idCN,$tencn,$macn,$level,$phucap))
					{
						echo '<script>alert("Bạn Đã Sửa thông tin Công Nhân thành công");
							window.location="index.php?controller=congnhan&action=list" </script>';
					}
					else
					{
						/*
						echo "id la:" .$id;
						echo "<br>id moi la:".$idCN;
						*/
						echo "<p style='text-align: center;color: red;'>ID vừa nhập ĐÃ TỒN TẠI trong CSDL . Hãy Nhập ID Khác !!</p>";

					}

				}
				$user=Database::GetDataID("congnhan",$id);//B3: Lấy DL Cũ trong CSDL theo ID để cho vào form sửa 
				$tk=Database::GetTK_ID("taikhoan",$id);
				/*echo "<pre>";
				print_r($tk);
				echo "</pre>";*/
				$xuong=Database::GetAllData("xuong_san_xuat");
				require_once('view/admin/edit.php');//B1 Gọi ra form sửa CN
				
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


	case 'delete':

		if (isset($_SESSION['username'])&&isset($_SESSION['password'])) 
		{
			//Neu da dang nhap-->SET QUYEN
			if ($_SESSION['quyen']==1) 
			{
					//ADMIN
				$id=$_GET['id'];
					//echo "id la:".$id;
			
				if(Database::XoaCN("congnhan",$id)&& Database::XoaCN("luong_congnhan",$id)
				&& Database::XoaCN("taikhoan",$id))
				{
				echo ' <script>
						 	alert("Đã Xóa Thông tin Công Nhân THÀNH CÔNG !");
						 	window.location="index.php?controller=congnhan&action=list";
					   </script>';
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
	case 'modeuser':

		if (isset($_SESSION['username'])&&isset($_SESSION['password'])) 
		{
			//Neu da dang nhap-->SET QUYEN
			if ($_SESSION['quyen']==1) 
			{
				//ADMIN
				
				# code...giống hệt thằng EDIT
				// B2:Lấy ID của đối tượng cần sửa Tu duong dan-->để lấy DL cũ của đối tượng xuất ra -->rồi sửa
				$id=$_GET['id'];
				//B3: lấy DL theo ID của đối tượng
				$user=Database::GetDataID("congnhan",$id);
				$tk=Database::GetTK_ID("taikhoan",$id);

				//B4:đồng bộ bảng CSDL(ma_vitri) 
				/*echo "<pre>";
				print_r($user);
				echo "</pre>";*/
				require_once('view/admin/TTCN.php');
				
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
	
	case 'tim-kiem':
		//echo "day la case tim kiem";
		if (isset($_GET['tukhoa'])) 
		{
			$key=$_GET['tukhoa'];
			$ketqua=Database::TimKiem("congnhan",$key);
			

		}
		require_once("view/admin/timkiem.php");
		break;

	case 'Thongtinuser':
		//echo "session la:".$_SESSION['username'];
		//echo "<br>session password:".$_SESSION['password'];
		if (isset($_SESSION['username'])&&isset($_SESSION['password']))
		 {
		 	//include 'view/user.php';
		 	require_once("view/user/userheader.php");
	
			//TA SE TAN DUNG SESSION[id] ĐÃ CÓ Gia trị , Gán vào biến
			//TU BIEN-->VAO MODEL DE XU LY ,lay DL theo ID-->In ra

		$id=$_SESSION['id'];
		//echo "ID LA :".$id;		
		$user=Database::GetDataID("congnhan",$id);
		$tk=Database::GetTK_ID("taikhoan",$id);	
		require_once("view/user/inforCN.php");

		}
		else
		{
			echo "Bạn chưa Đăng Nhập !! <br>";
			echo "<a href='index.php?controller=congnhan&action=dangnhap'>Đăng Nhập</a>";
				
		}
		

		break;
	
	case 'xemluonguser':
		//echo "session la:".$_SESSION['username'];
		//echo "<br>session password:".$_SESSION['password'];
		if (isset($_SESSION['username'])&&isset($_SESSION['password']))
		 {
		 	//include 'view/user.php';
		 	require_once("view/user/userheader.php");
	
			//TA SE TAN DUNG SESSION SAU KHI DA LUU GIA TRI XONG, TA SE GAN CHO BIEN
			//TU BIEN-->VAO MODEL DE XU LY ,lay DL theo username va PASS-->In ra

		$id=$_SESSION['id'];
		//echo "id la:".$id;
		$dataluongCN=Database::GetLuongcnID("luong_congnhan",$id);
		/*echo "<pre>";
		print_r($user);*/

			
		require_once("view/user/luongcn.php");

		}
		else
		{
			echo "Bạn chưa Đăng Nhập !! <br>";
			echo "<a href='index.php?controller=congnhan&action=dangnhap'>Đăng Nhập</a>";
				
		}
		
	

		break;

	case 'quanlyluong':
		if (isset($_SESSION['username'])&&isset($_SESSION['password'])) 
		{
			//Neu da dang nhap-->SET QUYEN
			if ($_SESSION['quyen']==1) 
			{
				//ADMIN
			$dulieu=Database::GetAllData("luong_congnhan");

			//$xuong=Database::laydulieuSQL("SELECT *FROM xuong_san_xuat");
			require_once("view/admin/dsluongcn.php");
				
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

	case 'sualuong':
		if (isset($_SESSION['username'])&&isset($_SESSION['password'])) 
		{
			//Neu da dang nhap-->SET QUYEN
			if ($_SESSION['quyen']==1) 
			{
				//ADMIN
			$id=$_GET['id'];
			//echo "ID la:".$id;
			$user=Database::GetLuongcnID("luong_congnhan",$id);
			
			if (isset($_POST['sua_luong'])) 
			{
				$ngaycong=$_POST['ngaycong'];
				$tamung=$_POST['tamung'];

				//echo "<br>ngay cong la:".$ngaycong;
				//echo "<br>tam ung la:".$tamung;

			
				$pc=$user->phucap;
				$tu=$user->tamung;

				//echo "<br>Phu cap la:".$pc;
				//echo "<br>Tam Ung la:".$tamung;

				$luongthang=($ngaycong*300000)+$pc-$tamung;
				echo "<br>luong thang:".$luongthang;

				if (Database::UpdateCong("luong_congnhan",$id,$ngaycong,$tamung,$luongthang))
				{
					
					echo '<script>alert(" Đã Tính Lương Công Nhân thành công");
							window.location="index.php?controller=congnhan&action=quanlyluong	" </script>';
							
				}

			}
			//$xuong=Database::laydulieuSQL("SELECT *FROM xuong_san_xuat");
			require_once("view/admin/sualuongcn.php");
				
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

