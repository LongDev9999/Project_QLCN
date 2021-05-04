<a href="index.php?controller=congnhan&action=list">Xem Danh sách công nhân</a>
<div align="center">


	<table border="1">
		<thead>
			
			
			<th>Tên CN</th>
			<th>Mã CN</th>
			<th>Quê Quán</th>
			<th>Giới tính</th>
			<th>Ngày sinh</th>
			<th>Mã Xưởng SX</th>
			<th>Tên Đăng Nhập</th>
			<th>Password</th>
	
			

		</thead>
		<tbody>
			<tr>
				
				
				<td><?php echo $user->tencn ?></td>

				<td><?php echo $user->macn ?></td>
				<td><?php echo $user->quequan ?></td>

				<td><?php echo $user->gioitinh ?></td>
				<td><?php echo $user->namsinh ?></td>
				<td><?php echo $user->ma_xuongSX ?></td>
				<td><?php echo $tk->username ?></td>
				<td><?php echo $tk->password ?></td>
			
			
			</tr>
	
		</tbody>
	</table>
	<a href="#">(Công Nhân)Đăng Xuất</a>
</div>