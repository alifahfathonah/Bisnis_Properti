<?php
	include "include/cek-login.php";
	include "include/konfirmasi.php";
?>
<!DOCTYPE html>
<html lang="en">
	<script src="jquery-1.11.0.js"></script>
    <script src="bootstrap.js"></script>
<?php
include "include/header.php";
?>

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
            Tampil Data
        </li>
    </ul>
	
	<?php
	if (isset($_GET['sukses']))
		{
	?>		
			<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Selamat!</strong> Data Sudah Berhasil Ditambahkan
			</div>
	<?php
		}
	else if (isset($_GET['hapus']))
	{
	?>
		<div class="alert alert-warning">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Operasi Sukses</strong> Data Sudah dipindahkan Ke <a href="sementara.php">Recycle</a>
		</div>
		<?php
		}
	else if (isset($_GET['edit']))
	{
	?>
		<div class="alert alert-info">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Operasi Sukses</strong> Data Sudah Berhasil DiUpdate / Diperbaharui
		</div>
	<?php
		}
	?>	
</div>
				<form id="formalin" role="form"  action="" method="POST" name="input">				
							<div class="col-md-12">
								<div class="form-group col-md-4">
								<label>Dari</label>
									<input type="text" Placeholder="Tahun/bulan/tanggal" id="datepicker" name="tanggal1" class="form-control" required />
								</div>
								<div class="form-group col-md-4">
								<label>Sampai</label>
									<input type="text" Placeholder="Tahun/bulan/tanggal" id="datepicker2" name="tanggal2" class="form-control" required />
								</div>
								<div class="form-group col-md-2">
								<label> &nbsp </label>
									<input type="hidden" name="id_user" value="<?=$_SESSION['id_user']?>" ></input>
									<input type="hidden" name="id_status" value="<?=$_SESSION['id_status']?>"></input>
									<input type="submit" name="submit" value="Tampilkan" class="form-control btn btn-info" />
								</div>
                                          
				</form>	
							<form id="formalin" role="form"  action="" method="POST" name="input2">
											<div class="form-group col-md-2">
											<label> &nbsp </label>
												<input type="hidden" name="id_user" value="<?=$_SESSION['id_user']?>" ></input>
												<input type="hidden" name="id_status" value="<?=$_SESSION['id_status']?>"></input>
												<input type="submit" name="submit2" value="Tampil Semua data" class="form-control btn btn-info" />
											</div>	
							</form>	
							</div>  							
