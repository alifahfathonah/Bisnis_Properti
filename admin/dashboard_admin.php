<!DOCTYPE html>
<html lang="en">
<?php
include "include/header.php";
include "koneksi.php";
$id_user=$_SESSION['id_user'];
$query=mysqli_query($con,"SELECT * FROM properti WHERE status='Terjual' AND id_user='$id_user'");
$terjual=mysqli_num_rows($query);
$query=mysqli_query($con,"SELECT * FROM properti WHERE status='Disewa' AND id_user='$id_user'");
$disewa=mysqli_num_rows($query);
$query=mysqli_query($con,"SELECT status FROM properti WHERE status='Tersedia' AND id_user='$id_user'");
$ada=mysqli_num_rows($query);
$query_jum_komisi=mysqli_query($con,"select SUM(jumlah) as jumlah FROM komisi WHERE id_user='$id_user' AND tanggal_komisi > curdate() group by id_user");
$jum_komisi=mysqli_fetch_array($query_jum_komisi);
$jumlah=$jum_komisi['jumlah'];

$query_jum_calon=mysqli_query($con,"select * FROM user WHERE id_status='S002' AND tanggal_user > curdate()");
$jum_calon=mysqli_num_rows($query_jum_calon);
//$jumlah_ca=$jum_calon['jumlah'];

$query_admin=mysqli_query($con,"SELECT * FROM user WHERE id_user='$id_user'");
while($hasil_admin = mysqli_fetch_array($query_admin)) 
    {   
		$pendapatan = $hasil_admin['pendapatan'];
	}
$query_jumlah_pengunjung=mysqli_query($con,"SELECT * FROM pengunjung WHERE id_user='$id_user'AND status_pesan>0");
$jumlah_pengunjung = mysqli_num_rows($query_jumlah_pengunjung);
$query_jumlah_pengunjung2=mysqli_query($con,"SELECT * FROM pengunjung WHERE id_user='$id_user' AND status_pesan='1'");
$jumlah_pengunjung2 = mysqli_num_rows($query_jumlah_pengunjung2);
$query_calon_agen=mysqli_query($con,"SELECT * FROM user WHERE id_status='S002'");
$jumlah_calon = mysqli_num_rows($query_calon_agen);
$query_jumlah_agen=mysqli_query($con,"SELECT * FROM user WHERE id_status='S003'");
$jumlah_agen = mysqli_num_rows($query_jumlah_agen);
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
            <a class="navbar-brand" > <img src="img/icon.jpg" class="hidden-sm"/>
                Indonesia</a>

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
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Dashboard</a>
        </li>
    </ul>
</div>
<?php
	if (isset($_GET['baca']))
		{
	?>		
			<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Selamat!</strong> PESAN Berhasil Dibaca
			</div>
			<?php
		}
else if (isset($_GET['hapus_pesan']))
	{
	?>
		<div class="alert alert-info">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Operasi Sukses </strong>Pesan Sudah Berhasil diamankan</a>
		</div>
		<?php
		}
else if (isset($_GET['ok']))
	{
	?>
	<div class="alert alert-default">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<marquee>Selamat Datang <strong> <?=$_SESSION['username']?> </strong></marquee></a>
		</div>
		<?php
		}
	?>
<!-- Atasa Mulai-->
<div class=" row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="<?=$jum_calon?> Calon Agen Baru." class="well top-block" href="calon_agen.php">
            <i class="glyphicon glyphicon-user blue"></i>

            <div>Total Calon Agen</div>
            <div><?=$jumlah_calon?></div>
            <span class="notification"><?=$jum_calon?></span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="tampil_user.php">
            <i class="glyphicon glyphicon-star green"></i>
            <div>Total Agen</div>
            <div><?=$jumlah_agen?></div>
           
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="Pendapatan Hari ini Rp <?=$jumlah?>" class="well top-block" href="#">
            <i class="glyphicon glyphicon-shopping-cart yellow"></i>

            <div>Pendapatan Total</div>
            <div>Rp <?=number_format($pendapatan,2,',','.')?></div>
            <span class="notification yellow">Rp <?=number_format($jumlah,2,',','.')?></span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="<?=$jumlah_pengunjung2?> new messages." class="well top-block" href="tampil_pengunjung.php">
            <i class="glyphicon glyphicon-envelope red"></i>

            <div>Total Pesan </div>
            <div><?=$jumlah_pengunjung?></div>
            <span class="notification red"><?=$jumlah_pengunjung2?></span>
        </a>
    </div>
