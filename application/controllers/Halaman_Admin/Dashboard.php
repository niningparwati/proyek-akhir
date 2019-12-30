<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Project_model');
		require 'session.php';
	}

	public function index() //FIX
	{
		$email = $this->session->userdata('email');
		$cekAdmin = $this->Admin_model->cekNama($email);
		$data = array(
			'logo' => 'assets/images/uproject.png',
			'email_admin' => $email,
			'nama_admin' => $cekAdmin->nama_admin,
			'id_admin' => $cekAdmin->id_admin,
			'foto_admin' => $cekAdmin->foto_admin,
			'logout' => base_url('index.php/Halaman_Admin/Dashboard/Logout'),
			'siap_approve' => $this->Project_model->countSiapApprove(),
			'berjalan' => $this->Project_model->countBerjalan(),
			'selesai' => $this->Project_model->countSelesai(),
			'tolak' => $this->Project_model->countTolak(),
			'user' => $this->Project_model->countUser(),
			'pemilik_usaha' => $this->Project_model->countPemilikUsaha(),
			'donatur' => $this->Project_model->countDonatur(),
		);
		$this->load->view('layout_admin/head');
		$this->load->view('layout_admin/header', $data);
		$this->load->view('layout_admin/sidebar', $data);
		$this->load->view('Halaman_Admin/admin/dashboard', $data);
		$this->load->view('layout_admin/footer', $data);
	}

	public function Logout(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/Halaman_Admin/Login'));
	}
	
}