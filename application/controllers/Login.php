<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('Login_model');
		$this->load->model('Admin_model');
		$this->load->library('form_validation'); 
		$this->load->helper(array('Form', 'Cookie', 'String'));
	}

	function index(){
		// $this->db->query("UPDATE project set status ='selesai' WHERE tanggal_berakhir <= curdate()");
		$data= array(
			'meta_title' => 'Aplikasi U-Project',
			'meta_description' => 'Aplikasi U-Project',
			'meta_url' => 'Aplikasi U-Project',
			'nama_instansi' => 'U-PROJECT | Urunan Project',
			'meta_images' => base_url('assets/images/telu.jpg'),
		);
		$this->load->view('login',$data);
	}


	function aksi_login(){
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$email = $this->input->post('email',TRUE);
			$password= md5($this->input->post('password',TRUE));
		
			//select * from user where user =....
			$cek = $this->Admin_model->cek_by_email($email);
			if($cek->email == $email && $password != NULL){
				$hash=$cek->password;
				if ( password_verify($password,$hash)) { 
					$data_session = array(
						'email' => $cek->email,
						'status' => "login_pengelola",
						'id_admin'=>$cek->id_admin,
					);
					$this->session->set_userdata($data_session);
					redirect(base_url("index.php/dashboard"));
				}else{
					$this->session->set_userdata('pesan', 'Password Salah');
					redirect(base_url("index.php/login"));
				}
			}else{
				echo "cek";
				$this->session->set_userdata('pesan', 'Email Tidak Terdaftar');
				redirect(base_url("index.php/login"));
			}

		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/login'));
	}

	public function _rules(){
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}