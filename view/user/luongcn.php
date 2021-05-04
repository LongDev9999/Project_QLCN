<div align="center">
<br><br>
<h2>Bảng thông tin Ngày công & Lương Công Nhân tháng 7/2020</h2>
<table border="1">
			<tr>
				<th>ID CN:</th>
				<td><?php echo $dataluongCN->ID_CN; ?></td>
			</tr>
			<tr>
				<th>Mã CN:</th>
				<td><?php echo $dataluongCN->macn; ?></td>
			</tr>
			<tr>
				<th>Tên CN:</th>
				<td><?php echo $dataluongCN->tencn; ?></td>
			</tr>
			<tr>
				<th>Level:</th>
				<td>
					<?php echo $dataluongCN->level; ?>
				</td>
			</tr>
			<tr>
				<th>Ngày Công:</th>
				<td><?php echo $dataluongCN->ngaycong; ?></td>
			</tr>	
				<tr>
				<th>Phụ Cấp:</th>
				<td><?php echo $dataluongCN->phucap; ?></td>
			</tr>		
			<tr>
				<th>Tạm Ứng:</th>
				<td><?php echo $dataluongCN->tamung; ?></td>
			</tr>
			<tr>
				<th>Lương Tháng:</th>
				<td><?php echo $dataluongCN->luongthang; ?></td>
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