</div>
<!-- Atas Selesai-->
<!-- Chart Mulai-->
<style>
#chartdiv {
	width		: 100%;
	height		: 150px;
	font-size	: 11px;
}							
</style>
<!-- Resources -->
<script src="inc/amcharts.js"></script>
<script src="inc/pie.js"></script>
<!--Simpan Sebagai
	<script src="inc/export.min.js"></script>
	<link rel="stylesheet" href="inc/export.css" type="text/css" media="all" />
-->
<script src="inc/light.js"></script>

<!-- Chart code -->
<script>
var chart = AmCharts.makeChart( "chartdiv", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [ {
    "title": "Terjual",
    "value": <?php echo $terjual;?>
  }, {
    "title": "Disewa",
    "value": <?php echo $disewa;?>
  }, {
    "title": "Tersedia",
    "value": <?php echo $ada;?>
  } ],
  "titleField": "title",
  "valueField": "value",
  "labelRadius": 5,

  "radius": "42%",
  "innerRadius": "60%",
  "labelText": "[[title]]",
  "export": {
    "enabled": true
  }
} );
</script>
<div class="row">
    <div class="box col-md-4">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-list-alt"></i> Data Transaksi</h2>
            </div>
			
            <div class="box-content">
                <div id="chartdiv" >
                </div>
            </div>
			<div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive table-hover table-striped">
					<tr>
						<td>Terjual</td>
						<td>Disewa</td>
						<td>Tersedia</td>
						<td>Total Data</td>
					</tr>
					<tr>
						<td><?=$terjual;?></td>
						<td><?=$disewa;?></td>
						<td><?=$ada;?></td>
						<td bgcolor="black"><?=$terjual+$disewa+$ada;?></td>
					</tr>
				</table>
            </div>
        </div>
    </div>
