<?php
	include "include/cek-login.php";
	include "include/konfirmasi.php";
	include "include/koneksi.php";
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
            Tampil Pengunjung
        </li>
    </ul>
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
</div>
<!-- Chart Mulai-->
<?php
	$id_user=$_SESSION['id_user'];
	$query=mysqli_query($con,"SELECT * FROM counter WHERE browser='Chrome' AND id_user='$id_user'");
	$chrome=mysqli_num_rows($query);
	$query=mysqli_query($con,"SELECT * FROM counter WHERE browser='Firefox' AND id_user='$id_user'");
	$firefox=mysqli_num_rows($query);
	$query=mysqli_query($con,"SELECT * FROM counter WHERE browser='Opera' AND id_user='$id_user'");
	$opera=mysqli_num_rows($query);
	$query=mysqli_query($con,"SELECT * FROM counter WHERE browser='IE' AND id_user='$id_user'");
	$ie=mysqli_num_rows($query);
	$query=mysqli_query($con,"SELECT * FROM counter WHERE browser='Android' AND id_user='$id_user'");
	$android=mysqli_num_rows($query);
	$query=mysqli_query($con,"SELECT * FROM counter WHERE browser<>'Android' AND browser<>'Chrome' AND browser<>'Firefox' AND browser<>'IE' AND browser<>'Opera' AND id_user='$id_user'");
	$lain=mysqli_num_rows($query);
?>
<style>
#chartdiv {
	width		: 100%;
	height		: 317px;
	font-size	: 10px;
}							
</style>
<!-- Resources -->
<script src="inc/amcharts.js"></script>
<script src="inc/pie.js"></script>
<script src="inc/light.js"></script>

