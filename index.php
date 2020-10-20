<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Discovery</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<link rel="stylesheet" href="page.css">	
    <script src="js/jquery.min.js"></script>
		<script> 
		$(document).ready(function(){
			$("#flip").click(function(){
				$("#panel").slideToggle("slow");
			});
		});
		</script>
		<script src="js/ajax_lokasi.js"></script>
</head><!--/head-->

<body>
	<?php
		include "inc/header.php";
	?>
	<!--/header-->
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>DISCOVERY</span>PROPERTY</h1>
									<h2>Properti Terkini</h2>
									<p>Sekilas Tentang Properti</p>
									<button type="button" class="btn btn-danger">LINK</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/images.jpg" width="100%" class="img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>DISCOVERY</span>PROPERTY</h1>
									<h2>Properti Terkini</h2>
									<p>Sekilas Tentang Properti</p>
									<button type="button" class="btn btn-danger">LINK</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/images.jpg" width="100%" class="img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>DISCOVERY</span>PROPERTY</h1>
									<h2>Properti Terkini</h2>
									<p>Sekilas Tentang Properti</p>
									<button type="button" class="btn btn-danger">LINK</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/images.jpg" width="100%" class="img-responsive" alt="" />
								</div>
							</div>
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	<section>
		<div class="container">
			<div class="row">
				<form method="POST" action="cari.php">
					<div class="col-md-12">					
							<div class="form-group col-md-2">
                                <select name="pilihan" class="form-control" id="selectError" data-rel="chosen" >
										<option value="#">Pilih</option>	
										<option value="Dijual">Dijual</option>										
										<option value="Disewakan">Disewakan</option>									
								</select>
                            </div>							
							<div class="form-group col-md-2">
								<select name="harga"  class="form-control" >
									<option value="#" selected>Pilih Harga</option>
									<option value="< '50000000'" >Dibawah 50 Juta</option>
									<option value=">'49000000' AND harga < '100000001'">50 - 100 Juta</option>
									<option value=">'99999000' AND harga < '200000001'" >100 - 200 Juta</option>
									<option value=">'199990000' AND harga < '500000001'" >200 - 500 Juta</option>
									<option value=">'499000000' AND harga < '800000001'" >500 - 800 Juta</option>
									<option value=">'799000000' AND harga < '1500000001'" >800 - 1,5 Milyar</option>
									<option value=">'1499000000' AND harga < '5000000001'" >1,5 - 5 Milyar</option>
									<option value=">'4999000000' AND harga < '10000000001'" >5 - 10 Milyar</option>
									<option value=">'9999000000' AND harga < '50000000001'" >10 - 50 Milyar</option>
									<option value="> '50000000000'" >> 50 Milyar</option>
								<select>
							</div>
							<div class="form-group col-md-2">
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
							<div class="form-group col-md-2">							
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
							<div class="form-group col-md-2">
								<button type="submit" class="btn btn-danger form-control" name="submit" /><i class="fa fa-search"></i> Cari</button>
							</div>
							<div class="form-group col-md-2">
								<a class="btn btn-default form-control" id="flip"/><i class="fa fa-plus"></i> Advanced</a>
							</div>					
					</div>
					<div class="col-md-12" id="panel">
							<div class="form-group col-md-2">
								<select name="prop" onchange="pilih_kota(this.value);" class="form-control" id="selectError" data-rel="chosen" >
									<option value="#">Pilih Provinsi</option>
									<?php 
											  include "admin/koneksi2.php";
											  $query4=mysqli_query($con,"SELECT id as id_prov,name FROM provinsi ORDER BY name");?>	
											  <?php while ($data= mysqli_fetch_array($query4)){
												?>
												<option value="<?=$data['id_prov']?>"><?=$data['name']?></option>;
												<?php
												}
											  ?>
								</select>
							</div>
							<div class="form-group col-md-2">
								<select name="kota" id="dom_kota" onchange="pilih_kec(this.value)" class="form-control">
									<option value="" selected >Pilih Kota</option>
								<select>
							</div>
							<div class="form-group col-md-2">
								<select name="kec" id="dom_kec" onchange="pilih_kel(this.value)"  class="form-control" >
									<option value="#" selected>Pilih Kecamatan</option>
								<select>
							</div>	
							<div class="form-group col-sm-2">
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
							<div class="form-group col-sm-2">
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
							<div class="form-group col-md-2">
								<select name="kamar_tidur" class="form-control" >
									<option value="#" selected>Pilih Kamar Tidur</option>
									<option value=">0" > ≥ 1</option>
									<option value=">1" > ≥ 2</option>
									<option value=">2" > ≥ 3</option>
									<option value=">3" > ≥ 4</option>
									<option value=">4" > ≥ 5</option>
									<option value=">5" > ≥ 6</option>
								<select>
							</div>							
					</div>
				</form>	
			</div>	
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Listing Properti</h2>
						<?php	
						include "admin/koneksi.php";
						$dataPerPage = 12;
						if(isset($_GET['page'])){
							$noPage = $_GET['page'];
						} else $noPage = 1;
						$offset = ($noPage - 1) * $dataPerPage;
						$query = mysqli_query($con,"SELECT * FROM properti where keaktifan='1' ORDER BY 'tanggal_dibuat' DESC LIMIT $offset, $dataPerPage");
						while($hasil = mysqli_fetch_array($query)) 
						{   include "admin/koneksi.php";
							$id_properti = $hasil['id_properti'];
							$id_fasilitas = $hasil['id_fasilitas'];							
							$id_user =addslashes(strip_tags($hasil['id_user']));
									$query_user2= mysqli_query($con,"SELECT nama FROM user WHERE id_user='$id_user'");
									while($hasiluser2 = mysqli_fetch_array($query_user2))
									{
										$nama = $hasiluser2['nama'];
									}	
									$query_f= mysqli_query($con,"SELECT * FROM fasilitas WHERE id_fasilitas='$id_fasilitas'");
									while($hasil_f = mysqli_fetch_array($query_f))
									{
										$kamar_mandi = $hasil_f['kamar_mandi'];
										$kamar_tidur = $hasil_f['kamar_tidur'];
										$luas_bangunan = $hasil_f['luas_bangunan'];
										$carport= $hasil_f['carport'];
										$listrik= $hasil_f['listrik'];
										$air= $hasil_f['air'];
										$listrik= $hasil_f['listrik'];
										$garasi= $hasil_f['garasi'];
										$hadap= $hasil_f['hadap'];
										$sertifikat= $hasil_f['sertifikat'];
									}
							$status =addslashes(strip_tags($hasil['status']));
							$pilihan=$hasil ['pilihan'];
							$fee_agen=$hasil ['fee_agen'];
							$kategori =addslashes(strip_tags($hasil['kategori']));
							$judul =addslashes(strip_tags($hasil['judul']));
							$pilihan =addslashes(strip_tags($hasil['pilihan']));
							$harga =addslashes(strip_tags($hasil['harga']));
							$luas_tanah =addslashes(strip_tags($hasil['luas_tanah']));
							$lokasi =addslashes(strip_tags($hasil['kecamatan']));
							$kota =addslashes(strip_tags($hasil['kota']));
											$query_p = mysqli_query($con,"SELECT * FROM kecamatan where kecamatan.id='$lokasi'");
											while ($hasil_p=mysqli_fetch_array($query_p)){
												$lokasi=$hasil_p['name'];
											}
											$query_p= mysqli_query($con,"SELECT * FROM kecamatan where regency_id='$kota'");
											while ($hasil_p=mysqli_fetch_array($query_p)){
												$kota=$hasil_p['name'];
											}
							$gambar = ($hasil['gambar']);
						?>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo ">
											<img width="10px" height="200px" src="admin/gbdata/<?=$gambar?>" alt="" />
											<h3><span class="label label-danger">RP <?php echo number_format($harga,0,'.','.');?></span></h3>
											<i><p><i class="fa fa-map-marker"></i> <?=$lokasi.', '.$kota?></p></i>
											<a href="details.php?id=<?=$id_properti?>" class="btn btn-default add-to-cart"><i class="fa fa-search-plus"></i>Details</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<table>
													<tr>
														<td>&nbsp </td>
														<td><p>Kamar Mandi</p></td>
														<td><p> : </p></td>
														<td><p><?=$kamar_mandi?></p></td>
													</tr>
													<tr>
														<td>&nbsp </td>
														<td><p>Kamar Tidur</p></td>
														<td><p> : </p></td>
														<td><p><?=$kamar_tidur?></p></td>
													</tr>
													<tr>
														<td>&nbsp </td>
														<td><p>Garasi</p></td>
														<td><p> : </p></td>
														<td><p><?=$garasi?></p></td>
													</tr>
													<tr>
														<td>&nbsp </td>
														<td><p>Carport</p></td>
														<td><p> : </p></td>
														<td><p><?=$carport?></p></td>
													</tr>
													<tr>
														<td>&nbsp </td>
														<td><p>Listrik</p></td>
														<td><p> : </p></td>
														<td><p><?=$listrik?> Watt</p></td>
													</tr>
													<tr>
														<td>&nbsp </td>
														<td><p>Air</p></td>
														<td><p> : </p></td>
														<td><p><?=$air?></p></td>
													</tr>
													<tr>
														<td>&nbsp </td>
														<td><p>Hadap</p></td>
														<td><p> : </p></td>
														<td><p><?=$hadap?></p></td>
													</tr>
													<tr>
														<td>&nbsp </td>
														<td><p>Sertifikat</p></td>
														<td><p> : </p></td>
														<td><p><?=$sertifikat?></p></td>
													</tr>
												</table>
												<a href="details.php?id=<?=$id_properti?>" class="btn btn-default add-to-cart"><i class="fa fa-search-plus"></i>Details</a>
											</div>
										</div>
										<?php
														if ($pilihan=="Disewakan"){
													?>
													<img src="images/home/disewa.png" class="new" alt="" />
													
													<?php
														}
														else{
														?>
														<img src="images/home/dijual.png" class="new" alt="" />
														<?php
														}
														?>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li>LT : <?=$luas_tanah?> m<sup>2</sup></li>
										<?php
											if ($kategori<>"Tanah"){
												echo "<li>LB : $luas_bangunan m<sup>2</sup></li>";
											}
										?>
									</ul>
								</div>
							</div>
						</div>
						<?php }?>			
					
					</div><!--features_items-->
					<div class="light">
						<div class="paginate wrapper"><!-- The "wrapper" is just a comestic addition. You don't need this for the pagination to work. -->
							<ul>
							<?php
							include "admin/koneksi.php";
								$hasilko  = mysqli_query($con,"SELECT COUNT(*) AS jumData FROM properti");
								$data     = mysqli_fetch_array($hasilko);
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
					<div class="category-tab"><!--category-tab
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tshirt" data-toggle="tab">Top Properti</a></li>
								<li><a href="#" data-toggle="tab">Rumah</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="tshirt" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/images.jpg" alt="" />
												<h2>RP 300000</h2>
												<p>Judul</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-search-plus"></i>Detail</a>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</div>-->
					</div><!--/category-tab-->
					<div class="block-heading">
						<h4><span class="heading-icon"><i class="fa fa-caret-right icon-design"></i><i class="fa fa-users "></i></span>Top Agen</h4>
						<a href="agents.php" class="btn btn-primary btn-sm pull-right"><span>Selengkapnya</span> <i class="fa fa-long-arrow-right "></i></a>
					</div>
					<div class="recommended_items"><!--recommended_items-->
						<div id="recommended-item-carousel" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									<?php
									include "admin/koneksi.php";
										$query_komisi=mysqli_query($con,"SELECT * from user where id_status='S003' ORDER BY pendapatan DESC limit 1");
											while($hasil_komisi = mysqli_fetch_array($query_komisi)) 
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
												$query_k3 = mysqli_query($con,"SELECT * FROM dokumen WHERE id_dokumen LIKE '$id_dokumen'");
												while($hasil_k3 = mysqli_fetch_array($query_k3))
												{
													$foto_k = $hasil_k3['foto'];
												}
									?>
									<div class="col-sm-4">
										<div class="col-sm-2"><br></div>
										<div class="col-sm-8">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo">
														<img class="img-circle" src="admin/gbuser/temp/<?=$foto_k?>" alt="" />
														<h2><?=$nama?></h2>
														<i class="fa fa-envelope-o"></i> <?=$email_k?>
														<p><i class="glyphicon glyphicon-phone"></i> <?=$nomor_hp_k?></p>
														<center><a href="#" class="btn btn-default add-to-cart"><i class="fa fa-search-plus"></i>Top Komisi</a></center>
													</div>												
												</div>
											</div>
										</div>
									</div>
										<?php
											$query_sell=mysqli_query($con,"select id_user,status, count(id_user) as jumlah from properti where status='Terjual' or status='Disewa' AND id_status='S003' GROUP by id_user order by jumlah DESC LIMIT 1");
											$hasil_sell = mysqli_fetch_array($query_sell);
											$id_sell=$hasil_sell['id_user'];
											$query_seller=mysqli_query($con,"select * from user where id_user='$id_sell'");
											while($hasil_seller = mysqli_fetch_array($query_seller)) 
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
												$query_k3 = mysqli_query($con,"SELECT * FROM dokumen WHERE id_dokumen LIKE '$id_dokumen'");
												while($hasil_k3 = mysqli_fetch_array($query_k3))
												{
													$foto_k = $hasil_k3['foto'];
												}
										?>
									<div class="col-sm-4">
										<div class="col-sm-2"><br></div>
										<div class="col-sm-8">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
														<img class="img-circle" src="admin/gbuser/temp/<?=$foto_k?>" alt="" />
														<h2><?=$nama?></h2>
														<i class="fa fa-envelope-o"></i> <?=$email_k?>
														<p><i class="glyphicon glyphicon-phone"></i> <?=$nomor_hp_k?></p>
														<center><a href="#" class="btn btn-default add-to-cart"><i class="fa fa-search-plus"></i>Best Seller</a></center>
													</div>												
												</div>
											</div>
										</div>
									</div>
										<?php
											$query_sell=mysqli_query($con,"select id_user,status, count(id_user) as jumlah from properti where id_status='S003' GROUP by id_user order by jumlah DESC LIMIT 1");
											$hasil_sell = mysqli_fetch_array($query_sell);
											$id_sell=$hasil_sell['id_user'];
											$query_seller=mysqli_query($con,"select * from user where id_user='$id_sell'");
											while($hasil_seller = mysqli_fetch_array($query_seller)) 
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
												$query_k3 = mysqli_query($con,"SELECT * FROM dokumen WHERE id_dokumen LIKE '$id_dokumen'");
												while($hasil_k3 = mysqli_fetch_array($query_k3))
												{
													$foto_k = $hasil_k3['foto'];
												}
										?>
									<div class="col-sm-4">
										<div class="col-sm-2"><br></div>
										<div class="col-sm-8 center">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
														<img class="img-circle" src="admin/gbuser/temp/<?=$foto_k?>" alt="" />
														<h2><?=$nama?></h2>
														<i class="fa fa-envelope-o"></i> <?=$email_k?>
														<p><i class="glyphicon glyphicon-phone"></i> <?=$nomor_hp_k?></p>
														<center><a href="#" class="btn btn-default add-to-cart"><i class="fa fa-search-plus"></i>Top Properti</a></center>
													</div>												
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>			
						</div>
					</div><!--/recommended_items-->
					
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
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>