<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('User_Model');
		$this->load->model('Project_model');
		$this->load->model('Benefit_model');
		$this->load->model('Donasi_model');
		$this->load->helper('download');
		require 'session.php';
	}

	//---------------------------- ALL PROJECT -------------------------

	public function index() //FIX (oleh admin)
	{
		$email = $this->session->userdata('email');
		$cekAdmin = $this->Admin_model->cekNama($email);
		$data = array(
			'logo' => 'assets/images/uproject.png',
			'email_admin' => $email,
			'nama_admin' => $cekAdmin->nama_admin,
			'id_admin' => $cekAdmin->id_admin,
			'foto_admin' => $cekAdmin->foto_admin,
			'logout' => base_url('index.php/Halaman_Admin/Dashboard/Logout'),
			'data_project' =>  $this->Project_model->get_all(),
		);
		$this->load->view('layout_admin/head');
		$this->load->view('layout_admin/header', $data);
		$this->load->view('layout_admin/sidebar', $data);
		$this->load->view('Halaman_Admin/project/project_list', $data);
		$this->load->view('layout_admin/footer', $data);
	}

	public function detailProject($id) //sudah
	{   
		$row = $this->Project_model->projectById($id);
		if ($row) {
			if ($row->status == 'pending') {
				redirect(site_url('Halaman_Admin/Project/detailSiapApprove/'.$row->id_project));
			}else if($row->status == 'berjalan'){
				redirect(site_url('Halaman_Admin/Project/detailProjectBerjalan/'.$row->id_project));
			}else if($row->status == 'selesai'){
				redirect(site_url('Halaman_Admin/Project/detailProjectSelesai/'.$row->id_project));
			}else if($row->status == 'tolak'){
				redirect(site_url('Halaman_Admin/Project/detailProjectDitolak/'.$row->id_project));
			}
		} else {
			$this->session->set_flashdata('error', 'Data Tidak Ditemukan');
			redirect(site_url('Halaman_Admin/Dashboard'));
		}
	}

	//------------------------- END ALL PROJECT ------------------------

	//------------------------- PROJECT SIAP ACC (ADMIN) -------------------------

    public function siapApprove() //FIX (oleh admin)
    {
    	$email = $this->session->userdata('email');
    	$cekAdmin = $this->Admin_model->cekNama($email);
    	$data = array(
    		'logo' => 'assets/images/uproject.png',
    		'email_admin' => $email,
    		'nama_admin' => $cekAdmin->nama_admin,
    		'id_admin' => $cekAdmin->id_admin,
    		'foto_admin' => $cekAdmin->foto_admin,
    		'logout' => base_url('index.php/Halaman_Admin/Dashboard/Logout'),
    		'data_project' =>  $this->Project_model->siapApprove(),
    	);
    	$this->load->view('layout_admin/head');
    	$this->load->view('layout_admin/header', $data);
    	$this->load->view('layout_admin/sidebar', $data);
    	$this->load->view('Halaman_Admin/project/project_siap_acc', $data);
    	$this->load->view('layout_admin/footer', $data);
    }

    public function detailSiapApprove($id) // FIX (oleh admin)
    {
    	$email = $this->session->userdata('email');
    	$cekAdmin = $this->Admin_model->cekNama($email);

    	$row = $this->Project_model->projectById($id);
    	if ($row) {
    		$data = array(
    			'logo' => 'assets/images/uproject.png',
    			'email_admin' => $email,
    			'nama_admin' => $cekAdmin->nama_admin,
    			'id_admin' => $cekAdmin->id_admin,
    			'foto_admin' => $cekAdmin->foto_admin,
    			'logout' => base_url('index.php/Halaman_Admin/Dashboard/Logout'),
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
    			'data_benefit' => $this->Benefit_model->dataBenefit($row->id_project)
    		);
    		$this->load->view('layout_admin/head');
    		$this->load->view('layout_admin/header', $data);
    		$this->load->view('layout_admin/sidebar', $data);
    		$this->load->view('Halaman_Admin/project/project_siap_acc_read', $data);
    		$this->load->view('layout_admin/footer', $data);
    	}else{
    		$this->session->set_flashdata('error', 'Data Tidak Ditemukan');
    		redirect(site_url('Halaman_Admin/Dashboard'));
    	}

    }

    public function Approve($id, $keputusan) //FIX (oleh admin)
    {
    	$row = $this->Project_model->projectById($id);
    	if ($keputusan == 'yes') {
    		if ($row) {
    			$data = array(
    				'status' => 'berjalan'
    			);
    			$this->Project_model->update($row->id_project, $data);
    			$this->session->set_flashdata('success', 'Berhasil Approve Project');
    			redirect(site_url('Halaman_Admin/Project/projectBerjalan'));
    		}else{
    			$this->session->set_flashdata('error', 'Gagal Approve Project');
    			redirect(site_url('Halaman_Admin/Project/siapApprove'));
    		}
    	}else if($keputusan == 'no'){
    		if ($row) {
    			$data = array(
    				'status' => 'tolak'
    			);
    			$this->Project_model->update($row->id_project, $data);
    			$this->session->set_flashdata('success', 'Project Berhasil Ditolak');
    			redirect(site_url('Halaman_Admin/Project/siapApprove'));
    		}else{
    			$this->session->set_flashdata('error', 'Project Gagal Ditolak');
    			redirect(site_url('Halaman_Admin/Project/siapApprove'));
    		}
    	}

    }

    //-------------------------- END PROJECT SIAP ACC ----------------------------

    //----------------------------- PROJECT BERJALAN ------------------------------

    public function projectBerjalan() //FIX (oleh admin)
    {
    	$email = $this->session->userdata('email');
    	$cekAdmin = $this->Admin_model->cekNama($email);
    	$data = array(
    		'logo' => 'assets/images/uproject.png',
    		'email_admin' => $email,
    		'nama_admin' => $cekAdmin->nama_admin,
    		'id_admin' => $cekAdmin->id_admin,
    		'foto_admin' => $cekAdmin->foto_admin,
    		'logout' => base_url('index.php/Halaman_Admin/Dashboard/Logout'),
    		'data_project' =>  $this->Project_model->projectBerjalan(),
    	);
    	$this->load->view('layout_admin/head');
    	$this->load->view('layout_admin/header', $data);
    	$this->load->view('layout_admin/sidebar', $data);
    	$this->load->view('Halaman_Admin/project/project_berjalan', $data);
    	$this->load->view('layout_admin/footer', $data);
    }

    public function detailProjectBerjalan($id) //FIX (oleh admin)
    {

    	$email = $this->session->userdata('email');
    	$cekAdmin = $this->Admin_model->cekNama($email);

    	$row = $this->Project_model->projectById($id);
    	if ($row) {
    		$data = array(
    			'logo' => 'assets/images/uproject.png',
    			'email_admin' => $email,
    			'nama_admin' => $cekAdmin->nama_admin,
    			'id_admin' => $cekAdmin->id_admin,
    			'foto_admin' => $cekAdmin->foto_admin,
    			'logout' => base_url('index.php/Halaman_Admin/Dashboard/Logout'),
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
    			'data_benefit' => $this->Benefit_model->benefitProjectBerjalan($row->id_project),
    			'data_donasi' => $this->Donasi_model->donasiByProject($row->id_project),
    			'donasi_masuk' => $this->Donasi_model->donasiMasuk($row->id_project),

    		);
    		$this->load->view('layout_admin/head');
    		$this->load->view('layout_admin/header', $data);
    		$this->load->view('layout_admin/sidebar', $data);
    		$this->load->view('Halaman_Admin/project/project_berjalan_read', $data);
    		$this->load->view('layout_admin/footer', $data);
    	}else{
    		$this->session->set_flashdata('error', 'Data Tidak Ditemukan');
    		redirect(site_url('Halaman_Admin/Dashboard'));
    	}
    }

    //----------------------------- END PROJECT BERJALAN --------------------------

     //----------------------------- PROJECT SELESAI ------------------------------

    public function projectSelesai() //FIX (oleh admin)
    {
    	$email = $this->session->userdata('email');
    	$cekAdmin = $this->Admin_model->cekNama($email);
    	$data = array(
    		'logo' => 'assets/images/uproject.png',
    		'email_admin' => $email,
    		'nama_admin' => $cekAdmin->nama_admin,
    		'id_admin' => $cekAdmin->id_admin,
    		'foto_admin' => $cekAdmin->foto_admin,
    		'logout' => base_url('index.php/Halaman_Admin/Dashboard/Logout'),
    		'data_project' =>  $this->Project_model->projectSelesai(),
    	);
    	$this->load->view('layout_admin/head');
    	$this->load->view('layout_admin/header', $data);
    	$this->load->view('layout_admin/sidebar', $data);
    	$this->load->view('Halaman_Admin/project/project_selesai', $data);
    	$this->load->view('layout_admin/footer', $data);

    }

    public function detailProjectSelesai($id) //FIX (oleh admin)
    {
    	$email = $this->session->userdata('email');
    	$cekAdmin = $this->Admin_model->cekNama($email);

    	$row = $this->Project_model->projectById($id);
    	if ($row) {
    		$data = array(
    			'logo' => 'assets/images/uproject.png',
    			'email_admin' => $email,
    			'nama_admin' => $cekAdmin->nama_admin,
    			'id_admin' => $cekAdmin->id_admin,
    			'foto_admin' => $cekAdmin->foto_admin,
    			'logout' => base_url('index.php/Halaman_Admin/Dashboard/Logout'),
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
    			'data_benefit' => $this->Benefit_model->benefitProjectBerjalan($row->id_project),
    			'data_donasi' => $this->Donasi_model->donasiByProject($row->id_project),
    			'donasi_masuk' => $this->Donasi_model->donasiMasuk($row->id_project),
    		);
    		$this->load->view('layout_admin/head');
    		$this->load->view('layout_admin/header', $data);
    		$this->load->view('layout_admin/sidebar', $data);
    		$this->load->view('Halaman_Admin/project/project_selesai_read', $data);
    		$this->load->view('layout_admin/footer', $data);
    	}else{
    		$this->session->set_flashdata('error', 'Data Tidak Ditemukan');
    		redirect(site_url('Halaman_Admin/Dashboard'));
    	}
    }


    //------------------------- END POJECT SELESAI ---------------------------

    //----------------------------- PROJECT DITOLAK ------------------------------

    public function projectDitolak() //FIX (oleh admin)
    {
    	$email = $this->session->userdata('email');
    	$cekAdmin = $this->Admin_model->cekNama($email);
    	$data = array(
    		'logo' => 'assets/images/uproject.png',
    		'email_admin' => $email,
    		'nama_admin' => $cekAdmin->nama_admin,
    		'id_admin' => $cekAdmin->id_admin,
    		'foto_admin' => $cekAdmin->foto_admin,
    		'logout' => base_url('index.php/Halaman_Admin/Dashboard/Logout'),
    		'data_project' =>  $this->Project_model->projectDitolak(),
    	);
    	$this->load->view('layout_admin/head');
    	$this->load->view('layout_admin/header', $data);
    	$this->load->view('layout_admin/sidebar', $data);
    	$this->load->view('Halaman_Admin/project/project_ditolak', $data);
    	$this->load->view('layout_admin/footer', $data);
    }

    public function detailProjectDitolak($id) //FIX (oleh admin) 
    {
    	$email = $this->session->userdata('email');
    	$cekAdmin = $this->Admin_model->cekNama($email);

    	$row = $this->Project_model->projectById($id);
    	if ($row) {
    		$data = array(
    			'logo' => 'assets/images/uproject.png',
    			'email_admin' => $email,
    			'nama_admin' => $cekAdmin->nama_admin,
    			'id_admin' => $cekAdmin->id_admin,
    			'foto_admin' => $cekAdmin->foto_admin,
    			'logout' => base_url('index.php/Halaman_Admin/Dashboard/Logout'),
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
    			'data_benefit' => $this->Benefit_model->dataBenefit($row->id_project)
    		);
    		$this->load->view('layout_admin/head');
    		$this->load->view('layout_admin/header', $data);
    		$this->load->view('layout_admin/sidebar', $data);
    		$this->load->view('Halaman_Admin/project/project_ditolak_read', $data);
    		$this->load->view('layout_admin/footer', $data);
    	}else{
    		$this->session->set_flashdata('error', 'Data Tidak Ditemukan');
    		redirect(site_url('Halaman_Admin/Dashboard'));
    	}
    }

    //--------------------------- END PROJECT DITOLAK ----------------------------

    //------------------------------ DOWNLOAD ----------------------------------

    public function downloadProposal($id) //FIX (oleh admin)
    { 
        $row = $this->Project_model->projectById($id);

        if ($row) {
            force_download('assets/proposal_project/'.$row->proposal,NULL);
        }
    }

    public function downloadSuratPerjanjian($id) //FIX (oleh admin)
    { 
        $row = $this->Project_model->projectById($id);

        if ($row) {
            force_download('assets/surat_perjanjian/'.$row->surat_perjanjian,NULL);
        }
    }

    public function downloadFotoProject($id) //FIX (oleh admin)
    { 
        $row = $this->Project_model->projectById($id);

        if ($row) {
            force_download('assets/foto_project/'.$row->foto,NULL);
        }
    }

    //------------------------------ END DOWNLOAD -------------------------------

    //--------------------------------- REQUEST ---------------------------------

    public function Request($id_project)
    {
        $email = $this->session->userdata('email');
        $cekAdmin = $this->Admin_model->cekNama($email);
        $data = array(
            'logo' => 'assets/images/uproject.png',
            'email_admin' => $email,
            'nama_admin' => $cekAdmin->nama_admin,
            'id_admin' => $cekAdmin->id_admin,
            'foto_admin' => $cekAdmin->foto_admin,
            'logout' => base_url('index.php/Halaman_Admin/Dashboard/Logout'),
            'id_project' => $id_project
        );
        $this->load->view('layout_admin/head');
        $this->load->view('layout_admin/header', $data);
        $this->load->view('layout_admin/sidebar', $data);
        $this->load->view('Halaman_Admin/project/request', $data);
        $this->load->view('layout_admin/footer', $data);
    }

    public function actionRequest($id_project)
    {
        $data = array(
            'jenis_request' => $this->input->post('jenis_request'),
            'id_project' => $id_project
        );

        $this->Project_model->request($data);
        $this->session->set_flashdata('success', 'Project Berhasil Ditolak');
        redirect(site_url('Halaman_Admin/Project/siapApprove'));
    }
}

?>