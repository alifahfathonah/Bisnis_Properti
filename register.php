<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register | Discovery</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	
	<!--Valid 0-->
	<script type="text/javascript" src="/admin/inc/jquery.validate.js"></script>
	<script type="text/javascript" src="admin/inc/jquery-1.4.js"></script>
<script><!-- Skrip validasi username -->
		
  $(document).ready(function()
  {
	
     $("#cekusername").change(function()
     {  
        var username = $("#cekusername").val();
        $("#pesan").html("<img src='admin/inc/loading.gif'>Cek Email ...");

        if(username=='')
        {
          $("#pesan").html('<img src="admin/inc/salah.png"> Email tidak boleh kosong');
          $("#cekusername").css('border', '3px #C33 solid');
        }
        else
        $.ajax({type: "POST", url: "admin/include/validation.php", data: "username="+username, success:function(data)
        { 
        	if(data==0)
        	  {
        	  	$("#pesan").html('<img src="admin/inc/true.png">');
                $("#cekusername").css('border', '3px #090 solid');
            }
              else
              {
              	$("#pesan").html('<img src="admin/inc/salah.png"> Email telah digunakan');
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
	<!--Valid Database selesai-->
	<!--Validasi-->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		
		<script type="text/javascript">
		$(document).ready(function() {
			$('#formulir').validate({
				rules: {
					email: {
						email: true
					},
					hape : {
						digits: true,
						minlength:5,
						maxlength:14
					},
					passx: {
						equalTo: "#password"
					}
				},
				messages: {
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
		//View Password
			function myFunction() {
				var x = document.getElementById("password"),
				icon = document.getElementById('icon');
				if (x.type === "password") {
					x.type = "text";
					icon.className = 'fa fa-eye';
				} else {
					x.type = "password";
					icon.className = 'fa fa-eye-slash';
				}
			}
			function myFunction2() {
				var x = document.getElementById("passx"),
				icon = document.getElementById('icon2');
				if (x.type === "password") {
					x.type = "text";
					icon.className = 'fa fa-eye';
				} else {
					x.type = "password";
					icon.className = 'fa fa-eye-slash';
				}
			}
		</script>
	
	<!--Validasi-->
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> (+62)271 00000000</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> discovery@properti.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/ikon.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="admin"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">Home</a></li>
								<li class="dropdown"><a href="#">Properti<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="#">Dijual</a></li>
										<li><a href="#">Disewakan</a></li>
                                    </ul>
                                </li> 
								<li><a href="#">Agen</a></li>
								<li><a href="#">Owner</a></li>
								<li><a href="#">Brosur</a></li>
								<li><a href="#">FAQ</a></li>
								<li><a href="#">About</a></li>
								<li><a href="#">Kontak</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">
	<?php
	if (isset($_GET['sukses']))
		{
	?>		
			<div class="alert alert-success">
                    <strong>Selamat!</strong> Pendaftaran Selesai, Silahkan Tunggu Konfirmasi
			</div>
	<?php
		}
	?>    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Syarat <strong> & </strong> Ketentuan</h2>    			    				    				
					<div>
						<p>Silahkan Baca Ketentuan Di bawah : </p><br>
						<p>Persyaratan</p>						
						<p>1. Ijazah, Minimal Ijazah SLTA/Sederajat Semua Jurusan</p>
						<p>2. NPWP Yang Masih Berlaku</p>
						<p>3. KTP</p>
						<p>4. Pas Foto 4x6 Sebanyak 3 Lembar</p>
						<p>5. SCAN Berkas no 1 sampai 3</p>
						<p>6. Melengkapi Form Calon Agen di bawah</p>
						<p>7. Copyan Berkas 1 sampai 3 dan Foto dikirim melalui pos ke alamat kami</p>
						<br>
					</div>
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Form Registrasi Calon Agen</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="formulir" class="contact-form row" name="input" method="post" action="proses_register.php" enctype="multipart/form-data">
				            <div class="form-group col-md-6">
				                <input type="text" name="nama" class="form-control" required="required" placeholder="Name">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" id="cekusername" class="form-control" required="required" placeholder="Email">
								<span id="pesan"></span>
				            </div>
							<div class="form-group col-md-6">
							<div class="input-group col-md-12">								
								<input  type="password" name="password" id="password" placeholder="Password" class="form-control" required maxlength="50"/>
								<span class="input-group-addon" onclick="myFunction()"><i id="icon" class="fa fa-eye-slash" ></i></span>
							</div>
							</div>
							<div class="form-group col-md-6">
							<div class="input-group col-md-12">
								<input  type="password" name="passx" id="passx" class="form-control" placeholder="Ulangi Password" required maxlength="50"/>
								<span class="input-group-addon" onclick="myFunction2()"><i id="icon2" class="fa fa-eye-slash" ></i></span>
							</div>
							</div>
							<div class="form-group col-md-6">	
								<input  type="text" name="hape" class="form-control" required placeholder="Nomor Hp"/>
							</div>
							<div class="form-group form-group col-md-6">
							<label class="radio-inline">
							Jenis Kelamin : 
							</label>
							<label class="radio-inline">
								<input type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-Laki" required> Laki-Laki
							</label>
							<label class="radio-inline">
								<input type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan" required> Perempuan
							</label>							
							</div>
							<div class="form-group col-md-12">
								<input  type="text" name="alamat" class="form-control" required maxlength="100" placeholder="Alamat"/>
							</div>	
							<div class="form-group col-md-6">
                                <select class="form-control"  name="key_tanya" required>
                                    <option>Siapa Nama Teman kecil Anda ?</option>
                                    <option>Apa Nama Binatang Peliharaan Anda ?</option>
                                    <option>Buah Apa yang Anda Suka ?</option>
                                    <option>Siapa nama teman Sekamar anda ?</option>
                                    <option>Bantuan</option>
                                </select>
                            </div>
							<div class="form-group col-md-6">
								<input  type="text" name="key_jawab" placeholder="Jawaban" class="form-control" required maxlength="100"/>
							</div>
							<div class="form-group col-md-1">
								Ijazah
							</div>
							<div class="form-group col-md-11">
								<input  type="file"  class="form-control" name="ijazah" required />								
							</div>	
							<div class="form-group col-md-1">
								KTP 
							</div>
							<div class="form-group col-md-11">
								<input  type="file" class="form-control" name="ktp" required />
							</div>
							<div class="form-group col-md-1">
								NPWP 
							</div>
							<div class="form-group col-md-11">
								<input  type="file"  class="form-control" name="npwp" required />								
							</div>
							<div class="form-group col-md-1">
								Foto 
							</div>
							<div class="form-group col-md-11">
								<input  type="file"  class="form-control" name="photo" required />								
							</div>
							<div class="form-group col-md-12">
								<p class="help-block">Ukuran Maks File yang diupload 2 MB</p>						
							</div>
				            <div class="form-group col-md-12">
				                <textarea name="pesan" id="message" required="required" class="form-control" rows="8" placeholder="Tulis Pesan di Sini"></textarea>
				            </div>
							<?php
								$id_user = rand(99,99999);
								$id_dokumen = rand(99,99999);
							?>	
								<input type="hidden"  name="id_dokumen" value="D<?=$id_dokumen;?>" />
								<input type="hidden"  name="id_user" value="U<?=$id_user;?>" />
								<input type="hidden"  name="id_status" value="S002" />                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Kontak Info</h2>
	    				<address>
	    					<p>Discovery Properti</p>
							<p>Jalan Maju Mundur no 0 Tetap Ok, Joss</p>
							<p>Bandung</p>
							<p>Phone: +62 271 721361</p>
							<p>Fax: </p>
							<p>Email: discovery@property.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Media Sosial</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	<script src="js/pass.js"></script>
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>Discovery</span>Properti</h2>
							<p>Sekilas Tentang Kami</p>
						</div>
					</div>
					<div class="col-sm-7">						
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>Jalan Maju Mundur No.0 Mantapss</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2018 Boomingsoon Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="#">M Havid A A</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	<!--Script Lama
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/contact.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script> -->
</body>
</html>