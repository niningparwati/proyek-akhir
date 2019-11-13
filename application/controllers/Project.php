<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Project_model');
        $this->load->model('User_Model');
        $this->load->model('Benefit_model');
        $this->load->model('Donasi_model');
        // $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->helper('download');
        $this->load->library(array('form_validation', 'Recaptcha'));
    }

    //============================================= ADMIN ======================================================

    //----------------------- ALL PROJECT (ADMIN) --------------------

    public function get_all() //sudah
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
            'data_project' => $this->Project_model->get_all(),
        );
        $this->template->load('layout/master','project/project_list', $data);
    }

    public function read($id) //sudah
    {   
        $row = $this->Project_model->get_by_id($id);
        if ($row) {
            if ($row->status == 'pending') {
                redirect(site_url('project/siap_acc_read/'.$row->id_project));
            }else if($row->status == 'berjalan'){
                redirect(site_url('project/project_berjalan_read/'.$row->id_project));
            }else if($row->status == 'selesai'){
                redirect(site_url('project/project_selesai_read/'.$row->id_project));
            }else if($row->status == 'tolak'){
                redirect(site_url('project/project_ditolak_read/'.$row->id_project));
            }
        } else {
            $this->session->set_flashdata('error', 'Data Tidak Ditemukan');
            redirect(site_url('project'));
        }
    }

    //--------------------- END ALL PROJECT (ADMIN) --------------------

    //------------------------- PROJECT SIAP ACC (ADMIN) -------------------------

    public function siap_acc() //sudah
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
            'data_project' => $this->Project_model->get_siap_acc(),
        );
        $this->template->load('layout/master','project/project_siap_acc', $data);
    }

    public function siap_acc_read($id) // sudah
    {
        $row = $this->Project_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_project' => $row->id_project,
                'id_user' => $row->id_user,
                'foto' => $row->foto,
                'nama' => $row->nama,
                'nama_user' => $row->nama_user,
                'detail' => $row->detail,
                'dana_dibutuhkan' => $row->dana_dibutuhkan,
                'tanggal_buat' => $row->tanggal_buat,
                'tanggal_berakhir' => $row->tanggal_berakhir,
                'surat_perjanjian' => $row->surat_perjanjian,
                'proposal' => $row->proposal,
                'status' => $row->status,
                'status_data' => $row->status_data,
                'data_benefit' => $this->Benefit_model->data_benefit($row->id_project)
            );
            $this->template->load('layout/master','project/project_siap_acc_read', $data);
        } else {
            $this->session->set_flashdata('error', 'Data Tidak Ditemukan');
            redirect(site_url('project'));
        }
    }

    public function acc($id, $keputusan) //sudah
    {
        $row = $this->Project_model->get_by_id($id);
        if ($keputusan == 'yes') {
            if ($row) {
                $data = array(
                    'status' => 'berjalan'
                );
                $this->Project_model->update($row->id_project, $data);
                $this->session->set_flashdata('success', 'Berhasil Approve Project');
                redirect(site_url('project/project_berjalan'));
            }else{
                $this->session->set_flashdata('error', 'Gagal Approve Project');
                redirect(site_url('project/siap_acc'));
            }
        }else if($keputusan == 'no'){
            if ($row) {
                $data = array(
                    'status' => 'tolak'
                );
                $this->Project_model->update($row->id_project, $data);
                $this->session->set_flashdata('success', 'Project Berhasil Ditolak');
                redirect(site_url('project/siap_acc'));
            }else{
                $this->session->set_flashdata('error', 'Project Gagal Ditolak');
                redirect(site_url('project/siap_acc'));
            }
        }

    }

    //----------------------- END PROJECT SIAP ACC (ADMIN) -----------------------

    //----------------------------- PROJECT BERJALAN ------------------------------

    public function project_berjalan()
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
            'data_project' => $this->Project_model->project_berjalan(),
        );
        $this->template->load('layout/master','project/project_berjalan', $data);
    }

    public function project_berjalan_read($id) 
    {
        $row = $this->Project_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_project' => $row->id_project,
                'id_user' => $row->id_user,
                'foto' => $row->foto,
                'nama' => $row->nama,
                'nama_user' => $row->nama_user,
                'detail' => $row->detail,
                'dana_dibutuhkan' => $row->dana_dibutuhkan,
                'tanggal_buat' => $row->tanggal_buat,
                'tanggal_berakhir' => $row->tanggal_berakhir,
                'surat_perjanjian' => $row->surat_perjanjian,
                'proposal' => $row->proposal,
                'status' => $row->status,
                'status_data' => $row->status_data,
                'data_benefit' => $this->Benefit_model->benefit_project_berjalan($row->id_project),
                'data_donasi' => $this->Donasi_model->donasi_by_project($row->id_project),
                'donasi_masuk' => $this->Donasi_model->donasi_masuk($row->id_project),
            );
            $this->template->load('layout/master','project/project_berjalan_read', $data);
        } else {
            $this->session->set_flashdata('error', 'Data Tidak Ditemukan');
            redirect(site_url('project'));
        }
    }

    //--------------------------- END PROJECT BERJALAN ----------------------------

    //----------------------------- PROJECT SELESAI ------------------------------

    public function project_selesai() //sudah
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
            'data_project' => $this->Project_model->project_selesai(),
        );
        $this->template->load('layout/master','project/project_selesai', $data);
    }

    public function project_selesai_read($id) //sudah
    {
        $row = $this->Project_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_project' => $row->id_project,
                'id_user' => $row->id_user,
                'foto' => $row->foto,
                'nama' => $row->nama,
                'nama_user' => $row->nama_user,
                'detail' => $row->detail,
                'dana_dibutuhkan' => $row->dana_dibutuhkan,
                'tanggal_buat' => $row->tanggal_buat,
                'tanggal_berakhir' => $row->tanggal_berakhir,
                'surat_perjanjian' => $row->surat_perjanjian,
                'proposal' => $row->proposal,
                'status' => $row->status,
                'status_data' => $row->status_data,
                'data_benefit' => $this->Benefit_model->benefit_project_berjalan($row->id_project),
                'data_donasi' => $this->Donasi_model->donasi_by_project($row->id_project),
                'donasi_masuk' => $this->Donasi_model->donasi_masuk($row->id_project),
            );
            $this->template->load('layout/master','project/project_selesai_read', $data);
        } else {
            $this->session->set_flashdata('error', 'Data Tidak Ditemukan');
            redirect(site_url('project'));
        }
    }

    //--------------------------- END PROJECT SELESAI ----------------------------

    //----------------------------- PROJECT DITOLAK ------------------------------

    public function project_ditolak() //sudah
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
            'data_project' => $this->Project_model->project_ditolak(),
        );
        $this->template->load('layout/master','project/project_ditolak', $data);
    }

    public function project_ditolak_read($id) 
    {
        $row = $this->Project_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_project' => $row->id_project,
                'id_user' => $row->id_user,
                'foto' => $row->foto,
                'nama' => $row->nama,
                'nama_user' => $row->nama_user,
                'detail' => $row->detail,
                'dana_dibutuhkan' => $row->dana_dibutuhkan,
                'tanggal_buat' => $row->tanggal_buat,
                'tanggal_berakhir' => $row->tanggal_berakhir,
                'surat_perjanjian' => $row->surat_perjanjian,
                'proposal' => $row->proposal,
                'status' => $row->status,
                'status_data' => $row->status_data,
                'data_benefit' => $this->Benefit_model->data_benefit($row->id_project)
            );
            $this->template->load('layout/master','project/project_ditolak_read', $data);
        } else {
            $this->session->set_flashdata('error', 'Data Tidak Ditemukan');
            redirect(site_url('project'));
        }
    }

    //--------------------------- END PROJECT DITOLAK ----------------------------

    //------------------------------ DOWNLOAD ----------------------------------

    public function download_proposal($id) //sudah
    { 
        $row = $this->Project_model->get_by_id($id);

        if ($row) {
            force_download('assets/proposal_project/'.$row->proposal,NULL);
        }
    }

    public function download_surat_perjanjian($id) //sudah
    { 
        $row = $this->Project_model->get_by_id($id);

        if ($row) {
            force_download('assets/surat_perjanjian/'.$row->surat_perjanjian,NULL);
        }
    }

    public function download_foto_project($id) //sudah
    { 
        $row = $this->Project_model->get_by_id($id);

        if ($row) {
            force_download('assets/foto_project/'.$row->foto,NULL);
        }
    }

    //---------------------------- END DOWNLOAD --------------------------------

    //================================================ END ADMIN ==============================================

    //=================================================== USER ================================================

    public function home()  //sudah  (di site halaman user)
    { 

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        if ($q <> '') {
            $config['base_url'] = site_url() . '/project/home/?q=' . urlencode($q);
            $config['first_url'] = site_url() . '/project/home/?q=' . urlencode($q);
        } else {
            $config['base_url'] = site_url() . '/project/home';
            $config['first_url'] = site_url() . '/project/home';
        }
        $config['per_page'] = 8;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Project_model->total_rows($q);
        $data_project = $this->Project_model->get_project($config['per_page'], $start, $q, $this->session->userdata('id_user'));
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
            'project_slide' => $this->Project_model->Project_slide(),
            'data_project' => $data_project,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'start' => $start,
            'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
            'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
        );
        $this->template->load('layout_user/master','site/home', $data);
    }

    public function detail_project($id)  //sudah
    {
        $row = $this->Project_model->get_by_id($id);
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
                'id_project' => $row->id_project,
                'id_user' => $row->id_user,
                'foto' => $row->foto,
                'nama' => $row->nama,
                'nama_user' => $row->nama_user,
                'detail' => $row->detail,
                'dana_dibutuhkan' => $row->dana_dibutuhkan,
                'tanggal_buat' => $row->tanggal_buat,
                'tanggal_akhir' => $row->tanggal_berakhir,
                'surat_perjanjian' => $row->surat_perjanjian,
                'proposal' => $row->proposal,
                'status' => $row->status,
                'status_data' => $row->status_data,
                'jenis_pendanaan' => $row->jenis_pendanaan,
                'data_benefit' => $this->Benefit_model->benefit_project_berjalan($row->id_project),
                'data_donasi' => $this->Donasi_model->donasi_by_project($row->id_project),
                'donasi_masuk' => $this->Donasi_model->donasi_masuk($row->id_project),
                'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
                'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
            );
            $this->template->load('layout_user/master','site/detail_project', $data);
        } else {
            $this->session->set_flashdata('error', 'Data Tidak Ditemukan');
            redirect(site_url('project'));
        }    
    }

    //-------------------------------------- CREATE PROJECT -----------------------------------------

    public function upload() //sudah
    { 
        $row = $this->Project_model->cek_data($this->session->userdata('id_user'));

        if ($row) {
            $id = $row->id_project;

            $data = array(
                'button' => 'Simpan',
                'button_foto' => 'Simpan Foto',
                'button_proposal' => 'Simpan Proposal',
                'button_sp' => 'Simpan',
                'benefit' => 'Simpan',
                'project' => site_url('project/upload_action_update/'.$row->id_project),
                'aksi_foto' => site_url('project/upload_foto/'.$row->id_project),
                'aksi_proposal' => site_url('project/upload_proposal/'.$row->id_project),
                'aksi_sp' => site_url('project/upload_sp/'.$row->id_project),
                'aksi_benefit' => site_url('benefit/create_action'),
                'aksi' => site_url('user/login'),
                'data_benefit' => $this->Benefit_model->data_benefit($id),
                'id_project' => $row->id_project,
                'id_user' => $row->id_user,
                'nama_project' => $row->nama,
                'detail' => $row->detail,
                'file' => $row->foto,
                'dana_dibutuhkan' => $row->dana_dibutuhkan,
                'tanggal_buat' => $row->tanggal_buat,
                'proposal' => $row->proposal,
                'surat_perjanjian' => $row->surat_perjanjian,
                'nama_benefit' => set_value('nama_benefit'),
                'minimal' => set_value('minimal'),
                'maksimal' => set_value('maksimal'),
                'isi' => set_value('isi'),
                'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
                'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
            );
            $this->template->load('layout_user/master','project/project_upload', $data);
        }else{

            $data = array(
                'button' => 'Simpan',
                'button_foto' => 'Simpan Foto',
                'button_proposal' => 'Simpan Proposal',
                'button_sp' => 'Simpan',
                'benefit' => 'Simpan',
                'project' => site_url('project/upload_action'),
                'aksi_foto' => site_url('project/upload_foto'),
                'aksi_proposal' => site_url('project/upload_proposal'),
                'aksi_sp' => site_url('project/upload_sp'),
                'aksi_benefit' => site_url('project/add_cart'),
                'aksi' => site_url('user/login'),
                'id_project' => $this->Project_model->id_project(),
                'id_user' => $this->session->userdata('id_user'),
                'nama_project' => set_value('nama_project'),
                'detail' => set_value('detail'),
                'file' => set_value('file'),
                'dana_dibutuhkan' => set_value('dana_dibutuhkan'),
                'tanggal_buat' => date('Y-m-d'),
                'proposal' => set_value('proposal'),
                'surat_perjanjian' => set_value('surat_perjanjian'),
                'nama_benefit' => set_value('nama_benefit'),
                'minimal' => set_value('minimal'),
                'maksimal' => set_value('maksimal'),
                'isi' => set_value('isi'),
                'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
                'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
            );
            $this->template->load('layout_user/master','project/project_upload', $data);
        }
    }

    public function upload_action() //sudah
    { 
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
         $this->upload();
         } else {
            $data = array(
                'id_project' => $this->input->post('id_project',TRUE),
                'id_user' => $this->input->post('id_user',TRUE),
                'nama' => $this->input->post('nama_project',TRUE),
                'detail' => $this->input->post('detail',TRUE),
                'dana_dibutuhkan' => $this->input->post('dana_dibutuhkan',TRUE),
                'tanggal_buat' => $this->input->post('tanggal_buat',TRUE),
                'tanggal_berakhir' => date('Y-m-d', strtotime('+6 month', strtotime($this->input->post('tanggal_buat',TRUE)))),
                'status_data' => 'Belum Lengkap'
            );
            $this->Project_model->upload($data);
            $this->session->set_flashdata('success', 'Berhasil Unggah Data');
            redirect(site_url('project/upload'));
        }
    }

    public function upload_action_update($id) //sudah
    { 
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
         $this->upload();
         } else {
            $data = array(
                'id_project' => $this->input->post('id_project',TRUE),
                'id_user' => $this->input->post('id_user',TRUE),
                'nama' => $this->input->post('nama_project',TRUE),
                'detail' => $this->input->post('detail',TRUE),
                'dana_dibutuhkan' => $this->input->post('dana_dibutuhkan',TRUE),
                'tanggal_buat' => $this->input->post('tanggal_buat',TRUE),
                'tanggal_berakhir' => date('Y-m-d', strtotime('+1 month', strtotime($this->input->post('tanggal_buat',TRUE)))),
                'status_data' => 'Belum Lengkap'
            );
            $this->Project_model->update($this->input->post('id_project', TRUE), $data);
            $this->session->set_flashdata('success', 'Berhasil Update Data');
            redirect(site_url('project/upload'));
        }
    }

    public function upload_foto($id) //sudah
    { 
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->upload();
        } else {
            if (!empty($_FILES['file']['name'])) {
                $config['upload_path']      = './assets/foto_project/';
                $config['allowed_types']    = 'pdf|jpg|jpeg|png|gif';
                $config['file_name']        = $file;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                $path= './assets/foto_project/';
                $file = $this->input->post('foto_old',TRUE);
                if (!empty($file)) {
                    @unlink($path.$file);
                }

                if ($this->upload->do_upload('file')) {
                    $uploadData = $this->upload->data();

                    $data = array(
                        'foto' => $uploadData['file_name'],
                    );

                    $this->Project_model->update($this->input->post('id_project', TRUE), $data);
                    $this->session->set_flashdata('success', 'Berhasil Unggah Foto');
                    redirect(site_url('project/upload'));
                } else {
                    $this->session->set_flashdata('error', 'Gagal Unggah Foto');
                    redirect(site_url('project/upload'));
                }
            }else{
                $this->session->set_flashdata('error', 'Gagal Unggah Foto');
                redirect(site_url('project/upload'));
            }
        }
    }

    public function upload_proposal($id) //sudah
    { 
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->upload();
        } else {
            if (!empty($_FILES['proposal']['name'])) {
                $config['upload_path']      = './assets/proposal_project/';
                $config['allowed_types']    = 'pdf|jpg|jpeg|png|gif|docs';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                $path= './assets/proposal_project/';
                $file = $this->input->post('proposal_old',TRUE);
                if (!empty($file)) {
                    @unlink($path.$file);
                }

                if ($this->upload->do_upload('proposal')) {
                    $uploadData = $this->upload->data();

                    $data = array(
                        'proposal' => $uploadData['file_name'],
                    );

                    $this->Project_model->update($this->input->post('id_project', TRUE), $data);
                    $this->session->set_flashdata('success', 'Berhasil Unggah Proposal');
                    redirect(site_url('project/upload'));
                } else {
                    $this->session->set_flashdata('error', 'Gagal Unggah File Proposal');
                    redirect(site_url('project/upload'));
                }
            }else{
                $this->session->set_flashdata('error', 'Gagal Unggah Proposal');
                redirect(site_url('project/upload'));
            }
        }
    }

    public function upload_sp($id) //sudah
    { 
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->upload();
        } else {
            if (!empty($_FILES['surat_perjanjian']['name'])) {
                $config['upload_path']      = './assets/surat_perjanjian/';
                $config['allowed_types']    = 'pdf|jpg|jpeg|png|gif|docs';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                $path= './assets/surat_perjanjian/';
                $file = $this->input->post('sp_old',TRUE);
                if (!empty($file)) {
                    @unlink($path.$file);
                }

                if ($this->upload->do_upload('surat_perjanjian')) {
                    $uploadData = $this->upload->data();

                    $data = array(
                        'surat_perjanjian' => $uploadData['file_name'],
                    );

                    $this->Project_model->update($this->input->post('id_project', TRUE), $data);
                    $this->session->set_flashdata('success', 'Berhasil Unggah Surat Perjanjian');
                    redirect(site_url('project/upload'));
                } else {
                    $this->session->set_flashdata('error', 'Gagal Unggah Surat Perjanjian');
                    redirect(site_url('project/upload'));
                }
            }else{
                $this->session->set_flashdata('error', 'Gagal Unggah Surat Perjanjian');
                redirect(site_url('project/upload'));
            }
        }
    }

    public function simpan($id) //sudah
    { 

        $row = $this->Project_model->cek_lengkap($this->input->post('id_project', TRUE));

        if ($row) {

            $data = array(

                'status_data' => 'Lengkap'
            );

            $this->Project_model->update($this->input->post('id_project', TRUE), $data);
            
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect(site_url('project/upload'));
        }else{
            $this->session->set_flashdata('error', 'Data Belum Lengkap');
            redirect(site_url('project/upload'));
        }
    }

    //------------------------------------ END CREATE PROJECT ---------------------------------------

    //-------------------------------------- PROJECT SAYA ----------------------------------------

    public function project_user() //sudah
    {
        $data = array(
            'data_project' => $this->Project_model->get_by_user($this->session->userdata('id_user')),
            'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
            'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
        );
        $this->template->load('layout_user/master','site/project_user', $data);
    }

    public function detail_project_user($id)  //sudah
    {
        $row = $this->Project_model->detail_project_user($this->session->userdata('id_user'),$id);

        $data = array(
            'id_user' => $row->id_user,
            'id_project' => $row->id_project,
            'foto' => $row->foto,
            'nama' => $row->nama,
            'detail' => $row->detail,
            'dana_dibutuhkan' => $row->dana_dibutuhkan,
            'tanggal_buat' => $row->tanggal_buat,
            'tanggal_berakhir' => $row->tanggal_berakhir,
            'surat_perjanjian' => $row->surat_perjanjian,
            'proposal' => $row->proposal,
            'status' => $row->status,
            'status_data' => $row->status_data,
            'donasi_masuk' => $this->Donasi_model->donasi_masuk($row->id_project),
            'data_benefit' => $this->Benefit_model->benefit_project_berjalan($row->id_project),
            'data_donatur' => $this->Donasi_model->data_donatur($id),
        );
        $this->template->load('layout_user/master','site/detail_project_user', $data);
    }

    //------------------------------------ END PROJECT SAYA --------------------------------------


    //================================================= END USER ============================================

    //------------------------------------------------ FORM VALIDATION  ---------------------------------------

    public function _rules() 
    {
      $this->form_validation->set_rules('id_user', 'id user', 'trim');
      $this->form_validation->set_rules('foto', 'foto', 'trim');
      $this->form_validation->set_rules('nama', 'nama', 'trim');
      $this->form_validation->set_rules('detail', 'detail', 'trim');
      $this->form_validation->set_rules('dana_dibutuhkan', 'dana dibutuhkan', 'trim');
      $this->form_validation->set_rules('tanggal_buat', 'tanggal buat', 'trim');
      $this->form_validation->set_rules('tanggal_berakhir', 'tanggal berakhir', 'trim');
      $this->form_validation->set_rules('surat_perjanjian', 'surat perjanjian', 'trim');
      $this->form_validation->set_rules('proposal', 'proposal', 'trim');
      $this->form_validation->set_rules('status', 'status', 'trim');

      $this->form_validation->set_rules('id_project', 'id_project', 'trim');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

}