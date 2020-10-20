<?php
	include "include/cek-login.php";
	include "include/konfirmasi.php";
?>
<!DOCTYPE html>
<html lang="en">
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
            <a class="navbar-brand"> <img alt="" src="img/icon.jpg" class="hidden-xs"/>
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
            Tampil Agen
        </li>
    </ul>
	<?php
include "include/koneksi.php";
$no=1;
$query= mysqli_query($con,"SELECT * FROM user WHERE id_status LIKE 'S003' order by tanggal_user DESC");
if ((mysqli_num_rows($query)==0))
{
	echo "<div class='alert alert-danger alert-dismissable'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<marquee><i class='fa fa-info-circle'></i> Sorry, Data Pengguna <strong>Kosong</strong></marquee>";
		echo "</div>";
		echo"</div>
		<div class='row'>";
}
else
{ 
?>
<?php
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
		$query2 = mysqli_query($con,"SELECT * FROM status WHERE id_status LIKE '$id_status'");
		while($hasil2 = mysqli_fetch_array($query2))
		{
			$status = $hasil2['status'];
		}
		$query3 = mysqli_query($con,"SELECT * FROM dokumen WHERE id_dokumen LIKE '$id_dokumen'");
		while($hasil3 = mysqli_fetch_array($query3))
		{
			$foto = $hasil3['foto'];
		}
		$query5=mysqli_query($con,"SELECT * FROM properti WHERE status='Terjual' AND id_user='$id_user'");
		$terjual=mysqli_num_rows($query5);
		$query6=mysqli_query($con,"SELECT * FROM properti WHERE status='Disewa' AND id_user='$id_user'");
		$disewa=mysqli_num_rows($query6);
		$query7=mysqli_query($con,"SELECT status FROM properti WHERE status='Tersedia' AND id_user='$id_user'");
		$ada=mysqli_num_rows($query7);

	echo " ";?>
	<!---Mulai-->
	<script type="text/javascript" language="JavaScript">
		 function konfirmasi()
		{
			 tanya = confirm("Anda Yakin Akan Menghapus Agen Ini ?");
			 if (tanya == true) return true;
			 else return false;
		}
	</script>
	<div class="box col-md-4">
		<div class="box-inner homepage-box">
			<div class="box-header well">
				<h2><i class="glyphicon glyphicon-th"></i> <?=$nama;?></h2>
				<div class="box-icon">
				<div class="box-icon">
				<?php if($id_user==$_SESSION['id_user']){ ?>					
					<a href="edit_user.php?id_u=<?=$id_user;?>" class="btn btn-round btn-default"><i class="glyphicon glyphicon-pencil"></i></a>
					<?php }
					if ($_SESSION['id_user']=='SUPERUSER'){
					?>
					<a onclick="return konfirmasi()" href="delete_user.php?id_u=<?=$id_user;?>" class="btn btn-trash btn-round btn-default"><i class="glyphicon glyphicon-trash"></i></a>
					<?php } ?>					
					</div>
					<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
				</div>
			</div>
			<div class="box-content" style="display: block;">
				<ul class="nav nav-tabs" id="myTab">
					<li class="active"><a href="#info<?=$no;?>">Profil</a></li>
					<li class=""><a href="#custom<?=$no;?>">Info</a></li>
					<li class=""><a href="#messages<?=$no;?>">Messages</a></li>
					<li class=""><a href="#data<?=$no;?>">Data</a></li>
				</ul>
				<div id="myTabContent<?=$no;?>" class="tab-content">
					<div class="tab-pane active" id="info<?=$no;?>">
						
						<h3>
							<center><img src="gbuser/temp/<?=$foto;?>" width="50%"></img></center>
						</h3>							
						<a><strong><i class="glyphicon glyphicon-envelope"></i> <?=$email?></strong></a>
						<br>
						<a><strong><i class="glyphicon glyphicon-bell"></i> <?=$nomor_hp?></strong></a>
						
					</div>
					<div class="tab-pane" id="custom<?=$no;?>">
						<table>
							<tr>
								<td>Alamat</td>
								<td> : </td>
								<td><?=$alamat?></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td> : </td>
								<td><?=$jenis_kelamin?></td>
							</tr>
							<tr>
								<td>Pendapatan</td>
								<td> : </td>
								<td>Rp <?=number_format($pendapatan,2,',','.')?></td>
							</tr>
							<tr>
								<td>Tanggal Bergabung</td>
								<td> : </td>
								<td><?=$tanggal_user?></td>
							</tr>
						</table>
					</div>
					<div class="tab-pane" id="messages<?=$no;?>">
						<h4><?=$hasil['pesan']?></h4>
					</div>
					<div class="tab-pane" id="data<?=$no;?>">
						<!-- Chart Mulai-->
						<style>
						#chartdiv<?=$no?> {
							width		: 100%;
							height		: 150px;
							font-size	: 11px;
						}							
						</style>
						<!-- Resources -->
						<script src="inc/amcharts.js"></script>
						<script src="inc/pie.js"></script>
						<script src="inc/light.js"></script>

						<!-- Chart code -->
						<script>
						var chart<?=$no?> = AmCharts.makeChart( "chartdiv<?=$no?>", {
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
						<div id="chartdiv<?=$no?>">
						</div>
						<table class="table table-striped table-bordered responsive table-condensed table-striped">
								<tr>
									<td>Terjual</td>
									<td>Disewa</td>
									<td>Tersedia</td>
									<td>Total</td>
								</tr>
								<tr>
									<td><?=$terjual;?></td>
									<td><?=$disewa;?></td>
									<td><?=$ada;?></td>
									<td bgcolor="black"><?=$terjual+$disewa+$ada;?></td>
								</tr>
							</table>		   
						<!-- Chart selesai-->
					</div><!--Div data selesai-->
				</div>
			</div>
			

		</div>
	</div>
	<!---Finish-->
	<?php
	$no++;
    }
}
	
?>	
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <hr>

</div>
<?php
include "include/footer.php";
?>
</body>
</html>
