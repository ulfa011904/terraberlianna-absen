<?php

class Dashboard extends CI_Controller{
	public function index()
	{
		$data ['title'] = "Dashboard";
		$pegawai = $this->db->query("SELECT * FROM data_pegawai");
		$admin = $this->db->query("SELECT * FROM data_pegawai WHERE jabatan = 'Admin'");
		$data['pegawai']=$pegawai->num_rows();
		$data['admin']=$admin->num_rows();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar',$data);
		$this->load->view('admin/dashboard',$data);
		$this->load->view('templates_admin/footer',$data);
	}
}
?>