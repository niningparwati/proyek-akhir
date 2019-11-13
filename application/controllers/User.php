<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model');
		$this->load->library(array('form_validation', 'Recaptcha'));
		$this->load->helper(array('Form', 'String'));
	}

	//------------------- CREATE USER ----------------------

	public function index() //sudah (load form register and login)
	{ 
		if ($this->session->userdata('status') != "") {
			if($this->session->userdata('status') == "login_user"){
				redirect(base_url("index.php/project/home"));
			}
		}else{

			$data = array(
				'button' => 'Register',
				'login' => 'Log In',
				'action' => site_url('user/create_action'),
				'aksi' => site_url('user/login'),
				'id_user' => $this->User_Model->ID_User(),
				'nama' => set_value('nama'),
				'email' => set_value('email'),
				'password' => set_value('password'),
				'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
            	'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
            );
			$this->template->load('layout_user/master','user/register',$data);
		}
	}

	public function create_action() //sudah
	{ 
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		}else{
			$recaptcha = $this->input->post('g-recaptcha-response');
			$response = $this->recaptcha->verifyResponse($recaptcha);

			$cekuser = $this->User_Model->cek_by_email($this->input->post('email',TRUE));
			if ($cekuser) {
				$this->session->set_flashdata('error', 'email'.$cekuser->email.' sudah dipakai. Silahkan gunakan email lain');
				redirect(site_url('user'));
			}else{

				$config = [
					'mailtype'  => 'html',
					'charset'   => 'utf-8',
					'protocol'  => 'smtp',
					'smtp_host' => 'ssl://smtp.gmail.com',
       				'smtp_user' => 'tric.system@gmail.com',    // Ganti dengan email gmail
      				'smtp_pass' => 'tricindonesiajaya',      // Password gmail
      				'smtp_port' => 465,
      				'crlf'      => "\r\n",
      				'newline'   => "\r\n"
      			];

      			$password = md5($this->input->post('password'));
      			$newpassword = password_hash($password, PASSWORD_BCRYPT);
      			$data = array(
      				'id_user' => $this->input->post('id_user'),
      				'nama' => $this->input->post('nama'),
      				'email' => $this->input->post('email'),
      				'password' => $newpassword,
      				'tanggal_join' => date('Y-d-m H-i-s'),
      			);
      			$this->User_Model->insert($data);

      			$this->session->set_flashdata('success', 'Berhasil Terdaftar');
      			redirect(site_url('user/login'));
      		}
      	}
      }

	//----------------- END CREATE USER --------------------

	//---------------------- LOGIN & LOG OUT-------------------------

	public function login() //sudah (form)
	{ 
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else{
			$email = $this->input->post('email',TRUE);
			$password = md5($this->input->post('password',TRUE));

			$cek = $this->User_Model->cek_by_email($email);
			if ($cek->email == $email && $password != NULL) {
				$hash = $cek->password;
				if ( password_verify($password, $hash)) {
					$data_session = array(
						'email' => $cek->email,
						'status' => "login_user",
						'id_user' => $cek->id_user,
						'nama' => $cek->nama
					);
					$this->session->set_userdata($data_session);
					redirect(base_url('index.php/project/home'));
				}else{
					$this->session->set_flashdata('pesan', 'Password Salah');
					redirect(base_url("index.php/user"));
				}
			}else{
				echo "cek";
				$this->session->set_flashdata('pesan', 'Email Tidak Terdaftar');
				redirect(base_url("index.php/user"));
			}

		}
	}

	function logout() //sudah
	{ 
		$this->session->sess_destroy();
		redirect(base_url('index.php/project/home'));
	}

	//----------------------- END LOGIN & LOG OUT -----------------------

	//-------------------------- GET ALL USER ---------------------------

	public function semuaUser() //sudah  (list data)
	{ 
		$data = array(
			'data_user' =>  $this->User_Model->get_all(),
		);
		$this->template->load('layout/master','user/data_user', $data);
	}	

	public function read($id) //sudah (detail project)
	{ 
		$row = $this->User_Model->get_by_id($id);

		if ($row) {
			$data = array(
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
			$this->template->load('layout/master','user/user_detail', $data);
		}else{
			$this->session->set_flashdata('error', 'Data Tidak Ditemukan');
			redirect(site_url('user/user_all'));
		}
	}

	public function edit_user($id) //sudah (edit oleh admin)
	{ 
		$row = $this->User_Model->get_by_id($id);

		if ($row) {
			$data = array(
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
			$this->template->load('layout/master','user/user_edit', $data);
		}else{
			$this->session->set_flashdata('error', 'Data Tidak Ditemukan');
			redirect(site_url('user/user_all'));
		}
	}

	public function update_user($id) //sudah  (oleh admin)
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
				redirect(site_url('user/user_all'));
			} else {
				$this->session->set_flashdata('error', 'Gagal Update Data User');
				redirect(site_url('user/user_all'));
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
			redirect(site_url('user/user_all'));
		}

	}

	public function delete($id)  //sudah  (oleh admin)
	{ 
		$row = $this->User_Model->get_by_id($id);

		if ($row) {
			$this->User_Model->delete($id);
			$this->session->set_flashdata('success', 'Berhasil Hapus User');
			redirect(site_url('user/user_all'));
		} else {
			$this->session->set_flashdata('error', 'Data Tidak Ditemukan');
			redirect(site_url('user/user_all'));
		}
	}

	//------------------------ END GET ALL USER -------------------------
	
    //------------------------ PROJECT MAKER------------------------

    public function project_maker() //sudah
    { 
    	$data = array(
    		'project_maker' =>  $this->User_Model->get_all_project_maker(),
    	);

    	$this->template->load('layout/master','user/project_maker', $data);
    }

    public function read_project_maker($id) //sudah
    {
    	$row = $this->User_Model->project_maker_read($id);

    	if ($row) {
    		$data = array(
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
    		$this->template->load('layout/master','user/project_maker_detail', $data);
    	}else{
    		$this->session->set_flashdata('error', 'Data Tidak Ditemukan');
    		redirect(site_url('user/project_maker'));
    	}
    }

    //---------------------- END PROJECT MAKER ----------------------  

    //-------------------------- FORM VALIDATION -------------------------
    public function _rules()
    {
    	$this->form_validation->set_rules('nama', 'nama', 'trim');
    	$this->form_validation->set_rules('email', 'email', 'trim|required');
    	$this->form_validation->set_rules('password', 'password', 'trim|required');
    }
	//-------------------------- END FORM VALIDATION -------------------------

}

?>