<!-- Chart code -->
<script>
var chart = AmCharts.makeChart( "chartdiv", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [ {
    "title": "Chrome",
    "value": <?php echo $chrome;?>
  },{
    "title": "Opera",
    "value": <?php echo $opera;?>
  },{
    "title": "IE",
    "value": <?php echo $ie;?>
  },{
    "title": "Android",
    "value": <?php echo $android;?>
  },{
    "title": "Lainnya",
    "value": <?php echo $lain;?>
  },{
    "title": "Firefox",
    "value": <?php echo $firefox;?>
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
    <div class="box col-md-6">
		<div class="box-inner">
			<div class="box-header well" data-original-title="">
				<h2><i class="glyphicon glyphicon-user"></i> Jumlah Pengunjung</h2>
				<div class="box-icon">            
					<a href="#" class="btn btn-minimize btn-round btn-default"><i
						class="glyphicon glyphicon-chevron-up"></i></a>
					<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
				</div>
			</div>
			
			<div class="box-content">
				<div id="chartdiv" >
				</div>
				<table class="table table-striped table-bordered responsive table-hover table-striped">
					
					<thead>
						<th id='th'>Chrome</th>
						<th id='th'>Opera</th>
						<th id='th'>Firefox</th>
						<th id='th'>IE</th>
						<th id='th'>Android</th>
						<th id='th'>Lainnya</th>
						<th id='th'>Total</th>
					</thead>
					<tbody>
					<tr>
						<td><?=$chrome;?></td>
						<td><?=$firefox;?></td>
						<td><?=$opera;?></td>
						<td><?=$ie;?></td>
						<td><?=$android;?></td>
						<td><?=$lain;?></td>
						<td bgcolor="black"><?=$chrome+$opera+$firefox+$ie+$android+$lain;?></td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>	
		<div class="box-inner">
			<div class="box-header well" data-original-title="">
				<h2><i class="glyphicon glyphicon-user"></i> Jumlah Pengunjung</h2>
				<div class="box-icon">            
					<a href="#" class="btn btn-minimize btn-round btn-default"><i
						class="glyphicon glyphicon-chevron-up"></i></a>
					<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
				</div>
			</div>
			<?php
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
			?>
			<div class="box-content">
				<table class="table table-striped table-bordered responsive table-hover table-striped">
					
					<thead>
						<th id='th'>Hari Ini</th>
						<th id='th'>Kemarin</th>
						<th id='th'>Bulan Ini</th>
						<th id='th'>Tahun Ini</th>
						<th id='th'>Total</th>
					</thead>
					<tbody>
					<tr>
						<td><?=$data1;?></td>
						<td><?=$data2;?></td>
						<td><?=$data3;?></td>
						<td><?=$data4;?></td>
						<td><?=$data5;?></td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>			
	</div>
	<!-- Chart selesai-->
	<div class="box col-md-6">
		<div class="box-inner">
			<div class="box-header well" data-original-title="">
				<h2><i class="glyphicon glyphicon-user"></i> Record Pengunjung</h2>
				<div class="box-icon">            
					<a href="#" class="btn btn-minimize btn-round btn-default"><i
						class="glyphicon glyphicon-chevron-up"></i></a>
					<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
				</div>
			</div>
			<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable responsive table-condensed">
				<thead>
					<th id='th'>Properti</th>
					<th id='th'>Tanggal</th>
					<th id='th'>Browser</th>
					<th id='th'>ip Address</th>
				</thead>
				<tbody>
				<?php
					$query_count=mysqli_query($con,"SELECT * FROM counter WHERE id_user='$id_user' ORDER BY tanggal_counter DESC");
					while($hasil_count = mysqli_fetch_array($query_count)){
						$browser = $hasil_count['browser'];
						$tanggal_counter = $hasil_count['tanggal_counter'];
						$ip_address = $hasil_count['ip_address'];
						$id_properti = $hasil_count['id_properti'];
						$id_counter = $hasil_count['id_counter'];
					echo"	<tr>
						<td>$id_properti</td>
						<td>$tanggal_counter</td>
						<td>$browser</td>
						<td>$ip_address</td>						
						</tr>";
					}
				?>
				</tbody>
			</table>
			</div>
		</div>
    </div>
</div>

<div class="row">
    <div class="box col-md-12">
		<div class="box-inner">
			<div class="box-header well" data-original-title="">
				<h2><i class="glyphicon glyphicon-user"></i> Pesan Pengunjung</h2>
				<div class="box-icon">            
					<a href="#" class="btn btn-minimize btn-round btn-default"><i
						class="glyphicon glyphicon-chevron-up"></i></a>
					<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
				</div>
			</div>
			<div class="box-content">
			<?php
			$id_user = $_SESSION['id_user'];
				$query_pengunjung=mysqli_query($con,"SELECT * FROM pengunjung WHERE id_user='$id_user' AND status_pesan>0 ORDER by tanggal_pengunjung DESC");					
			?>
			<table class="table table-striped table-bordered bootstrap-datatable datatable responsive table-condensed">
				<thead>
					<th id='th'>Nama</th>
					<th id='th'>Email</th>
					<th id='th'>Nomor Hp</th>
					<th id='th'>Tanggal</th>
					<th id='th'>Pesan</th>
					<th id='th'>Aksi</th>
				</thead>
				<tbody>
				<?php
				while($hasil_pengunjung = mysqli_fetch_array($query_pengunjung)) 
					{   
						$nama_pengunjung = $hasil_pengunjung['nama'];
						$email_pengunjung = $hasil_pengunjung['email'];
						$nomor_hp_pengunjung = $hasil_pengunjung['nomor_hp'];
						$status_pesan = $hasil_pengunjung['status_pesan'];
						$id_pengunjung = $hasil_pengunjung['id_pengunjung'];
						$pesan_pengunjung = $hasil_pengunjung['pesan'];
						$tanggal_pengunjung = $hasil_pengunjung['tanggal_pengunjung'];
					echo"	
					<tr>
						<td>$nama_pengunjung</td>
						<td>$email_pengunjung</td>
						<td>$nomor_hp_pengunjung</td>
						<td>$tanggal_pengunjung</td>
						<td>$pesan_pengunjung</td>
						<td>";
					echo "<a href='hapus_pesan.php?id_pengunjung=$id_pengunjung&tp' class='btn btn-danger' data-toggle='tooltip' title='Hapus'><i
												class='glyphicon glyphicon-trash'></i></a>";
					if ($status_pesan==1)
					{						
						echo "<a href='edit_pesan.php?id_pengunjung=$id_pengunjung&tp' class='btn btn-success' data-toggle='tooltip' title='Tandai Sudah dibaca'><i
												class='glyphicon glyphicon-eye-open'></i></a>";						
					}
					
					echo "</td></tr>";		
					}
				?>
					
				</tbody>
			</table>
			</div>
		</div>
    </div>
</div>
	
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <hr>

	</div>
</div>
<?php
include "include/footer.php";
?>
</body>
</html>