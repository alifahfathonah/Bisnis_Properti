<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>DATA AGEN | Discovery</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="page.css">	
	
	<script src="js/jquery.min.js"></script>
		<script> 
		$(document).ready(function(){
			$("#flip").click(function(){
				$("#panel").slideToggle("slow");
			});
		});
		</script>
		<script type="text/javascript">
			function pilih_kota(prop)
			{
				$.ajax({
					url: 'http://localhost/Sewa_Rumah/admin/daerah/kota.php',
					data : 'prop='+prop,
					type: "post", 
					dataType: "html",
					timeout: 10000,
					success: function(response){
						$('#dom_kota').html(response);
					}
				});
			}
			function pilih_kec(kota)
			{
				$.ajax({
					url: 'http://localhost/Sewa_Rumah/admin/daerah/kecamatan.php',
					data : 'kota='+kota,
					type: "post", 
					dataType: "html",
					timeout: 10000,
					success: function(response){
						$('#dom_kec').html(response);
					}
				});
			}
			function pilih_kel(kec)
			{
				$.ajax({
					url: 'http://localhost/Sewa_Rumah/admin/daerah/kelurahan.php',
					data : 'kec='+kec,
					type: "post", 
					dataType: "html",
					timeout: 10000,
					success: function(response){
						$('#dom_kel').html(response);
					}
				});
			}
			</script>
</head><!--/head-->

