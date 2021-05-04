<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quan Ly Xuong SX</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
	<a href="view/admin/admin.php">Quay Lại Trang Chủ Admin</a>
	<div align="center">
		<a href="index.php?controller=xuongsx&action=add">Thêm Xưởng</a>
		<table border="1">
			<thead>
				<th>STT</th>
				<th>Mã Xưởng SX</th>
				<th>Tên Xưởng SX</th>
				<th>(ADMIN)Hành Động</th>

			</thead>
			<tbody>
				<?php 
					$stt=0;
					foreach ($user as $cot)
					  {
						$stt++; 
				?>
			<tr>

				<td><?php echo $stt; ?></td>
				<td><?php echo $cot->ma_xuongSX; ?></td>
				<td><?php echo $cot->ten_xuong; ?></td>
				<td>
					<a href="index.php?controller=xuongsx&action=edit&id=<?php echo   $cot->id_xuong; ?>"><i class="fa fa-edit"></i>Sửa__  </a>
					<a href="index.php?controller=xuongsx&action=xoa&id=<?php echo   $cot->id_xuong; ?>"><i class="fa fa-trash"></i>Xóa__ </a>
				</td>
			</tr>

				<?php } ?>


			</tbody>
		</table>
	</div>


</body>
</html>