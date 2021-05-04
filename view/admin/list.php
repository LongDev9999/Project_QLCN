<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản Lý Công Nhân</title>
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
		
		<a href="view/admin/admin.php">Quay Lại Trang Chủ Admin</a>
		<br>

		



<br><br>
<form action="" method="GET" class="otimkiem" style="   
    position: relative;
    left: 52px;
    top: 47px;">
	<input type="hidden" name="controller" value="congnhan">
	<table>

			<input type="text" name="tukhoa" placeholder="Nhập Từ Khóa...">
			<input type="submit" value="Tìm Kiếm"
			 style="background-color: #B74724;
		    COLOR: white;
		    border: 1px;
		    height: 30px;">
	</table>
	<input type="hidden" name="action" value="tim-kiem">
</form>

<br>
<div align="center">

	<a href="index.php?controller=congnhan&action=add" style="position: relative;
    bottom: 42px;">Thêm Công Nhân</a>
	<table border="1">
		<tr>
			<th colspan="12" style="text-align: center;">BẢNG DANH SÁCH THÔNG TIN CÔNG NHÂN</th>
		</tr>
		<tr>
			<th>ID Công Nhân</th>
			
			<th>Tên CN</th>
			<th>Mã CN</th>
			<th>Level </th>
			<th>Quê Quán</th>
			<th>Giới tính</th>
			<th>Ngày sinh</th>
			<th>Mã Xưởng  SX</th>
		

			<th>Tên Đăng Nhập</th>
			<th>Password</th>

		
			<th>(ADMIN)THAO TÁC</th>
			

		</tr>
		<tr>
			<?php 
			
				foreach ($user as $row) {
				
				if(($row->quyen)==0)
				{
				
			 ?>
			<tr>
				<td><?php echo $row->ID_CN; ?></td>
				
				<td><?php echo $row->tencn ?></td>

				<td><?php echo $row->macn ?></td>
				<td><?php echo $row->level ?></td>
				<td><?php echo $row->quequan ?></td>

				<td><?php echo $row->gioitinh ?></td>
				<td><?php echo $row->namsinh ?></td>
				<td><?php echo $row->ma_xuongSX ?></td>
				
			
				<td><?php echo $row->username ?></td>
				<td><?php echo $row->password ?></td>

			
			
				<th>
					<a href="index.php?controller=congnhan&action=edit&id=<?php echo   $row->ID_CN ?>"><i class="fa fa-edit"></i>Sửa__  </a>
					<a href="index.php?controller=congnhan&action=delete&id=<?php echo   $row->ID_CN ?>"><i class="fa fa-trash"></i>Xóa__ </a>
					<a href="index.php?controller=congnhan&action=modeuser&id=<?php echo   $row->ID_CN ?>">Xem trước MODE USER</a>
				</th>
			</tr>
		<?php }} ?>
		</tr>
	</table>
</div>


</body>
</html>