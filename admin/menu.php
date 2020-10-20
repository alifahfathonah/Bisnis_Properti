<div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <?php
						$id_status= $_SESSION['id_status'];	
						?>
                        <li><a class="ajax-link" href="dashboard.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a></li>
						<?php
						//--Admin
						if ($id_status=="S005")
						{
						?>
						<li class="nav-header">Properti</li>
                        <li><a class="ajax-link" href="input_data.php"><i class="glyphicon glyphicon-plus"></i><span> Tambah Properti</span></a></li>
						<li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-chevron-down"></i><span> Listing Properti</span></a>
                            <ul class="nav nav-pills nav-stacked">
								<li><a class="ajax-link" href="tampil_data.php"><i class="glyphicon glyphicon-list-alt"></i><span> All Properti</span></a></li>
								<li><a class="ajax-link" href="tampil_data_agen.php"><i class="glyphicon glyphicon-list-alt"></i><span> Agen Properti</span></a></li>
								<li><a class="ajax-link" href="tampil_data_kamu.php"><i class="glyphicon glyphicon-list-alt"></i><span> Properti Anda</span></a></li>
                            </ul>
                        </li>                        
                        <li><a class="ajax-link" href="cari.php"><i class="glyphicon glyphicon-search"></i><span> Cari Properti</span></a></li>
                        <li class="nav-header hidden-md">Agen</li>
                        <li><a class="ajax-link" href="calon_agen.php"><i
                                    class="glyphicon glyphicon-briefcase"></i><span> Calon Agen</span></a></li>
						<li><a class="ajax-link" href="input_user.php"><i
                                    class="glyphicon glyphicon-plus"></i><span> Tambah Agen</span></a></li>	
                        <li><a class="ajax-link" href="tampil_user.php"><i
                               class="glyphicon glyphicon-th-list"></i><span> Tampil Agen</span></a></li>
						
						<li class="nav-header hidden-md">Other</li>
                        <li><a class="ajax-link" href="tampil_pengunjung.php"><i class="glyphicon glyphicon-user"></i><span> Data Pengunjung</span></a>
                        </li>
						<li><a class="ajax-link" href="laporan_admin.php"><i class="glyphicon glyphicon-comment"></i><span> Laporan</span></a>
                        </li>
						<li><a class="ajax-link" href="sementara.php"><i class="glyphicon glyphicon-refresh"></i><span> Recycle</span></a>
                        </li>
						<li><a class="ajax-link" href="pimpinan.php"><i class="glyphicon glyphicon-bullhorn"></i><span> Pimpinan</span></a>
                        </li>
						<li><a class="ajax-link" href="profil.php"><i class="glyphicon glyphicon-home"></i><span> Profil</span></a></li> 
						<?php } else ?>
						<?php
						//---------------Menu Agen
						if ($id_status=="S003")
						{
						?>
						<li class="nav-header">Properti</li>
                        <li><a class="ajax-link" href="input_data.php"><i class="glyphicon glyphicon-plus"></i><span> Tambah Properti</span></a></li>
						<li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-chevron-down"></i><span> Listing Properti</span></a>
                            <ul class="nav nav-pills nav-stacked">
								<li><a class="ajax-link" href="tampil_data.php"><i class="glyphicon glyphicon-list-alt"></i><span> All Properti</span></a></li>
								<li><a class="ajax-link" href="tampil_data_admin.php?ss=admin"><i class="glyphicon glyphicon-list-alt"></i><span> Admin Properti</span></a></li>
								<li><a class="ajax-link" href="tampil_data_agen.php?ss=agen"><i class="glyphicon glyphicon-list-alt"></i><span> Agen Properti</span></a></li>
								<li><a class="ajax-link" href="tampil_data_kamu.php?ss=kamu"><i class="glyphicon glyphicon-list-alt"></i><span> Properti Anda</span></a></li>
                            </ul>
                        </li>                        
                        <li><a class="ajax-link" href="cari.php"><i class="glyphicon glyphicon-search"></i><span> Cari Properti</span></a></li>
						
                        <li class="nav-header hidden-md">Agen</li>
                        <li><a class="ajax-link" href="tampil_user.php"><i
                               class="glyphicon glyphicon-th-list"></i><span> Tampil Agen</span></a></li>
						
						<li class="nav-header hidden-md">Other</li>
                        <li><a class="ajax-link" href="tampil_pengunjung.php"><i class="glyphicon glyphicon-user"></i><span> Data Pengunjung</span></a>
                        </li>
						<li><a class="ajax-link" href="laporan_agen.php"><i class="glyphicon glyphicon-comment"></i><span> Laporan</span></a>
                        </li>
						<li><a class="ajax-link" href="sementara.php"><i class="glyphicon glyphicon-refresh"></i><span> Recycle</span></a>
                        </li>
						<li><a class="ajax-link" href="profil.php"><i class="glyphicon glyphicon-home"></i><span> Profil</span></a></li> 
						<?php } else ?>
						<?php
						//------Menu Pemimpin
						if ($id_status=="S006")
						{
						?>
						<li class="nav-header">Properti</li>
                        <li><a class="ajax-link" href="input_data.php"><i class="glyphicon glyphicon-plus"></i><span> Tambah Properti</span></a></li>
						<li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-chevron-down"></i><span> Listing Properti</span></a>
                            <ul class="nav nav-pills nav-stacked">
								<li><a class="ajax-link" href="tampil_data.php"><i class="glyphicon glyphicon-list-alt"></i><span> All Properti</span></a></li>
								<li><a class="ajax-link" href="tampil_data_admin.php"><i class="glyphicon glyphicon-list-alt"></i><span> Admin Properti</span></a></li>
								<li><a class="ajax-link" href="tampil_data_agen.php"><i class="glyphicon glyphicon-list-alt"></i><span> Agen Properti</span></a></li>
								<li><a class="ajax-link" href="tampil_data_kamu.php"><i class="glyphicon glyphicon-list-alt"></i><span> Properti Anda</span></a></li>
                            </ul>
                        </li>                        
                        
                        <li class="nav-header hidden-md">Agen</li>
                        <li><a class="ajax-link" href="calon_agen.php"><i
                                    class="glyphicon glyphicon-briefcase"></i><span> Calon Agen</span></a></li>
						<li><a class="ajax-link" href="input_user.php"><i
                                    class="glyphicon glyphicon-plus"></i><span> Tambah Agen</span></a></li>	
                        <li><a class="ajax-link" href="tampil_user.php"><i
                               class="glyphicon glyphicon-th-list"></i><span> Tampil Agen</span></a></li>
						
						<li class="nav-header hidden-md">Other</li>
                        <li><a class="ajax-link" href="tampil_pengunjung.php"><i class="glyphicon glyphicon-user"></i><span> Data Pengunjung</span></a>
                        </li>
						<li><a class="ajax-link" href="laporan_admin.php"><i class="glyphicon glyphicon-comment"></i><span> Laporan</span></a>
                        </li>
						<li><a class="ajax-link" href="sementara.php"><i class="glyphicon glyphicon-refresh"></i><span> Recycle</span></a>
                        </li>
						<li><a class="ajax-link" href="pimpinan.php"><i class="glyphicon glyphicon-bullhorn"></i><span> profil</span></a>
                        </li>							
						<?php }?>
                    </ul>
                    </div>
            </div>
        </div>