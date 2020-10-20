<!DOCTYPE html>
<html lang="en">
<?php
include "include/cek-login.php";
include "include/header.php";
include "include/koneksi.php";
include "include/konfirmasi.php";
//include "include/konfirmasi.php";
?>
<!--
<script type="text/javascript" src="inc/my.js"></script>
<script type="text/javascript" src="inc/jquery.min.js"></script>
<script type="text/javascript" src="inc/jquery.validate.min.js"></script>		
	date Pick-->
	<script src="jquery-1.11.0.js"></script>
	<script src="bootstrap.js"></script>	
	<!---->	

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" > <img alt="" src="img/icon.jpg" class="hidden-xs"/>
                <span>Indonesia</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo $_SESSION['username'];?></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li class="divider"></li>
                    <li><a href="rusak.php">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Ganti Tema</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>
            <!-- theme selector ends -->

        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
		<?php
			include "menu.php";
		?>
        <!-- left menu ends -->

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            Home
        </li>
        <li>
            Input Data
        </li>
    </ul>
</div>
<?php
	if (isset($_GET['gagal']))
		{
	?>		
			<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>OPPSS!!!</strong> Input Data Gagal, Silahkan Masukkan Owner / Developer, jika tidak ada maka tambahkan <a class="tambah-owner">Di Sini</a>
			</div>
	<?php
		}
	?>
	<?php
	if (isset($_GET['gagallokasi']))
		{
	?>		
			<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>OPPSS!!!</strong> Input Data Gagal, Provinsi, kota, kecamatan, atau kelurahan belum diisi</a>
			</div>
	<?php
		}
	?>
