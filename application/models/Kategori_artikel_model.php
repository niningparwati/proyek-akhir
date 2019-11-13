<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_artikel_model extends CI_Model
{

    public $table = 'kategori_artikel';
    public $id = 'id_kategori';
    public $order = 'DESC';

    function insert($data) //FIX (oleh admin)
    {
        $this->db->insert($this->table, $data);
    }

    function getKategoriArtikel() //FIX (oleh admin)
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function getById($id) //FIX (oleh admin)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function update($id, $data) //FIX (oleh admin)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function delete($id) //FIX (oleh admin)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    
    function get_all() //sudah
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_by_id($id) //sudah
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
}