<!-- Chart selesai-->
<!-- Tabs Mulai-->
					
						<div class="box col-md-4">
						<?php
								$query_pengunjung=mysqli_query($con,"SELECT * FROM pengunjung WHERE id_user='$id_user' AND status_pesan='1' ORDER BY tanggal_pengunjung DESC limit 1");
								$xx=mysqli_num_rows($query_pengunjung);
								if ($xx=="0"){
								?>	
								<div class="box-inner homepage-box">
								<div class="box-header well">
									<h2><i class="glyphicon glyphicon-envelope"></i><a href="tampil_pengunjung.php"> Pesan Pengunjung</a></h2>
									<div class="box-icon">
									</div>
								</div>
								<div class="box-content">
									<ul class="nav nav-tabs" id="myTab">
										<li class="active"><a href="#info_p">Info</a></li>
										<li><a href="#messages_p">Messages</a></li>
									</ul>

									<div id="myTabContent" class="tab-content">
										<div class="tab-pane active" id="info_p"><br>
											<br><h1><center>HORRAY !! Semua Pesan Sudah Dibaca</center></h1>
										</div>
										<div class="tab-pane" id="messages_p">
										<br><h1><center>PESAN KOSONG</center></h1>
										</div>
									</div>
								<?php								
								}
								else {
								while($hasil_pengunjung = mysqli_fetch_array($query_pengunjung)) 
									{   
										$nama_pengunjung = $hasil_pengunjung['nama'];
										$email_pengunjung = $hasil_pengunjung['email'];
										$nomor_hp_pengunjung = $hasil_pengunjung['nomor_hp'];
										$status_pesan = $hasil_pengunjung['status_pesan'];
										$id_pengunjung = $hasil_pengunjung['id_pengunjung'];
										$pesan_pengunjung = $hasil_pengunjung['pesan'];
										$tanggal_pengunjung = $hasil_pengunjung['tanggal_pengunjung'];
									}
								
						?>
							<div class="box-inner homepage-box">
								<div class="box-header well">
									<h2><i class="glyphicon glyphicon-envelope"></i><a href="tampil_pengunjung.php"> Pesan Pengunjung</a></h2>
									<div class="box-icon">
										<a href="edit_pesan.php?id_pengunjung=<?=$id_pengunjung?>" class="btn btn-setting btn-round btn-default" data-toggle="tooltip" title="Sudah dibaca"><i
												class="glyphicon glyphicon-eye-open"></i></a>
										<a href="hapus_pesan.php?id_pengunjung=<?=$id_pengunjung?>" class="btn btn-minimize btn-round btn-default" data-toggle="tooltip" title="Hapus"><i
												class="glyphicon glyphicon-trash"></i></a>
									</div>
								</div>
								<div class="box-content">
									<ul class="nav nav-tabs" id="myTab">
										<li class="active"><a href="#info_p">Info</a></li>
										<li><a href="#messages_p">Messages</a></li>
									</ul>

									<div id="myTabContent" class="tab-content">
										<div class="tab-pane active" id="info_p"><br>
											<table>
												<tr>
													<td>Nama</td>
													<td> : </td>
													<td><?=$nama_pengunjung?></td>
												</tr>
												<tr>
													<td>Email</td>
													<td> : </td>
													<td><?=$email_pengunjung?></td>
												</tr>
												<tr>
													<td>Nomor Hp</td>
													<td> : </td>
													<td><?=$nomor_hp_pengunjung?></td>
												</tr>
												<tr>
													<td>Tanggal Masuk</td>
													<td> : </td>
													<td><?=$tanggal_pengunjung?></td>
												</tr>
											</table>
										</div>
										<div class="tab-pane" id="messages_p">
											<h3>>> 
												<small><?=$pesan_pengunjung?></small>
											</h3>
										</div>
									</div>
								<?php } ?>
								</div>
							</div>
						</div>	
					<!--Tabs Selesai-->
					<!--Member Mulai-->
					<div class="box col-md-4">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> Aktifitas Agen</h2>
                <div class="box-icon">
                </div>
            </div>
            <div class="box-content">
                <div class="box-content">
                    <ul class="dashboard-list">
					<?php
						$query_perubahan=mysqli_query($con,"select * from perubahan where id_user<>'ADMIN' order by tanggal_perubahan DESC LIMIT 4");
						while($hasil_perubahan = mysqli_fetch_array($query_perubahan))
						{
							$id_user_1=$hasil_perubahan['id_user'];
						?>
                        <li>
						<?php
						$query_user_1=mysqli_query($con,"select * from user where id_user='$id_user_1'");
						while($hasil_user_1= mysqli_fetch_array($query_user_1))
						{
							$id_dokumen_1=$hasil_user_1['id_dokumen'];
							$query_dok_1=mysqli_query($con,"select * from dokumen where id_dokumen='$id_dokumen_1'");
							while($hasil_dok_1= mysqli_fetch_array($query_dok_1))
							{
						?>
                            <a href="#"><img class="dashboard-avatar" alt="<?$hasil_user_1['nama']?>" src="gbuser/temp/<?=$hasil_dok_1['foto']?>"></a>
                            <strong>Name:</strong> <a href="#"><?=$hasil_user_1['nama']?></a><br>
						<?php 
							}
						} 
						$hp=$hasil_perubahan['status_perubahan'];
						$hr=$hasil_perubahan['id_properti'];
						if ($hp=='Back'){
							echo "<span class='label-info label label-default'>$hp</span><strong> $hr</strong>"; 
						}
						if ($hp=='Hapus'){
							echo "<span class='label-danger label label-default'>$hp</span><strong> $hr</strong>"; 
						}
						if ($hp=='Dibuat'){
							echo "<span class='label-success label label-default'>$hp</span><strong> $hr</strong>"; 
						}
						?>
						<br><strong><i class="glyphicon glyphicon-edit"></i> </strong><?=$hasil_perubahan['tanggal_perubahan']?>
                           
                        </li>
						<?php
						}
						?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
