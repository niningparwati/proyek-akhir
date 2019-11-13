<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Benefit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Benefit_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'benefit_data' => $this->Benefit_model->get_all(),
        );
        $this->template->load('layout/master','benefit/benefit_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Benefit_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_benefit' => $row->id_benefit,
                'id_project' => $row->id_project,
                'nama_benefit' => $row->nama_benefit,
                'isi' => $row->isi,
            );
            $this->template->load('layout/master','benefit/benefit_read', $data);
        } else {
            $this->session->set_flashdata('error', 'Data Tidak Ditemukan');
            redirect(site_url('benefit'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('benefit/create_action'),
            'id_benefit' => set_value('id_benefit'),
            'id_project' => set_value('id_project'),
            'nama_benefit' => set_value('nama_benefit'),
            'isi' => set_value('isi'),
        );
        $this->template->load('layout/master','benefit/benefit_form', $data);
    }
    
    public function create_action() 
    {

        $data = array(
         'id_project' => $this->input->post('id_project',TRUE),
         'minimal'=> $this->input->post('minimal',TRUE),
         'maksimal'=> $this->input->post('maksimal',TRUE),
         'nama_benefit' => $this->input->post('nama_benefit',TRUE),
         'isi' => $this->input->post('isi',TRUE),
     );

        $this->Benefit_model->insert($data);
        $this->session->set_flashdata('success', 'Berhasil Tambah Benefit');
        redirect(site_url('project/upload'));

    }
    
    public function update($id) 
    {
        $row = $this->Benefit_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('benefit/update_action'),
                'id_benefit' => set_value('id_benefit', $row->id_benefit),
                'id_project' => set_value('id_project', $row->id_project),
                'nama_benefit' => set_value('nama_benefit', $row->nama_benefit),
                'isi' => set_value('isi', $row->isi),
            );
            $this->template->load('layout/master','benefit/benefit_form', $data);
        } else {
            $this->session->set_flashdata('error', 'Data Tidak Ditemukan');
            redirect(site_url('benefit'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_benefit', TRUE));
        } else {
            $data = array(
                'id_project' => $this->input->post('id_project',TRUE),
                'nama_benefit' => $this->input->post('nama_benefit',TRUE),
                'isi' => $this->input->post('isi',TRUE),
            );

            $this->Benefit_model->update($this->input->post('id_benefit', TRUE), $data);
            $this->session->set_flashdata('success', 'Berhasil Edit Data');
            redirect(site_url('benefit'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Benefit_model->get_by_id($id);

        if ($row) {
            $this->Benefit_model->delete($id);
            $this->session->set_flashdata('success', 'Berhasil Hapus Benefit');
            redirect(site_url('project/upload'));
        } else {
            $this->session->set_flashdata('error', 'Data Tidak Ditemukan');
            redirect(site_url('project/upload'));
        }
    }

    public function delete_semua($idpro) 
    {
        $row = $this->Benefit_model->get_by_project($idpro);

        if ($row) {
            $this->Benefit_model->delete_by_project($idpro);
            $this->session->set_flashdata('success', 'Berhasil Hapus Semua Benefit');
            redirect(site_url('project/upload'));
        } else {
            $this->session->set_flashdata('error', 'Data Tidak Ditemukan');
            redirect(site_url('project/upload'));
        }
    }

    public function _rules() 
    {
      $this->form_validation->set_rules('id_project', 'id project', 'trim|required');
      $this->form_validation->set_rules('nama_benefit', 'nama benefit', 'trim|required');
      $this->form_validation->set_rules('isi', 'isi', 'trim|required');

      $this->form_validation->set_rules('id_benefit', 'id_benefit', 'trim');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

}