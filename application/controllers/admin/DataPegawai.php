<?php

class DataPegawai extends CI_Controller{
	public function index()
	{
		$data['title'] = "Data Pegawai";
		$data['pegawai'] = $this->absensiModel->get_data('data_pegawai')->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar',$data);
		$this->load->view('admin/dataPegawai',$data);
		$this->load->view('templates_admin/footer',$data);
	}

	public function tambahData()
	{
		$data['title'] = "Tambah Data Pegawai";
		$data['jabatan'] = $this->absensiModel->get_data('data_pegawai')->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar',$data);
		$this->load->view('admin/formTambahPegawai',$data);
		$this->load->view('templates_admin/footer',$data);
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambahData();
		}else{
			$nik  				= $this->input->post('nik');
			$nama_pegawai  		= $this->input->post('nama_pegawai');
			$jenis_kelamin  	= $this->input->post('jenis_kelamin');
			$jabatan  	= $this->input->post('jabatan');
			$tanggal_masuk  	= $this->input->post('tanggal_masuk');
			$status  			= $this->input->post('status');
			$hak_akses  			= $this->input->post('hak_akses');
			$username  			= $this->input->post('username');
			$password  		= md5($this->input->post('password'));
			$photo  			= $_FILES['photo']['name'];
			if($photo=''){}else{
				$config['upload_path']  = './assets/photo';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff';
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('photo')){
					echo "Photo gagal diupload!";
				}else{
					$photo=$this->upload->data('file_name');
				}
			}

			$data = array(
				'nik'  			=> $nik,
				'nama_pegawai'  => $nama_pegawai,
				'jenis_kelamin' => $jenis_kelamin,
				'jabatan' => $jabatan,
				'tanggal_masuk'  		=> $tanggal_masuk,
				'status'  		=> $status,
				'hak_akses'  		=> $hak_akses,
				'username'  		=> $username,
				'password'  		=> $password,
				'photo'  		=> $photo,
			);

			$this->absensiModel->insert_data($data,'data_pegawai');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil ditambahkan</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('admin/dataPegawai');
		}
	}


	public function updateData($id)
	{
		$where =array('id_pegawai' => $id);
		$data['title']="Update Data Pegawai";
		$data['jabatan'] = $this->absensiModel->get_data('data_pegawai')->result();
		$data['pegawai'] =$this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai ='$id'")->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar',$data);
		$this->load->view('admin/formUpdatePegawai',$data);
		$this->load->view('templates_admin/footer',$data);
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->updateData();
		}else{
			$id  				= $this->input->post('id_pegawai');
			$nik  				= $this->input->post('nik');
			$nama_pegawai  		= $this->input->post('nama_pegawai');
			$jenis_kelamin  	= $this->input->post('jenis_kelamin');
			$jabatan  	= $this->input->post('jabatan');
			$tanggal_masuk  	= $this->input->post('tanggal_masuk');
			$status  			= $this->input->post('status');
			$hak_akses  			= $this->input->post('hak_akses');
			$username  			= $this->input->post('username');
			$password  			= md5($this->input->post('password'));
			$photo  			= $_FILES['photo']['name'];
			if($photo){
				$config['upload_path']  = './assets/photo';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff';
				$this->load->library('upload',$config);
				if($this->upload->do_upload('photo')){
					$photo=$this->upload->data('file_name');
					$this->db->set('photo',$photo);
				}else{
					echo $this->upload->display_errors();
				}
			}

			$data = array(
				'nik'  			=> $nik,
				'nama_pegawai'  => $nama_pegawai,
				'jenis_kelamin' => $jenis_kelamin,
				'jabatan' 		=> $jabatan,
				'tanggal_masuk' => $tanggal_masuk,
				'status'  		=> $status,
				'hak_akses'  		=> $hak_akses,
				'username'		=> $username,
				'password'		=> $password,
			);

			$where = array(
				'id_pegawai' => $id
			);

			$this->absensiModel->update_data('data_pegawai',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil diupdate</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('admin/dataPegawai');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nik','nik','required');
		$this->form_validation->set_rules('nama_pegawai','nama pegawai','required');
		$this->form_validation->set_rules('jenis_kelamin','jenis kelamin','required');
		$this->form_validation->set_rules('jabatan','jabatan','required');
		$this->form_validation->set_rules('tanggal_masuk','tanggal masuk','required');
		$this->form_validation->set_rules('status','status','required');
	}

	public function deleteData($id)
	{
		$where = array('id_pegawai' =>$id);
		$this->absensiModel->delete_data($where, 'data_pegawai');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Data berhasil dihapus</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span></button></div>');
		redirect('admin/dataPegawai');
	}
}
?>