<?php

class DataAbsensi extends CI_Controller{
	public function index()
	{
		$data['title'] = "Absensi Pegawai";
		$data['absensi'] = $this->absensiModel->get_data('data_absensi')->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar',$data);
		$this->load->view('admin/dataAbsensi',$data);
		$this->load->view('templates_admin/footer',$data);
	}

	public function tambahData()
	{
		$data['title'] = "Tambah Data Kehadiran";
		$data['absensi'] = $this->absensiModel->get_data('data_absensi')->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar',$data);
		$this->load->view('admin/formTambahKehadiran',$data);
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
			$nama_jabatan  		= $this->input->post('nama_jabatan');
			$tanggal  			= $this->input->post('tanggal');
			$keterangan  		= $this->input->post('keterangan');

			}

			$data = array(
				'nik'  			=> $nik,
				'nama_pegawai'  => $nama_pegawai,
				'jenis_kelamin' => $jenis_kelamin,
				'nama_jabatan'  => $nama_jabatan,
				'tanggal'  		=> $tanggal,
				'keterangan'  	=> $keterangan,
			);

			$this->absensiModel->insert_data($data,'data_absensi');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil ditambahkan</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('admin/dataAbsensi');
		}

	public function _rules()
	{
		$this->form_validation->set_rules('nik','nik','required');
		$this->form_validation->set_rules('nama_pegawai','nama pegawai','required');
		$this->form_validation->set_rules('jenis_kelamin','jenis kelamin','required');
		$this->form_validation->set_rules('nama_jabatan','jabatan','required');
		$this->form_validation->set_rules('tanggal','tanggal','required');
		$this->form_validation->set_rules('keterangan','keterangan','required');
	}

	public function deleteData($id)
	{
		$where = array('id_absensi' =>$id);
		$this->absensiModel->delete_data($where, 'data_absensi');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Data berhasil dihapus</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span></button></div>');
		redirect('admin/dataAbsensi');
	}
}