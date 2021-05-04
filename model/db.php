<?php 
/*
b1:tao class Database-->goi den CSDL(hostname,username,pass,dbname,conn=NULL)
B2:Trong Class Databse-->tao them cac ham()
1.ketnoi()
2.chaylenh()
3.laydulieuSQL();
4.tatcadulieu()
5.GetDataID()
6.ADD()
7.EDIT()
8.DELETE()

 */
	class Database
	{
		public static $hostname="localhost";
		public static $username="root";
		public static $password="";
		public static $dbname="ql_congnhan";
		public static $conn=NULL;

		public function ketnoi()
		{
		self::$conn = new mysqli(self::$hostname,self::$username,self::$password,self::$dbname);
		if (!self::$conn) {
			echo 'Kết nối thất bại';
		}else{
			mysqli_set_charset(self::$conn,'utf8');
		}
		return self::$conn;
		}

		// chay lenh truy van
		public function chaylenh($sql)
		{
		$ketqua=self::$conn->query($sql);
		return $ketqua;
		}

		//Truy van SQL
		public function laydulieuSQL($sql)
			{
				$ketqua=self::chaylenh($sql);
				$data=array();
				if (mysqli_num_rows($ketqua)>0) {
					while ($row=mysqli_fetch_object($ketqua)){
						$data[]=$row;
			}
			}
		return $data;
		}

	public function GetAllData($table)
	{
		$result=self::chaylenh("SELECT * FROM $table");
		$data=array();
		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_object($result)){
				$data[]=$row;
			}
		}
		return $data;
	}

	public function Demsohang($table)
	{
		$result=self::chaylenh("SELECT * FROM $table WHERE quyen=0");
		$dem=mysqli_num_rows($result);
		return $dem;
	}

		// Them TT NV
		public function ThemCN($table,$idCN,$tencn,$macn,$tenDN,$matkhau,$gioitinh,$maphong,$quequan,$ns,$level)
		{
			return self::chaylenh("INSERT INTO $table(ID_CN,macn,tencn,quequan,gioitinh,namsinh,ma_xuongSX,level) VALUES('$idCN','$macn','$tencn','$quequan','$gioitinh','$ns','$maphong','$level')");
		}
		public function ThemTaiKhoan($table,$idCN,$tenDN,$matkhau)
		{
			return self::chaylenh("INSERT INTO $table(ID_CN,username,password) VALUES('$idCN','$tenDN','$matkhau')");
		}

		//Xoa TT NV
		public function XoaCN($table,$id)
		{
			return self::chaylenh("DELETE FROM $table WHERE ID_CN='$id'");
		}


		// sua NV
		public function SuaCN($table,$id,$idCN,$tencn,$macn,$gioitinh,$maphong,$quequan,$ns,$level)
		{
			return self::chaylenh("UPDATE $table SET ID_CN='$idCN', tencn='$tencn',macn='$macn',ma_xuongSX='$maphong',gioitinh='$gioitinh',namsinh='$ns',quequan='$quequan',level='$level' WHERE $table.ID_CN='$id'");
		}
		public function SuaTaiKhoan($table,$id,$tenDN,$matkhau)
		{
			return self::chaylenh("UPDATE $table SET username='$tenDN',password='$matkhau'  WHERE 
			$table.ID_CN='$id'");
		}



		//GET DATA ID
		public function GetDataID($table,$id)
		{
			$result=self::chaylenh("SELECT * FROM $table WHERE ID_CN=$id");
			$data=array();
			if (mysqli_num_rows($result)>0) {
				while ($row=mysqli_fetch_object($result)){
					$data=$row;
				}
			}else{
				$data=array();
			}
			return $data;
		}
		public function GetTK_ID($table,$id)
		{
			$result=self::chaylenh("SELECT * FROM $table WHERE ID_CN=$id");
			$data=array();
			if (mysqli_num_rows($result)>0) {
				while ($row=mysqli_fetch_object($result)){
					$data=$row;
				}
			}else{
				$data=array();
			}
			return $data;
		}


		public function TimKiem($table,$key)
		{
			//Lấy Gía trị tênCN tương ứng với $key nhập vào
			$result=self::chaylenh("SELECT * FROM $table WHERE tencn REGEXP '$key' ORDER BY ID_CN DESC ");
			$data=array();
			if (mysqli_num_rows($result)>0) 
			{
				while ($row=mysqli_fetch_object($result)){
					$data[]=$row;
				}
			}
			return $data;
		}

		public function checkDangNhap($table,$username,$pass)
		{
		 $kq=self::chaylenh("SELECT *FROM $table WHERE username='$username' and password='$pass'");
			if(mysqli_num_rows($kq)>0)
			{
				return true;
			}
			else
			{
				return False;
			}	
		}

		public function GetDataUSER($table,$username,$pass)
		{
			$result=self::chaylenh("SELECT * FROM $table WHERE username='$username' AND password='$pass'");
			$data=array();
			if (mysqli_num_rows($result)>0) {
				while ($row=mysqli_fetch_object($result)){
					$data=$row;

				}
			}else{
				$data=array();
			}
			return $data;
		
		}
		/*XU LY VOI XUONG*/
		public function ThemXuong($table,$tenxuong,$maxuong)
		{
			return self::chaylenh("INSERT INTO $table(ten_xuong,ma_xuongSX) VALUES('$tenxuong','$maxuong')");
		}
		public function SuaXuong($table,$idxuong,$tenxuong,$maxuong)
		{
			return self::chaylenh("UPDATE $table SET ten_xuong='$tenxuong',ma_xuongSX='$maxuong' WHERE id_xuong='$idxuong'");
		}
		public function XoaXuong($table,$id)
		{
			return self::chaylenh("DELETE FROM $table WHERE id_xuong='$id'");
		}

		public function GetDataIDXUONG($table,$idxuong)
		{
			$result=self::chaylenh("SELECT * FROM $table WHERE id_xuong=$idxuong");
			$data=array();
			if (mysqli_num_rows($result)>0) {
				while ($row=mysqli_fetch_object($result)){
					$data=$row;
				}
			}else{
				$data=array();
			}
			return $data;
		}


		/**XU LY LUONG CONG NHAN*/
		public function ThemCNvaoLuong($table,$idCN,$tencn,$macn,$level,$phucap)
		{
			return self::chaylenh("INSERT INTO $table(ID_CN,macn,tencn,level,phucap) VALUES('$idCN','$macn','$tencn','$level','$phucap')");
		}


		public function GetLuongcnID($table,$id)
		{
			$result=self::chaylenh("SELECT * FROM $table WHERE ID_CN=$id");
			$data=array();
			if (mysqli_num_rows($result)>0) {
				while ($row=mysqli_fetch_object($result)){
					$data=$row;
				}
			}else{
				$data=array();
			}
			return $data;
		}

		public function SuaCNvaoLuong($table,$id,$idCN,$tencn,$macn,$level,$phucap)
		{
			return self::chaylenh("UPDATE $table SET ID_CN='$idCN',macn='$macn',tencn='$tencn',level='$level',phucap='$phucap' WHERE ID_CN='$id'");
		}
		public function UpdateCong($table,$id,$ngaycong,$tamung,$luongthang)
		{
			return self::chaylenh("UPDATE $table SET ngaycong='$ngaycong',tamung='$tamung',luongthang='$luongthang' WHERE ID_CN='$id'");
		}

	}
	


 ?>