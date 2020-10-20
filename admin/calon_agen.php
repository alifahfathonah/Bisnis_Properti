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
	$query = mysqli_query($con,"SELECT * FROM user WHERE id_status='S002' ORDER BY 'tanggal_user' DESC");
echo"<thead>
		<tr>
        <th id='th'><center>No</center></th>
		<th id='th'>Nama</th>
		<th id='th'>Email</th>
		<th id='th'>Nomor Hp</th>
		<th id='th'>Pesan</th>
		<th id='th'>ijazah</th>
		<th id='th'>npwp</th>
		<th id='th'>ktp</th>
		<th id='th'>foto</th>
		<th id='th'><center>Action</center></th>
		</tr>
	</thead>";
    while($hasil = mysqli_fetch_array($query)) 
    {   $id_dokumen = $hasil['id_dokumen'];
		$nama = $hasil['nama'];		
		$id_user = $hasil['id_user'];		
		$id_dokumen =addslashes(strip_tags($hasil['id_dokumen']));
				$query_user2= mysqli_query($con,"SELECT * FROM dokumen WHERE id_dokumen='$id_dokumen'");
				while($hasiluser2 = mysqli_fetch_array($query_user2))
				{
					$ijazah = $hasiluser2['ijazah'];
					$npwp = $hasiluser2['npwp'];
					$ktp = $hasiluser2['ktp'];
					$foto = $hasiluser2['foto'];
				}	
		$email =addslashes(strip_tags($hasil['email']));
		$pesan=$hasil ['pesan'];
		$nomor_hp=$hasil ['nomor_hp'];
						
			echo"<td >$no</td>
			<td >$nama</td>
			<td >$email</td>
			<td >$nomor_hp</td>
			<td >$pesan</td>
			<td >
				<a href='#' class='edit-ijazah btn btn-xs btn-primary' type='button' data-id1='$ijazah'>
				<i class='glyphicon glyphicon-picture'></i> Foto</a>	
			</td>
			<td >
				<a href='#' class='edit-npwp btn btn-xs btn-primary' type='button' data-id2='$npwp'>
				<i class='glyphicon glyphicon-picture'></i> Foto</a>	
			</td>
			<td >
				<a href='#' class='edit-ktp btn btn-xs btn-primary' type='button' data-id3='$ktp'>
				<i class='glyphicon glyphicon-picture'></i> Foto</a>	
			</td>
			<td >
				<a href='#' class='edit-foto btn btn-xs btn-primary' type='button' data-id='$foto'>
				<i class='glyphicon glyphicon-picture'></i> Foto</a>	
			</td>	
            <td >
			<center>
				<a onclick='return terima_calon()' href='terima.php?id=$id_user' type='button' class='btn btn-xs btn-success'>
				<i class='glyphicon glyphicon-ok'></i> Terima</a>
				<a onclick='return tolak_calon()' href='tolak.php?id=$id_user' type='button' class='btn btn-xs btn-danger'>
				<i class='glyphicon glyphicon-remove'></i> Tolak</a>
			</center>
			</td>
		</tr>";	        
    $no++;
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
	<div class="modal fade" id="myKtp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>KTP</h3>
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
		<div class="modal fade" id="myNpwp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>NPWP</h3>
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
	<div class="modal fade" id="myIjazah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>IJAZAH</h3>
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
	<script>
        $(function(){
            $(document).on('click','.edit-foto',function(e){
                e.preventDefault();
                $("#myMfoto").modal('show');
                $.post('dokphoto.php',
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
            $(document).on('click','.edit-ktp',function(e){
                e.preventDefault();
                $("#myKtp").modal('show');
                $.post('dokktp.php',
                    {id:$(this).attr('data-id3')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    </script>
	<script>
        $(function(){
            $(document).on('click','.edit-npwp',function(e){
                e.preventDefault();
                $("#myNpwp").modal('show');
                $.post('doknpwp.php',
                    {id:$(this).attr('data-id2')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    </script>
	<script>
        $(function(){
            $(document).on('click','.edit-ijazah',function(e){
                e.preventDefault();
                $("#myIjazah").modal('show');
                $.post('dokijazah.php',
                    {id:$(this).attr('data-id1')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    </script>
</div>
<?php
include "include/footer.php";
?>
</body>
</html>