<div class="row">
    <div class="box col-md-12">
		<div class="box-inner">
			<div class="box-header well" data-original-title="">
				<h2><i class="glyphicon glyphicon-user"></i> Laporan Data Properti</h2>
				<div class="box-icon">            
					<a href="#" class="btn btn-minimize btn-round btn-default"><i
						class="glyphicon glyphicon-chevron-up"></i></a>
					<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
				</div>
			</div>
			<div class="box-content">			
	
	<?php
		if ((isset($_POST['submit'])) or (isset($_POST['submit2']))){
		include "koneksi.php";
		$id_user=$_SESSION['id_user'];
		$query=mysqli_query($con,"SELECT * FROM properti WHERE status='Terjual' AND id_user='$id_user'");
		$terjual=mysqli_num_rows($query);
		$query=mysqli_query($con,"SELECT * FROM properti WHERE status='Disewa' AND id_user='$id_user'");
		$disewa=mysqli_num_rows($query);
		$query=mysqli_query($con,"SELECT status FROM properti WHERE status='Tersedia' AND id_user='$id_user'");
		$ada=mysqli_num_rows($query);
	$no = 1;
	if (isset($_POST['submit'])){
	$tanggal1=$_POST['tanggal1'];
		$tanggal2=$_POST['tanggal2'];
		if ($tanggal1>$tanggal2){
			$tanggal2=$tanggal1;
		}
	$query = mysqli_query($con,"SELECT * FROM properti WHERE keaktifan=1 AND id_user='$id_user' AND tanggal_dibuat >'$tanggal1' AND tanggal_dibuat<'$tanggal2 23:59:59' ORDER BY 'id_properti' ASC");
	?>
	<form id="formalin" role="form"  action="laporan/propertiadmin.php" method="POST" name="input">
                    <input type="hidden" name="ada" value="<?=$ada?>"/></input>
                    <input type="hidden" name="terjual" value="<?=$terjual?>"/></input>
                    <input type="hidden" name="disewa" value="<?=$disewa?>"/></input>
                    <input type="hidden" name="total" value="<?=$ada+$terjual+$disewa?>"/></input>
                    <input type="hidden" name="tanggal1" value="<?=$tanggal1?>"/></input>
                    <input type="hidden" name="tanggal2" value="<?=$tanggal2?>"/></input>
                    <input type="hidden" name="id_user" value="<?=$_SESSION['id_user']?>" ></input>
                    <input type="hidden" name="id_status" value="<?=$_SESSION['id_status']?>"></input>
                    <center><input type="submit" name="submit" value="Export To : Excell" class="btn btn-success" /></center><br>
				</form>	
	<?php
	}	
	else if (isset($_POST['submit2'])){
		$query = mysqli_query($con,"SELECT * FROM properti WHERE keaktifan=1 AND id_user='$id_user' ORDER BY 'id_properti' ASC");	
	?>		
				<form id="formalin" role="form"  action="laporan/propertiadminall.php" method="POST" name="input">
                    <input type="hidden" name="ada" value="<?=$ada?>"/></input>
                    <input type="hidden" name="terjual" value="<?=$terjual?>"/></input>
                    <input type="hidden" name="disewa" value="<?=$disewa?>"/></input>
                    <input type="hidden" name="total" value="<?=$ada+$terjual+$disewa?>"/></input>
                    <input type="hidden" name="id_user" value="<?=$_SESSION['id_user']?>" ></input>
                    <input type="hidden" name="id_status" value="<?=$_SESSION['id_status']?>"></input>
                    <center><input type="submit" name="submit" value="Export To : Excell" class="btn btn-success" /></center><br>
				</form>				
		<?php
		}
echo "<table class='table responsive table-condensed table-striped datatable'>";		
	echo"<thead>
		<tr>
        <th id='th'><center>No</center></th>
        <th id='th'><center>Tanggal</center></th>
        <th id='th'><center>Status</center></th>
		<th id='th'>Agen</th>
		<th id='th'>Luas Tanah</th>
		<th id='th'>Kategori</th>
		<th id='th'>Harga</th>
		<th id='th'>Lokasi</th>
		</tr>
	</thead>";
    while($hasil = mysqli_fetch_array($query)) 
    {   $id_properti = $hasil['id_properti'];
		$id_fasilitas = $hasil['id_fasilitas'];	
			include "koneksi.php";
				$query2= mysqli_query($con,"SELECT * FROM user WHERE id_user='$id_user'");
				if ($query2 === FALSE) {
					die(mysql_error());}
				while ($hasil_user = mysqli_fetch_array($query2)){
				$nama = $hasil_user['nama'];}
					
		$status =addslashes(strip_tags($hasil['status']));
		$luas_tanah=$hasil ['luas_tanah'];
		$tanggal_dibuat=$hasil ['tanggal_dibuat'];
		$kategori =addslashes(strip_tags($hasil['kategori']));
		$judul =addslashes(strip_tags($hasil['judul']));
		$harga =addslashes(strip_tags($hasil['harga']));
		$kecamatan =addslashes(strip_tags($hasil['kecamatan']));
        $gambar = ($hasil['gambar']);
						
							
		include "koneksi2.php";
		$lokasi = "";
		$query_id= mysqli_query($con2,"SELECT name as nama FROM kecamatan WHERE id='$kecamatan'");
		if (!$query_id) {
			printf("Error: %s\n", mysqli_error($con2));
			exit();
		}
		while($hasil_id = mysqli_fetch_array($query_id))
				{
					$lokasi = $hasil_id['nama'];
				}		
		echo"<td >$no</td>
			<td >$tanggal_dibuat</td>
			<td >$status</td>
			<td >$nama</td>
			<td >$luas_tanah</td>
			<td >$kategori</td>
			<td >RP ".number_format($harga,0,',','.')."</td>
			<td >$lokasi</td>
		</tr>";	
        
    $no++;
    }	
	?>
    </tbody>
    <?php
				}
				?></table>		
		</div>
    </div>
