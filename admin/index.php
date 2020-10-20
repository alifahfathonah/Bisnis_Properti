<?php
session_start();
if (!empty($_SESSION['username'])) {
	header('location:dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
include "include/header.php";
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
<script type="text/javascript" src="inc/jquery.min.js"></script>
<script type="text/javascript" src="inc/jquery.validate.min.js"></script>		
<script type="text/javascript">
		$(document).ready(function() {
			$('#formalin').validate({
				rules: {
					usernames : {
						//digits: true,
						//hanyahuruf: true,
						minlength:5,
						maxlength:30
						
					}
				},
				messages: {
					usernames: {
						required: "Kolom username harus diisi",
						minlength: "Minimal 5 Karakter",
						maxlength: "Maksimal 30 Karakter"
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
<div class="ch-container">
    <div class="row">
        
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>LOGIN</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <form class="form-horizontal" id="formalin" action="otentikasi.php" method="post">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" class="form-control" name="usernames" required placeholder="Username">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" class="form-control"name="passwords" required placeholder="Password">
                    </div>
                    <div class="clearfix"></div>

                    <div>
                        <button type="submit" class="btn btn-outline btn-success btn-lg btn-block">Login</button>
					</div>
                </fieldset>
            </form>
        </div>
		<div class="well col-md-5 center">
						<?php
				echo "<div class='alert alert-info'>";
				echo "<i class='glyphicon glyphicon-info-sign'></i> Lupa Kata Sandi ? Klik di <strong><a href='lupapas.php'>Sini</a></strong>";
				echo "</div>";
				?>
		</div>
		<div class="col-md-5 center">
		<?php
			if (!empty($_GET['error'])) {
				if ($_GET['error'] == 1) {
					echo "<div class='alert alert-danger'>";
					echo "<i class='glyphicon glyphicon-warning-sign'></i> Username atau Password Salah !!";
					echo "</div>";
				}
				
			}
		?>
		</div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>


</body>
</html>
