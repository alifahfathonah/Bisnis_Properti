<?php
	include "cek-login.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
include "header.php";
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
            <a class="navbar-brand" href="index.html"> <img alt="Charisma Logo" src="logo.png" class="hidden-xs"/>
                <span>Home</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo $_SESSION['username'];?></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="single.php">Profile</a></li>
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
            <a href="#">Tampil Data</a>
        </li>
    </ul>
</div>



<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Tabel Data</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
    <div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive table-hover table-striped">
	<?php
	include "koneksi.php";
	$no = 1;
	$query = mysqli_query($con,"SELECT * FROM khas WHERE crud=0 ORDER BY tgl ASC");
		echo"<thead>
		<tr>
        <th id='th'><center>No</center></th>
		<th id='th'>Nama</th>
		<th id='th'>Alamat</th>
		<th id='th'>Latitude</th>
		<th id ='th'>Longitude</th>
		<th id='th'>Kategori</th>
        <th id='th'>Khas Dari</th>
		<th id='th'><center>Action</center></th>
		</tr>
	</thead>";
	
    while($hasil = mysqli_fetch_array($query)) 
    {   $id = $hasil['id'];
		$nt = $hasil['namaTempat'];
		$alamat = stripslashes ($hasil['alamat']);
		$la = stripslashes ($hasil['latitude']);
		$lo = stripslashes ($hasil['longitude']);
		$kategori = $hasil['kategori'];
		$khas = stripslashes ($hasil['daerah']);
        $gambar = ($hasil['foto']);
		$oleh = $hasil['oleh'];
						$user= $_SESSION['username'];
						$queryx= mysqli_query($con,"SELECT * FROM user WHERE username='$user'");
						$hasilx=mysqli_fetch_array($queryx);
						$crud=$hasilx['crud'];
		if ($crud==0)
		{
		echo"<td >$no</td>
			<td >$nt</td>
			<td >$alamat</td>
			<td >$la</td>
			<td >$lo</td>
			<td >$kategori</td>
			<td >$khas</td>
            <td >
			<center>";
			if ($oleh==$user)
			{ 
			echo"<a href='edit_data.php?id=$id' type='button' class='btn btn-xs btn-success'>
			<i class='glyphicon glyphicon-pencil'></i> Edit </a>";
			}
			if ($oleh==$user)
			{
			echo"
			<a href='delete.php?id=$id' type='button' class='btn btn-xs btn-danger' >
			<i class='glyphicon glyphicon-trash'></i> Hapus</a>";
			}
			echo"<a href='fo.php?id=$id' type='button' class='btn btn-xs btn-primary' >
			<i class='glyphicon glyphicon-picture'></i> foto</a>
			</center>
			</td>
		</tr>";	
        
    $no++;
	}
	else
	{
		echo"<td >$no</td>
			<td ><a href='edit_data.php?id=$id'>$nt</a></td>
			<td >$alamat</td>
			<td >$la</td>
			<td >$lo</td>
			<td >$kategori</td>
			<td >$khas</td>
            <td >
			<center>";
			echo"<a href='edit_data.php?id=$id' type='button' class='btn btn-xs btn-success'>
			<i class='glyphicon glyphicon-pencil'></i> Edit </a>";
			echo"
			<a href='delete.php?id=$id' type='button' class='btn btn-xs btn-danger' >
			<i class='glyphicon glyphicon-trash'></i> Hapus</a>";
			echo"<a href='fo.php?id=$id' type='button' class='btn btn-xs btn-primary' >
			<i class='glyphicon glyphicon-picture'></i> foto</a>
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
include "footer.php";
?>
</body>
</html>
