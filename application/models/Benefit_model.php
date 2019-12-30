<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Benefit_model extends CI_Model
{

    public $table = 'benefit';
    public $id = 'id_benefit';
    public $idpro = 'id_project';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by id
    function get_by_project($idpro)
    {
        $this->db->where($this->idpro, $idpro);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_benefit', $q);
		$this->db->or_like('id_project', $q);
		$this->db->or_like('nama_benefit', $q);
		$this->db->or_like('isi', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_benefit', $q);
		$this->db->or_like('id_project', $q);
		$this->db->or_like('nama_benefit', $q);
		$this->db->or_like('isi', $q);
		$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    
     public function data_benefit($id)
    {
        return $this->db->query("select * from benefit where id_project='$id'")->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    // delete data
    function delete_by_project($idpro)
    {
        $this->db->where($this->idpro, $idpro);
        $this->db->delete($this->table);
    }

    public function dataBenefit($id) // FIX (oleh admin)
    {
        return $this->db->query("select * from benefit where id_project='$id'")->result();
    }

    public function benefitProjectBerjalan($id) //FIX (oleh admin)
    {
        return $this->db->query("SELECT a.*, b.* from benefit a join project b on a.id_project=b.id_project WHERE a.id_project='$id'")->result();
    }

    public function benefit_project_berjalan($id)
    {
        return $this->db->query("SELECT a.*, b.* from benefit a join project b on a.id_project=b.id_project WHERE a.id_project='$id'")->result();
    }

    public function cek_benefit($id, $nominal)
    { 
        $data = $this->db->query("select * from benefit where id_project='$id'")->result();

        foreach ($data as $value) {
            if ($nominal >= $value->minimal && $nominal < $value->maksimal) {
                $id_benefit = $value->id_benefit;
                break;
            }
        }

        $cek_maksimal = $this->db->query("select maksimal as nilai_maksimal, id_benefit from benefit where id_project='$id' order by maksimal*1 desc limit 1")->row();
        $maksimal = $cek_maksimal->nilai_maksimal;
        $id_benefit_maksimal = $cek_maksimal->id_benefit;

        if ($nominal >= $maksimal) {
            $id_benefit = $id_benefit_maksimal;
        }
        return $id_benefit;
       // return $this->db->query("SELECT id_benefit, IF ($nominal >= minimal && $nominal < maksimal, id_benefit, 'salah') as hasil FROM benefit WHERE id_project='$id'")->result();
    }

}