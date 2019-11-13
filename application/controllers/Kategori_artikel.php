<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_artikel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_artikel_model');
        $this->load->library('form_validation');
		$this->load->library('datatables');
    }

    public function create() //sudah
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('kategori_artikel/create_action'),
            'id_kategori' => set_value('id_kategori'),
            'nama_kategori' => set_value('nama_kategori'),
        );
        $this->template->load('layout/master','kategori_artikel/kategori_artikel_form', $data);
    }
    
    public function create_action() //sudah
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
            redirect(site_url('kategori_artikel/read'));
        }
    }

    public function read() //sudah
    {
        $data = array(
			'kategori_artikel' => $this->Kategori_artikel_model->get_all(),
		);
        $this->template->load('layout/master','kategori_artikel/kategori_artikel_list', $data);
    }

    public function delete($id) //sudah
    {
        $row = $this->Kategori_artikel_model->get_by_id($id);

        if ($row) {
            $this->Kategori_artikel_model->delete($id);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect(site_url('kategori_artikel'));
        } else {
            $this->session->set_flashdata('error', 'Data Tidak Ditemukan');
            redirect(site_url('kategori_artikel/read'));
        }
    }
    
    public function update($id) //sudah
    {
        $row = $this->Kategori_artikel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('kategori_artikel/update_action'),
				'id_kategori' => set_value('id_kategori', $row->id_kategori),
				'nama_kategori' => set_value('nama_kategori', $row->nama_kategori),
			);
            $this->template->load('layout/master','kategori_artikel/kategori_artikel_form', $data);
        } else {
            $this->session->set_flashdata('error', 'Data Tidak Ditemukan');
            redirect(site_url('kategori_artikel/read'));
        }
    }
    
    public function update_action() //sudah
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
            redirect(site_url('kategori_artikel/read'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('nama_kategori', 'nama kategori', 'trim|required');

		$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}