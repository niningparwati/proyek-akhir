<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Donasi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Project_model');
		$this->load->model('User_Model');
		$this->load->model('Benefit_model');
		$this->load->model('Donasi_model');
		
        $this->load->library(array('form_validation', 'Recaptcha'));
	}

	public function cek($id, $keputusan)
	{

		if ($keputusan == 'yes') {
			$data = array(
				'id_project' => $this->Project_model->get_by_id($id)->id_project,
				'nama' => $this->Project_model->get_by_id($id)->nama,
				'data_benefit' => $this->Benefit_model->benefit_project_berjalan($id),
			);
			$this->template->load('layout_user/master','site/donasi', $data);
		}else if($keputusan == 'no'){
			$this->session->set_flashdata('error', 'Silahkan Login terlebih dahulu !');
			redirect(base_url("index.php/user/login"));
		}
	}

	public function create()
	{
		$this->template->load('layout_user/master','site/donasi');
	}

	public function create_action(){
		if (!empty($_FILES['bukti_pembayaran']['name'])) {
			$config['upload_path']      = './assets/bukti_pembayaran/';
			$config['allowed_types']    = 'jpg|jpeg|png';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('bukti_pembayaran')) {
				$uploadData = $this->upload->data();

				$cek_benefit = $this->Benefit_model->cek_benefit($this->input->post('id_project'),$this->input->post('nominal'));

				$data = array(
					'id_donasi' => $this->Donasi_model->get_id(),
					'id_user' => $this->session->userdata('id_user'),
					'id_project' => $this->input->post('id_project'),
					'id_benefit' => $cek_benefit,
					'nominal' => $this->input->post('nominal'),
					'tanggal_donasi' => date('Y-m-d'),
					'status_benefit' => 'Menunggu Konfirmasi',
					'bukti_pembayaran' => $uploadData['file_name'],
					'status' => 'Pending'
				);
				//print_r($data);
				$this->Donasi_model->insert($data);
				$this->session->set_flashdata('success', 'Donasi Berhasil');
				redirect(site_url('project/detail_project/'.$this->input->post('id_project')));
			} else {
				$this->session->set_flashdata('error', 'Donasi Gagal');
				redirect(site_url('project/detail_project/'.$this->input->post('id_project')));
			}
		}else{
			$this->session->set_flashdata('error', 'Gagal Unggah Bukti Pembayaran');
			redirect(site_url('project/detail_project/'.$this->input->post('id_project')));
		}
	}

	public function kirim_benefit($id)
	{
		$data = array(
			'id_donasi' => $id,
			'status_benefit' => 'Benefit Sudah Dikirim'
		);

		$this->Donasi_model->update($id, $data);
		$this->session->set_flashdata('success', 'Status Benefit Berhasil Diupdate');
		redirect(site_url('project/project_user'));
	}

	public function donasi_user()
	{
		$data = array(
			'data_donasi' => $this->Donasi_model->get_donasi($this->session->userdata('id_user')),
    		'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
            'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
        );

		$this->template->load('layout_user/master','site/donasi_user', $data);
	}

}

?>