<!--member Selesai-->
<!-- Box Mulai-->
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-th"></i> Top Agen</h2>
                </div>
                <div class="box-content">
					<!-- Tabs Mulai-->
					<div class="row">
						<div class="box col-md-4">
							<div class="box-inner homepage-box">
								<div class="box-header well">
									<h2><i class="glyphicon glyphicon-thumbs-up"></i> Top Agen Komisi</h2>
								</div>
								<div class="box-content">
									<ul class="nav nav-tabs" id="myTab">
										<li class="active"><a href="#info_komisi">Info</a></li>
										<li><a href="#custom_komisi">Detail</a></li>
										<li><a href="#messages_komisi">Messages</a></li>
									</ul>

									<div id="myTabContent" class="tab-content">
										<div class="tab-pane active" id="info_komisi">
											<?php
											$query_komisi=mysqli_query($con,"SELECT * from user where id_status='S003' ORDER BY pendapatan DESC limit 1");
											while($hasil_komisi = mysqli_fetch_array($query_komisi)) 
												{   
													$nama = $hasil_komisi['nama'];
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
											<h3>
											<center><img src="gbuser/temp/<?=$foto_k;?>" width="50%"></img></center>
											</h3>							
											<a><strong><i class="glyphicon glyphicon-envelope"></i> <?=$email_k?></strong></a>
											<br>
											<a><strong><i class="glyphicon glyphicon-bell"></i> <?=$nomor_hp_k?></strong></a>
										</div>
										<div class="tab-pane" id="custom_komisi">
											<table>
												<tr>
													<td>Alamat</td>
													<td>:</td>
													<td><?=$alamat?></td>
												</tr>
												<tr>
													<td>Jenis Kelamin</td>
													<td>:</td>
													<td><?=$jenis_kelamin?></td>
												</tr>
												<tr>
													<td>Tanggal Masuk</td>
													<td>:</td>
													<td><?=$tanggal_user?></td>
												</tr>
											</table>
										</div>
										<div class="tab-pane" id="messages_komisi">
											<h3>Pesan :
												<small><?=$pesan?></small>
										</div>
									</div>
								</div>
							</div>
						</div>	
						<div class="box col-md-4">
							<div class="box-inner homepage-box">
								<div class="box-header well">
									<h2><i class="glyphicon glyphicon-thumbs-up"></i> Best Seller</h2>
								</div>
								<div class="box-content">
									<ul class="nav nav-tabs" id="myTab">
										<li class="active"><a href="#info">Info</a></li>
										<li><a href="#custom">Detail</a></li>
										<li><a href="#messages">Messages</a></li>
									</ul>

									<div id="myTabContent" class="tab-content">
										<div class="tab-pane active" id="info">
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
											<h3>
											<center><img src="gbuser/temp/<?=$foto_k;?>" width="50%"></img></center>
											</h3>							
											<a><strong><i class="glyphicon glyphicon-envelope"></i> <?=$email_k?></strong></a>
											<br>
											<a><strong><i class="glyphicon glyphicon-bell"></i> <?=$nomor_hp_k?></strong></a>
										</div>
										<div class="tab-pane" id="custom">
											<table>
												<tr>
													<td>Alamat</td>
													<td>:</td>
													<td><?=$alamat?></td>
												</tr>
												<tr>
													<td>Jenis Kelamin</td>
													<td>:</td>
													<td><?=$jenis_kelamin?></td>
												</tr>
												<tr>
													<td>Tanggal Masuk</td>
													<td>:</td>
													<td><?=$tanggal_user?></td>
												</tr>
											</table>
										</div>
										<div class="tab-pane" id="messages">
											<h3>Pesan :
												<small><?=$pesan?></small>
											</h3>												
										</div>
									</div>
								</div>
							</div>
						</div>	
						<div class="box col-md-4">
							<div class="box-inner homepage-box">
								<div class="box-header well">
									<h2><i class="glyphicon glyphicon-thumbs-up"></i> Top Agen Properti</h2>
								</div>
								<div class="box-content">
									<ul class="nav nav-tabs" id="myTab">
										<li class="active"><a href="#info_s">Info</a></li>
										<li><a href="#custom_s">Detail</a></li>
										<li><a href="#messages_s">Messages</a></li>
									</ul>

									<div id="myTabContent" class="tab-content">
										<div class="tab-pane active" id="info_s">
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
											<h3>
											<center><img src="gbuser/temp/<?=$foto_k;?>" width="50%"></img></center>
											</h3>							
											<a><strong><i class="glyphicon glyphicon-envelope"></i> <?=$email_k?></strong></a>
											<br>
											<a><strong><i class="glyphicon glyphicon-bell"></i> <?=$nomor_hp_k?></strong></a>
										</div>
										<div class="tab-pane" id="custom_s">
											<table>
												<tr>
													<td>Alamat</td>
													<td>:</td>
													<td><?=$alamat?></td>
												</tr>
												<tr>
													<td>Jenis Kelamin</td>
													<td>:</td>
													<td><?=$jenis_kelamin?></td>
												</tr>
												<tr>
													<td>Tanggal Masuk</td>
													<td>:</td>
													<td><?=$tanggal_user?></td>
												</tr>
											</table>
										</div>
										<div class="tab-pane" id="messages_s">
											<h3>Pesan :
												<small><?=$pesan?></small>
											</h3>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div><!--Tabs Selesai-->
					
                </div>
            </div>
	
        </div>
        <!--/span-->
    </div><!--/row-->
<!-- Box selesai-->
</div>
</div>
</div>
</div>
<?php
include "include/footer.php";
?>
</body>
</html>