<script type="text/javascript">
function pilih_kota(prop)
{
	$.ajax({
        url: 'daerah/kota.php',
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
        url: 'daerah/kecamatan.php',
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
        url: 'daerah/kelurahan.php',
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
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Form Input Data</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                            <form action="" method="POST" name="input">
							<div class="form-group col-md-6">
								<label><input type="checkbox" name="tanggal1Cat"/> Dari Tanggal</label>
									<input type="text" Placeholder="Tahun/bulan/tanggal" id="datepicker" name="tanggal1" class="form-control"/>
							</div>
							<div class="form-group col-md-6">
								<label><input type="checkbox" name="tanggal2Cat"/> Sampai Tanggal</label>
									<input type="text" Placeholder="Tahun/bulan/tanggal" id="datepicker2" name="tanggal2" class="form-control"/>
							</div>
							<div class="form-group col-md-3">
							<label><input type="checkbox" name="sertifikatCat"/> Sertifikat</label>
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
							<div class="form-group col-md-3">
								<label class="control-label" for="selectError"><input type="checkbox" name="kategoriCat"/> Jenis</label> 
								<div >								
									<select name="kategori" class="form-control" id="selectError" data-rel="chosen">
										<option value="#">Pilih</option>	
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
							</div>
							<div class="form-group col-md-6">
							<label><input type="checkbox" checked disabled name=""/> Provinsi</label>
								<select name="prop" onchange="pilih_kota(this.value);" class="form-control" id="selectError" data-rel="chosen" >
									<option value="#">Pilih Provinsi</option>
									<?php 
											  include 'koneksi2.php';
											  $query4=mysqli_query($con2,"SELECT id as id_prov,name as nama FROM provinsi ORDER BY name");?>	
											  <?php while ($data= mysqli_fetch_array($query4)){
												?>
												<option value="<?=$data['id_prov']?>"><?=$data['nama']?></option>;
												<?php
												}
											  ?>
								</select>
							</div>
							
							<div class="form-group col-md-3">
							<label><input type="checkbox" checked disabled name=""/> Kota / Kab</label>
								<select name="kota" id="dom_kota" onchange="pilih_kec(this.value)" class="form-control">
									<option value="" selected >Pilih Kota</option>
								<select>
							</div>
							<div class="form-group col-md-3">
							<label><input type="checkbox" name="kecCat"/> Kecamatan</label>
								<select name="kec" id="dom_kec" onchange="pilih_kel(this.value)"  class="form-control" >
									<option value="#" selected>Pilih Kecamatan</option>
								<select>
							</div>
							<div class="form-group col-md-3">
							<label><input type="checkbox" checked disabled name=""/> Kelurahan</label>
								<select name="kel" id="dom_kel"  class="form-control" >
									<option value="" selected>Pilih Kelurahan</option>
								<select>
							</div>
							
							<div class="form-group col-md-3">
							<label><input type="checkbox" name="jumlah_lantaiCat"/> Jumlah Lantai</label>
								<select name="jumlah_lantai" class="form-control" >
									<option value="#" selected>Pilih Jumlah Lantai</option>
									<option value=">0" > ≥ 1</option>
									<option value=">1" > ≥ 2</option>
									<option value=">2" > ≥ 3</option>
									<option value=">3" > ≥ 4</option>
									<option value=">4" > ≥ 5</option>
									<option value=">5" > ≥ 6</option>
								<select>
							</div>
							<div class="form-group col-md-3">
							<label><input type="checkbox" name="kamar_mandiCat"/> Kamar Mandi</label>
								<select name="kamar_mandi" class="form-control" >
									<option value="#" selected>Pilih Kamar Mandi</option>
									<option value=">0" > ≥ 1</option>
									<option value=">1" > ≥ 2</option>
									<option value=">2" > ≥ 3</option>
									<option value=">3" > ≥ 4</option>
									<option value=">4" > ≥ 5</option>
									<option value=">5" > ≥ 6</option>
								<select>
							</div>
							<div class="form-group col-md-3">
							<label><input type="checkbox" name="kamar_tidurCat"/> Kamar Tidur</label>
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
							<div class="form-group col-md-3">
							<label><input type="checkbox" name="garasiCat"/> Garasi</label>
								<select name="garasi" class="form-control" >
									<option value="#" selected>Pilih Garasi</option>
									<option value=">0" > ≥ 1</option>
									<option value=">1" > ≥ 2</option>
									<option value=">2" > ≥ 3</option>
									<option value=">3" > ≥ 4</option>
									<option value=">4" > ≥ 5</option>
									<option value=">5" > ≥ 6</option>
								<select>
							</div>
							<div class="form-group col-md-3">
							<label><input type="checkbox" name="hadapCat"/> Hadap</label>
                                <select name="hadap" class="form-control" id="selectError">																		
										<option value="#">Pilih Hadap</option>
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
							
							<div class="form-group col-sm-3">
							<label><input type="checkbox" name="luas_tanahCat"/> Luas Tanah</label>
                                <select name="luas_tanah" class="form-control" >
									<option value="#" selected>Pilih Luas</option>
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
							<div class="form-group col-sm-3">
							<label><input type="checkbox" name="luas_bangunanCat"/> Luas Bangunan</label>
                                <select name="luas_bangunan" class="form-control" >
									<option value="#" selected>Pilih Luas</option>
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
							<div class="form-group col-md-3">
							<label><input type="checkbox"  name="hargaCat"/> Harga</label>
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
							<div class="form-group col-md-3">
							<label><input type="checkbox"  name="userCat"/> Agen / Admin</label>
								<select name="user"  class="form-control" >
									<option value="#" selected>Pilih Agen / Admin</option>
									<option value="id_user<>'SUPERUSER'" >ALL Agen</option>
									<option value="1">ALL Properti</option>
									<?php
									include "koneksi.php";
										$qu=mysqli_query($con,"SELECT * FROM user where id_status='S003' or id_status='S005'");
										while ($ha=mysqli_fetch_array($qu)){
									?>
									<option value="id_user='<?=$ha['id_user']?>'"><?=$ha['nama']?></option>
									<?php
										}
									?>
								<select>
							</div>
							<div class="form-group col-md-3">
							<label><input type="checkbox" name="carportCat"/> Carport</label>
								<select name="carport" class="form-control" id="selectError1" data-rel="chosen" >
										<option value="#">Pilih</option>	
										<option value="Ada">Ada</option>
										<option value="Tidak Ada">Tidak Ada</option>
										
								</select>
                            </div>
							<div class="form-group col-md-3">
							<label><input type="checkbox" name="listrikCat"/> Data Listrik</label>
                                <select name="listrik" class="form-control" id="selectError" data-rel="chosen" >
										<option value="#">Pilih</option>	
										<option value="450">450 W</option>
										<option value="900">900 W</option>
										<option value="1300">1300 W</option>
										<option value="2200">2200 W</option>
										<option value="3500">3500 W</option>
										<option value="4400">4400 W</option>
										<option value="5500">5500 W</option>
										<option value="7700">7700 W</option>
										<option value="11000">11000 W</option>
										<option value="13900">13900 W</option>
										<option value="17000">17000 W</option>
										<option value="22000">22000 W</option>
										<option></option>
								</select>
                            </div>
							
							<div class="form-group col-md-3">
							<label><input type="checkbox" name="airCat"/> Air</label>
                                <select name="air" class="form-control" id="selectError" data-rel="chosen" >
										<option value="#">Pilih</option>										
										<option value="Ada">Ada</option>										
										<option value="Tidak ada">Tidak Ada</option>										
								</select>
                            </div>
							<div class="form-group col-md-3">
							<label><input type="checkbox" name="pilihanCat"/> Pilihan</label>
                                <select name="pilihan" class="form-control" id="selectError" data-rel="chosen" >
										<option value="#">Pilih</option>	
										<option value="Dijual">Dijual</option>										
										<option value="Disewakan">Disewakan</option>									
								</select>
                            </div>	
					<input type="submit" class="btn btn-lg btn-primary" name="submit" value="Simpan" />
					<input type="reset" class="btn btn-lg btn-default" name="reset" value="Reset"/>
					
                </form>
            </div><!--Conten AKhir-->
        </div>
    </div>
    <!--/span-->
	<div class="box col-md-12">
		<div class="box-inner">
			<div class="box-header well" data-original-title="">
				<h2><i class="glyphicon glyphicon-user"></i> Tampil Data</h2>
				<div class="box-icon">            
					<a href="#" class="btn btn-minimize btn-round btn-default"><i
						class="glyphicon glyphicon-chevron-up"></i></a>
					<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
				</div>
			</div>
			<div class="box-content">	
	<?php
		if (isset($_POST['submit'])){
		include "koneksi.php";
		$id_user=$_SESSION['id_user'];
		$query=mysqli_query($con,"SELECT * FROM properti WHERE status='Terjual' AND id_user='$id_user'");
		$terjual=mysqli_num_rows($query);
		$query=mysqli_query($con,"SELECT * FROM properti WHERE status='Disewa' AND id_user='$id_user'");
		$disewa=mysqli_num_rows($query);
		$query=mysqli_query($con,"SELECT status FROM properti WHERE status='Tersedia' AND id_user='$id_user'");
		$ada=mysqli_num_rows($query);
	$no = 1;?>
	<?php	
		echo "<table class='table responsive table-condensed table-striped datatable'>";	
		echo"<thead>
		<tr>
        <th id='th'><center>No</center></th>
        <th id='th'>Tanggal</th>
        <th id='th'>Judul</th>
        <th id='th'>Pemilik</th>
		<th id='th'>Status</th>
		<th id='th'>Harga</th>
		<th id='th'>Kategori</th>
		<th id='th'>Luas Tanah</th>
		</tr>
	</thead>";
	//Bagian Properti
	$tanggal1="2XXX/00/00";
	$tanggal2="2XXX/00/00";
	$bagianWhere = "";
	if (isset($_POST['tanggal1Cat']))
	{
		$tanggal1=$_POST['tanggal1'];
		if (empty($bagianWhere))
		{
			$bagianWhere .= "tanggal_dibuat > '$tanggal1'";
		}
		else
		{
			$bagianWhere .= " AND tanggal_dibuat > '$tanggal1'";
		}
	}	
	if (isset($_POST['tanggal2Cat']))
	{
		$tanggal1=$_POST['tanggal1'];
		$tanggal2=$_POST['tanggal2'];
		if ($tanggal1>$tanggal2){
			$tanggal2=$tanggal1;
		}
		if (empty($bagianWhere))
		{
			$bagianWhere .= "tanggal_dibuat < '$tanggal2 23:59'";
		}
		else
		{
			$bagianWhere .= " AND tanggal_dibuat < '$tanggal2 23:59'";
		}
	}
	if (isset($_POST['kategoriCat']))
	{
		$kategori = $_POST['kategori'];
		if (empty($bagianWhere))
		{
			$bagianWhere .= "kategori ='$kategori'";
		}
		else
		{
			$bagianWhere .= " AND kategori ='$kategori'";
		}
	}
	if (isset($_POST['kecCat']))
	{
		$kec = $_POST['kec'];
		if (empty($bagianWhere))
		{
			$bagianWhere .= "kecamatan ='$kec'";
		}
		else
		{
			$bagianWhere .= " AND kecamatan='$kec'";
		}
	}
	if (isset($_POST['pilihanCat']))
	{
		$pilihan = $_POST['pilihan'];
		if (empty($bagianWhere))
		{
			$bagianWhere .= "pilihan ='$pilihan'";
		}
		else
		{
			$bagianWhere .= " AND pilihan='$pilihan'";
		}
	}
	if (isset($_POST['luas_tanahCat']))
	{
		$luas_tanah = $_POST['luas_tanah'];
		if (empty($bagianWhere))
		{
			$bagianWhere .= "luas_tanah $luas_tanah";
		}
		else
		{
			$bagianWhere .= " AND luas_tanah $luas_tanah";
		}
	}
	if (isset($_POST['hargaCat']))
	{
		$harga = $_POST['harga'];
		if (empty($bagianWhere))
		{
			$bagianWhere .= "harga $harga";
		}
		else
		{
			$bagianWhere .= " AND harga $harga";
		}
	}
	if (isset($_POST['userCat']))
	{
		$user= $_POST['user'];
		if (empty($bagianWhere))
		{
			$bagianWhere .= " $user";
		}
		else
		{
			$bagianWhere .= " AND $user";
		}
	}

	if (empty($bagianWhere)){
		$bagianWhere = "id_user='$id_user'";
	}
	//Fasilitas
	$bagianWhere1 = "";	
	if (isset($_POST['carportCat']))
	{
		$carport = $_POST['carport'];
		if (empty($bagianWhere1))
		{
			$bagianWhere1 .= "carport ='$carport'";
		}
		else
		{
			$bagianWhere1 .= " AND carport='$carport'";
		}
	}
	if (isset($_POST['listrikCat']))
	{
		$listrik = $_POST['listrik'];
		if (empty($bagianWhere1))
		{
			$bagianWhere1 .= "listrik='$listrik'";
		}
		else
		{
			$bagianWhere1 .= " AND listrik='$listrik'";
		}
	}
	if (isset($_POST['airCat']))
	{
		$air = $_POST['air'];
		if (empty($bagianWhere1))
		{
			$bagianWhere1 .= "air='$air'";
		}
		else
		{
			$bagianWhere1 .= " AND air='$air'";
		}
	}
	if (isset($_POST['sertifikatCat']))
	{
		$sertifikat = $_POST['sertifikat'];
		if (empty($bagianWhere1))
		{
			$bagianWhere1 .= "sertifikat='$sertifikat'";
		}
		else
		{
			$bagianWhere1 .= " AND sertifikat='$sertifikat'";
		}
	}
	if (isset($_POST['luas_bangunanCat']))
	{
		$luas_bangunan = $_POST['luas_bangunan'];
		if (empty($bagianWhere1))
		{
			$bagianWhere1 .= "luas_bangunan $luas_bangunan";
		}
		else
		{
			$bagianWhere1 .= " AND luas_bangunan $luas_bangunan";
		}
	}
	if (isset($_POST['kamar_mandiCat']))
	{
		$kamar_mandi = $_POST['kamar_mandi'];
		if (empty($bagianWhere1))
		{
			$bagianWhere1 .= "kamar_mandi $kamar_mandi";
		}
		else
		{
			$bagianWhere1 .= " AND kamar_mandi $kamar_mandi";
		}
	}
	if (isset($_POST['garasiCat']))
	{
		$garasi = $_POST['garasi'];
		if (empty($bagianWhere1))
		{
			$bagianWhere1 .= "garasi $garasi";
		}
		else
		{
			$bagianWhere1 .= " AND garasi $garasi";
		}
	}
	if (isset($_POST['kamar_tidurCat']))
	{
		$kamar_tidur = $_POST['kamar_tidur'];
		if (empty($bagianWhere1))
		{
			$bagianWhere1 .= "kamar_tidur $kamar_tidur";
		}
		else
		{
			$bagianWhere1 .= " AND kamar_tidur $kamar_tidur";
		}
	}
	if (empty($bagianWhere1)){
		$bagianWhere1 = " 1";
	}
	$q1= "SELECT * From properti WHERE ".$bagianWhere;
	//echo "SELECT * From properti WHERE ".$bagianWhere;
	$q2= "SELECT * From fasilitas WHERE ".$bagianWhere1;

			$query=mysqli_query($con,"SELECT * From properti WHERE ".$bagianWhere);
			while ($hasil=mysqli_fetch_array($query)){
				$lokasi = $hasil['lokasi'];
				$id_fasilitas1 = $hasil['id_fasilitas'];		
				//echo $id_fasilitas1."--><br> ";
				
					$query2=mysqli_query($con,"SELECT * From fasilitas where ".$bagianWhere1);
					while ($hasil2=mysqli_fetch_array($query2)){
						$garasi = $hasil2['garasi'];
						$id_fasilitas = $hasil2['id_fasilitas'];
						if($id_fasilitas==$id_fasilitas1){							
							$query3=mysqli_query($con,"SELECT * From properti where id_fasilitas='$id_fasilitas1'");
							while ($hasil3=mysqli_fetch_array($query3)){
								$id_owner=$hasil3['id_owner'];
								$query4=mysqli_query($con,"SELECT * From owner where id_owner='$id_owner'");
								while ($hasil4=mysqli_fetch_array($query4)){
							echo "<td><center>".$no."</center></td>";	
							echo "<td>".$hasil3['tanggal_dibuat']."</td>";
							echo "<td>".$hasil3['judul']."</td>";
							echo "<td>".$hasil4['nama']."</td>";	
							echo "<td>".$hasil3['status']."</td>";	
							echo "<td>Rp ".number_format($hasil3['harga'],0,'.','.')."</td>";	
							echo "<td>".$hasil3['kategori']."</td>";	
							echo "<td>".number_format($hasil3['luas_tanah'],0,'.','.')." m<sup>2</sup></td>";									
							$no++;		
							}}
							echo "</tr>";
						}		
					}
			}
	?>
	
    </tbody></table>
	<form role="form"  action="laporan/laporancari.php" method="POST" name="input">
                    <input type="hidden" name="tanggal1" value="<?=$tanggal1?>" ></input>
                    <input type="hidden" name="tanggal2" value="<?=$tanggal2?>" ></input>
                    <input type="hidden" name="kueri1" value="<?=$q1?>" ></input>
                    <input type="hidden" name="kueri2" value="<?=$q2?>" ></input>
					<input type="hidden" name="ada" value="<?=$ada?>"/></input>
                    <input type="hidden" name="terjual" value="<?=$terjual?>"/></input>
                    <input type="hidden" name="disewa" value="<?=$disewa?>"/></input>
                    <input type="hidden" name="total" value="<?=$ada+$terjual+$disewa?>"/></input>
                    <input type="hidden" name="id_user" value="<?=$_SESSION['id_user']?>" ></input>
                    <input type="hidden" name="username" value="<?=$_SESSION['username']?>"></input>
                    <center><input type="submit" name="submit" value="Export To : Excell" class="btn btn-success" /></center><br>
				</form>		
    <?php	
	}				
	?>	
		</div>
    </div>
<!-- tabel Akhir-->
	
    </div><!--/#content.col-md-0-->
</div><!--/row-->

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Tambah Jenis / Kategori</h3>
                </div>
                <div class="modal-body">
                    <p>Silahkan Tambahkan Jenis di Sini</p>
                </div>
                <div class="modal-footer">
				<form role="form" action="tambah_kategori.php" method="POST" name="input_kategori">
					<input type="text" name="kategori_baru" class="form-control"  maxlength="30"/><br>
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <input type="submit" class="btn btn-primary" name="input_kategori" value="Simpan"/>
                </form>
				</div>
            </div>
        </div>
    </div>    
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Tambah Owner / Developer</h3>
                </div>
                <div class="modal-body">
                <form role="form" action="tambah_owner.php" method="POST" name="input_kategori">
				Nama : <br>
				<input type="text" name="nama_owner" class="form-control"  /><br>
				Alamat : <br>
				<input type="text" name="alamat_owner" class="form-control"  /><br>
				Nomor Hp : <br>
				<input type="number" name="nomor_hp_owner" class="form-control"  /><br>
                </div>
                <div class="modal-footer">					
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <input type="submit" class="btn btn-primary" name="input_owner" value="Simpan"/>
                </form>
				</div>
            </div>
        </div>
    </div>
	<script>
        $(function(){
            $(document).on('click','.tambah-owner',function(e){
                e.preventDefault();
                $("#myModal2").modal('show');
                });
        });
    </script>
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <hr>

</div>
<?php
include "include/footer.php";
?>
</body>
</html>