<div align="center">

<table>
			<tr>
				<th>Mã CN:</th>
				<td><?php echo $user->macn; ?></td>
			</tr>
			<tr>
				<th>Tên CN:</th>
				<td><?php echo $user->tencn; ?></td>
			</tr>
			<tr>
				<th>Level:</th>
				<td>
					<?php echo $user->level; ?>
				</td>
			</tr>
			<tr>
				<th>Phụ Cấp:</th>
				<td><?php echo $user->phucap ?></td>
			</tr>

</table>


	<table border="1">
		<form action="" method="POST">
			<tr>
				<th>Ngày Công:</th>
				<td><input type="number" name="ngaycong" value="<?php echo $user->ngaycong ?>"></td>
			</tr>

	
			<tr>
				<th>Tạm ứng:</th>
				<td><input type="number" name="tamung" value="<?php echo $user->tamung ?>"></td>
			</tr>

			<tr>
				<td></td>
				<td align="right">
					<button name="sua_luong" type="submit">Chấm Công & Lương</button>
					<button type="reset">Reset</button>
				</td>
			</tr>
		</form>
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