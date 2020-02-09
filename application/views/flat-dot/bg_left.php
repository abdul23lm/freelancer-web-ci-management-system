<div id="sidebar-left" class="span1">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li class="<?php echo $mark_dashboard; ?>"><a href="<?php echo base_url(); ?>"><i class="fa-icon-list-alt"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
			<li class="<?php echo $mark_pelanggan; ?>"><a href="<?php echo base_url(); ?>dashboard/pelanggan"><i class="fa-icon-user"></i><span class="hidden-tablet"> Data Client</span></a></li>
			<?php if($this->session->userdata("level")=="admin"){?>
			<li class="<?php echo $mark_user; ?>"><a href="<?php echo base_url(); ?>dashboard/pengguna"><i class="fa-icon-tasks"></i><span class="hidden-tablet"> Data User</span></a></li>
			<?php } ?>
			<li class="<?php echo $mark_pemesanan; ?>"><a href="<?php echo base_url(); ?>dashboard/pemesanan"><i class="fa-icon-book"></i><span class="hidden-tablet"> Pemesanan</span></a></li>
			<li class="<?php echo $mark_belum_lunas; ?>"><a href="<?php echo base_url(); ?>dashboard/belum_lunas"><i class="fa-icon-bar-chart"></i><span class="hidden-tablet"> Belum Lunas</span></a></li>
			<li class="<?php echo $mark_pembayaran; ?>"><a href="<?php echo base_url(); ?>dashboard/pembayaran"><i class="fa-icon-check"></i><span class="hidden-tablet"> Data Lunas</span></a></li>
			<li class="<?php echo $mark_jenis_cetakan; ?>"><a href="<?php echo base_url(); ?>dashboard/jenis_cetakan"><i class="fa-icon-calendar"></i><span class="hidden-tablet"> Jenis Desain</span></a></li>
			<li class="<?php echo $mark_jenis_satuan; ?>"><a href="<?php echo base_url(); ?>dashboard/satuan"><i class="fa-icon-file"></i><span class="hidden-tablet"> Tipe File</span></a></li>
		</ul>
	</div>
</div>