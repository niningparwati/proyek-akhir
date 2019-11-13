<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Tanggapan_User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('User_Model');
		$this->load->model('Tanggapan_user_model');
		require 'session.php';
	}

	public function index() //FIX (oleh admin)
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
			'tanggapan_user' => $this->Tanggapan_user_model->getTanggapanUser(), 
		);
		$this->load->view('layout_admin/head');
		$this->load->view('layout_admin/header', $data);
		$this->load->view('layout_admin/sidebar', $data);
		$this->load->view('tanggapan_user/tanggapan_user_list', $data);
		$this->load->view('layout_admin/footer', $data);

	}

	public function delete($id) 
    {
        $row = $this->Tanggapan_user_model->getById($id);

        if ($row) {
            $this->Tanggapan_user_model->delete($id);
            $this->session->set_flashdata('success', 'Tanggapan User Berhasil Dihapus');
            redirect(site_url('Halaman_Admin/Tanggapan_User'));
        } else {
            $this->session->set_flashdata('error', 'Data Tidak Ditemukan');
            redirect(site_url('Halaman_Admin/Tanggapan_User'));
        }
    }

}

 ?>