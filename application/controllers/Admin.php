<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
	}
	
	public function dashboard()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_username']	= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['content']				= 'admin/content/dashboard';
			$data['sertifikasi']			= $this->ADM->count_all_sertifikasi('');
			$data['karyawan']				= $this->ADM->count_all_karyawan('');
			$data['departemen']				= $this->ADM->count_all_departemen('');
			$data['subarea']				= $this->ADM->count_all_subarea('');
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("internal");
		} 
	}

	public function adm($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_username']			= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['content']				= 'admin/content/admin';
			$data['breadcrumb']				= 'ADMINISTRATOR';
			$data['icon']					= 'person';		
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'admin_username';
				$data['admin_username']		= ($this->input->post('admin_username'))?$this->input->post('admin_username'):'';
				$data['admin_password']		= ($this->input->post('admin_password'))?$this->input->post('admin_password'):'';
				$data['admin_email']		= ($this->input->post('admin_email'))?$this->input->post('admin_email'):'';
				$data['admin_nama']			= ($this->input->post('admin_nama'))?$this->input->post('admin_nama'):'';
				$data['admin_level']		= ($this->input->post('admin_level'))?$this->input->post('admin_level'):'';
				$where['admin_username']	= $data['admin_username'];
				$jml_admin					= $this->ADM->count_all_admin($where);
				$simpan						=  $this->input->post('simpan');
				if($simpan && $jml_admin < 1) {
					$insert['admin_username']	= $data['admin_username'];
					$insert['admin_password']	= md5($data['admin_password']);
					$insert['admin_email']		= $data['admin_email'];
					$insert['admin_nama']		= $data['admin_nama'];
					$insert['admin_level']		= $data['admin_level'];
					$this->ADM->insert_admin($insert);
					$this->session->set_flashdata('success','Data admin telah berhasil ditambahkan!,');
					redirect("admin/adm");
				} elseif ($simpan && $jml_admin > 0 ){
					echo '<script type="text/javascript">
						  	alert("Username telah terdaftar!,");
						  </script>';
				}
			} elseif ($data['action'] == 'edit'){
				$where['admin_username'] 	=  $filter2;		
				$data['onload']				= 'admin_username';
				$where_admin['admin_username']	= $filter2;
				$admin						= $this->ADM->get_admin('',$where_admin);
				$data['admin_id']			= ($this->input->post('admin_id'))?$this->input->post('admin_id'):$admin->admin_id;
				$data['admin_username']			= ($this->input->post('admin_username'))?$this->input->post('admin_username'):$admin->admin_username;
				$data['admin_password']			= ($this->input->post('admin_password'))?$this->input->post('admin_password'):$admin->admin_password;
				$data['admin_email']			= ($this->input->post('admin_email'))?$this->input->post('admin_email'):$admin->admin_email;
				$data['admin_nama']				= ($this->input->post('admin_nama'))?$this->input->post('admin_nama'):$admin->admin_nama;
				$data['admin_level']			= ($this->input->post('admin_level'))?$this->input->post('admin_level'):$admin->admin_level;
				$simpan							= $this->input->post('simpan');
				if($simpan) {
					$where_edit['admin_username']	= $data['admin_username'];
					if($data['admin_password'] == $data['admin_password']) {
					$where_edit['admin_username']	= $data['admin_username'];
						if($data['admin_password'] <> '') {
							$edit['admin_password']		= do_hash(($data['admin_password']), 'md5'); 
						}
					}
					$edit['admin_email']			= $data['admin_email'];
					$edit['admin_nama']				= $data['admin_nama'];
					$edit['admin_level']			= $data['admin_level'];
					$this->ADM->update_admin($where_edit, $edit);
					$this->session->set_flashdata('success','Data admin telah berhasil diedit!,');
					redirect("admin/adm");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['admin_id'] 	= $filter2;
				$row = $this->ADM->get_admin('*', $where_delete);
				$this->ADM->delete_admin($where_delete);
				$this->session->set_flashdata('warning','Data admin berhasil dihapus!,');
				redirect("admin/adm");
			}			
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("internal");
		} 
	}

	public function karyawan($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_username']			= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['content']				= 'admin/content/karyawan';
			$data['breadcrumb']				= 'KARYAWAN';
			$data['icon']					= 'account_box';		
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'karyawan_nip';
				$data['karyawan_nip']		= ($this->input->post('karyawan_nip'))?$this->input->post('karyawan_nip'):'';
				$data['karyawan_nama']		= ($this->input->post('karyawan_nama'))?$this->input->post('karyawan_nama'):'';
				$data['karyawan_email']		= ($this->input->post('karyawan_email'))?$this->input->post('karyawan_email'):'';
				$data['karyawan_tlp']		= ($this->input->post('karyawan_tlp'))?$this->input->post('karyawan_tlp'):'';
				$data['departemen_id']		= ($this->input->post('departemen_id'))?$this->input->post('departemen_id'):'';

				$where['karyawan_nip']		= $data['karyawan_nip'];
				$jml_karyawan				= $this->ADM->count_all_karyawan($where);
				$simpan						=  $this->input->post('simpan');
				if($simpan && $jml_karyawan < 1) {
					$insert['karyawan_nip']		= $data['karyawan_nip'];
					$insert['karyawan_nama']	= $data['karyawan_nama'];
					$insert['karyawan_email']	= $data['karyawan_email'];
					$insert['karyawan_tlp']		= $data['karyawan_tlp'];
					$insert['departemen_id']	= $data['departemen_id'];
					$this->ADM->insert_karyawan($insert);
					$this->session->set_flashdata('success','Data karyawan telah berhasil ditambahkan!,');
					redirect("admin/karyawan");
				} elseif ($simpan && $jml_karyawan > 0 ){
					echo '<script type="text/javascript">
						  	alert("NIP telah terdaftar!,");
						  </script>';
				}
			} elseif ($data['action'] == 'edit'){
				$where['karyawan_nip'] 	=  $filter2;		
				$data['onload']				= 'karyawan_nip';
				$where_karyawan['karyawan_nip']	= $filter2;
				$admin						= $this->ADM->get_karyawan('',$where_karyawan);
				$data['karyawan_nip']		= ($this->input->post('karyawan_nip'))?$this->input->post('karyawan_nip'):$admin->karyawan_nip;
				$data['karyawan_nip']			= ($this->input->post('karyawan_nip'))?$this->input->post('karyawan_nip'):$admin->karyawan_nip;
				$data['karyawan_nama']			= ($this->input->post('karyawan_nama'))?$this->input->post('karyawan_nama'):$admin->karyawan_nama;
				$data['karyawan_email']			= ($this->input->post('karyawan_email'))?$this->input->post('karyawan_email'):$admin->karyawan_email;
				$data['karyawan_tlp']			= ($this->input->post('karyawan_tlp'))?$this->input->post('karyawan_tlp'):$admin->karyawan_tlp;
				$data['departemen_id']			= ($this->input->post('departemen_id'))?$this->input->post('departemen_id'):$admin->departemen_id;
				$simpan							= $this->input->post('simpan');
				if($simpan) {
					$where_edit['karyawan_nip']	= $data['karyawan_nip'];
					$edit['karyawan_nama']		= $data['karyawan_nama'];
					$edit['karyawan_email']		= $data['karyawan_email'];
					$edit['karyawan_tlp']		= $data['karyawan_tlp'];
					$edit['departemen_id']		= $data['departemen_id'];
					$this->ADM->update_karyawan($where_edit, $edit);
					$this->session->set_flashdata('success','Data karyawan telah berhasil diedit!,');
					redirect("admin/karyawan");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['karyawan_nip'] 	= $filter2;
				$row = $this->ADM->get_karyawan('*', $where_delete);
				$this->ADM->delete_karyawan($where_delete);
				$this->session->set_flashdata('warning','Data karyawan berhasil dihapus!,');
				redirect("admin/karyawan");
			}			
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("internal");
		} 
	}

	public function departemen($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_username']			= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['content']				= 'admin/content/departemen';
			$data['breadcrumb']				= 'DEPARTEMEN';
			$data['icon']					= 'assignment';		
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'departemen_id';
				$data['departemen_id']		= ($this->input->post('departemen_id'))?$this->input->post('departemen_id'):'';
				$data['departemen_nama']	= ($this->input->post('departemen_nama'))?$this->input->post('departemen_nama'):'';
				$where['departemen_nama']	= $data['departemen_nama'];
				$jml_departemen				= $this->ADM->count_all_departemen($where);
				$simpan						=  $this->input->post('simpan');
				if($simpan && $jml_departemen < 1) {
					$insert['departemen_id']		= $data['departemen_id'];
					$insert['departemen_nama']	= $data['departemen_nama'];
					$this->ADM->insert_departemen($insert);
					$this->session->set_flashdata('success','Data departemen telah berhasil ditambahkan!,');
					redirect("admin/departemen");
				} elseif ($simpan && $jml_departemen > 0 ){
					echo '<script type="text/javascript">
						  	alert("Departemen telah terdaftar!,");
						  </script>';
				}
			} elseif ($data['action'] == 'edit'){
				$where['departemen_id'] 	=  $filter2;		
				$data['onload']				= 'departemen_id';
				$where_departemen['departemen_id']	= $filter2;
				$admin						= $this->ADM->get_departemen('',$where_departemen);
				$data['departemen_id']		= ($this->input->post('departemen_id'))?$this->input->post('departemen_id'):$admin->departemen_id;
				$data['departemen_nama']			= ($this->input->post('departemen_nama'))?$this->input->post('departemen_nama'):$admin->departemen_nama;
				$simpan							= $this->input->post('simpan');
				if($simpan) {
					$where_edit['departemen_id']	= $data['departemen_id'];
					$edit['departemen_nama']		= $data['departemen_nama'];
					$this->ADM->update_departemen($where_edit, $edit);
					$this->session->set_flashdata('success','Data departemen telah berhasil diedit!,');
					redirect("admin/departemen");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['departemen_id'] 	= $filter2;
				$row = $this->ADM->get_departemen('*', $where_delete);
				$this->ADM->delete_departemen($where_delete);
				$this->session->set_flashdata('warning','Data departemen berhasil dihapus!,');
				redirect("admin/departemen");
			}			
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("internal");
		} 
	}



	public function tahun($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_username']			= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['content']				= 'admin/content/tahun';
			$data['breadcrumb']				= 'TAHUN SERTIFIKASI';
			$data['icon']					= 'date_range';		
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'tahun_id';
				$data['tahun_id']		= ($this->input->post('tahun_id'))?$this->input->post('tahun_id'):'';
				$data['tahun_nama']	= ($this->input->post('tahun_nama'))?$this->input->post('tahun_nama'):'';
				$where['tahun_nama']	= $data['tahun_nama'];
				$jml_tahun				= $this->ADM->count_all_tahun($where);
				$simpan						=  $this->input->post('simpan');
				if($simpan && $jml_tahun < 1) {
					$insert['tahun_id']		= $data['tahun_id'];
					$insert['tahun_nama']	= $data['tahun_nama'];
					$this->ADM->insert_tahun($insert);
					$this->session->set_flashdata('success','Data tahun telah berhasil ditambahkan!,');
					redirect("admin/tahun");
				} elseif ($simpan && $jml_tahun > 0 ){
					echo '<script type="text/javascript">
						  	alert("Tahun telah terdaftar!,");
						  </script>';
				}
			} elseif ($data['action'] == 'edit'){
				$where['tahun_id'] 	=  $filter2;		
				$data['onload']				= 'tahun_id';
				$where_tahun['tahun_id']	= $filter2;
				$admin						= $this->ADM->get_tahun('',$where_tahun);
				$data['tahun_id']		= ($this->input->post('tahun_id'))?$this->input->post('tahun_id'):$admin->tahun_id;
				$data['tahun_nama']			= ($this->input->post('tahun_nama'))?$this->input->post('tahun_nama'):$admin->tahun_nama;
				$simpan							= $this->input->post('simpan');
				if($simpan) {
					$where_edit['tahun_id']	= $data['tahun_id'];
					$edit['tahun_nama']		= $data['tahun_nama'];
					$this->ADM->update_tahun($where_edit, $edit);
					$this->session->set_flashdata('success','Data tahun telah berhasil diedit!,');
					redirect("admin/tahun");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['tahun_id'] 	= $filter2;
				$row = $this->ADM->get_tahun('*', $where_delete);
				$this->ADM->delete_tahun($where_delete);
				$this->session->set_flashdata('warning','Data tahun berhasil dihapus!,');
				redirect("admin/tahun");
			}			
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("internal");
		} 
	}


	public function subarea($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_username']			= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['content']				= 'admin/content/subarea';
			$data['breadcrumb']				= 'SUB AREA';
			$data['icon']					= 'assignment';		
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'subarea_id';
				$data['subarea_id']		= ($this->input->post('subarea_id'))?$this->input->post('subarea_id'):'';
				$data['subarea_nama']	= ($this->input->post('subarea_nama'))?$this->input->post('subarea_nama'):'';
				$where['subarea_nama']	= $data['subarea_nama'];
				$jml_subarea				= $this->ADM->count_all_subarea($where);
				$simpan						=  $this->input->post('simpan');
				if($simpan && $jml_subarea < 1) {
					$insert['subarea_id']		= $data['subarea_id'];
					$insert['subarea_nama']	= $data['subarea_nama'];
					$this->ADM->insert_subarea($insert);
					$this->session->set_flashdata('success','Data subarea telah berhasil ditambahkan!,');
					redirect("admin/subarea");
				} elseif ($simpan && $jml_subarea > 0 ){
					echo '<script type="text/javascript">
						  	alert("subarea telah terdaftar!,");
						  </script>';
				}
			} elseif ($data['action'] == 'edit'){
				$where['subarea_id'] 	=  $filter2;		
				$data['onload']				= 'subarea_id';
				$where_subarea['subarea_id']	= $filter2;
				$admin						= $this->ADM->get_subarea('',$where_subarea);
				$data['subarea_id']		= ($this->input->post('subarea_id'))?$this->input->post('subarea_id'):$admin->subarea_id;
				$data['subarea_nama']			= ($this->input->post('subarea_nama'))?$this->input->post('subarea_nama'):$admin->subarea_nama;
				$simpan							= $this->input->post('simpan');
				if($simpan) {
					$where_edit['subarea_id']	= $data['subarea_id'];
					$edit['subarea_nama']		= $data['subarea_nama'];
					$this->ADM->update_subarea($where_edit, $edit);
					$this->session->set_flashdata('success','Data subarea telah berhasil diedit!,');
					redirect("admin/subarea");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['subarea_id'] 	= $filter2;
				$row = $this->ADM->get_subarea('*', $where_delete);
				$this->ADM->delete_subarea($where_delete);
				$this->session->set_flashdata('warning','Data subarea berhasil dihapus!,');
				redirect("admin/subarea");
			}			
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("internal");
		} 
	}

	public function sertifikasi($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_username']			= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['content']				= 'admin/content/sertifikasi';
			$data['breadcrumb']				= 'SERTIFIKASI';
			$data['icon']					= 'list';		
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'sertifikasi_nama';
				$data['karyawan_nip']					= ($this->input->post('karyawan_nip'))?$this->input->post('karyawan_nip'):'';
				$data['karyawan_email']					= ($this->input->post('karyawan_email'))?$this->input->post('karyawan_email'):'';
				$data['sertifikasi_nama']				= ($this->input->post('sertifikasi_nama'))?$this->input->post('sertifikasi_nama'):'';
				$data['sertifikasi_tgl']				= ($this->input->post('sertifikasi_tgl'))?$this->input->post('sertifikasi_tgl'):'';
				$data['sertifikasi_noreg']				= ($this->input->post('sertifikasi_noreg'))?$this->input->post('sertifikasi_noreg'):'';
				$data['sertifikasi_tglpelaksanaan']		= ($this->input->post('sertifikasi_tglpelaksanaan'))?$this->input->post('sertifikasi_tglpelaksanaan'):'';
				$data['sertifikasi_provider']			= ($this->input->post('sertifikasi_provider'))?$this->input->post('sertifikasi_provider'):'';
				$data['sertifikasi_status']				= ($this->input->post('sertifikasi_status'))?$this->input->post('sertifikasi_status'):'';
				$data['sertifikasi_tglberlaku']			= ($this->input->post('sertifikasi_tglberlaku'))?$this->input->post('sertifikasi_tglberlaku'):'';
				$data['sertifikasi_masaberlaku']		= ($this->input->post('sertifikasi_masaberlaku'))?$this->input->post('sertifikasi_masaberlaku'):'';
				$data['sertifikasi_keterangan']			= ($this->input->post('sertifikasi_keterangan'))?$this->input->post('sertifikasi_keterangan'):'';
				$data['sertifikasi_gambar']		= ($this->input->post('sertifikasi_gambar'))?$this->input->post('sertifikasi_gambar'):'';
				$data['penerima_id']					= ($this->input->post('penerima_id'))?$this->input->post('penerima_id'):'';
				$data['departemen_id']					= ($this->input->post('departemen_id'))?$this->input->post('departemen_id'):'';
				$data['subarea_id']						= ($this->input->post('subarea_id'))?$this->input->post('subarea_id'):'';
				$data['tahun_id']						= ($this->input->post('tahun_id'))?$this->input->post('tahun_id'):'';

				$simpan									=  $this->input->post('simpan');
				if($simpan ) {
					$gambar = upload_image("sertifikasi_gambar", "./assets/images/", "230x160", seo($data['sertifikasi_nama']));
					$data['sertifikasi_gambar']		 = $gambar;
					$insert['karyawan_nip']				= $data['karyawan_nip'];
					$insert['karyawan_email']			= $data['karyawan_email'];
					$insert['sertifikasi_nama']			= $data['sertifikasi_nama'];
					$insert['sertifikasi_tgl']			= $data['sertifikasi_tgl'];
					$insert['sertifikasi_noreg']		= $data['sertifikasi_noreg'];
					$insert['sertifikasi_tglpelaksanaan']	= $data['sertifikasi_tglpelaksanaan'];
					$insert['sertifikasi_provider']		= $data['sertifikasi_provider'];
					$insert['sertifikasi_status']		= $data['sertifikasi_status'];
					$insert['sertifikasi_tglberlaku']	= $data['sertifikasi_tglberlaku'];
					$insert['sertifikasi_masaberlaku']	= $data['sertifikasi_masaberlaku'];
					$insert['sertifikasi_keterangan']	= $data['sertifikasi_keterangan'];
					if ($data['sertifikasi_gambar']) { $insert['sertifikasi_gambar'] = $data['sertifikasi_gambar']; }
					$insert['penerima_id']				= $data['penerima_id'];
					$insert['departemen_id']			= $data['departemen_id'];
					$insert['subarea_id']				= $data['subarea_id'];
					$insert['tahun_id']					= $data['tahun_id'];

					$email = "".$data['karyawan_email'];"";
					
					$nip = $data['karyawan_nip'];
					$sertifikasi_nama =  $data['sertifikasi_nama'];
					$sertifikasi_noreg =  $data['sertifikasi_noreg'];
					$sertifikasi_tglberlaku =  $data['sertifikasi_tglberlaku'];

					$img =''.base_url().'assets/images/'.$data['sertifikasi_gambar'].'';
					$gmbr = "<center><img src=".$img." width='650px' height='350px'/></center>";
					$to=$email;
					$subject='Sertifikasi Holcim';
					$from = 'cs@holcimcertification.com';
					$body= '<h2>Terimakasih telah melakukan sertifikasi.</h2>
						    <br />'.$from.' | '.dateIndoNews(date('Y-m-d H:i:s')).'<hr>
						    <br/>NIP: '.$nip.'
						    <br/>Nama Sertifikasi: '.$data['sertifikasi_nama'].'
						    <br/>No.Reg: '.$data['sertifikasi_noreg'].'
						    <br/>Tanggal Berlaku: '.dateIndoNews($data['sertifikasi_tglpelaksanaan']).' s/d '.dateIndoNews($data['sertifikasi_tglberlaku']).'<br/>';
					$headers = "From: " . strip_tags($from) . "\r\n";
					$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                	mail($to,$subject,$body,$headers);

					$this->ADM->insert_sertifikasi($insert);
					$this->session->set_flashdata('success','Data sertifikasi telah berhasil ditambahkan!,');
					redirect("admin/sertifikasi");
				} 
			} elseif ($data['action'] == 'edit'){
				$where['sertifikasi_id'] 	=  $filter2;		
				$data['onload']				= 'sertifikasi_id';
				$where_sertifikasi['sertifikasi_id']	= $filter2;
				$sertifikasi								= $this->ADM->get_sertifikasi('',$where_sertifikasi);
				$data['sertifikasi_id']			= ($this->input->post('sertifikasi_id'))?$this->input->post('sertifikasi_id'):$sertifikasi->sertifikasi_id;
				$data['karyawan_nip']			= ($this->input->post('karyawan_nip'))?$this->input->post('karyawan_nip'):$sertifikasi->karyawan_nip;
				$data['karyawan_email']			= ($this->input->post('karyawan_email'))?$this->input->post('karyawan_email'):$sertifikasi->karyawan_email;
				$data['sertifikasi_nama']			= ($this->input->post('sertifikasi_nama'))?$this->input->post('sertifikasi_nama'):$sertifikasi->sertifikasi_nama;
				$data['sertifikasi_tgl']			= ($this->input->post('sertifikasi_tgl'))?$this->input->post('sertifikasi_tgl'):$sertifikasi->sertifikasi_tgl;
				$data['sertifikasi_noreg']			= ($this->input->post('sertifikasi_noreg'))?$this->input->post('sertifikasi_noreg'):$sertifikasi->sertifikasi_noreg;
				$data['sertifikasi_tglpelaksanaan']	= ($this->input->post('sertifikasi_tglpelaksanaan'))?$this->input->post('sertifikasi_tglpelaksanaan'):$sertifikasi->sertifikasi_tglpelaksanaan;
				$data['sertifikasi_provider']		= ($this->input->post('sertifikasi_provider'))?$this->input->post('sertifikasi_provider'):$sertifikasi->sertifikasi_provider;
				$data['sertifikasi_status']			= ($this->input->post('sertifikasi_status'))?$this->input->post('sertifikasi_status'):$sertifikasi->sertifikasi_status;
				$data['sertifikasi_tglberlaku']		= ($this->input->post('sertifikasi_tglberlaku'))?$this->input->post('sertifikasi_tglberlaku'):$sertifikasi->sertifikasi_tglberlaku;
				$data['sertifikasi_masaberlaku']	= ($this->input->post('sertifikasi_masaberlaku'))?$this->input->post('sertifikasi_masaberlaku'):$sertifikasi->sertifikasi_masaberlaku;
				$data['sertifikasi_keterangan']		= ($this->input->post('sertifikasi_keterangan'))?$this->input->post('sertifikasi_keterangan'):$sertifikasi->sertifikasi_keterangan;
				$data['sertifikasi_gambar']		= ($this->input->post('sertifikasi_gambar'))?$this->input->post('sertifikasi_gambar'):$sertifikasi->sertifikasi_gambar;	
				$data['penerima_id']				= ($this->input->post('penerima_id'))?$this->input->post('penerima_id'):$sertifikasi->penerima_id;
				$data['departemen_id']				= ($this->input->post('departemen_id'))?$this->input->post('departemen_id'):$sertifikasi->departemen_id;
				$data['subarea_id']				= ($this->input->post('subarea_id'))?$this->input->post('subarea_id'):$sertifikasi->subarea_id;
				$data['tahun_id']					= ($this->input->post('tahun_id'))?$this->input->post('tahun_id'):$sertifikasi->tahun_id;
				$simpan								= $this->input->post('simpan');
				if($simpan) {
					$gambar = upload_image("sertifikasi_gambar", "./assets/images/", "230x160", seo($data['sertifikasi_nama']));
					$data['sertifikasi_gambar']		= $gambar;
					$where_edit['sertifikasi_id']			= $data['sertifikasi_id'];
					$edit['karyawan_nip']					= $data['karyawan_nip'];
					$edit['karyawan_email']					= $data['karyawan_email'];
					$edit['sertifikasi_nama']				= $data['sertifikasi_nama'];
					$edit['sertifikasi_tgl']				= $data['sertifikasi_tgl'];
					$edit['sertifikasi_noreg']				= $data['sertifikasi_noreg'];
					$edit['sertifikasi_tglpelaksanaan']		= $data['sertifikasi_tglpelaksanaan'];
					$edit['sertifikasi_provider']			= $data['sertifikasi_provider'];
					$edit['sertifikasi_status']				= $data['sertifikasi_status'];
					$edit['sertifikasi_tglberlaku']			= $data['sertifikasi_tglberlaku'];
					$edit['sertifikasi_masaberlaku']		= $data['sertifikasi_masaberlaku'];
					$edit['sertifikasi_keterangan']			= $data['sertifikasi_keterangan'];
						if ($data['sertifikasi_gambar']) {
						$row = $this->ADM->get_sertifikasi('*', $where_edit);
						@unlink('./assets/images/'.$row->sertifikasi_gambar);
						@unlink('./assets/images/kecil_'.$row->sertifikasi_gambar);
						$edit['sertifikasi_gambar']	= $data['sertifikasi_gambar']; 
					}
					$edit['penerima_id']					= $data['penerima_id'];
					$edit['departemen_id']					= $data['departemen_id'];
					$edit['subarea_id']						= $data['subarea_id'];
					$edit['tahun_id']						= $data['tahun_id'];
					$this->ADM->update_sertifikasi($where_edit, $edit);
					$this->session->set_flashdata('success','Data sertifikasi telah berhasil diedit!,');
					redirect("admin/sertifikasi");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['sertifikasi_id'] 	= $filter2;
				$row = $this->ADM->get_sertifikasi('*', $where_delete);
				 @unlink ('./assets/images/'.$row->sertifikasi_gambar);
				 @unlink ('./assets/images/kecil_'.$row->sertifikasi_gambar);
				$this->ADM->delete_sertifikasi($where_delete);
				$this->session->set_flashdata('warning','Data sertifikasi berhasil dihapus!,');
				redirect("admin/sertifikasi");
			}			
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("internal");
		} 
	}

	public function penerima($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_username']			= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['content']				= 'admin/content/penerima';
			$data['breadcrumb']				= 'PENERIMA SERTIFIKASI';
			$data['icon']					= 'account_circle';		
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'penerima_id';
				$data['penerima_id']		= ($this->input->post('penerima_id'))?$this->input->post('penerima_id'):'';
				$data['penerima_nama']		= ($this->input->post('penerima_nama'))?$this->input->post('penerima_nama'):'';
				$data['penerima_tgl']		= ($this->input->post('penerima_tgl'))?$this->input->post('penerima_tgl'):'';
				$data['penerima_keterangan']			= ($this->input->post('penerima_keterangan'))?$this->input->post('penerima_keterangan'):'';
				$data['subarea_id']		= ($this->input->post('subarea_id'))?$this->input->post('subarea_id'):'';

				$where['penerima_id']		= $data['penerima_id'];
				$jml_penerima				= $this->ADM->count_all_penerima_sertifikasi($where);
				$simpan						=  $this->input->post('simpan');
				if($simpan && $jml_penerima < 1) {
					$insert['penerima_id']		= $data['penerima_id'];
					$insert['penerima_nama']	= $data['penerima_nama'];
					$insert['penerima_tgl']	= $data['penerima_tgl'];
					$insert['penerima_keterangan']		= $data['penerima_keterangan'];
					$insert['subarea_id']	= $data['subarea_id'];
					$this->ADM->insert_penerima_sertifikasi($insert);
					$this->session->set_flashdata('success','Data penerima sertifikasi telah berhasil ditambahkan!,');
					redirect("admin/penerima");
				} elseif ($simpan && $jml_penerima > 0 ){
					echo '<script type="text/javascript">
						  	alert("id telah terdaftar!,");
						  </script>';
				}
			} elseif ($data['action'] == 'edit'){
				$where['penerima_id'] 	=  $filter2;		
				$data['onload']				= 'penerima_id';
				$where_penerima['penerima_id']	= $filter2;
				$admin						= $this->ADM->get_penerima_sertifikasi('',$where_penerima);
				$data['penerima_id']		= ($this->input->post('penerima_id'))?$this->input->post('penerima_id'):$admin->penerima_id;
				$data['penerima_id']			= ($this->input->post('penerima_id'))?$this->input->post('penerima_id'):$admin->penerima_id;
				$data['penerima_nama']			= ($this->input->post('penerima_nama'))?$this->input->post('penerima_nama'):$admin->penerima_nama;
				$data['penerima_tgl']			= ($this->input->post('penerima_tgl'))?$this->input->post('penerima_tgl'):$admin->penerima_tgl;
				$data['penerima_keterangan']			= ($this->input->post('penerima_keterangan'))?$this->input->post('penerima_keterangan'):$admin->penerima_keterangan;
				$data['subarea_id']			= ($this->input->post('subarea_id'))?$this->input->post('subarea_id'):$admin->subarea_id;
				$simpan							= $this->input->post('simpan');
				if($simpan) {
					$where_edit['penerima_id']	= $data['penerima_id'];
					$edit['penerima_nama']		= $data['penerima_nama'];
					$edit['penerima_tgl']		= $data['penerima_tgl'];
					$edit['penerima_keterangan']		= $data['penerima_keterangan'];
					$edit['subarea_id']		= $data['subarea_id'];
					$this->ADM->update_penerima_sertifikasi($where_edit, $edit);
					$this->session->set_flashdata('success','Data penerima sertifikasi telah berhasil diedit!,');
					redirect("admin/penerima");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['penerima_id'] 	= $filter2;
				$row = $this->ADM->get_penerima_sertifikasi('*', $where_delete);
				$this->ADM->delete_penerima_sertifikasi($where_delete);
				$this->session->set_flashdata('warning','Data penerima sertifikasi berhasil dihapus!,');
				redirect("admin/penerima");
			}			
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("internal");
		} 
	}

	public function sertifikasi_excel($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_admin['admin_username']			= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);			    	
			    		header("Pragma: public");
				        header("Expires: 0");
				        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
				        header("Content-Type: application/force-download");
				        header("Content-Type: application/octet-stream");
				        header("Content-Type: application/download");
				        header("Content-Disposition: attachment;filename=DataSertifikasi.xls");
				        header("Content-Transfer-Encoding: binary ");		
			$this->load->vars($data);
			$this->load->view('admin/content/sertifikasi_excel');
		} else {
			redirect("internal");
		} 
	}

	public function sertifikasi_print($sertifikasi_id='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_admin['admin_username']			= $this->session->userdata('admin_username');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);	
            $where_sertifikasi['sertifikasi_id'] 	= $sertifikasi_id;
            $data['sertifikasi']        	= $this->ADM->get_sertifikasi('',$where_sertifikasi);	
			$this->load->vars($data);
			$this->load->view('admin/content/sertifikasi_print');
		} else {
			redirect("internal");
		} 
	}


}
