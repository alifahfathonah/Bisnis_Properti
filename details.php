<!DOCTYPE html>
<html lang="en">
<?php
if (isset($_GET['back'])){
		$back=$_GET['back'];
	}else{
		$back="";
	}
if (!isset($_GET['id'])){
		header("location:404.html");
		exit;
	}else{
		include "admin/koneksi.php";
		$id= $_GET['id'];
		$query = mysqli_query($con,"SELECT *, DATE_FORMAT(tanggal_dibuat, '%d %M %Y') AS tanggal_dibuat, DATE_FORMAT(tanggal_dibuat, '%H:%I:%S') AS jam  FROM properti where id_properti='$id'");
		$jumlahdata=mysqli_num_rows($query);
		if ($jumlahdata < 1){
			header("location:404.html");
			exit;
		}
	}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Details | Discovery</title>
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
	<header id="header"><!--header-->
		<!--<div class="header_top">--header_top-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> (+62) 271 00000000</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> discovery@properti.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/ikon.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="register.php"><i class="fa fa-user"></i> Register</a></li>
								<li><a href="admin"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Properti<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="advanced.php?pilihan=Dijual">Dijual</a></li>
										<li><a href="advanced.php?pilihan=Disewakan">Disewakan</a></li>
                                    </ul>
                                </li> 
								<li><a href="agents.php">Agen</a></li>
								<li><a href="#">Owner</a></li>
								<li><a href="#">Brosur</a></li>
								<li><a href="#">FAQ</a></li>
								<li><a href="#">About</a></li>
								<li><a href="#">Kontak</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
		<div>
				<?php
				include "admin/koneksi.php";
				$querypeta = mysqli_query($con,"SELECT *, DATE_FORMAT(tanggal_dibuat, '%d %M %Y') AS tanggal_dibuat, DATE_FORMAT(tanggal_dibuat, '%H:%I:%S') AS jam  FROM properti where id_properti='$id'");
				while($hasilpeta = mysqli_fetch_array($querypeta)){ 
							$as = $hasilpeta['latitude'];
							$ad = $hasilpeta['longitude'];
				}
					include "peta.php";
				?>
	</div>
	</header><!--/header-->
	<div> &nbsp </div>
					<div>
					<?php
						if (isset($_GET['sukses']))
						{
					?>		
					<div class="alert alert-success">
							<center><strong>Selamat!</strong> Pesan Anda telah Terkirim</center>
					</div>
					<?php
						}else echo "<br>";
					?>  
				</div>
	<section>
		<div class="container">
			<div class="col-md-12">

				<div class="col-sm-9">
					<div class="blog-post-area">
					<?php
						while($hasil = mysqli_fetch_array($query)) 
						{   include "admin/koneksi.php";
							$id_properti = $hasil['id_properti'];
							$id_fasilitas = $hasil['id_fasilitas'];							
							$harga = $hasil['harga'];							
							$tanggal_dibuat = $hasil['tanggal_dibuat'];							
							$jam = $hasil['jam'];							
							$id_user =addslashes(strip_tags($hasil['id_user']));
							$id_user2 =addslashes(strip_tags($hasil['id_user']));
									$query_user2= mysqli_query($con,"SELECT * FROM user WHERE id_user='$id_user'");
									while($hasiluser2 = mysqli_fetch_array($query_user2))
									{
										$nama = $hasiluser2['nama'];
										$email = $hasiluser2['email'];
										$nomor_hp = $hasiluser2['nomor_hp'];
										$id_dokumen = $hasiluser2['id_dokumen'];
									}
									$query_dok= mysqli_query($con,"SELECT * FROM dokumen WHERE id_dokumen='$id_dokumen'");
									while($hasildok = mysqli_fetch_array($query_dok))
									{
										$foto = $hasildok['foto'];
									}										
									$query_f= mysqli_query($con,"SELECT * FROM fasilitas WHERE id_fasilitas='$id_fasilitas'");
									while($hasil_f = mysqli_fetch_array($query_f))
									{
										$kamar_mandi = $hasil_f['kamar_mandi'];
										$kamar_tidur = $hasil_f['kamar_tidur'];
										$luas_bangunan = $hasil_f['luas_bangunan'];
										$carport= $hasil_f['carport'];
										$jumlah_lantai= $hasil_f['jumlah_lantai'];
										$listrik= $hasil_f['listrik'];
										$air= $hasil_f['air'];
										$listrik= $hasil_f['listrik'];
										$garasi= $hasil_f['garasi'];
										$hadap= $hasil_f['hadap'];
										$sertifikat= $hasil_f['sertifikat'];
									}
							$status =addslashes(strip_tags($hasil['status']));
							$pilihan=$hasil ['pilihan'];
							$keterangan=$hasil ['keterangan'];
							$fee_agen=$hasil ['fee_agen'];
							$lokasi_prop=$hasil ['lokasi'];
							$kategori =addslashes(strip_tags($hasil['kategori']));
							$judul =addslashes(strip_tags($hasil['judul']));
							$pilihan =addslashes(strip_tags($hasil['pilihan']));
							$harga =addslashes(strip_tags($hasil['harga']));
							$luas_tanah =addslashes(strip_tags($hasil['luas_tanah']));
							$kecamatan =addslashes(strip_tags($hasil['kecamatan']));
							$kota =addslashes(strip_tags($hasil['kota']));
							include "admin/koneksi2.php";
											$query_p= mysqli_query($con,"SELECT * FROM kecamatan where kecamatan.id='$kecamatan'");
											while ($hasil_p=mysqli_fetch_assoc($query_p)){
												$lokasi=$hasil_p['name'];
											}
											$query_p= mysqli_query($con,"SELECT * FROM kecamatan where regency_id='$kota'");
											while ($hasil_p=mysqli_fetch_assoc($query_p)){
												$kota=$hasil_p['name'];
											}
							$gambar = ($hasil['gambar']);
						}
						?>
						<h3>
							<label class="pull-right label label-danger"><?=$pilihan?></label>
						</h3>
						<h1 class="title"><?=$judul?></h1>
						
						<div class="single-blog-post">
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> <a href="detailagents.php?id=<?=$id_user?>"><?=$nama?></a></li>
									<li><i class="fa fa-clock-o"></i> <?=$jam?></li>
									<li><i class="fa fa-calendar"></i><?=$tanggal_dibuat?></li>
								</ul>
								<span>
								<?php
									include "admin/koneksi.php";
									$kueri=mysqli_query($con,"select count(pengunjung) as counter from counter where id_properti='$id_properti' group by id_properti");
									$data_pengunjung=mysqli_fetch_array($kueri);
									$jumlah_pengunjung=$data_pengunjung['counter'];
									if ($jumlah_pengunjung < 0.5){
										echo"<i class='fa fa-star-half-o'></i>";
									}
									else if ($jumlah_pengunjung < 1.1){
										echo "<i class='fa fa-star'></i>";
									}
									else if ($jumlah_pengunjung < 1.5){
										echo "<i class='fa fa-star'></i>";
										echo"<i class='fa fa-star-half-o'></i>";
									}
									else if ($jumlah_pengunjung < 2.1){
										echo "<i class='fa fa-star'></i>";
										echo "<i class='fa fa-star'></i>";
									}
									else if ($jumlah_pengunjung < 2.5){
										echo "<i class='fa fa-star'></i>";
										echo "<i class='fa fa-star'></i>";
										echo"<i class='fa fa-star-half-o'></i>";
									}
									else if ($jumlah_pengunjung < 3.1){
										echo "<i class='fa fa-star'></i>";
										echo "<i class='fa fa-star'></i>";
										echo "<i class='fa fa-star'></i>";
									}
									else if ($jumlah_pengunjung < 3.5){
										echo "<i class='fa fa-star'></i>";
										echo "<i class='fa fa-star'></i>";
										echo "<i class='fa fa-star'></i>";
										echo"<i class='fa fa-star-half-o'></i>";
									}
									else if ($jumlah_pengunjung < 4.1){
										echo "<i class='fa fa-star'></i>";
										echo "<i class='fa fa-star'></i>";
										echo "<i class='fa fa-star'></i>";
										echo "<i class='fa fa-star'></i>";
									}
									else if ($jumlah_pengunjung < 4.5){
										echo "<i class='fa fa-star'></i>";
										echo "<i class='fa fa-star'></i>";
										echo "<i class='fa fa-star'></i>";
										echo "<i class='fa fa-star'></i>";
										echo"<i class='fa fa-star-half-o'></i>";
									}
									else if ($jumlah_pengunjung > 4.5){
										echo "<i class='fa fa-star'></i>";
										echo "<i class='fa fa-star'></i>";
										echo "<i class='fa fa-star'></i>";
										echo "<i class='fa fa-star'></i>";
										echo "<i class='fa fa-star'></i>";
									}
								?>
								</span>
							</div>
							<div class="col-sm-6">
								<img src="admin/gbdata/<?=$gambar?>" width="100%"></img>
							</div>
							<div class="col-sm-6">
								<div class="category-tab"><!--category-tab-->
									<div class="col-sm-12">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#spesifikasi" data-toggle="tab">Spesifikasi</a></li>
											<li><a href="#fasilitas" data-toggle="tab">Fitur 1</a></li>
											<li><a href="#fasilitas2" data-toggle="tab">Fitur 2</a></li>
											<li><a href="#keterangan" data-toggle="tab">Ket</a></li>
										</ul>
									</div>
									<div class="tab-content">
										<div class="tab-pane fade active in" id="spesifikasi" >
											<div class="col-sm-12">
												 <table class="table table-striped responsive">
													<tr>
														<td>Harga</td>
														<td><h4><label class="label label-danger">Rp <?=number_format($harga,0,'.','.')?></label></h4></td>
													</tr>
													<tr>
														<td>Kategori</td>
														<td><?=$kategori?></td>
													</tr>
													<tr>
														<td>Luas tanah</td>
														<td><?=number_format($luas_tanah,0,'.','.')?> M<sup>2</sup></td>
													</tr>
													<tr>
														<td>Sertifikat</td>
														<td><?=$sertifikat?></td>
													</tr>
												</table>
											</div>
										</div>
										<div class="tab-pane fade" id="fasilitas" >
											<div class="col-sm-12">
												<table class="table table-striped responsive">
													<tr>
														<td>Luas Bangunan</td>
														<td><?=number_format($luas_bangunan,0,'.','.')?> M<sup>2</sup></td>
													</tr>
													<tr>
														<td>Jumlah Lantai</td>
														<td><?=$jumlah_lantai?></td>
													</tr>
													<tr>
														<td>Kamar Mndi</td>
														<td><?=$kamar_mandi?></td>
													</tr>
													<tr>
														<td>Kamar Tidur</td>
														<td><?=$kamar_tidur?></td>
													</tr>
												</table>
											</div>
										</div>
										<div class="tab-pane fade" id="fasilitas2" >
											<div class="col-sm-12">
												<table class="table table-striped responsive">
													<tr>
														<td>Garasi</td>
														<td><?=$garasi?></td>
													</tr>
													<tr>
														<td>Carport</td>
														<td><?=$carport?></td>
													</tr>
													<tr>
														<td>Listrik</td>
														<td><?=$listrik?></td>
													</tr>
													<tr>
														<td>Air</td>
														<td><?=$air?></td>
													</tr>
													<tr>
														<td>Arah Bangunan</td>
														<td><?=$hadap?></td>
													</tr>
												</table>
											</div>
										</div>
										<div class="tab-pane fade" id="keterangan" >
											<div class="col-sm-12">
												<?=$keterangan?>
											</div>
										</div>
									</div>
								</div><!--/category-tab-->
							</div>
						</div>
					</div><!--/blog-post-area-->						
					<div class="col-md-12">
						<div class="media commnets">
							<div class="media-body">
								<h3> Lokasi</h3>
								<p><i class="fa fa-map-marker"></i><i> <?=$lokasi_prop?></i></p>
							</div>
						</div><!--Comments-->							
						<div class="pager-area">
							<ul class="pager pull-right">
							<?php
								$randum=mysqli_query($con,"select * from properti order by RAND() limit 1");
								$result=mysqli_fetch_array($randum);
								$norand=$result['id_properti'];
							?>
								<li><a href="details.php?id=<?=$back?>&back=<?=$id?>">Back</a></li>
								<li><a href="details.php?id=<?=$norand?>&back=<?=$id?>">Next</a></li>
							</ul>
						</div>
					</div>
					<div class="media commnets">
						<div class="media-body">
							<h4 class="media-heading">Lanjutan</h4>
							<p>Jika Menurut Anda Properti ini menarik, bisa anda share melalui media sosial di bawah atau rekomendasikan ke kenalan anda, baik teman, pacar, saudara, dan rekan kerja</p>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
								<a class="btn btn-primary" href="">Other Posts</a>
							</div>
						</div>
					</div><!--Comments-->
					<div class="replay-box">
						<div class="row">
							<div class="col-sm-4">
								<h2>Kirim Pesan ke <?=$nama?></h2>
								<form method="POST" class="contact-form row" action="proses_pesan.php">
									<div class="blank-arrow">
										<label>Nama</label>
									</div>
									<span>*</span>
									<input type="text" name="nama" required placeholder="Tuliskan nama anda...">
									<div class="blank-arrow">
										<label>Email Address</label>
									</div>
									<span>*</span>
									<input type="email" name="email" required placeholder="Isi alamat Email...">
									<div class="blank-arrow">
										<label>No Telp / Hp</label>
									</div>
									<span>*</span>
									<input type="text" name="nomor_hp" required placeholder="isi nomor telp / hp ...">
										<div class="blank-arrow">
											<label>Pesan</label>
										</div>
										<span>*</span>
										<div class="text-area">
										<textarea class="textarea" name="pesan" rows="11" placeholder="Silahkan isi pesan kepada agen, bisa saran, kritik, permintaan, dll" ></textarea>
										</div>	
									<input type="hidden" name="id" required value="<?=$id_properti?>">
									<input type="hidden" name="id_user" required value="<?=$id_user?>">
									<input type="hidden" name="vali" required value="1">
									<input type="submit" class="ins btn btn-primary" name="submit" value="submit">
								</form>
							</div>
							<div class="col-sm-3">
								<img src="admin/gbuser/temp/<?=$foto?>" width="80%"></img>
							</div>
							<div class="col-sm-5">
							<h2><i class="fa fa-envelope"> <?=$email?></i></h2>
							<h2 class="badge"><i class="fa fa-phone"> <?=$nomor_hp?></i></h2>
								<table class="table table-striped">
									
								</table>
							</div>
						</div>
					</div><!--/Repaly Box-->
				</div>	
				<div class="col-sm-3">
					<div class="left-sidebar">
						<div class="contact-form">
	    				<h2 class="title text-center">Cari Properti</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="cari.php">
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
											  $query4=mysqli_query($con,"SELECT id as id_prov,name FROM provinsi ORDER BY name");?>	
											  <?php while ($data= mysqli_fetch_array($query4)){
												?>
												<option value="<?=$data['id_prov']?>"><?=$data['name']?></option>;
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
												while($hasil_k3 = mysqli_fetch_assoc($query_k3))
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
												while($hasil_k3 = mysqli_fetch_assoc($query_k3))
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
												while($hasil_k3 = mysqli_fetch_assoc($query_k3))
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
	<?php
			include "admin/koneksi.php";
			// Jenis Browser
			$browser = $_SERVER['HTTP_USER_AGENT'];
			$chrome = '/Chrome/';
			$firefox = '/Firefox/';
			$ie = '/IE/';
			if (preg_match($chrome, $browser))
				$data = "Chrome";
			if (preg_match($firefox, $browser))
				$data = "Firefox";
			if (preg_match($ie, $browser))
				$data = "IE";
			else if (preg_match('/(opera|avantgo|blackberry|android|blazer|elaine|hiptop|iphone|ipod|kindle|midp|mmp|mobile|o2|opera mini|palm|palm os|pda|plucker|pocket|psp|smartphone|symbian|treo|up.browser|up.link|vodafone|wap|windows ce; iemobile|windows ce; ppc;|windows ce; smartphone;|xiino)/i', $_SERVER['HTTP_USER_AGENT'], $version))
				$data = $version[1];

			// untuk mengambil informasi dari pengunjung
			$ipaddress = $_SERVER['REMOTE_ADDR']."";
			$browser = $data;
			$tanggal = date('Y-m-d : H:i:s');
			$kunjungan = 1;
			$id_counter="C".rand(1000,9999);
			$query = "INSERT INTO counter values ('$id_counter','$id_properti','$id_user2','$tanggal','$browser','$ipaddress','1')"; 
				$sql = mysqli_query ($con,$query) or die (mysqli_error());
			?>

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