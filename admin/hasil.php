<?php 
include"include/koneksi.php";
$id=$_POST['id'];
$query = mysqli_query($con,"SELECT * FROM fasilitas where id_fasilitas='$id'");
while ($hasil = mysqli_fetch_array($query))
{
	$sertifikat =addslashes(strip_tags($hasil['sertifikat']));
	$kamar_mandi =addslashes(strip_tags($hasil['kamar_mandi']));
	$kamar_tidur =addslashes(strip_tags($hasil['kamar_tidur']));
	$luas_bangunan =addslashes(strip_tags($hasil['luas_bangunan']));
	$jumlah_lantai=$hasil ['jumlah_lantai'];
	$carport=$hasil ['carport'];
	$air=$hasil ['air'];
	$garasi=$hasil ['garasi'];
	$hadap=$hasil ['hadap'];
	$listrik=$hasil ['listrik'];
	$tahun =addslashes(strip_tags($hasil['tahun']));
}
?>
<table width="100%">
<tr>
	<td width="20%">Sertifikat</td>
	<td width="1%">:</td>
	<td><?=$sertifikat;?></td>	
</tr>
<tr>
	<td width="20%">Tahun</td>
	<td width="1%">:</td>
	<td><?=$tahun;?></td>	
</tr>
<tr>
	<td width="20%">Kamar Mandi</td>
	<td width="1%">:</td>
	<td><?=$kamar_mandi;?></td>	
</tr>
<tr>
	<td width="20%">Kamar Tidur</td>
	<td width="1%">:</td>
	<td><?=$kamar_tidur;?></td>	
</tr>
<tr>
	<td width="20%">Luas Bangunan</td>
	<td width="1%">:</td>
	<td><?=$luas_bangunan;?> m<sup>2</sup></td>	
</tr>
<tr>
	<td width="20%">Listrik</td>
	<td width="1%">:</td>
	<td><?=$listrik;?> Watt</td>
</tr>
<tr>
	<td width="20%">Air</td>
	<td width="1%">:</td>
	<td><?=$air;?></td>	
</tr>
<tr>
	<td width="20%">Carport</td>
	<td width="1%">:</td>
	<td><?=$carport;?></td>	
</tr>
<tr>
	<td width="20%">Jumlah Lantai</td>
	<td width="1%">:</td>
	<td><?=$jumlah_lantai;?></td>	
</tr>
<tr>
	<td width="20%">Hadap</td>
	<td width="1%">:</td>
	<td><?=$hadap;?></td>	
</tr>
<tr>
	<td width="20%">Garasi</td>
	<td width="1%">:</td>
	<td><?=$garasi;?></td>	
</tr>


</table>