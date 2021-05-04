<div align="center">
	<table border="1">
		<form action="" method="POST">
			<tr >
				<th colspan="2">SỬA THÔNG TIN XƯỞNG</th>
			</tr>
			<tr>
				<th>Mã Xưởng</th>
				<td><input type="text" name="maxuong" value="<?php echo $user->ma_xuongSX ?>"></td>		
			</tr>
			<tr>
				<th>Tên Xưởng</th>
				<td>
						<input type="text" name="tenxuong" value="<?php echo $user->ten_xuong ?>">
				</td>
			</tr>
			
			<tr>
				<td></td>
				<td align="right">
					<button name="sua_xuong" type="submit">Sửa Xưởng</button>
					<button type="reset">Reset</button>
				</td>
			</tr>
		</form>
	</table>
</div>