</div>
<!-----------------------------------------------DATA AGEN ------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------>
    <div class="box col-md-12">
		<div class="box-inner">
			<div class="box-header well" data-original-title="">
				<h2><i class="glyphicon glyphicon-user"></i> Laporan Data Agen</h2>
				<div class="box-icon">            
					<a href="#" class="btn btn-minimize btn-round btn-default"><i
						class="glyphicon glyphicon-chevron-up"></i></a>
					<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
				</div>
			</div>
			<div class="box-content">	
	<?php
		if ((isset($_POST['submit'])) or (isset($_POST['submit2']))){
		include "koneksi.php";
		$id_user=$_SESSION['id_user'];
	$no = 1;
	if (isset($_POST['submit'])){
	$tanggal1=$_POST['tanggal1'];
		$tanggal2=$_POST['tanggal2'];
		if ($tanggal1>$tanggal2){
			$tanggal2=$tanggal1;
		}
	$query = mysqli_query($con,"SELECT * FROM user WHERE id_status='S003' AND tanggal_user >'$tanggal1' AND tanggal_user<'$tanggal2 23:59:59' ORDER BY 'tanggal_user' DESC");
	?>
	<form action="laporan/dataagen.php" method="POST" name="input">
                    <input type="hidden" name="tanggal1" value="<?=$tanggal1?>"/></input>
                    <input type="hidden" name="tanggal2" value="<?=$tanggal2?>"/></input>
                    <input type="hidden" name="id_user" value="<?=$_SESSION['id_user']?>" ></input>
                    <input type="hidden" name="id_status" value="<?=$_SESSION['id_status']?>"></input>
                    <center><input type="submit" name="submit" value="Export To : Excell" class="btn btn-success" /></center><br>
				</form>	
	<?php
	}	
	else if (isset($_POST['submit2'])){
		$query = mysqli_query($con,"SELECT * FROM user WHERE id_status='S003' ORDER BY 'tanggal_user' DESC");	
	?>		
				<form action="laporan/dataagenall.php" method="POST" name="input">
                    <input type="hidden" name="id_user" value="<?=$_SESSION['id_user']?>" ></input>
                    <input type="hidden" name="id_status" value="<?=$_SESSION['id_status']?>"></input>
                    <center><input type="submit" name="submit" value="Export To : Excell" class="btn btn-success" /></center><br>
				</form>				
		<?php
		}
		echo "<table class='table responsive table-condensed table-striped datatable'>";	
	echo"<thead>
		<tr>
        <th id='th'><center>No</center></th>
        <th id='th'><center>Tanggal</center></th>
        <th id='th'><center>Nama</center></th>
		<th id='th'>Alamat</th>
		<th id='th'>Email</th>
		<th id='th'>Nomor Hp</th>
		<th id='th'>Pendapatan</th>
		</tr>
	</thead>";
	$sesi= $_POST['id_user'];
    while($hasil = mysqli_fetch_array($query)) 
    {   $id_user = $hasil['id_user'];
		$nama = $hasil['nama'];		
		$alamat = $hasil['alamat'];
		$jenis_kelamin = $hasil['jenis_kelamin'];
		$email = stripslashes ($hasil['email']);
		$nomor_hp = stripslashes ($hasil['nomor_hp']);
		$id_status = $hasil['id_status'];
		$tanggal_user = $hasil['tanggal_user'];
		$id_dokumen = $hasil['id_dokumen'];
		$pendapatan = $hasil['pendapatan'];		
		

		echo"<td >$no</td>
			<td >$tanggal_user</td>
			<td >$nama</td>
			<td >$alamat</td>
			<td >$email</td>
			<td >$nomor_hp</td>
			<td >Rp ".number_format($pendapatan,0,',','.')."</td>
		</tr>";	
        
    $no++;
    }	
	?>
    </tbody>
    <?php
				}
				?></table>		
		</div>
    </div>
