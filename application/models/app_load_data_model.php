<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_load_data_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 * @keterangan : Model untuk manajemen user login
	 **/
	 
	public function indexs_data_pelanggan($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Nama Client</th>
					  <th>Alamat</th>
					  <th>Jenis Client</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
		
		$where['nama_pelanggan']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("lmcp_pelanggan");
		$config['base_url'] = base_url() . 'dashboard/pelanggan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->like($where)->order_by("kode_pelanggan","DESC")->get("lmcp_pelanggan",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->nama_pelanggan.'</td>
					<td>'.$g->alamat_pelanggan.'</td>
					<td class="center">'.$g->jenis.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/pelanggan/edit/'.$g->kode_pelanggan.'">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/pelanggan/hapus/'.$g->kode_pelanggan.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	
	public function indexs_data_karyawan($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Nama Karyawan</th>
					  <th>Gaji Pokok</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
		
		$where['nama_karyawan']  = $this->session->userdata("key"); 	  
		$tot_hal = $this->db->like($where)->get("lmcp_karyawan");
		$config['base_url'] = base_url() . 'dashboard/data_karyawan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->like($where)->order_by("id_karyawan","DESC")->get("lmcp_karyawan",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->nama_karyawan.'</td>
					<td class="center">'.$g->gaji_pokok.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/data_karyawan/edit/'.$g->id_karyawan.'">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/data_karyawan/hapus/'.$g->id_karyawan.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	
	public function indexs_gaji_karyawan($cari,$limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Nama Karyawan</th>
					  <th>Bulan</th>
					  <th>Gaji Pokok</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
			  
		$tot_hal = $this->db->query("select a.tanggal, a.id_gaji_karyawan, b.nama_karyawan, b.gaji_pokok
		from lmcp_gaji_karyawan a left join lmcp_karyawan b on a.id_karyawan=b.id_karyawan where 
		INSTR(CONCAT(' ', tanggal,' '), '".$cari."')");
		
		$config['base_url'] = base_url() . 'dashboard/gaji_karyawan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->query("select a.tanggal, a.id_gaji_karyawan, b.nama_karyawan, b.gaji_pokok
		from lmcp_gaji_karyawan a left join lmcp_karyawan b on a.id_karyawan=b.id_karyawan where 
		INSTR(CONCAT(' ', tanggal,' '), '".$cari."') LIMIT ".$offset.",".$limit."");
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->nama_karyawan.'</td>
					<td class="center">'.$g->tanggal.'</td>
					<td class="center">Rp. '.number_format($g->gaji_pokok,2,",",".").'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/gaji_karyawan/edit/'.$g->id_gaji_karyawan.'">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/gaji_karyawan/hapus/'.$g->id_gaji_karyawan.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_satuan($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Tipe File</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
		

		$where['satuan']  = $this->session->userdata("key"); 		  
		$tot_hal = $this->db->like($where)->get("lmcp_jenis_satuan");
		$config['base_url'] = base_url() . 'dashboard/satuan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->like($where)->order_by("id_jenis_satuan","DESC")->get("lmcp_jenis_satuan",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->satuan.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/satuan/edit/'.$g->id_jenis_satuan.'">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/satuan/hapus/'.$g->id_jenis_satuan.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_cetakan($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Jenis Desain</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
		

		$where['nama_cetakan']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("lmcp_jenis_desain");
		$config['base_url'] = base_url() . 'dashboard/jenis_cetakan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->like($where)->order_by("kode_jenis_cetakan","DESC")->get("lmcp_jenis_desain",$limit,$offset);
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->jenis_cetakan.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/jenis_cetakan/edit/'.$g->kode_jenis_cetakan.'">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/jenis_cetakan/hapus/'.$g->kode_jenis_cetakan.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_pengguna($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Nama User</th>
					  <th>Username</th>
					  <th>Level</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';

		$where['nama_user']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("lmcp_user");
		$config['base_url'] = base_url() . 'dashboard/pengguna/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->like($where)->order_by("kode_user","DESC")->get("lmcp_user",$limit,$offset);
		$i=$offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->nama_user.'</td>
					<td class="center">'.$g->username.'</td>
					<td class="center">'.$g->level.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/pengguna/edit/'.$g->kode_user.'">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/pengguna/hapus/'.$g->kode_user.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_jenis_cetakan($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>Nama Desain</th>
					  <th>Harga</th>
					  <th>Tipe File</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';

		$where['nama_cetakan']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("lmcp_jenis_desain");
		$config['base_url'] = base_url() . 'dashboard/jenis_cetakan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->query("select * from lmcp_jenis_desain a left join lmcp_jenis_satuan b on a.id_jenis_satuan=b.id_jenis_satuan where nama_cetakan like '%".$where['nama_cetakan']."%' limit ".$offset.",".$limit."");
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->nama_cetakan.'</td>
					<td class="center">Rp. '.number_format($g->harga,2,',','.').'</td>
					<td class="center">'.$g->satuan.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/jenis_cetakan/edit/'.$g->kode_jenis_cetakan.'">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/jenis_cetakan/hapus/'.$g->kode_jenis_cetakan.'" onClick=\'return confirm("Anda yakin?");\'>
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_pemesanan($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>No. Nota</th>
					  <th>Tanggal Pesan</th>
					  <th>Tanggal Selesai</th>
					  <th>Nama Client</th>
					  <th>Alamat</th>
					  <th>Jenis Desain</th>
					  <th>Total Harga</th>
					  <th>Status Pembayaran</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
		
		if($this->session->userdata("key_search")=="")
		{
			$set['key_search'] = "nama_pelanggan";
			$this->session->set_userdata($set);
		}
		$where[$this->session->userdata("key_search")]  = $this->session->userdata("key"); 	

		$key = $this->session->userdata("key_search");
		$val = $this->session->userdata("key");

		$tot_hal = $this->db->query("select a.tgl_pesan, a.kode_pemesanan, b.alamat_pelanggan, a.tgl_selesai, b.nama_pelanggan, a.jumlah_harga, a.status_pembayaran, a.kode_pemesanan
		 from lmcp_pemesanan a left join lmcp_pelanggan b on a.kode_pelanggan=b.kode_pelanggan where ".$key." like '%".$val."%'");
		$config['base_url'] = base_url() . 'dashboard/pemesanan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->query("select a.tgl_pesan, a.kode_pemesanan, b.alamat_pelanggan, a.tgl_selesai, b.nama_pelanggan, a.jumlah_harga, a.status_pembayaran, a.kode_pemesanan
		 from lmcp_pemesanan a left join lmcp_pelanggan b on a.kode_pelanggan=b.kode_pelanggan where ".$key." like '%".$val."%' LIMIT ".$offset.",".$limit."");
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->kode_pemesanan.'</td>
					<td>'.$g->tgl_pesan.'</td>
					<td>'.$g->tgl_selesai.'</td>
					<td>'.$g->nama_pelanggan.'</td>
					<td>'.$g->alamat_pelanggan.'</td>';
					$get_detail = $this->db->select("*")->join("lmcp_jenis_desain","lmcp_jenis_desain.kode_jenis_cetakan=lmcp_pemesanan_detail.kode_jenis_cetakan")->get_where("lmcp_pemesanan_detail",array("kode_pemesanan"=>$g->kode_pemesanan));
					$hasil .= "<th>";

					foreach($get_detail->result() as $gd)
					{
						$hasil .= "<li>".$gd->nama_cetakan."</li>";
					}

					$hasil .= "</th>";
					$hasil .='<td>'.number_format($g->jumlah_harga,2,",",".").'</td>
					<td>'.$g->status_pembayaran.'</td>
					<td class="center">';
					if($this->session->userdata("level")=="admin")
					{
						$hasil .='	<a class="btn btn-info" href="'.base_url().'dashboard/pemesanan/edit/'.$g->kode_pemesanan.'" title="Edit">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/pemesanan/hapus/'.$g->kode_pemesanan.'" onClick=\'return confirm("Anda yakin?");\' title="Hapus">
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>';
					}
					$hasil .='<a class="btn btn-info" href="'.base_url().'dashboard/pemesanan/cetak/'.$g->kode_pemesanan.'" title="Cetak Kwitansi" target="_blank">
							<i class="halflings-icon file halflings-icon"></i>  
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_belum_lunas($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>No. Nota</th>
					  <th>Tanggal Pesan</th>
					  <th>Tanggal Selesai</th>
					  <th>Nama Client</th>
					  <th>Alamat</th>
					  <th>Jenis Desain</th>
					  <th>Total Harga</th>
					  <th>Uang Muka</th>
					  <th>Sisa Bayar</th>
					  <th>Status Pembayaran</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
		
		
		if($this->session->userdata("key_search")=="")
		{
			$set['key_search'] = "nama_pelanggan";
			$this->session->set_userdata($set);
		}
		$where[$this->session->userdata("key_search")]  = $this->session->userdata("key"); 	

		$key = $this->session->userdata("key_search");
		$val = $this->session->userdata("key");

		$tot_hal = $this->db->query("select a.tgl_pesan, uang_muka, a.kode_pemesanan, b.alamat_pelanggan, a.tgl_selesai, b.nama_pelanggan, a.jumlah_harga, a.status_pembayaran, a.kode_pemesanan
		 from lmcp_pemesanan a left join lmcp_pelanggan b on a.kode_pelanggan=b.kode_pelanggan where ".$key." like '%".$val."%' and status_pembayaran='Belum Lunas'");

		$config['base_url'] = base_url() . 'dashboard/pemesanan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->query("select a.tgl_pesan, uang_muka, a.kode_pemesanan, b.alamat_pelanggan, a.tgl_selesai, b.nama_pelanggan, a.jumlah_harga, a.status_pembayaran, a.kode_pemesanan
		 from lmcp_pemesanan a left join lmcp_pelanggan b on a.kode_pelanggan=b.kode_pelanggan where ".$key." like '%".$val."%' and status_pembayaran='Belum Lunas' LIMIT ".$offset.",".$limit."");
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->kode_pemesanan.'</td>
					<td>'.$g->tgl_pesan.'</td>
					<td>'.$g->tgl_selesai.'</td>
					<td>'.$g->nama_pelanggan.'</td>
					<td>'.$g->alamat_pelanggan.'</td>';
					$get_detail = $this->db->select("*")->join("lmcp_jenis_desain","lmcp_jenis_desain.kode_jenis_cetakan=lmcp_pemesanan_detail.kode_jenis_cetakan")->get_where("lmcp_pemesanan_detail",array("kode_pemesanan"=>$g->kode_pemesanan));
					$hasil .= "<th>";

					foreach($get_detail->result() as $gd)
					{
						$hasil .= "<li>".$gd->nama_cetakan."</li>";
					}

					$hasil .= "</th>";
					$hasil .='<td>'.number_format($g->jumlah_harga,2,",",".").'</td>
					<td>'.number_format($g->uang_muka,2,",",".").'</td>
					<td>'.number_format($g->jumlah_harga-$g->uang_muka,2,",",".").'</td>
					<td>'.$g->status_pembayaran.'</td>
					<td class="center">';

					if($this->session->userdata("level")=="admin")
					{
						$hasil .='	<a class="btn btn-info" href="'.base_url().'dashboard/pemesanan/edit/'.$g->kode_pemesanan.'" title="Edit">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/pemesanan/hapus/'.$g->kode_pemesanan.'" onClick=\'return confirm("Anda yakin?");\' title="Hapus">
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>';
					}
					$hasil .='	<a class="btn btn-info" href="'.base_url().'dashboard/pemesanan/cetak/'.$g->kode_pemesanan.'" title="Cetak Kwitansi" target="_blank">
							<i class="halflings-icon file halflings-icon"></i>  
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_data_pembayaran($limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>No. Kwitansi</th>
					  <th>No. Nota</th>
					  <th>Tanggal Pesan</th>
					  <th>Tanggal Selesai</th>
					  <th>Tanggal Bayar</th>
					  <th>Nama Client</th>
					  <th>Alamat</th>
					  <th>Jenis Desain</th>
					  <th>Total Harga</th>
					  <th>Jumlah Bayar</th>
					  <th>Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
		
		
		if($this->session->userdata("key_search")=="")
		{
			$set['key_search'] = "nama_pelanggan";
			$this->session->set_userdata($set);
		}
		$where[$this->session->userdata("key_search")]  = $this->session->userdata("key"); 	

		$key = $this->session->userdata("key_search");
		$val = $this->session->userdata("key");
			  
		$tot_hal = $this->db->query("select a.kode_pemesanan, status_pembayaran, a.kode_pembayaran, b.tgl_pesan, b.tgl_selesai, a.tgl_bayar, a.bayar, b.nama_pelanggan, b.alamat_pelanggan, b.jumlah_harga 
		from lmcp_pembayaran a left join (select x.tgl_pesan, x.kode_pemesanan, x.tgl_selesai, y.nama_pelanggan, y.alamat_pelanggan, x.jumlah_harga, x.status_pembayaran 
		from lmcp_pemesanan x left join lmcp_pelanggan y on x.kode_pelanggan=y.kode_pelanggan) b on a.kode_pemesanan=b.kode_pemesanan where ".$key." like '%".$val."%'");

		$config['base_url'] = base_url() . 'dashboard/pembayaran/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->query("select a.kode_pemesanan, status_pembayaran, a.kode_pembayaran, b.tgl_pesan, b.tgl_selesai, a.tgl_bayar, a.bayar, b.nama_pelanggan, b.alamat_pelanggan, b.jumlah_harga 
		from lmcp_pembayaran a left join (select x.tgl_pesan, x.kode_pemesanan, x.tgl_selesai, y.nama_pelanggan, y.alamat_pelanggan, x.jumlah_harga, x.status_pembayaran 
		from lmcp_pemesanan x left join lmcp_pelanggan y on x.kode_pelanggan=y.kode_pelanggan) b on a.kode_pemesanan=b.kode_pemesanan where ".$key." like '%".$val."%' LIMIT ".$offset.",".$limit."");
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->kode_pembayaran.'</td>
					<td>'.$g->kode_pemesanan.'</td>
					<td>'.$g->tgl_pesan.'</td>
					<td>'.$g->tgl_selesai.'</td>
					<td>'.$g->tgl_bayar.'</td>
					<td>'.$g->nama_pelanggan.'</td>
					<td>'.$g->alamat_pelanggan.'</td>';
					$get_detail = $this->db->select("*")->join("lmcp_jenis_desain","lmcp_jenis_desain.kode_jenis_cetakan=lmcp_pemesanan_detail.kode_jenis_cetakan")->get_where("lmcp_pemesanan_detail",array("kode_pemesanan"=>$g->kode_pemesanan));
					$hasil .= "<th>";

					foreach($get_detail->result() as $gd)
					{
						$hasil .= "<li>".$gd->nama_cetakan."</li>";
					}

					$hasil .= "</th>";
					$hasil .= '<td>'.number_format($g->jumlah_harga,2,",",".").'</td>
					<td>'.number_format($g->bayar,2,",",".").'</td>
					<td>'.$g->status_pembayaran.'</td>
					<td class="center">';
					if($this->session->userdata("level")=="admin")
					{
						$hasil .= '<a class="btn btn-info" href="'.base_url().'dashboard/pembayaran/edit/'.$g->kode_pembayaran.'/'.$g->kode_pemesanan.'" title="Edit">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/pembayaran/hapus/'.$g->kode_pembayaran.'/'.$g->kode_pemesanan.'" onClick=\'return confirm("Anda yakin?");\' title="Hapus">
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>';
					}

					$hasil .='<a class="btn btn-info" href="'.base_url().'dashboard/pemesanan/cetak/'.$g->kode_pemesanan.'" title="Cetak Kwitansi" target="_blank">
							<i class="halflings-icon file halflings-icon"></i>  
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_laporan_pemesanan($cari,$limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>No. Nota</th>
					  <th>Tanggal Pesan</th>
					  <th>Tanggal Selesai</th>
					  <th>Nama Client</th>
					  <th>Total Harga</th>
					  <th>Status Pembayaran</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
			  
		$tot_hal = $this->db->query("select a.tgl_pesan, a.kode_pemesanan, a.tgl_selesai, b.nama_pelanggan, a.jumlah_harga, a.status_pembayaran, a.kode_pemesanan
		from lmcp_pemesanan a left join lmcp_pelanggan b on a.kode_pelanggan=b.kode_pelanggan where 
		INSTR(CONCAT(' ', tgl_pesan,' '), '".$cari."')");
		
		$config['base_url'] = base_url() . 'dashboard/pemesanan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->query("select a.tgl_pesan, a.kode_pemesanan, a.tgl_selesai, b.nama_pelanggan, a.jumlah_harga, a.status_pembayaran, a.kode_pemesanan
		from lmcp_pemesanan a left join lmcp_pelanggan b on a.kode_pelanggan=b.kode_pelanggan where 
		INSTR(CONCAT(' ', tgl_pesan,' '), '".$cari."') LIMIT ".$offset.",".$limit."");
		
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->kode_pemesanan.'</td>
					<td>'.$g->tgl_pesan.'</td>
					<td>'.$g->tgl_selesai.'</td>
					<td>'.$g->nama_pelanggan.'</td>
					<td>'.number_format($g->jumlah_harga,2,",",".").'</td>
					<td>'.$g->status_pembayaran.'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/pemesanan/edit/'.$g->kode_pemesanan.'" title="Edit">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-info" href="'.base_url().'dashboard/pemesanan/cetak/'.$g->kode_pemesanan.'" title="Cetak Kwitansi" target="_blank">
							<i class="halflings-icon file halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/pemesanan/hapus/'.$g->kode_pemesanan.'" onClick=\'return confirm("Anda yakin?");\' title="Hapus">
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function indexs_laporan_pembayaran($tipe,$cari,$limit,$offset)
	{
		$hasil = "";
		$hasil .= '
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>No.</th>
					  <th>No. Kwitansi</th>
					  <th>No. Nota</th>
					  <th>Tanggal Pesan</th>
					  <th>Tanggal Selesai</th>
					  <th>Tanggal Bayar</th>
					  <th>Nama Client</th>
					  <th>Total Harga</th>
					  <th>Jumlah Bayar</th>
					  <th>Actions</th>
				  </tr>
			  </thead>';
			  
		$tot_hal = $this->db->query("select x.kode_pemesanan, x.kode_pembayaran, y.tgl_pesan, y.tgl_selesai, x.tgl_bayar, x.bayar, y.nama_pelanggan, y.jumlah_harga 
		from lmcp_pembayaran x left join (select a.tgl_pesan, a.kode_pemesanan, a.tgl_selesai, b.nama_pelanggan, a.jumlah_harga, a.status_pembayaran 
		from lmcp_pemesanan a left join lmcp_pelanggan b on a.kode_pelanggan=b.kode_pelanggan) y on x.kode_pemesanan=y.kode_pemesanan where 
		INSTR(CONCAT(' ', tgl_bayar,' '), '".$cari."')");
		
		$config['base_url'] = base_url() . 'dashboard/pemesanan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$get = $this->db->query("select x.kode_pemesanan, x.kode_pembayaran, y.tgl_pesan, y.tgl_selesai, x.tgl_bayar, x.bayar, y.nama_pelanggan, y.jumlah_harga 
		from lmcp_pembayaran x left join (select a.tgl_pesan, a.kode_pemesanan, a.tgl_selesai, b.nama_pelanggan, a.jumlah_harga, a.status_pembayaran 
		from lmcp_pemesanan a left join lmcp_pelanggan b on a.kode_pelanggan=b.kode_pelanggan) y on x.kode_pemesanan=y.kode_pemesanan where 
		INSTR(CONCAT(' ', tgl_bayar,' '), '".$cari."') LIMIT ".$offset.",".$limit."");
		$i = $offset+1;
		foreach($get->result() as $g)
		{
			$hasil .= ' <tbody>
				<tr>
					<td>'.$i.'</td>
					<td>'.$g->kode_pembayaran.'</td>
					<td>'.$g->kode_pemesanan.'</td>
					<td>'.$g->tgl_pesan.'</td>
					<td>'.$g->tgl_selesai.'</td>
					<td>'.$g->tgl_bayar.'</td>
					<td>'.$g->nama_pelanggan.'</td>
					<td>'.number_format($g->jumlah_harga,2,",",".").'</td>
					<td>'.number_format($g->bayar,2,",",".").'</td>
					<td class="center">
						<a class="btn btn-info" href="'.base_url().'dashboard/pembayaran/edit/'.$g->kode_pembayaran.'/'.$g->kode_pemesanan.'" title="Edit">
							<i class="halflings-icon edit halflings-icon"></i>  
						</a>
						<a class="btn btn-info" href="'.base_url().'dashboard/pemesanan/cetak/'.$g->kode_pemesanan.'" title="Cetak Kwitansi" target="_blank">
							<i class="halflings-icon file halflings-icon"></i>  
						</a>
						<a class="btn btn-danger" href="'.base_url().'dashboard/pembayaran/hapus/'.$g->kode_pembayaran.'/'.$g->kode_pemesanan.'" onClick=\'return confirm("Anda yakin?");\' title="Hapus">
							<i class="halflings-icon trash halflings-icon"></i> 
						</a>
					</td>
				</tr>';
			$i++;
		}
		
		if($tipe=="bulanan")
		{
			$penghasilan = $this->db->query("select sum(bayar) as total from lmcp_pembayaran x where INSTR(CONCAT(' ', tgl_bayar,' '), '".$cari."')")->row();
			$gaji = $this->db->query("select sum(gaji_pokok) as total from lmcp_gaji_karyawan x left join lmcp_karyawan y on x.id_karyawan=y.id_karyawan where 
			INSTR(CONCAT(' ', tanggal,' '), '".$cari."')")->row();
			$hasil .= ' <tbody>
					<tr>
						<td colspan="8">Total Pendapatan Kotor</td>
						<td colspan="2">Rp. '.number_format($penghasilan->total,2,",",".").'</td>
					</tr>';
			$hasil .= ' <tbody>
					<tr>
						<td colspan="8">Total Gaji Karyawan</td>
						<td colspan="2">Rp. '.number_format($gaji->total,2,",",".").'</td>
					</tr>';
			$hasil .= ' <tbody>
					<tr>
						<td colspan="8">Total Pendapatan Bersih</td>
						<td colspan="2">Rp. '.number_format($penghasilan->total-$gaji->total,2,",",".").'</td>
					</tr>';
		}
		else if($tipe=="harian")
		{
			$penghasilan = $this->db->query("select sum(bayar) as total from lmcp_pembayaran x where INSTR(CONCAT(' ', tgl_bayar,' '), '".$cari."')")->row();
			$hasil .= ' <tbody>
					<tr>
						<td colspan="8">Total Pendapatan Kotor</td>
						<td colspan="2">Rp. '.number_format($penghasilan->total,2,",",".").'</td>
					</tr>';
		}
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_sistem($limit,$offset)
	{
		$hasil="";
		$where['title']  = $this->session->userdata("key"); 
		$tot_hal = $this->db->like($where)->get("lmcp_setting");

		$config['base_url'] = base_url() . 'dashboard/sistem/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->like($where)->get("lmcp_setting",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-bordered bootstrap-datatable datatable'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Setting System</th>
					<th>Type</th>
					<th></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->title."</td>
					<td>".$h->tipe."</td>
					<td>";
			$hasil .= "<a href='".base_url()."dashboard/sistem/edit/".$h->id_setting."' class='btn btn-small'><i class='icon-edit'></i> Edit</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	
	
	
	
	public function getMaxKodePesanan()
	{
		$q = $this->db->query("select MAX(RIGHT(kode_pemesanan,8)) as kd_max from lmcp_pemesanan");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%08s", $tmp);
			}
		}
		else
		{
			$kd = "00000001";
		}	
		return "PS".$kd;
	}
	
	public function getMaxKodePembayaran()
	{
		$q = $this->db->query("select MAX(RIGHT(kode_pembayaran,8)) as kd_max from lmcp_pembayaran");
		$kd = "";
		if($q->num_rows()>0)
		{
			foreach($q->result() as $k)
			{
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%08s", $tmp);
			}
		}
		else
		{
			$kd = "00000001";
		}	
		return "PM".$kd;
	}
	
	public function getBalancedStok($kode_bahan_baku,$kurangi)
	{
		$q = $this->db->query("select stok from lmcp_bahan_baku where kode_bahan_baku='".$kode_bahan_baku."'");
		$stok = "";
		foreach($q->result() as $d)
		{
			$stok = $d->stok-$kurangi;
		}
		return $stok;
	}
}

/* End of file app_user_login_model.php */
/* Location: ./application/models/app_user_login_model.php */