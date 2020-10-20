<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CARI| Discovery</title>
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
		<script src="js/ajax_lokasi.js"></script>
</head><!--/head-->

<body>
<?php
include "inc/header.php";
?>
	<!--/header-->
	<div>
			<?php
				if (isset($_GET['sukses']))
				{
			?>		
			<div class="alert alert-success">
                    <center><strong>Selamat!</strong> Pesan Anda telah Terkirim</center>
			</div>
			<?php
				}
				else echo "<br>";
			?>  
	</div>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
				<div class="col-sm-12">
					<h2 class="title text-center">DATA PENCARIAN</h2>
					<?php
$bagianWhere="";
	if (isset($_POST['kategori']))
	{
		$kategori = $_POST['kategori'];
		if ($kategori<>"#"){
			if (empty($bagianWhere))
			{
				$bagianWhere .= "kategori ='$kategori'";
			}
			else
			{
				$bagianWhere .= " AND kategori ='$kategori'";
			}
		}
	}
	if (isset($_POST['kec']))
	{
		$kec = $_POST['kec'];
		if ($kec<>"#"){
			if (empty($bagianWhere))
			{
				$bagianWhere .= "kecamatan ='$kec'";
			}
			else
			{
				$bagianWhere .= " AND kecamatan='$kec'";
			}
		}
	}
	if (isset($_POST['pilihan']))
	{$pilihan = $_POST['pilihan'];
		if ($pilihan<>"#"){
			
			if (empty($bagianWhere))
			{
				$bagianWhere .= "pilihan ='$pilihan'";
			}
			else
			{
				$bagianWhere .= " AND pilihan='$pilihan'";
			}
		}
	}
	if (isset($_POST['luas_tanah']))
	{$luas_tanah = $_POST['luas_tanah'];
		if ($luas_tanah<>"#"){
			
			if (empty($bagianWhere))
			{
				$bagianWhere .= "luas_tanah $luas_tanah";
			}
			else
			{
				$bagianWhere .= " AND luas_tanah $luas_tanah";
			}
		}
	}
	if (isset($_POST['harga']))
	{$harga = $_POST['harga'];
		if ($harga<>"#"){
			
			if (empty($bagianWhere))
			{
				$bagianWhere .= "harga $harga";
			}
			else
			{
				$bagianWhere .= " AND harga $harga";
			}
		}
	}
	if (isset($_POST['user']))
	{$user= $_POST['user'];
		if ($user<>"#"){
			
			if (empty($bagianWhere))
			{
				$bagianWhere .= " $user";
			}
			else
			{
				$bagianWhere .= " AND $user";
			}
		}
	}

	if (empty($bagianWhere)){
		$bagianWhere = "1";
	}
	//Fasilitas
	$bagianWhere1 = "";	
	if (isset($_POST['carport']))
	{$carport = $_POST['carport'];
		if ($carport<>"#"){
			
			if (empty($bagianWhere1))
			{
				$bagianWhere1 .= "carport ='$carport'";
			}
			else
			{
				$bagianWhere1 .= " AND carport='$carport'";
			}
		}
	}
	if (isset($_POST['listrik']))
	{$listrik = $_POST['listrik'];
		if ($listrik<>"#"){
			
			if (empty($bagianWhere1))
			{
				$bagianWhere1 .= "listrik='$listrik'";
			}
			else
			{
				$bagianWhere1 .= " AND listrik='$listrik'";
			}
		}
	}
	if (isset($_POST['air']))
	{$air = $_POST['air'];
		if ($air<>"#"){
			
			if (empty($bagianWhere1))
			{
				$bagianWhere1 .= "air='$air'";
			}
			else
			{
				$bagianWhere1 .= " AND air='$air'";
			}
		}
	}
	if (isset($_POST['sertifikat']))
	{$sertifikat = $_POST['sertifikat'];
		if ($sertifikat<>"#"){
			
			if (empty($bagianWhere1))
			{
				$bagianWhere1 .= "sertifikat='$sertifikat'";
			}
			else
			{
				$bagianWhere1 .= " AND sertifikat='$sertifikat'";
			}
		}
	}
	if (isset($_POST['hadap']))
	{$hadap = $_POST['hadap'];
		if ($hadap<>"#"){
			
			if (empty($bagianWhere1))
			{
				$bagianWhere1 .= "hadap='$hadap'";
			}
			else
			{
				$bagianWhere1 .= " AND hadap='$hadap'";
			}
		}
	}
	if (isset($_POST['luas_bangunan']))
	{$luas_bangunan = $_POST['luas_bangunan'];
		if ($luas_bangunan<>"#"){
			
			if (empty($bagianWhere1))
			{
				$bagianWhere1 .= "luas_bangunan $luas_bangunan";
			}
			else
			{
				$bagianWhere1 .= " AND luas_bangunan $luas_bangunan";
			}
		}
	}
	if (isset($_POST['kamar_mandi']))
	{$kamar_mandi = $_POST['kamar_mandi'];
		if ($kamar_mandi<>"#"){
			
			if (empty($bagianWhere1))
			{
				$bagianWhere1 .= "kamar_mandi $kamar_mandi";
			}
			else
			{
				$bagianWhere1 .= " AND kamar_mandi $kamar_mandi";
			}
		}
	}
	if (isset($_POST['garasi']))
	{$garasi = $_POST['garasi'];
		if ($garasi<>"#"){
			
			if (empty($bagianWhere1))
			{
				$bagianWhere1 .= "garasi $garasi";
			}
			else
			{
				$bagianWhere1 .= " AND garasi $garasi";
			}
		}
	}
	if (isset($_POST['kamar_tidur']))
	{$kamar_tidur = $_POST['kamar_tidur'];
		if ($kamar_tidur<>"#"){
			
			if (empty($bagianWhere1))
			{
				$bagianWhere1 .= "kamar_tidur $kamar_tidur";
			}
			else
			{
				$bagianWhere1 .= " AND kamar_tidur $kamar_tidur";
			}
		}
	}
	if (empty($bagianWhere1)){
		$bagianWhere1 = "1";
	}
	include "admin/koneksi.php";
		$dataPerPage = 2;
		if(isset($_GET['page'])){
			$noPage = $_GET['page'];
		} else $noPage = 1;
		$offset = ($noPage - 1) * $dataPerPage;
						
	$q1= "SELECT * From properti WHERE ".$bagianWhere;
	//echo "SELECT * From properti WHERE ".$bagianWhere;
	$q2= "SELECT * From fasilitas WHERE ".$bagianWhere1;
	//echo "SELECT * From properti WHERE ".$bagianWhere1;
			$query=mysqli_query($con,"SELECT * From properti WHERE ".$bagianWhere);
			while ($hasil=mysqli_fetch_array($query)){
				$lokasi = $hasil['lokasi'];
				$id_fasilitas1 = $hasil['id_fasilitas'];		
				//echo $id_fasilitas1."--><br> ";
				
					$query2=mysqli_query($con,"SELECT * From fasilitas where ".$bagianWhere1);					
					while ($hasil2=mysqli_fetch_array($query2)){
						$garasi = $hasil2['garasi'];
						$id_fasilitas = $hasil2['id_fasilitas'];
						$kamar_mandi = $hasil2['kamar_mandi'];
						$kamar_tidur = $hasil2['kamar_tidur'];
						$luas_bangunan = $hasil2['luas_bangunan'];
						$carport= $hasil2['carport'];
						$listrik= $hasil2['listrik'];
						$air= $hasil2['air'];
						$listrik= $hasil2['listrik'];
						$garasi= $hasil2['garasi'];
						$hadap= $hasil2['hadap'];
						$sertifikat= $hasil2['sertifikat'];
										
						if($id_fasilitas==$id_fasilitas1){							
							$query3=mysqli_query($con,"SELECT * From properti where id_fasilitas='$id_fasilitas1'");
							while ($hasil3=mysqli_fetch_array($query3)){
								$id_owner=$hasil3['id_owner'];
								$id_properti=$hasil3['id_properti'];
								$status =addslashes(strip_tags($hasil3['status']));
								$pilihan=$hasil3 ['pilihan'];
								$fee_agen=$hasil3 ['fee_agen'];
								$kategori =addslashes(strip_tags($hasil3['kategori']));
								$judul =addslashes(strip_tags($hasil3['judul']));
								$pilihan =addslashes(strip_tags($hasil3['pilihan']));
								$harga =addslashes(strip_tags($hasil3['harga']));
								$luas_tanah =addslashes(strip_tags($hasil3['luas_tanah']));
								$lokasi =addslashes(strip_tags($hasil3['kecamatan']));
								$kota =addslashes(strip_tags($hasil3['kota']));
								$gambar = ($hasil3['gambar']);
								
								$query4=mysqli_query($con,"SELECT * From owner where id_owner='$id_owner'");
								while ($hasil4=mysqli_fetch_array($query4)){
									//data di sini
								?>									
								<div class="col-sm-4">
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
														
								<?php
								}
							}
							//dan di sini
						}		
					}
			}
					if ((empty(mysqli_num_rows($query))) or (empty(mysqli_num_rows($query2))))
					{
						echo "<h2><center>DATA TIDAK DITEMUKAN</center></h2>";
					}
				?>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="left-sidebar">
						<div class="contact-form">
	    				<h2 class="title text-center">Cari Properti</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="POST" action="">
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