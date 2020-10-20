<!DOCTYPE html>
<html lang="en">
<?php
include "include/cek-login.php";
include "include/header.php";
include "include/koneksi.php";
include "include/konfirmasi.php";
//include "include/konfirmasi.php";
?>
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
<script type="text/javascript" src="inc/my.js"></script>
<script type="text/javascript" src="inc/jquery.min.js"></script>
<script type="text/javascript" src="inc/jquery.validate.min.js"></script>		
<script type="text/javascript">
		$(document).ready(function() {
			$('#formalin').validate({
				rules: {
					sertifikat : {
						//digits: true,
						//hanyahuruf: true,
						minlength:2	
					},
					lokasi : {
						minlength:3
					},
					kamar_mandi : {
						number:true
					},
					kamar_tidur : {
						number:true
					},
					luas_bangunan : {
						number:true
					},
					luas_tanah : {
						number:true
					},
					lantai : {
						number:true
					}, 
					garasi : {
						number:true
					}, 
					tahun : {
						number:true,
						range:[1990,2017]
					}, 
					latitude: {
						required: true
					},
					longitude: {
						required: true
					},
					harga: {
						digits:true
					}
				},
				messages: {
					sertifikat: {
						required: "Kolom Judul harus diisi",
						minlength: "Minimal 2 Karakter"
					},
					lokasi: {
						required: "Field Alamat harus diisi",
						minlength: "Minimal 3 Karakter"
					},
					latitude: {
						required: "Harap terisi,Silahkan hubungkan ke internet"
						
					},
					longitude: {
						required: "Harap terisi,Silahkan hubungkan ke internet"
					},
					kamar_mandi : {
						number:"Isian Harus Berisi Angka"
					}, 
					kamar_tidur : {
						number:"Isian Harus Berisi Angka"
					}, 
					garasi : {
						number:"Isi Jumlah Garasi dengan Angka"
					}, 
					luas_bangunan : {
						number:"Isian Harus Berisi Angka"
					}, 
					luas_tanah : {
						number:"Isian Harus Berisi Angka"
					}, 
					lantai : {
						digits:"Isian Harus Berisi Angka"
					},
					tahun : {
						number:"Isikan Tahun Yang Valid",
						range:"Tahun Harus diantara 1990 Sampai 2017"
					},					
					harga: {
						digits: "Isikan harga dengan benar"
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
            Input Data
        </li>
    </ul>
</div>
<?php
	if (isset($_GET['gagal']))
		{
	?>		
			<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>OPPSS!!!</strong> Input Data Gagal, Silahkan Masukkan Owner / Developer, jika tidak ada maka tambahkan <a class="tambah-owner">Di Sini</a>
			</div>
	<?php
		}
	?>
	<?php
	if (isset($_GET['gagallokasi']))
		{
	?>		
			<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>OPPSS!!!</strong> Input Data Gagal, Provinsi, kota, kecamatan, atau kelurahan belum diisi</a>
			</div>
	<?php
		}
	?>
<script type="text/javascript">
function pilih_kota(prop)
{
	$.ajax({
        url: 'http://localhost/Sewa_Rumah/admin/daerah/kota.php',
        data : 'prop='+prop,
		type: "post", 
        dataType: "html",
		timeout: 10000,
        success: function(response){
			$('#dom_kota').html(response);
        }
    });
}
function pilih_kec(kota)
{
	$.ajax({
        url: 'http://localhost/Sewa_Rumah/admin/daerah/kecamatan.php',
        data : 'kota='+kota,
		type: "post", 
        dataType: "html",
		timeout: 10000,
        success: function(response){
			$('#dom_kec').html(response);
        }
    });
}
function pilih_kel(kec)
{
	$.ajax({
        url: 'http://localhost/Sewa_Rumah/admin/daerah/kelurahan.php',
        data : 'kec='+kec,
		type: "post", 
        dataType: "html",
		timeout: 10000,
        success: function(response){
			$('#dom_kel').html(response);
        }
    });
}
</script>
<div class="row">
    <div class="box col-md-6">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Form Input Data</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                            <form id="formalin" role="form"  action="proses_data.php" method="POST" name="input" enctype="multipart/form-data">
							
							<div class="form-group">
							<label>Judul</label>
								<input  type="text" name="judul" class="form-control" placeholder="Silahkan Isi dengan Yang Menarik" required maxlength="100"/>
							</div>
							<div class="form-group">
								<label class="control-label" for="selectError">Pemilik</label> 
								<div >
								<select required name="id_owner" class="form-control" id="selectError" data-rel="chosen">	
								<option value="0">Pilh Owner / Developer</option>
								<?php 
								include "koneksi.php";
										if($_SESSION['id_status']=="S005"){	
											$id_status2="S007";
										}
										else if($_SESSION['id_status']=="S003"){	
											$id_status2="S004";
										}
										else{
											$id_status2="S000";
										}										
									$query_owner = mysqli_query($con,"SELECT * FROM owner WHERE id_status='$id_status2'");
										while($hasil_owner = mysqli_fetch_array($query_owner))
											{ ?>	
										<option value="<?=$hasil_owner['id_owner']?>"><?=$hasil_owner['nama']?></option>
									<?php }?>
									</select>
								
								</div><br>
								<button class="tambah-owner btn btn-success btn-xs">
									<i class='glyphicon glyphicon-plus'></i> Tambah Owner
								</button>
							</div>
							<div class="form-group">
							<label>Sertifikat</label>
                                <select name="sertifikat" class="form-control" id="selectError" data-rel="chosen" required>
										<option value selected="0">Pilih Sertifikat</option>
										<option value="SHM">SHM</option>
										<option value="HGB">HGB</option>
										<option value="HPL">HPL</option>
										<option value="GIRIK">GIRIK</option>
										<option value="Strata Title">Strata Title</option>
										<option value="PPJB">PPJB</option>
								</select>
                            </div>
							<div class="form-group">
							<label>Provinsi</label>
								<select name="prop" onchange="pilih_kota(this.value);" class="form-control" id="selectError" data-rel="chosen" required>
									<option value="#">Pilih Provinsi</option>
									<?php 
											  include 'koneksi2.php';
											  $query4=mysqli_query($con,"SELECT id_prov,nama FROM provinsi ORDER BY nama");?>	
											  <?php while ($data= mysqli_fetch_array($query4)){
												?>
												<option value="<?=$data['id_prov']?>"><?=$data['nama']?></option>;
												<?php
												}
											  ?>
								</select>
							</div>
							
							<div class="form-group">
							<label>Kota / Kab</label>
								<select name="kota" id="dom_kota" onchange="pilih_kec(this.value)" class="form-control">
									<option value="0" selected >Pilih Kota</option>
								<select>
							</div>
							<div class="form-group">
							<label>Kecamatan</label>
								<select name="kec" id="dom_kec" onchange="pilih_kel(this.value)"  class="form-control" required>
									<option value="0" selected>Pilih Kecamatan</option>
								<select>
							</div>
							<div class="form-group">
							<label>Kelurahan</label>
								<select name="kel" id="dom_kel"  class="form-control" required>
									<option value="0" selected>Pilih Kelurahan</option>
								<select>
							</div>
							<div class="form-group">
							<label>Nomor Rumah</label>
								<input  type="text" name="nomor_rumah" class="form-control" required />
							</div>							
							<div class="form-group">
							<label>Lokasi</label>
								<input  type="text" name="lokasi" id="adres" class="form-control" required />
							</div>
							<div class="form-group">
							<label>Latitude</label>
								<input  type="text" name="latitude" class="form-control" id="longitudeform" required placeholder="Silahkan Hubungkan Ke Internet" />
							</div>
							<div class="form-group">
							<label>Longitude</label>
								<input  type="text" name="longitude" class="form-control" id="latitudeform" required placeholder="Silahkan Hubungkan Ke Internet"/>
							</div>
							<div class="form-group">
								<label class="control-label" for="selectError">Jenis</label> 
								<div >
								
									<select name="kategori" class="form-control" id="selectError" data-rel="chosen">
										<option value="Tanah"> Tanah </option>									
										<option value="Rumah"> Rumah </option>									
										<option value="Kos-kosan"> Kos-Kosan </option>									
										<option value="Apartemen"> Apartemen </option>									
										<option value="Ruko"> Ruko </option>									
										<option value="Gudang"> Gudang </option>									
										<option value="Pabrik"> Pabrik </option>									
										<option value="Tempat Usaha"> Tempat Usaha </option>									
									</select>
								
								</div>
							</div>
							<div class="form-group ">
							<label>Kamar Mandi</label>
                                <input type="text" name="kamar_mandi" class="form-control" required maxlength="30"/>
                            </div>
							<div class="form-group ">
							<label>Kamar tidur</label>
                                <input type="text" name="kamar_tidur" class="form-control" required maxlength="30"/>
                            </div>
							<div class="form-group ">
							<label>Luas Tanah</label>
                                <input type="text" name="luas_tanah" class="form-control" required maxlength="30"/>
                            </div>
							<div class="form-group ">
							<label>Luas Bangunan</label>
                                <input type="text" name="luas_bangunan" class="form-control" required maxlength="30"/>
                            </div>
							<div class="form-group ">
							<label>Jumlah Lantai</label>
                                <input type="text" name="jumlah_lantai" class="form-control" required maxlength="30"/>
                            </div>
							<div class="form-group ">
							<label>Carport</label>
								<select name="carport" class="form-control" id="selectError" data-rel="chosen" required>
										<option value="Ada">Ada</option>
										<option value="Tidak Ada">Tidak Ada</option>
										
								</select>
                            </div>
							<div class="form-group ">
							<label>Data Listrik</label>
                                <select name="listrik" class="form-control" id="selectError" data-rel="chosen" required>
										<option value="450">450 W</option>
										<option value="900">900 W</option>
										<option value="1300">1300 W</option>
										<option value="2200">2200 W</option>
										<option value="3500">3500 W</option>
										<option value="4400">4400 W</option>
										<option value="5500">5500 W</option>
										<option value="7700">7700 W</option>
										<option value="11000">11000 W</option>
										<option value="13900">13900 W</option>
										<option value="17000">17000 W</option>
										<option value="22000">22000 W</option>
										<option></option>
								</select>
                            </div>
							<div class="form-group ">
							<label>Garasi</label>
                                <input type="text" name="garasi" class="form-control" required maxlength="30"/>
                            </div>
							<div class="form-group ">
							<label>Air</label>
                                <select name="air" class="form-control" id="selectError" data-rel="chosen" required>
										<option value="Ada">Ada</option>										
										<option value="Tidak ada">Tidak Ada</option>										
								</select>
                            </div>
							<div class="form-group ">
							<label>Tahun</label>
                                <input type="text" name="tahun" class="form-control" required maxlength="30"/>
                            </div>
							<div class="form-group ">
							<label>Pilihan</label>
                                <select name="pilihan" class="form-control" id="selectError" data-rel="chosen" required>
										<option value="Dijual">Dijual</option>										
										<option value="Disewakan">Disewakan</option>									
								</select>
                            </div>
							<div class="form-group ">
							<label>Harga</label>
                                <input type="text" name="harga" class="form-control" required maxlength="30"/>
                            </div>							
							<div class="form-group ">
							<label>Hadap</label>
                                <select name="hadap" class="form-control" id="selectError" data-rel="chosen" required>																		
										<option value="Tidak Tahu">Pilih Hadap</option>
										<option value="Timur">Timur</option>										
										<option value="Tenggara">Tenggara</option>										
										<option value="Selatan">Selatan</option>										
										<option value="Barat Daya">Barat Daya</option>										
										<option value="Barat">Barat</option>										
										<option value="Barat Laut">Barat Laut</option>										
										<option value="Utara">Utara</option>										
										<option value="Timur Laut">Timur Laut</option>										
								</select>
                            </div>
							
							<div class="form-group ">
							<label>Fee Agen</label>
                                <input type="text" required id="inputku" class="form-control" name="fee_agen" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"><br/>
                            </div>	
							<div class="form-group ">
							<label>Keterangan</label>
                                <textarea class="form-control" name="keterangan"></textarea>
                            </div>	
							<div class="form-group">
							<label></label>
								<input  type="file" id="exampleInputFile" class="form-control" name="photo" required />
								<p class="help-block">Ukuran Maks 2 MB</p>
							</div>									
					<input type="submit" class="btn btn-lg btn-primary" name="input" value="Simpan" onclick="return simpan_data()" />
					<input type="reset" class="btn btn-lg btn-default" name="reset" value="Reset"/>
					
                </form>
            </div>
        </div>
    </div>
    <!--/span-->
	<div class="row">
    <div class="box col-md-6">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Cari koordinat</h2>

               
                </div>
            </div>
				<div class="box-content">
				<?php
					include "x.php";
				?>
				</div>
	</div>
	</div>

</div><!--/row-->

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Tambah Jenis / Kategori</h3>
                </div>
                <div class="modal-body">
                    <p>Silahkan Tambahkan Jenis di Sini</p>
                </div>
                <div class="modal-footer">
				<form role="form" action="tambah_kategori.php" method="POST" name="input_kategori">
					<input type="text" name="kategori_baru" class="form-control" required maxlength="30"/><br>
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <input type="submit" class="btn btn-primary" name="input_kategori" value="Simpan"/>
                </form>
				</div>
            </div>
        </div>
    </div>    
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Tambah Owner / Developer</h3>
                </div>
                <div class="modal-body">
                <form role="form" action="tambah_owner.php" method="POST" name="input_kategori">
				Nama : <br>
				<input type="text" name="nama_owner" class="form-control" required /><br>
				Alamat : <br>
				<input type="text" name="alamat_owner" class="form-control" required /><br>
				Nomor Hp : <br>
				<input type="number" name="nomor_hp_owner" class="form-control" required /><br>
                </div>
                <div class="modal-footer">					
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <input type="submit" class="btn btn-primary" name="input_owner" value="Simpan"/>
                </form>
				</div>
            </div>
        </div>
    </div>
	<script>
        $(function(){
            $(document).on('click','.tambah-owner',function(e){
                e.preventDefault();
                $("#myModal2").modal('show');
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