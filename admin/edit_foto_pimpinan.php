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
		if (isset($_GET['name_foto'])){
		$name_foto = $_GET['name_foto'];
		//echo $name_foto;
		}
		
		if (isset($_POST['image'])){
				$data = $_POST['image'];
				$nama = $_POST['nama'];
				list($type, $data) = explode(';', $data);
				list(, $data)      = explode(',', $data);
				$data = base64_decode($data);
				$imageName = $nama;				
				file_put_contents('gbuser/'.$imageName, $data);
				echo 'done';
		}
		?>
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
							Tampil User
						</li>
					</ul>
				</div>
				
				<?php include "gbuser/index2.php"; ?>
			</div><!--/fluid-row-->
    <hr>
		</div>
	</div>
</div>
<?php
include "include/footer.php";
?>
</body>
</html>
