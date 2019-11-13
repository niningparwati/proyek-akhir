<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tanggapan_user_model extends CI_Model {

	public $table = 'tanggapan_user';
    public $id = 'id_tanggapan_user';
    public $order = 'DESC';

    public function getTanggapanUser() //FIX (oleh admin)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('user', 'tanggapan_user.id_user=user.id_user');
        return $this->db->get($this->table)->result();
    }

    function getById($id) //FIX (oleh admin)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function delete($id) //FIX (oleh admin)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    public function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('user', 'tanggapan_user.id_user=user.id_user');
        return $this->db->get($this->table)->result();
    }

    function get_by_id($id) //sudah
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    public function insert($data)
    {
    	$this->db->insert($this->table, $data);
    }

    

    //-------------------------------------- PAGINATION -----------------------------------

    function total_rows($q = NULL) //sudah
    { 
        $this->db->like('id_tanggapan_user', $q);
        $this->db->or_like('id_user', $q);
        $this->db->or_like('isi', $q);
        $this->db->or_like('tanggal_pos', $q);
        $this->db->from('tanggapan_user a');
        return $this->db->count_all_results();
    }

    function get_tanggapan_user($limit, $start = 0, $q = NULL) //sudah
    { 
        $this->db->join('user', 'tanggapan_user.id_user=user.id_user');
        $this->db->order_by('id_tanggapan_user', 'DESC');
        $this->db->limit($limit, $start);
        $this->db->group_by('id_tanggapan_user');
        return $this->db->get('tanggapan_user')->result();
    }

    //------------------------------------ END PAGINATION ---------------------------------

}

?>