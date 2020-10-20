<html>
<head>
<title>Script pilihan Kota otomatis dengan Jquery AJAX</title>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
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
</script>
</head>
<body>
Nama kjkkl<br/>
<input type="text" name="nama" size="50"/><br/><br/>
Negara<br/>
<input type="text" name="nama" size="50"/><br/><br/>
Provinsi<br/>
<select name="prop" onchange="pilih_kota(this.value);">
<option value="#">Pilih Provinsi</option>
<?php 
          include 'koneksi.php';
          $query4=mysql_query("SELECT id_prov,nama FROM provinsi ORDER BY nama");?>		  
          //$query->execute();
          <?php while ($data= mysql_fetch_array($query4)){
			?>
			<option value="<?=$data['id_prov']?>"><?=$data['nama']?></option>;
			<?php
			}
          ?>
</select>
<br/><br/>
Kota<br/>

<select name="kota" id="dom_kota">
	<option value="#">Pilih Kota</option>
<select>
<body>
</html>