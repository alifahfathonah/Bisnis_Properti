<?php
	include "include/cek-login.php";
	include "include/validasi.php";
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
            Tambah Pengguna
        </li>
    </ul>
</div>
<div class="row">
    <div class="box col-md-8">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Form Data User</h2>

                <div class="box-icon">                    
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form id="formalin" role="form"  action="proses_user.php" method="POST" name="input">
							
							<div class="form-group">
							<label>Nama</label>
                                <input type="text" id="" name="nama" class="form-control" required />
                            </div>
							<div class="form-group">
							<label>Email</label>
                                <input type="text" id="cekusername" name="email" class="email form-control" required />
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
								<input  type="text" name="hape" class="form-control" required />
							</div>
							<div class="form-group ">
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
							<div class="form-group">
							<label>Alamat</label>
								<input  type="text" name="alamat" class="form-control" required maxlength="100"/>
							</div>	
							<div class="form-group ">
							<label>Pertanyaan Keamanan</label>
                                <select class="form-control"  name="key_tanya">
                                    <option>Siapa Nama Teman kecil Anda ?</option>
                                    <option>Apa Nama Binatang Peliharaan Anda ?</option>
                                    <option>Buah Apa yang Anda Suka ?</option>
                                    <option>Siapa nama teman Sekamar anda ?</option>
                                    <option>Bantuan</option>
                                </select>
                            </div>
							<div class="form-group">
							<label>Jawaban</label>
								<input  type="text" name="key_jawab" class="form-control" required maxlength="100"/>
							</div>	
							<div class="form-group">
							<label>Pesan</label>
								<input  type="text" name="pesan" class="form-control" required maxlength="100"/>
							</div>						
				<?php
					$id_user = rand(99,99999);
					$id_dokumen = rand(99,99999);
				?>				
				<input type="hidden"  name="id_dokumen" value="D<?=$id_dokumen;?>" />
				<input type="hidden"  name="id_user" value="U<?=$id_user;?>" />
				<input type="hidden"  name="id_status" value="S003" />
				<input type="submit" class="btn btn-lg btn-default" name="input" value="Simpan" />
				<input type="reset" class="btn btn-lg btn-default" name="reset" value="Reset"/>
                </form>
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row
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
            $(document).on('click','.edit-status',function(e){
                e.preventDefault();
                $("#myStatus").modal('show');
                $.post('gbuser/index.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    </script>
	-->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <hr>

</div>
<?php
include "include/footer.php";
?>
</body>
</html>
