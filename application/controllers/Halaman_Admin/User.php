<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('User_Model');
		require 'session.php';
		
	}

	//-------------------------- GET ALL USER ---------------------------

	public function index() //FIX (list semua user)
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
			'data_user' =>  $this->User_Model->get_all(),
		);
		$this->load->view('layout_admin/head');
		$this->load->view('layout_admin/header', $data);
		$this->load->view('layout_admin/sidebar', $data);
		$this->load->view('Halaman_Admin/user/data_user', $data);
		$this->load->view('layout_admin/footer', $data);
	}

	public function detailUser($id) //FIX (detail user)
	{ 
		$email = $this->session->userdata('email');
		$cekAdmin = $this->Admin_model->cekNama($email);

		$row = $this->User_Model->get_by_id($id);
		if ($row) {
			$data = array(
				'logo' => 'assets/images/uproject.png',
				'email_admin' => $email,
				'nama_admin' => $cekAdmin->nama_admin,
				'id_admin' => $cekAdmin->id_admin,
				'foto_admin' => $cekAdmin->foto_admin,
				'logout' => base_url('index.php/Halaman_Admin/Dashboard/Logout'),
				'id_user' => $row->id_user,
				'nama' => $row->nama,
				'foto' => $row->foto,
				'email' => $row->email,
				'password' => $row->password,
				'tanggal_lahir' => $row->tanggal_lahir,
				'alamat' => $row->alamat,
				'telepon' => $row->telepon,
				'pekerjaan' => $row->pekerjaan,
				'tanggal_join' => $row->tanggal_join,
			);
			$this->load->view('layout_admin/head');
			$this->load->view('layout_admin/header', $data);
			$this->load->view('layout_admin/sidebar', $data);
			$this->load->view('Halaman_Admin/user/user_detail', $data);
			$this->load->view('layout_admin/footer', $data);
		}else{
			$this->session->set_flashdata('error', 'Data Tidak Ditemukan');
			redirect(site_url('Halaman_Admin/Dashboard'));
		}
	}

	public function editUser($id) //FIX (edit oleh admin)
	{ 
		$email = $this->session->userdata('email');
		$cekAdmin = $this->Admin_model->cekNama($email);

		$row = $this->User_Model->get_by_id($id);
		if ($row) {
			$data = array(
				'logo' => 'assets/images/uproject.png',
				'email_admin' => $email,
				'nama_admin' => $cekAdmin->nama_admin,
				'id_admin' => $cekAdmin->id_admin,
				'foto_admin' => $cekAdmin->foto_admin,
				'logout' => base_url('index.php/Halaman_Admin/Dashboard/Logout'),
				'id_user' => $row->id_user,
				'nama' => $row->nama,
				'foto' => $row->foto,
				'email' => $row->email,
				'password' => $row->password,
				'tanggal_lahir' => $row->tanggal_lahir,
				'alamat' => $row->alamat,
				'telepon' => $row->telepon,
				'pekerjaan' => $row->pekerjaan,
				'tanggal_join' => $row->tanggal_join,
			);
			$this->load->view('layout_admin/head');
			$this->load->view('layout_admin/header', $data);
			$this->load->view('layout_admin/sidebar', $data);
			$this->load->view('Halaman_Admin/user/user_edit', $data);
			$this->load->view('layout_admin/footer', $data);
		}else{
			$this->session->set_flashdata('error', 'Data Tidak Ditemukan');
			redirect(site_url('Halaman_Admin/User'));
		}
	}

	public function updateUser($id) //FIX  (oleh admin)
	{ 
		if (!empty($_FILES['foto']['name'])) {
			$config['upload_path']      = './assets/user/profile/';
			$config['allowed_types']    = 'jpg|jpeg|png';
			$config['file_name']        = $file;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			$path= './assets/user/profile/';
			$file = $this->input->post('foto_old',TRUE);
			if (!empty($file)) {
				@unlink($path.$file);
			}

			if ($this->upload->do_upload('foto')) {
				$uploadData = $this->upload->data();

				$data = array(
					'id_user' =>$this->input->post('id_user'),
					'nama' => $this->input->post('nama'),
					'foto' => $uploadData['file_name'],
					'email' => $this->input->post('email'),
					'tanggal_lahir' => $this->input->post('tanggal_lahir'),
					'alamat' => $this->input->post('alamat'),
					'telepon' => $this->input->post('telepon'),
					'pekerjaan' => $this->input->post('pekerjaan'),
				);

				$this->User_Model->update($this->input->post('id_user', TRUE), $data);
				$this->session->set_flashdata('success', 'Berhasil Update Data User');
				redirect(site_url('Halaman_Admin/User'));
			} else {
				$this->session->set_flashdata('error', 'Gagal Update Data User');
				redirect(site_url('Halaman_Admin/User'));
			}
		}else{
			$data = array(
				'id_user' =>$this->input->post('id_user'),
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'alamat' => $this->input->post('alamat'),
				'telepon' => $this->input->post('telepon'),
				'pekerjaan' => $this->input->post('pekerjaan'),
			);

			$this->User_Model->update($this->input->post('id_user', TRUE), $data);
			$this->session->set_flashdata('success', 'Berhasil Update Data User');
			redirect(site_url('Halaman_Admin/User'));
		}

	}

	public function Aktivasi($id_user) //FIX  (oleh admin)
	{
		$cekStatus = $this->User_Model->get_by_id($id_user);
		$status1 = $cekStatus->status;
		// echo $status;

		if ($status1 == "Aktif") {
			$status = "Tidak Aktif";

			$this->User_Model->Aktivasi($id_user, $status);
			$this->session->set_flashdata('success', 'Berhasil Non-Aktifkan User');
			redirect(site_url('Halaman_Admin/User'));

		}elseif ($status1 == "Tidak Aktif"){
			$status = "Aktif";

			$this->User_Model->Aktivasi($id_user, $status);
			$this->session->set_flashdata('success', 'Berhasil Aktifkan User');
			redirect(site_url('Halaman_Admin/User'));

		}
	}

	//------------------------- END ALL USER ----------------------------

	//------------------------ PROJECT MAKER ----------------------------

	public function projectMaker() //FIX (oleh admin)
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
			'project_maker' =>  $this->User_Model->get_all_project_maker(),
		);
		$this->load->view('layout_admin/head');
		$this->load->view('layout_admin/header', $data);
		$this->load->view('layout_admin/sidebar', $data);
		$this->load->view('Halaman_Admin/user/project_maker', $data);
		$this->load->view('layout_admin/footer', $data);

	}

    public function read_project_maker($id) //FIX (oleh admin)
    {
    	$email = $this->session->userdata('email');
    	$cekAdmin = $this->Admin_model->cekNama($email);

    	$row = $this->User_Model->detailUser($id);
    	if ($row) {
    		$data = array(
    			'logo' => 'assets/images/uproject.png',
    			'email_admin' => $email,
    			'nama_admin' => $cekAdmin->nama_admin,
    			'id_admin' => $cekAdmin->id_admin,
    			'foto_admin' => $cekAdmin->foto_admin,
    			'logout' => base_url('index.php/Halaman_Admin/Dashboard/Logout'),
    			'id_user' => $row->id_user,
    			'nama' => $row->nama,
    			'foto' => $row->foto,
    			'email' => $row->email,
    			'password' => $row->password,
    			'tanggal_lahir' => $row->tanggal_lahir,
    			'alamat' => $row->alamat,
    			'telepon' => $row->telepon,
    			'pekerjaan' => $row->pekerjaan,
    			'tanggal_join' => $row->tanggal_join,
    			'data_project' => $this->User_Model->project_maker_by_id($id)
    		);
    		$this->load->view('layout_admin/head');
    		$this->load->view('layout_admin/header', $data);
    		$this->load->view('layout_admin/sidebar', $data);
    		$this->load->view('Halaman_Admin/user/project_maker_detail', $data);
    		$this->load->view('layout_admin/footer', $data);
    	}else{
    		$this->session->set_flashdata('error', 'Data Tidak Ditemukan');
    		redirect(site_url('Halaman_Admin/Dashboard'));
    	}
    }

    public function Donatur() //FIX (oleh admin)
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
    		'donatur' =>  $this->User_Model->getDonatur(),
    	);
    	$this->load->view('layout_admin/head');
    	$this->load->view('layout_admin/header', $data);
    	$this->load->view('layout_admin/sidebar', $data);
    	$this->load->view('Halaman_Admin/user/donatur', $data);
    	$this->load->view('layout_admin/footer', $data);

    }

    public function detailDonatur($id) //FIX (oleh admin)
    {
    	$email = $this->session->userdata('email');
    	$cekAdmin = $this->Admin_model->cekNama($email);

    	$row = $this->User_Model->detailUser($id);
    	if ($row) {
    		$data = array(
    			'logo' => 'assets/images/uproject.png',
    			'email_admin' => $email,
    			'nama_admin' => $cekAdmin->nama_admin,
    			'id_admin' => $cekAdmin->id_admin,
    			'foto_admin' => $cekAdmin->foto_admin,
    			'logout' => base_url('index.php/Halaman_Admin/Dashboard/Logout'),
    			'id_user' => $row->id_user,
    			'nama' => $row->nama,
    			'foto' => $row->foto,
    			'email' => $row->email,
    			'password' => $row->password,
    			'tanggal_lahir' => $row->tanggal_lahir,
    			'alamat' => $row->alamat,
    			'telepon' => $row->telepon,
    			'pekerjaan' => $row->pekerjaan,
    			'tanggal_join' => $row->tanggal_join,
    			'data_project' => $this->User_Model->donaturById($id)
    		);
    		$this->load->view('layout_admin/head');
    		$this->load->view('layout_admin/header', $data);
    		$this->load->view('layout_admin/sidebar', $data);
    		$this->load->view('Halaman_Admin/user/detail_donatur', $data);
    		$this->load->view('layout_admin/footer', $data);
    	}else{
    		$this->session->set_flashdata('error', 'Data Tidak Ditemukan');
    		redirect(site_url('Halaman_Admin/Dashboard'));
    	}
    }

	//------------------------ END PROJECT MAKER ------------------------

}


?>