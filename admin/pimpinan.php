<?php
	include "include/cek-login.php";
	include "include/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
include "include/header.php";
?>
	<script src="jquery-1.11.0.js"></script>
    <script src="bootstrap.js"></script>

<head>
		<style type="text/css">
		.labelfrm {
			display:block;
			font-size:small;
			margin-top:5px;
		}
		.error {
			font-size:small;
			color:red;
		}
		</style>
<script type="text/javascript" src="inc/jquery.min.js"></script>
<script type="text/javascript" src="inc/jquery.validate.min.js"></script>		
<script type="text/javascript">
		$(document).ready(function() {
			$('#formalin').validate({
				rules: {
					username : {
						//digits: true,
						hanyahuruf: true,
						minlength:5,
						maxlength:10
						
					},
					hape : {
						digits: true,
						minlength:5,
						maxlength:14
					}, 
					email: {
						email: true
					},
					nama: {
						required: true
					},jawab: {
						required: true
					},
					passx: {
						equalTo: "#password"
					}
				},
				messages: {
					username: {
						required: "Kolom username harus diisi",
						minlength: "Minimal 5 Karakter",
						maxlength: "Maksimal 30 Karakter"
					},
					hape: {
						required: "Kolom Handphone harus diisi",
						digits: "Isian Hanya boleh angka",
						minlength: "Minimal 5 Karakter",
						maxlength: "Maksimal 14 Karakter"
					},
					email: {
						required: "Alamat email harus diisi",
						email: "Format email tidak valid"
					},
					passx: {
						equalTo: "Password tidak sama"
					}
				}
			});
		});
		
			$.validator.addMethod( "hanyahuruf", function( value, element ) {
					return this.optional( element ) || /^[a-z]+$/i.test( value );
			}, "Username Hanya boleh Huruf" );
		</script>
		
</head>
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
	
	
<script type="text/javascript" src="/inc/jquery.validate.js"></script>
<script><!-- Skrip validasi username -->
		
  $(document).ready(function()
  {
	
     $("#cekusername").change(function()
     {  
        var username = $("#cekusername").val();
        $("#pesan").html("<img src='inc/loading.gif'>Cek Email ...");

        if(username=='')
        {
          $("#pesan").html('<img src="inc/salah.png"> Email tidak boleh kosong');
          $("#cekusername").css('border', '3px #C33 solid');
        }
        else
        $.ajax({type: "POST", url: "include/validation.php", data: "username="+username, success:function(data)
        { 
        	if(data==0)
        	  {
        	  	$("#pesan").html('<img src="inc/true.png">');
                $("#cekusername").css('border', '3px #090 solid');
            }
              else
              {
              	$("#pesan").html('<img src="inc/salah.png"> Email telah digunakan');
              	$("#cekusername").css('border', '3px #C33 solid');
              }
              
        } });
     })

  });
</script>

<style type="text/css">
label.error {
	color: red; padding-left: .5em;
}
</style>
 	
	
	
	
	
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
            Pimpinan
        </li>
    </ul>
</div>
<?php
	$query_edit_user=mysqli_query($con,"select * from user where id_status='S006'");
	while($hasil_edit = mysqli_fetch_array($query_edit_user)) 
    {   $id_user = $hasil_edit['id_user'];
		$nama = $hasil_edit['nama'];		
		$alamat = $hasil_edit['alamat'];
		$jenis_kelamin = $hasil_edit['jenis_kelamin'];
		$email = stripslashes ($hasil_edit['email']);
		$nomor_hp = stripslashes ($hasil_edit['nomor_hp']);
		$id_status = $hasil_edit['id_status'];
		$key_tanya = $hasil_edit['key_tanya'];
		$key_jawab = $hasil_edit['key_jawab'];
		$tanggal_user = $hasil_edit['tanggal_user'];
		$pesan = $hasil_edit['pesan'];
		$id_dokumen = $hasil_edit['id_dokumen'];
	}
	$query_dok=mysqli_query($con,"select * from dokumen where id_dokumen='$id_dokumen'");
	while($hasil_dok = mysqli_fetch_array($query_dok)) 
    {   
		$foto = $hasil_dok['foto'];
	}
?>
<div class="row">
    <div class="box col-md-8">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Detail Pimpinan</h2>

                <div class="box-icon">                    
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form id="formalin" role="form"  action="up_pimpinan.php" method="POST" name="input">
							
							<div class="form-group">
							<label>Nama</label>
                                <input type="text" id="" name="nama" value="<?=$nama?>"class="form-control" required />
                            </div>
							<div class="form-group">
							<label>Email</label>
                                <input type="text" value="<?=$email?>" name="email" class="email form-control" disabled />
								<span id="pesan"></span>
                            </div>
							<div class="form-group">
							<label>Password</label>
								<input  type="password" name="password" id="password" class="form-control" required maxlength="50"/>
							</div>
							<div class="form-group">
							<label>Ulangi Password</label>
								<input  type="password" name="passx" class="form-control" required maxlength="50"/>
							</div>
							<div class="form-group">							
							<label>No Telp / Handphone</label>
								<input  type="text" name="hape" value="<?=$nomor_hp?>" class="form-control" required />
							</div>
							<div class="form-group ">
							<label class="radio-inline">
							Jenis Kelamin : 
							</label>
							<?php
								if($jenis_kelamin=="Laki-Laki"){
							?>
							<label class="radio-inline">							
								<input type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-Laki" required checked > Laki-Laki
							</label>
							<label class="radio-inline">
								<input type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan" required> Perempuan
							</label>
								<?php } else { ?>	
							<label class="radio-inline">							
								<input type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-Laki" required> Laki-Laki
							</label>
							<label class="radio-inline">
								<input type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan" required checked> Perempuan
							</label>
								<?php }?>
							</div>
							<div class="form-group">
							<label>Alamat</label>
								<input  type="text" value="<?=$alamat?>" name="alamat" class="form-control" required maxlength="100"/>
							</div>	
							<div class="form-group">
							<label>Pesan</label>
								<input  type="text" name="pesan" value="<?=$pesan?>" class="form-control" required maxlength="100"/>
							</div>					
				<input type="hidden"  name="id_dokumen" value="<?=$id_dokumen;?>" />
				<input type="hidden"  name="id_user" value="<?=$id_user;?>" />
				<input type="hidden"  name="email" value="<?=$email?>" />
				<input type="submit" class="btn btn-lg btn-default" name="edit" value="Simpan" />
				<a href="dashboard.php" class="btn btn-lg btn-default" >Kembali</a>
                </form>
            </div>
        </div>
    </div>
	<div class="box col-md-4">
		<div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-picture"></i> Foto Pimpinan</h2>

                <div class="box-icon">                    
					<a href="edit_foto_pimpinan.php?name_foto=<?=$foto?>" class="btn btn-round btn-default"><i
                            class="glyphicon glyphicon-pencil"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>					
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
			<div class="box-content">
				<img src="gbuser/<?=$foto?>" width="100%"></img>
            </div>
		</div>		
    </div>
    <!--/span-->

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
