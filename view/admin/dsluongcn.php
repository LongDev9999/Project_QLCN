<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản Lý Lương CN</title>
</head>
<body>
	<a href="http://localhost/hocphp/Baocao/QLCN/view/admin/admin.php">Quay lại Trang Admin</a>
	<div align="center">
		
		<table border="1">
			<tr>
				<th colspan="10">Bảng Lương Công Nhân Tháng 7/2020</th>
			</tr>
			<tr>
				<th>ID Công Nhân</th>
				<th>Mã CN</th>
				<th>Tên Công Nhân</th>
				<th>Level</th>
				<th>Lương /1 ngày</th>
				<th>Phụ cấp(Theo Level)</th>
				<th>Ngày Công</th>
			
				
				<th>Tạm Ứng</th>
				<th>Lương tháng</th>
				
				<th>Thao Tác(ADMIN)</th>
			</tr>
			<tr>
				<?php 
					foreach ($dulieu as $cn) 
					{	
				 ?>
				<tr>
					<td><?php echo $cn->ID_CN; ?></td>
					<td><?php echo $cn->macn ?></td>
					<td><?php echo $cn->tencn ?></td>
					<td><?php echo $cn->level; ?></td>
					<td>300.000(VND)</td>
					<td><?php echo $cn->phucap ?></td>
					<td><?php echo $cn->ngaycong ?></td>
			
					
					<td><?php echo $cn->tamung ?></td>
					<td><?php echo $cn->luongthang ?></td>
					

					<td>
						<a href="index.php?controller=congnhan&action=sualuong&id=<?php echo $cn->ID_CN ?>">Chấm Công & Lương</a>
					
					</td>
				</tr>
			<?php } ?>
			</tr>
		</table>
	</div>

<div align="left" style="height: 200px">
		<h4>Ghi Chú:</h4><br>
	1.Lương Tháng=(Số Ngày công*Lương ngày)+ Phụ Cấp(theo Level) - Tạm ứng
	<br>
	2.Lương ngày /1 Công Nhân = 300.000(VND)
	<br>
	3.Phụ cấp theo Level <br>
		+Nếu Level Công Nhân = 1 ==>Phụ cấp=200.000(Đồng)
		<br>
		+Nếu Level Công Nhân = 2 ==>Phụ cấp=500.000(Đồng)
		<br>
		+Nếu Level Công Nhân = 3 ==>Phụ cấp=900.000(Đồng)

</div>




</body>
</html>