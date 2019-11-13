<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Artikel_model');
        $this->load->model('Kategori_artikel_model');
        $this->load->model('Admin_model');
        $this->load->model('User_Model');
        $this->load->library(array('form_validation', 'Recaptcha'));
        $this->load->library('datatables');
        
    }

    //============================================= ADMIN ===============================================

    public function create() //sudah
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('artikel/create_action'),
            'id_artikel' => $this->Artikel_model->id_artikel(),
            'data_kategori' => $this->Kategori_artikel_model->get_all(),
            'id_kategori' => set_value('id_kategori'), 
            'id_admin' => set_value('id_admin'),
            'judul' => set_value('judul'),
            'pengarang' => set_value('pengarang'),
            'isi' => set_value('isi'),
            'file' => set_value('file'),
        );
        $this->template->load('layout/master','artikel/artikel_form', $data);
    }

    public function create_action() 
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
                    redirect(site_url('dashboard'));

                } else {
                    $this->session->set_flashdata('error', 'Gagal Unggah File');
                    redirect(site_url('artikel/create'));
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
                redirect(site_url('artikel'));
            }
        }
    }

    public function artikel_pending() //sudah
    {
        $data  = array(
            'data_artikel' => $this->Artikel_model->get_artikel_pending(), 
        );
        $this->template->load('layout/master','artikel/artikel_pending', $data);
    }

    public function aksi($id, $aksi) //sudah
    {
        $row = $this->Artikel_model->get_by_id($id);
        if ($aksi == 'yes') {
            if ($row) {
                $data = array(
                    'status' => 'berjalan',
                    'tanggal_pos' => date('Y-m-d'),
                );
                $this->Artikel_model->update($row->id_artikel, $data);
                $this->session->set_flashdata('success', 'Artikel Diaktifkan');
                redirect(site_url('artikel/artikel_berjalan'));
            }else{
                $this->session->set_flashdata('error', 'Artikel Gagal Diaktifkan');
                redirect(site_url('artikel/artikel_pending'));
            }
        }else if($aksi == 'no'){
            if ($row) {
                $data = array(
                    'status' => 'batal',
                    'tanggal_pos' => date('Y-m-d'),
                );
                $this->Artikel_model->update($row->id_artikel, $data);
                $this->session->set_flashdata('success', 'Project Berhasil Ditolak');
                redirect(site_url('artikel/artikel_history'));
            }else{
                $this->session->set_flashdata('error', 'Project Gagal Ditolak');
                redirect(site_url('artikel/artikel_pending'));
            }
        }
    }

    public function artikel_berjalan() //sudah
    {
        $data  = array(
            'data_artikel' => $this->Artikel_model->get_artikel_berjalan(), 
        );
        $this->template->load('layout/master','artikel/artikel_berjalan', $data);
    }

    public function nonaktif($id)  //sudah
    {
        $row = $this->Artikel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'status' => 'selesai',
            );
            $this->Artikel_model->update($row->id_artikel, $data);
            $this->session->set_flashdata('success', 'Artikel Berhasil Dinonaktifkan');
            redirect(site_url('artikel/artikel_history'));
        }else{
            $this->session->set_flashdata('error', 'Artikel Gagal Dinonaktifkan');
            redirect(site_url('artikel/artikel_berjalan'));
        }
    }

    public function artikel_history()  //sudah
    {
        $data  = array(
            'data_artikel' => $this->Artikel_model->get_history(), 
        );
        $this->template->load('layout/master','artikel/artikel_history', $data);
    }

    //=========================================== END ADMIN =============================================

    //============================================== USER ===============================================

    public function index()
    { 
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        if ($q <> '') {
            $config['base_url'] = site_url() . '/artikel/?q=' . urlencode($q);
            $config['first_url'] = site_url() . '/artikel/?q=' . urlencode($q);
        } else {
            $config['base_url'] = site_url() . '/artikel';
            $config['first_url'] = site_url() . '/artikel';
        }
        $config['per_page'] = 3;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Artikel_model->total_rows($q);
        $data_artikel = $this->Artikel_model->get_artikel($config['per_page'], $start, $q);
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
            'data_artikel' => $data_artikel,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'start' => $start,
            'data_kategori' => $this->Kategori_artikel_model->get_all(),
            'id_kategori' => '',
            'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
            'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
        );
        $this->template->load('layout_user/master','site/artikel', $data);
    }

    public function artikel_by_kategori($kategori)
    { 
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        if ($q <> '') {
            $config['base_url'] = site_url() . '/artikel/?q=' . urlencode($q);
            $config['first_url'] = site_url() . '/artikel/?q=' . urlencode($q);
        } else {
            $config['base_url'] = site_url() . '/artikel';
            $config['first_url'] = site_url() . '/artikel';
        }
        $config['per_page'] = 3;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Artikel_model->total_rows_by_kategori($q, $kategori);
        $data_artikel = $this->Artikel_model->get_artikel_by_kategori($config['per_page'], $start, $q, $kategori);
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
            'data_artikel' => $data_artikel,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'start' => $start,
            'data_kategori' => $this->Kategori_artikel_model->get_all(),
            'id_kategori' => $kategori
        );
        $this->template->load('layout_user/master','site/artikel', $data);
    }

    public function detail($id)
    {
        $row = $this->Artikel_model->detail($id);
        if ($row) {
            $data = array(
                'button' => 'Register',
                'login' => 'Log In',
                'action' => site_url('user/create_action'),
                'aksi' => site_url('user/login'),
                'id_user' => $this->User_Model->ID_User(),
                'nama' => set_value('nama'),
                'email' => set_value('email'),
                'password' => set_value('password'),
                'isi' => $row->isi,
                'judul' => $row->judul,
                'foto' => $row->foto,
                'pengarang' => $row->pengarang,
                'tanggal_pos' => $row->tanggal_pos,
                'nama' => $row->nama,
                'data_kategori' => $this->Kategori_artikel_model->get_all(),
                'kategori' => $row->nama_kategori,
                'id_kategori' => '',
                'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
                'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
            );
            $this->template->load('layout_user/master','artikel/artikel_detail', $data);
        } else {
            $this->session->set_flashdata('error', 'Data Tidak Ditemukan');
            redirect(site_url('site/artikel'));
        }
        
    }

    //============================================ END USER =============================================

    

    public function read($id) 
    {
        $row = $this->Artikel_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_artikel' => $row->id_artikel,
                'id_kategori' => $row->id_kategori,
                'id_admin' => $row->id_admin,
                'judul' => $row->judul,
                'pengarang' => $row->pengarang,
                'tanggal_pos' => $row->tanggal_pos,
                'isi' => $row->isi,
                'foto' => $row->foto,
            );
            $this->template->load('layout/master','artikel/artikel_read', $data);
        } else {
            $this->session->set_flashdata('error', 'Data Tidak Ditemukan');
            redirect(site_url('artikel'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Artikel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('artikel/update_action'),
                'id_artikel' => set_value('id_artikel', $row->id_artikel),
                'id_kategori' => set_value('id_kategori', $row->id_kategori),
                'id_admin' => set_value('id_admin', $row->id_admin),
                'judul' => set_value('judul', $row->judul),
                'pengarang' => set_value('pengarang', $row->pengarang),
                'isi' => set_value('isi', $row->isi),
                'foto' => set_value('foto', $row->foto),
            );
            $this->template->load('layout/master','artikel/artikel_form', $data);
        } else {
            $this->session->set_flashdata('error', 'Data Tidak Ditemukan');
            redirect(site_url('artikel'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_artikel', TRUE));
        } else {
            $data = array(
                'id_kategori' => $this->input->post('id_kategori',TRUE),
                'id_admin' => $this->input->post('id_admin',TRUE),
                'judul' => $this->input->post('judul',TRUE),
                'pengarang' => $this->input->post('pengarang',TRUE),
                'tanggal_pos' => $this->input->post('tanggal_pos',TRUE),
                'isi' => $this->input->post('isi',TRUE),
                'foto' => $this->input->post('foto',TRUE),
            );

            $this->Artikel_model->update($this->input->post('id_artikel', TRUE), $data);
            $this->session->set_flashdata('success', 'Berhasil Edit Data');
            redirect(site_url('artikel'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Artikel_model->get_by_id($id);

        if ($row) {
            $this->Artikel_model->delete($id);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect(site_url('artikel'));
        } else {
            $this->session->set_flashdata('error', 'Data Tidak Ditemukan');
            redirect(site_url('artikel'));
        }
    }

    //========================= USER ===============================

    

    

    

    

    

    
    //=======================END USER ==============================

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

/* End of file Artikel.php */
/* Location: ./application/controllers/Artikel.php */
/* Please DO NOT modify this information : */
/* Generated by CRUDV2 Generator For AdminLTE Template 2019-07-08 06:04:20 */