<html lang="en">
<head>
  <title>PHP - jquery ajax crop image before upload using croppie plugins</title>
  <!--<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>-->
  <script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
  <!-- <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">-->
  <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
</head>

							<div class="row">
							<div class="box col-md-12">
							<div class="box-inner">
							<div class="box-header well" data-original-title="">
							<h2><i class="glyphicon glyphicon-th"></i> Upload Foto</h2>
							<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
							</div>
							</div>

	  	<div class="row">
	  		<div class="col-md-4 text-center">
				<div id="upload-demo" style="width:350px"></div>
	  		</div>
	  		<div class="col-md-4" style="padding-top:30px;">
				<strong>Select Image:</strong>
				<br/>
				<input type="file" id="upload">
				<br/>
				<button class="btn btn-success upload-result">Upload Image</button>
	  		</div>
	  		<div class="col-md-4" style="">
				<div id="upload-demo-i" style="background:#e1e1e1;width:240px;height:320px;margin-top:60px">				
				</div>
				<input id="data-nama" type="hidden" value="<?=$name_foto?>" />
	  		</div>
	  	</div>
	<div class="row"> 
	<div class="col-md-4 text-center">
				
	</div>
	<div class="col-md-4 text-center">
		<a href="pimpinan.php" class="btn btn-default">SELESAI</a>		
	</div>
	<div class="col-md-4 text-center">
				
	</div>		
	</div>


							</div>
							</div>
							</div>

<?php
if(isset($_GET['name_foto'])){
	$fo_to=$name_foto;
}
else
{
	$fo_to='pimpinan.png';
}
?>
<script type="text/javascript">
$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 240,
        height: 320,
        type: 'square'
    },
    boundary: {
        width: 280,
        height: 373
    }
});
$uploadCrop.croppie('bind',{
url :"gbuser/<?=$fo_to?>"
});

$('#upload').on('change', function () { 
	var reader = new FileReader();
    reader.onload = function (e) {
    	$uploadCrop.croppie('bind', {
			
    		url: e.target.result
    	}).then(function(){
    		console.log('jQuery bind complete');
    	});
    	
    }
    reader.readAsDataURL(this.files[0]);
});   

$('.upload-result').on('click', function (ev) {
		$uploadCrop.croppie('result', {
		type: 'canvas',
		size: 'viewport'
	}).then(function (resp) {
		var nama   = $('#data-nama').val();
		$.ajax({
			url: "edit_foto_pimpinan.php",
			type: "POST",
			data: {"image":resp,"nama":nama},			
			success: function (data) {
				html = '<img src="' + resp + '" />';
				$("#upload-demo-i").html(html);
			}
		});
	});
});


</script>
</html>