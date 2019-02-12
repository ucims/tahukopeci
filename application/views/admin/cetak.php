<style type="text/css">
	table {
		align: center;
		padding: 10 10 10 10;
		width: 90%;
		text-align: center;		
	}
	th {
		background-color: #4CAF50;
    	color: white;
    	border: 1 ;
	}

	td {
		border: 1;
		background: #f5f5f5;
	}

	h2, h3, h4 {
		align : center;
	}

	tr:hover {background-color: #f5f5f5;}
</style>

<div class="col-md-12 col-sm-12 col-xs-12">
<h3 align="center">Laporan Data Peramalan Bahan Baku Kedelai</h3>	
<h2 align="center">Resto Tahu Kopeci (Koperasi Pemuda Cikentrungan)</h2>
<hr>
<br>
<br>
	<div>
	 	<table>
			<thead>
				<tr>					
					<th>Tahun</th>
					<th>Bulan</th>
					<th>Data bahan baku</th>
					<th>Data Hasil Peramalan</th>					
				</tr>
			</thead>
				
			<?php 
			foreach ($bahan as $key => $value) 
			{
				
			?>
			<tbody>								
				<tr>					
					<td><?php echo $value['tahun']; ?></td>
					<td><?php echo bulan($value['bulan']);?></td>
					<td><?php echo $value['data_rill']." Kg";?></td>
					<td><?php echo $value['data_peramalan']." Kg";?></td>					
				</tr>
			</tbody>
			<?php
				
			}
			?>				
			
		</table>
	</div>
</div>