<!-- tabel Akhir-->
	
    </div><!--/#content.col-md-0-->
	
	<!---------------------------------------------------DATA PENGUNJUNG------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------>
    <div class="box col-md-12">
		<div class="box-inner">
			<div class="box-header well" data-original-title="">
				<h2><i class="glyphicon glyphicon-user"></i> Laporan Data Pengunjung</h2>
				<div class="box-icon">            
					<a href="#" class="btn btn-minimize btn-round btn-default"><i
						class="glyphicon glyphicon-chevron-up"></i></a>
					<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
				</div>
			</div>
			<div class="box-content">	
	<?php
		if ((isset($_POST['submit'])) or (isset($_POST['submit2']))){
		include "koneksi.php";
		$id_user=$_SESSION['id_user'];
	$no = 1;
	if (isset($_POST['submit'])){
	$tanggal1=$_POST['tanggal1'];
		$tanggal2=$_POST['tanggal2'];
		if ($tanggal1>$tanggal2){
			$tanggal2=$tanggal1;
		}
				$kemarin  = date("Y-m-d",mktime(0,0,0,date('m'),date('d')-1,date('Y')));
				$bulan  = date("m");
				$tahun  = date("Y");
				$query1=mysqli_query($con,"SELECT * FROM counter WHERE id_user='$id_user' AND tanggal_counter>'".date("Y-m-d")."'");
				$data1=mysqli_num_rows($query1);
				$query1=mysqli_query($con,"SELECT * FROM counter WHERE id_user='$id_user' AND tanggal_counter>'$kemarin' AND tanggal_counter<'".date("Y-m-d")."'");
				$data2=mysqli_num_rows($query1);
				$query1=mysqli_query($con,"SELECT * FROM counter WHERE id_user='$id_user' AND tanggal_counter>'$tahun-$bulan-00'");
				$data3=mysqli_num_rows($query1);
				$query1=mysqli_query($con,"SELECT * FROM counter WHERE id_user='$id_user' AND tanggal_counter>'$tahun-00-00'");
				$data4=mysqli_num_rows($query1);
				$query1=mysqli_query($con,"SELECT * FROM counter WHERE id_user='$id_user'");
				$data5=mysqli_num_rows($query1);
		$query=mysqli_query($con,"SELECT * FROM counter WHERE id_user='$id_user' AND tanggal_counter >'$tanggal1' AND tanggal_counter<'$tanggal2 23:59:59' ORDER BY 'tanggal_counter' DESC");
		$data6=mysqli_num_rows($query);
	?>
	<form action="laporan/datacount.php" method="POST" name="input">
                    <input type="hidden" name="tanggal1" value="<?=$tanggal1?>"/></input>
                    <input type="hidden" name="tanggal2" value="<?=$tanggal2?>"/></input>
                    <input type="hidden" name="data1" value="<?=$data1?>"/></input>
                    <input type="hidden" name="data2" value="<?=$data2?>"/></input>
                    <input type="hidden" name="data3" value="<?=$data3?>"/></input>
                    <input type="hidden" name="data4" value="<?=$data4?>"/></input>
                    <input type="hidden" name="data5" value="<?=$data5?>"/></input>
                    <input type="hidden" name="data6" value="<?=$data6?>"/></input>
                    <input type="hidden" name="id_user" value="<?=$_SESSION['id_user']?>" ></input>
                    <input type="hidden" name="id_status" value="<?=$_SESSION['id_status']?>"></input>
                    <center><input type="submit" name="submit" value="Export To : Excell" class="btn btn-success" /></center><br>
				</form>	
	<?php
	}	
	else if (isset($_POST['submit2'])){
		$kemarin  = date("Y-m-d",mktime(0,0,0,date('m'),date('d')-1,date('Y')));
				$bulan  = date("m");
				$tahun  = date("Y");
				$query1=mysqli_query($con,"SELECT * FROM counter WHERE id_user='$id_user' AND tanggal_counter>'".date("Y-m-d")."'");
				$data1=mysqli_num_rows($query1);
				$query1=mysqli_query($con,"SELECT * FROM counter WHERE id_user='$id_user' AND tanggal_counter>'$kemarin' AND tanggal_counter<'".date("Y-m-d")."'");
				$data2=mysqli_num_rows($query1);
				$query1=mysqli_query($con,"SELECT * FROM counter WHERE id_user='$id_user' AND tanggal_counter>'$tahun-$bulan-00'");
				$data3=mysqli_num_rows($query1);
				$query1=mysqli_query($con,"SELECT * FROM counter WHERE id_user='$id_user' AND tanggal_counter>'$tahun-00-00'");
				$data4=mysqli_num_rows($query1);
				$query1=mysqli_query($con,"SELECT * FROM counter WHERE id_user='$id_user'");
				$data5=mysqli_num_rows($query1);
		$query=mysqli_query($con,"SELECT * FROM counter WHERE id_user='$id_user' ORDER BY 'tanggal_counter' DESC");
	?>		
				<form action="laporan/datacountall.php" method="POST" name="input">				
                    <input type="hidden" name="data1" value="<?=$data1?>"/></input>
                    <input type="hidden" name="data2" value="<?=$data2?>"/></input>
                    <input type="hidden" name="data3" value="<?=$data3?>"/></input>
                    <input type="hidden" name="data4" value="<?=$data4?>"/></input>
                    <input type="hidden" name="data5" value="<?=$data5?>"/></input>
                    <input type="hidden" name="id_user" value="<?=$_SESSION['id_user']?>" ></input>
                    <input type="hidden" name="id_status" value="<?=$_SESSION['id_status']?>"></input>
                    <center><input type="submit" name="submit" value="Export To : Excell" class="btn btn-success" /></center><br>
				</form>				
		<?php
		}
		echo "<table class='table responsive table-condensed table-striped datatable'>";	
	echo"<thead>
		<tr>
        <th id='th'><center>No</center></th>
        <th id='th'><center>Tanggal</center></th>
        <th id='th'><center>Id Properti</center></th>
		<th id='th'>Browser</th>
		<th id='th'>Ip Address</th>
		</tr>
	</thead>";
	$sesi= $_POST['id_user'];
    while($hasil_count = mysqli_fetch_array($query)) 
    {   $id_user = $hasil['id_user'];
		$browser = $hasil_count['browser'];
						$tanggal_counter = $hasil_count['tanggal_counter'];
						$ip_address = $hasil_count['ip_address'];
						$id_properti = $hasil_count['id_properti'];
						$id_counter = $hasil_count['id_counter'];
		

		echo"<td >$no</td>
			<td >$tanggal_counter</td>
			<td >$id_properti</td>
			<td >$browser</td>
			<td >$ip_address</td>
		</tr>";	
        
    $no++;
    }	
	?>
    </tbody>
    <?php
				}
				?></table>		
		</div>
    </div>
