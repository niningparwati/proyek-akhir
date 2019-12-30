<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model
{

    public $table = 'project';
    public $id = 'id_project';
    public $order = 'DESC';

    //================================================= ADMIN =================================================

    //----------------------- CRUD --------------------

    function insert($data) //sudah
    {
        $this->db->insert($this->table, $data);
    }

    function update($id, $data) //FIX (oleh admin)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function delete($id) //sudah
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    public function get_all() //FIX (oleh admin)
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function projectById($id) //FIX (oleh admin)
    {
        return $this->db->query("SELECT b.id_user, b.nama as nama_user, a.* FROM project a JOIN user b ON a.id_user=b.id_user WHERE a.id_project='$id'")->row();
    }

    function get_by_id($id)
    {
        return $this->db->query("SELECT b.id_user, b.nama as nama_user, a.* FROM project a JOIN user b ON a.id_user=b.id_user WHERE a.id_project='$id'")->row();
    }

    //----------------------- END CRUD -------------------------- 

    //-------------------- PROJECT SIAP ACC (ADMIN) ----------------------

    public function siapApprove() //FIX (oleh admin)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('status','pending');
        $this->db->where('status_data','Lengkap');
        return $this->db->get($this->table)->result();
    }

    //------------------ END PROJECT SIAP ACC (ADMIN) --------------------

    //------------------------- PROJECT BERJALAN ----------------------------

    public function project_berjalan() //sudah (admin)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('status','berjalan');
        $this->db->where('status_data','Lengkap');
        return $this->db->get($this->table)->result();
    }

    public function projectBerjalan() //FIX (oleh admin)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('status','berjalan');
        $this->db->where('status_data','Lengkap');
        return $this->db->get($this->table)->result();
    }

    //----------------------- END PROJECT BERJALAN --------------------------
    
    //--------------------------- PROJECT SELESAI ----------------------------

    public function projectSelesai() //FIX (oleh admin)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('status','selesai');
        $this->db->where('status_data','Lengkap');
        return $this->db->get($this->table)->result();
    }

    public function project_selesai() //sudah
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('status','selesai');
        $this->db->where('status_data','Lengkap');
        return $this->db->get($this->table)->result();
    }

    //------------------------- END PROJECT SELESAI --------------------------

    //------------------------- PROJECT DITOLAK ---------------------------

    public function projectDitolak() //FIX (oleh admin)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('status','tolak');
        $this->db->where('status_data','Lengkap');
        return $this->db->get($this->table)->result();
    }

    public function project_ditolak() //sudah
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('status','tolak');
        $this->db->where('status_data','Lengkap');
        return $this->db->get($this->table)->result();
    }

    public function request($data)
    {
        $this->db->insert('request', $data);
    }

    //----------------------- END PROJECT DITOLAK -------------------------

    //================================================ END ADMIN ===============================================


    //=================================================== USER =================================================

    function id_project() //sudah
    { 
        $tahun=date('dmyhis');
        $cari="-PRJ-$tahun";
        $nomer = "SELECT MAX(SUBSTRING_INDEX(id_project, '-',1)*1)as a FROM project WHERE id_project like '%$cari%'";
        $baris = $this->db->query($nomer);
        $akhir =  $baris->row()->a;
        $akhir++;
        $nota =str_pad($akhir, 3, "0", STR_PAD_LEFT);
        $nota .= "-PRJ-$tahun";
        return $nota;
    }

    public function get_by_user($id_user) //sudah
    {
        return $this->db->query("SELECT * FROM project WHERE id_user ='$id_user' AND status='berjalan'")->result();
    }

    public function detail_project_user($id_user, $id)
    {
        // $this->db->from('project a');
        // $this->db->join('user b', 'a.id_user=b.id_user');
        $this->db->order_by('id_project', 'DESC');
        $this->db->group_by('id_project');
        $this->db->where('status', 'berjalan');
        $this->db->where('id_user', $id_user);
        $this->db->where('id_project', $id);
        return $this->db->get($this->table)->row();

        // return $this->db->query("SELECT a.foto, b.* FROM project a JOIN user b on a.id_user=b.id_user where a.id_user='$id_user' and a.id_project='$id' order by a.id_project DESC")->row();
    }

    public function Project_slide()
    {
        $this->db->where('tingkat', 'medium');
        $this->db->where('status', 'berjalan');
        return $this->db->get($this->table)->result();
    }
    //----------------------------------------- PAGINATION ---------------------------------------------

    function total_rows($q = NULL) //sudah
    { 
        $this->db->like('id_project', $q);
        $this->db->or_like('id_user', $q);
        $this->db->or_like('foto', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('detail', $q);
        $this->db->or_like('dana_dibutuhkan', $q);
        $this->db->or_like('tanggal_buat', $q);
        $this->db->or_like('tanggal_berakhir', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('surat_perjanjian', $q);
        $this->db->or_like('proposal', $q);
        $this->db->or_like('status_data', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_project($limit, $start = 0, $q = NULL, $id_user) //sudah
    { 
        $this->db->order_by('id_project', 'DESC');
        $this->db->limit($limit, $start);
        $this->db->group_by('id_project');
        $this->db->where('project.status', 'berjalan');
        $this->db->where('project.id_user !=', $id_user);
        return $this->db->get('project')->result();
    }

    //--------------------------------------- END PAGINATION -------------------------------------------

    //-------------------------------------- CREATE PROJECT -----------------------------------------

    public function cek_data($id) //sudah
    {
        return $this->db->query("select * from project where id_user='$id' and status_data='Belum Lengkap'")->row();
    }

    public function upload($data) //sudah
    {
        $this->db->insert($this->table, $data);
    }

     public function cek_lengkap($id)
    {
        $this->db->join('benefit', 'benefit.id_project=project.id_project');
        $this->db->where('project.id_project IS NOT NULL', NULL, FALSE );
        $this->db->where('project.id_user IS NOT NULL', NULL, FALSE );
        $this->db->where('project.nama IS NOT NULL', NULL, FALSE );
        $this->db->where('project.foto IS NOT NULL', NULL, FALSE );
        $this->db->where('project.detail IS NOT NULL', NULL, FALSE );
        $this->db->where('project.dana_dibutuhkan IS NOT NULL', NULL, FALSE );
        $this->db->where('project.tanggal_buat IS NOT NULL', NULL, FALSE );
        $this->db->where('project.tanggal_berakhir IS NOT NULL', NULL, FALSE );
        $this->db->where('project.surat_perjanjian IS NOT NULL', NULL, FALSE );
        $this->db->where('project.proposal IS NOT NULL', NULL, FALSE );
        $this->db->where('project.status IS NOT NULL', NULL, FALSE );
        $this->db->where('project.status_data IS NOT NULL', NULL, FALSE );
        $this->db->where('benefit.id_benefit IS NOT NULL', NULL, FALSE );
        $this->db->where('benefit.nama_benefit IS NOT NULL', NULL, FALSE );
        $this->db->where('benefit.minimal IS NOT NULL', NULL, FALSE );
        $this->db->where('benefit.maksimal IS NOT NULL', NULL, FALSE );
        $this->db->where('benefit.isi IS NOT NULL', NULL, FALSE );
        $this->db->where('project.id_project', $id);
        return $this->db->get($this->table)->row();
    }

    public function countSiapApprove()
    {
        return $this->db->query("SELECT COUNT(id_project) as jumlah FROM project WHERE status='pending'")->row();
    }

    public function countBerjalan()
    {
        return $this->db->query("SELECT COUNT(id_project) as jumlah FROM project WHERE status='berjalan'")->row();
    }

    public function countSelesai()
    {
        return $this->db->query("SELECT COUNT(id_project) as jumlah FROM project WHERE status='selesai'")->row();
    }

    public function countTolak()
    {
        return $this->db->query("SELECT COUNT(id_project) as jumlah FROM project WHERE status='tolak'")->row();
    }

    public function countUser()
    {
        return $this->db->query("SELECT COUNT(id_user) as jumlah FROM user")->row();
    }

    public function countPemilikUsaha()
    {
        return $this->db->query("SELECT COUNT(DISTINCT project.id_user) as jumlah FROM project JOIN user ON project.id_user=user.id_user ORDER BY project.id_user LIMIT 1")->row();
    }

    public function countDonatur()
    {
        return $this->db->query("SELECT COUNT(DISTINCT donasi.id_user) as jumlah FROM donasi JOIN user ON donasi.id_user=user.id_user ORDER BY donasi.id_user LIMIT 1")->row();
    }

    //------------------------------------ END CREATE PROJECT ---------------------------------------

    //================================================= END USER ===============================================

}