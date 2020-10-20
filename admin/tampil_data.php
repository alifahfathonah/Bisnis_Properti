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



<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Tabel Data</h2>

        <div class="box-icon">
            
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
    <div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive table-condensed">
	<?php
	include "koneksi.php";
	$no = 1;
	$query = mysqli_query($con,"SELECT * FROM properti WHERE keaktifan=1 ORDER BY tanggal_dibuat DESC");
		echo"<thead>
		<tr>
        <th id='th'><center>No</center></th>
        <th id='th'><center>Status</center></th>
		<th id='th'>Agen</th>
		<th id='th'>Judul</th>
		<th id='th'>Kategori</th>
		<th id='th'>Luas Tanah</th>
		<th id='th'>Harga</th>
		<th id='th'>Lokasi</th>
		<th id='th'><center>Action</center></th>
		</tr>
	</thead>";
	$sesi= $_SESSION['id_user'];
    while($hasil = mysqli_fetch_array($query)) 
    {   $id_properti = $hasil['id_properti'];
		$id_fasilitas = $hasil['id_fasilitas'];
		
		$id_user =addslashes(strip_tags($hasil['id_user']));
				$query_user2= mysqli_query($con,"SELECT nama FROM user WHERE id_user='$id_user'");
				while($hasiluser2 = mysqli_fetch_array($query_user2))
				{
					$nama = $hasiluser2['nama'];
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
		include "koneksi2.php";
						$query_p = mysqli_query($con2,"SELECT * FROM kecamatan where id='$lokasi'");
						while ($hasil_p = mysqli_fetch_array($query_p)){
							$lokasi=$hasil_p['nama'];
						}
						include "koneksi.php";
        $gambar = ($hasil['gambar']);
						$inputer= $_SESSION['id_status'];
						$query_user= mysqli_query($con,"SELECT * FROM user WHERE id_user='$inputer'");
						$hasil_user=mysqli_fetch_array($query_user);
		if ($inputer=="S003" or $inputer=="S005")
		{
			
		echo"<td >$no</td>";
		if ($id_user==$sesi){
				if ($status=="Tersedia")
				{ 
				echo 				
				"<td >
					<a class='edit-status btn btn-xs btn-success' href='#' data-id='$id_properti'>$status</a>
				</td>";
				}else if ($status=="Terjual")
				{
				echo 				
				"<td >
					<a class='edit-status btn btn-xs btn-danger' href='#' data-id='$id_properti'>$status</a>
				</td>";
				}
				else
				{
				echo 				
				"<td >
					<a class='edit-status btn btn-xs btn-warning' href='#' data-id='$id_properti'>$status</a>
				</td>";
				}
		}
		else {
			echo "<td >
					<a class='btn btn-xs btn-default' href='#'>$status</a>
				</td>";
		}
		echo"<td >".$nama."</td>
			<td >$judul</td>
			<td >$kategori</td>
			<td >".number_format($luas_tanah,0,'.','.')." m<sup>2</sup></td>";
			if ($pilihan=="Dijual"){
			echo "<td >Rp ".number_format($harga,0,',','.')."</td>";
			}
			else
			{
				echo "<td >Rp ".number_format($harga,0,',','.')." / Th</td>";
			}
			echo"<td >$lokasi</td>			
            <td >
			<center>";
			if ($id_user==$sesi)
			{ 
			echo"<a href='edit_data.php?id=$id_properti' type='button' class='btn btn-xs btn-success'>
			<i class='glyphicon glyphicon-pencil'></i></a>";
			}
			if ($id_user==$sesi)
			{
			echo"
			<a onclick='return hapus_sementara()' href='delete_data.php?id=$id_properti' type='button' class='btn btn-xs btn-danger' >
			<i class='glyphicon glyphicon-trash'></i></a>";
			}
			echo"
			<a href='#' class='edit-record btn btn-xs btn-primary' type='button' data-id='$id_fasilitas'>
			<i class='glyphicon glyphicon-zoom-in'></i> Detail</a>
			
			<a href='#' class='edit-foto btn btn-xs btn-primary' type='button' data-id='$id_properti'>
			<i class='glyphicon glyphicon-picture'></i> poto</a>
			</a>
			</center>
			</td>
		</tr>";	
        
    $no++;
	}
	else if ($inputer=="S000")
	{		
		echo"<td >$no</td>";
				if ($status=="Tersedia")
				{ 
				echo 				
				"<td >
					<a class='edit-status btn btn-xs btn-success' href='#' data-id='$id_properti'>$status</a>
				</td>";
				}else if ($status=="Terjual")
				{
				echo 				
				"<td >
					<a class='edit-status btn btn-xs btn-danger' href='#' data-id='$id_properti'>$status</a>
				</td>";
				}
				else
				{
				echo 				
				"<td >
					<a class='edit-status btn btn-xs btn-warning' href='#' data-id='$id_properti'>$status</a>
				</td>";
				}
		echo"<td >$nama</td>
			<td >$judul</td>
			<td >$kategori</td>
			<td >RP ".number_format($harga,0,',','.')."</td>
			<td >$lokasi</td>			
            <td >
			<center>";
			echo"<a href='edit_data.php?id=$id_properti' type='button' class='btn btn-xs btn-success'>
			<i class='glyphicon glyphicon-pencil'></i></a>";
			
			echo"
			<a onclick='return hapus_sementara()' href='delete_data.php?id=$id_properti' type='button' class='btn btn-xs btn-danger' >
			<i class='glyphicon glyphicon-trash'></i></a>";	
			
			echo"
			<a href='#' class='edit-record btn btn-xs btn-primary' type='button' data-id='$id_fasilitas'>
			<i class='glyphicon glyphicon-zoom-in'></i> Detail</a>
			
			<a href='#' class='edit-foto btn btn-xs btn-primary' type='button' data-id='$id_properti'>
			<i class='glyphicon glyphicon-picture'></i> poto</a>
			</a>
			</center>
			</td>
		</tr>";	
        
    $no++;
	}
    }	
	?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
	</div>





    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Detail</h3>
                </div>
                <div class="modal-body">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Tutup</a>                    
                </div>
            </div>
        </div>
    </div>
	<div class="modal fade" id="myMfoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Fotonya</h3>
                </div>
                <div class="modal-body">Halo
                 <div class="box col-md-12">
				 </div>				 
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Tutup</a>                    
                </div>
            </div>
        </div>
    </div>
	<div class="modal fade" id="myStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Ubah Status</h3>
                </div>
                <div class="modal-body">
                    <p></p>
                </div>
                
            </div>
        </div>
    </div>	
	<script>
        $(function(){
            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('hasil.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    </script>
	<script>
        $(function(){
            $(document).on('click','.edit-foto',function(e){
                e.preventDefault();
                $("#myMfoto").modal('show');
                $.post('photo.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    </script>
		<script>
        $(function(){
            $(document).on('click','.edit-status',function(e){
                e.preventDefault();
                $("#myStatus").modal('show');
                $.post('status.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
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
