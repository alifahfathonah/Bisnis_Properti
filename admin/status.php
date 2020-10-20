<?php 
include"include/koneksi.php";
$id_properti=$_POST['id'];
if(isset($_GET['ss']))
{
	$ss=$_GET['ss'];
}
else
{
	$ss="";
}
$query = mysqli_query($con,"SELECT * FROM properti where id_properti='$id_properti'");

	//echo $query;
?>
<form action="proses_status.php" method="POST">
							<div class="form-group ">
								<select name="status" class="form-control" id="selectError" data-rel="chosen">
										<?php										
										while ($hasil = mysqli_fetch_array($query))
										{
											$hasila=$hasil['fee_agen'];
											?>
											<option selected value="<?=$hasil['status']?>"><?=$hasil['status']?></option>
											<option value="Tersedia">Tersedia</option>
											<option value="Terjual">Terjual</option>
											<option value="Disewa">Disewa</option>
											<?php
												
										}
										?>
								</select>
                            </div>
							<input type="hidden" name="id_properti" value="<?=$id_properti;?>" />
							<input type="hidden" name="fee_agen" value="<?=$hasila?>" />
							<input type="hidden" name="ss" value="<?=$ss?>" />
							<div class="modal-footer">
							<a href="#" class="btn btn-default" data-dismiss="modal">Cancel</a>  
								<button class="btn btn-default" name="submit" type="submit" >Submit</a>					
							</div>
							
</form>