<body>
	<?php
		include "inc/header.php";
	?>
	<!--/header-->
	<div class="row">
		<span >&nbsp </span>
			<?php
				if (isset($_GET['sukses']))
				{
			?>		
			<div class="alert alert-success">
                    <center><strong>Selamat!</strong> Pesan Anda telah Terkirim</center>
			</div>
			<?php
				}
			?>  
	</div>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="col-sm-12">
						<h2 class="title text-center">AGEN LAINNYA</h2>
						<?php
						include "admin/koneksi.php";
						$dataPerPage = 12;
						if(isset($_GET['page'])){
							$noPage = $_GET['page'];
						} else $noPage = 1;
						$offset = ($noPage - 1) * $dataPerPage;
							$query = mysql_query("SELECT * FROM user where id_status='S003' order by tanggal_user DESC LIMIT $offset, $dataPerPage");							
							while($hasil = mysql_fetch_assoc($query)) 
							{   $id_user = $hasil['id_user'];
								$nama2 = $hasil['nama'];		
								$alamat = $hasil['alamat'];
								$jenis_kelamin = $hasil['jenis_kelamin'];
								$email = stripslashes ($hasil['email']);
								$nomor_hp = stripslashes ($hasil['nomor_hp']);
								$id_status = $hasil['id_status'];
								$tanggal_user = $hasil['tanggal_user'];
								$id_dokumen = $hasil['id_dokumen'];
								$pendapatan = $hasil['pendapatan'];
								$query2 = mysql_query("SELECT * FROM status WHERE id_status LIKE '$id_status'");
								while($hasil2 = mysql_fetch_assoc($query2))
								{
									$status = $hasil2['status'];
								}
								$query3 = mysql_query("SELECT * FROM dokumen WHERE id_dokumen LIKE '$id_dokumen'");
								while($hasil3 = mysql_fetch_assoc($query3))
								{
									$foto = $hasil3['foto'];
								}
						?>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img width="10px" src="admin/gbuser/temp/<?=$foto?>" alt="" />
											<h3 class="text-center"><span class="label label-danger"><?=$nama2?></span></h3>
											<i><p><i class="fa fa-envelope"></i> <?=$email?></p></i>
											<i><p><i class="fa fa-phone"></i> <?=$nomor_hp?></p></i>
											<a href="agentdetail.php?id=<?=$id_user?>" class="btn btn-default add-to-cart"><i class="fa fa-search-plus"></i>Details</a>
										</div>
								</div>
							</div>
						</div>	
						<?php	}
						?>
					</div>
					<div class="col-sm-12">
						<div class="light">
						<div class="paginate wrapper"><!-- The "wrapper" is just a comestic addition. You don't need this for the pagination to work. -->
							<ul>
							<?php
							include "admin/koneksi.php";
								$hasilko  = mysql_query("SELECT COUNT(*) AS jumData FROM user where id_status='S003'");
								$data     = mysql_fetch_array($hasilko);
								$jumData = $data['jumData'];
								$jumPage = ceil($jumData/$dataPerPage);
								if ($noPage > 1)
								{
									echo  "<li><a href='".$_SERVER['PHP_SELF']."?page=".($noPage-1)."'>&lang;</a></li>";
								}
								$showPage=9;
								for($page = 1; $page <= $jumPage; $page++)
								{
									if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage))
										{
											if (($showPage == 1) && ($page != 2))  
											{
												echo "...";
											}
											if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
											if ($page == $noPage) echo " <li><a class='active'>".$page."</a></li>";
											else echo " <li><a href='".$_SERVER['PHP_SELF']."?page=".$page."'>".$page."</a></li>";
										$showPage = $page;
										}
								}
								if ($noPage < $jumPage) echo "<li><a href='".$_SERVER['PHP_SELF']."?page=".($noPage+1)."'>&rang;</a></li>";
								?>
							</ul>
						</div>
					</div><!--Pagination-->
					</div>
				</div>
				<div class="col-sm-3">
					<div class="left-sidebar">
						<div class="contact-form">
	    				<h2 class="title text-center">Cari Properti</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="POST" action="cari.php">
							<div class="form-group col-md-12">
                                <select name="pilihan" class="form-control" id="selectError" data-rel="chosen" >
										<option value="#">Kategori Properti</option>	
										<option value="Dijual">Dijual</option>										
										<option value="Disewakan">Disewakan</option>									
								</select>
                            </div>							
							<div class="form-group col-md-12">
								<select name="harga"  class="form-control" >
									<option value="#" selected>Range Harga</option>
									<option value="< 50000000" >Dibawah 50 Juta</option>
									<option value="> 49000000 AND harga < 100000001">50 - 100 Juta</option>
									<option value="> 99999000 AND harga < 200000001" >100 - 200 Juta</option>
									<option value="> 199990000 AND harga < 500000001" >200 - 500 Juta</option>
									<option value="> 499000000 AND harga < 800000001" >500 - 800 Juta</option>
									<option value="> 799000000 AND harga < 1500000001" >800 - 1,5 Milyar</option>
									<option value="> 1499000000 AND harga < 5000000001" >1,5 - 5 Milyar</option>
									<option value="> 4999000000 AND harga < 10000000001" >5 - 10 Milyar</option>
									<option value="> 9999000000 AND harga < 50000000001" >10 - 50 Milyar</option>
									<option value="> 50000000000" >> 50 Milyar</option>
								<select>
							</div>
							<div class="form-group col-md-12">
                                <select name="sertifikat" class="form-control" id="selectError" data-rel="chosen" >
										<option value ="#" selected >Pilih Sertifikat</option>
										<option value="SHM">SHM</option>
										<option value="HGB">HGB</option>
										<option value="HPL">HPL</option>
										<option value="GIRIK">GIRIK</option>
										<option value="Strata Title">Strata Title</option>
										<option value="PPJB">PPJB</option>
								</select>
                            </div>
							<div class="form-group col-md-12">							
									<select name="kategori" class="form-control" id="selectError" data-rel="chosen">
										<option value="#">Jenis Properti</option>	
										<option value="Tanah"> Tanah </option>									
										<option value="Rumah"> Rumah </option>									
										<option value="Kos-kosan"> Kos-Kosan </option>									
										<option value="Apartemen"> Apartemen </option>									
										<option value="Ruko"> Ruko </option>									
										<option value="Gudang"> Gudang </option>									
										<option value="Pabrik"> Pabrik </option>									
										<option value="Tempat Usaha"> Tempat Usaha </option>									
									</select>
							</div>		
							<div class="form-group col-md-12">
								<select name="prop" onchange="pilih_kota(this.value);" class="form-control" id="selectError" data-rel="chosen" >
									<option value="#">Pilih Provinsi</option>
									<?php 
											  include "admin/koneksi2.php";
											  $query4=mysql_query("SELECT id_prov,nama FROM provinsi ORDER BY nama");?>	
											  <?php while ($data= mysql_fetch_array($query4)){
												?>
												<option value="<?=$data['id_prov']?>"><?=$data['nama']?></option>;
												<?php
												}
											  ?>
								</select>
							</div>
							<div class="form-group col-md-12">
								<select name="kota" id="dom_kota" onchange="pilih_kec(this.value)" class="form-control">
									<option value="" selected >Pilih Kota</option>
								<select>
							</div>
							<div class="form-group col-md-12">
								<select name="kec" id="dom_kec" onchange="pilih_kel(this.value)"  class="form-control" >
									<option value="#" selected>Pilih Kecamatan</option>
								<select>
							</div>	
							<div class="form-group col-sm-12">
                                <select name="luas_tanah" class="form-control" >
									<option value="#" selected>Luas Tanah</option>
									<option value="<'100'" >Dibawah 100 </option>
									<option value=">'99' AND luas_tanah < '301'">100 - 300 </option>
									<option value=">'299' AND luas_tanah < '501'" >300 - 500 </option>
									<option value=">'499' AND luas_tanah < '1001'" >500 - 1000 </option>
									<option value=">'999' AND luas_tanah < '3001'" >1.000 - 3.000 </option>
									<option value=">'2999' AND luas_tanah < '5001'" >3.000 - 5.000 </option>
									<option value=">'4999' AND luas_tanah < '10001'" >5.000 - 10.000 </option>
									<option value=">'9999' AND luas_tanah < '30001'" >10.000 - 30.000 </option>
									<option value=">'29999' AND luas_tanah < '50001'" >30.000 - 50.000 </option>
									<option value=">'50000'" >> 50.000 </option>											
								</select>
                            </div>	
							<div class="form-group col-sm-12">
                                <select name="luas_bangunan" class="form-control" >
									<option value="#" selected>Luas Bangunan</option>
									<option value="<'100'" >Dibawah 100 </option>
									<option value=">'99' AND luas_bangunan < '301'">100 - 300 </option>
									<option value=">'299' AND luas_bangunan < '501'" >300 - 500 </option>
									<option value=">'499' AND luas_bangunan < '1001'" >500 - 1000 </option>
									<option value=">'999' AND luas_bangunan < '3001'" >1.000 - 3.000 </option>
									<option value=">'2999' AND luas_bangunan < '5001'" >3.000 - 5.000 </option>
									<option value=">'4999' AND luas_bangunan < '10001'" >5.000 - 10.000 </option>
									<option value=">'9999' AND luas_bangunan < '30001'" >10.000 - 30.000 </option>
									<option value=">'29999' AND luas_bangunan < '50001'" >30.000 - 50.000 </option>
									<option value=">'50000'" >> 50.000 </option>										
								</select>
                            </div>
							<div class="form-group col-md-12">
								<select name="kamar_tidur" class="form-control" >
									<option value="#" selected>Jumlah Kamar Tidur</option>
									<option value=">0" > ≥ 1</option>
									<option value=">1" > ≥ 2</option>
									<option value=">2" > ≥ 3</option>
									<option value=">3" > ≥ 4</option>
									<option value=">4" > ≥ 5</option>
									<option value=">5" > ≥ 6</option>
								<select>
							</div>	
							<div class="form-group col-md-12">
								<select name="kamar_mandi" class="form-control" >
									<option value="#" selected>Jumlah Kamar Mandi</option>
									<option value=">0" > ≥ 1</option>
									<option value=">1" > ≥ 2</option>
									<option value=">2" > ≥ 3</option>
									<option value=">3" > ≥ 4</option>
									<option value=">4" > ≥ 5</option>
									<option value=">5" > ≥ 6</option>
								<select>
							</div>
							<div class="form-group col-md-12">
								<select name="garasi" class="form-control" >
									<option value="#" selected>Jumlah Garasi</option>
									<option value=">0" > ≥ 1</option>
									<option value=">1" > ≥ 2</option>
									<option value=">2" > ≥ 3</option>
									<option value=">3" > ≥ 4</option>
									<option value=">4" > ≥ 5</option>
									<option value=">5" > ≥ 6</option>
								<select>
							</div>
							<div class="form-group col-md-12">
                                <select name="hadap" class="form-control" id="selectError">																		
										<option value="#">Pilih Arah Bangunan</option>
										<option value="Timur">Timur</option>										
										<option value="Tenggara">Tenggara</option>										
										<option value="Selatan">Selatan</option>										
										<option value="Barat Daya">Barat Daya</option>										
										<option value="Barat">Barat</option>										
										<option value="Barat Laut">Barat Laut</option>										
										<option value="Utara">Utara</option>										
										<option value="Timur Laut">Timur Laut</option>										
								</select>
                            </div>
							<div class="form-group col-md-12">
								<button type="submit" class="btn btn-danger form-control" name="submit" /><i class="fa fa-search"></i> Cari</button>
							</div>
						</form>
						</div>	
						<!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Kategori</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="advanced.php?kategori=Rumah"> <span class="pull-right"></span>Rumah</a></li>
									<li><a href="advanced.php?kategori=Tanah"> <span class="pull-right"></span>Tanah</a></li>
									<li><a href="advanced.php?kategori=Kos-Kosan"> <span class="pull-right"></span>Kos-kosan</a></li>
									<li><a href="advanced.php?kategori=Pabrik"> <span class="pull-right"></span>Pabrik</a></li>
									<li><a href="advanced.php?kategori=Apartemen"> <span class="pull-right"></span>Apartemen</a></li>
									<li><a href="advanced.php?kategori=Tempat Usaha"> <span class="pull-right"></span>Tempat Usaha</a></li>
									<li><a href="advanced.php?kategori=Gudang"> <span class="pull-right"></span>Gudang</a></li>
									<li><a href="advanced.php?kategori=Ruko"> <span class="pull-right"></span>Ruko</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						<div class="brands_products"><!--TOP AGEN-->
							<h2>Top Agen</h2>
									<?php
									include "admin/koneksi.php";
										$query_komisi=mysql_query("SELECT * from user where id_status='S003' ORDER BY pendapatan DESC limit 1");
											while($hasil_komisi = mysql_fetch_array($query_komisi)) 
												{   
													$nama = $hasil_komisi['nama'];
													$id_user = $hasil_komisi['id_user'];
													$pendapatan = $hasil_komisi['pendapatan'];
													$id_dokumen = $hasil_komisi['id_dokumen'];
													$email_k = $hasil_komisi['email'];
													$nomor_hp_k = $hasil_komisi['nomor_hp'];
													$pesan = $hasil_komisi['pesan'];
													$alamat = $hasil_komisi['alamat'];
													$tanggal_user = $hasil_komisi['tanggal_user'];
													$jenis_kelamin = $hasil_komisi['jenis_kelamin'];
												}
												$query_k3 = mysql_query("SELECT * FROM dokumen WHERE id_dokumen LIKE '$id_dokumen'");
												while($hasil_k3 = mysql_fetch_assoc($query_k3))
												{
													$foto_k = $hasil_k3['foto'];
												}
									?>
									<div class="col-sm-12">
										<div class="col-sm-5">
											<img src="admin/gbuser/temp/<?=$foto_k?>"width="100%" />										
										</div>
										<div class="col-sm-7">
											<?=$nama?>
											<p class="badge"><i class="fa fa-phone"> 0<?=number_format($nomor_hp_k,'0','-','-')?></i></p>													
										</div>
									</div>
									<span> &nbsp; <hr></hr> </span>
										<?php
											$query_sell=mysql_query("select id_user,status, count(id_user) as jumlah from properti where status='Terjual' or status='Disewa' AND id_status='S003' GROUP by id_user order by jumlah DESC LIMIT 1");
											$hasil_sell = mysql_fetch_array($query_sell);
											$id_sell=$hasil_sell['id_user'];
											$query_seller=mysql_query("select * from user where id_user='$id_sell'");
											while($hasil_seller = mysql_fetch_array($query_seller)) 
												{   
													$nama = $hasil_seller['nama'];
													$pendapatan = $hasil_seller['pendapatan'];
													$id_dokumen = $hasil_seller['id_dokumen'];
													$email_k = $hasil_seller['email'];
													$nomor_hp_k = $hasil_seller['nomor_hp'];
													$pesan = $hasil_seller['pesan'];
													$alamat = $hasil_seller['alamat'];
													$tanggal_user = $hasil_seller['tanggal_user'];
													$jenis_kelamin = $hasil_seller['jenis_kelamin'];
												}
												$query_k3 = mysql_query("SELECT * FROM dokumen WHERE id_dokumen LIKE '$id_dokumen'");
												while($hasil_k3 = mysql_fetch_assoc($query_k3))
												{
													$foto_k = $hasil_k3['foto'];
												}
										?>
									<div class="col-sm-12">
										<div class="col-sm-5">
											<img src="admin/gbuser/temp/<?=$foto_k?>"width="100%" />										
										</div>
										<div class="col-sm-7">
											<?=$nama?>
											<p class="badge"><i class="fa fa-phone"> 0<?=number_format($nomor_hp_k,'0','-','-')?></i></p>													
										</div>
									</div>
									<span> &nbsp;<hr></hr> </span>
										<?php
											$query_sell=mysql_query("select id_user,status, count(id_user) as jumlah from properti where id_status='S003' GROUP by id_user order by jumlah DESC LIMIT 1");
											$hasil_sell = mysql_fetch_array($query_sell);
											$id_sell=$hasil_sell['id_user'];
											$query_seller=mysql_query("select * from user where id_user='$id_sell'");
											while($hasil_seller = mysql_fetch_array($query_seller)) 
												{   
													$nama = $hasil_seller['nama'];
													$pendapatan = $hasil_seller['pendapatan'];
													$id_dokumen = $hasil_seller['id_dokumen'];
													$email_k = $hasil_seller['email'];
													$nomor_hp_k = $hasil_seller['nomor_hp'];
													$pesan = $hasil_seller['pesan'];
													$alamat = $hasil_seller['alamat'];
													$tanggal_user = $hasil_seller['tanggal_user'];
													$jenis_kelamin = $hasil_seller['jenis_kelamin'];
												}
												$query_k3 = mysql_query("SELECT * FROM dokumen WHERE id_dokumen LIKE '$id_dokumen'");
												while($hasil_k3 = mysql_fetch_assoc($query_k3))
												{
													$foto_k = $hasil_k3['foto'];
												}
										?>
									<div class="col-sm-12">
										<div class="col-sm-5">
											<img src="admin/gbuser/temp/<?=$foto_k?>"width="100%" />										
										</div>
										<div class="col-sm-7">
											<?=$nama?>
											<span class="badge"><i class="fa fa-phone"> 0<?=number_format($nomor_hp_k,'0','-','-')?></i></span>													
										</div>
									</div>
									<span> &nbsp; <hr></hr></span>
						</div><!--/brands_products-->
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>Discovery</span>Properti</h2>
							<p>Sekilas Tentang Kami</p>
						</div>
					</div>
					<div class="col-sm-7">						
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>Jalan Maju Mundur No.0 Mantapss</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2018 Boomingsoon Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="#">M Havid A A</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>