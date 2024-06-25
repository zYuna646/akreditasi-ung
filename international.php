<?php include 'header.php'; ?>

<?php 
// koneksi database
include 'koneksi.php'; 
?>

<div class="container-fluid">
	<div class="alert alert-info text-center container-fluid">
		<h4 style="margin-bottom: 0px"><b>Portal Data Akreditasi Program Studi UNG</b></h4>			
	</div>

	<div class="container-fluid">
		<div class="panel">
			<div class="panel-heading">
				<h4>Rekap Akreditasi Internasional</h4>
			</div>
			<div class="panel-body">
				
				<div class="row">
					<div class="col-md-3">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h1>
									<i class="glyphicon glyphicon-education"></i> 
									<span class="pull-right">
										
										<?php 
										$unggul = mysqli_query($koneksi,"select * from tb_akreditasi where akre_status='9'");
										echo mysqli_num_rows($unggul);
										?>
									</span>
								</h1>
								Terakreditasi FIBAA
							</div>						
						</div>				
					</div>		


					<!-- <div class="col-md-3">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h1>
									<i class="glyphicon glyphicon-education"></i> 
									<span class="pull-right">
										
										<?php 
										$baiksekali = mysqli_query($koneksi,"select * from tb_akreditasi where akre_status='2'");
										echo mysqli_num_rows($baiksekali);
										?>
									</span>
								</h1>
								Terakreditasi BAIK SEKALI
							</div>						
						</div>				
					</div>		

					<div class="col-md-3">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h1>
									<i class="glyphicon glyphicon-education"></i> 
									<span class="pull-right">
										
										<?php 
										$baik = mysqli_query($koneksi,"select * from tb_akreditasi where akre_status='3'");
										echo mysqli_num_rows($baik);
										?>
									</span>
								</h1>
								Terakreditasi BAIK
							</div>						
						</div>				
					</div>				

					<div class="col-md-3">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h1>
									<i class="glyphicon glyphicon-education"></i> 
									<span class="pull-right">
										
										<?php 
										$akreA = mysqli_query($koneksi,"select * from tb_akreditasi where akre_status='4'");
										echo mysqli_num_rows($akreA);
										?>
									</span>
								</h1>
								Terakreditasi A
							</div>						
						</div>				
					</div>	
					
					<div class="col-md-3">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h1>
									<i class="glyphicon glyphicon-education"></i> 
									<span class="pull-right">
										
										<?php 
										$akreB = mysqli_query($koneksi,"select * from tb_akreditasi where akre_status='5'");
										echo mysqli_num_rows($akreB);
										?>
									</span>
								</h1>
								Terakreditasi B
							</div>						
						</div>				
					</div>		

					<div class="col-md-3">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h1>
									<i class="glyphicon glyphicon-education"></i> 
									<span class="pull-right">
										
										<?php 
										$akreC = mysqli_query($koneksi,"select * from tb_akreditasi where akre_status='6'");
										echo mysqli_num_rows($akreC);
										?>
									</span>
								</h1>
								Terakreditasi C
							</div>						
						</div>				
					</div>		

					<div class="col-md-3">
						<div class="panel panel-warning">
							<div class="panel-heading">
								<h1>
									<i class="glyphicon glyphicon-education"></i> 
									<span class="pull-right">
										
										<?php 
										$belum = mysqli_query($koneksi,"select * from tb_akreditasi where akre_status='8'");
										echo mysqli_num_rows($belum);
										?>
									</span>
								</h1>
								Proses Reakreditasi
							</div>						
						</div>				
					</div>				

					<div class="col-md-3">
						<div class="panel panel-warning">
							<div class="panel-heading">
								<h1>
									<i class="glyphicon glyphicon-education"></i> 
									<span class="pull-right">
										
										<?php 
										$baru = mysqli_query($koneksi,"select * from tb_akreditasi where akre_status='7'");
										echo mysqli_num_rows($baru);
										?>
									</span>
								</h1>
								Prodi Baru
							</div>						
						</div>				
					</div>	 -->

				</div>		

			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="panel">
			<div class="panel-heading">
				<h4>Riwayat Akreditasi Internasional Program Studi</h4>
			</div>
			<div class="panel-body">
				<table id="table" class="table table-bordered table-striped table-hover table-datatable">
					<thead>	
						<tr>
							<th width="1%">No</th>
							<th>Fakultas</th>
							<th>Jenjang</th>
							<th>Prodi</th>
							<th>Terakreditasi</th>
							<th>Lembaga Akreditasi</th>
							<th>Tanggal Akreditasi</th>
							<th>Tanggal Kadaluwarsa</th>
							<th>Batas Berlaku</th>
							<th>File Sertifikat Akreditasi</th>									
						</tr>
					</thead>
					<tbody>
						<?php 				
						$data = mysqli_query($koneksi, "select * from tb_akreditasi, tb_fakultas, tb_jenjang, tb_prodi, tb_statusakre, tb_lembaga where akre_fakultas=fakultas_id && akre_jenjang=jenjang_id && akre_prodi=prodi_id && akre_status = status_id && akre_lembaga=lembaga_id && akre_kategori ='2'");
						$no = 1;
						// mengubah data ke array dan menampilkannya dengan perulangan while
						while($d=mysqli_fetch_array($data)){
							$tgltoday = date ('Y-m-d');
							$tgl1 = new DateTime($tgltoday);
							$tgl2 = new DateTime($d['akre_tglakhir']);
							$jarak = $tgl1->diff($tgl2);
							$expired = $tgl1>=$tgl2;
							?>
							
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $d['fakultas_alias']; ?></td>
								<td><?php echo $d['jenjang_alias']; ?></td>
								<td><?php echo $d['prodi_nama']; ?></td>
								<td><?php echo $d['status_nama']; ?></td>
								<td><?php echo $d['lembaga_alias']; ?></td>
								<td><?php echo $d['akre_tglmulai']; ?></td>
								<td><?php echo $d['akre_tglakhir']; ?></td>

								<td>
								<php if ($expired == TRUE) { ?>
								<?php echo "EXPIRED"?>
								<php}else{ ?>
								<?php echo $jarak->days; ?> Hari
								<php }?>
								</td>

								<td><a target="_blank" href="<?php echo $d['akre_link']; ?>" class="btn btn-default"><i class="fa fa-search"></i> Download FILE</a></td>
							</tr>
							<?php 
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>	


</div>

<?php include 'footer.php'; ?>