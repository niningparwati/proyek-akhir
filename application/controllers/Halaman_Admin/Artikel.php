<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Artikel_model');
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
			'data_artikel' =>  $this->Artikel_model->getArtikel(),
		);
		$this->load->view('layout_admin/head');
		$this->load->view('layout_admin/header', $data);
		$this->load->view('layout_admin/sidebar', $data);
		$this->load->view('artikel/artikel_list', $data);
		$this->load->view('layout_admin/footer', $data);
	}

	public function create() //sudah
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
            'action' => site_url('Halaman_Admin/Artikel/createAction'),
            'id_artikel' => $this->Artikel_model->id_artikel(),
            'data_kategori' => $this->Kategori_artikel_model->getKategoriArtikel(),
            'id_kategori' => set_value('id_kategori'), 
            'id_admin' => set_value('id_admin'),
            'judul' => set_value('judul'),
            'pengarang' => set_value('pengarang'),
            'isi' => set_value('isi'),
            'file' => set_value('file'),
		);
		$this->load->view('layout_admin/head');
		$this->load->view('layout_admin/header', $data);
		$this->load->view('layout_admin/sidebar', $data);
		$this->load->view('artikel/artikel_form', $data);
		$this->load->view('layout_admin/footer', $data);

    }

    public function createAction() //FIX (oleh admin)
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            if (!empty($_FILES['file']['name'])) {
                $config['upload_path']      = './assets/artikel/';
                $config['allowed_types']    = 'pdf|jpg|jpeg|png|gif';
                $config['file_name']        = $file;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('file')) {
                    $uploadData = $this->upload->data();

                    $data = array(
                        'id_artikel' => $this->input->post('id_artikel',TRUE),
                        'id_kategori' => $this->input->post('id_kategori',TRUE),
                        'id_admin' => $this->input->post('id_admin',TRUE),
                        'judul' => $this->input->post('judul',TRUE),
                        'pengarang' => $this->input->post('pengarang',TRUE),
                        'isi' => $this->input->post('isi',TRUE),
                        'foto' => $uploadData['file_name'],
                    );

                    $this->Artikel_model->insert($data);
                    $this->session->set_flashdata('success', 'Berhasil Tambah Data');
                    redirect(site_url('Halaman_Admin/Artikel'));

                } else {
                    $this->session->set_flashdata('error', 'Gagal Unggah File');
                    redirect(site_url('Halaman_Admin/Artikel/create'));
                }
            } else {
                $data = array(
                    'id_artikel' => $this->input->post('id_artikel',TRUE),
                    'id_kategori' => $this->input->post('id_kategori',TRUE),
                    'id_admin' => $this->input->post('id_admin',TRUE),
                    'judul' => $this->input->post('judul',TRUE),
                    'pengarang' => $this->input->post('pengarang',TRUE),
                    'isi' => $this->input->post('isi',TRUE),
                );

                $this->Artikel_model->insert($data);
                $this->session->set_flashdata('success', 'Berhasil Tambah Data');
                redirect(site_url('Halaman_Admin/Artikel'));
            }
        }
    }

	public function aksi($id, $aksi) //FIX (oleh admin)
    {

        $row = $this->Artikel_model->getById($id);
        if ($aksi == 'yes') {
            if ($row) {
                $data = array(
                    'status' => 'berjalan',
                    'tanggal_pos' => date('Y-m-d'),
                );
                $this->Artikel_model->update($row->id_artikel, $data);
                $this->session->set_flashdata('success', 'Artikel Diaktifkan');
                redirect(site_url('Halaman_Admin/Artikel'));
            }else{
                $this->session->set_flashdata('error', 'Artikel Gagal Diaktifkan');
                redirect(site_url('Halaman_Admin/Artikel'));
            }
        }else if($aksi == 'no'){
            if ($row) {
                $data = array(
                    'status' => 'batal',
                    'tanggal_pos' => date('Y-m-d'),
                );
                $this->Artikel_model->update($row->id_artikel, $data);
                $this->session->set_flashdata('success', 'Project Berhasil Ditolak');
                redirect(site_url('Halaman_Admin/Artikel'));
            }else{
                $this->session->set_flashdata('error', 'Project Gagal Ditolak');
                redirect(site_url('Halaman_Admin/Artikel'));
            }
        }
    }

    public function nonaktif($id)  //FIX (oleh admin)
    {
        $row = $this->Artikel_model->getById($id);

        if ($row) {
            $data = array(
                'status' => 'selesai',
            );
            $this->Artikel_model->update($row->id_artikel, $data);
            $this->session->set_flashdata('success', 'Artikel Berhasil Dinonaktifkan');
            redirect(site_url('Halaman_Admin/Artikel'));
        }else{
            $this->session->set_flashdata('error', 'Artikel Gagal Dinonaktifkan');
            redirect(site_url('Halaman_Admin/Artikel'));
        }
    }

    public function _rules() 
    {
      $this->form_validation->set_rules('id_kategori', 'id kategori', 'trim');
      $this->form_validation->set_rules('id_admin', 'id admin', 'trim');
      $this->form_validation->set_rules('judul', 'judul', 'trim|required');
      $this->form_validation->set_rules('pengarang', 'pengarang', 'trim|required');
      $this->form_validation->set_rules('isi', 'isi', 'trim|required');
      $this->form_validation->set_rules('foto', 'foto', 'trim');

      $this->form_validation->set_rules('id_artikel', 'id_artikel', 'trim');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

}

 ?>