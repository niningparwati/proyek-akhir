<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model');
		$this->load->model('Artikel_Model');
		$this->load->model('kategori_artikel_Model');
		$this->load->model('Project_Model');
		$this->load->library(array('form_validation'));
		$this->load->helper(array('Form', 'String'));
	}

	public function home()
	{
		$data = array(
			'button' => 'Register',
			'login' => 'Log In',
			'action' => site_url('user/create_action'),
			'aksi' => site_url('user/login'),
			'id_user' => $this->User_Model->ID_User(),
			'nama' => set_value('nama'),
			'email' => set_value('email'),
			'password' => set_value('password'),
			'data_project' => $this->Project_Model->get_all(),
		);
		$this->template->load('layout_user/master','site/home', $data);
	}

	public function artikel()
	{


		$data = array(
			'button' => 'Register',
			'login' => 'Log In',
			'action' => site_url('user/create_action'),
			'aksi' => site_url('user/login'),
			'id_user' => $this->User_Model->ID_User(),
			'nama' => set_value('nama'),
			'email' => set_value('email'),
			'password' => set_value('password'),
			'data_artikel' => $this->Artikel_Model->get_data_artikel(),
			'kategori_artikel' => $this->kategori_artikel_Model->get_all(),
			'pagination' => $this->pagination->create_links()
		);
		$this->template->load('layout_user/master','site/artikel', $data);
	}

	public function tanggapan_user()
	{
		$data = array(
			'button' => 'Register',
			'login' => 'Log In',
			'action' => site_url('user/create_action'),
			'aksi' => site_url('user/login'),
			'id_user' => $this->User_Model->ID_User(),
			'nama' => set_value('nama'),
			'email' => set_value('email'),
			'password' => set_value('password')
		);
		$this->template->load('layout_user/master','site/tanggapan_user', $data);
	}

	public function project()
	{
		$data = array(
			'button' => 'Register',
			'login' => 'Log In',
			'action' => site_url('user/create_action'),
			'aksi' => site_url('user/login'),
			'id_user' => $this->User_Model->ID_User(),
			'nama' => set_value('nama'),
			'email' => set_value('email'),
			'password' => set_value('password')
		);
		$this->template->load('layout_user/master','site/my_project', $data);
	}

	public function donasi()
	{
		$data = array(
			'button' => 'Register',
			'login' => 'Log In',
			'action' => site_url('user/create_action'),
			'aksi' => site_url('user/login'),
			'id_user' => $this->User_Model->ID_User(),
			'nama' => set_value('nama'),
			'email' => set_value('email'),
			'password' => set_value('password')
		);
		$this->template->load('layout_user/master','site/donasi', $data);
	}

}

?>