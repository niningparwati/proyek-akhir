<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tanggapan_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model');
		$this->load->model('Tanggapan_user_model');
		$this->load->library(array('form_validation', 'Recaptcha'));
	}

	public function index()
	{
		$q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        if ($q <> '') {
            $config['base_url'] = site_url() . '/tanggapan_user/?q=' . urlencode($q);
            $config['first_url'] = site_url() . '/tanggapan_user/?q=' . urlencode($q);
        } else {
            $config['base_url'] = site_url() . '/tanggapan_user';
            $config['first_url'] = site_url() . '/tanggapan_user';
        }
        $config['per_page'] = 4;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tanggapan_user_model->total_rows($q);
        $tanggapan_user = $this->Tanggapan_user_model->get_tanggapan_user($config['per_page'], $start, $q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);

		$data = array(
			'button' => 'Register',
			'login' => 'Log In',
			'action' => site_url('user/create_action'),
			'aksi' => site_url('user/login'),
			'id_user' => $this->User_Model->ID_User(),
			'nama' => set_value('nama'),
			'email' => set_value('email'),
			'password' => set_value('password'),
			'tanggapan_user' => $tanggapan_user,
			'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'start' => $start,
            'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
            'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
		);
		$this->template->load('layout_user/master','site/tanggapan_user', $data);
	}

	public function create()
	{
		$data = array(
			'button' => 'Register',
			'action' => site_url('user/create_action'),
			'aksi' => site_url('user/login'),
			'id_user' => $this->User_Model->ID_User(),
			'nama' => set_value('nama'),
			'email' => set_value('email'),
			'password' => set_value('password'),
			'user' => $this->session->userdata('id_user'),
			'tanggal_pos' => date('Y-m-d'),
			'isi' => set_value('isi'),
			'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
            'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
		);
		$this->template->load('layout_user/master','site/tanggapan_user_form', $data);
	}

	public function create_action()
	{
		$data = array(
			'id_user' => $this->input->post('id_user'),
			'isi' => $this->input->post('isi'),
			'tanggal_pos' => $this->input->post('tanggal_pos')
		);

		$this->Tanggapan_user_model->insert($data);
		$this->session->set_flashdata('success', 'Tanggapan Berhasil Dikirim');
        redirect(site_url('tanggapan_user'));
	}

	public function list()
	{
		$data  = array(
            'tanggapan_user' => $this->Tanggapan_user_model->get_all(), 
        );
        $this->template->load('layout/master','tanggapan_user/tanggapan_user_list', $data);
	}

	public function delete($id) 
    {
        $row = $this->Tanggapan_user_model->get_by_id($id);

        if ($row) {
            $this->Tanggapan_user_model->delete($id);
            $this->session->set_flashdata('success', 'Tanggapan User Berhasil Dihapus');
            redirect(site_url('tanggapan_user/list'));
        } else {
            $this->session->set_flashdata('error', 'Data Tidak Ditemukan');
            redirect(site_url('tanggapan_user/list'));
        }
    }

}

 ?>