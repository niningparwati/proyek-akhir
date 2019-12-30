<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    //------------------------- REGIS ---------------------------

    public function Tambah(){ // FIX

        $data= array(
            'action' => base_url('index.php/Admin/aksiRegis'),
            'judul' => 'U-Project',
            'nama_aplikasi' => 'U-PROJECT | Urunan Project',
            'logo' => 'assets/images/uproject.png',
            'id_admin' => $this->Admin_model->id_admin(),

        );
        $this->load->view('admin/regis',$data);
    }

    public function aksiRegis() //FIX
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $cekemail = $this->Admin_model->cek_by_email($this->input->post('email',TRUE));
            if ($cekemail) {
                $this->session->set_flashdata('error', 'Email '.$cekemail->email.' Sudah Dipakai Silahkan Gunakan Email Lain');
                redirect(site_url('admin/Tambah'));
            }else{
                $password=md5($this->input->post('password'));
                $data = array(
                    'id_admin' => $this->input->post('id_admin',TRUE),
                    'nama' => $this->input->post('nama',TRUE),
                    'email' => $this->input->post('email',TRUE),
                    'password' => $password,
                );

                $this->Admin_model->insert($data);
                $this->session->set_flashdata('success', 'Berhasil Tambah Data');
                redirect(site_url('Admin'));
            }
        }
    }

    //----------------------- END REGIS -------------------------

    //-------------------------- LOGIN --------------------------

    function index(){ // FIX

        $data= array(
            'action' => base_url('index.php/Admin/aksiLogin'),
            'judul' => 'U-Project',
            'nama_aplikasi' => 'U-PROJECT | Urunan Project',
            'logo' => 'assets/images/uproject.png',
        );
        $this->load->view('admin/login',$data);
    }

    function aksiLogin(){ //FIX

        $email = $this->input->post('email',TRUE);
        $password= md5($this->input->post('password',TRUE));

        $cek = $this->Admin_model->cek_by_email($email, $password);
        if($cek->email == $email && $password != NULL){
            $pass=$cek->password;
            if (md5($password,$pass)) { 
                $data_session = array(
                    'email' => $cek->email,
                    'status' => "admin",
                    'id_admin'=>$cek->id_admin,
                );
                $this->session->set_userdata($data_session);
                redirect(base_url("index.php/Halaman_Admin/Dashboard"));
            }else{
                $this->session->set_userdata('pesan', 'Password Salah');
                redirect(base_url("index.php/Admin"));
                // echo "pass salah";
            }
        }else{
            // echo "email salah";
            $this->session->set_userdata('pesan', 'Email Tidak Terdaftar');
            redirect(base_url("index.php/Admin"));
        }
    }

    //------------------------ END LOGIN ------------------------

    public function _rules() 
    {
      $this->form_validation->set_rules('foto', 'foto', 'trim');
      $this->form_validation->set_rules('email', 'email', 'trim|required');
      $this->form_validation->set_rules('password', 'password', 'trim|required');
      $this->form_validation->set_rules('nama', 'nama', 'trim|required');
      $this->form_validation->set_rules('tangal_lahir', 'tangal lahir', 'trim');
      $this->form_validation->set_rules('alamat', 'alamat', 'trim');
      $this->form_validation->set_rules('telepon', 'telepon', 'trim');
      $this->form_validation->set_rules('tanggal_join', 'tanggal join', 'trim');

      $this->form_validation->set_rules('id_admin', 'id_admin', 'trim');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

}