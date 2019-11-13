<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel_model extends CI_Model
{

    public $table = 'artikel';
    public $id = 'id_artikel';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    //=============================================== ADMIN ============================================

    function id_artikel() //FIX (oleh admin)
    {
        $tahun=date('dmyt');
        $cari="-ART-$tahun";
        $nomer = "SELECT MAX(SUBSTRING_INDEX(id_artikel, '-',1)*1)as a FROM artikel WHERE id_artikel like '%$cari'";
        $baris = $this->db->query($nomer);
        $akhir =  $baris->row()->a;
        $akhir++;
        $nota =str_pad($akhir, 3, "0", STR_PAD_LEFT);
        $nota .= "-ART-$tahun";
        return $nota;
    }

    public function getArtikel() //FIX (oleh admin)
    {
        return $this->db->get($this->table)->result();
    }
    
    function getById($id) //FIX (oleh admin)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_by_id($id) //sudah
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    

    function insert($data) //FIX (oleh admin)
    {
        $this->db->insert($this->table, $data);
    }

    function update($id, $data) //FIX (oleh admin)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    public function get_artikel_pending() //sudah
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('status','pending');
        return $this->db->get($this->table)->result();
    }

    public function get_artikel_berjalan() //sudah
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('status','berjalan');
        return $this->db->get($this->table)->result();
    }

    public function get_history() //sudah
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('status','selesai');
        $this->db->or_where('status','batal');
        return $this->db->get($this->table)->result();
    }

    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    //============================================= END ADMIN ==========================================

    //================================================ USER ============================================

    function total_rows($q = NULL) //sudah
    { 
        $this->db->like('id_artikel', $q);
        $this->db->or_like('id_kategori', $q);
        $this->db->or_like('id_admin', $q);
        $this->db->or_like('judul', $q);
        $this->db->or_like('pengarang', $q);
        $this->db->or_like('tanggal_pos', $q);
        $this->db->or_like('isi', $q);
        $this->db->or_like('foto', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_artikel($limit, $start = 0, $q = NULL) //sudah
    { 
        $this->db->order_by('id_artikel', 'DESC');
        $this->db->limit($limit, $start);
        $this->db->group_by('id_artikel');
        $this->db->where('status', 'berjalan');
        $this->db->join('kategori_artikel', 'kategori_artikel.id_kategori=artikel.id_kategori');
        return $this->db->get('artikel')->result();
    }

    function total_rows_by_kategori($q = NULL, $kategori) //sudah
    { 
        $this->db->like('id_artikel', $q);
        $this->db->or_like('id_kategori', $q);
        $this->db->or_like('id_admin', $q);
        $this->db->or_like('judul', $q);
        $this->db->or_like('pengarang', $q);
        $this->db->or_like('tanggal_pos', $q);
        $this->db->or_like('isi', $q);
        $this->db->or_like('foto', $q);
        $this->db->where('id_kategori', $kategori);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_artikel_by_kategori($limit, $start = 0, $q = NULL, $kategori) //sudah
    { 
        $this->db->order_by('id_artikel', 'DESC');
        $this->db->limit($limit, $start);
        $this->db->group_by('id_artikel');
        $this->db->join('kategori_artikel', 'kategori_artikel.id_kategori=artikel.id_kategori');
        $this->db->where('artikel.id_kategori', $kategori);
        $this->db->where('status', 'berjalan');
        return $this->db->get('artikel')->result();
    }

    public function detail($id) //sudah
    {
        return $this->db->query("SELECT a.id_artikel, a.id_admin, a.judul, a.pengarang, a.tanggal_pos, a.isi, a.foto, b.id_kategori, b.nama_kategori, c.nama from artikel a join kategori_artikel b on a.id_kategori=b.id_kategori join admin c on a.id_admin=c.id_admin where a.id_artikel='$id'")->row();
    }

    //============================================== END USER ==========================================

}