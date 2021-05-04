
<div align="center">

	 <a href="index.php?controller=congnhan&action=list">Xem Danh sách công nhân</a>
	<table class="table" border="1">
		<form method="post" enctype="" action="#"name="them">
			<tr>
				<th align="right">ID Công Nhân:</th>
				<td><input type="number" name="idCN" ></td>
			</tr>
			<tr>
				<th align="right">Mã Công Nhân:</th>
				<td><input type="text" name="maCN" ></td>
			</tr>
			<tr>
				<td align="">Tên Công Nhân:</td>
				<td><input type="text" name="tenCN" required></td>
			</tr>
			<tr>
				<td align="">Level:</td>
				<td>
					<select name="level">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
					</select>
				</td>
			</tr>
			<tr>
				<td align="">Quê quán:</td>
				<td><input type="text" name="quequan" required></td>
			</tr>
			
			<tr>
				<td align="right">Mã Xưởng SX:</td>
				<td>
				<select name="maP">
					<?php 
						foreach ($xuong as $cot) 
						{
					?>
					<option value="<?php echo $cot->ma_xuongSX ?>"><?php echo $cot->ma_xuongSX;?></option>

				  <?php } ?>
				</select></td>
			</tr>
			<tr>
				<td align="right">Giới tính:</td>
				<td><input type="radio" name="gt"value="Nam" checked/>Nam
				<input type="radio" name="gt"value="Nữ"/>Nữ</td>
			</tr>
			<tr>
				<td align="right">Ngày sinh:</td>
				<td><input type="date" name="ns" required></td>
			</tr>

			<tr>
				<td align="">Tên đăng nhập:</td>
				<td><input type="text" name="tendn" required></td>
			</tr>
			
			<tr>
				<th align="right">Mật Khẩu:</th>
				<td><input type="text" name="pass" ></td>
			</tr>

			<tr>
				<td></td>
				<td align="right">
					<button name="them_cn" type="submit">Thêm Công Nhân</button>
					<button type="reset">Reset</button>
				</td>
			</tr>
		</form>
	</table>
</div>
