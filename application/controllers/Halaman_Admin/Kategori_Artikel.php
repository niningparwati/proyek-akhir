<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_Artikel extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Kategori_artikel_model');
		$this->load->library('form_validation');
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
			'kategori_artikel' =>  $this->Kategori_artikel_model->getKategoriArtikel(),
		);
		$this->load->view('layout_admin/head');
		$this->load->view('layout_admin/header', $data);
		$this->load->view('layout_admin/sidebar', $data);
		$this->load->view('Halaman_Admin/kategori_artikel/kategori_artikel_list', $data);
		$this->load->view('layout_admin/footer', $data);
	}

	public function create() //FIX (oleh admin)
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
			'button' => 'Tambah',
			'action' => site_url('Halaman_Admin/Kategori_Artikel/createAction'),
			'id_kategori' => set_value('id_kategori'),
			'nama_kategori' => set_value('nama_kategori'),
		);
		$this->load->view('layout_admin/head');
		$this->load->view('layout_admin/header', $data);
		$this->load->view('layout_admin/sidebar', $data);
		$this->load->view('Halaman_Admin/kategori_artikel/kategori_artikel_form', $data);
		$this->load->view('layout_admin/footer', $data);
	}

	public function createAction() //FIX (oleh admin)
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_kategori' => $this->input->post('nama_kategori',TRUE),
            );

            $this->Kategori_artikel_model->insert($data);
            $this->session->set_flashdata('success', 'Kategori Artikel Berhasil Ditambahkan');
            redirect(site_url('Halaman_Admin/Kategori_Artikel'));
        }
    }

	public function delete($id) //FIX (oleh admin)
	{
		$row = $this->Kategori_artikel_model->getById($id);

		if ($row) {
			$this->Kategori_artikel_model->delete($id);
			$this->session->set_flashdata('success', 'Berhasil Hapus Data');
			redirect(site_url('Halaman_Admin/Kategori_Artikel'));
		} else {
			$this->session->set_flashdata('error', 'Data Tidak Ditemukan');
			redirect(site_url('Halaman_Admin/Kategori_Artikel'));
		}
	}

    public function update($id) //sudah
    {
    	$email = $this->session->userdata('email');
    	$cekAdmin = $this->Admin_model->cekNama($email);

    	$row = $this->Kategori_artikel_model->getById($id);
    	if ($row) {
    		$data = array(
    			'logo' => 'assets/images/uproject.png',
    			'email_admin' => $email,
    			'nama_admin' => $cekAdmin->nama_admin,
    			'id_admin' => $cekAdmin->id_admin,
    			'foto_admin' => $cekAdmin->foto_admin,
    			'logout' => base_url('index.php/Halaman_Admin/Dashboard/Logout'),
    			'button' => 'Ubah',
    			'action' => site_url('Halaman_Admin/Kategori_Artikel/updateAction'),
    			'id_kategori' => set_value('id_kategori', $row->id_kategori),
    			'nama_kategori' => set_value('nama_kategori', $row->nama_kategori),
    		);
    		$this->load->view('layout_admin/head');
    		$this->load->view('layout_admin/header', $data);
    		$this->load->view('layout_admin/sidebar', $data);
    		$this->load->view('Halaman_Admin/kategori_artikel/kategori_artikel_form', $data);
    		$this->load->view('layout_admin/footer', $data);
    	} else {
    		$this->session->set_flashdata('error', 'Data Tidak Ditemukan');
    		redirect(site_url('Halaman_Admin/Kategori_Artikel'));
    	}
    }

    public function updateAction() //sudah
    {
    	$this->_rules();

    	if ($this->form_validation->run() == FALSE) {
    		$this->update($this->input->post('id_kategori', TRUE));
    	} else {
    		$data = array(
    			'nama_kategori' => $this->input->post('nama_kategori',TRUE),
    		);

    		$this->Kategori_artikel_model->update($this->input->post('id_kategori', TRUE), $data);
    		$this->session->set_flashdata('success', 'Berhasil Edit Data');
    		redirect(site_url('Halaman_Admin/Kategori_Artikel'));
    	}
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('nama_kategori', 'nama kategori', 'trim|required');
    	$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

?>