<!-- tabel Akhir-->
	
    </div><!--/#content.col-md-0-->
	
<!-----------------------------------------------KOMISI----------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------>
    <div class="box col-md-12">
		<div class="box-inner">
			<div class="box-header well" data-original-title="">
				<h2><i class="glyphicon glyphicon-user"></i> Laporan Komisi</h2>
				<div class="box-icon">            
					<a href="#" class="btn btn-minimize btn-round btn-default"><i
						class="glyphicon glyphicon-chevron-up"></i></a>
					<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
				</div>
			</div>
			<div class="box-content">	
	<?php
		if ((isset($_POST['submit'])) or (isset($_POST['submit2']))){
		include "koneksi.php";
		$id_user=$_SESSION['id_user'];
	$no = 1;
	if (isset($_POST['submit'])){
	$tanggal1=$_POST['tanggal1'];
		$tanggal2=$_POST['tanggal2'];
		if ($tanggal1>$tanggal2){
			$tanggal2=$tanggal1;
		}
		$kemarin  = date("Y-m-d",mktime(0,0,0,date('m'),date('d')-1,date('Y')));
				$bulan  = date("m");
				$tahun  = date("Y");
				$query1=mysqli_query($con,"SELECT sum(jumlah) AS data1 FROM komisi WHERE id_user='$id_user' AND tanggal_komisi>'".date("Y-m-d")."' GROUP BY id_user");
				$hasil1 = mysqli_fetch_array($query1);
				$data1=$hasil1['data1'];
				$query1=mysqli_query($con,"SELECT sum(jumlah) AS data2 FROM komisi WHERE id_user='$id_user' AND tanggal_komisi>'$kemarin' AND tanggal_komisi<'".date("Y-m-d")."' GROUP BY id_user");
				$hasil1 = mysqli_fetch_array($query1);
				$data2=$hasil1['data2'];
				$query1=mysqli_query($con,"SELECT sum(jumlah) AS data3 FROM komisi WHERE id_user='$id_user' AND tanggal_komisi>'$tahun-$bulan-00' GROUP BY id_user");
				$hasil1 = mysqli_fetch_array($query1);
				$data3=$hasil1['data3'];
				$query1=mysqli_query($con,"SELECT sum(jumlah) AS data4 FROM komisi WHERE id_user='$id_user' AND tanggal_komisi>'$tahun-00-00' GROUP BY id_user");
				$hasil1 = mysqli_fetch_array($query1);
				$data4=$hasil1['data4'];
				$query1=mysqli_query($con,"SELECT sum(jumlah) AS data5 FROM komisi WHERE id_user='$id_user' GROUP BY id_user");
				$hasil1 = mysqli_fetch_array($query1);
				$data5=$hasil1['data5'];
				$query1=mysqli_query($con,"SELECT sum(jumlah) AS data6 FROM komisi WHERE id_user='$id_user' AND tanggal_komisi>'$tanggal1' AND tanggal_komisi<'$tanggal2' GROUP BY id_user");
				$hasil1 = mysqli_fetch_array($query1);
				$data6=$hasil1['data6'];
	$query = mysqli_query($con,"SELECT * FROM komisi WHERE id_user='$id_user' AND tanggal_komisi >'$tanggal1' AND tanggal_komisi<'$tanggal2 23:59:59' ORDER BY 'tanggal_komisi' DESC");
	?>
	<form action="laporan/datakomisi.php" method="POST" name="input">				
                    <input type="hidden" name="data1" value="<?=$data1?>"/></input>
                    <input type="hidden" name="data2" value="<?=$data2?>"/></input>
                    <input type="hidden" name="data3" value="<?=$data3?>"/></input>
                    <input type="hidden" name="data4" value="<?=$data4?>"/></input>
                    <input type="hidden" name="data5" value="<?=$data5?>"/></input>
                    <input type="hidden" name="data5" value="<?=$data6?>"/></input>
                    <input type="hidden" name="tanggal1" value="<?=$tanggal1?>"/></input>
                    <input type="hidden" name="tanggal2" value="<?=$tanggal2?>"/></input>
                    <input type="hidden" name="id_user" value="<?=$_SESSION['id_user']?>" ></input>
                    <input type="hidden" name="id_status" value="<?=$_SESSION['id_status']?>"></input>
                    <center><input type="submit" name="submit" value="Export To : Excell" class="btn btn-success" /></center><br>
				</form>	
	<?php
	}	
	else if (isset($_POST['submit2'])){
		include "koneksi.php";
		$kemarin  = date("Y-m-d",mktime(0,0,0,date('m'),date('d')-1,date('Y')));
				$bulan  = date("m");
				$tahun  = date("Y");
				$query1=mysqli_query($con,"SELECT sum(jumlah) AS data1 FROM komisi WHERE id_user='$id_user' AND tanggal_komisi>'".date("Y-m-d")."' GROUP BY id_user");
				$hasil1 = mysqli_fetch_array($query1);
				$data1=$hasil1['data1'];
				if (empty($data1)){
					$data1="0";
				}
				$query1=mysqli_query($con,"SELECT sum(jumlah) AS data2 FROM komisi WHERE id_user='$id_user' AND tanggal_komisi>'$kemarin' AND tanggal_komisi<'".date("Y-m-d")."' GROUP BY id_user");
				$hasil1 = mysqli_fetch_array($query1);
				$data2=$hasil1['data2'];
				if (empty($data2)){
					$data2="0";
				}
				$query1=mysqli_query($con,"SELECT sum(jumlah) AS data3 FROM komisi WHERE id_user='$id_user' AND tanggal_komisi>'$tahun-$bulan-00' GROUP BY id_user");
				$hasil1 = mysqli_fetch_array($query1);
				$data3=$hasil1['data3'];
				if (empty($data3)){
					$data3="0";
				}
				$query1=mysqli_query($con,"SELECT sum(jumlah) AS data4 FROM komisi WHERE id_user='$id_user' AND tanggal_komisi>'$tahun-00-00' GROUP BY id_user");
				$hasil1 = mysqli_fetch_array($query1);
				$data4=$hasil1['data4'];
				if (empty($data4)){
					$data4="0";
				}
				$query1=mysqli_query($con,"SELECT sum(jumlah) AS data5 FROM komisi WHERE id_user='$id_user' GROUP BY id_user");
				$hasil1 = mysqli_fetch_array($query1);
				$data5=$hasil1['data5'];
				if (empty($data5)){
					$data5="0";
				}
		$query = mysqli_query($con,"SELECT * FROM komisi WHERE id_user='$id_user' ORDER BY 'tanggal_komisi' DESC");	
	?>		
				<form action="laporan/datakomisiall.php" method="POST" name="input">
				<input type="hidden" name="data1" value="<?=$data1?>"/></input>
                    <input type="hidden" name="data2" value="<?=$data2?>"/></input>
                    <input type="hidden" name="data3" value="<?=$data3?>"/></input>
                    <input type="hidden" name="data4" value="<?=$data4?>"/></input>
                    <input type="hidden" name="data5" value="<?=$data5?>"/></input>
                    <input type="hidden" name="id_user" value="<?=$_SESSION['id_user']?>" ></input>
                    <input type="hidden" name="id_status" value="<?=$_SESSION['id_status']?>"></input>
                    <center><input type="submit" name="submit" value="Export To : Excell" class="btn btn-success" /></center><br>
				</form>				
		<?php
		}
		echo "<table class='table responsive table-condensed table-striped datatable'>";	
	echo"<thead>
		<tr>
        <th id='th'>No</th>
        <th id='th'>Tanggal</th>
        <th id='th'>Nama</th>
		<th id='th'>Komisi</th>
		</tr>
	</thead>";
    while($hasil = mysqli_fetch_array($query)) 
    {   
		$tanggal_komisi = $hasil['tanggal_komisi'];		
		$komisi = $hasil['jumlah'];		
		$query2=mysqli_query($con,"select * from user WHERE id_user='$id_user'");
		while($hasil2 = mysqli_fetch_array($query2)) 
		{	
			$nama = $hasil2['nama'];
		}		
		echo"<td >$no</td>
			<td >$tanggal_komisi</td>
			<td >$nama</td>
			<td >Rp ".number_format($komisi,0,',','.')."</td>
		</tr>";	
        
    $no++;
    }	
	?>
    </tbody>
    <?php
				}
				?></table>		
		</div>
    </div>
<!-- tabel Akhir-->
	
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    

	</div>
</div>
<?php
include "include/footer.php";
?>
</body>
</html>