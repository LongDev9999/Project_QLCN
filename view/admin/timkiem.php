

<?php 
/*echo "<pre>";
print_r($ketqua);
*/
echo " Kết Quả Tìm Kiếm Cho Từ Khóa :  ".$key;
 ?>

 <div align="center">


	<table border="1">
		<thead>
			
			<th>ID CN</th>
			<th>Tên CN</th>
			<th>Mã CN</th>
			<th>Quê Quán</th>
			<th>Giới tính</th>
			<th>Ngày sinh</th>
			<th>Mã Xưởng SX</th>
			<th>Level</th>
		
	
			

		</thead>
		<tbody>
			<?php 
				foreach ($ketqua as $cot) 
				{		
			 ?>
				<tr>
					
					<td><?php echo $cot->ID_CN; ?></td>
					<td><?php echo $cot->tencn; ?></td>

					<td><?php echo $cot->macn; ?></td>
					<td><?php echo $cot->quequan; ?></td>

					<td><?php echo $cot->gioitinh; ?></td>
					<td><?php echo $cot->namsinh; ?></td>
					<td><?php echo $cot->ma_xuongSX; ?></td>
					<td><?php echo $cot->level; ?></td>

				
				
				</tr>
				
		<?php } ?>
		</tbody>
	</table>
	
</div>